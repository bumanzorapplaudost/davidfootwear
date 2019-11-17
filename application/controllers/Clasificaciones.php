<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Clasificaciones extends CI_Controller {

	public $data;

	function __construct() {
		parent::__construct();
		$this->load->model('Clasificacion');
		$this->data = array("id" => "POS", "title" => "Clasificacion", "scripts" => "<script src='".base_url()."Components/js/categories.js'></script>");
	}

	function index() {
		$views = array('AdminLayout/header', 'AdminLayout/navbar', 'AdminLayout/aside', 'Clasificaciones', 'AdminLayout/footer');
		$this->views($views, $this->data);
	}

	function Eliminar($id = NULL) {
		$views = array('AdminLayout/header', 'AdminLayout/navbar', 'AdminLayout/aside', 'blank');
		$this->views($views, $this->data);

		if($id != NULL ) {
			$result = $this->Clasificacion->Eliminar($id);
			if($result["status"] == "success" && $result["rows"] > 0) {
				$this->data["alert"] = crear_alerta("s", "", "Categoría eliminada", base_url()."Clasificaciones");
			}else {
				$this->data["alert"] = crear_alerta("e", "", "Categoría no fue eliminada, no se encontró registro con ID ".$id, base_url()."Clasificaciones");
			}
				$this->load->view('AdminLayout/footer', $this->data);
		}
	}

	function Editar($id = NULL) {
		if($id != NULL && !$this->input->post()) {
			echo json_encode($this->Clasificacion->Leer($id));
		}

		if($this->input->post()) {
			$views = array('AdminLayout/header', 'AdminLayout/navbar', 'AdminLayout/aside', 'blank', 'AdminLayout/footer');
			$result = $this->Clasificacion->Actualizar($id, $this->input->post());
			if($result["status"] == "success") {
				$this->data["alert"] = crear_alerta("s", "Actualizado", "Clasificacion fue actualizada exitosamente!", base_url()."Clasificaciones");
			}else {
				$this->data["alert"] = crear_alerta("s", "Error", "Error al actualizar.", base_url()."Clasificaciones");
			}
			$this->views($views, $this->data);
		}
	}

	function Crear() {
		if($this->input->post()) {
			$result = $this->Clasificacion->Guardar($this->input->post());
			if($result["status"] == "success") {
				$views = array('AdminLayout/header', 'AdminLayout/navbar', 'AdminLayout/aside', 'blank');
				$this->views($views, $this->data);

				if($result["status"] == "success") {
					$this->data["alert"] = crear_alerta("s", "", "Categoría Registrada", base_url()."Clasificaciones");
				}else {
					$this->data["alert"] = crear_alerta("e", "", "Clasificacion no fue registrada", base_url()."Clasificaciones");
				}
					$this->load->view('AdminLayout/footer', $this->data);
			}
		}else {
			$views = array('AdminLayout/header', 'AdminLayout/navbar', 'AdminLayout/aside', 'Clasificaciones', 'AdminLayout/footer');
			$this->views($views, $this->data);
		}
	}

	function Lista() {
		$result = $this->Clasificacion->All();
		if(count($result) > 0 ) {
			echo '{ "data" : [';
			foreach ($result as $key => $value) {
				if($key > 0 && count($result) > $key) {
					echo ",";
				}
				echo '
					[
						"'.($key + 1).'",
						"'.$value["category"].'",
						"'.$value["date_recorded"].'",
						"<div class=\'btn-group\'><button class=\'btn btn-warning btn-sm btn-edit-category\' data-toggle=\'modal\' data-target=\'#mdlEditCategory\' category=\''.$value["category_id"].'\'><i class=\'fa fa-pencil\'></i></button><button class=\'btn btn-danger btn-sm btn-delete-category\' category=\''.$value["category_id"].'\'><i class=\'fa fa-times\'></i></button></div>"
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
}