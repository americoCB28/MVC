<?php  
	require_once "./core/configGeneral.php";
	require_once "./controladores/adminControlador.php";

	$plantilla = new adminControlador();
	$plantilla->obtener_plantilla_controlador();
	