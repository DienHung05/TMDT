<?php
/**
<<<<<<< HEAD
 * Copyright 2017 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */

namespace Magento\Eav\Model\ResourceModel;

<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\EntityManager\MetadataPool;
use Magento\TestFramework\Helper\Bootstrap;

/**
 * @magentoAppIsolation enabled
 * @magentoDbIsolation enabled
 * @magentoDataFixture Magento/Eav/_files/attribute_for_search.php
 */
class AttributeLoaderTest extends \Magento\TestFramework\Indexer\TestCase
{
    /**
     * @var AttributeLoader
     */
    private $attributeLoader;

    protected function setUp(): void
    {
        $objectManager = Bootstrap::getObjectManager();
        $metadataPool = $objectManager->create(
            MetadataPool::class,
            [
                'metadata' => [
                    'Test\Entity\Type' => [
                        'entityTableName' => 'test_entity',
                        'eavEntityType' => 'test',
                        'identifierField' => 'entity_id',
                    ]
                ]
            ]
        );
        $this->attributeLoader = $objectManager->create(AttributeLoader::class, ['metadataPool' => $metadataPool]);
    }

    /**
     * @param string[] $expectedAttributeCodes
     * @param int|null $attributeSetId
<<<<<<< HEAD
     */
    #[DataProvider('getAttributesDataProvider')]
=======
     * @dataProvider getAttributesDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetAttributes($expectedAttributeCodes, $attributeSetId = null)
    {
        $attributes = $this->attributeLoader->getAttributes('Test\Entity\Type', $attributeSetId);
        $this->assertEquals(count($expectedAttributeCodes), count($attributes));
        $attributeCodes = [];
        foreach ($attributes as $attribute) {
            $attributeCodes[] = $attribute->getAttributeCode();
        }
        $this->assertEquals($expectedAttributeCodes, $attributeCodes);
        $attributes2 = $this->attributeLoader->getAttributes('Test\Entity\Type', $attributeSetId);
        $this->assertEquals($attributes, $attributes2);
    }

<<<<<<< HEAD
    public static function getAttributesDataProvider()
=======
    public function getAttributesDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $entityType = $objectManager->create(\Magento\Eav\Model\Entity\Type::class)
            ->loadByCode('order');
        $attributeSetId = $entityType->getDefaultAttributeSetId();

        return [
            'all' => [
                [
                    'attribute_for_search_1',
                    'attribute_for_search_2',
                    'attribute_for_search_3',
                ]
            ],
            "$attributeSetId" => [
                [
                    'attribute_for_search_1',
                    'attribute_for_search_2',
                ],
                $attributeSetId,
            ]
        ];
    }

    /**
     * @inheritDoc
     */
    protected function tearDown(): void
    {
        parent::tearDown();
        $reflection = new \ReflectionObject($this);
        foreach ($reflection->getProperties() as $property) {
            if (!$property->isStatic() && 0 !== strpos($property->getDeclaringClass()->getName(), 'PHPUnit')) {
<<<<<<< HEAD
=======
                $property->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                $property->setValue($this, null);
            }
        }
    }
}
