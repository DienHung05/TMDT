<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Model\Payment\Provider;

use YourVendor\PVModern\Model\Checkout\OrderPaymentStatus;

class BankTransferPaymentProvider extends AbstractPaymentProvider
{
    public function getCode(): string
    {
        return 'bank_transfer';
    }

    public function getLabel(): string
    {
        return 'Bank Transfer / VietQR';
    }

    public function getMethodCode(): string
    {
        return 'pvmodern_banktransfer';
    }

    public function getInitialStatus(): string
    {
        return OrderPaymentStatus::AWAITING_PAYMENT;
    }

    public function describeCheckoutMethod(array $context = []): array
    {
        $details = $this->integrationConfig->getBankTransferDetails();

        return parent::describeCheckoutMethod($context) + [
            'description' => 'Manual bank transfer with VietQR-style payment instructions.',
            'account_name' => $details['account_name'],
            'bank_name' => $details['bank_name'],
            'account_number' => $details['account_number'],
            'branch' => $details['branch'],
            'note_prefix' => $details['note_prefix'],
        ];
    }

    public function initialize(array $context): array
    {
        $details = $this->integrationConfig->getBankTransferDetails();
        $increment = $context['order_increment_id'] ?? 'PENDING';

        return [
            'status' => $this->getInitialStatus(),
            'label' => $this->getLabel(),
            'instructions' => [
                'account_name' => $details['account_name'],
                'account_number' => $details['account_number'],
                'bank_name' => $details['bank_name'],
                'branch' => $details['branch'],
                'transfer_reference' => sprintf('%s-%s', $details['note_prefix'], $increment),
            ],
            'mock' => true,
        ];
    }
}
