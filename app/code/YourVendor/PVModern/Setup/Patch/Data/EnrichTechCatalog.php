<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Setup\Patch\Data;

use Magento\Catalog\Api\ProductRepositoryInterface;
use Magento\Catalog\Model\Category;
use Magento\Catalog\Model\CategoryFactory;
use Magento\Catalog\Model\Product;
use Magento\Catalog\Model\Product\Attribute\Source\Status;
use Magento\Catalog\Model\Product\Type;
use Magento\Catalog\Model\Product\Visibility;
use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Model\ResourceModel\Category\CollectionFactory as CategoryCollectionFactory;
use Magento\Catalog\Model\ResourceModel\Product\CollectionFactory as ProductCollectionFactory;
use Magento\CatalogInventory\Api\StockRegistryInterface;
use Magento\Eav\Model\Entity\Attribute\ScopedAttributeInterface;
use Magento\Eav\Setup\EavSetupFactory;
use Magento\Framework\Exception\NoSuchEntityException;
use Magento\Framework\Setup\ModuleDataSetupInterface;
use Magento\Framework\Setup\Patch\DataPatchInterface;
use Magento\Store\Model\StoreManagerInterface;

class EnrichTechCatalog implements DataPatchInterface
{
    private const USD_DIVISOR = 26336.0;

    public function __construct(
        private readonly ModuleDataSetupInterface $moduleDataSetup,
        private readonly EavSetupFactory $eavSetupFactory,
        private readonly StoreManagerInterface $storeManager,
        private readonly CategoryFactory $categoryFactory,
        private readonly CategoryCollectionFactory $categoryCollectionFactory,
        private readonly ProductFactory $productFactory,
        private readonly ProductRepositoryInterface $productRepository,
        private readonly ProductCollectionFactory $productCollectionFactory,
        private readonly StockRegistryInterface $stockRegistry
    ) {
    }

    public static function getDependencies(): array
    {
        return [SeedTechProducts::class];
    }

    public function getAliases(): array
    {
        return [];
    }

    public function apply(): self
    {
        $this->moduleDataSetup->getConnection()->startSetup();

        try {
            $eavSetup = $this->eavSetupFactory->create(['setup' => $this->moduleDataSetup]);
            $this->ensureCatalogAttributes($eavSetup);

            $store = $this->storeManager->getStore();
            $rootCategoryId = (int) $store->getRootCategoryId();
            $categoryMap = $this->ensureCategories($rootCategoryId);

            foreach ($this->getProductDefinitions() as $definition) {
                $this->upsertProduct($definition, $categoryMap, (int) $store->getWebsiteId());
            }

            $this->enrichExistingCatalog($categoryMap);
        } finally {
            $this->moduleDataSetup->getConnection()->endSetup();
        }

        return $this;
    }

    private function ensureCatalogAttributes(\Magento\Eav\Setup\EavSetup $eavSetup): void
    {
        $entityType = Product::ENTITY;

        if (!$eavSetup->getAttributeId($entityType, 'brand')) {
            $eavSetup->addAttribute($entityType, 'brand', [
                'type' => 'varchar',
                'label' => 'Brand',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'user_defined' => true,
                'searchable' => true,
                'filterable' => false,
                'comparable' => false,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'group' => 'General',
            ]);
        }

        if (!$eavSetup->getAttributeId($entityType, 'imei')) {
            $eavSetup->addAttribute($entityType, 'imei', [
                'type' => 'varchar',
                'label' => 'IMEI',
                'input' => 'text',
                'required' => false,
                'visible' => true,
                'user_defined' => true,
                'searchable' => true,
                'filterable' => false,
                'comparable' => true,
                'visible_on_front' => true,
                'used_in_product_listing' => true,
                'global' => ScopedAttributeInterface::SCOPE_GLOBAL,
                'group' => 'General',
                'note' => 'Unique product IMEI for warranty lookup.',
            ]);
        }
    }

    private function ensureCategories(int $rootCategoryId): array
    {
        $definitions = [
            ['name' => 'Desktop', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'Laptop', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'Monitor', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'Apple', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'GPU', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'CPU', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'RAM', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'SSD', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'HDD', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'Mainboard', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'PSU', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'Heatsink', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'Fan', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'Case', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'Accessories', 'parent' => null, 'include_in_menu' => true],
            ['name' => 'MacBook', 'parent' => 'Apple', 'include_in_menu' => true],
            ['name' => 'Mac Desktop', 'parent' => 'Apple', 'include_in_menu' => true],
            ['name' => 'iPhone', 'parent' => 'Apple', 'include_in_menu' => true],
            ['name' => 'iPad', 'parent' => 'Apple', 'include_in_menu' => true],
            ['name' => 'AirPods', 'parent' => 'Apple', 'include_in_menu' => true],
            ['name' => 'Apple Watch', 'parent' => 'Apple', 'include_in_menu' => true],
            ['name' => 'Gaming Laptop', 'parent' => 'Laptop', 'include_in_menu' => true],
            ['name' => 'Creator Laptop', 'parent' => 'Laptop', 'include_in_menu' => true],
            ['name' => 'Business Laptop', 'parent' => 'Laptop', 'include_in_menu' => true],
            ['name' => 'Ultrabook', 'parent' => 'Laptop', 'include_in_menu' => true],
            ['name' => 'Gaming Monitor', 'parent' => 'Monitor', 'include_in_menu' => true],
            ['name' => 'Creator Monitor', 'parent' => 'Monitor', 'include_in_menu' => true],
            ['name' => 'Ultrawide Monitor', 'parent' => 'Monitor', 'include_in_menu' => true],
            ['name' => '4K Monitor', 'parent' => 'Monitor', 'include_in_menu' => true],
        ];

        $categoryMap = [];
        foreach ($definitions as $definition) {
            $parentId = $definition['parent'] === null
                ? $rootCategoryId
                : ($categoryMap[$this->normalizeKey($definition['parent'])] ?? $rootCategoryId);

            $category = $this->getOrCreateCategory(
                $definition['name'],
                $parentId,
                (bool) $definition['include_in_menu']
            );

            $categoryMap[$this->normalizeKey($definition['name'])] = (int) $category->getId();
        }

        return $categoryMap;
    }

