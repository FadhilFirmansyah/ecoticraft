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
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
    }

    public function getAllProduct($limit = 5, $offset = 0)
    {
        if ($this->session->userdata('logged_in')) {
            $data = [
                "getAllProductVariasi" => $this->ProductModel->getAllData(TRUE, $limit, $offset)
            ];

            $this->load->view('admin/api/view-product-list', $data);
        } else {
            show_404();
        }
    }

    public function delProduct()
    {
        if ($this->session->userdata('logged_in')) {
            if ($this->input->server('REQUEST_METHOD') === 'GET') {

                $product_ids = $this->input->get('product_ids');

                if (!empty($product_ids)) {
                    $this->db->where_in('id', $product_ids);
                    $this->db->delete('m_produk');

                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(['status' => 'Sukses', 'message' => 'Produk berhasil dihapus.']));
                } else {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(['status' => 'Gagal', 'message' => 'Tidak ada produk yang dipilih']));
                }
            }
        } else {
            show_404();
        }
    }
}
