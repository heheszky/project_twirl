<?php
class Album extends CI_Model {
	function add($okladka)
	{
		$data = array(
			"nazwa_albumu"		=> $this->input->post('nazwa_albumu'),
			"kompilacja"		=> $this->input->post('kompilacja'),
			"id_autora_albumu"	=> $this->input->post('autor_albumu'),
			"data_wydania_albumu"=> $this->input->post('data_wydania_albumu'),
			"soundtrack"		=> $this->input->post('soundtrack'),
			"liczba_utworow"	=> $this->input->post('liczba_utworow'),
			"id_nosnika_fizycznego"=> $this->input->post('nosnik_fizyczny'),
			"liczba_nosnikow"	=> $this->input->post('liczba_nosnikow'),
			"liczba_egzemplarzy_albumu"=> $this->input->post('liczba_egzemplarzy_albumu'),
			"okladka_albumu"	=> $okladka
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
			nazwa_nosnika,
			liczba_nosnikow,
			liczba_egzemplarzy_albumu,
			okladka_albumu as okladka
		');
		$this->db->from(array('album', 'nosnik'));
		$this->db->where('ID_albumu',$id);
		$this->db->where('id_nosnika_fizycznego=id_nosnika');
		return $this->db->get()->result();
	}
	function get_all($limit = null)
	{
		$this->db->select('
			id_albumu,
			nazwa_albumu,
			kompilacja,
			data_wydania_albumu,
			soundtrack,
			liczba_utworow,
			liczba_nosnikow,
			liczba_egzemplarzy_albumu,
			okladka_albumu as okladka
		');
		$this->db->from(array('album', 'nosnik'));
		$this->db->where('id_nosnika_fizycznego=id_nosnika');
		if($limit)$this->db->limit($limit);
		$this->db->order_by("id_albumu", "desc");
		return $this->db->get()->result();
	}
}