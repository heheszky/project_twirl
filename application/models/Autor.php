<?
class Autor extends CI_Model {
	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
	}
	function add()
	{
		$data = array(
			"imie_autora"		=> $this->input->post('imie_autora'),
			"nazwisko_autora"	=> $this->input->post('nazwisko_autora'),
			"pseudonim_autora"	=> $this->input->post('pseudonim'),
			"data_urodzenia_autora"=> $this->input->post('data_urodzenia'),
			"data_smierci_autora"=> $this->input->post('data_smierci'),
			"id_kraju_urodzenia"=> $this->input->post('id_kraju'),
			"typ_autora"		=> $this->input->post('typ_autora')
			);
		$this->db->insert('autor', $data);
	}
	function get($id)
	{
		$this->db->select('
			id_autora,
			imie_autora,
			nazwisko_autora,
			pseudonim_autora,
			data_urodzenia_autora,
			data_smierci_autora,
			nazwa_kraju,
			typ_autora
		');
		$this->db->from(array('autor', 'kraj'));
		$this->db->where(array(
			'ID_autora'=> $id,
			'id_kraju_urodzenia' => 'id_kraju'
		));
		return $this->db->get('autor')->result();
	}
}