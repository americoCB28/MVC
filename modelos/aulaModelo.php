<?php 

	if ($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class aulaModelo extends mainModel{

		protected function agregar_aula_modelo($datos){
			$query=mainModel::conectar()->prepare("INSERT INTO sg_salones(CODSALON,CAPACIDAD,ESTADO) VALUES(:Codigo,:Capacidad,:Estado)");
			$query->bindParam(":Codigo",$datos['Codigo']);
			$query->bindParam(":Capacidad",$datos['Capacidad']);
			$query->bindParam(":Estado",$datos['Estado']);
			$query->execute();
			return $query;
		}

		protected function datos_aula_modelo($tipo,$codigo){
			if($tipo=="Unico"){
				$query=mainModel::conectar()->prepare("SELECT * FROM sg_salones WHERE CODSALON=:Codigo");
				$query->bindParam(":Codigo",$codigo);
			}elseif ($tipo=="Conteo") {
				$query=mainModel::conectar()->prepare("SELECT CODSALON FROM sg_salones");
			}elseif($tipo=="Select"){
				$query=mainModel::conectar()->prepare("SELECT CODSALON FROM sg_salones ORDER BY CODSALON ASC");
			}
			$query->execute();
			return $query;
		}

		protected function eliminar_aula_modelo($codigo){
			$query=mainModel::conectar()->prepare("DELETE FROM sg_salones WHERE CODSALON=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->execute();
			return $query;
		}
	}