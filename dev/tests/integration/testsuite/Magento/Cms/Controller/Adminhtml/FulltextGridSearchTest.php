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

namespace Magento\Cms\Controller\Adminhtml;

use Magento\TestFramework\TestCase\AbstractBackendController;
<<<<<<< HEAD
use PHPUnit\Framework\Attributes\DataProvider;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Testing seach in grid.
 *
 * @magentoAppArea adminhtml
 * @magentoDataFixture Magento/Cms/Fixtures/page_list.php
 */
class FulltextGridSearchTest extends AbstractBackendController
{
    /**
     * Checks a fulltext grid search by CMS page title.
     *
     * @param string $query
     * @param int $expectedRows
     * @param array $expectedTitles
<<<<<<< HEAD
     */
    #[DataProvider('queryDataProvider')]
=======
     * @dataProvider queryDataProvider
     */
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    public function testSearchByTitle(string $query, int $expectedRows, array $expectedTitles)
    {
        $url = 'backend/mui/index/render/?namespace=cms_page_listing&search=' . $query;

        $this->getRequest()
            ->getHeaders()
            ->addHeaderLine('Accept', 'application/json');
        $this->dispatch($url);
        $response = $this->getResponse();
        $data = json_decode($response->getBody(), true);
        self::assertEquals($expectedRows, $data['totalRecords']);

        $titleList = array_column($data['items'], 'title');
        self::assertEquals($expectedTitles, $titleList);
    }

    /**
     * Gets list of variations with different search queries.
     *
     * @return array
     */
<<<<<<< HEAD
    public static function queryDataProvider(): array
=======
    public function queryDataProvider(): array
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
    {
        return [
            [
                'query' => 'simple',
                'expectedRows' => 3,
                'expectedTitles' => ['simplePage', 'simplePage01', '01simplePage']
            ],
            [
                'query' => 'page01',
                'expectedRows' => 1,
                'expectedTitles' => ['simplePage01']
            ],
            [
                'query' => '01simple',
                'expectedRows' => 1,
                'expectedTitles' => ['01simplePage']
            ],
        ];
    }
}
