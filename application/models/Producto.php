<?php defined("BASEPATH") OR exit("No direct access script allowed");

class Producto extends CI_Model {

	function __construct() {
		parent::__construct("product");
	}

	function ObtenerTallas($id) {
		$this->db->select("*, SUM(amount) as qty", false);
		$this->db->from("stock");
		$this->db->where($this->table.".".$this->table."_id", $id);
		$this->db->join($this->table, "stock.product_id=".$this->table.".product_id", "INNER");
		$this->db->group_by("stock.size");
		$result = $this->db->get();

		return $result->result_array();
	}

}