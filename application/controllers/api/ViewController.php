<?php
defined('BASEPATH') or exit('No direct script access allowed');


class ViewController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        $this->load->model('VPageModel');
        $this->load->library('template');
    }

    public function viewPage($page = 'home')
    {
        if ($this->VPageModel->insertCountView($page)) {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'Info', 'message' => "Sukses menambahkan data"]));
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'Terjadi Kesalahan', 'message' => "Gagal menambahkan data"]));
        }
    }
}
