<?php 
	$peticionAjax=true;
	require_once "../core/configGeneral.php";

	if (isset($_POST['codigo-reg']) || isset($_POST['codigo-up']) || isset($_POST['adjunto-del-id']) || isset($_POST['adjunto-up-id']) || isset($_POST['codigo-del'])){

		require_once "../controladores/cursoControlador.php";
		$insCurso = new cursoControlador();
		if(isset($_POST['categoria-reg']) && isset($_POST['codigo-reg']) && isset($_POST['nombre-reg']) && isset($_POST['horas-reg']) && isset($_POST['precio-reg']) && isset($_POST['optionsEstado']) && isset($_POST['sede-reg']) && isset($_POST['optionsPDF']) ){
			echo $insCurso->agregar_curso_controlador();
		}
		if(isset ($_POST['codigo-up']) && isset($_POST['titulo-up'])){
			echo $insCurso->actualizar_curso_controlador();
		}
		if(isset($_POST['adjunto-del-id']) && isset($_POST['adjunto-del-tipo'])){
			echo $insCurso->eliminar_adjunto_curso_controlador();
		}
		if(isset($_POST['adjunto-up-id']) && isset($_POST['adjunto-up-tipo'])){
			echo $insCurso->actualizar_adjunto_curso_controlador();
		}
		if(isset($_POST['codigo-del'])){
			echo $insCurso->eliminar_curso_controlador();
		}		
	}else{
		session_start(['name'=>'SGA']);
		session_destroy();
		echo '<script> window.location.href="'.SERVERURL.'login/" </script>';
	}