<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "BaseController.php";
class Zamowienie extends BaseController {
	public function show($id)
	{
		$this->context = array();$this->context['products'] = array();
		$this->load->model(array('wypozyczenie','album','ksiazka','film'));
		$this->context['wypozyczenie'] = $this->wypozyczenie->get($id);
		if(!$this->context['wypozyczenie'])redirect("/");
		if($this->context['wypozyczenie']->id_klienta != $this->data['user']['id'])redirect("/");
		$prod_ids = $this->wypozyczenie->get_product_ids($this->context['wypozyczenie']->id_wypozyczenia);
		$suma = 0;
		foreach($prod_ids as $p)
		{
			switch($p->typ_rzeczy)
			{
				case 'ksiazka': $res = $this->ksiazka->get($p->id_rzeczy);break;
				case 'album': $res = $this->album->get($p->id_rzeczy);break;
				case 'film': $res = $this->film->get($p->id_rzeczy);break;
			}
			array_push($this->context['products'], array('type'=>$p->typ_rzeczy,'product'=>$res));
			$suma += $res->cena_za_tydzien;
		}
		if($this->context['wypozyczenie']->data_oddania)
		{
			$date = $this->context['wypozyczenie']->data_oddania;
			$this->context['czyZaplacono'] = true;
		}
		else
		{
			$date = date('Y-m-d H:i:s');
			$this->context['czyZaplacono'] = false;
		}
		$diff = abs(strtotime($date) - strtotime($this->context['wypozyczenie']->data_wypozyczenia));
		$weeks = ceil($diff / (60*60*24*7));
		$this->context['suma'] = ($weeks*$suma)."zł";
		if(!$this->context['wypozyczenie']->data_oddania)
		{
			$nextweek = strtotime($this->context['wypozyczenie']->data_wypozyczenia) + $weeks*60*60*24*7 - strtotime($date);
			$days = floor($nextweek / (60*60*24));
			$hours = floor(($nextweek - $days*60*60*24) / (60*60));
			$minutes = floor(($nextweek - $days*60*60*24 - $hours*60*60) / 60);
			$this->context['przedluzenie'] = "Automatyczne przedłużenie o kolejny tydzień za ".$days." dni ".$hours." godzin ".$minutes." minut";
		}
		$this->load->view('layout/header', $this->data);
		$this->load->view('zamowienie/pokaz', $this->context);
		$this->load->view('layout/footer');
	}
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
		if(!$this->data['user'])redirect("/rejestracja/koszyk");
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