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
	function get_all()
	{
		$this->db->select('
			id_gatunku,
			nazwa_gatunku,
			typ_gatunku
		');
		return $this->db->get('gatunek')->result();
	}
}