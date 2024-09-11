<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {

	public function __construct()
	{
		parent::__construct();

        $this->load->model('VPageModel');
	}

	public function index()
	{
		$data = [
			"title" => "Produk Kerajinan Eceng Gondok Tuntang",
			"css" => [
				"style/product/product.css"
			],
			"page" => "product"
		];

		// INSERT STAT VIEW
		$today = date('Y-m-d');

		$session_key = 'last_access_date';
		$last_access_date = $this->session->userdata($session_key);
		if ($last_access_date !== $today) {
			$this->VPageModel->insertCountView('product');

			$this->session->set_userdata($session_key, $today);
		}

		$this->template->set('title', $data['title']);
		$this->template->set('page', $data['page']);
		$this->template->set('css', $data['css']);
		$this->template->load('templates/main2', 'product');
	}
}
