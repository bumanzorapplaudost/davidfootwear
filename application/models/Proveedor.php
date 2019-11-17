<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Proveedor extends CI_Model {

	function __construct() {
		$this->table = "provider";
		parent::__construct($this->table);
	}

}