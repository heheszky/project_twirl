<?php
class Ksiazka extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	function add($okladka)
	{
		$data = array(
			"ISBN"					=> $this->input->post('isbn'),
			"tytul_ksiazki"			=> $this->input->post('tytul_ksiazki'),
			"ID_autora"				=> $this->input->post('autor_ksiazki'),
			"ID_epoka"				=> $this->input->post('epoka_ksiazki'),
			"data_wydania_ksiazki"	=> $this->input->post('data_wydania_ksiazki'),
			"ID_wydawnictwa"		=> $this->input->post('wydawnictwo_ksiazki'),
			"ID_okladka"			=> $this->input->post('okladka'),
			"liczba_egzemplarzy"	=> $this->input->post('liczba_egz'),
			"okladka_ksiazki"		=> $okladka
			);
		$this->db->insert('ksiazka', $data);
	}
	function get($isbn)
	{
		$this->db->select('
			ISBN,
			tytul_ksiazki,
			autor.id_autora,
			imie_autora,
			nazwisko_autora,
			pseudonim_autora,
			nazwa_epoki,
			epoka.id_epoki,
			data_wydania_ksiazki,
			wydawnictwo.id_wydawnictwa,
			nazwa_wydawnictwa,
			typ_okladki,
			liczba_egzemplarzy
		');
		$this->db->from(array('ksiazka', 'autor', 'epoka', 'wydawnictwo', 'okladka'));
		$this->db->where(array(
			'ISBN' => $isbn,
			'ksiazka.ID_autora' => 'autor.id_autora',
			'ksiazka.ID_epoki' => 'epoka.ID_epoki',
			'ksiazka.ID_wydawnictwa' => 'epoka.ID_wydawnictwa',
			'ksiazka.ID_okladka' => 'okladka.ID_okladki'
		));
		return $this->db->get()->result();
	}
}