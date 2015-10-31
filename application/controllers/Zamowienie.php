<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "BaseController.php";
class Zamowienie extends BaseController {
	public function basket()
	{
		$this->context = array();
		$this->load->view('layout/header', $this->data);
		$this->load->view('zamowienie/koszyk', $this->context);
		$this->load->view('layout/footer');
	}
}