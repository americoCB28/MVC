<?php 

	if ($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class estudianteModelo extends mainModel{

		protected function agregar_estudiante_modelo($datos){
			$query=mainModel::conectar()->prepare("INSERT INTO sg_estudiante(DNI,
				NOMBRES,APELLIDOS,DIRECCION,EMAIL,TELEFONO,ESTUDIANTEGENERO) VALUES(:DNI,:Nombres,:Apellidos,:Direccion,:Email,:Telefono,:Genero)");
			$query->bindParam(":DNI",$datos['DNI']);
			$query->bindParam(":Nombres",$datos['Nombres']);
			$query->bindParam(":Apellidos",$datos['Apellidos']);
			$query->bindParam(":Direccion",$datos['Direccion']);
			$query->bindParam(":Email",$datos['Email']);
			$query->bindParam(":Telefono",$datos['Telefono']);
			$query->bindParam(":Genero",$datos['Genero']);
			$query->execute();
			return $query;
		}

		protected function datos_estudiante_modelo($tipo,$codigo){
			if ($tipo=="Unico") {
				$query=mainModel::conectar()->prepare("SELECT * FROM sg_estudiante WHERE DNI=:Codigo");
				$query->bindParam(":Codigo",$codigo);
			}elseif($tipo=="Conteo") {
				$query=mainModel::conectar()->prepare("SELECT DNI FROM sg_estudiante");	
			}elseif($tipo=="Select"){
				$query=mainModel::conectar()->prepare("SELECT DNI, NOMBRES FROM sg_estudiante ORDER BY NOMBRES ASC");
			}
			$query->execute();
			return $query;
		}

		protected function eliminar_estudiante_modelo($codigo){
			$query=mainModel::conectar()->prepare("DELETE FROM sg_estudiante WHERE DNI=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->execute();
			return $query;
		}

		protected function actualizar_estudiante_modelo($datos){
			$query=mainModel::conectar()->prepare("UPDATE sg_estudiante SET DNI=:DNI, NOMBRES=:Nombres, APELLIDOS=:Apellidos, DIRECCION=:Direccion, EMAIL=:Email, TELEFONO=:Telefono, ESTUDIANTEGENERO=:Genero WHERE DNI=:DNI");
			$query->bindParam(":DNI",$datos['DNI']);
			$query->bindParam(":Nombres",$datos['Nombres']);
			$query->bindParam(":Apellidos",$datos['Apellidos']);
			$query->bindParam(":Direccion",$datos['Direccion']);
			$query->bindParam(":Email",$datos['Email']);
			$query->bindParam(":Telefono",$datos['Telefono']);
			$query->bindParam(":Genero",$datos['Genero']);
			$query->execute();
			return $query;
		}
	}