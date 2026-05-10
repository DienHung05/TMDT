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
        'GBP' => 33120.0,
        'JPY' => 171.4,
        'KRW' => 18.9,
        'CNY' => 3650.0,
        'SGD' => 19580.0,
        'THB' => 720.0,
        'MYR' => 5570.0,
        'IDR' => 1.62,
        'PHP' => 455.0,
        'AUD' => 17180.0,
        'CAD' => 19120.0,
        'CHF' => 28900.0,
        'HKD' => 3370.0,
        'INR' => 315.0,
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
        $liveRates = $this->fetchFrankfurterLatest('VND', ['USD', 'EUR', 'JPY', 'KRW', 'GBP', 'AUD', 'CAD', 'CHF', 'CNY', 'SGD', 'THB', 'INR']);
        $rates = $liveRates ?: self::RATES;
        $pairs = ['USD', 'EUR', 'GBP', 'JPY', 'KRW', 'CNY', 'AUD', 'CAD', 'SGD', 'THB', 'MYR', 'IDR', 'PHP', 'CHF', 'HKD', 'INR'];
        $table = [];
        foreach ($pairs as $index => $code) {
            $direction = $index % 3 === 0 ? 1 : -1;
            $table[] = [
                'pair' => $code . '/VND',
                'rate' => $rates[$code] ?? self::RATES[$code] ?? 1,
                'change' => round($direction * (0.04 + (($index % 7) * 0.035)), 2),
                'updated' => $updated,
            ];
        }
        return [
            'success' => true,
            'updated_at' => $updated,
            'source' => $liveRates ? 'Frankfurter reference rate' : (getenv('FX_API_KEY') ? 'Configured FX provider' : 'Reference fallback rate'),
            'note' => 'Dữ liệu cập nhật theo ngày, không phải tick-by-tick realtime.',
            'rates' => $table,
            'supported' => array_keys(self::RATES),
            'news' => $this->currencyNews(),
            'mock' => !$liveRates,
        ];
    }

    private function convert(): array
    {
        $from = strtoupper(trim((string) $this->request->getParam('from', 'USD')));
        $to = strtoupper(trim((string) $this->request->getParam('to', 'VND')));
        $amount = max(0.0, (float) $this->request->getParam('amount', 100));
        $live = $this->fetchFrankfurterConvert($from, $to, $amount);
        if ($live) {
            return $live + [
                'success' => true,
                'updated_at' => gmdate('d/m/Y H:i'),
                'source' => 'Frankfurter reference rate',
                'mock' => false,
                'multi' => $this->multi($from, $amount),
            ];
        }
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
            'source' => getenv('FX_API_KEY') ? 'Configured FX provider' : 'Reference fallback rate',
            'mock' => true,
            'multi' => $this->multi($from, $amount),
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
            '6M' => 18,
            '1Y' => 12,
            '5Y' => 20,
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

    private function fetchFrankfurterConvert(string $from, string $to, float $amount): array
    {
        if ($from === $to) {
            return ['from' => $from, 'to' => $to, 'amount' => $amount, 'result' => $amount];
        }
        if ($from === 'VND' || $to === 'VND') {
            return [];
        }
        $data = $this->httpGetJson('https://api.frankfurter.app/latest?' . http_build_query([
            'amount' => $amount,
            'from' => $from,
            'to' => $to,
        ]));
        if (!isset($data['rates'][$to])) {
            return [];
        }
        return ['from' => $from, 'to' => $to, 'amount' => $amount, 'result' => (float) $data['rates'][$to]];
    }

    /**
     * Frankfurter returns foreign currency per VND when base=VND, so invert
     * values to expose the VND price for each foreign currency.
     *
     * @param array<int, string> $symbols
     * @return array<string, float>
     */
    private function fetchFrankfurterLatest(string $base, array $symbols): array
    {
        $data = $this->httpGetJson('https://api.frankfurter.app/latest?' . http_build_query([
            'from' => $base,
            'to' => implode(',', array_filter($symbols, static fn ($code) => $code !== $base)),
        ]));
        if (!is_array($data['rates'] ?? null)) {
            return [];
        }
        $rows = ['VND' => 1.0];
        foreach ($data['rates'] as $code => $rate) {
            $rate = (float) $rate;
            if ($rate > 0) {
                $rows[(string) $code] = 1 / $rate;
            }
        }
        return $rows;
    }

    /**
     * @return array<int, array{code:string,value:float}>
     */
    private function multi(string $from, float $amount): array
    {
        $targets = ['VND', 'EUR', 'JPY', 'KRW', 'GBP', 'AUD', 'SGD'];
        $rows = [];
        $fromRate = self::RATES[$from] ?? self::RATES['USD'];
        foreach ($targets as $code) {
            if ($code === $from) {
                continue;
            }
            $rows[] = [
                'code' => $code,
                'value' => $amount * ($fromRate / (self::RATES[$code] ?? 1.0)),
            ];
        }
        return $rows;
    }

    private function httpGetJson(string $url): array
    {
        if (!function_exists('curl_init')) {
            return [];
        }
        $ch = curl_init($url);
        if (!$ch) {
            return [];
        }
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT => 7,
            CURLOPT_HTTPHEADER => ['User-Agent: Techieworld/1.0'],
        ]);
        $body = curl_exec($ch);
        $code = (int) curl_getinfo($ch, CURLINFO_RESPONSE_CODE);
        curl_close($ch);
        if ($code < 200 || $code >= 300 || !is_string($body)) {
            return [];
        }
        $decoded = json_decode($body, true);
        return is_array($decoded) ? $decoded : [];
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
