<?php
declare(strict_types=1);
namespace YourVendor\PVModern\Helper;

use Magento\Framework\App\ResourceConnection;
use Magento\Framework\DB\Adapter\AdapterInterface;

class PaymentDb
{
    private AdapterInterface $conn;

    public function __construct(ResourceConnection $resource)
    {
        $this->conn = $resource->getConnection();
    }

    public function getOrderTable(): string
    {
        return $this->conn->getTableName('pv_payment_order');
    }

    public function getVerifTable(): string
    {
        return $this->conn->getTableName('pv_payment_verification');
    }

    public function findByIncrementId(string $incrementId): ?array
    {
        // Try exact match first, then cast-numeric match (handles leading zeros vs plain number)
        $numeric = ltrim($incrementId, '0') ?: '0';
        $row = $this->conn->fetchRow(
            'SELECT * FROM ' . $this->getOrderTable()
            . ' WHERE magento_increment_id = ? OR (magento_increment_id + 0) = ? ORDER BY id DESC LIMIT 1',
            [$incrementId, $numeric]
        );
        return $row ?: null;
    }

    public function findById(int $id): ?array
    {
        $row = $this->conn->fetchRow(
            'SELECT * FROM ' . $this->getOrderTable() . ' WHERE id = ?',
            [$id]
        );
        return $row ?: null;
    }

    public function findByTransferCode(string $code): ?array
    {
        $row = $this->conn->fetchRow(
            'SELECT * FROM ' . $this->getOrderTable() . ' WHERE transfer_code = ? LIMIT 1',
            [$code]
        );
        return $row ?: null;
    }

    public function createOrder(array $data): int
    {
        $now = date('Y-m-d H:i:s');
        $data['created_at'] = $now;
        $data['updated_at'] = $now;
        $this->conn->insert($this->getOrderTable(), $data);
        return (int) $this->conn->lastInsertId();
    }

    public function updateOrder(int $id, array $data): void
    {
        $data['updated_at'] = date('Y-m-d H:i:s');
        $this->conn->update($this->getOrderTable(), $data, ['id = ?' => $id]);
    }

    public function logVerification(array $data): void
    {
        $data['created_at'] = date('Y-m-d H:i:s');
        $this->conn->insert($this->getVerifTable(), $data);
    }

    public function listOrders(array $filters = [], int $limit = 100, int $offset = 0): array
    {
        $where = [];
        $bind = [];
        if (!empty($filters['status'])) {
            $where[] = 'payment_status = ?';
            $bind[] = $filters['status'];
        }
        if (!empty($filters['method'])) {
            $where[] = 'payment_method = ?';
            $bind[] = $filters['method'];
        }
        if (!empty($filters['date'])) {
            $where[] = 'DATE(created_at) = ?';
            $bind[] = $filters['date'];
        }
        if (!empty($filters['search'])) {
            $like = '%' . $filters['search'] . '%';
            $where[] = '(magento_increment_id LIKE ? OR customer_name LIKE ? OR transfer_code LIKE ?)';
            $bind = array_merge($bind, [$like, $like, $like]);
        }
        $sql = 'SELECT * FROM ' . $this->getOrderTable();
        if ($where) { $sql .= ' WHERE ' . implode(' AND ', $where); }
        $sql .= ' ORDER BY created_at DESC LIMIT ' . (int)$limit . ' OFFSET ' . (int)$offset;
        return $this->conn->fetchAll($sql, $bind);
    }

    public function countOrders(string $status = ''): int
    {
        $sql = 'SELECT COUNT(*) FROM ' . $this->getOrderTable();
        $bind = [];
        if ($status) { $sql .= ' WHERE payment_status = ?'; $bind[] = $status; }
        return (int) $this->conn->fetchOne($sql, $bind);
    }

    public function listVerifications(int $pvOrderId = 0, string $date = ''): array
    {
        $where = [];
        $bind = [];
        if ($pvOrderId) { $where[] = 'pv_order_id = ?'; $bind[] = $pvOrderId; }
        if ($date) { $where[] = 'DATE(created_at) = ?'; $bind[] = $date; }
        $sql = 'SELECT * FROM ' . $this->getVerifTable();
        if ($where) { $sql .= ' WHERE ' . implode(' AND ', $where); }
        $sql .= ' ORDER BY created_at DESC LIMIT 200';
        return $this->conn->fetchAll($sql, $bind);
    }

    public function generateTransferCode(string $incrementId): string
    {
        return 'ORD' . preg_replace('/[^0-9]/', '', $incrementId);
    }
}
