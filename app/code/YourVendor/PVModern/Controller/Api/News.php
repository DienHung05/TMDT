<?php
declare(strict_types=1);

namespace YourVendor\PVModern\Controller\Api;

use Magento\Framework\App\Action\HttpGetActionInterface;
use Magento\Framework\App\RequestInterface;
use Magento\Framework\Controller\Result\JsonFactory;

class News implements HttpGetActionInterface
{
    private const CATEGORIES = ['all', 'ai', 'startup', 'mobile', 'gadgets', 'cybersecurity', 'software', 'gaming', 'fintech', 'science', 'business'];

    public function __construct(
        private readonly RequestInterface $request,
        private readonly JsonFactory $resultJsonFactory
    ) {
    }

    public function execute()
    {
        $category = strtolower(trim((string) $this->request->getParam('category', 'all')));
        $category = in_array($category, self::CATEGORIES, true) ? $category : 'all';
        $page = max(1, (int) $this->request->getParam('page', 1));
        $query = strtolower(trim((string) $this->request->getParam('q', '')));
        $perPage = 9;

        $articles = $this->buildArticles();
        $filtered = array_values(array_filter($articles, static function (array $article) use ($category, $query): bool {
            $matchesCategory = $category === 'all' || strtolower((string) $article['category_slug']) === $category;
            $haystack = strtolower((string) $article['title'] . ' ' . $article['summary'] . ' ' . $article['source']);
            return $matchesCategory && ($query === '' || str_contains($haystack, $query));
        }));

        $totalPages = max(1, (int) ceil(count($filtered) / $perPage));
        $page = min($page, $totalPages);
        $items = array_slice($filtered, ($page - 1) * $perPage, $perPage);

        $result = $this->resultJsonFactory->create();
        $result->setHeader('Cache-Control', 'public, max-age=600', true);
        return $result->setData([
            'success' => true,
            'category' => $category,
            'page' => $page,
            'total_pages' => $totalPages,
            'total' => count($filtered),
            'breaking' => array_slice(array_column($articles, 'title'), 0, 6),
            'lead' => $filtered[0] ?? $articles[0],
            'top' => array_slice($filtered ?: $articles, 1, 4),
            'items' => $items,
            'popular' => array_slice($articles, 2, 5),
            'topics' => ['AI PC', 'RTX 50-series', 'Cybersecurity', 'Startup Việt', 'Fintech', 'Cloud Gaming'],
            'mock' => getenv('NEWSAPI_KEY') ? false : true,
        ]);
    }

