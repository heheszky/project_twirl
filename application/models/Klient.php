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
			"haslo"				=> md5($this->input->post('haslo')),
			"imie_klienta"		=> $this->input->post('imie'),
			"nazwisko_klienta"	=> $this->input->post('nazwisko'),
			"email"				=> $this->input->post('email'),
			"miejscowosc"		=> $this->input->post('miejscowosc'),
			"ulica"				=> $this->input->post('ulica'),
			"nr_domu"			=> $this->input->post('nr_domu'),
			"nr_lokalu"			=> $this->input->post('nr_lokalu'),
			"data_urodzenia"	=> $this->input->post('data_urodzenia'),
			"pesel"				=> $this->input->post('pesel')
			);
		$this->db->insert('klient', $data);
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
			pesel'
		);
		$this->db->where('ID_klienta', $id);
		return $this->db->get('klient')->result();
	}
}