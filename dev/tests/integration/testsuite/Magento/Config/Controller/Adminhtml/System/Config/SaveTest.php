<?php
/**
<<<<<<< HEAD
 * Copyright 2021 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Config\Controller\Adminhtml\System\Config;

use Magento\Config\Model\Config\Loader;
use Magento\Framework\App\Request\Http as HttpRequest;
use Magento\Framework\App\ScopeInterface;
use Magento\Framework\App\ScopeResolverPool;
use Magento\Framework\Message\MessageInterface;
use Magento\TestFramework\TestCase\AbstractBackendController;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Checks saving and updating of configuration data
 *
 * @see \Magento\Config\Controller\Adminhtml\System\Config\Save
 * @magentoAppArea adminhtml
 */
class SaveTest extends AbstractBackendController
{
    /** @var Loader */
    private $configLoader;

    /** @var ScopeResolverPool */
    private $scopeResolverPool;

    /**
     * @inheritdoc
     */
    public function setUp(): void
    {
        parent::setUp();

        $this->configLoader = $this->_objectManager->get(Loader::class);
        $this->scopeResolverPool = $this->_objectManager->get(ScopeResolverPool::class);
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider saveConfigDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoDbIsolation enabled
     * @param array $params
     * @param array $post
     * @return void
     */
<<<<<<< HEAD
    #[DataProvider('saveConfigDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSaveConfig(array $params, array $post): void
    {
        $expectedPathValue = $this->prepareExpectedPathValue($params['section'], $post['groups']);
        $this->dispatchWithParams($params, $post);
        $this->assertSessionMessages(
            $this->containsEqual((string)__('You saved the configuration.')),
            MessageInterface::TYPE_SUCCESS
        );
        $this->assertPathValue($expectedPathValue);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function saveConfigDataProvider(): array
=======
    public function saveConfigDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'configure_shipping_origin' => [
                'params' => ['section' => 'shipping'],
                'post' => [
                    'groups' => [
                        'origin' => [
                            'fields' => [
                                'country_id' => ['value' => 'CH'],
                                'region_id' => ['value' => '107'],
                                'postcode' => ['value' => '3005'],
                                'city' => ['value' => 'Bern'],
                                'street_line1' => ['value' => 'Weinbergstrasse 4'],
                                'street_line2' => ['value' => 'Suite 1'],
                            ],
                        ],
                    ],
                ],
            ],
            'configure_multi_shipping_options' => [
                'params' => ['section' => 'multishipping'],
                'post' => [
                    'groups' => [
                        'options' => [
                            'fields' => [
                                'checkout_multiple' => ['value' => '1'],
                                'checkout_multiple_maximum_qty' => ['value' => '99'],
                            ],
                        ],
                    ],
                ],
            ],
            'configure_flat_rate_shipping_method' => [
                'params' => ['section' => 'carriers'],
                'post' => [
                    'groups' => [
                        'flatrate' => [
                            'fields' => [
                                'active' => ['value' => '1'],
                                'type' => ['value' => 'I'],
                                'price' => ['value' => '5.00'],
                                'sallowspecific' => ['value' => '0'],
                            ],
                        ],
                    ],
                ],
            ],
        ];
    }

    /**
     * Prepare expected path value array.
     *
     * @param string $section
     * @param array $groups
     * @return array
     */
    private function prepareExpectedPathValue(string $section, array $groups): array
    {
        foreach ($groups as $groupId => $groupData) {
            $groupPath = $section . '/' . $groupId;
            foreach ($groupData['fields'] as $fieldId => $fieldData) {
                $path = $groupPath . '/' . $fieldId;
                $expectedData[$groupPath][$path] = $fieldData['value'];
            }
        }

        return $expectedData ?? [];
    }

    /**
     * Check that the values for the paths in the config data were saved successfully.
     *
     * @param array $expectedPathValue
     * @return void
     */
    private function assertPathValue(array $expectedPathValue): void
    {
        $scope = $this->scopeResolverPool->get(ScopeInterface::SCOPE_DEFAULT)->getScope();
        foreach ($expectedPathValue as $groupPath => $groupData) {
            $actualPathValue = $this->configLoader->getConfigByPath(
                $groupPath,
                $scope->getScopeType(),
                $scope->getId(),
                false
            );
            foreach ($groupData as $fieldPath => $fieldValue) {
                $this->assertArrayHasKey(
                    $fieldPath,
                    $actualPathValue,
                    sprintf('The expected config setting was not saved in the database. Path: %s', $fieldPath)
                );
                $this->assertEquals(
                    $fieldValue,
                    $actualPathValue[$fieldPath],
                    sprintf('The expected value of the config setting is not correct. Path: %s', $fieldPath)
                );
            }
        }
    }

    /**
     * Dispatch request with params
     *
     * @param array $params
     * @param array $postParams
     * @return void
     */
    private function dispatchWithParams(array $params = [], array $postParams = []): void
    {
        $this->getRequest()->setMethod(HttpRequest::METHOD_POST)
            ->setParams($params)
            ->setPostValue($postParams);
        $this->dispatch('backend/admin/system_config/save');
    }
}
