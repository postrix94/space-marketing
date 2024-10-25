<?php

namespace App\Services\Lead;

use App\Services\Lead\API\CreateLeadRequest;
use App\Services\Lead\API\DTO\LeadResponseDTO;
use App\Services\Lead\API\DTO\StatusResponseDTO;
use App\Services\Lead\API\StatusesRequest;
use DateTime;

class LeadService
{
    /**
     * @param array $data
     * @return LeadResponseDTO
     */
    public function addLead(array $data): LeadResponseDTO
    {
        $url = 'https://crm.belmar.pro/api/v1/addlead';

        $data["box_id"] = 28;
        $data["offer_id"] = 5;
        $data["countryCode"] = 'GB';
        $data["language"] = 'en';
        $data["password"] = 'qwerty12';
        $data["ip"] = $_SERVER['REMOTE_ADDR'];
        $data["landingUrl"] = getDomain();

        return CreateLeadRequest::handle(url: $url, data: $data);
    }

    /**
     * @param array $data
     * @return StatusResponseDTO
     */
    public function getStatuses(array $data): StatusResponseDTO
    {
        $url = 'https://crm.belmar.pro/api/v1/getstatuses';
        $this->checkDate($data);

        $data = [
            "date_from" => $data['start_date'],
            "date_to" => $data['end_date'],
            "page" => $data["start"] ?? 0,
            "limit" => $data["length"] ?? 10,
        ];

        return StatusesRequest::handle(url: $url, data: $data);
    }

    /**
     * @param array $data
     * @return void
     */
    private function checkDate(array &$data): void
    {
        date_default_timezone_set('Europe/Kiev');
        $format = 'Y-m-d';

        $dateFrom = DateTime::createFromFormat($format, $data["start_date"] ?? date('Y-m-01'));
        $dateEnd = DateTime::createFromFormat($format, $data["end_date"] ?? date('Y-m-t'));

        $dateFrom->setTime("0", "0", "0",);
        $dateEnd->setTime("23", "59", "59");

        $data["start_date"] = $dateFrom->format('Y-m-d H:i:s');
        $data["end_date"] = $dateEnd->format('Y-m-d H:i:s');
    }
}