<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Marca extends CI_Model {

	function __construct() {
		$this->table = "brand";
		parent::__construct($this->table);
	}

	function ConsultarProducto($marca_ID) {

		$this->db->select("*", false);
		$this->db->where("brand_id", $marca_ID);
		$this->db->from("product");
		$result = $this->db->get();

		return $result->result_array();

	}

}