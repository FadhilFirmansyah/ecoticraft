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
        $this->load->model('ProductModel');
        $this->load->model('UmkmModel');
    }



    public function product($isForm = 'add', $getId = null)
    {
        if ($this->session->userdata('logged_in')) {

            $data = [
                "title_form" => "Form",
                "css" => [
                    "style/admin/form.css"
                ]
            ];

            if ($isForm == "add") {

                $data["title_form"] = "Tambah Produk";

                $this->load->view('admin/form/product/add', $data);
            } else if ($isForm == "edit" && $getId != null) {

                $queryProduct = $this->ProductModel->getData($getId);
                $queryVariasi = $this->ProductModel->getVariasi($getId);

                $data = [
                    "title_form" => "Edit Produk",
                    "css" => [
                        "style/admin/form.css"
                    ],
                    "product" => $queryProduct,
                    "variasi" => $queryVariasi
                ];

                $this->load->view('admin/form/product/edit', $data);
            }
        } else {
            show_404();
        }
    }


    public function umkm($isForm = 'add', $getId = null)
    {
        if ($this->session->userdata('logged_in')) {
    
            $data = [
                "title_form" => "Form",
                "css" => [
                    "style/admin/form.css"
                ]
            ];
    
            if ($isForm == "add") {
    
                $data["title_form"] = "Tambah UMKM";
    
                $this->load->view('admin/form/umkm/add', $data);
            } else if ($isForm == "edit" && $getId != null) {
    
                $queryUmkm = $this->UmkmModel->getData($getId);
    
                $data = [
                    "title_form" => "Edit UMKM",
                    "css" => [
                        "style/admin/form.css"
                    ],
                    "umkm" => $queryUmkm
                ];
    
                $this->load->view('admin/form/umkm/edit', $data);
            }
        } else {
            show_404();
        }
    }

}
