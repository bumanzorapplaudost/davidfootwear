<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Compra extends CI_Model {

	function __construct() {
		$this->table = "purchase";
		parent::__construct($this->table);
	}

	function TransferData($order_id) {
		$this->db->where("order_id", $order_id);
		$this->db->select("order_id, product_id, amount, size, status");
		$res = $this->db->get("purchase_item_tmp");

		return $res->result_array();
	}

	function LLenarInventario($order_id) {
		$this->db->where("order_id", $order_id);
		$this->db->select("product_id, order_id, size, SUM(amount) as amount");
		$this->db->group_by("size");
		$this->db->group_by("product_id");
		$res = $this->db->get("purchase_item");

		return $res->result_array();
	}

	function Total($order_id) {
		$this->db->where("purchase_item.order_id", $order_id);
		$this->db->select("*, SUM(purchase_item.amount) AS amn ", false);
		$this->db->from("purchase_item");
		$this->db->join("product", "purchase_item.product_id = product.product_id", "INNER");
		$this->db->group_by("purchase_item.product_id");
		$res = $this->db->get();

		//$q = $this->db->last_query();

		return $res->result_array();
	}

}