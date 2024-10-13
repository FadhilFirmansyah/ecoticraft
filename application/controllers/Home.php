<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();

		$this->load->model('VPageModel');
		$this->load->model('UmkmModel');
		$this->load->model('ProductModel');
	}

	public function index()
	{
		$data = [
			"title" => "Kerajinan Eceng Gondok Cikidul Tuntang",
			"css" => [
				"style/index/index.css",
				"style/index/carousel.css"
			],
			"page" => "home",
			"getAllUmkm" => $this->UmkmModel->getAllData(),
			"getAllProduct" => $this->ProductModel->getAllData()
		];


		$this->template->set('title', $data['title']);
		$this->template->set('css', $data['css']);
		$this->template->load('templates/main', 'index', $data);
	}
}
