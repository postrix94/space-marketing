<?php

namespace App\Controller;

use App\Services\Lead\LeadService;
use App\Validation\MainFormValidate;

class HomeController
{
    public function index()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "GET") {
            abort();
        }

        return view("home");
    }

    public function store()
    {
        if ($_SERVER["REQUEST_METHOD"] !== "POST") {
            abort();
        }

        $fields = ['firstName', 'lastName', 'email', 'phone'];
        $postData = array_intersect_key($_POST, array_flip($fields));

        $errors = (new MainFormValidate())->validate(data: $postData);

        if (count($errors)) {
            session_flash("error", $errors[0]);
            header("Location: /", true, 301);
            exit();
        }

        $leadService = new LeadService;
        $response = $leadService->addLead(data: $postData);

        $response->status
            ? session_flash(key: "message", message: $response->id)
            : session_flash(key: "error", message: $response->message);

        header("Location: /", true, 301);
        exit();
    }
}