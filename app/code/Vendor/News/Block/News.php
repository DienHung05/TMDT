<?php
namespace Vendor\News\Block;
use Magento\Framework\View\Element\Template;
use Magento\Framework\View\Element\Template\Context;
use Magento\Framework\HTTP\Client\Curl;

class News extends Template
{
    protected $curl;
    protected $currentPage;
    protected $perPage = 6;
    protected $currentTab = 'business';
    protected $newsCache = [];

    protected $rssFeeds = [
        'business' => 'https://vnexpress.net/rss/kinh-doanh.rss',
        'lifestyle' => 'https://vnexpress.net/rss/cuoi.rss'
    ];

    public function __construct(
        Context $context,
        Curl $curl,
        array $data = []
    ) {
        $this->curl = $curl;
        parent::__construct($context, $data);
    }

    public function getCurrentTab()
    {
        $tab = $this->getRequest()->getParam('tab', 'business');
        $this->currentTab = in_array($tab, ['business', 'lifestyle']) ? $tab : 'business';
        return $this->currentTab;
    }

    public function getNewsByCategory($category)
    {
        if (!isset($this->rssFeeds[$category])) {
            return [];
        }

        // Check cache trong session hoặc cache của Magento
        $cacheKey = 'vnexpress_news_' . $category;
        $cached = $this->_cache->load($cacheKey);
        if ($cached) {
            return unserialize($cached);
        }

        try {
            $this->curl->get($this->rssFeeds[$category]);
            $xml = simplexml_load_string($this->curl->getBody());
            $news = [];

            if ($xml && isset($xml->channel->item)) {
                foreach ($xml->channel->item as $item) {
                    $news[] = [
                        'title' => (string)$item->title,
                        'link' => (string)$item->link,
                        'pubDate' => date('d/m/Y H:i', strtotime((string)$item->pubDate)),
                        'description' => (string)$item->description,
                        'image' => $this->extractImage((string)$item->description),
                        'imageLoaded' => false
                    ];
                }
            }

            // Cache trong 10 phút
            $this->_cache->save(serialize($news), $cacheKey, [], 600);
            return $news;
        } catch (\Exception $e) {
            return [];
        }
    }

    public function extractImage($description)
    {
        preg_match('/<img.*?src=["\'](.*?)["\']/', $description, $matches);
        if (isset($matches[1])) {
            return $matches[1];
        }
        return 'https://cdn-icons-png.flaticon.com/512/2991/2991148.png';
    }

    public function getPagedNews()
    {
        $category = $this->getCurrentTab();
        $allNews = $this->getNewsByCategory($category);
        $currentPage = $this->getCurrentPage();
        $offset = ($currentPage - 1) * $this->perPage;
        return array_slice($allNews, $offset, $this->perPage);
    }

    public function getCurrentPage()
    {
        $page = $this->getRequest()->getParam('p', 1);
        $this->currentPage = max(1, (int)$page);
        return $this->currentPage;
    }

    public function getTotalPages()
    {
        $category = $this->getCurrentTab();
        $allNews = $this->getNewsByCategory($category);
        return ceil(count($allNews) / $this->perPage);
    }

    public function getPaginationHtml()
    {
        $currentPage = $this->getCurrentPage();
        $totalPages = $this->getTotalPages();
        $currentTab = $this->getCurrentTab();

        if ($totalPages <= 1) {
            return '';
        }

        $html = '<div class="pagination"><ul class="pagination-list">';

        if ($currentPage > 1) {
            $html .= '<li><a href="?tab=' . $currentTab . '&p=' . ($currentPage - 1) . '" class="page-link prev">&laquo; Prev</a></li>';
        } else {
            $html .= '<li><span class="page-link prev disabled">&laquo; Prev</span></li>';
        }

        $start = max(1, $currentPage - 2);
        $end = min($totalPages, $currentPage + 2);

        if ($start > 1) {
            $html .= '<li><a href="?tab=' . $currentTab . '&p=1" class="page-link">1</a></li>';
            if ($start > 2) $html .= '<li><span class="page-link dots">...</span></li>';
        }

        for ($i = $start; $i <= $end; $i++) {
            if ($i == $currentPage) {
                $html .= '<li><span class="page-link active">' . $i . '</span></li>';
            } else {
                $html .= '<li><a href="?tab=' . $currentTab . '&p=' . $i . '" class="page-link">' . $i . '</a></li>';
            }
        }

        if ($end < $totalPages) {
            if ($end < $totalPages - 1) $html .= '<li><span class="page-link dots">...</span></li>';
            $html .= '<li><a href="?tab=' . $currentTab . '&p=' . $totalPages . '" class="page-link">' . $totalPages . '</a></li>';
        }

        if ($currentPage < $totalPages) {
            $html .= '<li><a href="?tab=' . $currentTab . '&p=' . ($currentPage + 1) . '" class="page-link next">Next &raquo;</a></li>';
        } else {
            $html .= '<li><span class="page-link next disabled">Next &raquo;</span></li>';
        }

        $html .= '</ul></div>';
        return $html;
    }

    public function isActiveTab($tab)
    {
        return $this->getCurrentTab() == $tab;
    }

    public function getImagePlaceholder()
    {
        return 'data:image/svg+xml,%3Csvg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 400 200"%3E%3Crect width="400" height="200" fill="%23e9ecef"/%3E%3Ctext x="50%25" y="50%25" text-anchor="middle" dy=".3em" fill="%23adb5bd"%3ELoading...%3C/text%3E%3C/svg%3E';
    }
}
