<?php

class Pages extends CI_Controller
{
	public function view($page = 'home'): void
	{
		$data['title'] = ucfirst($page);
		$this->load->view('templates/header');
		$this->load->view('pages/home_menu');
		$this->load->view('pages/' . $page, $data);
		$this->load->view('templates/footer');
	}
}
