<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Block\Warranty;

use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use YourVendor\PVModern\Model\WarrantyCardProvider;

class Lookup extends Template
{
    private ?array $lookupResult = null;
    private bool $resultResolved = false;

    public function __construct(
        Context $context,
        private readonly WarrantyCardProvider $warrantyCardProvider,
        array $data = []
    ) {
        parent::__construct($context, $data);
    }

    public function getSampleCards(int $limit = 3): array
    {
        return $this->warrantyCardProvider->getCards($limit);
    }

    public function getLookupResult(): ?array
    {
        if ($this->resultResolved) {
            return $this->lookupResult;
        }

        $this->resultResolved = true;
        $mode = $this->getLookupMode();

        if ($mode === 'imei') {
            $this->lookupResult = $this->warrantyCardProvider->findByImei((string) $this->getRequest()->getParam('imei'));
        } elseif ($mode === 'card') {
            $this->lookupResult = $this->warrantyCardProvider->findByPhoneAndCode(
                (string) $this->getRequest()->getParam('phone'),
                (string) $this->getRequest()->getParam('purchase_code')
            );
        }

        return $this->lookupResult;
    }

    public function hasLookupAttempt(): bool
    {
        return $this->getLookupMode() !== '';
    }

    public function getLookupMode(): string
    {
        $mode = trim((string) $this->getRequest()->getParam('lookup', ''));
        if ($mode === '') {
            if (trim((string) $this->getRequest()->getParam('imei', '')) !== '') {
                return 'imei';
            }
            if (
                trim((string) $this->getRequest()->getParam('phone', '')) !== '' ||
                trim((string) $this->getRequest()->getParam('purchase_code', '')) !== ''
            ) {
                return 'card';
            }
        }

        return $mode;
    }

    public function getFieldValue(string $field): string
    {
        return trim((string) $this->getRequest()->getParam($field, ''));
    }

    public function getLookupMessage(): string
    {
        if (!$this->hasLookupAttempt()) {
            return '';
        }

        if ($this->getLookupResult()) {
            return '';
        }

        if ($this->getLookupMode() === 'imei') {
            return 'No warranty card matched that IMEI. Check the digits and try again.';
        }

        return 'No warranty card matched that phone number and purchase code combination.';
    }
}
