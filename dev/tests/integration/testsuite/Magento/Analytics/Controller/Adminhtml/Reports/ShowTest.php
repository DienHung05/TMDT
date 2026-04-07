<?php
/**
<<<<<<< HEAD
 * Copyright 2020 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
declare(strict_types=1);

namespace Magento\Analytics\Controller\Adminhtml\Reports;

use Magento\TestFramework\TestCase\AbstractBackendController;

/**
 * @magentoAppArea adminhtml
 */
class ShowTest extends AbstractBackendController
{
<<<<<<< HEAD
    private const REPORT_HOST = 'experienceleague.adobe.com';
    /**
     * @var string
     */
    protected $resource = 'Magento_Analytics::advanced_reporting';
    /**
     * @var string
=======
    private const REPORT_HOST = 'docs.magento.com';
    /**
     * @inheritDoc
     */
    protected $resource = 'Magento_Analytics::advanced_reporting';
    /**
     * @inheritDoc
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     */
    protected $uri = 'backend/analytics/reports/show';
    /**
     * @inheritDoc
     */
    public function testAclHasAccess()
    {
        parent::testAclHasAccess();
        $this->assertSame(302, $this->getResponse()->getHttpResponseCode());
        $this->assertSame(self::REPORT_HOST, $this->getResponse()->getHeader('location')->uri()->getHost());
    }
}
