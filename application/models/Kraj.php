<?php
class Kraj extends CI_Model {
	function get_all()
	{
		$this->db->select('
			ID_kraju,
			nazwa_kraju,
			iso
		');
		return $this->db->get('kraj')->result();
	}
}