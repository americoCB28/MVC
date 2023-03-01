<?php 
	$peticionAjax=true;
	require_once "../core/configGeneral.php";

	if (isset($_POST['dni-reg']) || isset($_POST['codigo-del']) || isset($_POST['cuenta-up'])){

		require_once "../controladores/administradorControlador.php";
		$insAdmin = new administradorControlador();
		
		if (isset($_POST['dni-reg']) && isset($_POST['nombre-reg']) && isset($_POST['apellido-reg']) && isset($_POST['usuario-reg']) && isset($_POST['contra1-reg']) && isset($_POST['contra2-reg']) && isset($_POST['email-reg']) && isset($_POST['optionsGenero'])){
			echo $insAdmin->agregar_administrador_controlador();
		}

		if(isset($_POST['codigo-del'])){
			echo $insAdmin->eliminar_administrador_controlador();
		}

		if (isset($_POST['cuenta-up']) && isset($_POST['dni-up']) && isset($_POST['nombre-up']) && isset($_POST['apellido-up'])) {
			echo $insAdmin->actualizar_administrador_controlador();
		}
		
	}else{
		session_start(['name'=>'SGA']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
	}
	