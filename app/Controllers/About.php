<?php

namespace App\Controllers;

class About extends BaseController
{
    public function index(): string
    {
        $data = [
            "title" => "Tim PPKO HM DKV UDINUS",
            "css" => "style/about/about.css"
        ];
        return view('about', $data);
    }
}
