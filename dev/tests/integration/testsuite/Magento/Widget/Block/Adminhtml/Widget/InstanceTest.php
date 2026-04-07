<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Widget\Block\Adminhtml\Widget;

use Magento\Framework\App\RequestInterface;
use Magento\Framework\Model\ResourceModel\Db\Collection\AbstractCollection;
use Magento\Framework\ObjectManagerInterface;
use Magento\Framework\View\LayoutInterface;
use Magento\Framework\View\Result\PageFactory;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\Theme\Model\ResourceModel\Theme as ThemeResource;
use Magento\Theme\Model\ThemeFactory;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use PHPUnit\Framework\TestCase;

/**
 * Checks widget grid filtering and sorting
 *
 * @magentoAppArea adminhtml
 * @magentoAppIsolation enabled
 * @magentoDbIsolation enabled
 */
class InstanceTest extends TestCase
{
    /** @var ObjectManagerInterface */
    private $objectManager;

    /** @var PageFactory */
    private $pageFactory;

    /** @var RequestInterface */
    private $request;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        parent::setUp();

        $this->objectManager = Bootstrap::getObjectManager();
        $this->request = $this->objectManager->get(RequestInterface::class);
        $this->pageFactory = $this->objectManager->get(PageFactory::class);
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider gridFiltersDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Widget/_files/widgets.php
     *
     * @param array $filter
     * @param array $expectedWidgets
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('gridFiltersDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGridFiltering(array $filter, array $expectedWidgets): void
    {
        $this->request->setParams($filter);
        $collection = $this->getGridCollection();

        $this->assertWidgets($expectedWidgets, $collection);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function gridFiltersDataProvider(): array
=======
    public function gridFiltersDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'first_page' => [
                'filter' => [
                    'limit' => 2,
                    'page' => 1,
                ],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'cms page widget title',
                    'product link widget title',
                ],
            ],
            'second_page' => [
                'filter' => [
                    'limit' => 2,
                    'page' => 2,
                ],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'recently compared products',
                ],
            ],
            'filter_by_title' => [
                'filter' => [
                    'filter' => base64_encode('title=product link widget title'),
                ],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'product link widget title',
                ],
            ],
            'filter_by_type' => [
                'filter' => [
                    'filter' => base64_encode('type=Magento%5CCms%5CBlock%5CWidget%5CPage%5CLink'),
                ],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'cms page widget title',
                ],
            ],
            'filter_by_theme' => [
                'filter' => [
<<<<<<< HEAD
                    'filter' => base64_encode('theme_id=' . self::loadThemeIdByCode('Magento/blank')),
                ],
                'expectedWidgets' => [
=======
                    'filter' => base64_encode('theme_id=' . $this->loadThemeIdByCode('Magento/blank')),
                ],
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'recently compared products',
                ],
            ],
            'filter_by_sort_order' => [
                'filter' => [
                    'filter' => base64_encode('sort_order=1'),
                ],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'recently compared products',
                ],
            ],
            'filter_by_title_and_luma_theme' => [
                'filter' => [
                    'filter' => base64_encode(
<<<<<<< HEAD
                        'title=cms page widget title&theme_id=' . self::loadThemeIdByCode('Magento/luma')
                    ),
                ],
                'expectedWidgets' => [
=======
                        'title=cms page widget title&theme_id=' . $this->loadThemeIdByCode('Magento/luma')
                    ),
                ],
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'cms page widget title',
                ],
            ],
            'filter_by_title_and_blank_theme' => [
                'filter' => [
                    'filter' => base64_encode(
<<<<<<< HEAD
                        'title=recently compared products&theme_id=' . self::loadThemeIdByCode('Magento/blank')
                    ),
                ],
                'expectedWidgets' => [
=======
                        'title=recently compared products&theme_id=' . $this->loadThemeIdByCode('Magento/blank')
                    ),
                ],
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'recently compared products',
                ],
            ],
        ];
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider gridSortDataProvider
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDataFixture Magento/Widget/_files/widgets.php
     *
     * @param array $filter
     * @param array $expectedWidgets
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('gridSortDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGridSorting(array $filter, array $expectedWidgets): void
    {
        $this->request->setParams($filter);
        $collection = $this->getGridCollection();
        $this->assertEquals($expectedWidgets, $collection->getColumnValues('title'));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function gridSortDataProvider(): array
=======
    public function gridSortDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'sort_by_id_asc' => [
                'filter' => ['sort' => 'instance_id', 'dir' => 'asc'],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'cms page widget title',
                    'product link widget title',
                    'recently compared products',
                ],
            ],
            'sort_by_id_desc' => [
                'filter' => ['sort' => 'instance_id', 'dir' => 'desc'],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'recently compared products',
                    'product link widget title',
                    'cms page widget title',
                ],
            ],
            'sort_by_title_asc' => [
                'filter' => ['sort' => 'title', 'dir' => 'asc'],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'cms page widget title',
                    'product link widget title',
                    'recently compared products',
                ],
            ],
            'sort_by_title_desc' => [
                'filter' => ['sort' => 'title', 'dir' => 'desc'],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'recently compared products',
                    'product link widget title',
                    'cms page widget title',
                ],
            ],
            'sort_by_type_asc' => [
                'filter' => ['sort' => 'type', 'dir' => 'asc'],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'product link widget title',
                    'recently compared products',
                    'cms page widget title',
                ],
            ],
            'sort_by_type_desc' => [
                'filter' => ['sort' => 'type', 'dir' => 'desc'],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'cms page widget title',
                    'recently compared products',
                    'product link widget title',
                ],
            ],
            'sort_by_sort_order_asc' => [
                'filter' => ['sort' => 'sort_order', 'dir' => 'asc'],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'recently compared products',
                    'product link widget title',
                    'cms page widget title',
                ],
            ],
            'sort_by_sort_order_desc' => [
                'filter' => ['sort' => 'sort_order', 'dir' => 'desc'],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'cms page widget title',
                    'product link widget title',
                    'recently compared products',
                ],
            ],
            'sort_by_theme_asc' => [
                'filter' => ['sort' => 'theme_id', 'dir' => 'asc'],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'recently compared products',
                    'cms page widget title',
                    'product link widget title',
                ],
            ],
            'sort_by_theme_desc' => [
                'filter' => ['sort' => 'theme_id', 'dir' => 'asc'],
<<<<<<< HEAD
                'expectedWidgets' => [
=======
                'expected_widgets' => [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                    'recently compared products',
                    'cms page widget title',
                    'product link widget title',
                ],
            ],
        ];
    }

    /**
     * Load theme by theme id
     *
     * @param string $code
     * @return int
     */
