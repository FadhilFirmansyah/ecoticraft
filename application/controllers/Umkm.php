<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Umkm extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('UmkmModel');
		$this->load->library('template');

		header("Access-Control-Allow-Origin: *");
        header("Access-Control-Allow-Methods: GET, POST, PUT, DELETE");
        header("Access-Control-Allow-Headers: Content-Type, Authorization");
	}


	public function index()
	{
		$data = [
			"title" => "UMKM Desa Tuntang",
			"css" => [
				"style/umkm/umkm.css"
			],
			"page" => "umkm",
			"getAllUmkm" => $this->UmkmModel->getAllData()
		];
		$this->template->set('title', $data['title']);
		$this->template->set('page', $data['page']);
		$this->template->set('css', $data['css']);
		$this->template->load('templates/main2', 'umkm', $data);
	}

	public function viewUmkm($getId = "")
	{
		$data = [
			"title" => "UMKM Desa Tuntang",
			"css" => [
				"style/umkm/view-umkm.css"
			],
			"page" => "umkm",
			"getUmkm" => $this->UmkmModel->getData($getId)
		];
		$this->template->set('title', $data['title']);
		$this->template->set('page', $data['page']);
		$this->template->set('css', $data['css']);
		$this->template->load('templates/main2', 'view', $data);
	}

	public function getAllUmkm(){
		$query = $this->UmkmModel->getAllData();

		if($query != null){
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($query));
		} else {
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(['status' => 'Info', 'message' => "Data Not Found", "data" => []]));
		}
	}

	public function getUmkm($id = ''){
		$query = $this->UmkmModel->getData($id);

		if($query != null){
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode($query));
		} else {
			$this->output
			->set_content_type('application/json')
			->set_output(json_encode(['status' => 'Info', 'message' => "Data Not Found", "data" => []]));
		}
	}
}
