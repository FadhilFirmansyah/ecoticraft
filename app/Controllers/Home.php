<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            "title" => "Tuntang Cikidul"
        ];
        return view('index', $data);
    }
}
