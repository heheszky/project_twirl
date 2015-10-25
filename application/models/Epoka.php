<?php
class Epoka extends CI_Model {
	function get_all()
	{
		$this->db->select('
			ID_epoki,
			nazwa_epoki
		');
		return $this->db->get('epoka')->result();
	}
}