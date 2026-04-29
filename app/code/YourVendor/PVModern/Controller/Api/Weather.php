<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Api;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class Weather implements HttpGetActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly JsonFactory $resultJsonFactory
    ) {
    }

    public function execute()
    {
        $city = trim((string) $this->request->getParam('city', 'Hanoi')) ?: 'Hanoi';
        $lat = trim((string) $this->request->getParam('lat', ''));
        $lon = trim((string) $this->request->getParam('lon', ''));
        $now = gmdate('d/m/Y H:i');
        $baseTemp = stripos($city, 'ho chi minh') !== false || stripos($city, 'hồ chí minh') !== false ? 32 : 27;

        $result = $this->resultJsonFactory->create();
        $result->setHeader('Cache-Control', 'public, max-age=900', true);
        return $result->setData([
            'success' => true,
            'location' => $lat && $lon ? sprintf('Lat %s, Lon %s', $lat, $lon) : $city,
            'updated_at' => $now,
            'current' => [
                'temperature' => $baseTemp,
                'condition' => $baseTemp >= 30 ? 'Nắng nóng nhẹ' : 'Có mây',
                'feels_like' => $baseTemp + 2,
                'humidity' => $baseTemp >= 30 ? 68 : 76,
                'wind' => $baseTemp >= 30 ? '12 km/h' : '9 km/h',
                'uv' => $baseTemp >= 30 ? '7 cao' : '4 vừa',
                'icon' => $baseTemp >= 30 ? '☀' : '☁',
            ],
            'alert' => [
                'severity' => 'normal',
                'title' => 'Không có cảnh báo thời tiết nghiêm trọng.',
                'time' => $now,
                'description' => 'Theo dõi cập nhật mưa lớn, bão và nắng nóng trong ngày.',
            ],
            'hourly' => $this->hourly($baseTemp),
            'daily' => $this->daily($baseTemp),
            'news' => $this->weatherNews(),
            'mock' => getenv('OPENWEATHER_API_KEY') ? false : true,
        ]);
    }

    private function hourly(int $baseTemp): array
    {
        $rows = [];
        for ($i = 0; $i < 12; $i++) {
            $rows[] = [
                'time' => gmdate('H:00', strtotime('+' . $i . ' hours')),
                'icon' => $i % 3 === 0 ? '🌦' : '☁',
                'temp' => $baseTemp + (($i % 4) - 1),
                'rain' => ($i * 7) % 60,
            ];
        }
        return $rows;
    }

    private function daily(int $baseTemp): array
    {
        $rows = [];
        for ($i = 0; $i < 8; $i++) {
            $rows[] = [
                'day' => gmdate('D d/m', strtotime('+' . $i . ' days')),
                'condition' => $i % 2 === 0 ? 'Có mây' : 'Mưa rào',
                'icon' => $i % 2 === 0 ? '⛅' : '🌧',
                'min' => $baseTemp - 4 + ($i % 2),
                'max' => $baseTemp + 2 + ($i % 3),
            ];
        }
        return $rows;
    }

    private function weatherNews(): array
    {
        return [
            ['title' => 'Mưa lớn cục bộ có thể ảnh hưởng giao hàng tại một số khu vực đô thị', 'summary' => 'Các đơn vị vận chuyển thường cập nhật ETA khi thời tiết xấu kéo dài.', 'image' => 'https://images.unsplash.com/photo-1504608524841-42fe6f032b4b?auto=format&fit=crop&w=1400&q=82'],
            ['title' => 'Nắng nóng khiến nhu cầu tản nhiệt laptop và PC tăng trong mùa cao điểm', 'summary' => 'Kiểm tra vệ sinh máy, keo tản nhiệt và luồng gió để giữ hiệu năng ổn định.', 'image' => 'https://images.unsplash.com/photo-1500530855697-b586d89ba3ee?auto=format&fit=crop&w=1400&q=82'],
            ['title' => 'Biến đổi khí hậu làm tăng nhu cầu dự báo thời tiết theo địa điểm', 'summary' => 'Dữ liệu thời tiết theo vị trí giúp vận hành bán lẻ và logistics chủ động hơn.', 'image' => 'https://images.unsplash.com/photo-1469474968028-56623f02e42e?auto=format&fit=crop&w=1400&q=82'],
        ];
    }
}