    private function getOrCreateCategory(string $name, int $parentId, bool $includeInMenu): Category
    {
        $category = $this->findCategoryByName($name, $parentId);
        if ($category === null) {
            $category = $this->categoryFactory->create();
            $category->setParentId($parentId);
            $category->setPath((string) $parentId);
        }

        $category->setName($name);
        $category->setIsActive(true);
        $category->setIncludeInMenu($includeInMenu);

        if (!$category->getId()) {
            $category->setDisplayMode('PRODUCTS');
            $category->setIsAnchor(1);
        }

        $category->save();

        return $category;
    }

    private function findCategoryByName(string $name, int $parentId): ?Category
    {
        $collection = $this->categoryCollectionFactory->create();
        $collection
            ->addAttributeToSelect(['name', 'include_in_menu'])
            ->addAttributeToFilter('parent_id', $parentId);

        $needle = $this->normalizeKey($name);
        foreach ($collection as $category) {
            if ($this->normalizeKey((string) $category->getName()) === $needle) {
                return $category;
            }
        }

        return null;
    }

    private function upsertProduct(array $definition, array $categoryMap, int $websiteId): void
    {
        try {
            $product = $this->productRepository->get($definition['sku'], true, 0, true);
        } catch (NoSuchEntityException) {
            $product = $this->productFactory->create();
            $product->setSku($definition['sku']);
            $product->setAttributeSetId(4);
            $product->setTypeId(Type::TYPE_SIMPLE);
            $product->setVisibility(Visibility::VISIBILITY_BOTH);
            $product->setStoreId(0);
            $product->setWebsiteIds([$websiteId]);
        }

        $categoryIds = [];
        foreach ($definition['categories'] as $categoryName) {
            $categoryKey = $this->normalizeKey($categoryName);
            if (!empty($categoryMap[$categoryKey])) {
                $categoryIds[] = (int) $categoryMap[$categoryKey];
            }
        }

        $product->setName($definition['name']);
        $product->setStatus(Status::STATUS_ENABLED);
        $product->setPrice($this->normalizeUsdPrice((float) $definition['price']));
        $product->setWeight((float) ($definition['weight'] ?? 1));
        $product->setTaxClassId(2);
        $product->setData('brand', $definition['brand']);
        $product->setShortDescription($definition['short_description']);
        $product->setDescription($definition['description']);
        $product->setMetaTitle($definition['name']);
        $product->setMetaKeyword($definition['brand'] . ', ' . implode(', ', $definition['categories']));
        $product->setMetaDescription(strip_tags($definition['short_description']));
        $product->setData('imei', $definition['imei'] ?? $this->buildImei($definition['sku']));
        $product->setCategoryIds(array_values(array_unique($categoryIds)));

        if (array_key_exists('special_price', $definition)) {
            if ($definition['special_price'] !== null) {
                $product->setSpecialPrice($this->normalizeUsdPrice((float) $definition['special_price']));
            } else {
                $product->setSpecialPrice(null);
            }
        }

        $this->productRepository->save($product);

        $stockItem = $this->stockRegistry->getStockItemBySku($definition['sku']);
        $qty = (float) $definition['qty'];
        $stockItem->setQty($qty);
        $stockItem->setIsInStock($qty > 0);
        $stockItem->setManageStock(true);
        $this->stockRegistry->updateStockItemBySku($definition['sku'], $stockItem);
    }

    private function enrichExistingCatalog(array $categoryMap): void
    {
        $collection = $this->productCollectionFactory->create();
        $collection->addAttributeToSelect(['name', 'sku', 'brand', 'imei', 'price', 'special_price']);
        $managedCategoryIds = array_map('intval', array_values($categoryMap));

        foreach ($collection as $product) {
            $categoryIds = array_values(array_diff(array_map('intval', (array) $product->getCategoryIds()), $managedCategoryIds));

            foreach ($this->inferCategoryNames($product) as $categoryName) {
                $key = $this->normalizeKey($categoryName);
                if (!empty($categoryMap[$key])) {
                    $categoryIds[] = (int) $categoryMap[$key];
                }
            }

            $product->setCategoryIds(array_values(array_unique($categoryIds)));

            if (!(string) $product->getData('imei')) {
                $product->setData('imei', $this->buildImei((string) $product->getSku()));
            }

            if (!(string) $product->getData('brand')) {
                $product->setData('brand', $this->inferBrand($product));
            }

            $currentPrice = (float) $product->getPrice();
            $product->setPrice($this->normalizeUsdPrice($currentPrice));

            $specialPrice = $product->getData('special_price');
            if ($specialPrice !== null && $specialPrice !== '') {
                $product->setSpecialPrice($this->normalizeUsdPrice((float) $specialPrice));
            }

            $this->productRepository->save($product);
        }
    }

