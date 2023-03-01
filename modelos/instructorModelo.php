<?php 

	if ($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class instructorModelo extends mainModel{

		protected function agregar_instructor_modelo($datos){
			$query=mainModel::conectar()->prepare("INSERT INTO sg_instructor(DNI,
				NOMBRES,APELLIDOS,DIRECCION,EMAIL,TELEFONO,ESPECIALIDAD,INSTRUCTORGENERO) VALUES(:DNI,:Nombres,:Apellidos,:Direccion,:Email,:Telefono,:Especialidad,:Genero)");
			$query->bindParam(":DNI",$datos['DNI']);
			$query->bindParam(":Nombres",$datos['Nombres']);
			$query->bindParam(":Apellidos",$datos['Apellidos']);
			$query->bindParam(":Direccion",$datos['Direccion']);
			$query->bindParam(":Email",$datos['Email']);
			$query->bindParam(":Telefono",$datos['Telefono']);
			$query->bindParam(":Especialidad",$datos['Especialidad']);
			$query->bindParam(":Genero",$datos['Genero']);
			$query->execute();
			return $query;
		}

		protected function datos_instructor_modelo($tipo,$codigo){
			if($tipo=="Unico"){
				$query=mainModel::conectar()->prepare("SELECT * FROM sg_instructor WHERE DNI=:Codigo");
				$query->bindParam(":Codigo",$codigo);
			}elseif ($tipo=="Conteo") {
				$query=mainModel::conectar()->prepare("SELECT DNI FROM sg_instructor");
			}elseif($tipo=="Select"){
				$query=mainModel::conectar()->prepare("SELECT DNI, NOMBRES FROM sg_instructor ORDER BY NOMBRES ASC");
			}
			$query->execute();
			return $query;
		}

		protected function eliminar_instructor_modelo($codigo){
			$query=mainModel::conectar()->prepare("DELETE FROM sg_instructor WHERE DNI=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->execute();
			return $query;
		}
	}