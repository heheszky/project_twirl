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
		return $this->db->insert_id();
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
			liczba_egzemplarzy_albumu as liczba_egzemplarzy,
			okladka_albumu as okladka,
			cena_za_tydzien
		');
		$this->db->from(array('album', 'nosnik'));
		$this->db->where('ID_albumu',$id);
		$this->db->where('id_nosnika_fizycznego=id_nosnika');
		return $this->db->get()->row();
	}
	function get_all($limit = null)
	{
		$this->db->select('
			id_albumu,
			nazwa_albumu,
			autor.id_autora,
			imie_autora,
			nazwisko_autora,
			CASE 
				WHEN nazwa_zespolu = ""
				THEN concat(imie_autora, " ", nazwisko_autora)
				ELSE nazwa_zespolu END
				AS autor,
			nazwa_zespolu,
			kompilacja,
			data_wydania_albumu,
			soundtrack,
			liczba_utworow,
			liczba_nosnikow,
			liczba_egzemplarzy_albumu,
			okladka_albumu as okladka,
			cena_za_tydzien
		');
		$this->db->from(array('album', 'nosnik', 'autor'));
		$this->db->where('id_nosnika_fizycznego=id_nosnika');
		$this->db->where('album.id_autora_albumu=autor.id_autora');
		if($limit)$this->db->limit($limit);
		$this->db->order_by("id_albumu", "desc");
		return $this->db->get()->result();
	}
	function get_available_count($id)
	{
		return $this->db->query('
			SELECT
				liczba_egzemplarzy_albumu - count(ID_rzeczy) as dostepne
			FROM
				album,
				wypozyczenie_rzeczy,
				wypozyczenie
			WHERE
				id_albumu = id_rzeczy AND
				wypozyczenie.ID_wypozyczenia = wypozyczenie_rzeczy.ID_wypozyczenia AND
				id_rzeczy = '.$id.' AND
				data_oddania is null;
		')->row()->dostepne;
	}
	function add_type($id_albumu, $id_gatunku)
	{
		$this->db->insert("album_gatunek", array('id_albumu'=>$id_albumu,'id_gatunku'=>$id_gatunku));
	}
}