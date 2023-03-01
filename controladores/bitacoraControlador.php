<?php 
	if ($peticionAjax){
		require_once "../core/mainModel.php";
	}else{
		require_once "./core/mainModel.php";
	}

	class bitacoraControlador extends mainModel{

		public function listado_bitacora_controlador($registros){
			$registros=mainModel::limpiar_cadena($registros);

			$datos=mainModel::ejecutar_consulta_simple("SELECT * FROM sg_bitacora ORDER BY ID DESC LIMIT $registros");

			$conteo=1;

			while($rows=$datos->fetch()){

				$datosC=mainModel::ejecutar_consulta_simple("SELECT * FROM sg_cuenta WHERE CUENTACODIGO='".$rows['CUENTACODIGO']."'");
				$datosC=$datosC->fetch();

				if ($rows['BITACORATIPO']=="Administrador") {
					$datosU=mainModel::ejecutar_consulta_simple("SELECT NOMBRES, APELLIDOS FROM sg_administrador WHERE CUENTACODIGO='".$rows['CUENTACODIGO']."'");
					$datosU=$datosU->fetch();
					$nombreCompleto=$datosU['NOMBRES']." ".$datosU['APELLIDOS'];
				}else{
					$datosU=mainModel::ejecutar_consulta_simple("SELECT NOMBRES, APELLIDOS FROM sg_estudiante WHERE DNI='".$rows['DNI']."'");
					$datosU=$datosU->fetch();
					$nombreCompleto=$datosU['NOMBRES']." ".$datosU['APELLIDOS'];
				}

				echo '
					<div class="cd-timeline-block">
			            <div class="cd-timeline-img">
			                <img src="'.SERVERURL.'vistas/assets/avatars/'.$datosC['CUENTAFOTO'].'" alt="user-picture">
			            </div>
			            <div class="cd-timeline-content">
			                <h4 class="text-center text-titles"><strong style="font-size:21px; ">N° '.$conteo.' </strong></h4>
			                <h4 class="text-center text-titles"><strong>Usuario: </strong>'.$datosC['CUENTAUSUARIO'].'</h4>
			                <h4 class="text-center text-titles"><strong>Nombre Completo: </strong>'.$nombreCompleto.'</h4>
			                <h4 class="text-center text-titles"><strong>Tipo Usuario: </strong>'.$datosC['CUENTATIPO'].'</h4>
			                <p class="text-center">
			                    <i class="zmdi zmdi-timer zmdi-hc-fw"></i> Inicio: <em>'.$rows['BITACORAHORAINICIO'].'</em> &nbsp;&nbsp;&nbsp; 
			                    <i class="zmdi zmdi-time zmdi-hc-fw"></i> Fin: <em>'.$rows['BITACORAHORAFINAL'].'</em>
			                </p>
			                <span class="cd-date"><i class="zmdi zmdi-calendar-note zmdi-hc-fw"></i>'.date("d/m/Y",strtotime($rows['BITACORAFECHA'])).'</span>
			            </div>
			        </div>
				';
				$conteo++;
			}
		}
	}