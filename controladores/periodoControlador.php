<?php 
	if ($peticionAjax) {
		require_once "../modelos/periodoModelo.php";
	}else{
		require_once "./modelos/periodoModelo.php";
	}

	class periodoControlador extends periodoModelo{

		public function agregar_periodo_controlador(){

			$codigo=mainModel::limpiar_cadena($_POST['codigo-reg']);
			$fechainicio=mainModel::limpiar_cadena($_POST['fechainicio-reg']);
			$fechafin=mainModel::limpiar_cadena($_POST['fechafin-reg']);
			$estado=mainModel::limpiar_cadena($_POST['optionsEstado']);

			$consulta1=mainModel::ejecutar_consulta_simple("SELECT CODPERIODO FROM sg_periodos WHERE CODPERIODO='$codigo'");

			if ($consulta1->rowCount()<=0) {
				$consulta2=mainModel::ejecutar_consulta_simple("SELECT INIPERIODO FROM sg_periodos WHERE INIPERIODO='$fechainicio'");
				if ($consulta2->rowCount()<=0) {
					$datosPeriodo=[
						"Codigo"=>$codigo,
						"InicioPeriodo"=>$fechainicio,
						"FinPeriodo"=>$fechafin,
						"Estado"=>$estado
					];

					$guardarPeriodo=periodoModelo::agregar_periodo_modelo($datosPeriodo);
					if ($guardarPeriodo->rowCount()==1) {
						$alerta=[
							"Alerta"=>"recargar",
							"Titulo"=>"Periodo registrado",
							"Texto"=>"Los datos del periodo han sido registrados con éxito",
							"Tipo"=>"success"
						];
					} else {
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No hemos podido guardar los datos del periodo, por favor intente nuevamente",
							"Tipo"=>"error"
						];
					}
					
				} else {
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"En la base de datos del sistema, ya se encuentra registrado un periodo con la misma fecha de inicio",
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

		public function datos_periodo_controlador($tipo,$codigo){
			$codigo=mainModel::decryption($codigo);
			$tipo=mainModel::limpiar_cadena($tipo);

			return periodoModelo::datos_periodo_modelo($tipo,$codigo);
		}

		public function paginador_periodo_controlador($pagina,$registros){
			$pagina=mainModel::limpiar_cadena($pagina);
			$registros=mainModel::limpiar_cadena($registros);
			$tabla="";

			$pagina=(isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio=($pagina>0) ? (($pagina*$registros)-$registros): 0 ;

			$consulta="SELECT SQL_CALC_FOUND_ROWS * FROM sg_periodos ORDER BY CODPERIODO ASC LIMIT $inicio, $registros";

			$paginaurl="periodolist";

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
			            <th class="text-center">Código</th>
			            <th class="text-center">Inicio Periodo</th>
			            <th class="text-center">Fin Periodo</th>
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
			            <td>'.$rows['CODPERIODO'].'</td>
			            <td>'.$rows['INIPERIODO'].'</td>
			            <td>'.$rows['FINPERIODO'].'</td>
			            <td>'.$rows['ESTADO'].'</td>
			            <td>
			              <a href="'.SERVERURL.'periodoinfo/'.mainModel::encryption($rows['CODPERIODO']).'" class="btn btn-success btn-raised btn-xs" title="Actualizar datos del periodo">
			                <i class="zmdi zmdi-refresh"></i>
			              </a>
			            </td>
			            <td>
			              <form action="'.SERVERURL.'ajax/periodoAjax.php" method="POST" class="FormularioAjax" data-form="delete" entype="multipart/form-data" autocomplete="off">
			              	<input type="hidden" name="codigo-del" value="'.mainModel::encryption($rows['CODPERIODO']).'">
			                <button type="submit" class="btn btn-danger btn-raised btn-xs" title="Eliminar Periodo">
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
		        			<td colspan="4"> 
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

		public  function eliminar_periodo_controlador(){
			$codigo=mainModel::decryption($_POST['codigo-del']);

			$codigo=mainModel::limpiar_cadena($codigo);

			$consulta1=mainModel::ejecutar_consulta_simple("SELECT CODPERIODOASIG FROM sg_cursoprogramado WHERE CODPERIODOASIG='$codigo'");

			if($consulta1->rowCount()<=0) {
				
				$delPeriodo=periodoModelo::eliminar_periodo_modelo($codigo);

				if($delPeriodo->rowCount()==1){
					$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Periodo eliminado",
						"Texto"=>"El periodo fue eliminado con éxito",
						"Tipo"=>"success"
					];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Lo sentimos, no hemos podido eliminar el periodo",
						"Tipo"=>"error"
					];
				}

			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"Lo sentimos no podemos eliminar el periodo por que tiene cursos asociados ",
					"Tipo"=>"error"
				];
			}
			return mainModel::sweet_alert($alerta);
		}

	}