    private function inferCategoryNames(Product $product): array
    {
        $name = mb_strtolower((string) $product->getName());
        $sku = mb_strtolower((string) $product->getSku());
        $currentNames = array_map(
            static fn ($value): string => mb_strtolower((string) $value),
            $product->getCategoryCollection()->addAttributeToSelect('name')->getColumnValues('name')
        );
        $haystack = trim($name . ' ' . $sku . ' ' . implode(' ', $currentNames));
        $categories = [];

        if ($this->containsAny($haystack, ['gpu', 'geforce', 'rtx', 'radeon', 'vga', 'graphics'])) {
            $categories[] = 'Desktop';
            $categories[] = 'GPU';
        }
        if (
            $this->containsAny($haystack, ['cpu', 'ryzen', 'intel core', 'threadripper', 'processor'])
            && !$this->containsAny($haystack, ['cooler', 'aio', 'radiator', 'cpu cooler'])
        ) {
            $categories[] = 'Desktop';
            $categories[] = 'CPU';
        }
        if ($this->containsAny($haystack, ['ram', 'ddr4', 'ddr5', 'memory'])) {
            $categories[] = 'Desktop';
            $categories[] = 'RAM';
        }
        if ($this->containsAny($haystack, ['ssd', 'nvme', 'pcie', 'm.2'])) {
            $categories[] = 'Desktop';
            $categories[] = 'SSD';
        }
        if ($this->containsAny($haystack, ['hdd', 'hard drive'])) {
            $categories[] = 'Desktop';
            $categories[] = 'HDD';
        }
        if ($this->containsAny($haystack, ['mainboard', 'motherboard', 'z790', 'b650', 'x870'])) {
            $categories[] = 'Desktop';
            $categories[] = 'Mainboard';
        }
        if ($this->containsAny($haystack, ['psu', 'power supply', 'watt'])) {
            $categories[] = 'Desktop';
            $categories[] = 'PSU';
        }
        if ($this->containsAny($haystack, ['heatsink', 'cooler', 'aio', 'radiator', 'nh-d15', 'kraken'])) {
            $categories[] = 'Desktop';
            $categories[] = 'Heatsink';
        }
        if ($this->containsAny($haystack, ['fan', '120mm', '140mm'])) {
            $categories[] = 'Desktop';
            $categories[] = 'Fan';
        }
        if ($this->containsAny($haystack, ['case', 'tower', 'chassis']) && !$this->containsAny($haystack, ['case fan'])) {
            $categories[] = 'Desktop';
            $categories[] = 'Case';
        }

        if ($this->containsAny($haystack, ['laptop', 'notebook', 'macbook', 'xps', 'zephyrus', 'omen', 'legion', 'loq'])) {
            $categories[] = 'Laptop';
        }
        if ($this->containsAny($haystack, ['gaming laptop', 'rog', 'omen', 'predator', 'legion'])) {
            $categories[] = 'Gaming Laptop';
        }
        if ($this->containsAny($haystack, ['xps', 'creator', 'proart', 'studio'])) {
            $categories[] = 'Creator Laptop';
        }
        if ($this->containsAny($haystack, ['business', 'thinkpad', 'elitebook', 'zenbook', 'latitude'])) {
            $categories[] = 'Business Laptop';
        }
        if ($this->containsAny($haystack, ['ultrabook', 'macbook air'])) {
            $categories[] = 'Ultrabook';
        }

        if ($this->containsAny($haystack, ['monitor', 'display', 'ultragear', 'odyssey', 'proart', 'alienware aw'])) {
            $categories[] = 'Monitor';
        }
        if ($this->containsAny($haystack, ['144hz', '165hz', '240hz', 'gaming monitor', 'odyssey', 'ultragear'])) {
            $categories[] = 'Gaming Monitor';
        }
        if ($this->containsAny($haystack, ['proart', 'creator monitor'])) {
            $categories[] = 'Creator Monitor';
        }
        if ($this->containsAny($haystack, ['ultrawide', '34"', '38"', '49"', 'g9', 'qd-oled'])) {
            $categories[] = 'Ultrawide Monitor';
        }
        if ($this->containsAny($haystack, ['4k', 'uhd'])) {
            $categories[] = '4K Monitor';
        }

        if ($this->containsAny($haystack, ['apple', 'macbook', 'mac studio', 'mac mini', 'imac', 'iphone', 'ipad', 'airpods', 'apple watch'])) {
            $categories[] = 'Apple';
        }
        if ($this->containsAny($haystack, ['macbook'])) {
            $categories[] = 'MacBook';
        }
        if ($this->containsAny($haystack, ['mac studio', 'mac mini', 'imac'])) {
            $categories[] = 'Mac Desktop';
            $categories[] = 'Desktop';
        }
        if ($this->containsAny($haystack, ['iphone'])) {
            $categories[] = 'iPhone';
        }
        if ($this->containsAny($haystack, ['ipad'])) {
            $categories[] = 'iPad';
        }
        if ($this->containsAny($haystack, ['airpods'])) {
            $categories[] = 'AirPods';
        }
        if ($this->containsAny($haystack, ['apple watch', 'watch'])) {
            $categories[] = 'Apple Watch';
        }

        return array_values(array_unique($categories));
    }

    private function inferBrand(Product $product): string
    {
        $name = (string) $product->getName();
        foreach (['AMD', 'ASUS', 'Gigabyte', 'Apple', 'Dell', 'Samsung', 'LG', 'Corsair', 'Lenovo', 'MSI', 'Acer', 'Noctua', 'Ugreen', 'Seagate', 'Fractal', 'NZXT', 'Lian Li'] as $brand) {
            if (stripos($name, $brand) !== false) {
                return $brand;
            }
        }

        return 'Techieworld';
    }

    private function containsAny(string $haystack, array $needles): bool
    {
        foreach ($needles as $needle) {
            if (str_contains($haystack, mb_strtolower($needle))) {
                return true;
            }
        }

        return false;
    }

    private function normalizeKey(string $value): string
    {
        $value = mb_strtolower(trim($value));
        $value = preg_replace('/[^a-z0-9]+/u', '-', $value) ?? $value;

        return trim($value, '-');
    }

    private function normalizeUsdPrice(float $value): float
    {
        if ($value <= 0) {
            return 0.0;
        }

        if ($value > 10000) {
            $value /= self::USD_DIVISOR;
        }

        return round($value, 2);
    }

    private function buildImei(string $seed): string
    {
        $hash = hash('sha256', $seed . '|imei');
        $digits = '';

        foreach (str_split($hash) as $character) {
            $digits .= (string) (hexdec($character) % 10);
            if (strlen($digits) >= 14) {
                break;
            }
        }

        $sum = 0;
        $length = strlen($digits);
        for ($index = 0; $index < $length; $index++) {
            $digit = (int) $digits[$length - 1 - $index];
            if ($index % 2 === 0) {
                $digit *= 2;
                if ($digit > 9) {
                    $digit -= 9;
                }
            }
            $sum += $digit;
        }

        return $digits . ((10 - ($sum % 10)) % 10);
    }

