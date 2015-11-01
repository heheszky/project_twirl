<?php
defined('BASEPATH') OR exit('No direct script access allowed');
require_once "BaseController.php";
class Konto extends BaseController {
	public function index()
	{
		$this->load->model('wypozyczenie');
		$this->context = array();
		$this->context['klient'] = $this->klient->get($this->data['user']['id']);
		$this->context['wypozyczenia'] = $this->wypozyczenie->get_all($this->data['user']['id']);
		$this->load->view('layout/header', $this->data);
		$this->load->view('klient/index', $this->context);
		$this->load->view('layout/footer');
	}
	public function register()
	{
		$this->load->helper(array('validation'));
		$this->load->library('form_validation');
		if($this->input->post('action') == 'register')
		{
			$this->form_validation->set_rules(get_register_validation_config());
		} else if($this->input->post('action') == 'login') {
			$validation_config = array(
				array(
					'field' => 'login_email',
					'label' => 'Email',
					'rules' => 'trim|required',
					'errors' => array(
						'required'		=> 'Email jest wymagany',
					),
				),
				array(
					'field' => 'login_password',
					'label' => 'Hasło',
					'rules' => 'trim|required|callback_check_database',
					'errors' => array(
						'required'		=> 'Hasło jest wymagane',
						'check_database' => 'Nieprawidłowe dane logowania'
					),
				)
			);
			$this->form_validation->set_rules($validation_config);
		}
		if($this->form_validation->run() == FALSE)
		{
			$this->load->view('layout/header', $this->data);
			$this->load->view('klient/rejestracja');
			$this->load->view('layout/footer');
		} else {
			if($this->input->post('action') == 'register')
			{
				$this->load->model('klient');
				$result = $this->klient->add();
				$sess_array = array(
					'id' => $result['id'],
					'admin' => 0,
					'imie' => $result['imie']
				);
				$this->session->set_userdata('logged_in', $sess_array);
			}
			redirect('/');
		}
	}
	public function logout()
	{
		$this->session->unset_userdata('logged_in');
		session_destroy();
		redirect("/");
	}
	
	/* callback_functions */
	public function check_pesel()
	{
		$numbers = str_split($this->input->post('pesel'));
		$weights = array(1,3,7,9,1,3,7,9,1,3);
		$sum = 0;
		for($i=0;$i<count($weights);$i++)
		{
			$sum += $weights[$i]*$numbers[$i];
		}
		$controlsum = 10 - ($sum % 10);
		if($numbers[10] == $controlsum) return TRUE;
		else return FALSE;
	}
	function check_database($password)
	{
		$mail = $this->input->post('login_email');
		$result = $this->klient->login($mail, md5($password));
		if($result)
		{
			$sess_array = array(
				'id' => $result->id,
				'admin' => $result->admin,
				'imie' => $result->imie
			);
			$this->session->set_userdata('logged_in', $sess_array);
			
			return TRUE;
		} else {
			$this->form_validation->set_message('check_database', 'Nieprawidłowe dane logowania');
			return false;
		}
	}
}
