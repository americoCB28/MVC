<?php 

	if ($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class docenteModelo extends mainModel{

		protected function agregar_docente_modelo($datos){
			$query=mainModel::conectar()->prepare("INSERT INTO sg_docente(DNI,NOMBRES,
				APELLIDOS,DIRECCION,EMAIL,TELEFONO,ESPECIALIDAD,DOCENTEGENERO) VALUES(:DNI,:Nombres,:Apellidos,:Direccion,:Email,:Telefono,:Especialidad,:Genero)");
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

		protected function datos_docente_modelo($tipo,$codigo){
			if($tipo=="Unico"){
				$query=mainModel::conectar()->prepare("SELECT * FROM sg_docente WHERE DNI=:Codigo");
				$query->bindParam(":Codigo",$codigo);
			}elseif ($tipo=="Conteo") {
				$query=mainModel::conectar()->prepare("SELECT DNI FROM sg_docente");
			}elseif($tipo=="Select"){
				$query=mainModel::conectar()->prepare("SELECT DNI, NOMBRES FROM sg_docente ORDER BY NOMBRES ASC");
			}
			$query->execute();
			return $query;
		}

		protected function eliminar_docente_modelo($codigo){
			$query=mainModel::conectar()->prepare("DELETE FROM sg_docente WHERE DNI=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->execute();
			return $query;
		}
	}