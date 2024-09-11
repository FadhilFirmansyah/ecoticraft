<?php
defined('BASEPATH') or exit('No direct script access allowed');

class PageController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");


        $this->load->model('VPageModel');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function allpage()
    {
        if ($this->session->userdata('logged_in')) {
            $allData = $this->VPageModel->getCountDate();

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($allData));
        } else {
            show_404();
        }
    }
    public function homepage()
    {
        if ($this->session->userdata('logged_in')) {
            $allData = $this->VPageModel->getCountDate('home');

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($allData));
        } else {
            show_404();
        }
    }
    public function productpage()
    {
        if ($this->session->userdata('logged_in')) {
            $allData = $this->VPageModel->getCountDate('product');

            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode($allData));
        } else {
            show_404();
        }
    }
}
