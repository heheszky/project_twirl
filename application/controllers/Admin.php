<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "BaseController.php";
class Admin extends BaseController {
	public function index()
	{
		if(!$this->is_authorized())return;
		$this->load->view('layout/header', $this->data);
		$this->load->view('layout/footer');
	}
	public function is_authorized()
	{
		if(!isset($this->data['user']) || $this->data['user']['admin'] == 0)
		{
			$this->load->view('errors/error_403');
			return false;
		} else {
			return true;
		}
	}
}
