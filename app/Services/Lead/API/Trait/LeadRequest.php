<?php

namespace App\Services\Lead\API\Trait;

use CurlHandle;
use stdClass;

trait LeadRequest
{
    private static CurlHandle $ch;

    /**
     * @param string $url
     * @param array $data
     * @return stdClass
     */
    private static function init(string $url, array $data): stdClass
    {
        $jsonData = json_encode($data);
        self::$ch = curl_init($url);
        $token = SPACE_MARKETING_TOKEN;

        curl_setopt(self::$ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt(self::$ch, CURLOPT_POST, true);
        curl_setopt(self::$ch, CURLOPT_HTTPHEADER, [
            "token: {$token}",
            'Content-Type: application/json'
        ]);

        curl_setopt(self::$ch, CURLOPT_POSTFIELDS, $jsonData);
        return json_decode(curl_exec(self::$ch));
    }
}