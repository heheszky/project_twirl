<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "BaseController.php";
class Produkt extends BaseController {
	public function index($product)
	{
		$this->context = array();
		$this->context['product'] = $product;
		$this->load->view('layout/header', $this->data);
		$this->load->view('produkt/lista', $this->context);
		$this->load->view('layout/footer');
	}
	public function get_products_json($product)
	{
		$this->load->model($product);
		header('Content-type: application/json');
		switch($product)
		{
			case 'ksiazka':
				exit(json_encode($this->ksiazka->get_all()));
				break;
			case 'album':
				exit(json_encode($this->album->get_all()));
				break;
			case 'film':
				exit(json_encode($this->film->get_all()));
				break;
		}
	}
}
