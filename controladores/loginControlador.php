<?php 

	if ($peticionAjax){
		require_once "../modelos/loginModelo.php";
	}else{
		require_once "./modelos/loginModelo.php";
	}

	class loginControlador extends loginModelo{

		public function iniciar_sesion_controlador(){
			$usuario=mainModel::limpiar_cadena($_POST['usuario']);
			$clave=mainModel::limpiar_cadena($_POST['clave']);


			$clave=mainModel::encryption($clave);

			$datosLogin=[
				"Usuario"=>$usuario,
				"Clave"=>$clave
			];

			$datosCuenta=loginModelo::iniciar_sesion_modelo($datosLogin);

			if ($datosCuenta->rowCount()>=1) {
				$row=$datosCuenta->fetch();

				$hora = new DateTime("now", new DateTimeZone('America/Lima'));

				$fechaActual=$hora->format("Y-m-d");
				$yearActual=$hora->format("Y");
				$horaActual=$hora->format("h:i:s a");

				$consulta1=mainModel::ejecutar_consulta_simple("SELECT ID FROM sg_bitacora");

				$numero=($consulta1->rowCount())+1;

				$codigoB=mainModel::generar_codigo_aleatorio("CB",7,$numero);

				$datosBitacora=[
					"Codigo"=>$codigoB,
					"Fecha"=>$fechaActual,
					"HoraInicio"=>$horaActual,
					"HoraFinal"=>"Sin registro",
					"Tipo"=>$row['CUENTATIPO'],
					"Year"=>$yearActual,
					"Cuenta"=>$row['CUENTACODIGO']
				];

				$insertarBitacora=mainModel::guardar_bitacora($datosBitacora);

				if($insertarBitacora->rowCount()>=1){

					if ($row['CUENTATIPO']=="Administrador") {
						$query1=mainModel::ejecutar_consulta_simple("SELECT * FROM sg_administrador WHERE CUENTACODIGO='".$row['CUENTACODIGO']."'");
					}


					if ($query1->rowCount()==1) {
						 session_start(['name'=>'SGA']);	

						$userData=$query1->fetch();
						if ($row['CUENTATIPO']=="Administrador") {
							$_SESSION['nombre_sga']=$userData['NOMBRES'];
							$_SESSION['apellido_sga']=$userData['APELLIDOS'];
						} else {
							$_SESSION['nombre_sga']=$userData['NOMBRES'];
							$_SESSION['apellido_sga']=$userData['APELLIDOS'];
						}

						$_SESSION['usuario_sga']=$row['CUENTAUSUARIO'];
						$_SESSION['tipo_sga']=$row['CUENTATIPO'];
						$_SESSION['foto_sga']=$row['CUENTAFOTO'];
						$_SESSION['token_sga']=md5(uniqid(mt_rand(),true));
						$_SESSION['codigo_cuenta_sga']=$row['CUENTACODIGO'];
						$_SESSION['codigo_bitacora_sga']=$codigoB;

						if($row['CUENTATIPO']=="Administrador"){
							$url=SERVERURL."home/";
						}
						
						return $urlLocation='<script> window.location="'.$url.'" </script>';
					} else {
						$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No hemos podido iniciar la sesión por problemas técnicos, por favor intente nuevamente",
						"Tipo"=>"error"
						];
						return mainModel::sweet_alert($alerta);
					}
					
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No hemos podido iniciar la sesión por problemas técnicos, por favor intente nuevamente",
						"Tipo"=>"error"
					];
					return mainModel::sweet_alert($alerta);
				}
			} else {
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"El nombre de usuario y contraseña no son correctos o cuenta puede estar deshabilitada",
					"Tipo"=>"error"
				];
				return mainModel::sweet_alert($alerta);
			}	
		}

		public function cerrar_sesion_controlador(){
			 session_start(['name'=>'SGA']); 
			 $token=mainModel::decryption($_GET['Token']);
			 $hora = new DateTime("now", new DateTimeZone('America/Lima'));
			 $hora=$hora->format("h:i:s a");
			 $datos=[
			 	"Usuario"=>$_SESSION['usuario_sga'],
			 	"Token_S"=>$_SESSION['token_sga'],
			 	"Token"=>$token,
			 	"Codigo"=>$_SESSION['codigo_bitacora_sga'],
			 	"Hora"=>$hora
			 ];

			 return loginModelo::cerrar_sesion_modelo($datos);
		}

		public function forzar_cierre_sesion_controlador(){
			session_unset();
			session_destroy();
			$redirect='<script> window.location.href="'.SERVERURL.'login/" </script>';
			return $redirect;
			//return header("Location: ".SERVERURL."login/");
		}
	}