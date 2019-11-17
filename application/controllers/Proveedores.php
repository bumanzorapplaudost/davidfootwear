<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedores extends CI_Controller {

	private $data;

	function __construct() {
		parent::__construct();
		$this->load->model("Proveedor");
		$this->data = array(
			"id" => "POS",
			"title" => "Proveedores",
			"scripts" => '<script src="'.base_url().'Components/js/providers.js"></script>'
		);
	}

	function index() {
		$vistas = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "Proveedores", "AdminLayout/footer");
		$this->views($vistas, $this->data);
	}

	function Lista() {
		$proveedores = $this->Proveedor->All();
		if(count($proveedores) > 0 ) {
			echo '{ "data" : [';
			foreach ($proveedores as $key => $value) {
				if($key > 0 && count($proveedores) > $key) {
					echo ",";
				}

				if($value["status"] == "1") {
					$status = "<button class='btn btn-primary btn-sm'>Activo</button>";
				}else {
					$status = "<button class='btn btn-warning btn-sm'>Inactivo</button>";
				}

				echo '
					[
						"'.($key + 1).'",
						"'.$value["name"].'",
						"'.$value["nit"].'",
						"'.$value["nrc"].'",
						"'.$value["area"].'",
						"'.$value["representative"].'",
						"'.$value["cellphone"].', '.$value["phone"].'",
						"'.$status.'",
						"<div class=\'btn-group\'><button class=\'btn btn-warning btn-sm btn-edit-provider\' data-toggle=\'modal\' data-target=\'#MdlEditProvider\' provider='.$value["provider_id"].'><i class=\'fa fa-pencil\'></i></button><button class=\'btn btn-danger btn-sm btn-delete-provider\' provider='.$value["provider_id"].'><i class=\'fa fa-times\'></i></button></div>"
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
			$result = $this->Proveedor->Guardar($this->input->post());
			if($result["status"] == "success") {
				$this->data["alert"] = crear_alerta("s", "Proveedor Guardado", "El proveedor fue guardado con éxito", base_url()."Proveedores");
			}else {
				$this->data["alert"] = crear_alerta("e", "Proveedor no Guardado", "El proveedor no pudo ser registrado, favor intente nuevamente", base_url()."Proveedores");
			}

			$vistas = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
			$this->views($vistas, $this->data);
		}
	}

	function Editar($id = NULL) {
		if($id != NULL && !$this->input->post()) {
			$result = $this->Proveedor->Leer($id);
			
			echo json_encode($result);	
		}else if($id != NULL && $this->input->post()) {
			$resultado = $this->Proveedor->Actualizar($id, $this->input->post());
			if($resultado["status"] == "success") {
				$this->data["alert"] = crear_alerta("s", "Actualizado", "Proveedor actualizado con exito!", base_url()."Proveedores");
				$vistas = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
				$this->views($vistas, $this->data);
			}else {
				$this->data["alert"] = crear_alerta("e", "No actualizado", "Proveedor no pudo ser actualizado", base_url()."Proveedores");
				$vistas = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
				$this->views($vistas, $this->data);
			}
		}
	}

	function Eliminar($id) {
		if($id != NULL) {
			$result = $this->Proveedor->Eliminar($id);
			if($result["status"] == "success" && $result["rows"] > 0) {
				$this->data["alert"] = crear_alerta("s","Eliminado", "El Proveedor fue eliminado con Exito!",base_url()."Proveedores");
				$vistas = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
				$this->views($vistas, $this->data);
			}
		}
	}
}