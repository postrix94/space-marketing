<?php

namespace App\Services\Lead\API;


use App\Services\Lead\API\DTO\StatusResponseDTO;
use App\Services\Lead\API\Trait\LeadRequest;

class StatusesRequest
{
    use LeadRequest;

    /**
     * @param string $url
     * @param array $data
     * @return StatusResponseDTO
     */
    public static function handle(string $url, array $data): StatusResponseDTO
    {
        $responseDTO = new StatusResponseDTO();
        $response = self::init($url, $data);

        if (curl_errno(self::$ch)) {
            $responseDTO->setStatus(false)->setMessage("Error");
        } else {
            $response->status
                ? $responseDTO->setStatus(true)->addStatuses($response->data)
                : $responseDTO->setStatus(false)->setMessage($response->error);
        }

        curl_close(self::$ch);
        return $responseDTO;
    }
}