<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\ProductAlert\Model\Mailing;

<<<<<<< HEAD
use Magento\Catalog\Model\ProductFactory;
use Magento\Catalog\Model\ResourceModel\Product as ProductResourceModel;
use Magento\Catalog\Test\Fixture\Product as ProductFixture;
use Magento\Customer\Test\Fixture\Customer as CustomerFixture;
use Magento\Framework\Mail\EmailMessage;
use Magento\ProductAlert\Test\Fixture\PriceAlert as PriceAlertFixture;
use Magento\Store\Model\ScopeInterface;
use Magento\Store\Model\Store;
use Magento\Store\Test\Fixture\Group as StoreGroupFixture;
use Magento\Store\Test\Fixture\Store as StoreFixture;
use Magento\Store\Test\Fixture\Website as WebsiteFixture;
use Magento\TestFramework\Fixture\Config;
use Magento\TestFramework\Fixture\DataFixture;
use Magento\TestFramework\Fixture\DataFixtureStorage;
use Magento\TestFramework\Fixture\DataFixtureStorageManager;
use Magento\TestFramework\Fixture\DbIsolation;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Helper\Xpath;
use Magento\TestFramework\Mail\Template\TransportBuilderMock;
use Magento\TestFramework\ObjectManager;
use Magento\Translation\Test\Fixture\Translation as TranslationFixture;
use PHPUnit\Framework\TestCase;

/**
 * Test for Product Alert observer
 *
 * @magentoAppIsolation enabled
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
=======
use Magento\Customer\Api\AccountManagementInterface;
use Magento\Customer\Model\Session;
use Magento\Framework\App\Area;
use Magento\Framework\Locale\Resolver;
use Magento\Framework\Module\Dir\Reader;
use Magento\Framework\Phrase;
use Magento\Framework\Phrase\Renderer\Translate as PhraseRendererTranslate;
use Magento\Framework\Phrase\RendererInterface;
use Magento\Framework\Translate;
use Magento\Store\Model\StoreRepository;
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\Mail\Template\TransportBuilderMock;
use Magento\TestFramework\ObjectManager;
use PHPUnit\Framework\TestCase;

/**
* Test for Product Alert observer
*
* @magentoAppIsolation enabled
* @magentoAppArea frontend
*/
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
class AlertProcessorTest extends TestCase
{
    /**
     * @var ObjectManager
     */
    private $objectManager;

    /**
     * @var Publisher
     */
    private $publisher;

    /**
     * @var AlertProcessor
     */
    private $alertProcessor;

    /**
     * @var TransportBuilderMock
     */
    private $transportBuilder;

    /**
<<<<<<< HEAD
     * @var DataFixtureStorage
     */
    private $fixtures;

    /**
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @inheritDoc
     */
    protected function setUp(): void
    {
        $this->objectManager = Bootstrap::getObjectManager();
        $this->publisher = $this->objectManager->get(Publisher::class);
        $this->alertProcessor = $this->objectManager->get(AlertProcessor::class);

        $this->transportBuilder = $this->objectManager->get(TransportBuilderMock::class);
<<<<<<< HEAD
        $this->fixtures = DataFixtureStorageManager::getStorage();
    }

