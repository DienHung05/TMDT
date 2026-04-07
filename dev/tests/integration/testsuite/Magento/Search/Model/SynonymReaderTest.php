<?php
/**
<<<<<<< HEAD
 * Copyright 2015 Adobe
 * All Rights Reserved.
 */
namespace Magento\Search\Model;

use PHPUnit\Framework\Attributes\DataProvider;

=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
 */
namespace Magento\Search\Model;

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
/**
 * @magentoDbIsolation disabled
 * @magentoDataFixture Magento/Search/_files/synonym_reader.php
 */
class SynonymReaderTest extends \PHPUnit\Framework\TestCase
{
    /**
     * @var \Magento\Search\Model\SynonymReader
     */
    private $model;

    protected function setUp(): void
    {
        $objectManager = \Magento\TestFramework\Helper\Bootstrap::getObjectManager();
        $this->model = $objectManager->get(\Magento\Search\Model\SynonymReader::class);
    }

    /**
     * @return array
     */
<<<<<<< HEAD
    public static function loadByPhraseDataProvider(): array
=======
    public function loadByPhraseDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'ELIZABETH', []
            ],
            [
                '-+<(ELIZABETH)>*~', []
            ],
            [
                'ENGLISH', [['synonyms' => 'british,english', 'store_id' => 1, 'website_id' => 0]]
            ],
            [
                'English', [['synonyms' => 'british,english', 'store_id' => 1, 'website_id' => 0]]
            ],
            [
                'QUEEN', [['synonyms' => 'queen,monarch', 'store_id' => 1, 'website_id' => 0]]
            ],
            [
                'Monarch', [['synonyms' => 'queen,monarch', 'store_id' => 1, 'website_id' => 0]]
            ],
            [
                '-+<(Monarch)>*~', [['synonyms' => 'queen,monarch', 'store_id' => 1, 'website_id' => 0]]
            ],
            [
                'MONARCH English', [
                ['synonyms' => 'queen,monarch', 'store_id' => 1, 'website_id' => 0],
                ['synonyms' => 'british,english', 'store_id' => 1, 'website_id' => 0]
                ]
            ],
            [
                'query_value', []
            ],
            [
                'query_value+', []
            ],
            [
                'query_value-', []
            ],
            [
                'query_@value', []
            ],
            [
                'query_value+@', []
            ],
            [
                '<', []
            ],
            [
                '>', []
            ],
            [
                '<english>', [['synonyms' => 'british,english', 'store_id' => 1, 'website_id' => 0]]
            ],
        ];
    }

    /**
     * @param string $phrase
     * @param array $expectedResult
<<<<<<< HEAD
     */
    #[DataProvider('loadByPhraseDataProvider')]
=======
     * @dataProvider loadByPhraseDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testLoadByPhrase(string $phrase, array $expectedResult)
    {
        $data = $this->model->loadByPhrase($phrase)->getData();

        $i = 0;
        foreach ($expectedResult as $r) {
            $this->assertEquals($r['synonyms'], $data[$i]['synonyms']);
            $this->assertEquals($r['store_id'], $data[$i]['store_id']);
            $this->assertEquals($r['website_id'], $data[$i]['website_id']);
            ++$i;
        }
    }
}
