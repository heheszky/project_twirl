<?php
class Nosnik extends CI_Model {
	function get_all()
	{
		$this->db->select('
			ID_nosnika,
			nazwa_nosnika,
		');
		return $this->db->get('nosnik')->result();
	}
}