    #[
        Config('catalog/productalert/allow_price', 1),
        DataFixture(CustomerFixture::class, as: 'customer'),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(
            PriceAlertFixture::class,
            [
                'customer_id' => '$customer.id$',
                'product_id' => '$product.id$',
            ]
        ),
    ]
    public function testProcess()
    {
        $customerId = (int) $this->fixtures->get('customer')->getId();
        $customerName = $this->fixtures->get('customer')->getName();
        $this->processAlerts($customerId);

        $messageContent = quoted_printable_decode($this->transportBuilder->getSentMessage()->getBody()->bodyToString());
        /** Checking is the email was sent */
        $this->assertStringContainsString(
            $customerName,
            $messageContent
        );
        $this->assertStringContainsString(
            'Price change alert! We wanted you to know that prices have changed for these products:',
            $messageContent
        );
    }

    #[
        DbIsolation(false),
        DataFixture(WebsiteFixture::class, as: 'website2'),
        DataFixture(StoreGroupFixture::class, ['website_id' => '$website2.id$'], 'store_group2'),
        DataFixture(StoreFixture::class, ['store_group_id' => '$store_group2.id$', 'code' => 'pt_br_store'], 'store2'),
        DataFixture(CustomerFixture::class, ['website_id' => 1], as: 'customer1'),
        DataFixture(CustomerFixture::class, ['website_id' => '$website2.id$'], as: 'customer2'),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(
            PriceAlertFixture::class,
            [
                'customer_id' => '$customer1.id$',
                'product_id' => '$product.id$',
                'store_id' => 1,
            ]
        ),
        DataFixture(
            PriceAlertFixture::class,
            [
                'customer_id' => '$customer2.id$',
                'product_id' => '$product.id$',
                'store_id' => '$store2.id$',
            ]
        ),
        DataFixture(
            TranslationFixture::class,
            [
                'string' => 'Price change alert! We wanted you to know that prices have changed for these products:',
                'translate' => 'Alerte changement de prix! Nous voulions que vous sachiez' .
                    ' que les prix ont changé pour ces produits:',
                'locale' => 'fr_FR',
            ],
            'frTxt'
        ),
        DataFixture(
            TranslationFixture::class,
            [
                'string' => 'Price change alert! We wanted you to know that prices have changed for these products:',
                'translate' => 'Alerta de mudanca de preco! Queriamos que voce soubesse' .
                    ' que os precos mudaram para esses produtos:',
                'locale' => 'pt_BR',
            ],
            'ptTxt'
        ),
        Config('catalog/productalert/allow_price', 1),
        Config('general/locale/code', 'fr_FR', ScopeInterface::SCOPE_STORE, 'default'),
        Config('general/locale/code', 'pt_BR', ScopeInterface::SCOPE_STORE, 'pt_br_store'),
    ]
    public function testEmailShouldBeTranslatedToStoreLanguage()
    {
        $customer1Id = (int) $this->fixtures->get('customer1')->getId();
        $customer2Id = (int) $this->fixtures->get('customer2')->getId();
        $website2Id = (int) $this->fixtures->get('website2')->getId();
        $frTxt = $this->fixtures->get('frTxt')->getTranslate();
        $ptTxt = $this->fixtures->get('ptTxt')->getTranslate();

        // Check email from main website
        $this->processAlerts($customer1Id);
        $message = $this->transportBuilder->getSentMessage();
        $messageContent = quoted_printable_decode($message->getBody()->bodyToString());
        $this->assertStringContainsString('/frontend/Magento/luma/fr_FR/', $messageContent);
        $this->assertStringContainsString($frTxt, $messageContent);

        // Check email from second website
        $this->processAlerts($customer2Id, $website2Id);
        $message = $this->transportBuilder->getSentMessage();
        $messageContent = quoted_printable_decode($message->getBody()->bodyToString());
        $this->assertStringContainsString('/frontend/Magento/luma/pt_BR/', $messageContent);
        $this->assertStringContainsString($ptTxt, $messageContent);
    }

    #[
        Config('catalog/productalert/allow_price', 1),
        DataFixture(CustomerFixture::class, as: 'customer'),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(
            PriceAlertFixture::class,
            [
                'customer_id' => '$customer.id$',
                'product_id' => '$product.id$',
            ]
        ),
    ]
    public function testCustomerShouldGetEmailForEveryProductPriceDrop(): void
    {
        $customerId = (int) $this->fixtures->get('customer')->getId();
        $productId = (int) $this->fixtures->get('product')->getId();
        $this->processAlerts($customerId);
        $messageContent = quoted_printable_decode($this->transportBuilder->getSentMessage()->getBody()->bodyToString());
        $this->assertStringContainsString(
            '$10.00',
            $messageContent
        );

        // Intentional: update product without using ProductRepository
        // to prevent changes from being cached on application level
        $product = $this->objectManager->get(ProductFactory::class)->create();
        $productResource = $this->objectManager->get(ProductResourceModel::class);
        $product->setStoreId(Store::DEFAULT_STORE_ID);
        $productResource->load($product, $productId);
        $product->setPrice(5);
        $productResource->save($product);

        $this->processAlerts($customerId);
        $messageContent = quoted_printable_decode($this->transportBuilder->getSentMessage()->getBody()->bodyToString());
        $this->assertStringContainsString(
            '$5.00',
            $messageContent
        );
    }

    #[
        Config('catalog/productalert/allow_price', 1),
        DataFixture(CustomerFixture::class, as: 'customer'),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(
            PriceAlertFixture::class,
            [
                'customer_id' => '$customer.id$',
                'product_id' => '$product.id$',
            ]
        ),
    ]
    public function testValidateCurrentTheme()
    {
        $customerId = (int) $this->fixtures->get('customer')->getId();
        $this->processAlerts($customerId);

        $message = $this->transportBuilder->getSentMessage();
        $messageContent = $this->getMessageRawContent($message);
        $img = Xpath::getElementsForXpath('//img[@class="photo image"]', $messageContent);
        $this->assertMatchesRegularExpression(
            '/frontend\/Magento\/luma\/.+\/thumbnail.jpg$/',
            $img->item(0)->getAttribute('src')
        );
    }

    #[
        DbIsolation(false),
        DataFixture(StoreFixture::class, ['code' => 'pt_br_store'], 'store2'),
        DataFixture(CustomerFixture::class, as: 'customer'),
        DataFixture(ProductFixture::class, as: 'product'),
        DataFixture(
            PriceAlertFixture::class,
            [
                'customer_id' => '$customer.id$',
                'product_id' => '$product.id$',
                'store_id' => '1',
            ]
        ),
        DataFixture(
            PriceAlertFixture::class,
            [
                'customer_id' => '$customer.id$',
                'product_id' => '$product.id$',
                'store_id' => '$store2.id$',
            ]
        ),
        DataFixture(
            TranslationFixture::class,
            [
                'string' => 'Price change alert! We wanted you to know that prices have changed for these products:',
                'translate' => 'Alerte changement de prix! Nous voulions que vous sachiez' .
                    ' que les prix ont changé pour ces produits:',
                'locale' => 'fr_FR',
            ],
            'frTxt'
        ),
        DataFixture(
            TranslationFixture::class,
            [
                'string' => 'Price change alert! We wanted you to know that prices have changed for these products:',
                'translate' => 'Alerta de mudanca de preco! Queriamos que voce soubesse' .
                    ' que os precos mudaram para esses produtos:',
                'locale' => 'pt_BR',
            ],
            'ptTxt'
        ),
        Config('catalog/productalert/allow_price', 1),
        Config('general/locale/code', 'fr_FR', ScopeInterface::SCOPE_STORE, 'default'),
        Config('general/locale/code', 'pt_BR', ScopeInterface::SCOPE_STORE, 'pt_br_store'),
    ]
    public function testEmailShouldBeTranslatedToStoreViewLanguage()
    {
        $customerId = (int)$this->fixtures->get('customer')->getId();

        $frMailSent = false;
        $ptMailSent = false;
        $this->transportBuilder->setOnMessageSentCallback(
            function ($message) use (&$frMailSent, &$ptMailSent) {
                $messageContent = quoted_printable_decode($message->getBody()->bodyToString());
                $frTxt = $this->fixtures->get('frTxt')->getTranslate();
                $ptTxt = $this->fixtures->get('ptTxt')->getTranslate();

                if (str_contains($messageContent, $frTxt)) {
                    $frMailSent = true;
                }

                if (str_contains($messageContent, $ptTxt)) {
                    $ptMailSent = true;
                }
            }
        );

        $this->processAlerts($customerId);
        $this->assertTrue($frMailSent);
        $this->assertTrue($ptMailSent);
    }

    /**
     * @param int $customerId
     * @param int $websiteId
     * @param string $alertType
     * @return void
     * @throws \Exception
     */
    private function processAlerts(
        int $customerId,
        int $websiteId = 1,
        string $alertType = AlertProcessor::ALERT_TYPE_PRICE
    ): void {
        $this->alertProcessor->process($alertType, [$customerId], $websiteId);
    }

    /**
     * Returns raw content of provided message
     *
     * @param EmailMessage $message
     * @return string
     */
    private function getMessageRawContent(EmailMessage $message): string
    {
        return quoted_printable_decode($message->getBody()->bodyToString());
    }
