<?php defined('BASEPATH') OR exit('No direct script access allowed');

class CI_Model {

	public $table;

	public function __construct($table) {
		$this->table = $table;
		$this->load->database();
	}

	public function __get($key)
	{
		return get_instance()->$key;
	}

	function All() {
		$this->db->select("*", true);
		$this->db->from($this->table);
		$result = $this->db->get();

		return $result->result_array();
	}

	public function Count() {
		$total = $this->db->count_all($this->table);
		return $total;
	}


	function Guardar($data) {
		$this->db->insert($this->table, $data);

		return array("status" => "success","id" => $this->db->insert_id());
	}

	function Leer($id) {
		$this->db->select("*", false);
		$this->db->where($this->table."_id", $id);
		$this->db->from($this->table);
		$result = $this->db->get();
		
		return $result->row_array();
	}

	function Actualizar($id, $datos) {
		$this->db->where($this->table."_id", $id);
		$this->db->update($this->table, $datos);

		return array("status" => "success", "rows" => $this->db->affected_rows());
	}

	function Eliminar($id) {
		$this->db->where($this->table."_id", $id);
		$this->db->delete($this->table);

		return array("status" => "success", "rows" => $this->db->affected_rows());
	}
}
