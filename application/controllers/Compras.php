<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Compras extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Compra");
		$this->load->model("Pit");
		$this->load->model("Stock");
		$this->load->model("Proveedor");
		$this->load->model("TmpCompra");
		$this->data = array(
			"id" => "POS",
			"title" => "Compras",
			"scripts" => "<script src='".base_url()."Components/js/compras.js'></script>"
		);
	}

	function index() {
		$vistas = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "Compras", "AdminLayout/Footer");
		$this->views($vistas, $this->data);
	}

	function Lista() {

		$compras = $this->Compra->All();

		if(count($compras) > 0) {
			echo '{ "data" : [';
			foreach ($compras as $key => $val) {
				if($key > 0 && count($compras) > $key) {
					echo ",";
				}
				$total = $this->Compra->Total($val["order_id"]);
				$tax = 0;
				$stotal = 0;
				$mnn = 0;
				foreach ($total as $k => $value) {
					$mnn += $value["amn"];
					$tax += ($value["cost_price"] * $value["amn"]) * 0.13;
					$stotal += ($value["cost_price"] * $value["amn"]) - ($value["cost_price"] * $value["amn"]) * 0.13;
				}

				$proveedor = $this->Proveedor->Leer($val["provider_id"]);

				echo '
					[
						"'.($key + 1).'",
						"'.$val["purchase_code"].'",
						"'.$proveedor["name"].'",
						"'.$val["purchase_date"].'",
						"Factura '.$val["doc_type"].'",
						"$ '.$stotal.'",
						"<div class=\'btn-group\'><button class=\'btn btn-info btn-sm btn-detalle-compra\' order=\''.$val["order_id"].'\' data-toggle=\'modal\' data-target=\'#mdlDetalleCompra\'><i class=\'fa fa-eye\'></i></button></div>"
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
			$vistas = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/Footer");
			$result = $this->Compra->Guardar($this->input->post());
			if($result["status"] == "success") {	
				$order_id = $this->input->post("order_id");
				$res = $this->Compra->TransferData($order_id);
				if(count($res) > 0) {
					foreach ($res as $key => $value) {
						$this->Pit->Guardar($value);
					}

					$stock = $this->LlenarStock($order_id);
					if($stock["status"] == "success") {
						$this->TmpCompra->Cln($order_id);
						$this->data["alert"] = crear_alerta("s", "Guardado", "Compra ha sido guardada con exito!", base_url()."Compras");
					}
				}
			}else{
				$this->data["alert"] = crear_alerta("e", "Error", "Compra no se pudo guardar", base_url()."Compras");
			}
			$this->views($vistas, $this->data);
		}
	}

	function Editar($id = "") {

	}

	function Eliminar( $id = "") {

	}

	function LlenarStock($order_id) {
		$ar = $this->Compra->LLenarInventario($order_id);
		foreach ($ar as $key => $value) {
			$result = $this->Stock->Traer("size", $value["size"], "product_id", $value["product_id"]);
			$amount = $result["amount"] + $value["amount"];
			$data = array("amount" => $amount);
			$this->Stock->Edit("product_id", $value["product_id"], "size", $value["size"], $data); 
		}

		return array("status" => "success");
	}
}