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
		$this->load->model(array(
			'kraj',
			'autor',
			'wydawnictwo',
			'epoka',
			'nosnik',
			'studiofilmowe',
			'gatunek'
		));
		if($this->input->post('action'))
		{
			$this->load->helper('validation_helper');
			switch($this->input->post('action'))
			{
				case 'autor': $this->add_author(); break;
				case 'ksiazka': $this->add_book(); break;
				case 'wydawnictwo': $this->add_publisher(); break;
				case 'album': $this->add_album(); break;
				case 'film': $this->add_film(); break;
				case 'gatunek': $this->add_type(); break;
			}
		}
		$this->context['gatunek_ksiazka'] = $this->gatunek->get_all(1);
		$this->context['gatunek_film'] = $this->gatunek->get_all(2);
		$this->context['gatunek_album'] = $this->gatunek->get_all(3);
		$this->context['kraje'] = $this->kraj->get_all();
		$this->context['pisarze'] = $this->autor->get_all('typ_autora=1');
		$this->context['rezyserowie'] = $this->autor->get_all('typ_autora=2');
		$this->context['muzycy'] = $this->autor->get_all('typ_autora=3');
		$this->context['studiafilmowe'] = $this->studiofilmowe->get_all();
		$this->context['nosniki'] = $this->nosnik->get_all();
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
	
	public function upload_file($product)
	{
		$this->load->library('upload');
		$config['upload_path'] = 'uploads/'.$product.'/';
		$config['allowed_types'] = 'gif|jpg|png';
		$config['max_size']	= '2048';
		$config['file_name'] = $_FILES['upfile']['name'];
		$this->upload->initialize($config);
		if($this->upload->do_upload('upfile'))
			return $config['upload_path'].$config['file_name'];
		else
			return false;
	}
	
	/* Add record to database functions */
	public function add_author()
	{
		if(!$this->is_authorized())return;
		$this->load->library('form_validation');
		$this->load->helper('validation_helper');
		$this->load->model('autor');
		$this->form_validation->set_rules(add_author_config($this->input->post('isZespol')));
		$return = array();
		if($this->form_validation->run())
		{
			$result = $this->autor->add();
			$return['status'] = "ok";
			$return['id'] = $result[0];
			$return['autor'] = $result[1];
		} else {
			$errors = array();
			$this->form_validation->set_error_delimiters('', '');
			foreach($this->input->post() as $k => $v)$errors[$k] = form_error($k);
			$return['status'] = "fail";
			$return['errors'] = array_filter($errors);
		}
		header('Content-type: application/json');
		exit(json_encode($return));
	}
	public function add_publisher()
	{
		if(!$this->is_authorized())return;
		$this->load->library('form_validation');
		$this->load->helper('validation_helper');
		$this->load->model('wydawnictwo');
		$this->form_validation->set_rules(add_publisher_config());
		$return = array();
		if($this->form_validation->run())
		{
			$result = $this->wydawnictwo->add();
			$return['status'] = "ok";
			$return['id'] = $result[0];
			$return['nazwa'] = $result[1];
		} else {
			$errors = array();
			$this->form_validation->set_error_delimiters('', '');
			foreach($this->input->post() as $k => $v)$errors[$k] = form_error($k);
			$return['status'] = "fail";
			$return['errors'] = array_filter($errors);
		}
		header('Content-type: application/json');
		exit(json_encode($return));
	}
	public function add_book()
	{
		if(!$this->is_authorized())return;
		$this->load->model('ksiazka');
		$this->form_validation->set_rules(add_book_config());
		if($this->form_validation->run())
		{
			$filename = $this->upload_file('ksiazka');
			$insert_id = $this->ksiazka->add($filename);
			foreach($this->input->post('gatunek_ksiazka') as $gatunek)
			{
				$this->ksiazka->add_type($insert_id, $gatunek);
			}
		}
	}
	public function add_album()
	{
		$this->load->model('album');
		if(!$this->is_authorized())return;
		$this->form_validation->set_rules(add_album_config());
		if($this->form_validation->run())
		{
			$filename = $this->upload_file('album');
			$insert_id = $this->album->add($filename);
			foreach($this->input->post('gatunek_album') as $gatunek)
			{
				$this->album->add_type($insert_id, $gatunek);
			}
		}
	}
	public function add_film()
	{
		$this->load->model('film');
		if(!$this->is_authorized())return;
		$this->form_validation->set_rules(add_film_config());
		if($this->form_validation->run())
		{
			$filename = $this->upload_file('film');
			$insert_id = $this->film->add($filename);
			foreach($this->input->post('gatunek_film') as $gatunek)
			{
				$this->film->add_type($insert_id, $gatunek);
			}
		}
	}
	public function add_studio()
	{
		if(!$this->is_authorized())return;
		$this->load->library('form_validation');
		$this->load->helper('validation_helper');
		$this->load->model('studiofilmowe');
		$this->form_validation->set_rules(add_studio_config());
		$return = array();
		if($this->form_validation->run())
		{
			$result = $this->studiofilmowe->add();
			$return['status'] = "ok";
			$return['id'] = $result[0];
			$return['nazwa'] = $result[1];
		} else {
			$errors = array();
			$this->form_validation->set_error_delimiters('', '');
			foreach($this->input->post() as $k => $v)$errors[$k] = form_error($k);
			$return['status'] = "fail";
			$return['errors'] = array_filter($errors);
		}
		header('Content-type: application/json');
		exit(json_encode($return));
	}
	public function add_type()
	{
		if(!$this->is_authorized())return;
		$this->form_validation->set_rules(add_type_config());
		if($this->form_validation->run())
		{
			$this->gatunek->add();
		}
	}
}
