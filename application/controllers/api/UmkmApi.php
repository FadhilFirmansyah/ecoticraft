<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UmkmApi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();

        header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");


        $this->load->model('UmkmModel');
        $this->load->library('form_validation');
        $this->load->helper('url');
        $this->load->helper('form');
        $this->load->library('session');
        $this->load->library('upload');
    }

    public function getAllUmkm($limit = 5, $offset = 0)
    {
        if ($this->session->userdata('logged_in')) {
            $data = [
                "getAllUmkm" => $this->UmkmModel->getAllData($limit, $offset)
            ];

            $this->load->view('admin/api/view-umkm-list', $data);
        } else {
            show_404();
        }
    }

    public function delUmkm()
    {
        if ($this->session->userdata('logged_in')) {
            if ($this->input->server('REQUEST_METHOD') === 'GET') {

                $product_ids = $this->input->get('umkm_ids');

                if (!empty($product_ids)) {
                    $this->db->select('gambar');
                    $this->db->from('m_umkm');
                    $this->db->where_in('id', $product_ids);
                    $query = $this->db->get();
                    $results = $query->result_array();

                    // Hapus data dari tabel produk
                    $this->db->where_in('id', $product_ids);
                    $this->db->delete('m_umkm');

                    // Hapus file gambar jika ada
                    foreach ($results as $result) {
                        $gambar = $result['gambar'];
                        if ($gambar) {
                            $file_path = FCPATH . 'assets/umkm/' . $gambar;
                            if (file_exists($file_path)) {
                                unlink($file_path); // Menghapus file
                            }
                        }
                    }

                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(['status' => 'Sukses', 'message' => 'UMKM berhasil dihapus.']));
                } else {
                    $this->output
                        ->set_content_type('application/json')
                        ->set_output(json_encode(['status' => 'Gagal', 'message' => 'Tidak ada umkm yang dipilih']));
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
                    $uploadFileDir = FCPATH . 'assets/umkm/';
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
                return null;
            }

            // Tampilkan pesan
        } else {
            show_404();
        }
    }


    public function multi_upload_image($fileFieldName)
    {
        // Pastikan file diupload dan tidak ada error
        if (isset($_FILES[$fileFieldName]) && $_FILES[$fileFieldName]['error'] === UPLOAD_ERR_OK) {
            $fileTmpPath = $_FILES[$fileFieldName]['tmp_name'];
            $fileName = $_FILES[$fileFieldName]['name'];
            $fileNameCmps = explode(".", $fileName);
            $fileExtension = strtolower(end($fileNameCmps));

            // Daftar ekstensi yang diizinkan
            $allowedExtensions = array('jpg', 'jpeg', 'png', 'gif', 'JPG', 'PNG', 'JPEG');

            if (in_array($fileExtension, $allowedExtensions)) {
                // Tentukan path upload
                $uploadFileDir = FCPATH . 'assets/umkm/produk_lain/';
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
            return null;
        }
    }


    // POST METHOD
    public function addumkm()
    {
        if ($this->session->userdata('logged_in')) {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {
                $judul = $this->input->post('judul');
                $alamat_lengkap = $this->input->post('alamat_lengkap');
                $alamat_singkat = $this->input->post('alamat_singkat');
                $no_telp = $this->input->post('no_telp');
                $link = $this->input->post('link');
                $maps = $this->input->post('maps');
                $deskripsi = $this->input->post('deskripsi');
                $pemilik = $this->input->post('pemilik');

                $judulVariant = $this->input->post('judul_variant');
                $deskripsiVariant = $this->input->post('deskripsi_variant');
                $hargaVariant = $this->input->post('harga_variant');
                $gambarVariant = isset($_FILES['gambar_variant']) ? $_FILES['gambar_variant'] : [];

                $variantsJson = json_encode([]);

                $variants = [];

                if (!empty($judulVariant)) {

                    for ($i = 0; $i < count($judulVariant); $i++) {
                        // Upload gambar untuk setiap variasi
                        if (!empty($gambarVariant['name'][$i])) {
                            $_FILES['gambar_var_temp'] = [
                                'name' => $gambarVariant['name'][$i],
                                'type' => $gambarVariant['type'][$i],
                                'tmp_name' => $gambarVariant['tmp_name'][$i],
                                'error' => $gambarVariant['error'][$i],
                                'size' => $gambarVariant['size'][$i]
                            ];
                
                            // Panggil multi_upload_image dengan parameter 'gambar_var_temp'
                            $gambarUploaded = $this->multi_upload_image('gambar_var_temp');
                        } else {
                            $gambarUploaded = null;
                        }
                
                        $variants[] = [
                            'judul' => $judulVariant[$i],
                            'deskripsi' => $deskripsiVariant[$i],
                            'harga' => $hargaVariant[$i],
                            'gambar' => $gambarUploaded
                        ];
                    }


                    // for ($i = 0; $i < count($judulVariant); $i++) {
                    //     $variants[] = [
                    //         'judul' => $judulVariant[$i],
                    //         'deskripsi' => $deskripsiVariant[$i],
                    //         'harga' => $hargaVariant[$i]
                    //     ];
                    // }

                    $variantsJson = json_encode($variants);
                }


                $gambar = $this->upload_image();

                if ($judul != null) {

                    $data = [
                        "judul" => $judul,
                        "alamat_lengkap" => $alamat_lengkap,
                        "alamat_singkat" => $alamat_singkat,
                        "no_telp" => $no_telp,
                        "link" => $link,
                        "maps" => $maps,
                        "deskripsi" => $deskripsi,
                        "pemilik" => $pemilik,
                        "gambar" => $gambar,
                        "produk_lain" => $variantsJson
                    ];

                    $insert = $this->UmkmModel->insertUmkm($data);

                    $id_product = $this->db->insert_id(); // get id umkm yang baru saja ditambahkan

                    if ($insert) {
                        $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode(['status' => 'Info', 'message' => "UMKM $judul berhasil ditambahkan."]));
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

    public function updumkm()
    {
        if ($this->session->userdata('logged_in')) {
            if ($this->input->server('REQUEST_METHOD') === 'POST') {

                $getIdUmkm = $this->input->post('id');
                $judul = $this->input->post('judul');
                $alamat_lengkap = $this->input->post('alamat_lengkap');
                $alamat_singkat = $this->input->post('alamat_singkat');
                $no_telp = $this->input->post('no_telp');
                $link = $this->input->post('link');
                $maps = $this->input->post('maps');
                $deskripsi = $this->input->post('deskripsi');
                $pemilik = $this->input->post('pemilik');
                $gambarLama = $this->input->post('gambarLama');

                if ($judul != null) {

                    $gambar = $this->upload_image();

                    if ($gambar === null || $gambar === false) {
                        $currentProduct = $this->UmkmModel->getData($getIdUmkm);
                        $gambar = $currentProduct['gambar'];
                    } else {
                        $file_path = FCPATH . 'assets/umkm/' . $gambarLama;
                        if (file_exists($file_path)) {
                            unlink($file_path); // Menghapus file
                        }
                    }

                    $data = [
                        "judul" => $judul,
                        "alamat_lengkap" => $alamat_lengkap,
                        "alamat_singkat" => $alamat_singkat,
                        "no_telp" => $no_telp,
                        "link" => $link,
                        "maps" => $maps,
                        "deskripsi" => $deskripsi,
                        "pemilik" => $pemilik,
                        "gambar" => $gambar
                    ];

                    // UPDATE UMKM
                    $insert = $this->UmkmModel->updateUmkm($getIdUmkm, $data);

                    $id_product = $this->db->insert_id();


                    if ($insert) {
                        $this->output
                            ->set_content_type('application/json')
                            ->set_output(json_encode(['status' => 'Info', 'message' => "Produk $judul berhasil diubah"]));
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
