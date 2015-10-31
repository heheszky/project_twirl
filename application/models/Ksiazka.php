<?php
class Ksiazka extends CI_Model {
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
	function get($id)
	{
		$this->db->select('
			id_ksiazki
			ISBN,
			tytul_ksiazki,
			autor.id_autora,
			imie_autora,
			nazwisko_autora,
			nazwa_zespolu,
			nazwa_epoki,
			epoka.id_epoki,
			data_wydania_ksiazki,
			wydawnictwo.id_wydawnictwa,
			nazwa_wydawnictwa,
			id_okladki,
			typ_okladki,
			liczba_egzemplarzy,
			okladka_ksiazki as okladka
		');
		$this->db->from(array('ksiazka', 'autor', 'epoka', 'wydawnictwo', 'okladka'));
		$this->db->where('id_ksiazki', $id);
		$this->db->where('ksiazka.ID_autora=autor.id_autora');
		$this->db->where('ksiazka.ID_epoka=epoka.ID_epoki');
		$this->db->where('ksiazka.ID_wydawnictwa=wydawnictwo.ID_wydawnictwa');
		$this->db->where('ksiazka.ID_okladka=okladka.ID_okladki');
		return $this->db->get()->row();
	}
	
	function get_all($limit = null)
	{
		$this->db->select('
			id_ksiazki,
			ISBN,
			tytul_ksiazki,
			autor.id_autora,
			imie_autora,
			nazwisko_autora,
			concat(imie_autora, " ", nazwisko_autora) as autor,
			nazwa_zespolu,
			nazwa_epoki,
			epoka.id_epoki,
			data_wydania_ksiazki,
			wydawnictwo.id_wydawnictwa,
			nazwa_wydawnictwa,
			id_okladki,
			typ_okladki,
			liczba_egzemplarzy,
			okladka_ksiazki as okladka
		');
		$this->db->from(array('ksiazka', 'autor', 'epoka', 'wydawnictwo', 'okladka'));
		$this->db->where('ksiazka.ID_autora=autor.id_autora');
		$this->db->where('ksiazka.ID_epoka=epoka.ID_epoki');
		$this->db->where('ksiazka.ID_wydawnictwa=wydawnictwo.ID_wydawnictwa');
		$this->db->where('ksiazka.ID_okladka=okladka.ID_okladki');
		if($limit)$this->db->limit($limit);
		$this->db->order_by("id_ksiazki", "desc");
		return $this->db->get()->result();
	}
	function get_available_count($id)
	{
		return $this->db->query('
			SELECT
				liczba_egzemplarzy - count(ID_rzeczy) as dostepne
			FROM
				ksiazka,
				wypozyczenie_rzeczy,
				wypozyczenie
			WHERE
				id_ksiazki = id_rzeczy AND
				wypozyczenie.ID_wypozyczenia = wypozyczenie_rzeczy.ID_wypozyczenia AND
				id_rzeczy = '.$id.' AND
				data_oddania is null;
		')->row()->dostepne;
	}
}