=======
        $service = $this->objectManager->create(AccountManagementInterface::class);
        $customer = $service->authenticate('customer@example.com', 'password');
        $customerSession = $this->objectManager->get(Session::class);
        $customerSession->setCustomerDataAsLoggedIn($customer);
    }

    /**
     * @magentoConfigFixture current_store catalog/productalert/allow_price 1
     * @magentoDataFixture Magento/ProductAlert/_files/product_alert.php
     */
    public function testProcess()
    {
        $this->processAlerts();

        /** Checking is the email was sent */
        $this->assertStringContainsString(
            'John Smith,',
            $this->transportBuilder->getSentMessage()->getBody()->getParts()[0]->getRawContent()
        );
    }

    /**
     * Check translations for product alerts
     *
     * @magentoDbIsolation disabled
     * @magentoDataFixture Magento/Catalog/_files/category.php
     * @magentoConfigFixture current_store catalog/productalert/allow_price 1
     * @magentoDataFixture Magento/Store/_files/second_store.php
     * @magentoConfigFixture fixture_second_store_store general/locale/code pt_BR
     * @magentoDataFixture Magento/ProductAlert/_files/product_alert_with_store.php
     */
    public function testProcessPortuguese()
    {
        // get second store
        $storeRepository = $this->objectManager->create(StoreRepository::class);
        $secondStore = $storeRepository->get('fixture_second_store');

        // check if Portuguese language is specified for the second store
        $storeResolver = $this->objectManager->get(Resolver::class);
        $storeResolver->emulate($secondStore->getId());
        $this->assertEquals('pt_BR', $storeResolver->getLocale());

        // set translation data and check it
        $modulesReader = $this->createPartialMock(Reader::class, ['getModuleDir']);
        $modulesReader->method('getModuleDir')
            ->willReturn(dirname(__DIR__) . '/../_files/i18n');
        /** @var Translate $translator */
        $translator = $this->objectManager->create(Translate::class, ['modulesReader' => $modulesReader]);
        $translation = [
            'Price change alert! We wanted you to know that prices have changed for these products:' =>
                'Alerta de mudanca de preco! Queriamos que voce soubesse que os precos mudaram para esses produtos:'
        ];
        $translator->loadData();
        $this->assertEquals($translation, $translator->getData());
        $this->objectManager->addSharedInstance($translator, Translate::class);
        $this->objectManager->removeSharedInstance(PhraseRendererTranslate::class);
        Phrase::setRenderer($this->objectManager->create(RendererInterface::class));

        // dispatch process() method and check sent message
        $this->processAlerts();
        $message = $this->transportBuilder->getSentMessage();
        $messageContent = $message->getBody()->getParts()[0]->getRawContent();
        $expectedText = array_shift($translation);
        $this->assertStringContainsString('/frontend/Magento/luma/pt_BR/', $messageContent);
        $this->assertStringContainsString(substr($expectedText, 0, 50), $messageContent);
    }

    /**
     * Process price alerts
     */
    private function processAlerts(): void
    {
        $alertType = AlertProcessor::ALERT_TYPE_PRICE;
        $customerId = 1;
        $websiteId = 1;

        $this->publisher->execute($alertType, [$customerId], $websiteId);
        $this->alertProcessor->process($alertType, [$customerId], $websiteId);
    }
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
