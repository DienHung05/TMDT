<?php
/**
<<<<<<< HEAD
 * Copyright 2018 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\ImportExport\Model\Import\Entity;

use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\ImportExport\Model\Import\Source\Csv;
use Magento\ImportExport\Model\Import\ErrorProcessing\ProcessingErrorAggregatorInterface;

/**
 * Test class for \Magento\ImportExport\Model\Import\AbstractEntity
 *
 * @SuppressWarnings(PHPMD.CouplingBetweenObjects)
 */
class EntityAbstractTest extends \PHPUnit\Framework\TestCase
{
    /**
     * Test for method _saveValidatedBunches()
     *
     * @return void
     */
    public function testSaveValidatedBunches() : void
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $filesystem = $objectManager->create(\Magento\Framework\Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::ROOT);
        $source = new Csv(__DIR__ . '/_files/advanced_price_for_validation_test.csv', $directory);
        $source->rewind();

        $eavConfig = $this->createMock(\Magento\Eav\Model\Config::class);
        $entityTypeMock = $this->createMock(\Magento\Eav\Model\Entity\Type::class);
        $eavConfig->expects($this->any())->method('getEntityType')->willReturn($entityTypeMock);

        /** @var $model AbstractEntity|\PHPUnit\Framework\MockObject\MockObject */
<<<<<<< HEAD
        $model = $this->getMockBuilder(AbstractEntity::class)
            ->setConstructorArgs([
=======
        $model = $this->getMockForAbstractClass(
            AbstractEntity::class,
            [
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                $objectManager->get(\Magento\Framework\Json\Helper\Data::class),
                $objectManager->get(\Magento\ImportExport\Helper\Data::class),
                $objectManager->get(\Magento\ImportExport\Model\ResourceModel\Import\Data::class),
                $eavConfig,
                $objectManager->get(\Magento\Framework\App\ResourceConnection::class),
                $objectManager->get(\Magento\ImportExport\Model\ResourceModel\Helper::class),
                $objectManager->get(\Magento\Framework\Stdlib\StringUtils::class),
                $objectManager->get(ProcessingErrorAggregatorInterface::class),
<<<<<<< HEAD
            ])
            ->onlyMethods(['validateRow', 'getEntityTypeCode', '_importData'])
            ->getMock();
=======
            ],
            '',
            true,
            false,
            true,
            ['validateRow', 'getEntityTypeCode']
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $model->expects($this->any())->method('validateRow')->willReturn(true);
        $model->expects($this->any())->method('getEntityTypeCode')->willReturn('catalog_product');

        $model->setSource($source);

        $method = new \ReflectionMethod($model, '_saveValidatedBunches');
<<<<<<< HEAD
=======
        $method->setAccessible(true);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $method->invoke($model);

        $this->assertEquals(1, $model->getProcessedEntitiesCount());
    }
}
