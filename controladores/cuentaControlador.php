<?php 
	if ($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class cuentaControlador extends mainModel{

		public function datos_cuenta_controlador($codigo,$tipo){
			$codigo=mainModel::decryption($codigo);
			$tipo=mainModel::limpiar_cadena($tipo);

			if ($tipo="admin") {
				$tipo="Administrador";
			} else {
				$tipo="Estudiante";
			}
			
			return mainModel::datos_cuenta($codigo,$tipo);
		}

		public function actualizar_cuenta_controlador(){
			$cuentaCodigo=mainModel::decryption($_POST['codigoCuenta-up']);
			$cuentaTipo=mainModel::decryption($_POST['tipoCuenta-up']);

			$query1=mainModel::ejecutar_consulta_simple("SELECT * FROM sg_cuenta WHERE CUENTACODIGO='$cuentaCodigo'");
			$datosCuenta=$query1->fetch();

			$user=mainModel::limpiar_cadena($_POST['user-log']);
			$password=mainModel::limpiar_cadena($_POST['password-log']);
			$password=mainModel::encryption($password);

			if($user!="" && $password!=""){
				if(isset($_POST['privilegio-up'])){
					$login=mainModel::ejecutar_consulta_simple("SELECT ID FROM sg_cuenta WHERE CUENTAUSUARIO='$user' AND CUENTACLAVE='$password'");
				}else{
					$login=mainModel::ejecutar_consulta_simple("SELECT ID FROM sg_cuenta WHERE CUENTAUSUARIO='$user' AND CUENTACLAVE='$password' AND CUENTACODIGO='$cuentaCodigo'");
				}

				if($login->rowCount()==0){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El nombre de usuario y clave que acaba de ingresar no coinciden con los datos de su cuenta",
						"Tipo"=>"error"
					];
					return mainModel::sweet_alert($alerta);
					exit();
				}
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"Para actualizar los datos de la cuenta es necesario ingresar el nombre de usuario y contraseña, por favor ingrese los datos e intente nuevamente",
					"Tipo"=>"error"
				];
				return mainModel::sweet_alert($alerta);
				exit();
			}

			//Verificar usuario
			$cuentaUsuario=mainModel::limpiar_cadena($_POST['usuario-up']);
			if ($cuentaUsuario!=$datosCuenta['CUENTAUSUARIO']){
				$query2=mainModel::ejecutar_consulta_simple("SELECT CUENTAUSUARIO FROM sg_cuenta WHERE CUENTAUSUARIO='$cuentaUsuario'");
				if($query2->rowCount()>=1){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El nombre de usuario que acaba de ingresar ya se encuentra registrado en el sistema",
						"Tipo"=>"error"
					];
					return mainModel::sweet_alert($alerta);
					exit();
				}
			}


			//Verificar Email
			$cuentaEmail=mainModel::limpiar_cadena($_POST['email-up']);
			if ($cuentaEmail!=$datosCuenta['CUENTAEMAIL']){
				$query3=mainModel::ejecutar_consulta_simple("SELECT CUENTAEMAIL FROM sg_cuenta WHERE CUENTAEMAIL='$cuentaEmail'");
				if($query3->rowCount()>=1){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El Email que acaba de ingresar ya se encuentra registrado en el sistema",
						"Tipo"=>"error"
					];
					return mainModel::sweet_alert($alerta);
					exit();
				}
			}

			//Verificar Genero
			$cuentaGenero=mainModel::limpiar_cadena($_POST['optionsGenero-up']);
			if (isset($_POST['optionsEstado-up'])){
				$cuentaEstado=mainModel::limpiar_cadena($_POST['optionsEstado-up']);
			}else{
				$cuentaEstado=$datosCuenta['CUENTAESTADO'];
			}

			if($cuentaTipo=="admin"){
				if ($cuentaGenero=="Masculino") {
					$cuentaFoto="AdminMaleAvatar.png";
				} else {
					$cuentaFoto="StudetFemaleAvatar.png";
				}
			}else{
				if ($cuentaGenero=="Masculino") {
					$cuentaFoto="TeacherMaleAvatar.png";
				} else {
					$cuentaFoto="AdminFemaleAvatar.png";
				}
			}
			

			//Verificar cambio de clave
			$passwordN1=mainModel::limpiar_cadena($_POST['newPassword1-up']);
			$passwordN2=mainModel::limpiar_cadena($_POST['newPassword2-up']);
			if($passwordN1!="" || $passwordN2!=""){
				if ($passwordN1==$passwordN2) {
					$cuentaClave=mainModel::encryption($passwordN1);
				} else {
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Las nuevas contraseñas no coinciden, por favor verifique los datos e intente nuevamente",
						"Tipo"=>"error"
					];
					return mainModel::sweet_alert($alerta);
					exit();		
				}	
			}else{
				$cuentaClave=$datosCuenta['CUENTACLAVE'];
			}
			
			//Envio de datos al modelo
			$datosUpdate=[
				"CUENTACODIGO"=>$cuentaCodigo,
				"CUENTAUSUARIO"=>$cuentaUsuario,
				"CUENTACLAVE"=>$cuentaClave,
				"CUENTAEMAIL"=>$cuentaEmail,
				"CUENTAESTADO"=>$cuentaEstado,
				"CUENTAGENERO"=>$cuentaGenero,
				"CUENTAFOTO"=>$cuentaFoto
			];

			if (mainModel::actualizar_cuenta($datosUpdate)){
				if (!isset($_POST['privilegio-up'])) {
					session_start(['name'=>'SGA']);
					$_SESSION['usuario_sga']=$cuentaUsuario;
					$_SESSION['foto_sga']=$cuentaFoto;
				}

				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Cuenta actualizada",
					"Texto"=>"Los datos de la cuenta han sido actualizados con éxito",
					"Tipo"=>"success"
				];
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"Lo sentimos no hemos podido actualizar los datos de la cuenta",
					"Tipo"=>"error"
				];
			}
			return mainModel::sweet_alert($alerta);

		}
	}