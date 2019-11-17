<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Usuarios extends CI_Controller {

	private $data;

	function __construct() {
		parent::__construct();
		$this->load->model("Usuario");
		$this->data = array(
			"id" => "POS",
			"title" => "Usuarios",
			"scripts" => "<script src='".base_url()."Components/js/users.js'></script>"
		);
	}

	function index() {
		$vistas = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "Usuarios", "AdminLayout/footer");
		$this->views($vistas, $this->data);
	}

	function Lista() {
		$result = $this->Usuario->All();

		if(count($result) > 0) {
			echo '{ "data" : [';
			foreach ($result as $key => $value) {
				if($key > 0 && count($result) > $key) {
					echo ",";
				}

				switch ($value["profile"]) {
					case '0':
						$nivel = "Super Administrador";
						break;
					case '1':
						$nivel = "Administrador";
						break;
					case '2':
						$nivel = "Gerente";
						break;
					case '3':
						$nivel = "Cajero";
						break;
					case '4':
						$nivel = "Vendedor";
						break;
					default:
						$nivel = "Demo";
						break;
				}
				
				if($value["status"] == "1") {
					$estado = "<button class='btn btn-success btn-sm'>Activado</button>";
				}else {
					$estado = "<button class='btn btn-danger btn-sm'>Desactivado</button>";
				}

				echo '
					[
						"'.($key + 1).'",
						"'.$value["name"].'",
						"'.$value["username"].'",
						"'.$nivel.'",
						"'.$estado.'",
						"<div class=\'btn-group\'><button class=\'btn btn-warning btn-sm btn-edit-user\' data-toggle=\'modal\' data-target=\'#mdlEditUser\' warehouse=\''.$value["user_id"].'\'><i class=\'fa fa-pencil\'></i></button><button class=\'btn btn-danger btn-sm btn-delete-user\' user=\''.$value["user_id"].'\'><i class=\'fa fa-times\'></i></button></div>"
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

	function Eliminar($id) {
		echo json_encode($this->Usuario->Eliminar($id));
	}

	function Crear() {
		if($this->input->post()) {
			$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
			$result = $this->Usuario->Guardar($this->input->post());
			if($result["status"] == "success") {
				$this->data["alert"] = crear_alerta("s", "Guardado", "Usuario ha sido guardado", base_url()."Usuarios");
			}else {
				$this->data["alert"] = crear_alerta("e", "Error", "Usuario no ha sido guardado", base_url()."Usuarios");
			}

			$this->views($views, $this->data);
		}
	}

}