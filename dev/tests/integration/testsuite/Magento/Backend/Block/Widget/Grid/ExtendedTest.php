<?php
/**
<<<<<<< HEAD
 * Copyright 2013 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\Backend\Block\Widget\Grid;

use Laminas\Stdlib\Parameters;
use Magento\Backend\Block\Template\Context;
<<<<<<< HEAD
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Data\Collection;
use Magento\Framework\Filesystem;
=======
use Magento\Framework\Data\Collection;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\View\LayoutInterface;
use Magento\TestFramework\Helper\Bootstrap;
use PHPUnit\Framework\TestCase;

/**
 * @magentoAppArea adminhtml
 */
class ExtendedTest extends TestCase
{
    /**
     * @var Extended
     */
    protected $_block;

    /**
     * @var LayoutInterface
     */
    protected $_layoutMock;

    /**
     * @inheritDoc
     */
    protected function setUp(): void
    {
        parent::setUp();

<<<<<<< HEAD
        $this->_layoutMock = Bootstrap::getObjectManager()->create(
=======
        $this->_layoutMock = Bootstrap::getObjectManager()->get(
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
            LayoutInterface::class
        );
        $context = Bootstrap::getObjectManager()->create(
            Context::class,
            ['layout' => $this->_layoutMock]
        );
        $this->_block = $this->_layoutMock->createBlock(
            Extended::class,
            'grid',
            ['context' => $context]
        );

        $this->_block->addColumn('column1', ['id' => 'columnId1']);
        $this->_block->addColumn('column2', ['id' => 'columnId2']);
    }

    /**
     * @magentoAppIsolation enabled
     */
    public function testAddColumnAddsChildToColumnSet()
    {
        $this->assertInstanceOf(
            Column::class,
            $this->_block->getColumnSet()->getChildBlock('column1')
        );
        $this->assertCount(2, $this->_block->getColumnSet()->getChildNames());
    }

    /**
     * @magentoAppIsolation enabled
     */
    public function testRemoveColumn()
    {
        $this->assertCount(2, $this->_block->getColumnSet()->getChildNames());
        $this->_block->removeColumn('column1');
        $this->assertCount(1, $this->_block->getColumnSet()->getChildNames());
    }

    /**
     * @magentoAppIsolation enabled
     */
    public function testSortColumnsByOrder()
    {
        $columnNames = $this->_block->getLayout()->getChildNames($this->_block->getColumnSet()->getNameInLayout());
        $this->assertEquals($this->_block->getColumn('column1')->getNameInLayout(), $columnNames[0]);
        $this->_block->addColumnsOrder('column1', 'column2');
        $this->_block->sortColumnsByOrder();
        $columnNames = $this->_block->getLayout()->getChildNames($this->_block->getColumnSet()->getNameInLayout());
        $this->assertEquals($this->_block->getColumn('column2')->getNameInLayout(), $columnNames[0]);
    }

    /**
     * @magentoAppIsolation enabled
     */
    public function testGetMainButtonsHtmlReturnsEmptyStringIfFiltersArentVisible()
    {
        $this->_block->setFilterVisibility(false);
        $this->assertEquals('', $this->_block->getMainButtonsHtml());
    }

    /**
     * Checks that template does not have redundant div close tag
     *
     * @return void
     */
    public function testExtendedTemplateMarkup(): void
    {
        $mockCollection = $this->getMockBuilder(Collection::class)
            ->disableOriginalConstructor()
            ->getMock();
        $this->_block->setCollection($mockCollection);
        $this->_block->getRequest()
            ->setQuery(
                Bootstrap::getObjectManager()
                ->create(
                    Parameters::class,
                    [
                        'values' => [
                            'ajax' => true
                        ]
                    ]
                )
            );
        $html = $this->_block->getHtml();
        $html = str_replace(["\n", " "], '', $html);
        $this->assertStringEndsWith("</table></div>", $html);
    }
<<<<<<< HEAD

    public function testGetCsvFileStartsWithBOM(): void
    {
        $collection = Bootstrap::getObjectManager()->create(Collection::class);
        $this->_block->setCollection($collection);
        $data = $this->_block->getCsvFile();

        $filesystem = Bootstrap::getObjectManager()->get(Filesystem::class);
        $directory = $filesystem->getDirectoryWrite(DirectoryList::VAR_DIR);
        self::assertTrue($directory->isFile($data['value']));
        self::assertStringStartsWith(
            pack('CCC', 0xef, 0xbb, 0xbf),
            $directory->readFile($data['value'])
        );

        $directory->delete($data['value']);
    }
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
}
