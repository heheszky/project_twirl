<?
class Ksiazka extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	function add()
	{
		$data = array(
			"ISBN"					=> $this->input->post('ISBN'),
			"tytul_ksiazki"			=> $this->input->post('tytul'),
			"ID_autora"				=> $this->input->post('id_autora'),
			"ID_epoka"				=> $this->input->post('id_epoka'),
			"data_wydania_ksiazki"	=> $this->input->post('data_wydania'),
			"ID_wydawnictwa"		=> $this->input->post('id_wydawnictwa'),
			"ID_okladka"			=> $this->input->post('id_okladki'),
			"liczba_egzamplarzy"	=> $this->input->post('liczba_egz')
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