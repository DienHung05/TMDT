<?php
declare(strict_types=1);
namespace YourVendor\PVModern\Setup\Patch\Schema;
use Magento\Framework\DB\Ddl\Table;
use Magento\Framework\Setup\Patch\SchemaPatchInterface;
use Magento\Framework\Setup\SchemaSetupInterface;

class CreatePaymentTables implements SchemaPatchInterface
{
    public function __construct(private readonly SchemaSetupInterface $schemaSetup) {}

    public function apply(): static
    {
        $setup = $this->schemaSetup;
        $setup->startSetup();
        $conn = $setup->getConnection();
        $now = date('Y-m-d H:i:s');

        if (!$conn->isTableExists($setup->getTable('pv_payment_order'))) {
            $t = $conn->newTable($setup->getTable('pv_payment_order'))
                ->addColumn('id', Table::TYPE_INTEGER, null, ['identity'=>true,'unsigned'=>true,'nullable'=>false,'primary'=>true])
                ->addColumn('magento_increment_id', Table::TYPE_TEXT, 32, ['nullable'=>true,'default'=>null])
                ->addColumn('transfer_code', Table::TYPE_TEXT, 32, ['nullable'=>false,'default'=>''])
                ->addColumn('customer_name', Table::TYPE_TEXT, 255, ['nullable'=>false,'default'=>''])
                ->addColumn('customer_email', Table::TYPE_TEXT, 255, ['nullable'=>false,'default'=>''])
                ->addColumn('customer_phone', Table::TYPE_TEXT, 32, ['nullable'=>false,'default'=>''])
                ->addColumn('total_amount', Table::TYPE_DECIMAL, '12,2', ['nullable'=>false,'default'=>'0.00'])
                ->addColumn('payment_method', Table::TYPE_TEXT, 32, ['nullable'=>false,'default'=>''])
                ->addColumn('payment_status', Table::TYPE_TEXT, 20, ['nullable'=>false,'default'=>'pending'])
                ->addColumn('screenshot_url', Table::TYPE_TEXT, 512, ['nullable'=>true,'default'=>null])
                ->addColumn('screenshot_token', Table::TYPE_TEXT, 64, ['nullable'=>true,'default'=>null])
                ->addColumn('current_step', Table::TYPE_SMALLINT, null, ['unsigned'=>true,'nullable'=>false,'default'=>4])
                ->addColumn('expires_at', Table::TYPE_DATETIME, null, ['nullable'=>false,'default'=>$now])
                ->addColumn('paid_at', Table::TYPE_DATETIME, null, ['nullable'=>true,'default'=>null])
                ->addColumn('admin_note', Table::TYPE_TEXT, '64k', ['nullable'=>true,'default'=>null])
                ->addColumn('created_at', Table::TYPE_DATETIME, null, ['nullable'=>false,'default'=>$now])
                ->addColumn('updated_at', Table::TYPE_DATETIME, null, ['nullable'=>false,'default'=>$now])
                ->addIndex($setup->getIdxName('pv_payment_order','magento_increment_id'), ['magento_increment_id'])
                ->addIndex($setup->getIdxName('pv_payment_order','transfer_code'), ['transfer_code'])
                ->addIndex($setup->getIdxName('pv_payment_order','payment_status'), ['payment_status'])
                ->setComment('PVModern Payment Orders');
            $conn->createTable($t);
        }

        if (!$conn->isTableExists($setup->getTable('pv_payment_verification'))) {
            $t = $conn->newTable($setup->getTable('pv_payment_verification'))
                ->addColumn('id', Table::TYPE_INTEGER, null, ['identity'=>true,'unsigned'=>true,'nullable'=>false,'primary'=>true])
                ->addColumn('pv_order_id', Table::TYPE_INTEGER, null, ['unsigned'=>true,'nullable'=>false,'default'=>0])
                ->addColumn('source', Table::TYPE_TEXT, 32, ['nullable'=>false,'default'=>''])
                ->addColumn('amount', Table::TYPE_DECIMAL, '12,2', ['nullable'=>true,'default'=>null])
                ->addColumn('transaction_id', Table::TYPE_TEXT, 128, ['nullable'=>true,'default'=>null])
                ->addColumn('raw_payload', Table::TYPE_TEXT, '64k', ['nullable'=>true,'default'=>null])
                ->addColumn('admin_user', Table::TYPE_TEXT, 128, ['nullable'=>true,'default'=>null])
                ->addColumn('note', Table::TYPE_TEXT, '64k', ['nullable'=>true,'default'=>null])
                ->addColumn('created_at', Table::TYPE_DATETIME, null, ['nullable'=>false,'default'=>$now])
                ->addIndex($setup->getIdxName('pv_payment_verification','pv_order_id'), ['pv_order_id'])
                ->setComment('PVModern Payment Verifications');
            $conn->createTable($t);
        }
        $setup->endSetup();
        return $this;
    }
    public static function getDependencies(): array { return []; }
    public function getAliases(): array { return []; }
}
