<?php 

	if ($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class categoriaModelo extends mainModel{

		protected function agregar_categoria_modelo($datos){
			$query=mainModel::conectar()->prepare("INSERT INTO sg_categorias(CODCATEGORIA,NOMCATEGORIA) VALUES(:Codigo,:Nombre)");
			$query->bindParam(":Codigo",$datos['Codigo']);
			$query->bindParam(":Nombre",$datos['Nombre']);
			$query->execute();
			return $query;
		}

		protected function datos_categoria_modelo($tipo,$codigo){
			if($tipo=="Unico"){
				$query=mainModel::conectar()->prepare("SELECT * FROM sg_categorias WHERE CODCATEGORIA=:Codigo");
				$query->bindParam(":Codigo",$codigo);
			}elseif ($tipo=="Conteo") {
				$query=mainModel::conectar()->prepare("SELECT CODCATEGORIA FROM sg_categorias");
			}elseif($tipo=="Select"){
				$query=mainModel::conectar()->prepare("SELECT CODCATEGORIA, NOMCATEGORIA FROM sg_categorias ORDER BY NOMCATEGORIA ASC");
			}
			$query->execute();
			return $query;
		}

		protected function eliminar_categoria_modelo($codigo){
			$query=mainModel::conectar()->prepare("DELETE FROM sg_categorias WHERE CODCATEGORIA=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->execute();
			return $query;
		}
	}