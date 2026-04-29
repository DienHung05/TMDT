<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Api;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;
use YourVendor\PVModern\Model\Banner\HeroBannerProvider;

class Banners implements HttpGetActionInterface
{
    public function __construct(
        private readonly RequestInterface $request,
        private readonly JsonFactory $resultJsonFactory,
        private readonly HeroBannerProvider $heroBannerProvider
    ) {
    }

    public function execute()
    {
        $placement = trim((string) $this->request->getParam('placement', 'homepage-hero'));
        $slides = $this->heroBannerProvider->getSlides($placement);
        $hasAdminSlides = !empty(array_filter($slides, static function (array $slide): bool {
            return str_starts_with((string) ($slide['source'] ?? ''), 'cms-block:');
        }));

        $result = $this->resultJsonFactory->create();
        $result->setHeader('Cache-Control', 'public, max-age=300', true);

        return $result->setData([
            'success' => true,
            'placement' => $placement,
            'items' => $slides,
            'total' => count($slides),
            'mock' => !($hasAdminSlides || getenv('PVMODERN_HERO_BANNERS') || getenv('PVMODERN_HERO_BANNERS_JSON')),
        ]);
    }
}
