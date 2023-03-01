<?php 
	session_start(['name'=>'SGA']);
	$peticionAjax=true;
	require_once "../core/configGeneral.php";

	if (isset($_POST)){


		//Modulo estudiantes
		if (isset($_POST['busqueda_inicial_estudiante'])) {
			$_SESSION['busqueda_estudiante']=$_POST['busqueda_inicial_estudiante'];
		}


		if (isset($_POST['eliminar_busqueda_estudiante'])) {
			unset($_SESSION['busqueda_estudiante']);
			$url="estudiantesearch";
		}


		if (isset($url)) {
			echo '<script> window.location.href="'.SERVERURL.$url.'/" </script>';
		} else {
			echo '<script> location.reload(); </script>';
		}
		
		
	}else{
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
	}
	