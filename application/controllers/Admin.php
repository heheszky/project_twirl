<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require "BaseController.php";
class Admin extends BaseController {
	public function index()
	{
		if(!$this->is_authorized())return;
		$this->load->view('layout/header', $this->data);
		$this->load->view('admin/index');
		$this->load->view('layout/footer');
	}
	
	public function addrecord()
	{
		if(!$this->is_authorized())return;
		$this->load->library('form_validation');
		$this->context = array();
		$this->load->model(array('kraj', 'autor', 'wydawnictwo', 'epoka', 'ksiazka'));
		if($this->input->post('action'))
		{
			$this->load->helper('validation_helper');
			switch($this->input->post('action'))
			{
				case 'autor': $this->add_author(); break;
				case 'ksiazka': $this->add_book(); break;
				case 'wydawnictwo': $this->add_publisher(); break;
			}
		}
		$this->context['kraje'] = $this->kraj->get_all();
		$this->context['pisarze'] = $this->autor->get_all('typ_autora=1');
		$this->context['wydawnictwa'] = $this->wydawnictwo->get_all();
		$this->context['epoki'] = $this->epoka->get_all();
		$this->load->view('layout/header', $this->data);
		$this->load->view('admin/addrecord', $this->context);
		$this->load->view('layout/footer');
	}
	
	public function itemlist()
	{
		if(!$this->is_authorized())return;
		$this->load->view('layout/header', $this->data);
		$this->load->view('admin/itemlist');
		$this->load->view('layout/footer');
	}
	
	public function clients()
	{
		if(!$this->is_authorized())return;
		$this->context = array();
		$this->context['clients'] = $this->klient->get_all();
		$this->load->view('layout/header', $this->data);
		$this->load->view('admin/clients', $this->context);
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
	
	/* Add record to database functions */
	public function add_author()
	{
		$this->form_validation->set_rules(add_author_config());
		if($this->form_validation->run())$this->autor->add();
	}
	public function add_publisher()
	{
		$this->form_validation->set_rules(add_publisher_config());
		if($this->form_validation->run())$this->wydawnictwo->add();
	}
	public function add_book()
	{
		$this->form_validation->set_rules(add_book_config());
		if($this->form_validation->run())$this->ksiazka->add();
	}
}
