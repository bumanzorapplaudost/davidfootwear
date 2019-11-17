<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Marcas extends CI_Controller {

	public $data;

	function __construct() {
		parent::__construct();
		$this->load->model("Marca");
		$this->data = array(
			"id" => "POS", 
			"title" => "Marcas", 
			"scripts" => "<script src='".base_url()."Components/js/brands.js'></script>");
	}

	function index() {	
		$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside");
		$this->views($views, $this->data);
		$this->views(array("Marcas", "AdminLayout/footer"), $this->data);
	}

	function Cuenta() {
		echo $this->Marca->Count();
	}

	function Editar($id = NULL) {
		if($id != NULL) {
			if(!$this->input->post()) {
				$marca = $this->Marca->Leer($id);
				echo json_encode($marca);
			}else {
				$result = $this->Marca->Actualizar($id, $this->input->post());
				$views = array('AdminLayout/header', 'AdminLayout/navbar', 'AdminLayout/aside', 'blank', "AdminLayout/footer");
				if($result["status"] == "success") {
					$this->data["alert"] = crear_alerta("s", "Actualizada", "La marca ha sido actualizada con éxito",base_url()."Marcas");
				}else {
					$this->data["alert"] = crear_alerta("e", "Error", "La marca no pudo ser actualizada, consulte el Log para mas Informacion",base_url()."Marcas");
				}
				$this->views($views, $this->data);	
			}
		}
	}

	function Crear() {
		if($this->input->post()) {
			$result = $this->Marca->Guardar($this->input->post());
			if($result["status"] == "success") {
				$views = array('AdminLayout/header', 'AdminLayout/navbar', 'AdminLayout/aside', 'blank', "AdminLayout/footer");
				if($result["status"] == "success") {
					$this->data["alert"] = crear_alerta("s", "Guardado", "Marca Registrada con exito", base_url()."Marcas");
				}else {
					$this->data["alert"] = crear_alerta("e", "Error!", "Marca no pudo ser registrada registrada", base_url()."Marcas");
				}
				$this->views($views, $this->data);
			}
		}else {
			$views = array('AdminLayout/header', 'AdminLayout/navbar', 'AdminLayout/aside', 'Marcas', 'AdminLayout/footer');
			$this->views($views, $this->data);
		}
	}

	function Lista() {
		$marcas = $this->Marca->All();
		if(count($marcas) > 0 ) {
			echo '{ "data" : [';
			foreach ($marcas as $key => $value) {
				if($key > 0 && count($marcas) > $key) {
					echo ",";
				}
				echo '
					[
						"'.($key + 1).'",
						"'.$value["brand"].'",
						"'.$value["date_recorded"].'",
						"<div class=\'btn-group\'><button class=\'btn btn-warning btn-sm btn-edit-brand\' data-toggle=\'modal\' data-target=\'#mdlEditBrand\' brand='.$value["brand_id"].'><i class=\'fa fa-pencil\'></i></button><button class=\'btn btn-danger btn-sm btn-delete-brand\' brand='.$value["brand_id"].'><i class=\'fa fa-times\'></i></button></div>"
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
		if($id != NULL) {
			if(count($this->Marca->ConsultarProducto($id)) > 0) {
				$this->data["alert"] = crear_alerta("e", "Error", "La marca posee productos asignados. No se puede eliminar!", base_url()."Marcas");
					$views = array('AdminLayout/header', 'AdminLayout/navbar', 'AdminLayout/aside', 'blank', 'AdminLayout/footer');
					$this->views($views, $this->data);
			}else {	
				$result = $this->Marca->Eliminar($id);
				if($result["status"] == "success") {
					$this->data["alert"] = crear_alerta("s", "Marca Eliminada", "La marca ha sido eliminada con exito", base_url()."Marcas");
					$views = array('AdminLayout/header', 'AdminLayout/navbar', 'AdminLayout/aside', 'blank', 'AdminLayout/footer');
					$this->views($views, $this->data);
				}else {
					echo var_dump($result);
				}
			}
		}
	}
}