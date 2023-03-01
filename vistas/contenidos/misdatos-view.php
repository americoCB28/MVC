<div class="container-fluid">
	<div class="page-header">
      <h1 class="text-uppercase">
          <i class="zmdi zmdi-account-circle zmdi-hc-fw"></i>Sistema de gestión - asycap ltda s.r.l. <small>Mis Datos</small>
      </h1>
    </div>
</div>
<div class="container-fluid" style="margin: 50px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/data.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead text-titles">
            Bienvenidos a la seccion <small style="font-weight: bold; font-size: 21px;"><i class="zmdi zmdi-account-circle zmdi-hc-fw"></i>Mis Datos</small>, aquí podrás modificar los datos personales de tu cuenta. Podrás modificar tus datos personales siempre y cuando tengas los permisos necesarios.
        </div>
    </div>
</div>
<!-- Panel mis datos -->
<div class="container-fluid">
	<?php 
		$datos=explode("/", $_GET['views']);

		//Administrador
		if ($datos[1]=="admin"){
		  	if($_SESSION['tipo_sga']!="Administrador") {
		      	echo  $lc->forzar_cierre_sesion_controlador(); 
		  	}

		  	require_once "./controladores/administradorControlador.php";
		  	$classAdmin = new administradorControlador();

		  	$fileA=$classAdmin->datos_administrador_controlador("Unico",$datos[2]);

		  	if ($fileA->rowCount()==1) {
		  		$campos=$fileA->fetch();

		  		if ($campos['CUENTACODIGO']!=$_SESSION['codigo_cuenta_sga']){
		  			//echo  $lc->forzar_cierre_sesion_controlador(); 
		  		} 
	?>
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MIS DATOS</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" data-form="update" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data" >
				<input type="hidden" name="cuenta-up" value="<?php echo $datos[2]; ?>">
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-account-box"></i> &nbsp; Información personal</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12">
						    	<div class="form-group label-floating">
								  	<label class="control-label">DNI *</label>
								  	<input pattern="[0-9-]{8,12}" class="form-control" type="text" name="dni-up" value="<?php echo $campos['DNI']; ?>" required=""maxlength="8">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
						    	<div class="form-group label-floating">
								  	<label class="control-label">Nombres *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" class="form-control" type="text" name="nombre-up" 
								  	value="<?php echo $campos['NOMBRES']; ?>"required="" maxlength="70">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Apellidos *</label>
								  	<input pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{2,70}" class="form-control" type="text" name="apellido-up"
								  	value="<?php echo $campos['APELLIDOS']; ?>" required="" maxlength="70">
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
			    <p class="text-center" style="margin-top: 20px;">
			    	<button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i> Actualizar</button>
			    </p>
			    <div class="RespuestaAjax"></div>
		    </form>
		</div>
	</div>
	<?php }else{ ?>
	<div class="alert alert-dismissible alert-warning text-center">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
		<h4>Lo sentimos</h4>
		<p>No podemos mostrar la informacion solicitada</p>
	</div>
	<?php }		  
		//Usuario
		}elseif ($datos[1]=="user"){
			echo "usuario";
		//Error	
		}else{
	?>
	<div class="alert alert-dismissible alert-warning text-center">
		<button type="button" class="close" data-dismiss="alert">x</button>
		<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
		<h4>Lo sentimos</h4>
		<p>No podemos mostrar la informacion solicitada</p>
	</div>
	<?php } ?>
</div>