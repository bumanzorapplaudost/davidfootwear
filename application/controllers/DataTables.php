<?php defined("BASEPATH") OR exit("No direct access script allowed");

class DataTables extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model("Producto");
		$this->load->model("TmpCompra");
		$this->load->model("Clasificacion");
		$this->load->model("Marca");
		$this->load->model("Stock");
	}

	function index() {
		echo "";
	}

	function ProductosCompras() {
		$lista = $this->Producto->All();
		if(count($lista) > 0) {
			echo '{ "data" : [';
			foreach ($lista as $key => $value) {
			if($key > 0 && count($lista) > $key) {
				echo ",";
			}

			$categoria = $this->Clasificacion->Leer($value["category_id"]);
			$marca = $this->Marca->Leer($value["brand_id"]);

			switch ($value["gender"]) {
				case 'M':
					$gender = "Masculino";
					break;
				case 'F':
					$gender = "Femenino";
					break;
				case 'B':
					$gender = "Niños";
					break;
				case 'G':
					$gender = "Niñas";
					break;
				
				default:
					# code...
					break;
			}

			$producto = strtoupper($categoria["category"]." ".$marca["brand"]." ".$gender." ". $value["color"]);
			if($value["picture"] != "") {
				$picture = '<a href=\'#\' data-toggle=\'modal\' image=\''.base_url().'Components/img/productos/'.$value['picture'].'\' id=\'increaseps\' data-target=\'#mdlReadPicture\'><img src=\''.base_url().'Components/img/productos/'.$value['picture'].'\' alt=\'Foto\' class=\'img-thumbnail\' style=\'width: 40px;\'></a>';
			}else {
				$picture = '<a href=\'#\' data-toggle=\'modal\' image=\''.base_url().'Components/img/productos/default/anonymous.png\' id=\'increaseps\' data-target=\'#mdlReadPicture\'><img src=\''.base_url().'Components/img/productos/default/anonymous.png\' alt=\'Foto\' class=\'img-thumbnail\' style=\'width: 40px;\'></a>';
			}

			$tallas = '<button data-toggle=\'modal\' data-target=\'#mdlSizes\' product=\''.$value['product_id'].'\' class=\'btn btn-default btn-tallas\'><i class=\'fa fa-eye\'></i>';

			echo '
				[
					"'.$value["code"].'",
					"'.$producto.'",
					"$ '.$value["cost_price"].'",
					"'.$value["earning"].' %",
					"$ '.$value["sell_price"].'",
					"<div class=\'btn-group\'><button class=\'btn btn-info btn-sm btn-check\' product=\''.$value["product_id"].'\'><i class=\'fa fa-check\'></i></button></div>"
				]
			';
		}
			echo "]
			}";
		}else {
			echo '{
				"data" : []
			}';
		}
	}

	function ListaItemsCompras($order) {
		$lista = $this->TmpCompra->Items("order_id", $order);
		echo var_dump($lista);
	}

	function ListaItemsCompra($order) {
		$lista = $this->TmpCompra->Items("order_id", $order);
		if(count($lista) > 0) {
			echo '{ "data" : [';
			foreach ($lista as $key => $value) {
			if($key > 0 && count($lista) > $key) {
				echo ",";
			}

			$categoria = $this->Clasificacion->Leer($value["category_id"]);
			$marca = $this->Marca->Leer($value["brand_id"]);

			switch ($value["gender"]) {
				case 'M':
					$gender = "Masculino";
					break;
				case 'F':
					$gender = "Femenino";
					break;
				case 'B':
					$gender = "Niños";
					break;
				case 'G':
					$gender = "Niñas";
					break;
				
				default:
					# code...
					break;
			}

			$producto = strtoupper($categoria["category"]." ".$marca["brand"]." ".$gender." ". $value["color"]);

			echo '
				[	
					"<input type=\'number\' readonly class=\' amnt\' value=\''.$value["amn"].'\' style=\'background-color: #fafafa;border: solid 1px #ccc;margin: 0px; padding: 0px 0px; width: 45px; text-align: right\'>",
					"'.$value["code"].'",
					"'.$producto.'",
					"$ '.$value["cost_price"].'",
					"$ '.(round($value["cost_price"] * $value["amn"],2)).'",
					"<div class=\'btn-group\'><button class=\'btn btn-sm btn-info btn-mostrar-tallas-c\' data-toggle=\'modal\' data-target=\'#mdlDetalleTallas\' product=\''.$value["product_id"].'\' style=\'margin: 0px\'><i class=\'fa fa-eye\'></i></button><button class=\'btn btn-sm btn-danger btn-eliminar-item-c\' style=\'margin: 0px\' product=\''.$value["product_id"].'\'><i class=\'fa fa-times\'></i></button></div>"
				]
			';
		}
			echo "]
			}";
		}else {
			echo '{
				"data" : []
			}';
		}
	}

	function DetTallas($product, $order) {
		if($product != "") {
			$tallas = $this->TmpCompra->Tallas($product, $order);

			if(count($tallas) > 0) {
				echo '{ "data" : [';
				foreach($tallas as $key => $value) {
					if($key > 0 && count($tallas) > $key) {
						echo ",";
					}

				echo '
					[	
						"Talla '.$value["size"].'",
						"'.$value["amount"].' Pares",
						"<button class=\'btn btn-sm btn-warning quitar-tallas\' producto=\''.$value['product_id'].'\' talla=\''.$value['size'].'\'><i class=\'fa fa-times\'></i></button>"
					]
				';

				}
				echo "]
			}";
			}else {
				echo '{
					"data" : []
				}';
			}

		}
	}
}
?>