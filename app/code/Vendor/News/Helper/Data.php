<?php

namespace Vendor\News\Helper;

use Magento\Framework\App\Helper\AbstractHelper;
use Magento\Framework\App\Helper\Context;
use Magento\Framework\HTTP\Client\Curl;

class Data extends AbstractHelper
{
    protected $curl;

    public function __construct(
        Context $context,
        Curl $curl
    ) {
        $this->curl = $curl;
        parent::__construct($context);
    }

    public function getVnExpressNews($limit = 10)
    {
        // RSS feed của VnExpress
        $rssUrl = 'https://vnexpress.net/rss/tin-moi-nhat.rss';

        try {
            $this->curl->get($rssUrl);
            $response = $this->curl->getBody();

            if (!$response) {
                return [];
            }

            $xml = simplexml_load_string($response);
            if (!$xml) {
                return [];
            }

            $news = [];
            $count = 0;

            foreach ($xml->channel->item as $item) {
                if ($count >= $limit) {
                    break;
                }

                $news[] = [
                    'title' => (string)$item->title,
                    'link' => (string)$item->link,
                    'description' => (string)$item->description,
                    'pubDate' => (string)$item->pubDate,
                    'guid' => (string)$item->guid
                ];
                $count++;
            }

            return $news;

        } catch (\Exception $e) {
            return [];
        }
    }
}
