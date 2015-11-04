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
				$this->context['available'] = $this->ksiazka->get_available_count($id);
				break;
			case 'album':
				$this->context['product'] = $this->album->get($id);
				$this->context['available'] = $this->album->get_available_count($id);
				break;
			case 'film':
				$this->context['product'] = $this->film->get($id);
				$this->context['available'] = $this->film->get_available_count($id);
				break;
		}
		$this->context['productType'] = $product;
		$this->context['productId'] = $id;
		$this->load->view('layout/header', $this->data);
		$this->load->view('produkt/produkt', $this->context);
		$this->load->view('layout/footer');
	}
	public function add_to_cart($product, $id)
	{
		$this->load->model($product);
		switch($product)
		{
			case 'ksiazka':
				$product_obj = $this->ksiazka->get($id);
				$available = $this->ksiazka->get_available_count($id);
				$type="ksiazka";
				break;
			case 'album':
				$product_obj = $this->album->get($id);
				$available = $this->album->get_available_count($id);
				$type="album";
				break;
			case 'film':
				$product_obj = $this->film->get($id);
				$available = $this->film->get_available_count($id);
				$type="film";
				break;
		}
		if($available < 1)
		{
			$res['error'] = 'Produkt niedostępny';
			$res['message'] = 'Niestety produkt, który wybrałeś/aś jest niedostępny';
			echo json_encode($res);return;
		}
		if(!$this->session->userdata('cart')) $this->session->set_userdata('cart', array());
		$cart = $this->session->userdata('cart');
		if(!in_array(array('type'=>$type, 'product'=>$product_obj), $cart))
		{
			array_push($cart, array('type'=>$type, 'product'=>$product_obj));
			$this->session->set_userdata('cart', $cart);
		}
		header('Content-Type: application/json');
		echo json_encode($cart);
	}
	public function delete_from_cart($product, $id)
	{
		$this->load->model($product);
		switch($product)
		{
			case 'ksiazka': $product = $this->ksiazka->get($id);$type="ksiazka";break;
			case 'album': $product = $this->album->get($id);$type="album";break;
			case 'film': $product = $this->film->get($id);$type="film";break;
		}
		/* get cart or return if null */
		if(!$this->session->userdata('cart')) return;
		$cart = $this->session->userdata('cart');
		
		/* delete product from array and update */
		if(($key = array_search(array('type'=>$type, 'product'=>$product), $cart)) !== false) {
			unset($cart[$key]);
			$this->session->set_userdata('cart', $cart);
		}
		header('Content-Type: application/json');
		echo json_encode($cart);
	}
	public function debug()
	{
		echo "<pre>";
		print_r($this->session->userdata());
	}
	public function clearCart()
	{
		$this->session->set_userdata('cart', array());
	}
}