<<<<<<< HEAD
    private static function loadThemeIdByCode(string $code): int
=======
    private function loadThemeIdByCode(string $code): int
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $objectManager = Bootstrap::getObjectManager();
        /** @var ThemeFactory $themeFactory */
        $themeFactory = $objectManager->get(ThemeFactory::class);
        /** @var ThemeResource $themeResource */
        $themeResource = $objectManager->get(ThemeResource::class);
        $theme = $themeFactory->create();
        $themeResource->load($theme, $code, 'code');

        return (int)$theme->getId();
    }

    /**
     * Assert widget instances
     *
     * @param $expectedWidgets
     * @param AbstractCollection $collection
     * @return void
     */
    private function assertWidgets($expectedWidgets, AbstractCollection $collection): void
    {
        $this->assertCount(count($expectedWidgets), $collection);
        foreach ($expectedWidgets as $widgetTitle) {
            $item = $collection->getItemByColumnValue('title', $widgetTitle);
            $this->assertNotNull($item, sprintf('Expected widget %s is not present in grid', $widgetTitle));
        }
    }

    /**
     * Prepare page layout
     *
     * @return LayoutInterface
     */
    private function preparePageLayout(): LayoutInterface
    {
        $page = $this->pageFactory->create();
        $page->addHandle([
            'default',
            'adminhtml_widget_instance_index',
        ]);

        return $page->getLayout()->generateXml();
    }

    /**
     * Get prepared grid collection
     *
     * @return AbstractCollection
     */
    private function getGridCollection(): AbstractCollection
    {
        $layout = $this->preparePageLayout();
        $containerBlock = $layout->getBlock('adminhtml.widget.instance.grid.container');
        $grid = $containerBlock->getChildBlock('grid');
        $this->assertNotFalse($grid);

        return $grid->getPreparedCollection();
    }
}
