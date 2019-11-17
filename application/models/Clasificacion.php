<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clasificacion extends CI_Model {

	function __construct() {
		$this->table = "category";
		parent::__construct("category");
	}

}