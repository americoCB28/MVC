<?php 
	if ($peticionAjax) {
		require_once "../modelos/estudianteModelo.php";
	}else{
		require_once "./modelos/estudianteModelo.php";
	}

	class estudianteControlador extends estudianteModelo{

		public function agregar_estudiante_controlador(){

			$dni=mainModel::limpiar_cadena($_POST['dni-reg']);
			$nombre=mainModel::limpiar_cadena($_POST['nombre-reg']);
			$apellido=mainModel::limpiar_cadena($_POST['apellido-reg']);
			$direccion=mainModel::limpiar_cadena($_POST['direccion-reg']);
			$email=mainModel::limpiar_cadena($_POST['email-reg']);
			$telefono=mainModel::limpiar_cadena($_POST['telefono-reg']);
			$genero=mainModel::limpiar_cadena($_POST['optionsGenero']);

			$consulta1=mainModel::ejecutar_consulta_simple("SELECT DNI FROM sg_estudiante WHERE DNI='$dni'");

			if ($consulta1->rowCount()<=0) {
				$datosEstudiante=[
					"DNI"=>$dni,
					"Nombres"=>$nombre,
					"Apellidos"=>$apellido,
					"Direccion"=>$direccion,
					"Email"=>$email,
					"Telefono"=>$telefono,
					"Genero"=>$genero
				];

				$guardarEstudiante=estudianteModelo::agregar_estudiante_modelo($datosEstudiante);
				if ($guardarEstudiante->rowCount()==1) {
					$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Estudiante registrado",
						"Texto"=>"Los datos del estudiante han sido registrados con éxito",
						"Tipo"=>"success"
					];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No hemos podido guardar los datos del estudiante, por favor intente nuevamente",
						"Tipo"=>"error"
					];
				}
				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"El DNI/CE que acaba de ingresar ya se encuentra en el sistema ",
					"Tipo"=>"error"
				];
			}
			return mainModel::sweet_alert($alerta);	
		}

		public function datos_estudiante_controlador($tipo,$codigo){
			$codigo=mainModel::decryption($codigo);
			$tipo=mainModel::limpiar_cadena($tipo);

			return estudianteModelo::datos_estudiante_modelo($tipo,$codigo);
		}

		public function paginador_estudiante_controlador($pagina,$registros,$busqueda){

			$pagina=mainModel::limpiar_cadena($pagina);
			$registros=mainModel::limpiar_cadena($registros);
			$busqueda=mainModel::limpiar_cadena($busqueda);
			$tabla="";

			$pagina=(isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio=($pagina>0) ? (($pagina*$registros)-$registros): 0 ;

			if (isset($busqueda) && $busqueda!="") {
				$consulta="SELECT SQL_CALC_FOUND_ROWS * FROM sg_estudiante WHERE(NOMBRES LIKE '%$busqueda%' OR APELLIDOS LIKE '%$busqueda%' OR DNI LIKE '%$busqueda%' OR EMAIL LIKE '%$busqueda%') ORDER BY NOMBRES  ASC LIMIT $inicio,$registros";
				$paginaurl="estudiantesearch";
			} else {
				$consulta="SELECT SQL_CALC_FOUND_ROWS * FROM sg_estudiante ORDER BY NOMBRES ASC LIMIT $inicio,$registros";
				$paginaurl="estudiantelist";
			}
			
			$conexion=mainModel::conectar();

			$datos = $conexion->query($consulta);
			$datos = $datos->fetchAll();

			$total = $conexion->query("SELECT FOUND_ROWS()");
			$total = (int) $total->fetchColumn();

			$Npaginas = ceil($total/$registros);

			$tabla.='    
			<div class="table-responsive">
		      	<table class="table table-hover text-center">
			        <thead>
			          <tr>
			            <th class="text-center">N°</th>
			            <th class="text-center">DNI</th>
			            <th class="text-center">Nombres</th>
			            <th class="text-center">Apellidos</th>
			            <th class="text-center">Dirección</th>
			            <th class="text-center">Email</th>
			            <th class="text-center">Teléfono</th>
			            <th class="text-center">Género</th>
			            <th class="text-center">A. Datos</th>
			            <th class="text-center">Eliminar</th> 
			          </tr>
			        </thead>
			        <tbody>
	        ';

	        if($total>=1 && $pagina<=$Npaginas){
	        	$contador=$inicio+1;
	        	foreach($datos as $rows){
	        		$tabla.='
		          	<tr>
			            <td>'.$contador.'</td>
			            <td>'.$rows['DNI'].'</td>
			            <td>'.$rows['NOMBRES'].'</td>
			            <td>'.$rows['APELLIDOS'].'</td>
			            <td>'.$rows['DIRECCION'].'</td>
			            <td>'.$rows['EMAIL'].'</td>
			            <td>'.$rows['TELEFONO'].'</td>
			            <td>'.$rows['ESTUDIANTEGENERO'].'</td>
			            <td>
			              <a href="'.SERVERURL.'estudianteinfo/'.mainModel::encryption($rows['DNI']).'" class="btn btn-success btn-raised btn-xs" title="Actualizar datos del estudiante">
			                <i class="zmdi zmdi-refresh"></i>
			              </a>
			            </td>
			            <td>
			              <form action="'.SERVERURL.'ajax/estudianteAjax.php" method="POST" class="FormularioAjax" data-form="delete" entype="multipart/form-data" autocomplete="off">
			              	<input type="hidden" name="codigo-del" value="'.mainModel::encryption($rows['DNI']).'">
			                <button type="submit" class="btn btn-danger btn-raised btn-xs" title="Eliminar Estudiante">
			                    <i class="zmdi zmdi-delete"></i>
			                </button>
			                <div class="RespuestaAjax"></div>
			              </form>
			            </td>
		          	</tr>
	        		';	
	        		$contador++;
	        	}
	        }else{
	        	if($total>=1) {
	        		$tabla.='
		        		<tr>
		        			<td colspan="8"> 
		        				<a href="'.SERVERURL.$paginaurl.'/" class="btn btn-sm btn-info btn-raised">
		        					Haga clic aca para recargar el listado
		        				</a>
		        			</td>
		        		</tr>
	        		';
	        	}else{
	        		$tabla.='
		        		<tr>
		        			<td colspan="8">No hay registros en el sistema</td>
		        		</tr>
	        		';
	        	}	
	        }

			$tabla.='</tbody></table></div>';

			if($total>=1 && $pagina<=$Npaginas){
				$tabla.='
						<nav class="text-center">
						<ul class="pagination pagination-sm">';

      			if($pagina==1){
      				$tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-left"></i></a></li>';
      			}else{
      				$tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
      			}

      			for ($i=1; $i <=$Npaginas; $i++) { 
      				if($pagina==$i){
      					$tabla.='<li class="active"><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
      				}else{
      					$tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.$i.'/">'.$i.'</a></li>';
      				}	
      			}

      			if($pagina==$Npaginas){
      				$tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
      			}else{
      				$tabla.='<li><a href="'.SERVERURL.$paginaurl.'/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
      			}

      			$tabla.='</ul></nav>';
			}

			return $tabla;
		}

		public  function eliminar_estudiante_controlador(){
			$codigo=mainModel::decryption($_POST['codigo-del']);

			$codigo=mainModel::limpiar_cadena($codigo);

			$consulta1=mainModel::ejecutar_consulta_simple("SELECT ESTUDIANTEASIG FROM sg_cursoprogramado WHERE ESTUDIANTEASIG='$codigo'");

			if($consulta1->rowCount()<=0) {
				
				$delEstudiante=estudianteModelo::eliminar_estudiante_modelo($codigo);

				if($delEstudiante->rowCount()==1){
					$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Estudiante eliminado",
						"Texto"=>"El estudiante fue eliminado con éxito",
						"Tipo"=>"success"
					];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Lo sentimos, no hemos podido eliminar al estudiante",
						"Tipo"=>"error"
					];
				}

			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"Lo sentimos no podemos eliminar al estudiante por que tiene cursos asociados ",
					"Tipo"=>"error"
				];
			}
			return mainModel::sweet_alert($alerta);
		}

	}