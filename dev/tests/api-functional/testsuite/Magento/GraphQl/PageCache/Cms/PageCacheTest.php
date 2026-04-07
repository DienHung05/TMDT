<?php
/**
<<<<<<< HEAD
 * Copyright 2019 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\GraphQl\PageCache\Cms;

use Magento\Cms\Model\GetPageByIdentifier;
use Magento\Cms\Model\PageRepository;
<<<<<<< HEAD
use Magento\GraphQl\PageCache\GraphQLPageCacheAbstract;
use Magento\GraphQlCache\Model\CacheId\CacheIdCalculator;
use Magento\TestFramework\Helper\Bootstrap;

/**
 * Test the cache works properly for CMS Pages
 */
class PageCacheTest extends GraphQLPageCacheAbstract
=======
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQlAbstract;

/**
 * Test the caching works properly for CMS Pages
 */
class PageCacheTest extends GraphQlAbstract
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
{
    /**
     * @var GetPageByIdentifier
     */
    private $pageByIdentifier;

    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
<<<<<<< HEAD
=======
        $this->markTestSkipped(
            'This test will stay skipped until DEVOPS-4924 is resolved'
        );
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->pageByIdentifier = Bootstrap::getObjectManager()->get(GetPageByIdentifier::class);
    }

    /**
<<<<<<< HEAD
     * Test the second request for the same page will return a cached result
     *
     * @magentoConfigFixture default/system/full_page_cache/caching_application 2
=======
     * Test that X-Magento-Tags are correct
     *
     * @magentoApiDataFixture Magento/Cms/_files/pages.php
     */
    public function testCacheTagsHaveExpectedValue()
    {
        $pageIdentifier = 'page100';
        $page = $this->pageByIdentifier->execute($pageIdentifier, 0);
        $pageId = (int) $page->getId();

        $query = $this->getPageQuery($pageId);

        //cache-debug should be a MISS on first request
        $response = $this->graphQlQueryWithResponseHeaders($query);

        $this->assertArrayHasKey('X-Magento-Tags', $response['headers']);
        $actualTags = explode(',', $response['headers']['X-Magento-Tags']);
        $expectedTags = ["cms_p", "cms_p_{$pageId}", "FPC"];
        $this->assertEquals($expectedTags, $actualTags);
    }

    /**
     * Test the second request for the same page will return a cached result
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoApiDataFixture Magento/Cms/_files/pages.php
     */
    public function testCacheIsUsedOnSecondRequest()
    {
        $pageIdentifier = 'page100';
        $page = $this->pageByIdentifier->execute($pageIdentifier, 0);
        $pageId = (int) $page->getId();

        $query = $this->getPageQuery($pageId);

<<<<<<< HEAD
        $response = $this->graphQlQueryWithResponseHeaders($query);
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $response['headers']);
        // Obtain the X-Magento-Cache-Id from the response
        $cacheId = $response['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        // Verify we obtain a cache MISS the first time
        $this->assertCacheMissAndReturnResponse($query, [CacheIdCalculator::CACHE_ID_HEADER => $cacheId]);
        // Verify we obtain a cache HIT the second time
        $responseHit = $this->assertCacheHitAndReturnResponse(
            $query,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheId]
        );

