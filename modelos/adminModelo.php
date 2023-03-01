<?php 
	class adminModelo{
		protected function obtener_admin_modelo($vistas){
			$listaBlanca=["admin","adminlist","aula","aulalist","categoria","categorialist","configuraciones","cuenta","cursos","cursosall",
						  "cursoscatalogo","cursosconfig","cursosinfo","cursosprogramados","docente","docentelist","estudiante","estudiantelist",
						  "estudiantesearch","home","instructor","instructorlist","misdatos","pagos","pagoslist","periodo","periodolist","personal",
						  "personallist","reportes","sede","sedelist","sedeinfo"];
			if(in_array($vistas, $listaBlanca)){
				if (is_file("./vistas/contenidos/".$vistas."-view.php")){
					$contenido="./vistas/contenidos/".$vistas."-view.php";
				}else{
					$contenido="login";
				}	
			}elseif($vistas=="login"){
				$contenido="login";
			}elseif($vistas=="index"){
				$contenido="login";
			}else{
				$contenido="404";
			}
			return $contenido;
		}
	}