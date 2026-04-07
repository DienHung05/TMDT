<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
 */
namespace Magento\Framework\Cache\Backend;

use Magento\Framework\Cache\CacheConstants;
use Magento\Framework\Cache\Exception\CacheException;
use PHPUnit\Framework\Attributes\DataProvider;

class MongoDbTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var string
     */
    protected $_connectionString;

    /**
     * @var string
     */
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Framework\Cache\Backend;

class MongoDbTest extends \PHPUnit\Framework\TestCase
{
    protected $_connectionString;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    protected $_dbName = 'magento_integration_test';

    /**
     * @var \Magento\Framework\Cache\Backend\MongoDb|null
     */
    protected $_model = null;

    protected function setUp(): void
    {
        if (defined('MONGODB_CONNECTION_STRING')) {
            $this->_connectionString = MONGODB_CONNECTION_STRING;
        }
        if (empty($this->_connectionString) || !extension_loaded('mongo')) {
            $this->markTestSkipped(
                "Either 'mongo' extension is not loaded or 'MONGODB_CONNECTION_STRING' constant is not defined"
            );
        }
        if (defined('MONGODB_DATABASE_NAME')) {
            $this->_dbName = MONGODB_DATABASE_NAME;
        }
        $this->_model = new \Magento\Framework\Cache\Backend\MongoDb(
            ['connection_string' => $this->_connectionString, 'db' => $this->_dbName]
        );
    }

    protected function tearDown(): void
    {
        if (!empty($this->_connectionString) && extension_loaded('mongo')) {
            $this->_model = null;
            $connection = new \Mongo($this->_connectionString);
            $connection->dropDB($this->_dbName);
        }
    }

    /**
     */
    public function testConstructorException()
    {
<<<<<<< HEAD
        $this->expectException(CacheException::class);
=======
        $this->expectException(\Zend_Cache_Exception::class);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->expectExceptionMessage('\'db\' option is not specified');

        new \Magento\Framework\Cache\Backend\MongoDb();
    }

    public function testGetIds()
    {
        $this->assertEmpty($this->_model->getIds());
        $this->_model->save('test data 1', 'test1');
        $this->_model->save('test data 2', 'test2');
        $this->assertEquals(['test1', 'test2'], $this->_model->getIds());
    }

    public function testGetTags()
    {
        $this->assertEmpty($this->_model->getTags());
        $this->_model->save('test data 1', 'test1', ['tag1', 'tag2']);
        $this->_model->save('test data 2', 'test2', ['tag1', 'tag3']);
        $actual = $this->_model->getTags();
        $expected = ['tag1', 'tag2', 'tag3'];
        $this->assertEquals($expected, $actual);
    }

<<<<<<< HEAD
    #[DataProvider('getIdsMatchingTagsDataProvider')]
=======
    /**
     * @dataProvider getIdsMatchingTagsDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetIdsMatchingTags($searchTags, $expectedIds)
    {
        $this->_prepareCollection();
        $actualIds = $this->_model->getIdsMatchingTags($searchTags);
        $this->assertEquals($expectedIds, $actualIds);
    }

<<<<<<< HEAD
    public static function getIdsMatchingTagsDataProvider()
=======
    public function getIdsMatchingTagsDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'one tag' => [['tag1'], ['test1', 'test2', 'test3']],
            'multiple tags' => [['tag1', 'tag2'], ['test1', 'test3']]
        ];
    }

<<<<<<< HEAD
    #[DataProvider('getIdsNotMatchingTagsDataProvider')]
=======
    /**
     * @dataProvider getIdsNotMatchingTagsDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetIdsNotMatchingTags($searchTags, $expectedIds)
    {
        $this->_prepareCollection();
        $actualIds = $this->_model->getIdsNotMatchingTags($searchTags);
        $this->assertEquals($expectedIds, $actualIds);
    }

<<<<<<< HEAD
    public static function getIdsNotMatchingTagsDataProvider()
=======
    public function getIdsNotMatchingTagsDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'one tag' => [['tag2'], ['test2', 'test4', 'test5']],
            'multiple tags' => [['tag1', 'tag2'], ['test4', 'test5']]
        ];
    }

<<<<<<< HEAD
    #[DataProvider('getIdsMatchingAnyTagsDataProvider')]
=======
    /**
     * @dataProvider getIdsMatchingAnyTagsDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testGetIdsMatchingAnyTags($searchTags, $expectedIds)
    {
        $this->_prepareCollection();
        $actualIds = $this->_model->getIdsMatchingAnyTags($searchTags);
        $this->assertEquals($expectedIds, $actualIds);
    }

<<<<<<< HEAD
    public static function getIdsMatchingAnyTagsDataProvider()
=======
    public function getIdsMatchingAnyTagsDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'no tags' => [[], []],
            'one tag' => [['tag2'], ['test1', 'test3']],
            'multiple tags' => [['tag1', 'tag2'], ['test1', 'test2', 'test3']]
        ];
    }

    public function testGetMetadatas()
    {
        $cacheId = 'test';
        $tags = ['tag_1', 'tag_2'];
        $this->_model->save('test data', $cacheId, $tags, 100);
        $actualResult = $this->_model->getMetadatas($cacheId);
        $this->assertArrayHasKey('expire', $actualResult);
        $this->assertArrayHasKey('tags', $actualResult);
        $this->assertArrayHasKey('mtime', $actualResult);
        $this->assertSame($tags, $actualResult['tags']);
    }

    /**
     * @param int $extraLifeTime
     * @param \PHPUnit\Framework\Constraint\Constraint $constraint
<<<<<<< HEAD
     */
    #[DataProvider('touchDataProvider')]
=======
     * @dataProvider touchDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testTouch($extraLifeTime, \PHPUnit\Framework\Constraint\Constraint $constraint)
    {
        $cacheId = 'test';
        $this->_model->save('test data', $cacheId, [], 2);
        $this->assertGreaterThan(0, $this->_model->test($cacheId), "Cache with id '{$cacheId}' has not been saved");
        $this->_model->touch($cacheId, $extraLifeTime);
        sleep(2);
        $this->assertThat($this->_model->test($cacheId), $constraint);
    }

<<<<<<< HEAD
    public static function touchDataProvider()
    {
        return [
            'not enough extra lifetime' => [0, self::isFalse()],
            'enough extra lifetime' => [1000, self::logicalNot(self::isFalse())]
=======
    public function touchDataProvider()
    {
        return [
            'not enough extra lifetime' => [0, $this->isFalse()],
            'enough extra lifetime' => [1000, $this->logicalNot($this->isFalse())]
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        ];
    }

    /**
     * @param string $data
     * @param int|bool|null $lifetime
     * @param bool $doNotTestValidity
     * @param string|bool $expected
<<<<<<< HEAD
     */
    #[DataProvider('loadDataProvider')]
=======
     * @dataProvider loadDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testLoad($data, $lifetime, $doNotTestValidity, $expected)
    {
        $cacheId = 'test';
        $this->_model->save($data, $cacheId, [], $lifetime);
        $actualData = $this->_model->load($cacheId, $doNotTestValidity);
        $this->assertSame($expected, $actualData);
    }

<<<<<<< HEAD
    public static function loadDataProvider()
=======
    public function loadDataProvider()
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            'infinite lifetime with validity' => ['test data', null, false, 'test data'],
            'infinite lifetime without validity' => ['test data', null, true, 'test data'],
            'zero lifetime with validity' => ['test data', 0, false, false],
            'zero lifetime without validity' => ['test data', 0, true, 'test data']
        ];
    }

