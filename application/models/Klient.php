<?php
class Klient extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	function add()
	{
		$data = array(
			"haslo"				=> md5($this->input->post('password')),
			"imie_klienta"		=> $this->input->post('imie_klienta'),
			"nazwisko_klienta"	=> $this->input->post('nazwisko_klienta'),
			"email"				=> $this->input->post('email'),
			"miejscowosc"		=> $this->input->post('miejscowosc'),
			"ulica"				=> $this->input->post('ulica'),
			"nr_domu"			=> $this->input->post('nr_domu'),
			"nr_lokalu"			=> $this->input->post('nr_lokalu'),
			"data_urodzenia"	=> $this->input->post('data_urodzenia'),
			"pesel"				=> $this->input->post('pesel')
			);
		$this->db->insert('klient', $data);
		return array('id'=>$this->db->insert_id(), 'imie'=>$this->input->post('imie_klienta'));
	}
	function get($id)
	{
		$this->db->select('
			imie_klienta,
			nazwisko_klienta,
			miejscowosc,
			ulica,
			nr_domu,
			nr_lokalu,
			data_urodzenia,
			pesel,
			admin
		');
		$this->db->where('ID_klienta', $id);
		return $this->db->get('klient')->result();
	}
	function get_all()
	{
		$this->db->select('
			ID_klienta,
			imie_klienta,
			nazwisko_klienta,
			email,
			miejscowosc,
			ulica,
			nr_domu,
			nr_lokalu,
			data_urodzenia,
			pesel,
			admin
		');
		return $this->db->get('klient')->result();
	}
	function login($email, $password)
	{
		$this->db->select('id_klienta as id, imie_klienta as imie, admin');
		$this->db->where(array(
			'email' => $email,
			'haslo' => $password
		));
		return $this->db->get('klient')->row();
	}
}