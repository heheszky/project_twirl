<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "BaseController.php";
class Konto extends BaseController {
	public function index()
	{
		$this->load->view('layout/header');
		//$this->load->view('layout/testmid');
		$this->load->view('layout/footer');
	}
	public function rejestracja()
	{
		$this->load->helper(array('validation'));
		$this->load->library('form_validation');
		$this->form_validation->set_rules(get_register_validation_config());
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('layout/header');
			$this->load->view('klient/rejestracja');
			$this->load->view('layout/footer');
		} else {
			echo "a";
		}
	}
}
