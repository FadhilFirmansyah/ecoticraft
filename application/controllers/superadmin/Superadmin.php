<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Superadmin extends CI_Controller
{

    public $session_data = array(
        'username' => '',
        'role' => '',
        'logged_in' => FALSE
    );
    public function __construct()
    {
        parent::__construct();

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");

        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('VPageModel');
        $this->load->model('superadmin/SuperadminModel');
        $this->load->model('AdminModel');
        $this->load->model('ProductModel');
        $this->load->library('session');
    }

    public function folderadmin()
    {
        if ($this->session->userdata('logged_in')) {

            $data = [
                "title_form" => "Directory Admin",
                "css" => [
                    "style/admin/form.css",
                    "style/admin/superadmin.css",
                    "style/admin/product.css"
                ]
            ];

            $this->load->view('admin/superadmin/folderadmin', $data);
        } else {
            redirect('admin');
        }
    }

    public function power()
    {
        if ($this->session->userdata('logged_in')) {

            $data = [
                "title_form" => "SuperAdmin Power",
                "css" => [
                    "style/admin/form.css",
                    "style/admin/superadmin.css"
                ]
            ];

            $this->load->view('admin/superadmin/superadmin', $data);
        } else {
            redirect('admin');
        }
    }

    public function querySql()
    {
        if ($this->session->userdata('logged_in')) {
            if ($this->input->server('REQUEST_METHOD') === 'GET') {

                $input = $this->input->get('query');

                $query = $this->SuperadminModel->vanillaQuery($input);

                if ($query != null || !$query) {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(['status' => 'Info', 'message' => "Query sukses", 'data' => $query]));
                } else {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(['status' => 'Info', 'message' => "Query gagal"]));
                }
            } else {
                $this->output
                    ->set_content_type('application/json')
                    ->set_output(json_encode(['status' => 'Info', 'message' => "Metode bukan post"]));
            }
        } else {
            $this->output
                ->set_content_type('application/json')
                ->set_output(json_encode(['status' => 'Info', 'message' => "Anda belum login"]));
        }
    }
}
