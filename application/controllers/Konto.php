<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konto extends CI_Controller {
	public function index()
	{
		$this->load->view('layout/header');
		//$this->load->view('layout/testmid');
		$this->load->view('layout/footer');
	}
	public function rejestracja()
	{
		$this->load->view('layout/header');
		$this->load->view('klient/rejestracja');
		$this->load->view('layout/footer');
	}
}