    /**
     * @return array<int, array<string, string>>
     */
    private function buildArticles(): array
    {
        $img = [
            'ai' => 'https://images.unsplash.com/photo-1677442136019-21780ecad995?auto=format&fit=crop&w=1400&q=82',
            'gadgets' => 'https://images.unsplash.com/photo-1518770660439-4636190af475?auto=format&fit=crop&w=1400&q=82',
            'cybersecurity' => 'https://images.unsplash.com/photo-1550751827-4bd374c3f58b?auto=format&fit=crop&w=1400&q=82',
            'mobile' => 'https://images.unsplash.com/photo-1511707171634-5f897ff02aa9?auto=format&fit=crop&w=1400&q=82',
            'gaming' => 'https://images.unsplash.com/photo-1542751371-adc38448a05e?auto=format&fit=crop&w=1400&q=82',
            'startup' => 'https://images.unsplash.com/photo-1519389950473-47ba0277781c?auto=format&fit=crop&w=1400&q=82',
            'software' => 'https://images.unsplash.com/photo-1516321318423-f06f85e504b3?auto=format&fit=crop&w=1400&q=82',
            'fintech' => 'https://images.unsplash.com/photo-1526304640581-d334cdbbf45e?auto=format&fit=crop&w=1400&q=82',
            'science' => 'https://images.unsplash.com/photo-1581093458791-9d42e7abbd35?auto=format&fit=crop&w=1400&q=82',
            'business' => 'https://images.unsplash.com/photo-1554224155-6726b3ff858f?auto=format&fit=crop&w=1400&q=82',
        ];
        $today = gmdate('d/m/Y');

        return [
            ['category_slug' => 'ai', 'category' => 'AI', 'time' => $today, 'title' => 'AI PC bước vào giai đoạn phổ cập với NPU mạnh hơn và phần mềm tối ưu hơn', 'summary' => 'Các hãng chip đang đẩy mạnh xử lý AI cục bộ, giúp laptop và desktop tăng tốc tác vụ sáng tạo, bảo mật và tự động hóa.', 'source' => 'Techieworld Brief', 'image' => $img['ai'], 'url' => 'https://www.theverge.com/ai-artificial-intelligence'],
            ['category_slug' => 'gadgets', 'category' => 'Gadgets', 'time' => $today, 'title' => 'Màn hình OLED tần số quét cao trở thành lựa chọn chủ đạo cho gaming và creator', 'summary' => 'OLED thế hệ mới tập trung giảm burn-in, tăng độ sáng và tối ưu độ trễ cho người dùng chơi game lẫn làm việc màu sắc.', 'source' => 'Hardware Desk', 'image' => $img['gadgets'], 'url' => 'https://www.tomshardware.com/monitors'],
            ['category_slug' => 'cybersecurity', 'category' => 'Cybersecurity', 'time' => $today, 'title' => 'Bảo mật endpoint cho cửa hàng online cần ưu tiên MFA, backup và kiểm soát plugin', 'summary' => 'Các website thương mại điện tử nhỏ dễ bị tấn công qua tài khoản admin yếu, extension lỗi thời và cấu hình backup kém.', 'source' => 'Security Note', 'image' => $img['cybersecurity'], 'url' => 'https://www.bleepingcomputer.com/'],
            ['category_slug' => 'mobile', 'category' => 'Mobile', 'time' => $today, 'title' => 'Laptop mỏng nhẹ dùng chip mới tăng thời lượng pin nhưng vẫn giữ hiệu năng AI', 'summary' => 'Các mẫu ultrabook 2026 tập trung cân bằng hiệu năng, màn hình đẹp, webcam tốt và khả năng chạy mô hình AI nhỏ offline.', 'source' => 'Mobile Lab', 'image' => $img['mobile'], 'url' => 'https://www.notebookcheck.net/'],
            ['category_slug' => 'gaming', 'category' => 'Gaming', 'time' => $today, 'title' => 'GPU mới khiến cấu hình chơi game 1440p trở nên dễ tiếp cận hơn', 'summary' => 'Thị trường card đồ họa đang dịch chuyển sang tối ưu hiệu năng mỗi watt và công nghệ upscale bằng AI.', 'source' => 'Gaming Wire', 'image' => $img['gaming'], 'url' => 'https://www.pcgamer.com/hardware/graphics-cards/'],
            ['category_slug' => 'startup', 'category' => 'Startup', 'time' => $today, 'title' => 'Startup phần mềm Việt tăng nhu cầu workstation, cloud GPU và thiết bị làm việc lai', 'summary' => 'Xu hướng phát triển sản phẩm AI và SaaS kéo theo nhu cầu phần cứng ổn định cho đội ngũ kỹ thuật.', 'source' => 'Startup Radar', 'image' => $img['startup'], 'url' => 'https://techcrunch.com/category/startups/'],
            ['category_slug' => 'software', 'category' => 'Software', 'time' => $today, 'title' => 'Developer toolchain hiện đại ưu tiên local-first, automation và kiểm thử nhanh', 'summary' => 'Máy trạm cấu hình tốt giúp vòng lặp build-test-deploy ngắn hơn, đặc biệt với frontend, mobile và AI-assisted coding.', 'source' => 'Dev Stack', 'image' => $img['software'], 'url' => 'https://www.infoq.com/'],
            ['category_slug' => 'fintech', 'category' => 'Fintech', 'time' => $today, 'title' => 'Thanh toán QR tiếp tục tăng trong bán lẻ nhờ trải nghiệm checkout nhanh', 'summary' => 'Ví điện tử và ngân hàng số đang đẩy mạnh QR, deeplink và xác thực giao dịch ngay trên ứng dụng.', 'source' => 'Fintech Watch', 'image' => $img['fintech'], 'url' => 'https://fintechnews.sg/'],
            ['category_slug' => 'science', 'category' => 'Science', 'time' => $today, 'title' => 'Vật liệu bán dẫn và đóng gói chip tiên tiến định hình thế hệ phần cứng mới', 'summary' => 'Nhu cầu AI làm tăng đầu tư vào bộ nhớ băng thông cao, chiplet và hệ thống tản nhiệt hiệu quả hơn.', 'source' => 'Science Hardware', 'image' => $img['science'], 'url' => 'https://spectrum.ieee.org/semiconductors'],
            ['category_slug' => 'business', 'category' => 'Business', 'time' => $today, 'title' => 'Doanh nghiệp bán lẻ công nghệ tập trung hậu mãi, bảo hành và tracking đơn hàng', 'summary' => 'Trải nghiệm sau mua hàng đang trở thành điểm cạnh tranh quan trọng bên cạnh giá và danh mục sản phẩm.', 'source' => 'Commerce Brief', 'image' => $img['business'], 'url' => 'https://www.retaildive.com/'],
        ];
    }
}
