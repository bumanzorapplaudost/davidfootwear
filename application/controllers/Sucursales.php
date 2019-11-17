<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Sucursales extends CI_Controller {

	private $data;

	function __construct() {
		parent::__construct();
		$this->load->model("Sucursal");
		$this->load->model("Usuario");
		$this->data = array(
			"id" => "POS",
			"title" => "Sucursales",
			"scripts" => "<script src='".base_url()."Components/js/stores.js'></script>"
		);
	}

	function index() {
		$this->data["usuarios"] = $this->Usuario->All();
		$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "Sucursales", "AdminLayout/footer");
		$this->views($views, $this->data);
	}

	function Lista() {
		$sucursales = $this->Sucursal->All();
		if(count($sucursales) > 0 ) {
			echo '{ "data" : [';
			foreach ($sucursales as $key => $value) {
				if($key > 0 && count($sucursales) > $key) {
					echo ",";
				}

				if($value["status"] == 0) {
					$estado = "<button class='btn btn-danger' style='padding: 3px'>Clausurada</button>";
				}else {
					$estado = "<button class='btn btn-success' style='padding: 3px'>Funcionando</button>";
				}

				$date = substr($value["opening_date"], -2,2)."/".substr($value["opening_date"], 5,2)."/".substr($value["opening_date"], 0,4);

				echo '
					[
						"'.($key + 1).'",
						"'.$value["name"].'",
						"'.$value["address"].'",
						"'.$value["employee_id"].'",
						"'.$value["phone"].'",
						"'.$date.'",
						"'.$estado.'",
						"<div class=\'btn-group\'><button class=\'btn btn-warning btn-sm btn-edit-store\' data-toggle=\'modal\' data-target=\'#mdlEditStore\' store='.$value["store_id"].'><i class=\'fa fa-pencil\'></i></button><button class=\'btn btn-danger btn-sm btn-delete-store\' store='.$value["store_id"].'><i class=\'fa fa-times\'></i></button></div>"
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
			$result = $this->Sucursal->Guardar($this->input->post());
			$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
			if($result["status"] == "success") {
				$this->data["alert"] = crear_alerta("s", "Guardado", "La sucursal ha sido almacenada con exito", base_url()."Sucursales");
			}else {
				$this->data["alert"] = crear_alerta("e", "Error al Guardar", "La sucursal no pudo ser almacenada", base_url()."Sucursales");
			}

			$this->views($views, $this->data);
		}else {
			echo '
				<script>
					window.location= "'.base_url().'Sucursales";
				</script>
			';
		}
	}

	function Editar($id = "") {
		if(!$this->input->post() && $id != "") {
			echo json_encode($this->Sucursal->Leer($id));
		}else if($this->input->post()) {
			$result = $this->Sucursal->Actualizar($id, $this->input->post());
			$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
			if($result["status"] == "success") {
				$this->data["alert"] = crear_alerta("s", "Actualizacion correcta", "La sucursal fue modificada con éxito!", base_url()."Sucursales");
			}else{
				$this->data["alert"] = crear_alerta("e", "Error", "La sucursal no pudo ser actualizada.", base_url()."Sucursales");
			}

			$this->views($views, $this->data);
		}
	}

	function Eliminar($id) {
		if($id != "") {
			$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
			$response = $this->Sucursal->Eliminar($id);
			if($response["status"] == "success") {
				$this->data["alert"] = crear_alerta("s", "Eliminada", "La sucursal fue eliminada con éxito!", base_url()."Sucursales");
			}else{
				$this->data["alert"] = crear_alerta("e", "Error", "La sucursal no pudo ser eliminada.", base_url()."Sucursales");
			}

			$this->views($views, $this->data);
		}
	}

}