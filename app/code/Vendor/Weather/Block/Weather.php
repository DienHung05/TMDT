<?php
namespace Vendor\Weather\Block;

use Magento\Framework\View\Element\Template;
use Vendor\Weather\Model\WeatherApi;

class Weather extends Template
{
    protected $weatherApi;

    public function __construct(
        Template\Context $context,
        WeatherApi $weatherApi,
        array $data = []
    ) {
        $this->weatherApi = $weatherApi;
        parent::__construct($context, $data);
    }

    public function getWeatherData()
    {
        return $this->weatherApi->getWeather("Hanoi");
    }
}
