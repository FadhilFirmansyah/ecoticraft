<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Community extends CI_Controller {
	public function index()
	{
		$data = [
			"title" => "Komunitas Cikidul",
			"css" => [
				"style/community/community.css"
			],
			"page" => "community"
		];
		$this->template->set('page', $data['page']);
		$this->template->set('title', $data['title']);
		$this->template->set('css', $data['css']);
		$this->template->load('templates/main2', 'community');
	}
}
