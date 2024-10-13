<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->load->model('VPageModel');
        $this->load->model('ProductModel');
		$this->load->library('template');

	}

	public function index()
	{
		$data = [
			"title" => "Produk Kerajinan Eceng Gondok Tuntang",
			"css" => [
				"style/product/product.css"
			],
			"page" => "product",
			"getAllProduct" => $this->ProductModel->getAllData()
		];


		$this->template->set('title', $data['title']);
		$this->template->set('page', $data['page']);
		$this->template->set('css', $data['css']);
		$this->template->load('templates/main2', 'product', $data);
	}
}


// DATA getAllProduct tidak bisa diload di halaman layouts product