<?php 
	$peticionAjax=true;
	require_once "../core/configGeneral.php";

	if (isset($_POST['dni-reg']) || isset($_POST['codigo-del'])){

		require_once "../controladores/personalControlador.php";
		$insPe = new personalControlador();
		if(isset($_POST['dni-reg']) && isset($_POST['nombre-reg']) && isset($_POST['apellido-reg'])  && isset($_POST['direccion-reg'])  && isset($_POST['email-reg'])  && isset($_POST['telefono-reg']) && isset($_POST['cargo-reg']) && isset($_POST['optionsGenero'])) {
			echo $insPe->agregar_personal_controlador();
		}

		if(isset($_POST['codigo-del'])){
			echo $insPe->eliminar_personal_controlador();
		}
		
	}else{
		session_start(['name'=>'SGA']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
	}