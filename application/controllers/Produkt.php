<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "BaseController.php";
class Produkt extends BaseController {
	public function index($product)
	{
		$this->context = array();
		$this->context['product'] = $product;
		$this->context['products'] = $this->get_products_json($product);
		switch($product)
		{
			case 'ksiazka':
				$this->context['names'] = json_encode(array('id_ksiazki', 'tytul_ksiazki', 'okladka_ksiazki'));
				$this->context['cType'] = 0;
				break;
			case 'album':
				$this->context['names'] = json_encode(array('id_albumu', 'nazwa_albumu', 'okladka_albumu'));
				$this->context['cType'] = 1;
				break;
			case 'film':
				$this->context['names'] = json_encode(array('id_filmu', 'tytul_filmu', 'okladka_filmu'));
				$this->context['cType'] = 2;
				break;
		}
		$this->load->view('layout/header', $this->data);
		$this->load->view('produkt/lista', $this->context);
		$this->load->view('layout/footer');
	}
	public function get_products_json($product)
	{
		$this->load->model($product);
		switch($product)
		{
			case 'ksiazka':
				return(json_encode($this->ksiazka->get_all()));
				break;
			case 'album':
				return(json_encode($this->album->get_all()));
				break;
			case 'film':
				return(json_encode($this->film->get_all()));
				break;
		}
	}
	public function get_product($product, $id)
	{
		$this->context = array();
		$this->load->model($product);
		switch($product)
		{
			case 'ksiazka':
				$this->context['product'] = $this->ksiazka->get($id);
				break;
			case 'album':
				$this->context['product'] = $this->album->get($id);
				break;
			case 'film':
				$this->context['product'] = $this->film->get($id);
		}
		$this->load->view('layout/header', $this->data);
		$this->load->view('produkt/produkt', $this->context);
		$this->load->view('layout/footer');
	}
}
