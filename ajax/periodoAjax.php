<?php 
	$peticionAjax=true;
	require_once "../core/configGeneral.php";

	if (isset($_POST['codigo-reg']) || isset($_POST['codigo-del'])){

		require_once "../controladores/periodoControlador.php";
		$insPe = new periodoControlador();
		if(isset($_POST['codigo-reg']) && isset($_POST['fechainicio-reg']) && isset($_POST['fechafin-reg'])  && isset($_POST['optionsEstado'])) {
			echo $insPe->agregar_periodo_controlador();
		}

		if(isset($_POST['codigo-del'])){
			echo $insPe->eliminar_periodo_controlador();
		}
		
	}else{
		session_start(['name'=>'SGA']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
	}
