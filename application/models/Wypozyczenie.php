<?php
class Wypozyczenie extends CI_Model {
	function add($id_klienta)
	{
		$now = date("Y-m-d");
		$data = array(
			"data_wypozyczenia"	=> $now,
			"id_klienta"		=> $id_klienta,
			);
		$this->db->insert('wypozyczenie', $data);
		$inserted_id = $this->db->insert_id();
		return $inserted_id;
	}
	function add_products($produkty)
	{
		$this->db->insert_batch('wypozyczenie_rzeczy', $produkty);
	}
}