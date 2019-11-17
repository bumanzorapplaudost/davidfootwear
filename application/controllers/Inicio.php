<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Inicio extends CI_Controller {

	private $data;

	function __construct() {
		parent::__construct();
		$this->models(array("Clasificacion", "Cliente", "Producto"));
		$this->data = array(
			"id" => "POS", 
			"title" => "Inicio", 
			"scripts" => "<script src='".base_url()."Components/js/categories.js'></script>");
	}

	function index() {
		$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "Inicio", "AdminLayout/footer");

		$this->views($views, $this->data);
	}
}