<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Traslado extends CI_Model {

	function __construct() {
		$this->table = "transfer";
		parent::__construct($this->table);
	}

}