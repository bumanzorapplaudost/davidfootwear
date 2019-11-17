<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Traslados extends CI_Controller {

	private $data;

	function __construct() {
		parent::__construct();
		$this->data = array(
			"id" => "POS", 
			"title" => "Traslados", 
			"scripts" => "");
	}

	function index() {
		$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
		$this->views($views, $this->data);
	}

	function Lista() {

	}

	function Crear() {

	}

	function Editar($id = NULL) {

	}

	function Eliminar() {
		
	}

}