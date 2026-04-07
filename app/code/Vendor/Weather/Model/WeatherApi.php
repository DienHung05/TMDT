<?php
namespace Vendor\Weather\Model;

class WeatherApi
{
    protected $apiKey = "a4c1ecbe459014464e37c6752009e07d";

    public function getWeather($city = "Hanoi")
    {
        $url = "https://api.openweathermap.org/data/2.5/weather?q="
            . $city . "&appid=" . $this->apiKey . "&units=metric";

        $response = file_get_contents($url);
        return json_decode($response, true);
    }
}
