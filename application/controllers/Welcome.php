<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "BaseController.php";
class Welcome extends BaseController {
	public function index()
	{
		$this->load->model(array('ksiazka', 'album', 'film'));
		$this->context = array();
		$this->context['ksiazki'] = $this->ksiazka->get_all($limit = 10);
		$this->context['albumy'] = $this->album->get_all($limit = 10);
		$this->context['filmy'] = $this->film->get_all($limit = 10);
		$this->load->view('layout/header', $this->data);
		$this->load->view('layout/testmid', $this->context);
		$this->load->view('layout/footer');
	}
}
