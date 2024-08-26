<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Product extends CI_Controller {
	public function index()
	{
		$data = [
			"title" => "Produk Kerajinan Eceng Gondok Tuntang",
			"css" => [
				"style/product/product.css"
			],
			"page" => "product"
		];
		$this->template->set('page', $data['page']);
		$this->template->set('css', $data['css']);
		$this->template->load('templates/main2', 'product');
	}
}
