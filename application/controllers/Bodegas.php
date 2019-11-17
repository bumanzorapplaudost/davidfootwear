<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Bodegas extends CI_Controller {

	private $data;

	function __construct() {
		parent::__construct();
		$this->load->Model("Bodega");
		$this->load->Model("Sucursal");
		$this->load->Model("Usuario");
		$this->data = array(
			"id" => "POS",
			"title" => "Bodegas",
			"scripts" => "<script src='".base_url()."Components/js/warehouse.js'></script>"
		);
	}

	function index() {
		$this->data["sucursales"] = $this->Sucursal->All();
		$this->data["usuarios"] = $this->Usuario->All();
		$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "Bodegas", "AdminLayout/footer");
		$this->views($views, $this->data);
	}

	function Lista() {
		$lista = $this->Bodega->All();
		if(count($lista) > 0) {
			echo '{ "data" : [';
			foreach ($lista as $key => $value) {
				if($key > 0 && count($lista) > $key) {
					echo ",";
				}

				if($value["employee_id"] != "" && $value["employee_id"] != 0) {
					$user = $this->Usuario->Leer($value["employee_id"]);
				}else {
					$user["name"] = "No Asignado";
				}

				if($value["store_id"] != "" && $value["store_id"] != "0") {
					$store = $this->Sucursal->Leer($value["store_id"]);
					$store = $store["name"];
				}else {
					$store = "No Asignado";
				}

				if($value["employee_id"] != "" && $value["employee_id"] != "0") {
					$empleado = $value["employee_id"];
				}else {
					$empleado = "No Asignado";
				}

				echo '
					[
						"'.($key + 1).'",
						"'.$value["code"].'",
						"'.$value["description"].'",
						"'.$store.'",
						"'.$user["name"].'",
						"<div class=\'btn-group\'><button class=\'btn btn-warning btn-sm btn-edit-warehouse\' data-toggle=\'modal\' data-target=\'#mdlEditWarehouse\' warehouse=\''.$value["warehouse_id"].'\'><i class=\'fa fa-pencil\'></i></button><button class=\'btn btn-danger btn-sm btn-delete-warehouse\' warehouse=\''.$value["warehouse_id"].'\'><i class=\'fa fa-times\'></i></button></div>"
					]
				';
			}
			echo "]
			}";
		}else {	
			echo '
				{
					"data" : []
				}
			';
		}

	}

	function Crear() {
		if($this->input->post()) {
			$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
			$result = $this->Bodega->Guardar($this->input->post());
			if($result["status"] == "success") {
				$this->data["alert"] = crear_alerta("s", "Guardado", "Bodega registrada con éxito.", base_url()."Bodegas");
			}else {
				$this->data["alert"] = crear_alerta("e", "Error", "Bodega no pudo ser registrada.", base_url()."Bodegas");
			}

			$this->views($views, $this->data);
		}
	}

	function Editar($id) {
		if($id != "" && !$this->input->post()) {
			$editar = $this->Bodega->Leer($id);
			echo json_encode($editar);
		}else if($this->input->post()) {

			$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");

			$result = $this->Bodega->Actualizar($id, $this->input->post());
			if($result["status"] == "success") {
				$this->data["alert"] = crear_alerta("s", "Actualizado", "La bodega ha sido actualizada con éxito.", base_url()."Bodegas");
			}else {
				$this->data["alert"] = crear_alerta("s", "Error", "Bodega no pudo ser actualizada.", base_url()."Bodegas");
			}

			$this->views($views, $this->data);
		}
	}

	function Eliminar($id) {
		if($id != "") {
			$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
			$resultado = $this->Bodega->Eliminar($id);
			if($resultado["status"] == "success") {
				$this->data["alert"] = crear_alerta("s", "Eliminado", "Bodega ha sido eliminada con éxito", base_url()."Bodegas");
			}else {
				$this->data["alert"] = crear_alerta("e", "Error", "Bodega no pudo ser eliminada", base_url()."Bodegas");
			}

			$this->views($views, $this->data);
		}
	}

}