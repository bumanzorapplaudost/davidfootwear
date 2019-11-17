<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clientes extends CI_Controller {

	private $data;

	function __construct() {
		parent::__construct();
		$this->load->model("Cliente");
		$this->data = array(
			"id" => "POS",
			"title" => "Clientes",
			"scripts" => "<script src='".base_url()."Components/js/customer.js'></script>");
	}

	function index() {
		$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "Clientes", "AdminLayout/footer");
		$this->views($views, $this->data);
	}

	function Lista() {
		$result = $this->Cliente->All();
		if(count($result) > 0 ) {
			echo '{ "data" : [';
			foreach ($result as $key => $value) {
				if($key > 0 && count($result) > $key) {
					echo ",";
				}

				if($value["type"] == "FCF"){
                    $type = "<button class='btn btn-default btn-sm'>Factura Consumidor Final</button>";
                }else if($value["type"] == "CCF") {
                    $type = "<div class='btn-group'><button class='btn btn-default btn-sm customer-show-data'>Comp. Credito Fiscal</button><button data-toggle='modal' customer='".$value["customer_id"]."' data-target='#MdlShowCustomerInfo' class='btn btn-default btn-sm customer-show-data'><i class='fa fa-eye'></i></button></div>";
                }else if($value["type"] == "EXP") {
                    $type = "<div class='btn-group'><button class='btn btn-default btn-sm customer-show-data'> Facturas Exportacion</button><button data-toggle='modal' customer='".$value['customer_id']."' data-target='#MdlShowCustomerInfo' class='btn btn-default btn-sm customer-show-data'><i class='fa fa-eye'></i></button></div>";
                }

				echo '
					[
						"'.($key + 1).'",
						"'.$value["name"].'",
						"'.$value["email"].'",
						"'.$value["phone"].'",
						"'.$type.'",
						"$'.rand(2,2000).'.00",
						"<div class=\'btn-group\'><button class=\'btn btn-warning btn-sm btn-edit-customer\' data-toggle=\'modal\' data-target=\'#MdlEditCustomer\' customer='.$value["customer_id"].'><i class=\'fa fa-pencil\'></i></button><button class=\'btn btn-danger btn-sm btn-delete-customer\' customer='.$value["customer_id"].'><i class=\'fa fa-times\'></i></button></div>"
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

	function DatosFiscales($id = "") {
		if($id != "") {
			echo json_encode($this->Cliente->Leer($id));
		}
	}

	function Editar($id = "") {
		if($id != "" && !$this->input->post()) {
			echo json_encode($this->Cliente->Leer($id));
		}else if($this->input->post()) {
			$result = $this->Cliente->Actualizar($id, $this->input->post());
			if($result["status"] == "success") {
				$this->data["alert"] = crear_alerta("s", "Cliente Actualizado", "El registro ha sido actualizado con exito!", base_url()."Clientes");
				$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
				$this->views($views, $this->data);	
			}else {
				echo var_dump($result);
			}
		}
	}

	function Crear() {
		if($this->input->post()) {
			$resultado = $this->Cliente->Guardar($this->input->post());
			if($resultado["status"] == "success") {
				$this->data["alert"] = crear_alerta("s", "Cliente Registrado", "El cliente ha sido guardado con exito!", base_url()."Clientes");
				$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
				$this->views($views, $this->data);			
			}
		}
	}

	function Eliminar($id = "") {
		if($id != "") {
			$result = $this->Cliente->Eliminar($id);
			if($result["status"] == "success" && $result["rows"] > 0) {
				$this->data["alert"] = crear_alerta("s", "Cliente Eliminado", "El cliente ha sido eliminado con exito", base_url()."Clientes");
				$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
				$this->views($views, $this->data);			
			}
		}
	}
}