<?php
/**
<<<<<<< HEAD
 * Copyright 2016 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Setup\Test\Unit\Module\Setup;

use Magento\Setup\Module\Setup\SetupCache;
use PHPUnit\Framework\TestCase;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

class SetupCacheTest extends TestCase
{
    /**
     * @var SetupCache
     */
    private $object;

    protected function setUp(): void
    {
        $this->object = new SetupCache();
    }

    public function testSetRow()
    {
        $table = 'table';
        $parentId = 'parent';
        $rowId = 'row';
        $data = new \stdClass();

        $this->object->setRow($table, $parentId, $rowId, $data);
        $this->assertSame($data, $this->object->get($table, $parentId, $rowId));
    }

    public function testSetField()
    {
        $table = 'table';
        $parentId = 'parent';
        $rowId = 'row';
        $field = 'field';
        $data = new \stdClass();

        $this->object->setField($table, $parentId, $rowId, $field, $data);
        $this->assertSame($data, $this->object->get($table, $parentId, $rowId, $field));
    }

    /**
<<<<<<< HEAD
     * @param string $field
     */
    #[DataProvider('getNonexistentDataProvider')]
=======
     * @dataProvider getNonexistentDataProvider
     * @param string $field
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetNonexistent($field)
    {
        $this->assertFalse($this->object->get('table', 'parent', 'row', $field));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function getNonexistentDataProvider()
=======
    public function getNonexistentDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [null],
            ['field'],
        ];
    }

    public function testRemove()
    {
        $table = 'table';
        $parentId = 'parent';
        $rowId = 'row';
        $data = new \stdClass();

        $this->object->setRow($table, $parentId, $rowId, $data);
        $this->object->remove($table, $parentId, $rowId, $data);
        $this->assertFalse($this->object->get($table, $parentId, $rowId));
    }

    /**
<<<<<<< HEAD
=======
     * @dataProvider hasDataProvider
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @param string $table
     * @param string $parentId
     * @param string $rowId
     * @param string $field
     * @param bool $expected
     */
<<<<<<< HEAD
    #[DataProvider('hasDataProvider')]
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testHas($table, $parentId, $rowId, $field, $expected)
    {
        $this->object->setField('table', 'parent', 'row', 'field', 'data');
        $this->assertSame($expected, $this->object->has($table, $parentId, $rowId, $field));
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function hasDataProvider()
=======
    public function hasDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'existing'           => ['table', 'parent', 'row', 'field', true],
            'nonexistent field'  => ['table', 'parent', 'row', 'other_field', false],
            'nonexistent row'    => ['table', 'parent', 'other_row', 'field', false],
            'nonexistent parent' => ['table', 'other_parent', 'row', 'field', false],
            'nonexistent table'  => ['other_table', 'parent', 'row', 'field', false],
        ];
    }
}
