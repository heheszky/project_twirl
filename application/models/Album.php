<?php
class Album extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	function add()
	{
		$data = array(
			"nazwa_albumu"		=> $this->input->post('nazwa_albumu'),
			"kompilacja"		=> $this->input->post('kompilacja'),
			"data_wydania_albumu"=> $this->input->post('data_wydania'),
			"soundtrack"		=> $this->input->post('soundtrack'),
			"liczba_utworow"	=> $this->input->post('liczba_utworow'),
			"id_nosnika_fizycznego"=> $this->input->post('id_nosnika'),
			"liczba_nosnikow"	=> $this->input->post('liczba_nosnikow'),
			"liczba_egzemplarzy_albumu"=> $this->input->post('liczba_egzemplarzy'),
			);
		$this->db->insert('album', $data);
	}
	function get($id)
	{
		$this->db->select('
			ID_albumu,
			nazwa_albumu,
			kompilacja,
			data_wydania_albumu,
			soundtrack,
			liczba_utworow,
			typ_nosnika,
			liczba_nosnikow,
			liczba_egzemplarzy_albumu,
		');
		$this->db->from(array('album', 'nosnik'));
		$this->db->where(array(
			'ID_albumu' => $id,
			'id_nosnika_fizycznego' => 'id_nosnika'
		));
		return $this->db->get()->result();
	}
}