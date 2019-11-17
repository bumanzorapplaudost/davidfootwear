<?php defined('BASEPATH') OR exit('No direct script access allowed');

class Productos extends CI_Controller {
	
	private $data;

	function __construct() {	
		parent::__construct();
		$this->load->model("Producto");
		$this->load->model("Clasificacion");
		$this->load->model("Marca");
		$this->load->model("Stock");
		$this->data = array(
			"id" => "POS",
			"title" => "Productos",
			"scripts" => "<script src='".base_url()."Components/js/products.js'></script>"
		);
	}

	function index() {
		$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside","Productos", "AdminLayout/footer");
		$this->data["marcas"] = $this->Marca->All();
		$this->data["categorias"] = $this->Clasificacion->All();
		$this->views($views, $this->data);
	}

	function FB($pid) {
		$this->Stock->FillBlanks($pid);
	}

	function Chart() {
		echo "[";
		for ($i=1; $i < 10; $i++) { 
			echo " {y : '20180".$i."', item1 : ".rand(1050,5000)."}";
			if($i < 9) {
				echo ",";
			}
		}
		echo "]";
	}

	function Lista($filtrar = "") {
		if($filtrar == "") {
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
						"'.($key + 1).'",
						"'.$value["code"].'",
						"'.$producto.'",
						"'.$picture.'",
						"'.$tallas.'",
						"$ '.$value["cost_price"].'",
						"'.$value["earning"].' %",
						"$ '.$value["sell_price"].'",
						"<div class=\'btn-group\'><button class=\'btn btn-warning btn-sm btn-edit-product\' data-toggle=\'modal\' data-target=\'#mdlEditProduct\' product='.$value["product_id"].'><i class=\'fa fa-pencil\'></i></button><button class=\'btn btn-danger btn-sm btn-delete-product\' product='.$value["product_id"].'><i class=\'fa fa-times\'></i></button></div>"
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
		}else if($filtrar == "Pedidos") {

		}
	}

	function Crear() {
		if($this->input->post()) {
			$config['upload_path'] = './Components/img/productos';
            $config['allowed_types'] = 'gif|jpg|png';
            $config['max_size'] = 8000;
            $config['max_width'] = 2000;
            $config['max_height'] = 2000;
            $this->load->library('upload', $config);

            if ( ! $this->upload->do_upload('picture')) {
                $this->data['picture_error'] = $this->upload->display_errors();
            }else {
                $result =  $this->upload->data();
                $imageName = date("Ymdhisish").$result["file_ext"];
				rename($result['full_path'],$result['file_path'].$imageName);
				$post = $this->input->post();
				$post["picture"] = $imageName;
				$result = $this->Producto->Guardar($post);
				$this->Stock->FillBlanks($result["id"]);
            }

			$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside","blank", "AdminLayout/footer");
			if($result["status"] == "success") {
				$this->data["alert"] = crear_alerta("s", "Guardado", "Producto Registrado Correctamente", base_url()."Productos");
			}else {
				$this->data["alert"] = crear_alerta("e", "Error", "Producto no pudo ser guardado.", base_url()."Productos");
			}
			$this->views($views, $this->data);
		}
	}

	function Tallas($id) {
		if($id != "") {
			$tallas = $this->Producto->ObtenerTallas($id);

			if(count($tallas) > 0) {
				echo '{ "data" : ['; 
				foreach ($tallas as $key => $value) {
					if($key > 0 && count($tallas) > $key) {
						echo ",";
					}

					echo '
					[
						"Talla '.$value["size"].'",
						"'.$value["qty"].' Pares"
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

	function Editar($id) {
		if($id != "" && !$this->input->post()) {
			echo json_encode($this->Producto->Leer($id));
		}else if($this->input->post() && $id != "") {
			$views = array("AdminLayout/header", "AdminLayout/navbar", "AdminLayout/aside","blank", "AdminLayout/footer");
			$result = $this->Producto->Actualizar($id, $this->input->post());
			if($result["status"] == "success") {
				$this->data["alert"] = crear_alerta("s", "Actualizado", "Producto actualizado con éxito!", base_url()."Productos");
			}else {
				$this->data["alert"] = crear_alerta("e", "Error", "Producto no pudo ser actualizado", base_url()."Productos");
			}
			$this->views($views, $this->data);
		}
	}

	function Eliminar($id) {
		$stock = $this->Stock->AvailableStock($id);
		if($stock["amount"] > 0) {
			$result = array("status" => "existing");
		}else {
			$result = $this->Producto->Eliminar($id);
		}

		echo json_encode($result);
	}
}
