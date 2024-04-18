<?php
namespace App\Helpers;

use GuzzleHttp\Client;

class QRCodeHelper
{
    public static function generate($data, $size = 200)
    {
        $client = new Client();
        $url = 'https://quickchart.io/qr?text='. $data .'&size' . $size;

        try {
            $response = $client->get($url);
            return $response->getBody()->getContents();
        } catch (\Exception $e) {
            // Handle error
            return null;
        }
    }
}
