<?php

namespace App\Services\Lead\API;

use App\Services\Lead\API\DTO\LeadResponseDTO;
use App\Services\Lead\API\Trait\LeadRequest;

class CreateLeadRequest
{
    use LeadRequest;

    /**
     * @param string $url
     * @param array $data
     * @return LeadResponseDTO
     */
    public static function handle(string $url, array $data): LeadResponseDTO
    {
        $responseDTO = new LeadResponseDTO();
        $response = self::init($url, $data);

        if (curl_errno(self::$ch)) {
            $responseDTO->setStatus(false)->setMessage("Error");
        } else {
            !$response->status
                ? $responseDTO->setStatus($response->status)->setMessage($response->error)
                : $responseDTO->setStatus($response->status)->setId($response->id);
        }

        curl_close(self::$ch);
        return $responseDTO;
    }
}