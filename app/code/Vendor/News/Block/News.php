<?php
namespace Vendor\News\Block;

use Magento\Framework\View\Element\Template;

class News extends Template
{
    public function getVnExpressNews()
    {
        $rssUrl = 'https://vnexpress.net/rss/tin-moi-nhat.rss';

        try {
            $content = file_get_contents($rssUrl);
            if ($content === false) return [];

            $xml = simplexml_load_string($content);
            $items = [];

            foreach ($xml->channel->item as $item) {
                $items[] = [
                    'title'       => (string)$item->title,
                    'description' => strip_tags((string)$item->description),
                    'link'        => (string)$item->link,
                    'pubDate'     => date('d/m/Y H:i', strtotime((string)$item->pubDate))
                ];
            }
            return array_slice($items, 0, 10);
        } catch (\Exception $e) {
            return [];
        }
    }
}
