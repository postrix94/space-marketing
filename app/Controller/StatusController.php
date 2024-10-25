<?php

namespace App\Controller;

use App\Services\Lead\LeadService;

class StatusController
{
    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "GET") {
            abort();
        }

        return view("statuses");
    }

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            abort();
        }

        $fields = ['start_date', 'end_date', 'start', 'length'];
        $postData = array_intersect_key($_POST, array_flip($fields));

        $leadService = new LeadService();
        $response = $leadService->getStatuses($postData);

        if ($response->status) {
            $data = [
                "draw" => intval($_POST['draw'] ?? 1),
                "recordsTotal" => count($response->statuses),
                "recordsFiltered" => count($response->statuses),
                "data" => $response->statuses
            ];

            echo json_encode($data);
        } else {
            echo json_encode(['status' => 'FAIL',], 400);
        }
    }
}