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

use Magento\Cms\Model\Block;
use Magento\Cms\Model\BlockRepository;
<<<<<<< HEAD
use Magento\GraphQl\PageCache\GraphQLPageCacheAbstract;
use Magento\GraphQlCache\Model\CacheId\CacheIdCalculator;
use Magento\TestFramework\Helper\Bootstrap;

/**
 * Test the cache works properly for CMS Blocks
 */
class BlockCacheTest extends GraphQLPageCacheAbstract
{
    /**
     * Test the second request for the same block will return a cached result
     *
     * @magentoConfigFixture default/system/full_page_cache/caching_application 2
=======
use Magento\TestFramework\Helper\Bootstrap;
use Magento\TestFramework\TestCase\GraphQlAbstract;

/**
 * Test the caching works properly for CMS Blocks
 */
class BlockCacheTest extends GraphQlAbstract
{
    /**
     * @inheritdoc
     */
    protected function setUp(): void
    {
        $this->markTestSkipped(
            'This test will stay skipped until DEVOPS-4924 is resolved'
        );
    }

    /**
     * Test that X-Magento-Tags are correct
     *
     * @magentoApiDataFixture Magento/Cms/_files/block.php
     */
    public function testCacheTagsHaveExpectedValue()
    {
        $blockIdentifier = 'fixture_block';
        $blockRepository = Bootstrap::getObjectManager()->get(BlockRepository::class);
        $block = $blockRepository->getById($blockIdentifier);
        $blockId = $block->getId();
        $query = $this->getBlockQuery([$blockIdentifier]);

        //cache-debug should be a MISS on first request
        $response = $this->graphQlQueryWithResponseHeaders($query);

        $this->assertArrayHasKey('X-Magento-Tags', $response['headers']);
        $actualTags = explode(',', $response['headers']['X-Magento-Tags']);
        $expectedTags = ["cms_b", "cms_b_{$blockId}", "cms_b_{$blockIdentifier}", "FPC"];
        $this->assertEquals($expectedTags, $actualTags);
    }

    /**
     * Test the second request for the same block will return a cached result
     *
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoApiDataFixture Magento/Cms/_files/block.php
     */
    public function testCacheIsUsedOnSecondRequest()
    {
        $blockIdentifier = 'fixture_block';
        $query = $this->getBlockQuery([$blockIdentifier]);

<<<<<<< HEAD
        //cache-debug should be a MISS on first request and HIT on the second request
        $response = $this->graphQlQueryWithResponseHeaders($query);
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $response['headers']);
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
        $blocks = $responseHit['body']['cmsBlocks']['items'];
        $this->assertEquals($blockIdentifier, $blocks[0]['identifier']);
        $this->assertEquals('CMS Block Title', $blocks[0]['title']);
    }

    /**
     * Test that cache is invalidated when block is updated
     *
<<<<<<< HEAD
     * @magentoConfigFixture default/system/full_page_cache/caching_application 2
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     * @magentoApiDataFixture Magento/Cms/_files/blocks.php
     * @magentoApiDataFixture Magento/Cms/_files/block.php
     */
    public function testCacheIsInvalidatedOnBlockUpdate()
    {
        $fixtureBlockIdentifier = 'fixture_block';
        $enabledBlockIdentifier = 'enabled_block';
        $fixtureBlockQuery = $this->getBlockQuery([$fixtureBlockIdentifier]);
        $enabledBlockQuery = $this->getBlockQuery([$enabledBlockIdentifier]);

<<<<<<< HEAD
        //cache-debug should be a MISS on first request and HIT on second request
        $fixtureBlock = $this->graphQlQueryWithResponseHeaders($fixtureBlockQuery);
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $fixtureBlock['headers']);
        $cacheIdOfFixtureBlock = $fixtureBlock['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        // Verify we obtain a cache MISS the first time
        $this->assertCacheMissAndReturnResponse(
            $fixtureBlockQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdOfFixtureBlock]
        );

