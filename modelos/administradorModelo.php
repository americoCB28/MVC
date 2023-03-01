<?php 
	if ($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class administradorModelo extends mainModel{

		protected function agregar_administrador_modelo($datos){
			$sql=mainModel::conectar()->prepare("INSERT INTO sg_administrador(DNI,NOMBRES,APELLIDOS,CUENTACODIGO) VALUES (:DNI,:Nombre,:Apellido,:Codigo)");
			$sql->bindParam(":DNI",$datos['DNI']);
			$sql->bindParam(":Nombre",$datos['Nombre']);
			$sql->bindParam(":Apellido",$datos['Apellido']);
			$sql->bindParam(":Codigo",$datos['Codigo']);
			$sql->execute();
			return $sql;
		}

		protected function eliminar_administrador_modelo($codigo){
			$query=mainModel::conectar()->prepare("DELETE FROM sg_administrador WHERE CUENTACODIGO=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->execute();
			return $query;
		}

		protected function datos_administrador_modelo($tipo,$codigo){
			if ($tipo=="Unico") {
				$query=mainModel::conectar()->prepare("SELECT * FROM sg_administrador WHERE CUENTACODIGO=:Codigo");
				$query->bindParam(":Codigo",$codigo);
			}elseif($tipo=="Conteo") {
				$query=mainModel::conectar()->prepare("SELECT DNI FROM sg_administrador WHERE DNI!='71844222'");
				
			}
			$query->execute();
			return $query;
		}

		protected function actualizar_administrador_modelo($datos){
			$query=mainModel::conectar()->prepare("UPDATE sg_administrador SET DNI=:DNI, NOMBRES=:Nombres, APELLIDOS=:Apellidos WHERE CUENTACODIGO=:Codigo");
			$query->bindParam(":DNI",$datos['DNI']);
			$query->bindParam(":Nombres",$datos['Nombres']);
			$query->bindParam(":Apellidos",$datos['Apellidos']);
			$query->bindParam(":Codigo",$datos['Codigo']);
			$query->execute();
			return $query;
		}
	}