<?php
defined('BASEPATH') or exit('No direct script access allowed');

class FormController extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");


        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');

    }

 

    public function product($isForm = 'add'){
        if ($this->session->userdata('logged_in')) {

            $data = [
                "title_form" => "Form",
                "css" => [
                    "style/admin/form.css"
                ]
            ];

            if($isForm == "add"){

                $data["title_form"] = "Tambah Produk";

                $this->load->view('admin/form/product/add', $data);
            } else {
                $this->load->view('admin/form/product/add');
            }

        } else {
            show_404();
        }
    }

 
}