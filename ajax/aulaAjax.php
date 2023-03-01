<?php 
	$peticionAjax=true;
	require_once "../core/configGeneral.php";

	if (isset($_POST['codigo-reg']) || isset($_POST['codigo-del'])){

		require_once "../controladores/aulaControlador.php";
		$insAu = new aulaControlador();
		if(isset($_POST['codigo-reg']) && isset($_POST['capacidad-reg']) && isset($_POST['optionsEstado'])) {
			echo $insAu->agregar_aula_controlador();
		}

		if(isset($_POST['codigo-del'])){
			echo $insAu->eliminar_aula_controlador();
		}
		
	}else{
		session_start(['name'=>'SGA']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
	}