<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index()
	{
		$data = [
			"title" => "Kerajinan Eceng Gondok Cikidul Tuntang",
			"css" => [
				"style/index/index.css",
				"style/index/carousel.css"
			],
			"page" => "home"
		];
		$this->template->set('title', $data['title']);
		$this->template->set('css', $data['css']);
		$this->template->load('templates/main', 'index');
	}
}
