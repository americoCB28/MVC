<?php 

	if ($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class sedeModelo extends mainModel{

		//Modelo para agregar sede al sistema
		protected function agregar_sede_modelo($datos){
			$query=mainModel::conectar()->prepare("INSERT INTO sg_sedes(CODSEDE,NOMSEDE,DIRSEDE,RESPOSEDE,TELSEDE,ANIOSEDE) VALUES(:Codigo,:Nombre,:Direccion,:Responsable,:Telefono,:Anio)");
			$query->bindParam(":Codigo",$datos['Codigo']);
			$query->bindParam(":Nombre",$datos['Nombre']);
			$query->bindParam(":Direccion",$datos['Direccion']);
			$query->bindParam(":Responsable",$datos['Responsable']);
			$query->bindParam(":Telefono",$datos['Telefono']);
			$query->bindParam(":Anio",$datos['Anio']);
			$query->execute();
			return $query;
		}

		//Modelo para conteo, seleccionar las sedes del sistema
		protected function datos_sede_modelo($tipo,$codigo){
			if($tipo=="Unico"){
				$query=mainModel::conectar()->prepare("SELECT * FROM sg_sedes WHERE CODSEDE=:Codigo");
				$query->bindParam(":Codigo",$codigo);
			}elseif ($tipo=="Conteo") {
				$query=mainModel::conectar()->prepare("SELECT CODSEDE FROM sg_sedes");
			}elseif($tipo=="Select"){
				$query=mainModel::conectar()->prepare("SELECT CODSEDE, NOMSEDE FROM sg_sedes ORDER BY NOMSEDE ASC");
			}
			$query->execute();
			return $query;
		}

		//Modelo para eliminar sede del sistema
		protected function eliminar_sede_modelo($codigo){
			$query=mainModel::conectar()->prepare("DELETE FROM sg_sedes WHERE CODSEDE=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->execute();
			return $query;
		}

		//Modelo para actualizar sede del sistema
		protected function actualizar_sede_modelo($datos){
			$query=mainModel::conectar()->prepare("UPDATE sg_sedes SET CODSEDE=:Codigo,NOMSEDE=:Nombre,DIRSEDE=:Direccion,RESPOSEDE=:Responsable,TELSEDE=:Telefono,ANIOSEDE=:Anio WHERE CODSEDE=:Codigo");
			$query->bindParam(":Codigo",$datos['Codigo']);
			$query->bindParam(":Nombre",$datos['Nombre']);
			$query->bindParam(":Direccion",$datos['Direccion']);
			$query->bindParam(":Responsable",$datos['Responsable']);
			$query->bindParam(":Telefono",$datos['Telefono']);
			$query->bindParam(":Anio",$datos['Anio']);
			$query->execute();
			return $query;
		}
	}