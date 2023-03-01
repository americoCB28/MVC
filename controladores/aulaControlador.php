<?php 
	if ($peticionAjax) {
		require_once "../modelos/aulaModelo.php";
	}else{
		require_once "./modelos/aulaModelo.php";
	}

	class aulaControlador extends aulaModelo{

		public function agregar_aula_controlador(){

			$codigo=mainModel::limpiar_cadena($_POST['codigo-reg']);
			$capacidad=mainModel::limpiar_cadena($_POST['capacidad-reg']);
			$estado=mainModel::limpiar_cadena($_POST['optionsEstado']);

			$consulta1=mainModel::ejecutar_consulta_simple("SELECT CODSALON FROM sg_salones WHERE CODSALON='$codigo'");

			if ($consulta1->rowCount()<=0) {
				
				$datosSalones=[
					"Codigo"=>$codigo,
					"Capacidad"=>$capacidad,
					"Estado"=>$estado
				];

				$guardarSalon=aulaModelo::agregar_aula_modelo($datosSalones);
				if ($guardarSalon->rowCount()==1) {
					$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Salón registrado",
						"Texto"=>"Los datos del salón han sido registrados con éxito",
						"Tipo"=>"success"
					];
				} else {
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No hemos podido guardar los datos del salón, por favor intente nuevamente",
						"Tipo"=>"error"
					];
				}
				
			} else {
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"El codigo de registro que acaba de ingresar ya se encuentra en el sistema ",
					"Tipo"=>"error"
				];
			}
			return mainModel::sweet_alert($alerta);
		}

		public function datos_aula_controlador($tipo,$codigo){
			$codigo=mainModel::decryption($codigo);
			$tipo=mainModel::limpiar_cadena($tipo);

			return aulaModelo::datos_aula_modelo($tipo,$codigo);
		}

		public function paginador_aula_controlador($pagina,$registros){
			$pagina=mainModel::limpiar_cadena($pagina);
			$registros=mainModel::limpiar_cadena($registros);
			$tabla="";

			$pagina=(isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio=($pagina>0) ? (($pagina*$registros)-$registros): 0 ;

			$consulta="SELECT SQL_CALC_FOUND_ROWS * FROM sg_salones ORDER BY CODSALON ASC LIMIT $inicio, $registros";

			$paginaurl="aulalist";

			$conexion = mainModel::conectar();

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
			            <th class="text-center">Código aula</th>
			            <th class="text-center">Capacidad</th>
			            <th class="text-center">Estado</th>
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
			            <td>'.$rows['CODSALON'].'</td>
			            <td>'.$rows['CAPACIDAD'].'</td>
			            <td>'.$rows['ESTADO'].'</td>
			            <td>
			              <a href="'.SERVERURL.'aulainfo/'.mainModel::encryption($rows['CODSALON']).'" class="btn btn-success btn-raised btn-xs" title="Actualizar datos del aula">
			                <i class="zmdi zmdi-refresh"></i>
			              </a>
			            </td>
			            <td>
			              <form action="'.SERVERURL.'ajax/aulaAjax.php" method="POST" class="FormularioAjax" data-form="delete" entype="multipart/form-data" autocomplete="off">
			              	<input type="hidden" name="codigo-del" value="'.mainModel::encryption($rows['CODSALON']).'">
			                <button type="submit" class="btn btn-danger btn-raised btn-xs" title="Eliminar Aula">
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
		        			<td colspan="4"> 
		        				<a href="'.SERVERURL.$paginaurl.'/" class="btn btn-sm btn-info btn-raised">
		        					Haga clic aquí para recargar el listado
		        				</a>
		        			</td>
		        		</tr>
	        		';
	        	}else{
	        		$tabla.='
		        		<tr>
		        			<td colspan="7"> 
		        				No hay registros en el sistema 
	        				</td>
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

		public  function eliminar_aula_controlador(){
			$codigo=mainModel::decryption($_POST['codigo-del']);

			$codigo=mainModel::limpiar_cadena($codigo);

			$consulta1=mainModel::ejecutar_consulta_simple("SELECT CODSALONASIG FROM sg_cursoprogramado WHERE CODSALONASIG='$codigo'");

			if($consulta1->rowCount()<=0) {
				
				$delAula=aulaModelo::eliminar_aula_modelo($codigo);

				if($delAula->rowCount()==1){
					$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Salón eliminado",
						"Texto"=>"El salón fue eliminado con éxito",
						"Tipo"=>"success"
					];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Lo sentimos, no hemos podido eliminar el salón",
						"Tipo"=>"error"
					];
				}

			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"Lo sentimos no podemos eliminar el salón por que tiene cursos asociados ",
					"Tipo"=>"error"
				];
			}
			return mainModel::sweet_alert($alerta);
		}
	}