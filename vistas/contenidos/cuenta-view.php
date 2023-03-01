<div class="container-fluid">
	<div class="page-header">
      <h1 class="text-uppercase">
          <i class="zmdi zmdi-settings zmdi-hc-fw"></i>Sistema de gestión - asycap ltda s.r.l. <small>Mi Cuenta</small>
      </h1>
    </div>
</div>
<div class="container-fluid" style="margin: 50px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/account.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead text-titles">
            Bienvenidos a la seccion <small style="font-weight: bold; font-size: 21px;"><i class="zmdi zmdi-settings zmdi-hc-fw"></i>Mi Cuenta</small>, aquí podrás modificar los datos de tu cuenta. Recuerda que estos
			datos sirven para iniciar sesión en el sistema.
        </div>
    </div>
</div>
<?php 
	$datos=explode("/", $_GET['views']);

	if(isset($datos[1]) && ($datos[1]=="admin" || $datos[1]=="user")):


		require_once "./controladores/cuentacontrolador.php";
		$claseCuenta = new cuentaControlador();

		$filesC=$claseCuenta->datos_cuenta_controlador($datos[2],$datos[1]);

		if($filesC->rowCount()==1){
			$campos=$filesC->fetch();

?>
<!-- Panel mi cuenta -->
<div class="container-fluid">
	<div class="panel panel-success">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; MI CUENTA</h3>
		</div>
		<div class="panel-body">
			<form action="<?php echo SERVERURL; ?>ajax/cuentaAjax.php" method="POST" data-form="update" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
				<?php 
					if($_SESSION['codigo_cuenta_sga']!=$campos['CUENTACODIGO']){
						if ($_SESSION['tipo_sga']!="Administrador") {
							echo  $lc->forzar_cierre_sesion_controlador(); 
						}else{
							echo '<input type="hidden" name="privilegio-up" value="verdadero">';
						}
					}

				?>
				<input type="hidden" name="codigoCuenta-up" value="<?php echo $datos[2]?>">
				<input type="hidden" name="tipoCuenta-up" value="<?php echo $lc->encryption($datos[1]); ?>">		
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12 col-sm-6">
					    		<div class="form-group label-floating">
								  	<label class="control-label">Nombre de usuario</label>
								  	<input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{1,15}" class="form-control" type="text" name="usuario-up" value="<?php echo $campos['CUENTAUSUARIO']; ?>" required="" maxlength="15">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">E-mail</label>
								  	<input class="form-control" type="email" name="email-up" value="<?php echo $campos['CUENTAEMAIL']; ?>" maxlength="50">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="control-label">Genero</label>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="optionsGenero-up" <?php if($campos['CUENTAGENERO']=="Masculino"){ echo 'checked=""';} ?> value="Masculino" >
											<i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
										</label>
									</div>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="optionsGenero-up" <?php if($campos['CUENTAGENERO']=="Femenino"){ echo 'checked=""';} ?> value="Femenino" >
											<i class="zmdi zmdi-female"></i> &nbsp; Femenino
										</label>
									</div>
								</div>
		    				</div>
		    				<?php  if($_SESSION['tipo_sga']=="Administrador"  && $campos['ID']!=1) : ?>
							<div class="col-xs-12 col-sm-6">
								<div class="form-group">
									<label class="control-label">Estado de la cuenta</label>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="optionsEstado-up" <?php if($campos['CUENTAESTADO']=="Activo"){ echo 'checked=""';} ?> value="Activo" >
											<i class="zmdi zmdi-lock-open"></i> &nbsp; Activo
										</label>
									</div>
									<div class="radio radio-primary">
										<label>
											<input type="radio" name="optionsEstado-up" <?php if($campos['CUENTAESTADO']=="Deshabilitado"){ echo 'checked=""';} ?> value="Deshabilitado"  >
											<i class="zmdi zmdi-lock"></i> &nbsp; Deshabilitado
										</label>
									</div>
								</div>
		    				</div>
		    				<?php endif;  ?>
		    			</div>
		    		</div>
		    	</fieldset>
		    	<br>
		    	<fieldset>
		    		<legend><i class="zmdi zmdi-lock"></i> &nbsp; Actualizar Contraseña</legend>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Nueva contraseña *</label>
								  	<input class="form-control" type="password" name="newPassword1-up" maxlength="20" pattern=".{6,20}">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Repita la nueva contraseña *</label>
								  	<input class="form-control" type="password" name="newPassword2-up" maxlength="20" pattern=".{6,20}">
								</div>
		    				</div>
		    			</div>
		    		</div>
		    	</fieldset>
				<br>
				<fieldset>
		    		<legend><i class="zmdi zmdi-account-circle"></i> &nbsp; Datos de la cuenta</legend>
		    		<p>
						Para poder actualizar los datos de la cuenta por favor ingrese su nombre de usuario y contraseña.
		    		</p>
		    		<div class="container-fluid">
		    			<div class="row">
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Nombre de usuario</label>
								  	<input class="form-control" maxlength="20" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{5,20}" type="text" name="user-log" required="">
								</div>
		    				</div>
		    				<div class="col-xs-12 col-sm-6">
								<div class="form-group label-floating">
								  	<label class="control-label">Contraseña</label>
								  	<input class="form-control" type="password" name="password-log" pattern=".{6,20}" maxlength="20" required="">
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
</div>
<?php  }else{  ?>
<div class="alert alert-dismissible alert-warning text-center">
	<button type="button" class="close" data-dismiss="alert">x</button>
	<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
	<h4>Error de cuenta</h4>
	<p>Lo sentimos, la cuenta seleccionada no existe</p>
</div>
<?php }
	else:
?>
<div class="alert alert-dismissible alert-warning text-center">
	<button type="button" class="close" data-dismiss="alert">x</button>
	<i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
	<h4>Error de parametros</h4>
	<p>No podemos mostrar la informacion solicitada</p>
</div>
<?php endif; ?>