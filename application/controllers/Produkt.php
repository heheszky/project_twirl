<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "BaseController.php";
class Produkt extends BaseController {
	public function index()
	{
		$this->load->view('layout/header', $this->data);
		$this->load->view('layout/testmid');
		$this->load->view('layout/footer');
	}
}
