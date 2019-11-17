<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function crear_alerta($tipo, $titulo, $texto, $ubicacion = "") {
	$val = "<script>";
	switch ($tipo) {
		case 's':
			$val .= '
				swal({
					type : "success",
					title : "'.$titulo.'",
					text : "'.$texto.'"

				}).then(function(result) {
			        if (result.value) {
			        	window.location = "'.$ubicacion.'";
			        }
			    });
			';
			break;
		case 'e':
			$val .= '
				swal({
					type : "error",
					title : "'.$titulo.'",
					text : "'.$texto.'"

				}).then(function(result) {
			        if (result.value) {
			        	window.location = "'.$ubicacion.'";
			        }
			    });
			';
			break;
		default:
			# code...
			break;
	}
	$val .= "</script>";
	return $val;

}