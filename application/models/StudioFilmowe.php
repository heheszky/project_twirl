<?php
class StudioFilmowe extends CI_Model {
	function add()
	{
		$data = array("nazwa_studia" => $this->input->post('nazwa_studia_filmowego'));
		$this->db->insert('studio_filmowe', $data);
		$inserted_id = $this->db->insert_id();
		$nazwa = $this->input->post('nazwa_studia');
		return array($inserted_id, $nazwa);
	}
	function get_all()
	{
		$this->db->select('
			id_studia,
			nazwa_studia
		');
		return $this->db->get('studio_filmowe')->result();
	}
}