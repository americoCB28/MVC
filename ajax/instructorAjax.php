<?php 
	$peticionAjax=true;
	require_once "../core/configGeneral.php";

	if (isset($_POST['dni-reg']) || isset($_POST['codigo-del'])){

		require_once "../controladores/instructorControlador.php";
		$insIn = new instructorControlador();
		if(isset($_POST['dni-reg']) && isset($_POST['nombre-reg']) && isset($_POST['apellido-reg'])  && isset($_POST['direccion-reg'])  && isset($_POST['email-reg'])  && isset($_POST['telefono-reg']) && isset($_POST['especialidad-reg']) && isset($_POST['optionsGenero'])) {
			echo $insIn->agregar_instructor_controlador();
		}

		if(isset($_POST['codigo-del'])){
			echo $insIn->eliminar_instructor_controlador();
		}
		
	}else{
		session_start(['name'=>'SGA']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
	}