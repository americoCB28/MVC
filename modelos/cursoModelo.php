<?php 

	if ($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class cursoModelo extends mainModel{

		protected function agregar_curso_modelo($datos){
			$query=mainModel::conectar()->prepare("INSERT INTO sg_cursos(CODCATEGORIA,CODCURSO,NOMBRE,HCRONOLOGICAS,PRECIO,ESTADO,CODSEDE,CURSOIMAGEN,CURSOPDF,CURSODESCARGA) VALUES(:Categoria,:Codigo,:Titulo,:Horas,:Precio,:Estado,:Sede,:Imagen,:PDF,:Descarga)");
			$query->bindParam(":Categoria",$datos['Categoria']);
			$query->bindParam(":Codigo",$datos['Codigo']);
			$query->bindParam(":Titulo",$datos['Titulo']);
			$query->bindParam(":Horas",$datos['Horas']);
			$query->bindParam(":Precio",$datos['Precio']);
			$query->bindParam(":Estado",$datos['Estado']);
			$query->bindParam(":Sede",$datos['Sede']);
			$query->bindParam(":Imagen",$datos['Imagen']);
			$query->bindParam(":PDF",$datos['PDF']);
			$query->bindParam(":Descarga",$datos['Descarga']);
			$query->execute();
			return $query;
		}
        
        /*----------  Modelo datos curso  ----------*/
		protected function datos_curso_modelo($tipo,$codigo){
			if($tipo=="Unico"){
				$query=mainModel::conectar()->prepare("SELECT * FROM sg_cursos WHERE CODCURSO=:Codigo");
				$query->bindParam(":Codigo",$codigo);
			}elseif($tipo=="Conteo"){
				$query=mainModel::conectar()->prepare("SELECT CODCURSO FROM sg_cursos");
			}
			$query->execute();
			return $query;
		}
        
        /*----------  Modelo actualizar curso  ----------*/
		protected function actualizar_curso_modelo($datos){
			$query=mainModel::conectar()->prepare("UPDATE sg_cursos SET CODCATEGORIA=:Categoria,CODCURSO=:Codigo,NOMBRE=:Titulo,
			HCRONOLOGICAS=:Horas,PRECIO=:Precio,ESTADO=:Estado,CODSEDE=:Sede,CURSOIMAGEN=:Imagen,CURSOPDF=:PDF,
			CURSODESCARGA=:Descarga WHERE CODCURSO=:Codigo");
            $query->bindParam(":Categoria",$datos['Categoria']);
			$query->bindParam(":Codigo",$datos['Codigo']);
			$query->bindParam(":Titulo",$datos['Titulo']);
			$query->bindParam(":Horas",$datos['Horas']);
			$query->bindParam(":Precio",$datos['Precio']);
			$query->bindParam(":Estado",$datos['Estado']);
			$query->bindParam(":Sede",$datos['Sede']);
			$query->bindParam(":Imagen",$datos['Imagen']);
			$query->bindParam(":PDF",$datos['PDF']);
			$query->bindParam(":Descarga",$datos['Descarga']);
			$query->execute();
			return $query;
		}
        
        /*----------  Modelo eliminar curso  ----------*/
		protected function eliminar_curso_modelo($codigo){
			$query=mainModel::conectar()->prepare("DELETE FROM sg_cursos WHERE CODCURSO=:Codigo");
			$query->bindParam(":Codigo",$codigo);
			$query->execute();
			return $query;
		}
	}