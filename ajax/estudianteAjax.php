<?php 
	$peticionAjax=true;
	require_once "../core/configGeneral.php";

	if (isset($_POST['dni-reg']) || isset($_POST['codigo-del'])){

		require_once "../controladores/estudianteControlador.php";
		$insEs = new estudianteControlador();
		if(isset($_POST['dni-reg']) && isset($_POST['nombre-reg']) && isset($_POST['apellido-reg'])  && isset($_POST['direccion-reg'])  && isset($_POST['email-reg'])  && isset($_POST['telefono-reg']) && isset($_POST['optionsGenero'])) {
			echo $insEs->agregar_estudiante_controlador();
		}

		if(isset($_POST['codigo-del'])){
			echo $insEs->eliminar_estudiante_controlador();
		}		
		
	}else{
		session_start(['name'=>'SGA']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
	}