    public function testTest()
    {
        $this->assertFalse($this->_model->test('test'));
        $this->_model->save('test data', 'test');
        $this->assertNotEmpty($this->_model->test('test'), "Cache with id 'test' has not been saved");
    }

    public function testSave()
    {
        $cacheId = 'test_id';
        $data = 'test data';
        $tags = ['tag1', 'tag2'];

        $this->assertTrue($this->_model->save($data, $cacheId, $tags));
        $actualData = $this->_model->load($cacheId);
        $this->assertEquals($data, $actualData);
        $actualMetadata = $this->_model->getMetadatas($cacheId);
        $this->arrayHasKey('tags');
        $this->assertEquals($tags, $actualMetadata['tags']);
    }

    public function testRemove()
    {
        $cacheId = 'test';
        $this->_model->save('test data', $cacheId);
        $this->assertGreaterThan(0, $this->_model->test($cacheId), "Cache with id '{$cacheId}' has not been found");
        $this->_model->remove($cacheId);
        $this->assertFalse($this->_model->test($cacheId), "Cache with id '{$cacheId}' has not been removed");
    }

<<<<<<< HEAD
    #[DataProvider('cleanDataProvider')]
=======
    /**
     * @dataProvider cleanDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testClean($mode, $tags, $expectedIds)
    {
        $this->_prepareCollection();

        $this->_model->clean($mode, $tags);
        $actualIds = $this->_model->getIds();
        $this->assertEquals($expectedIds, $actualIds);
    }

<<<<<<< HEAD
    public static function cleanDataProvider()
    {
        return [
            'clean all cache' => [CacheConstants::CLEANING_MODE_ALL, [], []],
            'clean cache matching all tags' => [
                CacheConstants::CLEANING_MODE_MATCHING_TAG,
=======
    public function cleanDataProvider()
    {
        return [
            'clean all cache' => [\Zend_Cache::CLEANING_MODE_ALL, [], []],
            'clean cache matching all tags' => [
                \Zend_Cache::CLEANING_MODE_MATCHING_TAG,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ['tag1', 'tag2'],
                ['test2', 'test4', 'test5'],
            ],
            'clean cache not matching tags' => [
<<<<<<< HEAD
                CacheConstants::CLEANING_MODE_NOT_MATCHING_TAG,
=======
                \Zend_Cache::CLEANING_MODE_NOT_MATCHING_TAG,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ['tag1', 'tag2'],
                ['test1', 'test2', 'test3'],
            ],
            'clean cache matching any tags' => [
<<<<<<< HEAD
                CacheConstants::CLEANING_MODE_MATCHING_ANY_TAG,
=======
                \Zend_Cache::CLEANING_MODE_MATCHING_ANY_TAG,
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
                ['tag1', 'tag2'],
                ['test4', 'test5'],
            ]
        ];
    }

    public function testCleanOld()
    {
        $this->_model->save('long-living entity', 'long', [], 1000);
        $this->_model->save('infinite-living entity', 'infinite', [], null);
        $this->_model->save('short-living entity', 'short', [], 0);
<<<<<<< HEAD
        $this->_model->clean(CacheConstants::CLEANING_MODE_OLD);
=======
        $this->_model->clean(\Zend_Cache::CLEANING_MODE_OLD);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $expectedIds = ['long', 'infinite'];
        $actualIds = $this->_model->getIds();
        $this->assertSame($expectedIds, $actualIds);
    }

    /**
     * Fill the collection with data
     */
    protected function _prepareCollection()
    {
        $this->_model->save('test data 1', 'test1', ['tag1', 'tag2', 'tag3']);
        $this->_model->save('test data 2', 'test2', ['tag1', 'tag3']);
        $this->_model->save('test data 3', 'test3', ['tag2', 'tag1']);
        $this->_model->save('test data 4', 'test4', ['tag4', 'tag5']);
        $this->_model->save('test data 5', 'test5', []);
    }
}
