<?php

namespace App\Controllers;

class Home extends BaseController
{
    public function index(): string
    {
        $data = [
            "title" => "Tuntang Cikidul",
            "css" => "style/index/index.css"
        ];
        return view('index', $data);
    }
}
