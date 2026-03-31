<?php
namespace Vendor\CurrencyRate\Model;

class VietcombankApi
{
    const API_URL = 'https://portal.vietcombank.com.vn/Usercontrols/TVPortal.TyGia/pXML.aspx?b=68';

    public function fetchRates()
    {
        $ch = curl_init(self::API_URL);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $xmlString = curl_exec($ch);
        curl_close($ch);

        $xml = simplexml_load_string($xmlString);

        $rates = [];

        foreach ($xml->Exrate as $rate) {

            // 🔥 remove dấu phẩy
            $buy = str_replace(',', '', (string)$rate['Buy']);
            $transfer = str_replace(',', '', (string)$rate['Transfer']);
            $sell = str_replace(',', '', (string)$rate['Sell']);

            $rates[] = [
                'currency' => (string)$rate['CurrencyCode'],
                'buy' => $buy,
                'transfer' => $transfer,
                'sell' => $sell
            ];
        }

        return $rates;
    }
}
