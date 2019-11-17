<?php defined("BASEPATH") OR exit("No direct access script allowed");

class RegistrarCompras extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Comprar");
		$this->load->model("Proveedor");
		$this->load->model("TmpCompra");
		$this->data = array(
			"id" => "POS",
			"title" => "Compras",
			"scripts" => "<script src='".base_url()."Components/js/comprar.js'></script>"
		);
	}

	function index() {
		$vistas = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "Comprar", "AdminLayout/Footer");
		$this->data["proveedores"] = $this->Proveedor->All();
		$this->views($vistas, $this->data);
	}

	function AgregarItem() {
		if($this->input->post()) {
			$result = $this->TmpCompra->Guardar($this->input->post());
			echo json_encode($result);
		}
	}

	function RemoverTalla() {
		if($this->input->post()) {
			$product_id = $this->input->post("product_id");
			$order_id = $this->input->post("order_id");
			$size = $this->input->post("size");
			$response = $this->TmpCompra->EliminarTalla($product_id, $size, $order_id);

			echo json_encode($response);
		}
	}

	function LimpiarItemsTemporales($pedido) {
		if($pedido != "") {
			$resultado = $this->TmpCompra->Limpiar($pedido);

			echo json_encode($resultado);
		}
	}

	function Registrar() {

	}

	function RemoverItem() {
		if($this->input->post()) {
			echo json_encode($this->TmpCompra->EliminarItem($this->input->post("order_id"), $this->input->post("product_id")));
		}
	}

	function Status($order_id) {
		echo json_encode($this->TmpCompra->Status($order_id));
	}

	function Totalizar($orden){
		if($orden != "") {
			$total = $this->TmpCompra->Items("order_id", $orden);
			$tax = 0;
			$stotal = 0;
			$mnn = 0;
			foreach ($total as $key => $value) {
				$mnn += $value["amn"];
				$tax += ($value["cost_price"] * $value["amn"]) * 0.13;
				$stotal += ($value["cost_price"] * $value["amn"]) - ($value["cost_price"] * $value["amn"]) * 0.13;
			}

			echo json_encode(
				array(
					"amount" => $mnn,
					"tax" => "$ ".round($tax, 2),
					"subtotal" => "$ ".round($stotal, 2),
					"total" => "$ ".round(($tax + $stotal), 2)
				)
			);
		}
	}
}