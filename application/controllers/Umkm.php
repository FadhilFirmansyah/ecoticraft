<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Umkm extends CI_Controller {
	public function index()
	{
		$data = [
			"title" => "UMKM Desa Tuntang",
			"css" => [
				"style/umkm/umkm.css"
			],
			"page" => "umkm"
		];
		$this->template->set('title', $data['title']);
		$this->template->set('page', $data['page']);
		$this->template->set('css', $data['css']);
		$this->template->load('templates/main2', 'umkm');
	}

	public function viewUmkm($getId = ""){
		$data = [
			"title" => "UMKM Desa Tuntang",
			"css" => [
				"style/umkm/view-umkm.css"
			],
			"page" => "umkm"
		];
		$this->template->set('title', $data['title']);
		$this->template->set('page', $data['page']);
		$this->template->set('css', $data['css']);
		$this->template->load('templates/main2', 'view');
	}
}
