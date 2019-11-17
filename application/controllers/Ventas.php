<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Ventas extends CI_Controller {

	private $data;

	function __construct() {
		parent::__construct();
		$this->data = array(
			"id" => "POS",
			"title" => "Ventas",
			"scripts" => "");
	}

	function index() {
		$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "Ventas", "AdminLayout/footer");
		$this->views($views, $this->data);
	}

}