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
			"cena_za_tydzien"=> $this->input->post('cena_za_tydzien'),
			"okladka_albumu"	=> $okladka
			);
		$this->db->insert('album', $data);
		return $this->db->insert_id();
	}
	function get($id)
	{
		$this->db->select('
			album.ID_albumu,
			nazwa_albumu,
			id_autora_albumu,
			CASE 
				WHEN nazwa_zespolu = ""
				THEN concat(imie_autora, " ", nazwisko_autora)
				ELSE nazwa_zespolu END
				AS autor,
			GROUP_CONCAT(nazwa_gatunku SEPARATOR \', \') as gatunek,
			kompilacja,
			data_wydania_albumu,
			soundtrack,
			liczba_utworow,
			nazwa_nosnika,
			liczba_nosnikow,
			liczba_egzemplarzy_albumu as liczba_egzemplarzy,
			okladka_albumu as okladka,
			concat(cena_za_tydzien, "zł") as cena_za_tydzien
		');
		$this->db->from(array('album', 'nosnik', 'album_gatunek', 'gatunek', 'autor'));
		$this->db->where('album.ID_albumu',$id);
		$this->db->where('autor.id_autora=album.id_autora_albumu');
		$this->db->where('id_nosnika_fizycznego=id_nosnika');
		$this->db->where('album.id_albumu=album_gatunek.id_albumu');
		$this->db->where('gatunek.id_gatunku=album_gatunek.id_gatunku');
		return $this->db->get()->row();
	}
	function get_all($limit = null)
	{
		$this->db->select('
			album.id_albumu,
			nazwa_albumu,
			(SELECT GROUP_CONCAT(nazwa_gatunku SEPARATOR \', \')
				FROM gatunek,album_gatunek
				WHERE gatunek.id_gatunku=album_gatunek.id_gatunku
				AND album_gatunek.id_albumu=album.id_albumu) as gatunek,
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
			concat(cena_za_tydzien, "zł") as cena_za_tydzien
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