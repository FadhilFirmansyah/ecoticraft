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
        $this->load->library('upload');
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

    // public function upload_image($name)
    // {
    //     // Konfigurasi upload
    //     $config['upload_path'] = './assets/products/'; // Path folder tempat menyimpan gambar
    //     $config['allowed_types'] = 'gif|jpg|png|jpeg'; // Jenis file yang diizinkan
    //     $config['max_size'] = 2048; // Ukuran maksimal file dalam KB (2MB)
    //     $config['file_name'] = uniqid(); // Berikan nama unik pada file

    //     $this->load->library('upload', $config);

    //     if (!$this->upload->do_upload($name)) {
    //         // Jika terjadi error saat upload, tampilkan pesan error
    //         return false;
    //     } else {
    //         // Jika berhasil upload, return data file yang diupload
    //         return $this->upload->data();
    //     }
    // }

    public function upload_image()
{
    if ($this->input->server('REQUEST_METHOD') === 'POST') {
        // Pastikan file diupload
        if (isset($_FILES['gambar']) && $_FILES['gambar']['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES['gambar']['tmp_name'];
            $fileName = $_FILES['gambar']['name'];
            $fileSize = $_FILES['gambar']['size'];
            $fileType = $_FILES['gambar']['type'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            // Daftar ekstensi yang diizinkan
            $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'PNG', 'JPEG');
            
            if (in_array($fileExtension, $allowedExtensions)) {
                // Tentukan path upload
                $uploadFileDir = FCPATH . 'assets/products/';
                $namaFileBaru = uniqid() . '.' . $fileExtension;
                $dest_path = $uploadFileDir . $namaFileBaru;

                // Pindahkan file dari folder sementara ke folder tujuan
                if (move_uploaded_file($fileTmpPath, $dest_path)) {
                    return $message = 'File is successfully uploaded.';
                } else {
                    return $message = 'There was some error moving the file to upload directory.';
                }
            } else {
                return $message = 'Upload failed. Allowed file types: jpg, jpeg, png, gif.';
            }
            return $namaFileBaru;
        } else {
            return $message = 'No file uploaded or there was an upload error.';
        }
        
        // Tampilkan pesan
    } else {
        show_404();
    }
}

    // POST METHOD
    public function addproduct()
    {
        if ($this->session->userdata('logged_in')) {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $nama = $this->input->post('nama');
                $bahan = $this->input->post('bahan');
                $deskripsi = $this->input->post('deskripsi');
                $link = $this->input->post('link');

                $gambar = $this->upload_image();

                $variasi = $this->input->post('variasi');
                $harga = $this->input->post('harga');


                if (!empty($nama) && !empty($bahan)) {

                    $data = [
                        "nama" => $nama,
                        "bahan" => $bahan,
                        "deskripsi" => $deskripsi,
                        "link" => $link,
                        "gambar" => $gambar
                    ];

                    $insert = $this->ProductModel->insertProduct($data);

                    $id_product = $this->db->insert_id();

                    if (!empty($variasi) && !empty($harga)) {

                        $dataVariasi = [];
                        foreach ($variasi as $key => $value) {
                            $dataVariasi[] = [
                                "id_produk" => $id_product,
                                "variasi" => $variasi[$key],
                                "harga" => $harga[$key]
                            ];
                        }

                        $this->ProductModel->insertHarga($dataVariasi);
                    }

                    if ($insert) {
                        $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode(['status' => 'Info', 'message' => "Produk $nama berhasil ditambahkan."]));
                    } else {
                        $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode(['status' => 'Terjadi Kesalahan', 'message' => "Gagal menambahkan data"]));
                    }
                } else {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(['status' => 'Form tidak valid', 'message' => "Input bertanda * wajib diisi"]));
                }
            } else {
                show_404();
            }
        }
    }
}
