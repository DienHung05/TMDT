<?php
/**
<<<<<<< HEAD
 * Copyright 2014 Adobe
 * All Rights Reserved.
=======
 * Copyright © Magento, Inc. All rights reserved.
 * See COPYING.txt for license details.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
 */
namespace Magento\TestFramework\Indexer;

class TestCase extends \PHPUnit\Framework\TestCase
{
    /**
     * @var bool
     */
    protected static $dbRestored = false;

    /**
     * @inheritDoc
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     * @return void
     */
    public static function tearDownAfterClass(): void
    {
        if (empty(static::$dbRestored)) {
            self::restoreFromDb();
        }
    }

    /**
     * Restore DB data after test execution.
     *
     * @throws \Magento\Framework\Exception\LocalizedException
     */
    protected static function restoreFromDb(): void
    {
        $db = \Magento\TestFramework\Helper\Bootstrap::getInstance()->getBootstrap()
            ->getApplication()
            ->getDbInstance();
        if (!$db->isDbDumpExists()) {
            throw new \LogicException('DB dump does not exist.');
        }
        $db->restoreFromDbDump();
    }
}
