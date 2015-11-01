<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "BaseController.php";
class Zamowienie extends BaseController {
	public function cart()
	{
		$this->context = array();
		$this->context['cart'] = $this->data['cart'];
		$this->load->view('layout/header', $this->data);
		$this->load->view('zamowienie/koszyk', $this->context);
		$this->load->view('layout/footer');
	}
	public function add()
	{
		if($this->input->post('wypozyczenie') != "1" || !$this->data['cart'] || count($this->data['cart']) == 0)redirect("/");
		$this->load->model('wypozyczenie');
		$products = array();
		
		$id_wypozyczenia = $this->wypozyczenie->add($this->data['user']['id']);
		foreach($this->data['cart'] as $product)
		{
			switch($product['type'])
			{
				case 'ksiazka': $id = $product['product']->id_ksiazki;break;
				case 'album': $id = $product['product']->ID_albumu;break;
				case 'film': $id = $product['product']->ID_filmu;break;
			}
			array_push($products, array(
				'id_wypozyczenia'=>$id_wypozyczenia,
				'id_rzeczy'=>$id,
				'typ_rzeczy'=>$product['type']
			));
		}
		$this->wypozyczenie->add_products($products);
		$this->session->set_userdata('cart', array());
		redirect("/wypozyczenie/".$id_wypozyczenia);
	}
}