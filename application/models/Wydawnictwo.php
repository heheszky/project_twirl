<?php
class Wydawnictwo extends CI_Model {
	function add()
	{
		$data = array(
			"nazwa_wydawnictwa"	=> $this->input->post('nazwa_wydawnictwa'),
			"krotka_nazwa_wydawnictwa" => $this->input->post('krotka_nazwa_wydawnictwa'),
			);
		$this->db->insert('wydawnictwo', $data);
	}
	function get_all()
	{
		$this->db->select('
			id_wydawnictwa,
			nazwa_wydawnictwa,
			krotka_nazwa_wydawnictwa
		');
		return $this->db->get('wydawnictwo')->result();
	}
}