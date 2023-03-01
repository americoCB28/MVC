<?php 
	if ($peticionAjax) {
		require_once "../modelos/categoriaModelo.php";
	}else{
		require_once "./modelos/categoriaModelo.php";
	}

	class categoriaControlador extends categoriaModelo{

		public function agregar_categoria_controlador(){
			$codigo=mainModel::limpiar_cadena($_POST['codigo-reg']);
			$nombre=mainModel::limpiar_cadena($_POST['nombre-reg']);

			$consulta1=mainModel::ejecutar_consulta_simple("SELECT CODCATEGORIA FROM sg_categorias WHERE CODCATEGORIA='$codigo'");

			if ($consulta1->rowCount()<=0) {
				$consulta2=mainModel::ejecutar_consulta_simple("SELECT NOMCATEGORIA FROM sg_categorias WHERE NOMCATEGORIA='$nombre'");
				if ($consulta2->rowCount()<=0) {
					$datosCategoria=[
						"Codigo"=>$codigo,
						"Nombre"=>$nombre
					];

					$guardarCategoria=categoriaModelo::agregar_categoria_modelo($datosCategoria);
					if ($guardarCategoria->rowCount()==1) {
						$alerta=[
							"Alerta"=>"recargar",
							"Titulo"=>"Categoria registrada",
							"Texto"=>"Los datos de la categoria han sido registrados con éxito",
							"Tipo"=>"success"
						];
					} else {
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No hemos podido guardar los datos de la categoria, por favor intente nuevamente",
							"Tipo"=>"error"
						];
					}
					
				} else {
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El nombre de la categoria que acaba de ingresar ya se encuentra en el sistema ",
						"Tipo"=>"error"
					];
				}
				
			} else {
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"El codigo de la categoria que acaba de ingresar ya se encuentra en el sistema ",
					"Tipo"=>"error"
				];
			}
			return mainModel::sweet_alert($alerta);	
		}

		public function datos_categoria_controlador($tipo,$codigo){
			$codigo=mainModel::decryption($codigo);
			$tipo=mainModel::limpiar_cadena($tipo);

			return categoriaModelo::datos_categoria_modelo($tipo,$codigo);
		}

		public function paginador_categoria_controlador($pagina,$registros){
			$pagina=mainModel::limpiar_cadena($pagina);
			$registros=mainModel::limpiar_cadena($registros);
			$tabla="";

			$pagina=(isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio=($pagina>0) ? (($pagina*$registros)-$registros): 0 ;

			$consulta="SELECT SQL_CALC_FOUND_ROWS * FROM sg_categorias ORDER BY NOMCATEGORIA ASC LIMIT $inicio, $registros";

			$paginaurl="categorialist";

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
			            <th class="text-center">Código categoria</th>
			            <th class="text-center">Nombre categoria</th>
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
			            <td>'.$rows['CODCATEGORIA'].'</td>
			            <td>'.$rows['NOMCATEGORIA'].'</td>
			            <td>
			              <a href="'.SERVERURL.'categoriainfo/'.mainModel::encryption($rows['CODCATEGORIA']).'" class="btn btn-success btn-raised btn-xs" title="Actualizar datos de la categoria">
			                <i class="zmdi zmdi-refresh"></i>
			              </a>
			            </td>
			            <td>
			              <form action="'.SERVERURL.'ajax/categoriaAjax.php" method="POST" class="FormularioAjax" data-form="delete" entype="multipart/form-data" autocomplete="off">
			              	<input type="hidden" name="codigo-del" value="'.mainModel::encryption($rows['CODCATEGORIA']).'">
			                <button type="submit" class="btn btn-danger btn-raised btn-xs" title="Eliminar Categoria">
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
		        			<td colspan="3"> 
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

		public  function eliminar_categoria_controlador(){
			$codigo=mainModel::decryption($_POST['codigo-del']);

			$codigo=mainModel::limpiar_cadena($codigo);

			$consulta1=mainModel::ejecutar_consulta_simple("SELECT CODCATEGORIA FROM sg_cursos WHERE CODCATEGORIA='$codigo'");

			if($consulta1->rowCount()<=0) {
				
				$delCategoria=categoriaModelo::eliminar_categoria_modelo($codigo);

				if($delCategoria->rowCount()==1){
					$alerta=[
						"Alerta"=>"recargar",
						"Titulo"=>"Categoria eliminada",
						"Texto"=>"La categoria fue eliminada con éxito",
						"Tipo"=>"success"
					];
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"Lo sentimos no hemos podido eliminar la categoria",
						"Tipo"=>"error"
					];
				}

			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"Lo sentimos no podemos eliminar la categoria por que tiene cursos asociados",
					"Tipo"=>"error"
				];
			}
			return mainModel::sweet_alert($alerta);
		}
	}