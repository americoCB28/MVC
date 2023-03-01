<?php 
	if ($peticionAjax){
		require_once "../modelos/administradorModelo.php";
	}else{
		require_once "./modelos/administradorModelo.php";
	}

	class administradorControlador extends administradorModelo{

		//Controlador para agregar administrador
		public function agregar_administrador_controlador(){
			session_start(['name'=>'SGA']);	
			$dni=mainModel::limpiar_cadena($_POST['dni-reg']);
			$nombre=mainModel::limpiar_cadena($_POST['nombre-reg']);
			$apellido=mainModel::limpiar_cadena($_POST['apellido-reg']);

			$usuario=mainModel::limpiar_cadena($_POST['usuario-reg']);
			$contra1=mainModel::limpiar_cadena($_POST['contra1-reg']);
			$contra2=mainModel::limpiar_cadena($_POST['contra2-reg']);
			$email=mainModel::limpiar_cadena($_POST['email-reg']);
			$genero=mainModel::limpiar_cadena($_POST['optionsGenero']);

			if($genero=="Masculino"){
				$foto="AdminMaleAvatar.png";
			}else{
				$foto="StudetFemaleAvatar.png";
			}
			
			if($contra1!=$contra2){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"Las contraseñas que acabas de ingresar no coinciden, por favor intente nuevamente",
					"Tipo"=>"error"
				];
			}else{
				$consulta1=mainModel::ejecutar_consulta_simple("SELECT DNI FROM sg_administrador WHERE DNI='$dni'");
				if ($consulta1->rowCount()==1){
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"El DNI ingresado ya se encuentra registrado en el sistema",
						"Tipo"=>"error"
					];
				}else{
					if ($email!=""){
						$consulta2=mainModel::ejecutar_consulta_simple("SELECT EMAIL FROM sg_cuenta WHERE EMAIL='$email'");
						$ec=$consulta2->rowCount();
					}else{
						$ec=0;
					}
					if ($ec>=1) {
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"El Email ingresado ya se encuentra registrado en el sistema.",
							"Tipo"=>"error"
						];
					} else {
						$consulta3=mainModel::ejecutar_consulta_simple("SELECT CUENTAUSUARIO FROM sg_cuenta WHERE CUENTAUSUARIO='$usuario'");
						if ($consulta3->rowCount()>=1) {
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrio un error inesperado",
								"Texto"=>"El Usuario ingresado ya se encuentra registrado en el sistema.",
								"Tipo"=>"error"
							];
						}else{
							$consulta4=mainModel::ejecutar_consulta_simple("SELECT ID FROM sg_cuenta");
							$numero=($consulta4->rowCount())+1;

							$codigo=mainModel::generar_codigo_aleatorio("AC",4,$numero);

							$clave=mainModel::encryption($contra1);

							$dataAC=[
								"Codigo"=>$codigo,
								"Usuario"=>$usuario,
								"Clave"=>$clave,
								"Email"=>$email,
								"Estado"=>"Activo",
								"Tipo"=>"Administrador",
								"Genero"=>$genero,
								"Foto"=>$foto
							];

							$guardarCuenta=mainModel::agregar_cuenta($dataAC);

							if ($guardarCuenta->rowCount()>=1) {
								$dataAD=[
									"DNI"=>$dni,
									"Nombre"=>$nombre,
									"Apellido"=>$apellido,
									"Codigo"=>$codigo
								];

								$guardarAdmin=administradorModelo::agregar_administrador_modelo($dataAD);
								if($guardarAdmin->rowCount()>=1){
									$alerta=[
										"Alerta"=>"limpiar",
										"Titulo"=>"Administrador Registrado",
										"Texto"=>"El administrador se registro con exito en el sistema",
										"Tipo"=>"success"
									];
								}else{
									mainModel::eliminar_cuenta($codigo);
									$alerta=[
										"Alerta"=>"simple",
										"Titulo"=>"Ocurrio un error inesperado",
										"Texto"=>"No hemos podido registrar el administrador",
										"Tipo"=>"error"
									];
								}
							}else{
								$alerta=[
									"Alerta"=>"simple",
									"Titulo"=>"Ocurrio un error inesperado",
									"Texto"=>"No hemos podido registrar el administrador",
									"Tipo"=>"error"
								];
							}
						}						
					}
				}	
			}
			return mainModel::sweet_alert($alerta);
		}


		//Controlador para paginar administradores
		public function paginador_administrador_controlador($pagina,$registros,$codigo){
			$pagina=mainModel::limpiar_cadena($pagina);
			$registros=mainModel::limpiar_cadena($registros);
			$codigo=mainModel::limpiar_cadena($codigo);
			$tabla="";

			$pagina=(isset($pagina) && $pagina>0) ? (int)$pagina : 1 ;
			$inicio=($pagina>0) ? (($pagina*$registros)-$registros): 0 ;

			$conexion=mainModel::conectar();

			$datos = $conexion->query("
				SELECT SQL_CALC_FOUND_ROWS * FROM sg_administrador WHERE CUENTACODIGO!='$codigo' AND DNI!='71844222' ORDER BY NOMBRES ASC LIMIT $inicio, $registros
			");
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
			            <th class="text-center">A. Cuenta</th>
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
			            <td>
			              <a href="'.SERVERURL.'cuenta/admin/'.mainModel::encryption($rows['CUENTACODIGO']).'" class="btn btn-outline-success btn-raised btn-xs" title="Actualizar cuenta">
			                <i class="zmdi zmdi-refresh-alt"></i>
			              </a>
			            </td>
			            <td>
			              <a href="'.SERVERURL.'misdatos/admin/'.mainModel::encryption($rows['CUENTACODIGO']).'" class="btn btn-success btn-raised btn-xs" title="Actualizar datos de la cuenta">
			                <i class="zmdi zmdi-refresh"></i>
			              </a>
			            </td>
			            <td>
			              <form action="'.SERVERURL.'ajax/administradorAjax.php" method="POST" class="FormularioAjax" data-form="delete" entype="multipart/form-data" autocomplete="off">
			              	<input type="hidden" name="codigo-del" value="'.mainModel::encryption($rows['CUENTACODIGO']).'">
			                <button type="submit" class="btn btn-danger btn-raised btn-xs" title="Eliminar Administrador">
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
		        				<a href="'.SERVERURL.'adminlist/" class="btn btn-sm btn-info btn-raised">
		        					Haga clic aca para recargar el listado
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
      				$tabla.='<li><a href="'.SERVERURL.'adminlist/'.($pagina-1).'/"><i class="zmdi zmdi-arrow-left"></i></a></li>';
      			}

      			for ($i=1; $i <=$Npaginas; $i++) { 
      				if($pagina==$i){
      					$tabla.='<li class="active"><a href="'.SERVERURL.'adminlist/'.$i.'/">'.$i.'</a></li>';
      				}else{
      					$tabla.='<li><a href="'.SERVERURL.'adminlist/'.$i.'/">'.$i.'</a></li>';
      				}	
      			}

      			if($pagina==$Npaginas){
      				$tabla.='<li class="disabled"><a><i class="zmdi zmdi-arrow-right"></i></a></li>';
      			}else{
      				$tabla.='<li><a href="'.SERVERURL.'adminlist/'.($pagina+1).'/"><i class="zmdi zmdi-arrow-right"></i></a></li>';
      			}

      			$tabla.='</ul></nav>';
			}

			return $tabla;
		}

		//Controlador para eliminar administrador
		public function eliminar_administrador_controlador(){
			$codigo=mainModel::decryption($_POST['codigo-del']);
			
			$codigo=mainModel::limpiar_cadena($codigo);

			$query1=mainModel::ejecutar_consulta_simple("SELECT DNI FROM sg_administrador WHERE CODIGOCUENTA='$codigo'");
			$datosAdmin=$query1->fetch();
			if($datosAdmin["DNI"]!=71844222) {
				$DelAdmin=administradorModelo::eliminar_administrador_modelo($codigo);
				mainModel::eliminar_bitacora($codigo);
				if ($DelAdmin->rowCount()>=1) {
					$DelCuenta=mainModel::eliminar_cuenta($codigo);
					if ($DelCuenta->rowCount()==1) {
						$alerta=[
							"Alerta"=>"recargar",
							"Titulo"=>"Administrador eliminado",
							"Texto"=>"El administrador fue eliminado con exito del sistema",
							"Tipo"=>"success"
						];
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"No podemos eliminar este cuenta en este momento",
							"Tipo"=>"error"
						];
					}
					
				} else {
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrio un error inesperado",
						"Texto"=>"No podemos eliminar este administrador en este momento",
						"Tipo"=>"error"
					];
				}
				
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No podemos eliminar el administrador principal del sistema",
					"Tipo"=>"error"
				];
			}
			return mainModel::sweet_alert($alerta);
		}

		//Controlador para seleccionar datos o para hacer conteo de datos del administrador
		public function datos_administrador_controlador($tipo,$codigo){
			$codigo=mainModel::decryption($codigo);
			$tipo=mainModel::limpiar_cadena($tipo);

			
			return administradorModelo::datos_administrador_modelo($tipo,$codigo);

		}

		public function actualizar_administrador_controlador(){
			$cuenta=mainModel::decryption($_POST['cuenta-up']);

			$dni=mainModel::limpiar_cadena($_POST['dni-up']);
			$nombre=mainModel::limpiar_cadena($_POST['nombre-up']);
			$apellido=mainModel::limpiar_cadena($_POST['apellido-up']);


			$query1=mainModel::ejecutar_consulta_simple("SELECT * FROM sg_administrador WHERE CUENTACODIGO='$cuenta'");
			$DatosAdmin=$query1->fetch();

			if ($dni!=$DatosAdmin['DNI']){
				$consulta1=mainModel::ejecutar_consulta_simple("SELECT DNI FROM sg_administrador WHERE DNI='$dni'");
				if ($consulta1->rowCount()==1){
					$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrio un error inesperado",
							"Texto"=>"El DNI que acaba de ingresar ya se encuentra registrado en el sistema",
							"Tipo"=>"error"
					];
					return mainModel::sweet_alert($alerta);
					exit();
				}
			}

			$dataAd=[
				"DNI"=>$dni,
				"Nombres"=>$nombre,
				"Apellidos"=>$apellido,
				"Codigo"=>$cuenta
			];

			if(administradorModelo::actualizar_administrador_modelo($dataAd)){
				$alerta=[
					"Alerta"=>"recargar",
					"Titulo"=>"Datos actualizados",
					"Texto"=>"Tus datos han sido actualizados con exito",
					"Tipo"=>"success"
				];
			}else{
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"No hemos podido actualizar tus datos, por favor intente nuevamente",
					"Tipo"=>"error"
				];
			}
			return mainModel::sweet_alert($alerta);
		}
	}