    private function getProductDefinitions(): array
    {
        return [
            [
                'sku' => 'CPU-AMD-Ryzen 9 9950X3D-AM5',
                'name' => 'CPU AMD Ryzen 9 9950X3D (Up 5.7 GHz, 16 Cores 32 Threads, 128MB Cache, AM5)',
                'brand' => 'AMD',
                'price' => 19890000,
                'special_price' => 18990000,
                'qty' => 9,
                'categories' => ['Desktop', 'CPU'],
                'short_description' => 'Zen 5 flagship processor for premium AM5 gaming and creator builds.',
                'description' => '<p>AMD Ryzen 9 9950X3D delivers top-tier gaming throughput, heavy creator performance, and efficient AM5 platform longevity for premium desktop builds.</p>',
            ],
            [
                'sku' => 'VGA-ASUS-RTX5090-OC',
                'name' => 'Card ASUS ROG Astral GeForce RTX 5090 OC Edition 32GB GDDR7',
                'brand' => 'ASUS',
                'price' => 94990000,
                'special_price' => 92990000,
                'qty' => 3,
                'categories' => ['Desktop', 'GPU'],
                'short_description' => 'Extreme flagship ASUS graphics card tuned for 4K, AI, and workstation-grade rendering.',
                'description' => '<p>ROG Astral RTX 5090 OC Edition pairs flagship GDDR7 bandwidth with a heavy-duty cooling design for elite gaming, AI workloads, and production rendering.</p>',
            ],
            [
                'sku' => 'Mainboard-Gigabyte-Z890-AORUS-EXTREME',
                'name' => 'Mainboard Gigabyte Z890 AORUS XTREME AI TOP',
                'brand' => 'Gigabyte',
                'price' => 26990000,
                'special_price' => 24990000,
                'qty' => 6,
                'categories' => ['Desktop', 'Mainboard'],
                'short_description' => 'Flagship Intel Z890 motherboard with AI tuning, premium power, and next-gen connectivity.',
                'description' => '<p>Gigabyte Z890 AORUS XTREME AI TOP is built for Intel enthusiast systems with robust VRM delivery, premium thermals, and flagship networking.</p>',
            ],
            [
                'sku' => 'DESK-TW-CREATOR-01',
                'name' => 'Techieworld Creator Tower RTX 5070 Ti Ryzen 9 9900X',
                'brand' => 'Techieworld',
                'price' => 52990000,
                'special_price' => 49990000,
                'qty' => 7,
                'categories' => ['Desktop', 'Case'],
                'short_description' => 'A ready-to-ship creator desktop tuned for editing, rendering, and premium 1440p gaming.',
                'description' => '<p>Techieworld Creator Tower pairs Ryzen 9 9900X performance with GeForce RTX 5070 Ti graphics, fast DDR5 memory, and high-airflow cooling.</p>',
            ],
            [
                'sku' => 'DESK-TW-WORKSTATION-01',
                'name' => 'Techieworld Compact Workstation Core Ultra 9 RTX 4060',
                'brand' => 'Techieworld',
                'price' => 33990000,
                'special_price' => 31990000,
                'qty' => 5,
                'categories' => ['Desktop', 'Case'],
                'short_description' => 'Compact workstation desktop built for code, CAD, office production, and balanced GPU acceleration.',
                'description' => '<p>This compact Techieworld workstation focuses on quiet thermals, stable Intel Core Ultra performance, and dependable RTX graphics for daily production work.</p>',
            ],
            [
                'sku' => 'LAP-APPLE-MBA15-M3',
                'name' => 'Apple MacBook Air 15 M3 16GB 512GB',
                'brand' => 'Apple',
                'price' => 41990000,
                'special_price' => 39990000,
                'qty' => 12,
                'categories' => ['Laptop', 'Apple', 'MacBook', 'Ultrabook'],
                'short_description' => 'Thin-and-light Apple notebook with a large display, long battery life, and strong M3 everyday performance.',
                'description' => '<p>MacBook Air 15 with Apple M3 is ideal for students, developers, and mobile creators who want a larger screen without giving up portability.</p>',
            ],
            [
                'sku' => 'LAP-APPLE-MBP14-M4PRO',
                'name' => 'Apple MacBook Pro 14 M4 Pro 24GB 1TB',
                'brand' => 'Apple',
                'price' => 63990000,
                'special_price' => 61990000,
                'qty' => 8,
                'categories' => ['Laptop', 'Apple', 'MacBook', 'Creator Laptop'],
                'short_description' => 'Professional Apple notebook for development, editing, and demanding creator workflows.',
                'description' => '<p>MacBook Pro 14 with M4 Pro combines a bright Liquid Retina XDR display, strong sustained performance, and long battery life for serious professional work.</p>',
            ],
            [
                'sku' => 'DESK-APPLE-MAC-STUDIO-M3U',
                'name' => 'Apple Mac Studio M3 Ultra 96GB 2TB',
                'brand' => 'Apple',
                'price' => 119990000,
                'special_price' => null,
                'qty' => 3,
                'categories' => ['Desktop', 'Apple', 'Mac Desktop'],
                'short_description' => 'High-density Apple desktop for rendering, audio, and advanced production pipelines.',
                'description' => '<p>Mac Studio M3 Ultra delivers Apple silicon workstation-class performance in a compact desktop made for video, 3D, code compilation, and pro audio.</p>',
            ],
            [
                'sku' => 'APL-IPHONE-16PM-256',
                'name' => 'Apple iPhone 16 Pro Max 256GB Natural Titanium',
                'brand' => 'Apple',
                'price' => 36990000,
                'special_price' => 35990000,
                'qty' => 10,
                'categories' => ['Apple', 'iPhone'],
                'short_description' => 'Flagship iPhone with a premium display, fast camera pipeline, and strong everyday battery life.',
                'description' => '<p>iPhone 16 Pro Max offers Apple’s best large-format mobile experience with premium cameras, smooth performance, and a titanium build.</p>',
            ],
            [
                'sku' => 'APL-IPAD-PRO13-M4-256',
                'name' => 'Apple iPad Pro 13 M4 256GB Wi-Fi',
                'brand' => 'Apple',
                'price' => 35990000,
                'special_price' => 34490000,
                'qty' => 9,
                'categories' => ['Apple', 'iPad'],
                'short_description' => 'Ultra-thin iPad Pro for drawing, note-taking, content review, and premium mobile workflows.',
                'description' => '<p>iPad Pro 13 with Apple M4 combines a tandem OLED display with flagship tablet performance for creators, students, and mobile professionals.</p>',
            ],
            [
                'sku' => 'APL-AIRPODS-PRO2-USBC',
                'name' => 'Apple AirPods Pro 2 USB-C',
                'brand' => 'Apple',
                'price' => 6290000,
                'special_price' => 5790000,
                'qty' => 25,
                'categories' => ['Apple', 'AirPods', 'Accessories'],
                'short_description' => 'Premium Apple true wireless earbuds with ANC, transparency, and seamless ecosystem pairing.',
                'description' => '<p>AirPods Pro 2 with USB-C bring flagship active noise cancellation, improved comfort, and strong Apple ecosystem integration for daily listening.</p>',
            ],
            [
                'sku' => 'APL-WATCH-S10-46',
                'name' => 'Apple Watch Series 10 46mm GPS Aluminum',
                'brand' => 'Apple',
                'price' => 11990000,
                'special_price' => 11290000,
                'qty' => 14,
                'categories' => ['Apple', 'Apple Watch'],
                'short_description' => 'Premium Apple smartwatch focused on health tracking, notifications, and everyday convenience.',
                'description' => '<p>Apple Watch Series 10 balances health metrics, bright always-on viewing, and strong day-to-day usability for active Apple users.</p>',
            ],
            [
                'sku' => 'LAP-ASUS-ZEPHYRUS-G16-4070',
                'name' => 'ASUS ROG Zephyrus G16 Core Ultra 9 RTX 4070 OLED',
                'brand' => 'ASUS',
                'price' => 57990000,
                'special_price' => 54990000,
                'qty' => 6,
                'categories' => ['Laptop', 'Gaming Laptop'],
                'short_description' => 'Premium gaming laptop with RTX graphics, OLED visuals, and creator-friendly portability.',
                'description' => '<p>ROG Zephyrus G16 blends Intel Core Ultra speed, RTX 4070 graphics, and an OLED panel for gaming, streaming, and content production.</p>',
            ],
            [
                'sku' => 'LAP-DELL-XPS16-9640',
                'name' => 'Dell XPS 16 9640 Core Ultra 7 RTX 4060 OLED',
                'brand' => 'Dell',
                'price' => 68990000,
                'special_price' => null,
                'qty' => 4,
                'categories' => ['Laptop', 'Creator Laptop'],
                'short_description' => 'Premium creator notebook with a large OLED panel and refined build quality.',
                'description' => '<p>Dell XPS 16 is built for premium productivity and creative work, pairing a clean chassis with strong Intel and RTX hardware.</p>',
            ],
            [
                'sku' => 'LAP-LENOVO-LEGION7I-4080',
                'name' => 'Lenovo Legion 7i Gen 9 Core i9 RTX 4080',
                'brand' => 'Lenovo',
                'price' => 69990000,
                'special_price' => 66990000,
                'qty' => 5,
                'categories' => ['Laptop', 'Gaming Laptop'],
                'short_description' => 'High-performance Lenovo gaming notebook for AAA play, streaming, and heavy multitasking.',
                'description' => '<p>Legion 7i Gen 9 offers flagship Intel and RTX-class gaming hardware in a premium design tuned for cooling and sustained power.</p>',
            ],
            [
                'sku' => 'MON-SAMSUNG-ODYSSEY-G8-OLED',
                'name' => 'Samsung Odyssey OLED G8 32 4K 240Hz',
                'brand' => 'Samsung',
                'price' => 29990000,
                'special_price' => 28490000,
                'qty' => 7,
                'categories' => ['Monitor', 'Gaming Monitor', '4K Monitor'],
                'short_description' => 'Premium Samsung 4K OLED gaming display with deep contrast and high refresh.',
                'description' => '<p>Odyssey OLED G8 is built for premium gaming with deep blacks, 4K sharpness, and 240Hz responsiveness in a premium desktop setup.</p>',
            ],
            [
                'sku' => 'MON-LG-32GS95UE-OLED',
                'name' => 'LG UltraGear 32GS95UE 32 4K OLED 240Hz',
                'brand' => 'LG',
                'price' => 31990000,
                'special_price' => 29990000,
                'qty' => 6,
                'categories' => ['Monitor', 'Gaming Monitor', '4K Monitor'],
                'short_description' => 'Flagship LG OLED monitor for immersive gaming and premium desktop color.',
                'description' => '<p>LG UltraGear 32GS95UE targets enthusiasts who want OLED contrast, responsive high refresh gaming, and detailed 4K clarity.</p>',
            ],
            [
                'sku' => 'MON-ASUS-PROART-PA32',
                'name' => 'ASUS ProArt PA32UCXR 32 4K Mini-LED',
                'brand' => 'ASUS',
                'price' => 45990000,
                'special_price' => null,
                'qty' => 3,
                'categories' => ['Monitor', 'Creator Monitor', '4K Monitor'],
                'short_description' => 'Color-accurate creator monitor designed for grading, photography, and studio review.',
                'description' => '<p>ASUS ProArt PA32UCXR focuses on calibrated color, creator workflows, and professional review environments where precision matters.</p>',
            ],
            [
                'sku' => 'CPU-AMD-Ryzen 9 9900X-AM5',
                'name' => 'CPU AMD Ryzen 9 9900X (Up 5.6 GHz, 12 Cores 24 Threads, AM5)',
                'brand' => 'AMD',
                'price' => 15490000,
                'special_price' => null,
                'qty' => 18,
                'categories' => ['Desktop', 'CPU'],
                'short_description' => 'Balanced Ryzen 9 desktop processor for premium gaming and creator builds.',
                'description' => '<p>Ryzen 9 9900X offers strong AM5 desktop performance for gaming, coding, and production work.</p>',
            ],
            [
                'sku' => 'CPU-AMD-Ryzen 7 9800X3D-AM5',
                'name' => 'CPU AMD Ryzen 7 9800X3D (Up 5.2 GHz, 8 Cores 16 Threads, AM5)',
                'brand' => 'AMD',
                'price' => 13990000,
                'special_price' => 13490000,
                'qty' => 20,
                'categories' => ['Desktop', 'CPU'],
                'short_description' => 'High-value X3D gaming processor for AM5 enthusiasts.',
                'description' => '<p>Ryzen 7 9800X3D focuses on fast gaming performance with efficient thermals and a strong AM5 upgrade path.</p>',
            ],
            [
                'sku' => 'GPU-ASUS-TUF-RTX5080-OC',
                'name' => 'Card ASUS TUF Gaming GeForce RTX 5080 OC 16GB GDDR7',
                'brand' => 'ASUS',
                'price' => 54990000,
                'special_price' => null,
                'qty' => 8,
                'categories' => ['Desktop', 'GPU'],
                'short_description' => 'Premium ASUS graphics card built for ultra settings and 4K play.',
                'description' => '<p>ASUS TUF RTX 5080 OC combines flagship cooling and next-gen GeForce performance for premium desktop systems.</p>',
            ],
            [
                'sku' => 'GPU-ASUS-PRIME-RTX5070TI-OC',
                'name' => 'Card ASUS Prime GeForce RTX 5070 Ti OC 16GB GDDR7',
                'brand' => 'ASUS',
                'price' => 32990000,
                'special_price' => 30990000,
                'qty' => 12,
                'categories' => ['Desktop', 'GPU'],
                'short_description' => 'High-end GeForce card for fast 1440p and entry 4K desktop builds.',
                'description' => '<p>ASUS Prime RTX 5070 Ti OC delivers strong ray tracing and AI throughput in a clean triple-fan design.</p>',
            ],
            [
                'sku' => 'MB-GIGABYTE-X870E-AORUS-MASTER',
                'name' => 'Mainboard Gigabyte X870E AORUS MASTER',
                'brand' => 'Gigabyte',
                'price' => 16990000,
                'special_price' => null,
                'qty' => 14,
                'categories' => ['Desktop', 'Mainboard'],
                'short_description' => 'Flagship AMD AM5 motherboard with strong VRM and premium connectivity.',
                'description' => '<p>X870E AORUS MASTER is built for Ryzen flagship systems with robust power delivery and top-tier expansion.</p>',
            ],
            [
                'sku' => 'MB-GIGABYTE-B650E-AORUS-ELITE-AX',
                'name' => 'Mainboard Gigabyte B650E AORUS ELITE AX ICE',
                'brand' => 'Gigabyte',
                'price' => 7990000,
                'special_price' => 7490000,
                'qty' => 22,
                'categories' => ['Desktop', 'Mainboard'],
                'short_description' => 'Value-focused AM5 board with Wi-Fi and PCIe Gen5 support.',
                'description' => '<p>B650E AORUS ELITE AX ICE brings strong daily AM5 performance and expansion for modern desktop builds.</p>',
            ],
            [
                'sku' => 'RAM-CORSAIR-DOMINATOR-64-DDR5-6400',
                'name' => 'RAM Corsair Dominator Titanium RGB 64GB DDR5 6400',
                'brand' => 'Corsair',
                'price' => 8590000,
                'special_price' => null,
                'qty' => 26,
                'categories' => ['Desktop', 'RAM'],
                'short_description' => 'Premium DDR5 kit for flagship gaming and creator systems.',
                'description' => '<p>Corsair Dominator Titanium RGB 64GB pairs premium thermals with fast DDR5 speed for modern high-end PCs.</p>',
            ],
            [
                'sku' => 'RAM-CORSAIR-VENGEANCE-32-DDR5-6000',
                'name' => 'RAM Corsair Vengeance RGB 32GB DDR5 6000',
                'brand' => 'Corsair',
                'price' => 3490000,
                'special_price' => 3190000,
                'qty' => 34,
                'categories' => ['Desktop', 'RAM'],
                'short_description' => 'Fast DDR5 memory kit for balanced performance desktops.',
                'description' => '<p>Corsair Vengeance RGB 32GB DDR5 6000 is an ideal memory choice for gaming and productivity PCs.</p>',
            ],
            [
                'sku' => 'RAM-CORSAIR-VENGEANCE-64-DDR5-6400',
                'name' => 'RAM Corsair Vengeance RGB 64GB DDR5 6400',
                'brand' => 'Corsair',
                'price' => 5890000,
                'special_price' => null,
                'qty' => 28,
                'categories' => ['Desktop', 'RAM'],
                'short_description' => 'High-capacity DDR5 kit for demanding multitasking and creator work.',
                'description' => '<p>Vengeance RGB 64GB DDR5 6400 delivers higher memory capacity for editing, coding, and heavy multitasking.</p>',
            ],
            [
                'sku' => 'SSD-SEAGATE-FIRECUDA-530R-2TB',
                'name' => 'SSD Seagate FireCuda 530R 2TB PCIe Gen4 NVMe',
                'brand' => 'Seagate',
                'price' => 5190000,
                'special_price' => 4890000,
                'qty' => 30,
                'categories' => ['Desktop', 'SSD'],
                'short_description' => 'High-speed NVMe SSD for games, workstations, and creator files.',
                'description' => '<p>FireCuda 530R 2TB offers fast Gen4 storage for game libraries, scratch disks, and daily desktop speed.</p>',
            ],
            [
                'sku' => 'SSD-SEAGATE-FIRECUDA-530R-4TB',
                'name' => 'SSD Seagate FireCuda 530R 4TB PCIe Gen4 NVMe',
                'brand' => 'Seagate',
                'price' => 9990000,
                'special_price' => null,
                'qty' => 18,
                'categories' => ['Desktop', 'SSD'],
                'short_description' => 'Large-capacity Gen4 SSD for premium gaming and creator builds.',
                'description' => '<p>FireCuda 530R 4TB gives desktop users fast storage and large capacity in a single NVMe drive.</p>',
            ],
            [
                'sku' => 'SSD-SEAGATE-FIRECUDA-540-1TB',
                'name' => 'SSD Seagate FireCuda 540 1TB PCIe Gen5 NVMe',
                'brand' => 'Seagate',
                'price' => 2890000,
                'special_price' => null,
                'qty' => 32,
                'categories' => ['Desktop', 'SSD'],
                'short_description' => 'Entry Gen5 storage for ultra-fast desktop boot and load times.',
                'description' => '<p>FireCuda 540 1TB brings PCIe Gen5 responsiveness to enthusiast desktops that need top-tier storage speed.</p>',
            ],
            [
                'sku' => 'HDD-SEAGATE-IRONWOLF-8TB',
                'name' => 'HDD Seagate IronWolf 8TB 7200RPM NAS Drive',
                'brand' => 'Seagate',
                'price' => 5390000,
                'special_price' => null,
                'qty' => 22,
                'categories' => ['Desktop', 'HDD'],
                'short_description' => 'Reliable high-capacity hard drive for NAS and archival desktops.',
                'description' => '<p>IronWolf 8TB provides dependable high-capacity storage for desktop backups, media, and project archives.</p>',
            ],
            [
                'sku' => 'HDD-SEAGATE-IRONWOLFPRO-12TB',
                'name' => 'HDD Seagate IronWolf Pro 12TB 7200RPM NAS Drive',
                'brand' => 'Seagate',
                'price' => 8790000,
                'special_price' => 8290000,
                'qty' => 16,
                'categories' => ['Desktop', 'HDD'],
                'short_description' => 'Professional NAS drive for larger creator and workstation storage arrays.',
                'description' => '<p>IronWolf Pro 12TB is tuned for heavier workloads and larger always-on storage deployments.</p>',
            ],
            [
                'sku' => 'HDD-SEAGATE-EXOS-X20-20TB',
                'name' => 'HDD Seagate Exos X20 20TB Enterprise Drive',
                'brand' => 'Seagate',
                'price' => 12990000,
                'special_price' => null,
                'qty' => 12,
                'categories' => ['Desktop', 'HDD'],
                'short_description' => 'Enterprise-grade hard drive for large storage pools and backups.',
                'description' => '<p>Exos X20 20TB offers large-capacity storage for servers, content archives, and workstation projects.</p>',
            ],
            [
                'sku' => 'PSU-CORSAIR-RM850X-SHIFT',
                'name' => 'PSU Corsair RM850x Shift 850W 80 Plus Gold',
                'brand' => 'Corsair',
                'price' => 4190000,
                'special_price' => null,
                'qty' => 24,
                'categories' => ['Desktop', 'PSU'],
                'short_description' => 'Quiet fully modular PSU for premium gaming and creator desktops.',
                'description' => '<p>RM850x Shift offers clean cable routing and stable 80 Plus Gold power for modern PC builds.</p>',
            ],
            [
                'sku' => 'PSU-CORSAIR-RM1000X-SHIFT',
                'name' => 'PSU Corsair RM1000x Shift 1000W 80 Plus Gold',
                'brand' => 'Corsair',
                'price' => 5790000,
                'special_price' => 5490000,
                'qty' => 18,
                'categories' => ['Desktop', 'PSU'],
                'short_description' => '1000W modular PSU for high-power RTX builds and workstations.',
                'description' => '<p>RM1000x Shift is designed for modern flagship GPUs and clean premium desktop cable management.</p>',
            ],
            [
                'sku' => 'PSU-CORSAIR-HX1200I',
                'name' => 'PSU Corsair HX1200i 1200W 80 Plus Platinum',
                'brand' => 'Corsair',
                'price' => 8990000,
                'special_price' => null,
                'qty' => 12,
                'categories' => ['Desktop', 'PSU'],
                'short_description' => 'High-end platinum PSU for enthusiast and workstation systems.',
                'description' => '<p>HX1200i brings platinum efficiency and stable power delivery to top-end desktop configurations.</p>',
            ],
            [
                'sku' => 'COOL-CORSAIR-TITAN-360-RX',
                'name' => 'CPU Cooler Corsair iCUE LINK TITAN 360 RX RGB',
                'brand' => 'Corsair',
                'price' => 7690000,
                'special_price' => null,
                'qty' => 18,
                'categories' => ['Desktop', 'Heatsink'],
                'short_description' => 'Premium 360mm AIO cooler for flagship desktop CPUs.',
                'description' => '<p>iCUE LINK TITAN 360 RX RGB delivers premium thermals and cleaner cable routing for high-end builds.</p>',
            ],
            [
                'sku' => 'COOL-CORSAIR-H150I-LCD-XT',
                'name' => 'CPU Cooler Corsair iCUE H150i LCD XT 360mm',
                'brand' => 'Corsair',
                'price' => 6990000,
                'special_price' => 6590000,
                'qty' => 16,
                'categories' => ['Desktop', 'Heatsink'],
                'short_description' => 'LCD AIO cooler with premium cooling performance and visual customization.',
                'description' => '<p>H150i LCD XT combines strong 360mm cooling with a customizable display for showcase PCs.</p>',
            ],
            [
                'sku' => 'COOL-CORSAIR-H100I-ELITE',
                'name' => 'CPU Cooler Corsair iCUE H100i Elite 240mm',
                'brand' => 'Corsair',
                'price' => 4190000,
                'special_price' => null,
                'qty' => 20,
                'categories' => ['Desktop', 'Heatsink'],
                'short_description' => 'Compact AIO cooler for balanced gaming and productivity builds.',
                'description' => '<p>H100i Elite offers dependable 240mm liquid cooling for mainstream enthusiast desktops.</p>',
            ],
            [
                'sku' => 'FAN-CORSAIR-QX120-TRIPLE',
                'name' => 'Case Fan Corsair iCUE LINK QX120 RGB Triple Pack',
                'brand' => 'Corsair',
                'price' => 4190000,
                'special_price' => null,
                'qty' => 26,
                'categories' => ['Desktop', 'Fan'],
                'short_description' => 'Premium RGB fan pack for airflow-focused showcase builds.',
                'description' => '<p>QX120 RGB fans deliver strong airflow, lighting, and simplified cable management for modern desktops.</p>',
            ],
            [
                'sku' => 'FAN-CORSAIR-RX120-TRIPLE',
                'name' => 'Case Fan Corsair iCUE LINK RX120 RGB Triple Pack',
                'brand' => 'Corsair',
                'price' => 3290000,
                'special_price' => 2990000,
                'qty' => 24,
                'categories' => ['Desktop', 'Fan'],
                'short_description' => 'Balanced RGB fan kit for clean airflow and lower noise.',
                'description' => '<p>RX120 RGB triple pack is ideal for balanced airflow, lighting, and day-to-day cooling upgrades.</p>',
            ],
            [
                'sku' => 'FAN-CORSAIR-AF120RGB-TRIPLE',
                'name' => 'Case Fan Corsair AF120 RGB Elite Triple Pack',
                'brand' => 'Corsair',
                'price' => 1990000,
                'special_price' => null,
                'qty' => 36,
                'categories' => ['Desktop', 'Fan'],
                'short_description' => 'Affordable RGB airflow kit for mainstream gaming systems.',
                'description' => '<p>AF120 RGB Elite gives builders an easy way to add airflow and clean lighting to new PC builds.</p>',
            ],
            [
                'sku' => 'CASE-CORSAIR-5000D-AIRFLOW',
                'name' => 'Case Corsair 5000D Airflow Tempered Glass',
                'brand' => 'Corsair',
                'price' => 4290000,
                'special_price' => null,
                'qty' => 18,
                'categories' => ['Desktop', 'Case'],
                'short_description' => 'Premium mid-tower chassis focused on cooling and cable management.',
                'description' => '<p>Corsair 5000D Airflow is a versatile high-airflow case for powerful gaming and creator desktops.</p>',
            ],
            [
                'sku' => 'CASE-CORSAIR-3500X-ARGB',
                'name' => 'Case Corsair 3500X ARGB Tempered Glass',
                'brand' => 'Corsair',
                'price' => 3290000,
                'special_price' => 3090000,
                'qty' => 20,
                'categories' => ['Desktop', 'Case'],
                'short_description' => 'Showcase chassis with strong airflow and integrated ARGB presentation.',
                'description' => '<p>3500X ARGB delivers a clean tempered-glass layout for builders who want style and airflow.</p>',
            ],
            [
                'sku' => 'CASE-CORSAIR-6500X',
                'name' => 'Case Corsair 6500X Dual Chamber',
                'brand' => 'Corsair',
                'price' => 5490000,
                'special_price' => null,
                'qty' => 12,
                'categories' => ['Desktop', 'Case'],
                'short_description' => 'Dual-chamber enthusiast case for large showcase PC builds.',
                'description' => '<p>Corsair 6500X offers a roomy dual-chamber layout for flagship systems and clean presentation.</p>',
            ],
            [
                'sku' => 'LAP-APPLE-MBA13-M3',
                'name' => 'Apple MacBook Air 13 M3 16GB 512GB',
                'brand' => 'Apple',
                'price' => 31990000,
                'special_price' => null,
                'qty' => 10,
                'categories' => ['Laptop', 'Apple', 'MacBook', 'Ultrabook'],
                'short_description' => 'Portable Apple laptop for daily work, study, and travel.',
                'description' => '<p>MacBook Air 13 with M3 balances lightweight portability, long battery life, and fast everyday performance.</p>',
            ],
            [
                'sku' => 'LAP-DELL-LATITUDE-9450',
                'name' => 'Dell Latitude 9450 2-in-1 Core Ultra 7 32GB 1TB',
                'brand' => 'Dell',
                'price' => 46990000,
                'special_price' => null,
                'qty' => 9,
                'categories' => ['Laptop', 'Business Laptop'],
                'short_description' => 'Premium business notebook with flexible 2-in-1 productivity.',
                'description' => '<p>Latitude 9450 focuses on business mobility, strong build quality, and efficient daily productivity.</p>',
            ],
            [
                'sku' => 'MON-SAMSUNG-ODYSSEY-NEOG9',
                'name' => 'Samsung Odyssey Neo G9 49 Dual UHD 240Hz',
                'brand' => 'Samsung',
                'price' => 46990000,
                'special_price' => 43990000,
                'qty' => 7,
                'categories' => ['Monitor', 'Gaming Monitor', 'Ultrawide Monitor'],
                'short_description' => 'Immersive super-ultrawide display for premium sim, racing, and multitasking setups.',
                'description' => '<p>Odyssey Neo G9 delivers an expansive 49-inch desktop view for immersive gaming and wide productivity layouts.</p>',
            ],
            [
                'sku' => 'MON-SAMSUNG-VIEWFINITY-S9',
                'name' => 'Samsung ViewFinity S9 27 5K Creator Monitor',
                'brand' => 'Samsung',
                'price' => 32990000,
                'special_price' => null,
                'qty' => 9,
                'categories' => ['Monitor', 'Creator Monitor'],
                'short_description' => 'High-resolution creator monitor for photography, design, and studio workflows.',
                'description' => '<p>ViewFinity S9 offers crisp 5K detail and creator-oriented image quality for professional desktop work.</p>',
            ],
            [
                'sku' => 'DESK-APPLE-MAC-MINI-M4P',
                'name' => 'Apple Mac mini M4 Pro 24GB 512GB',
                'brand' => 'Apple',
                'price' => 41990000,
                'special_price' => null,
                'qty' => 11,
                'categories' => ['Desktop', 'Apple', 'Mac Desktop'],
                'short_description' => 'Compact Apple desktop for development, office work, and creative tasks.',
                'description' => '<p>Mac mini M4 Pro packs strong Apple silicon performance into a compact desktop suited for professional workflows.</p>',
            ],
            [
                'sku' => 'APL-IPHONE-16-128',
                'name' => 'Apple iPhone 16 128GB Ultramarine',
                'brand' => 'Apple',
                'price' => 22990000,
                'special_price' => null,
                'qty' => 14,
                'categories' => ['Apple', 'iPhone'],
                'short_description' => 'Mainstream iPhone with strong cameras and smooth daily performance.',
                'description' => '<p>iPhone 16 brings a balanced Apple mobile experience with excellent battery life and camera quality.</p>',
            ],
            [
                'sku' => 'APL-IPAD-AIR13-M2-128',
                'name' => 'Apple iPad Air 13 M2 128GB Wi-Fi',
                'brand' => 'Apple',
                'price' => 23990000,
                'special_price' => null,
                'qty' => 13,
                'categories' => ['Apple', 'iPad'],
                'short_description' => 'Large-screen iPad Air for note-taking, drawing, and mobile productivity.',
                'description' => '<p>iPad Air 13 with M2 offers a spacious display and strong tablet performance for everyday Apple workflows.</p>',
            ],
            [
                'sku' => 'APL-AIRPODS-4-ANC',
                'name' => 'Apple AirPods 4 with Active Noise Cancellation',
                'brand' => 'Apple',
                'price' => 4990000,
                'special_price' => null,
                'qty' => 25,
                'categories' => ['Apple', 'AirPods', 'Accessories'],
                'short_description' => 'Compact Apple earbuds with everyday ANC and seamless pairing.',
                'description' => '<p>AirPods 4 with ANC bring Apple ecosystem convenience and cleaner listening for work and commuting.</p>',
            ],
            [
                'sku' => 'APL-WATCH-ULTRA2-BLACK',
                'name' => 'Apple Watch Ultra 2 Black Titanium Ocean Band',
                'brand' => 'Apple',
                'price' => 20990000,
                'special_price' => null,
                'qty' => 10,
                'categories' => ['Apple', 'Apple Watch'],
                'short_description' => 'Rugged premium Apple wearable for training, travel, and daily use.',
                'description' => '<p>Apple Watch Ultra 2 is designed for active users who want a larger display, stronger battery life, and durable titanium build.</p>',
            ],
        ];
    }
}
