<?php 
	if ($peticionAjax){
		require_once "../core/configAPP.php";
	}else{
		require_once "./core/configAPP.php";
	}
	class mainModel{

		protected function conectar(){
			$enlace = new PDO(SGBD,USER,PASS);
			return $enlace; 
		}

		protected function ejecutar_consulta_simple($consulta){
			$respuesta=self::conectar()->prepare($consulta);
			$respuesta->execute();
			return $respuesta;
		}

		protected function agregar_cuenta($datos){
			$sql=self::conectar()->prepare("INSERT INTO sg_cuenta(CUENTACODIGO,CUENTAUSUARIO,CUENTACLAVE,CUENTAEMAIL,CUENTAESTADO,CUENTATIPO,CUENTAGENERO,CUENTAFOTO) VALUES (:Codigo,:Usuario,:Clave,:Email,:Estado,:Tipo,:Genero,:Foto)");
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":Usuario",$datos['Usuario']);
			$sql->bindParam(":Clave",$datos['Clave']);
			$sql->bindParam(":Email",$datos['Email']);
			$sql->bindParam(":Estado",$datos['Estado']);
			$sql->bindParam(":Tipo",$datos['Tipo']);
			$sql->bindParam(":Genero",$datos['Genero']);
			$sql->bindParam(":Foto",$datos['Foto']);
			$sql->execute();
			return $sql;
		}

		protected function eliminar_cuenta($codigo){
			$sql=self::conectar()->prepare("DELETE FROM sg_cuenta WHERE CUENTACODIGO=:Codigo");
			$sql->bindParam(":Codigo",$codigo);
			$sql->execute();
			return $sql;
		}

		protected function datos_cuenta($codigo,$tipo){
			$query=self::conectar()->prepare("SELECT * FROM sg_cuenta WHERE CUENTACODIGO=:Codigo AND CUENTATIPO=:Tipo");
			$query->bindParam(":Codigo",$codigo);
			$query->bindParam(":Tipo",$tipo);
			$query->execute();
			return $query;
		}

		protected function actualizar_cuenta($datos){
			$query=self::conectar()->prepare("UPDATE sg_cuenta SET CUENTAUSUARIO=:Usuario,CUENTACLAVE=:Clave,CUENTAEMAIL=:Email,CUENTAESTADO=:Estado,CUENTAGENERO=:Genero,CUENTAFOTO=:Foto WHERE CUENTACODIGO=:Codigo");
			$query->bindParam(":Usuario",$datos['CUENTAUSUARIO']);
			$query->bindParam(":Clave",$datos['CUENTACLAVE']);
			$query->bindParam(":Email",$datos['CUENTAEMAIL']);
			$query->bindParam(":Estado",$datos['CUENTAESTADO']);
			$query->bindParam(":Genero",$datos['CUENTAGENERO']);
			$query->bindParam(":Foto",$datos['CUENTAFOTO']);
			$query->bindParam(":Codigo",$datos['CUENTACODIGO']);
			$query->execute();
			return $query;
		}

		protected function guardar_bitacora($datos){
			$sql=self::conectar()->prepare("INSERT sg_bitacora(BITACORACODIGO,BITACORAFECHA,BITACORAHORAINICIO,BITACORAHORAFINAL,BITACORATIPO,BITACORAYEAR,CUENTACODIGO) VALUES(:Codigo,:Fecha,:HoraInicio,:HoraFinal,:Tipo,:Year,:Cuenta)");
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->bindParam(":Fecha",$datos['Fecha']);
			$sql->bindParam(":HoraInicio",$datos['HoraInicio']);
			$sql->bindParam(":HoraFinal",$datos['HoraFinal']);
			$sql->bindParam(":Tipo",$datos['Tipo']);
			$sql->bindParam(":Year",$datos['Year']);
			$sql->bindParam(":Cuenta",$datos['Cuenta']);
			$sql->execute();
			return $sql;
		}

		protected function actualizar_bitacora($codigo,$hora){
			$sql=self::conectar()->prepare("UPDATE sg_bitacora SET BITACORAHORAFINAL=:Hora WHERE BITACORACODIGO=:Codigo");
			$sql->bindParam(":Hora",$hora);
			$sql->bindParam(":Codigo",$codigo);
			$sql->execute();
			return $sql;
		}

		protected function eliminar_bitacora($codigo){
			$sql=self::conectar()->prepare("DELETE FROM sg_bitacora WHERE CUENTACODIGO=:Codigo");
			$sql->bindParam(":Codigo",$codigo);
			$sql->execute();
			return $sql;
		}

		public function encryption($string){
			$output=FALSE;
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_encrypt($string, METHOD, $key, 0, $iv);
			$output=base64_encode($output);
			return $output;
		}

		protected function decryption($string){
			$key=hash('sha256', SECRET_KEY);
			$iv=substr(hash('sha256', SECRET_IV), 0, 16);
			$output=openssl_decrypt(base64_decode($string), METHOD, $key, 0, $iv);
			return $output;
		}

		protected function generar_codigo_aleatorio($letra,$longitud,$num){
			for ($i=1; $i<=$longitud; $i++){
				$numero = rand(0,9);
				$letra.=$numero; 
			}
			return $letra.$num;
		}

		protected function limpiar_cadena($cadena){
			$cadena=trim($cadena);
			$cadena=stripslashes($cadena);
			$cadena=str_ireplace("<script>", "", $cadena);
			$cadena=str_ireplace("</script scr", "", $cadena);
			$cadena=str_ireplace("<script type=", "", $cadena);
			$cadena=str_ireplace("SELECT * FROM", "", $cadena);
			$cadena=str_ireplace("DELETE FROM", "", $cadena);
			$cadena=str_ireplace("INSERT INTO", "", $cadena);
			$cadena=str_ireplace("UPDATE SET", "", $cadena);
			$cadena=str_ireplace("--", "", $cadena);
			$cadena=str_ireplace("^", "", $cadena);
			$cadena=str_ireplace("[", "", $cadena);
			$cadena=str_ireplace("]", "", $cadena);
			$cadena=str_ireplace("==", "", $cadena);
			$cadena=str_ireplace(";", "", $cadena);
			return $cadena;
		}

		protected function sweet_alert($datos){
			if ($datos['Alerta']=="simple") {
				$alerta="
				 <script>
					 swal(
					  '".$datos['Titulo']."',
					  '".$datos['Texto']."',
					  '".$datos['Tipo']."'
					);
				 </script>
				";
			} elseif($datos['Alerta']=="recargar"){
				$alerta="
				 	<script>
					 	swal({
						  title: '".$datos['Titulo']."',
						  text: '".$datos['Texto']."',
						  type: '".$datos['Tipo']."',
						  confirmButtonText: 'Aceptar'
						}).then(function () {
						 	location.reload();
						});
				 	</script>
				";
			}elseif ($datos['Alerta']=="limpiar") {
				$alerta="
				 	<script>
					 	swal({
						  title: '".$datos['Titulo']."',
						  text: '".$datos['Texto']."',
						  type: '".$datos['Tipo']."',
						  confirmButtonText: 'Aceptar'
						}).then(function () {
						 	$('.FormularioAjax')[0].reset();
						});
				 	</script>
				";
			}
			return $alerta;
		}
	}