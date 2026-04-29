<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Api;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class Currency implements HttpGetActionInterface
{
    private const RATES = [
        'USD' => 26336.0,
        'EUR' => 28480.0,
        'JPY' => 171.4,
        'KRW' => 18.9,
        'GBP' => 33120.0,
        'AUD' => 17180.0,
        'VND' => 1.0,
    ];

    public function __construct(
        private readonly RequestInterface $request,
        private readonly JsonFactory $resultJsonFactory
    ) {
    }

    public function execute()
    {
        $mode = strtolower(trim((string) $this->request->getParam('mode', 'latest')));
        $result = $this->resultJsonFactory->create();
        $result->setHeader('Cache-Control', 'public, max-age=600', true);

        if ($mode === 'convert') {
            return $result->setData($this->convert());
        }
        if ($mode === 'history') {
            return $result->setData($this->history());
        }
        return $result->setData($this->latest());
    }

    private function latest(): array
    {
        $updated = gmdate('d/m/Y H:i');
        return [
            'success' => true,
            'updated_at' => $updated,
            'source' => getenv('FX_API_KEY') ? 'Configured FX provider' : 'Reference mock rate',
            'note' => 'Dữ liệu cập nhật theo ngày, không phải tick-by-tick realtime.',
            'rates' => [
                ['pair' => 'USD/VND', 'rate' => self::RATES['USD'], 'change' => 0.18, 'updated' => $updated],
                ['pair' => 'EUR/VND', 'rate' => self::RATES['EUR'], 'change' => -0.09, 'updated' => $updated],
                ['pair' => 'JPY/VND', 'rate' => self::RATES['JPY'], 'change' => 0.04, 'updated' => $updated],
                ['pair' => 'KRW/VND', 'rate' => self::RATES['KRW'], 'change' => -0.12, 'updated' => $updated],
                ['pair' => 'GBP/VND', 'rate' => self::RATES['GBP'], 'change' => 0.21, 'updated' => $updated],
                ['pair' => 'AUD/VND', 'rate' => self::RATES['AUD'], 'change' => -0.03, 'updated' => $updated],
            ],
            'news' => $this->currencyNews(),
            'mock' => getenv('FX_API_KEY') ? false : true,
        ];
    }

    private function convert(): array
    {
        $from = strtoupper(trim((string) $this->request->getParam('from', 'USD')));
        $to = strtoupper(trim((string) $this->request->getParam('to', 'VND')));
        $amount = max(0.0, (float) $this->request->getParam('amount', 100));
        $fromRate = self::RATES[$from] ?? self::RATES['USD'];
        $toRate = self::RATES[$to] ?? self::RATES['VND'];
        $result = $amount * ($fromRate / $toRate);

        return [
            'success' => true,
            'from' => $from,
            'to' => $to,
            'amount' => $amount,
            'result' => $result,
            'updated_at' => gmdate('d/m/Y H:i'),
            'source' => getenv('FX_API_KEY') ? 'Configured FX provider' : 'Reference mock rate',
            'mock' => getenv('FX_API_KEY') ? false : true,
        ];
    }

    private function history(): array
    {
        $range = strtoupper(trim((string) $this->request->getParam('range', '1M')));
        $points = [];
        $days = match ($range) {
            '1D' => 8,
            '7D' => 7,
            '3M' => 12,
            '1Y' => 12,
            default => 30,
        };
        for ($i = $days - 1; $i >= 0; $i--) {
            $points[] = [
                'label' => gmdate('d/m', strtotime('-' . $i . ' days')),
                'value' => round(self::RATES['USD'] + sin($i / 3) * 95 + ($i % 5) * 11, 2),
            ];
        }

        return [
            'success' => true,
            'range' => $range,
            'points' => $points,
            'note' => 'Dữ liệu cập nhật theo ngày.',
        ];
    }

    private function currencyNews(): array
    {
        return [
            ['title' => 'USD/VND biến động theo kỳ vọng lãi suất và nhu cầu nhập khẩu thiết bị', 'summary' => 'Các doanh nghiệp bán lẻ công nghệ theo dõi tỷ giá để tối ưu giá nhập hàng.', 'image' => 'https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=1400&q=82'],
            ['title' => 'Ngân hàng trung ương lớn tiếp tục ảnh hưởng xu hướng EUR và GBP', 'summary' => 'Quyết định lãi suất có thể làm thay đổi chi phí nhập khẩu linh kiện.', 'image' => 'https://images.unsplash.com/photo-1567427017947-545c5f8d16ad?auto=format&fit=crop&w=1400&q=82'],
            ['title' => 'JPY và KRW được quan tâm do chuỗi cung ứng màn hình, RAM và bán dẫn', 'summary' => 'Biến động tiền tệ châu Á tác động trực tiếp đến giá phần cứng.', 'image' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=1400&q=82'],
        ];
    }
}
