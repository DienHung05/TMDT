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

namespace Magento\Framework\Backup;

use Magento\Backup\Helper\Data;
<<<<<<< HEAD
use Magento\Backup\Model\ResourceModel\Db;
=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
use Magento\Framework\App\Filesystem\DirectoryList;
use Magento\Framework\Filesystem;
use Magento\Framework\Module\Setup;
use Magento\TestFramework\Helper\Bootstrap;
<<<<<<< HEAD
use Magento\Framework\Backup\BackupInterface;
=======
use PHPUnit\Framework\TestCase;
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f

/**
 * Provide tests for \Magento\Framework\Backup\Db.
 */
class DbTest extends \Magento\TestFramework\Indexer\TestCase
{
    public static function setUpBeforeClass(): void
    {
        $db = Bootstrap::getInstance()->getBootstrap()
            ->getApplication()
            ->getDbInstance();
        if (!$db->isDbDumpExists()) {
            throw new \LogicException('DB dump does not exist.');
        }
        $db->restoreFromDbDump();

        parent::setUpBeforeClass();
    }

    /**
<<<<<<< HEAD
     * Test db backup and rollback including triggers.
=======
     * Test db backup includes triggers.
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
     *
     * @magentoConfigFixture default/system/backup/functionality_enabled 1
     * @magentoDataFixture Magento/Framework/Backup/_files/trigger.php
     * @magentoDbIsolation disabled
     */
<<<<<<< HEAD
    public function testBackupAndRollbackIncludesCustomTriggers()
    {
        $helper = Bootstrap::getObjectManager()->get(Data::class);
        $time = time();
        /** BackupInterface $backupManager */
=======
    public function testBackupIncludesCustomTriggers()
    {
        $helper = Bootstrap::getObjectManager()->get(Data::class);
        $time = time();
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        $backupManager = Bootstrap::getObjectManager()->get(Factory::class)->create(
            Factory::TYPE_DB
        )->setBackupExtension(
            $helper->getExtensionByType(Factory::TYPE_DB)
        )->setTime(
            $time
        )->setBackupsDir(
            $helper->getBackupsDir()
        )->setName('test_backup');
        $backupManager->create();
        $write = Bootstrap::getObjectManager()->get(Filesystem::class)->getDirectoryWrite(DirectoryList::VAR_DIR);
        $content = $write->readFile('/backups/' . $time . '_db_testbackup.sql');
        $tableName = Bootstrap::getObjectManager()->get(Setup::class)
            ->getTable('test_table_with_custom_trigger');
        $this->assertMatchesRegularExpression(
            '/CREATE  TRIGGER `?test_custom_trigger`? AFTER INSERT ON `?'. $tableName . '`? FOR EACH ROW/',
            $content
        );
<<<<<<< HEAD

        // Test rollback
        $backupResourceModel = Bootstrap::getObjectManager()->get(Db::class);
        $backupManager->setResourceModel($backupResourceModel);
        $backupManager->rollback();

=======
>>>>>>> cd2dc8bb627573641d87e5e03a85271f17f3264f
        //Clean up.
        $write->delete('/backups/' . $time . '_db_testbackup.sql');
    }
}
