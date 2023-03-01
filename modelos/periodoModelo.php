<?php 

	if ($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class periodoModelo extends mainModel{

		protected function agregar_periodo_modelo($datos){
			$query=mainModel::conectar()->prepare("INSERT INTO sg_periodos(CODPERIODO,INIPERIODO,FINPERIODO,ESTADO) VALUES(:Codigo,:InicioPeriodo,:FinPeriodo,:Estado)");
			$query->bindParam(":Codigo",$datos['Codigo']);
			$query->bindParam(":InicioPeriodo",$datos['InicioPeriodo']);
			$query->bindParam(":FinPeriodo",$datos['FinPeriodo']);
			$query->bindParam(":Estado",$datos['Estado']);
			$query->execute();
			return $query;
		}

		protected function datos_periodo_modelo($tipo,$codigo){
			if($tipo=="Unico"){
				$query=mainModel::conectar()->prepare("SELECT * FROM sg_periodos WHERE CODPERIODO=:Codigo");
				$query->bindParam(":Codigo",$codigo);
			}elseif ($tipo=="Conteo") {
				$query=mainModel::conectar()->prepare("SELECT CODPERIODO FROM sg_periodos");
			}elseif($tipo=="Select"){
				$query=mainModel::conectar()->prepare("SELECT CODPERIODO FROM sg_periodos ORDER BY CODPERIODO ASC");
			}
			$query->execute();
			return $query;
		}

		protected function eliminar_periodo_modelo($codigo){
			$query=mainModel::conectar()->prepare("DELETE FROM sg_periodos WHERE CODPERIODO=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->execute();
			return $query;
		}
		
	}