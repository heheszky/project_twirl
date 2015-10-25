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
	
	public function add_item()
	{
		if(!$this->is_authorized())return;
		$this->load->view('layout/header', $this->data);
		$this->load->view('admin/additem');
		$this->load->view('layout/footer');
	}
	
	public function item_list()
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
}
