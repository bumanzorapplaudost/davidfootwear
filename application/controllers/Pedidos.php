<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Pedidos extends CI_Controller {

	private $data;

	function __construct() {
		parent::__construct();
		$this->load->model("Pedido");
		$this->data = array(
			"id" => "POS",
			"title" => "Pedidos",
			"scripts" => "<script src='".base_url()."Components/js/order.js'></script>"
		);
	}

	function index() {
		$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside", "Pedidos", "AdminLayout/footer");
		$this->views($views, $this->data);
	}

}