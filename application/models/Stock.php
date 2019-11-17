<?php defined('BASEPATH') OR exit("No direct access script allowed");

class Stock extends CI_Model {

	function __construct() {
		parent::__construct("stock");
	}

	function AvailableStock($id) {
		$this->db->where("product_id", $id);
		$this->db->select_sum("amount");
		$this->db->from($this->table);
		$result = $this->db->get();

		return $result->row_array();
	}

	function FillBlanks($product_id) {
		for ($i=25; $i < 43; $i++) { 
			$data = array("product_id" => $product_id, "size" => $i, "amount" => "0");
			$this->db->insert("stock", $data);
		}
	}

	function Traer($campo, $valor, $campo2, $valor2) {
		$this->db->where($campo, $valor);
		$this->db->where($campo2, $valor2);
		$this->db->select("*");
		$result = $this->db->get($this->table);

		return $result->row_array();
	}

	function Edit($field1, $value1, $field2, $value2, $data) {
		$this->db->where($field1, $value1);
		$this->db->where($field2, $value2);
		$this->db->update($this->table, $data);

		return array("status" => "success");
	}

}