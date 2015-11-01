<?php
class Gatunek extends CI_Model {
	function add()
	{
		$data = array(
			"nazwa_gatunku"		=> $this->input->post('nazwa_gatunku'),
			"typ_gatunku"		=> $this->input->post('typ_gatunku'),
			);
		$this->db->insert('gatunek', $data);
	}
	function get_all($type=null)
	{
		$this->db->select('
			id_gatunku,
			nazwa_gatunku,
			typ_gatunku
		');
		if($type)$this->db->where('typ_gatunku', $type);
		return $this->db->get('gatunek')->result();
	}
}