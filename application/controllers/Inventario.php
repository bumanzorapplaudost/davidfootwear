<?php defined('BASEPATH') OR exit("No direct access script allowed");

class Inventario extends CI_Controller {

	private $data;

	function __construct() {
		parent::__construct();
		$this->data = array(
			"id" => "POS",
			"title" => "Inventario", 
			"scripts" => ""
 		);
	}

	function index() {
		$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "blank", "AdminLayout/footer");
		$this->views($views, $this->data);
	}

}