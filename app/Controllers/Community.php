<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Community extends BaseController
{
    public function index()
    {
        $data = [
            'title' => 'Komunitas Tuntang',
            'css' => 'style/community/community.css'
        ];
        return view('community', $data);
    }
}
