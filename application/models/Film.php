<?php
class Film extends CI_Model {
	function add($okladka)
	{
		$data = array(
			"tytul_filmu"		=> $this->input->post('tytul_filmu'),
			"id_rezysera"		=> $this->input->post('rezyser_filmu'),
			"id_studiafilmowego"=> $this->input->post('studio_filmowe'),
			"id_krajuprodukcji"	=> $this->input->post('kraj_produkcji_filmu'),
			"data_wydania_filmu"=> $this->input->post('data_wydania_filmu'),
			"liczba_egzemplarzy_filmu"=> $this->input->post('liczba_egzemplarzy_filmu'),
			"id_nosnika_fizycznego"=> $this->input->post('nosnik_fizyczny_filmu'),
			"okladka_filmu"		=> $okladka
		);
		$this->db->insert('film', $data);
	}
	function get($id)
	{
		$this->db->select('
			ID_filmu,
			tytul_filmu,
			id_rezysera,
			imie_autora,
			nazwisko_autora,
			nazwa_zespolu,
			id_studia,
			nazwa_studia,
			id_kraju,
			nazwa_kraju,
			data_wydania_filmu,
			liczba_egzemplarzy_filmu,
			nazwa_nosnika,
			okladka_filmu as okladka
		');
		$this->db->from(array('film', 'autor', 'studio_filmowe', 'kraj', 'nosnik'));
		$this->db->where('ID_filmu', $id);
		$this->db->where('id_rezysera=id_autora');
		$this->db->where('id_studiafilmowego=id_studia');
		$this->db->where('id_krajuprodukcji=id_kraju');
		$this->db->where('id_nosnika_fizycznego=id_nosnika');
		return $this->db->get()->result();
	}
	function get_all($limit = null)
	{
		$this->db->select('
			id_filmu,
			tytul_filmu,
			id_rezysera,
			imie_autora,
			nazwisko_autora,
			nazwa_zespolu,
			id_studia,
			nazwa_studia,
			id_kraju,
			nazwa_kraju,
			data_wydania_filmu,
			liczba_egzemplarzy_filmu,
			nazwa_nosnika,
			okladka_filmu as okladka
		');
		$this->db->from(array('film', 'autor', 'studio_filmowe', 'kraj', 'nosnik'));
		$this->db->where('id_rezysera=id_autora');
		$this->db->where('id_studiafilmowego=id_studia');
		$this->db->where('id_krajuprodukcji=id_kraju');
		$this->db->where('id_nosnika_fizycznego=id_nosnika');
		if($limit)$this->db->limit($limit);
		$this->db->order_by("id_filmu", "desc");
		return $this->db->get()->result();
	}
}