        $enabledBlock = $this->graphQlQueryWithResponseHeaders($enabledBlockQuery);
        $this->assertArrayHasKey(CacheIdCalculator::CACHE_ID_HEADER, $enabledBlock['headers']);
        $cacheIdOfEnabledBlock = $enabledBlock['headers'][CacheIdCalculator::CACHE_ID_HEADER];
        // Verify we obtain a cache MISS the first time
        $this->assertCacheMissAndReturnResponse(
            $enabledBlockQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdOfEnabledBlock]
        );

        //cache should be a HIT on second request
        // Verify we obtain a cache HIT the second time
        $this->assertCacheHitAndReturnResponse(
            $fixtureBlockQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdOfFixtureBlock]
        );
        // Verify we obtain a cache HIT the second time
        $this->assertCacheHitAndReturnResponse(
            $enabledBlockQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdOfEnabledBlock]
        );

        //updating content on fixture block
        $newBlockContent = 'New block content!!!';
        $this->updateBlockContent($fixtureBlockIdentifier, $newBlockContent);

        // Verify we obtain a cache MISS on the fixture block query
        // after the content update on the fixture block
        $this->assertCacheMissAndReturnResponse(
            $fixtureBlockQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdOfFixtureBlock]
        );

        $fixtureBlockHitResponse = $this->assertCacheHitAndReturnResponse(
            $fixtureBlockQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdOfFixtureBlock]
        );

        //Verify we obtain a cache HIT on the enabled block query after the fixture block is updated
        $this->assertCacheHitAndReturnResponse(
            $enabledBlockQuery,
            [CacheIdCalculator::CACHE_ID_HEADER => $cacheIdOfEnabledBlock]
        );

        //updated block data should be correct on fixture block
        $this->assertNotEmpty($fixtureBlockHitResponse['body']);
        $blocks = $fixtureBlockHitResponse['body']['cmsBlocks']['items'];
        $this->assertArrayNotHasKey('errors', $fixtureBlockHitResponse['body']);
=======
        //cache-debug should be a MISS on first request
        $fixtureBlockMiss = $this->graphQlQueryWithResponseHeaders($fixtureBlockQuery);
        $this->assertEquals('MISS', $fixtureBlockMiss['headers']['X-Magento-Cache-Debug']);
        $enabledBlockMiss = $this->graphQlQueryWithResponseHeaders($enabledBlockQuery);
        $this->assertEquals('MISS', $enabledBlockMiss['headers']['X-Magento-Cache-Debug']);

        //cache-debug should be a HIT on second request
        $fixtureBlockHit = $this->graphQlQueryWithResponseHeaders($fixtureBlockQuery);
        $this->assertEquals('HIT', $fixtureBlockHit['headers']['X-Magento-Cache-Debug']);
        $enabledBlockHit = $this->graphQlQueryWithResponseHeaders($enabledBlockQuery);
        $this->assertEquals('HIT', $enabledBlockHit['headers']['X-Magento-Cache-Debug']);

        $newBlockContent = 'New block content!!!';
        $this->updateBlockContent($fixtureBlockIdentifier, $newBlockContent);

        //cache-debug should be a MISS after update the block
        $fixtureBlockMiss = $this->graphQlQueryWithResponseHeaders($fixtureBlockQuery);
        $this->assertEquals('MISS', $fixtureBlockMiss['headers']['X-Magento-Cache-Debug']);
        $enabledBlockHit = $this->graphQlQueryWithResponseHeaders($enabledBlockQuery);
        $this->assertEquals('HIT', $enabledBlockHit['headers']['X-Magento-Cache-Debug']);
        //updated block data should be correct
        $this->assertNotEmpty($fixtureBlockMiss['body']);
        $blocks = $fixtureBlockMiss['body']['cmsBlocks']['items'];
        $this->assertArrayNotHasKey('errors', $fixtureBlockMiss['body']);
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $this->assertEquals($fixtureBlockIdentifier, $blocks[0]['identifier']);
        $this->assertEquals('CMS Block Title', $blocks[0]['title']);
        $this->assertEquals($newBlockContent, $blocks[0]['content']);
    }

    /**
     * Update the content of a CMS block
     *
     * @param $identifier
     * @param $newContent
     * @return Block
     */
    private function updateBlockContent($identifier, $newContent): Block
    {
        $blockRepository = Bootstrap::getObjectManager()->get(BlockRepository::class);
        $block = $blockRepository->getById($identifier);
        $block->setContent($newContent);
        $blockRepository->save($block);
<<<<<<< HEAD
=======

>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        return $block;
    }

    /**
     * Get cmsBlocks query
     *
     * @param array $identifiers
     * @return string
     */
    private function getBlockQuery(array $identifiers): string
    {
        $identifiersString = implode(',', $identifiers);
        $query = <<<QUERY
<<<<<<< HEAD
    {
=======
    { 
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        cmsBlocks(identifiers: ["$identifiersString"]) {
            items {
                title
                identifier
                content
            }
        }
    }
QUERY;
        return $query;
    }
}
