<?php 
	$peticionAjax=true;
	require_once "../core/configGeneral.php";

	if (isset($_POST['codigoCuenta-up'])){

		require_once "../controladores/cuentaControlador.php";
		$cuenta = new cuentaControlador();

		if (isset($_POST['codigoCuenta-up']) && isset($_POST['tipoCuenta-up']) && isset($_POST['user-log']) && isset($_POST['password-log'])){
			echo $cuenta->actualizar_cuenta_controlador();
		}
		
	}else{
		session_start(['name'=>'SGA']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
	}