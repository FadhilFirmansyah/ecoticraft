<?php
defined('BASEPATH') or exit('No direct script access allowed');

class ProductApi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");


        $this->load->model('ProductModel');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function getAllProduct($limit = 5, $offset = 0){
        if ($this->session->userdata('logged_in')) {
        $data = [
            "getAllProductVariasi" => $this->ProductModel->getAllData(TRUE, $limit, $offset)
        ];

        $this->load->view('admin/api/view-product-list', $data);

        } else {
            show_404();
        }
    }

}
