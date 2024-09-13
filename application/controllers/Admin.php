<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{


    public $session_data = array(
        'username' => '',
        'role' => '',
        'logged_in' => FALSE
    );
    public function __construct()
    {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('form_validation');
        $this->load->model('VPageModel');
        $this->load->model('AdminModel');
        $this->load->model('ProductModel');
        $this->load->library('session');
    }

    public function index()
    {
        $data = [];

        if (!$this->session->userdata('logged_in')) {
            // Jika belum login
            $data = [
                "title" => "Ecoticraft CMS - Admin Login"
            ];
            $this->load->view('admin/login', $data);
        } else {
            // SUDAH LOGIN
            $data = [
                "title" => "Ecoticraft CMS",
                "css" => [
                    "style/admin/dashboard.css"
                ],
                "user" => [
                    "username" => $this->session->userdata('username'),
                    "role" => $this->session->userdata('role')
                ]

            ];
            $this->load->view('admin/templates/main', $data);
        }
    }

    public function login()
    {

        if ($this->input->server('REQUEST_METHOD') === 'POST') {

            $this->form_validation->set_rules('username', 'Username', 'required');
            $this->form_validation->set_rules('password', 'Password', 'required');

            if ($this->form_validation->run() == false) {
                // Jika validasi gagal
                redirect('admin');
            } else {
                // Jika validasi berhasil, proses data login
                $username = $this->input->post('username');
                $password = $this->input->post('password');

                $result = $this->AdminModel->login($username, $password);

                if ($result) {
                    // Jika login berhasil
                    $session_data = array(
                        'username' => $username,
                        'role' => $result->role,
                        'logged_in' => TRUE
                    );
                    $this->session->set_userdata($session_data);

                    redirect('admin');
                } else {
                    // Jika login gagal, tampilkan pesan error
                    $this->session->set_flashdata('username', $username);
                    $this->session->set_flashdata('error', 'Username atau password salah');
                    redirect('admin');
                }
            }
        } else {
            // Jika bukan POST
            redirect('admin');
        }
    }

    public function logout()
    {
        $this->session->sess_destroy();

        redirect('/admin');
    }






    public function dashboard()
    {
        if ($this->session->userdata('logged_in')) {
            date_default_timezone_set('Asia/Jakarta');
            $today = date('Y-m-d');
            $data = [
                "user" => [
                    "username" => $this->session->userdata('username'),
                    "role" => $this->session->userdata('role')
                ],
                "stat" => [
                    "total_view" => $this->VPageModel->getCountAllData(),
                    "pengunjung_hari_ini" => $this->VPageModel->getCountAllData('', $today),
                    "total_admin" => $this->AdminModel->getCountAdmin(),
                    "total_produk" => $this->ProductModel->getCountAllData()
                ]
            ];
            $this->load->view('admin/dashboard', $data);
        } else {
            redirect('admin');
        }
    }

    public function product()
    {
        if ($this->session->userdata('logged_in')) {

            $data = [
                "css" => [
                    "style/admin/product.css"
                ],
                "getAllProductVariasi" => $this->ProductModel->getAllData(TRUE, 10, 0)
            ];

            $this->load->view('admin/product', $data);
        } else {
            redirect('admin');
        }
    }

    public function umkm()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->view('admin/umkm');
        } else {
            redirect('admin');
        }
    }

    public function manageAdmin()
    {
        if ($this->session->userdata('logged_in')) {
            $this->load->view('admin/manageAdmin');
        } else {
            redirect('admin');
        }
    }
}


// CARA LOAD CSS nya dibenahi, di dashboard() dan di index()