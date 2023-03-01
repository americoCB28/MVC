<?php 
	if ($peticionAjax) {
		require_once "../modelos/cursoModelo.php";
	}else{
		require_once "./modelos/cursoModelo.php";
	}

	/**
	 * 
	 */
	class cursoControlador extends cursoModelo{
		
		public function agregar_curso_controlador(){

			$categoria=mainModel::decryption($_POST['categoria-reg']);
            
			$codigo=mainModel::limpiar_cadena($_POST['codigo-reg']);
			$titulo=mainModel::limpiar_cadena($_POST['nombre-reg']);
			$horas=mainModel::limpiar_cadena($_POST['horas-reg']);
            
			$precio=mainModel::limpiar_cadena($_POST['precio-reg']);
            $precio=number_format($precio, 2, '.', '');
            
			$estado=mainModel::limpiar_cadena($_POST['optionsEstado']);
            
			$sede=mainModel::decryption($_POST['sede-reg']);

			$descarga=mainModel::limpiar_cadena($_POST['optionsPDF']);
            
            /* Verificando el codigo del curso */
			$consulta1=mainModel::ejecutar_consulta_simple("SELECT CODCURSO FROM sg_cursos WHERE CODCURSO='$codigo'");

			if ($consulta1->rowCount()>=1) {	
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrio un error inesperado",
					"Texto"=>"El codigo del curso que acaba de ingresar ya se encuentra resgistrado en el sistema ",
					"Tipo"=>"error"
				];
                return mainModel::sweet_alert($alerta);	
                exit();
            }
            
            /* Verificando el titulo del curso */
			$consulta2=mainModel::ejecutar_consulta_simple("SELECT CODCURSO FROM sg_cursos WHERE NOMBRE='$titulo'");
			if($consulta2->rowCount()>=1){
				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"El título que acaba de ingresar corresponden a otro curso que ya se encuentra registrado en el sistema.",
					"Tipo"=>"error"
				];
				return mainModel::sweet_alert($alerta);
				exit();
			}
            
          
            
            /* Valores en KB para peso maximo de archivos */
			$imgMaxSize=1024;
			$pdfMaxSize=10240;


			/* Directorios de archivos */
			$imgDir='../adjuntos/img/';
			$pdfDir='../adjuntos/pdf/';
            
            $consulta3=mainModel::ejecutar_consulta_simple("SELECT CODCURSO FROM sg_cursos");
			$numero=($consulta3->rowCount())+1;

			$fileCodigo=mainModel::generar_codigo_aleatorio("FL",10,$numero);
            
            /* Cargando imagen si se ha seleccionado */
			if($_FILES['imagen']['name']!="" && $_FILES['imagen']['size']>0){
				if($_FILES['imagen']['type']=="image/jpeg" || $_FILES['imagen']['type']=="image/png"){
					if(($_FILES['imagen']['size']/1024)<=$imgMaxSize){

						switch ($_FILES['imagen']['type']) {
			              case 'image/jpeg':
			                $imgExt=".jpg";
			              break;
			              case 'image/png':
			                $imgExt=".png";
			              break;
			            }

						chmod($imgDir, 0777);
						$imgFinalName=$fileCodigo.$imgExt;

						if(!move_uploaded_file($_FILES['imagen']['tmp_name'], $imgDir.$imgFinalName)){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"No podemos subir la imagen al sistema en este momento, por favor intente nuevamente.",
								"Tipo"=>"error"
							];
							return mainModel::sweet_alert($alerta);
							exit();
						}
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"La imagen que ha seleccionado supera el límite de peso permitido.",
							"Tipo"=>"error"
						];
						return mainModel::sweet_alert($alerta);
						exit();
					}
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"La imagen que ha seleccionado es de un formato que no está permitido.",
						"Tipo"=>"error"
					];
					return mainModel::sweet_alert($alerta);
					exit();
				}
			}else{
				$imgFinalName="default.png";
			}
            
            /* Cargando pdf si se ha seleccionado */
			if($_FILES['pdf']['name']!="" && $_FILES['pdf']['size']>0){
				if($_FILES['pdf']['type']=="application/pdf"){
					if(($_FILES['pdf']['size']/10240)<=$pdfMaxSize){

						chmod($pdfDir, 0777);
						$pdfFinalName=$fileCodigo.".pdf";

						if(!move_uploaded_file($_FILES['pdf']['tmp_name'], $pdfDir.$pdfFinalName)){
							$alerta=[
								"Alerta"=>"simple",
								"Titulo"=>"Ocurrió un error inesperado",
								"Texto"=>"No podemos subir el archivo PDF al sistema en este momento, por favor intente nuevamente.",
								"Tipo"=>"error"
							];
							return mainModel::sweet_alert($alerta);
							exit();
						}
					}else{
						$alerta=[
							"Alerta"=>"simple",
							"Titulo"=>"Ocurrió un error inesperado",
							"Texto"=>"El archivo PDF que ha seleccionado supera el límite de peso permitido.",
							"Tipo"=>"error"
						];
						return mainModel::sweet_alert($alerta);
						exit();
					}
				}else{
					$alerta=[
						"Alerta"=>"simple",
						"Titulo"=>"Ocurrió un error inesperado",
						"Texto"=>"El archivo PDF que ha seleccionado es de un formato que no está permitido.",
						"Tipo"=>"error"
					];
					return mainModel::sweet_alert($alerta);
					exit();
				}
			}else{
				$descarga="No";
				$pdfFinalName="";
			}
            
            $datosCurso=[
				"Categoria"=>$categoria,
				"Codigo"=>$codigo,
				"Titulo"=>$titulo,
				"Horas"=>$horas,
				"Precio"=>$precio,
				"Estado"=>$estado,
				"Sede"=>$sede,
				"Imagen"=>$imgFinalName,
				"PDF"=>$pdfFinalName,
				"Descarga"=>$descarga
			];

			$guardarCurso=cursoModelo::agregar_curso_modelo($datosCurso);

			if($guardarCurso->rowCount()==1){
				$alerta=[
					"Alerta"=>"limpiar",
					"Titulo"=>"¡Curso registrado!",
					"Texto"=>"Los datos del curso fueron registrados en el sistema con éxito.",
					"Tipo"=>"success"
				];
			}else{

				if(is_file($imgDir.$imgFinalName)){
					chmod($imgDir.$imgFinalName, 0777);
					unlink($imgDir.$imgFinalName);
				}

				if(is_file($pdfDir.$pdfFinalName)){
					chmod($pdfDir.$pdfFinalName, 0777);
					unlink($pdfDir.$pdfFinalName);
				}

				$alerta=[
					"Alerta"=>"simple",
					"Titulo"=>"Ocurrió un error inesperado",
					"Texto"=>"No hemos podido almacenar los datos del curso en el sistema, por favor intente nuevamente.",
					"Tipo"=>"error"
				];
			}
			return mainModel::sweet_alert($alerta);
		}
        
        /*----------  Controlador datos curso  ----------*/
		public function datos_curso_controlador($tipo,$codigo){
			$codigo=mainModel::decryption($codigo);
			
			$codigo=mainModel::limpiar_cadena($codigo);
			$tipo=mainModel::limpiar_cadena($tipo);

			return cursoModelo::datos_curso_modelo($tipo,$codigo);
		}
	}