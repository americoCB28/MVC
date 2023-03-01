<?php 
	$peticionAjax=true;
	require_once "../core/configGeneral.php";

	if (isset($_POST['codigo-reg']) || isset($_POST['codigo-del'])){

		require_once "../controladores/categoriaControlador.php";
		$insCa = new categoriaControlador();
		if(isset($_POST['codigo-reg']) && isset($_POST['nombre-reg'])) {
			echo $insCa->agregar_categoria_controlador();
		}
		
		if(isset($_POST['codigo-del'])){
			echo $insCa->eliminar_categoria_controlador();
		}

	}else{
		session_start(['name'=>'SGA']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
	}