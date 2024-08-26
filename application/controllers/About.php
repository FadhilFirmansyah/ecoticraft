<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class About extends CI_Controller {
	public function index()
	{
		$data = [
			"title" => "Tim PPKO HMDKV UDINUS",
			"css" => [
				"style/about/about.css"
			],
			"page" => "about"
		];
		$this->template->set('page', $data['page']);
		$this->template->set('title', $data['title']);
		$this->template->set('css', $data['css']);
		$this->template->load('templates/main2', 'about');
	}
}
