<?php
class Wypozyczenie extends CI_Model {
	function add($id_klienta)
	{
		$now = date("Y-m-d H:i:s");
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
	function get_all($id_klienta)
	{
		$this->db->select('
			id_wypozyczenia,
			data_wypozyczenia,
			data_oddania,
		');
		$this->db->from('wypozyczenie');
		$this->db->where('id_klienta', $id_klienta);
		return $this->db->get()->result();
	}
	function get($id)
	{
		$this->db->select('
			id_wypozyczenia,
			data_wypozyczenia,
			data_oddania,
			id_klienta
		');
		$this->db->from('wypozyczenie');
		$this->db->where('id_wypozyczenia', $id);
		return $this->db->get()->row();
	}
	function get_product_ids($id)
	{
		$this->db->select('id_rzeczy, typ_rzeczy');
		$this->db->from('wypozyczenie_rzeczy');
		$this->db->where('id_wypozyczenia', $id);
		return $this->db->get()->result();
	}
}