=======
        //cache-debug should be a MISS on first request
        $responseMiss = $this->graphQlQueryWithResponseHeaders($query);
        $this->assertArrayHasKey('X-Magento-Cache-Debug', $responseMiss['headers']);
        $this->assertEquals('MISS', $responseMiss['headers']['X-Magento-Cache-Debug']);

        //cache-debug should be a HIT on second request
        $responseHit = $this->graphQlQueryWithResponseHeaders($query);
        $this->assertArrayHasKey('X-Magento-Cache-Debug', $responseHit['headers']);
        $this->assertEquals('HIT', $responseHit['headers']['X-Magento-Cache-Debug']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        //cached data should be correct
        $this->assertNotEmpty($responseHit['body']);
        $this->assertArrayNotHasKey('errors', $responseHit['body']);
        $pageData = $responseHit['body']['cmsPage'];
        $this->assertEquals('Cms Page 100', $pageData['title']);
    }

    /**
     * Test that cache is invalidated when page is updated
     *
<<<<<<< HEAD
     * @magentoConfigFixture default/system/full_page_cache/caching_application 2
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoApiDataFixture Magento/Cms/_files/pages.php
     */
    public function testCacheIsInvalidatedOnPageUpdate()
    {
        $page100Identifier = 'page100';
        $page100 = $this->pageByIdentifier->execute($page100Identifier, 0);
        $page100Id = (int) $page100->getId();
        $pageBlankIdentifier = 'page_design_blank';
        $pageBlank = $this->pageByIdentifier->execute($pageBlankIdentifier, 0);
        $pageBlankId = (int) $pageBlank->getId();

        $page100Query = $this->getPageQuery($page100Id);
        $pageBlankQuery = $this->getPageQuery($pageBlankId);

        //cache-debug should be a MISS on first request
<<<<<<< HEAD
        $page100Response = $this->graphQlQueryWithResponseHeaders($page100Query);
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $page100Response['headers']);
        $cacheIdPage100Response = $page100Response['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        // Verify we obtain a cache MISS the first time
        $this->assertCacheMissAndReturnResponse(
            $page100Query,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdPage100Response]
        );

        $pageBlankResponse = $this->graphQlQueryWithResponseHeaders($pageBlankQuery);
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $pageBlankResponse['headers']);
        $cacheIdPageBlankResponse = $pageBlankResponse['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        // Verify we obtain a cache MISS the first time
        $this->assertCacheMissAndReturnResponse(
            $pageBlankQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdPageBlankResponse]
        );

        //cache-debug should be a HIT on second request for page100
        $this->assertCacheHitAndReturnResponse(
            $page100Query,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdPage100Response]
        );
        //cache-debug should be a HIT on second request for page blank
        $this->assertCacheHitAndReturnResponse(
            $pageBlankQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdPageBlankResponse]
        );

        //updating the blank page
=======
        $page100Miss = $this->graphQlQueryWithResponseHeaders($page100Query);
        $this->assertEquals('MISS', $page100Miss['headers']['X-Magento-Cache-Debug']);
        $pageBlankMiss = $this->graphQlQueryWithResponseHeaders($pageBlankQuery);
        $this->assertEquals('MISS', $pageBlankMiss['headers']['X-Magento-Cache-Debug']);

        //cache-debug should be a HIT on second request
        $page100Hit = $this->graphQlQueryWithResponseHeaders($page100Query);
        $this->assertEquals('HIT', $page100Hit['headers']['X-Magento-Cache-Debug']);
        $pageBlankHit = $this->graphQlQueryWithResponseHeaders($pageBlankQuery);
        $this->assertEquals('HIT', $pageBlankHit['headers']['X-Magento-Cache-Debug']);

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $pageRepository = Bootstrap::getObjectManager()->get(PageRepository::class);
        $newPageContent = 'New page content for blank page.';
        $pageBlank->setContent($newPageContent);
        $pageRepository->save($pageBlank);

<<<<<<< HEAD
        // Verify we obtain a cache MISS on page blank query after updating the page blank
        $this->assertCacheMissAndReturnResponse(
            $pageBlankQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdPageBlankResponse]
        );
        $pageBlankResponseHitAfterUpdate = $this->assertCacheHitAndReturnResponse(
            $pageBlankQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdPageBlankResponse]
        );

        // Verify we obtain a cache HIT on page 100 query after updating the page blank
        $this->assertCacheHitAndReturnResponse(
            $page100Query,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdPage100Response]
        );

        //updated page data should be correct for blank page
        $this->assertNotEmpty($pageBlankResponseHitAfterUpdate['body']);
        $pageData = $pageBlankResponseHitAfterUpdate['body']['cmsPage'];
        $this->assertArrayNotHasKey('errors', $pageBlankResponseHitAfterUpdate['body']);
=======
        //cache-debug should be a MISS after updating the page
        $pageBlankMiss = $this->graphQlQueryWithResponseHeaders($pageBlankQuery);
        $this->assertEquals('MISS', $pageBlankMiss['headers']['X-Magento-Cache-Debug']);
        $page100Hit = $this->graphQlQueryWithResponseHeaders($page100Query);
        $this->assertEquals('HIT', $page100Hit['headers']['X-Magento-Cache-Debug']);
        //updated page data should be correct
        $this->assertNotEmpty($pageBlankMiss['body']);
        $pageData = $pageBlankMiss['body']['cmsPage'];
        $this->assertArrayNotHasKey('errors', $pageBlankMiss['body']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertEquals('Cms Page Design Blank', $pageData['title']);
        $this->assertEquals($newPageContent, $pageData['content']);
    }

    /**
     * Get page query
     *
     * @param int $pageId
     * @return string
     */
    private function getPageQuery(int $pageId): string
    {
        $query = <<<QUERY
<<<<<<< HEAD
{
    cmsPage(id: $pageId) {
=======
{   
    cmsPage(id: $pageId) {    
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        title
   	    url_key
        content
    }
}
QUERY;
        return $query;
    }
}
