<?
class Film extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	function add()
	{
		$data = array(
			"tytul_filmu"		=> $this->input->post('tytul'),
			"id_rezysera"		=> $this->input->post('id_rezysera'),
			"id_studiafilmowego"=> $this->input->post('id_studia'),
			"id_krajuprodukcji"	=> $this->input->post('id_kraju'),
			"data_wydania_filmu"=> $this->input->post('data_wydania'),
			"liczba_egzemplarzy_filmu"=> $this->input->post('liczba_egzemplarzy'),
			"id_nosnika_fizycznego"=> $this->input->post('id_nosnika')
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
			pseudonim_autora,
			id_studia,
			nazwa_studia,
			id_kraju,
			nazwa_kraju,
			data_wydania_filmu,
			liczba_egzemplarzy_filmu,
			nazwa_nosnika
		');
		$this->db->from(array('film', 'autor', 'studio_filmowe', 'kraj', 'nosnik'));
		$this->db->where(array(
			'ID_filmu' => $id,
			'id_rezysera' => 'id_autora',
			'id_studiafilmowego' => 'id_studia',
			'id_krajuprodukcji' => 'id_kraju',
			'id_nosnika_fizycznego' => 'id_nosnika'
		));
		return $this->db->get()->result();
	}
}