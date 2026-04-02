<?php
namespace Vendor\News\Block;

use Magento\Framework\View\Element\Template;

class News extends Template
{
    public function getNews()
    {
        $rssUrl = "https://vnexpress.net/rss/tin-moi-nhat.rss";

        $data = [];

        try {
            $rss = simplexml_load_file($rssUrl);

            if ($rss && isset($rss->channel->item)) {
                foreach ($rss->channel->item as $item) {
                    $data[] = [
                        'title' => (string)$item->title,
                        'link' => (string)$item->link,
                        'description' => (string)$item->description,
                        'pubDate' => (string)$item->pubDate
                    ];
                }
            }
        } catch (\Exception $e) {
            return [];
        }

        return $data;
    }
}
