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
                    $this->db->select('gambar');
                    $this->db->from('m_produk');
                    $this->db->where_in('id', $product_ids);
                    $query = $this->db->get();
                    $results = $query->result_array();

                    // Hapus data dari tabel produk
                    $this->db->where_in('id', $product_ids);
                    $this->db->delete('m_produk');

                    // Hapus file gambar jika ada
                    foreach ($results as $result) {
                        $gambar = $result['gambar'];
                        if ($gambar) {
                            $file_path = FCPATH . 'assets/products/' . $gambar;
                            if (file_exists($file_path)) {
                                unlink($file_path); // Menghapus file
                            }
                        }
                    }

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
                        return $namaFileBaru;
                    } else {
                        $message = 'There was some error moving the file to upload directory.';
                        return false;
                    }
                } else {
                    $message = 'Upload failed. Allowed file types: jpg, jpeg, png, gif.';
                    return false;
                }
            } else {
                $message = 'No file uploaded or there was an upload error.';
                return false;
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

    public function updproduct()
    {
        if ($this->session->userdata('logged_in')) {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {

                $getIdProduct = $this->input->post('id_produk');
                $nama = $this->input->post('nama');
                $bahan = $this->input->post('bahan');
                $deskripsi = $this->input->post('deskripsi');
                $link = $this->input->post('link');
                $gambarLama = $this->input->post('gambarLama');

                if ($nama != null && $bahan != null) {

                    $gambar = $this->upload_image();

                    if ($gambar === null || $gambar === false) {
                        $currentProduct = $this->ProductModel->getData($getIdProduct);
                        $gambar = $currentProduct['gambar'];
                    } else {
                        $file_path = FCPATH . 'assets/products/' . $gambarLama;
                        if (file_exists($file_path)) {
                            unlink($file_path); // Menghapus file
                        }
                    }

                    $getIdVariasi = $this->input->post('id_variasi_lama');
                    $variasi = $this->input->post('variasi_lama');
                    $harga = $this->input->post('harga_lama');
                    
                    $variasiBaru = $this->input->post('variasi_baru');
                    $hargaBaru = $this->input->post('harga_baru');

                    $dataProduct = [
                        "nama" => $nama,
                        "bahan" => $bahan,
                        "deskripsi" => $deskripsi,
                        "link" => $link,
                        "gambar" => $gambar
                    ];

                    // UPDATE PRODUCT
                    $insert = $this->ProductModel->updateProduct($getIdProduct, $dataProduct);

                    $id_product = $this->db->insert_id();

                    if ($getIdVariasi != null) {

                        $dataVariasi = [];
                        foreach ($variasi as $key => $value) {
                            $dataVariasi[] = [
                                "id_produk" => $id_product,
                                "variasi" => $variasi[$key],
                                "harga" => $harga[$key]
                            ];
                        }

                        $insertUpdateVariasi = $this->ProductModel->updateHarga($getIdVariasi, $dataVariasi);
                    } else {
                        $insertUpdateVariasi = $this->ProductModel->delHarga(null, $id_product);
                    }

                    if($variasiBaru != null || $hargaBaru != null){

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

                    if (!$insert || !$insertUpdateVariasi) {
                        $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode(['status' => 'Info', 'message' => "Produk $nama berhasil diubah"]));
                    } else {
                        $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode(['status' => 'Terjadi Kesalahan', 'message' => "Gagal mengubah data"]));
                    }
                } else {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(['status' => 'Form tidak valid', 'message' => "Input bertanda * wajib diisi"]));
                }
            } else {
                show_404();
            }
        } else {
            show_404();
        }
    }
}
