<?php 
	$peticionAjax=true;
	require_once "../core/configGeneral.php";

	if (isset($_POST['codigo-reg']) || isset($_POST['codigo-del']) || isset($_POST['codigo'])){

		require_once "../controladores/sedeControlador.php";
		$insSe = new sedeControlador();

		if(isset($_POST['codigo-reg']) && isset($_POST['nombre-reg']) && isset($_POST['direccion-reg']) && isset($_POST['responsable-reg']) && isset($_POST['telefono-reg']) && isset($_POST['anio-reg'])) {
			echo $insSe->agregar_sede_controlador();
		}

		if(isset($_POST['codigo-del'])){
			echo $insSe->eliminar_sede_controlador();
		}

		if (isset($_POST['codigo']) && isset($_POST['codigo-up']) && isset($_POST['nombre-up']) && isset($_POST['direccion-up']) && isset($_POST['responsable-up']) && isset($_POST['telefono-up']) && isset($_POST['anio-up'])){
			echo $insSe->actualizar_sede_controlador();
		}

		
	}else{
		session_start(['name'=>'SGA']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
	}