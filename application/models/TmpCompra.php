<?php defined("BASEPATH") OR exit("No direct access script allowed");

class TmpCompra extends CI_Model {

	function __construct() {
		parent::__construct("purchase_item_tmp");
	}

	function EliminarTalla($pid, $talla, $pedido) {

		$this->db->where("product_id", $pid);
		$this->db->where("size", $talla);
		$this->db->where("order_id", $pedido);
		$this->db->delete($this->table);

		return array("status" => "success");
	}

	function Limpiar($pedido){
		$this->db->where("order_id", $pedido);
		$this->db->where("status", NULL);
		$this->db->delete($this->table);

		return array("status" => "success");
	}

	function Cln($pedido) {

		$this->db->where("order_id", $pedido);
		$this->db->delete($this->table);

		return array("status" => "success");	
	}

	function Items($field, $value) {
		$this->db->where("purchase_item_tmp.".$field, $value);
		$this->db->select("*, SUM(purchase_item_tmp.amount) AS amn ", false);
		$this->db->from($this->table);
		$this->db->join("product", "purchase_item_tmp.product_id = product.product_id", "INNER");
		$this->db->group_by("purchase_item_tmp.product_id");
		$res = $this->db->get();

		//$q = $this->db->last_query();

		return $res->result_array();
	}

	function Status($order_id) {
		$this->db->where("order_id", $order_id);
		$this->db->update($this->table,array("status" => "1"));

		return array("status" => "success");
	}

	function EliminarItem($orden, $producto) {
		$this->db->where("order_id", $orden);
		$this->db->where("product_id", $producto);
		$this->db->delete($this->table);

		return array("status" => "success");
	}

	function Tallas($product, $order) {

		$this->db->where("product_id", $product);
		$this->db->where("order_id", $order);
		$res = $this->db->get($this->table);

		return $res->result_array();

	}

}