<?php 
	require_once "./modelos/adminModelo.php";
	class adminControlador extends adminModelo{

		public function obtener_plantilla_controlador(){
			return require_once "./vistas/plantilla.php";
		}

		public function obtener_admin_controlador(){
			if(isset($_GET['views'])){
				$ruta=explode("/", $_GET['views']);
				$respuesta=adminModelo::obtener_admin_modelo($ruta[0]);
			}else{
				$respuesta="login";
			}
			return $respuesta;
		}
	}