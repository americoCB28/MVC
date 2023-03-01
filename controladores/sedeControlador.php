<?php 
	if ($peticionAjax) {
		require_once "../modelos/sedeModelo.php";
	}else{
		require_once "./modelos/sedeModelo.php";
	}

	class sedeControlador extends sedeModelo{

		//Controlador para agregar sede al sistema
		public function agregar_sede_controlador(){
			
			$codigo=mainModel::limpiar_cadena($_POST['codigo-reg']);
			$nombre=mainModel::limpiar_cadena($_POST['nombre-reg']);
			$direccion=mainModel::limpiar_cadena($_POST['direccion-reg']);
			$responsable=mainModel::limpiar_cadena($_POST['responsable-reg']);
			$telefono=mainModel::limpiar_cadena($_POST['telefono-reg']);
			$anio=mainModel::limpiar_cadena($_POST['anio-reg']);

			$consulta1=mainModel::ejecutar_consulta_simple("SELECT CODSEDE FROM sg_sedes WHERE CODSEDE='$codigo'");

			if ($consulta1->rowCount()>=0) {
				$consulta2=mainModel::ejecutar_consulta_simple("SELECT NOMSEDE FROM sg_sedes WHERE NOMSEDE='$nombre'");
				if ($consulta2->rowCount()<=0) {
					$datosSede=[
						"Codigo"=>$codigo,
						"Nombre"=>$nombre,
						"Direccion"=>$direccion,
						"Responsable"=>$responsable,
						"Telefono"=>$telefono,
						"Anio"=>$anio
					];

					$guardarSede=sedeModelo::agregar_sede_modelo($datosSede);
					if ($guardarSede->rowCount()==1) {
						$alerta=[
							"Alerta"=>"recargar",
							"Titulo"=>"Sede registrada",
							"Texto"=>"Los datos de la sede han sido registrados con éxito",
							"Tipo"=>"success"
						];
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No hemos podido guardar los datos de la sede, por favor intente nuevamente",
							"Tipo"=>"error"
						];
					}
					
				} else {
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El nombre de la sede que acaba de ingresar ya se encuentra en el sistema ",
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

		//Controlador para conteo, seleccion de sede
		public function datos_sede_controlador($tipo,$codigo){
			$codigo=mainModel::decryption($codigo);
			$tipo=mainModel::limpiar_cadena($tipo);

			return sedeModelo::datos_sede_modelo($tipo,$codigo);
		}

		//Controlador para mostrar la lista de sedes
		public function paginador_sede_controlador($pagina,$registros){
			$pagina=mainModel::limpiar_cadena($pagina);
			$registros=mainModel::limpiar_cadena($registros);
			$tabla="";

			$pagina=(isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio=($pagina>0) ? (($pagina*$registros)-$registros): 0 ;

			$consulta="SELECT SQL_CALC_FOUND_ROWS * FROM sg_sedes ORDER BY NOMSEDE ASC LIMIT $inicio, $registros";

			$paginaurl="sedelist";

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
			            <th class="text-center">Nombre de la sede</th>
			            <th class="text-center">Direccion</th>
			            <th class="text-center">Responsable</th>
			            <th class="text-center">Teléfono</th>
			            <th class="text-center">Año creación</th>
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
			            <td>'.$rows['CODSEDE'].'</td>
			            <td>'.$rows['NOMSEDE'].'</td>
			            <td>'.$rows['DIRSEDE'].'</td>
			            <td>'.$rows['RESPOSEDE'].'</td>
			            <td>'.$rows['TELSEDE'].'</td>
			            <td>'.$rows['ANIOSEDE'].'</td>
			            <td>
			              <a href="'.SERVERURL.'sedeinfo/'.mainModel::encryption($rows['CODSEDE']).'" class="btn btn-success btn-raised btn-xs" title="Actualizar datos de la sede">
			                <i class="zmdi zmdi-refresh"></i>
			              </a>
			            </td>
			            <td>
			              <form action="'.SERVERURL.'ajax/sedeAjax.php" method="POST" class="FormularioAjax" data-form="delete" entype="multipart/form-data" autocomplete="off">
			              	<input type="hidden" name="codigo-del" value="'.mainModel::encryption($rows['CODSEDE']).'">
			                <button type="submit" class="btn btn-danger btn-raised btn-xs" title="Eliminar Sede">
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
		        			<td colspan="7"> 
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

		//Controlador para eliminar sede del sistema
		public  function eliminar_sede_controlador(){
			$codigo=mainModel::decryption($_POST['codigo-del']);

			$codigo=mainModel::limpiar_cadena($codigo);

			$consulta1=mainModel::ejecutar_consulta_simple("SELECT CODSEDE FROM sg_cursos WHERE CODSEDE='$codigo'");

			if($consulta1->rowCount()<=0) {
				
				$delSede=sedeModelo::eliminar_sede_modelo($codigo);

				if($delSede->rowCount()==1){
					$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Sede eliminada",
						"Texto"=>"La sede fue eliminada con éxito",
						"Tipo"=>"success"
					];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Lo sentimos no hemos podido eliminar la sede",
						"Tipo"=>"error"
					];
				}

			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"Lo sentimos no podemos eliminar la sede por que tiene cursos asociados ",
					"Tipo"=>"error"
				];
			}
			return mainModel::sweet_alert($alerta);
		}

		public function actualizar_sede_controlador(){
			$codigo=mainModel::decryption($_POST['codigo']);

			$codigosede=mainModel::limpiar_cadena($_POST['codigo-up']);
			$nombre=mainModel::limpiar_cadena($_POST['nombre-up']);
			$direccion=mainModel::limpiar_cadena($_POST['direccion-up']);
			$responsable=mainModel::limpiar_cadena($_POST['responsable-up']);
			$telefono=mainModel::limpiar_cadena($_POST['telefono-up']);
			$anio=mainModel::limpiar_cadena($_POST['anio-up']);

			$query1=mainModel::ejecutar_consulta_simple("SELECT * FROM sg_sedes WHERE CODSEDE='$codigo'");
			$DatosSede=$query1->fetch();
			if ($codigosede!=$DatosSede['CODSEDE']) {
				$query2=mainModel::ejecutar_consulta_simple("SELECT CODSEDE FROM sg_sedes WHERE CODSEDE='$codigosede'");
				if ($query2->rowCount()==1) {
					$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"El código que acaba de ingresar ya se encuentra registrado en el sistema",
							"Tipo"=>"error"
					];
					return mainModel::sweet_alert($alerta);
					exit();
				}
			}

			$dataSede=[
				"Codigo"=>$codigo,
				"Nombre"=>$nombre,
				"Direccion"=>$direccion,
				"Responsable"=>$responsable,
				"Telefono"=>$telefono,
				"Anio"=>$anio
			];

			if (sedeModelo::actualizar_sede_modelo($dataSede)) {
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Datos actualizados",
					"Texto"=>"Los datos de la sede han sido actualizados con exito",
					"Tipo"=>"success"
				];
			} else {
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No hemos podido actualizar los datos de la sede, por favor intente nuevamente",
					"Tipo"=>"error"
				];
			}
			return mainModel::sweet_alert($alerta);
		}
	}