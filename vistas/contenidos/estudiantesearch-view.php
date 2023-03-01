<div class="container-fluid">
	<div class="page-header">
	  <h2 class="text-uppercase">
	  	<i class="zmdi zmdi-search zmdi-hc-fw"></i> Sistema de gestión - asycap ltda s.r.l. <small>Buscar estudiante</small>
	  </h2>
	</div>
</div>
<div class="container-fluid">
    <ul class="nav nav-tabs nav-justified text-titles"  style="font-size: 19px; font-weight:bold;">
      <li role="presentation"><a href="<?php echo SERVERURL; ?>admin/">Administradores</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>instructor/">Instructores</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>docente/">Docentes</a></li>
      <li role="presentation" class="active"><a href="<?php echo SERVERURL; ?>estudiante/">Estudiantes</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>personal/">Personal Administrativo</a></li>
    </ul>
</div>
<!--Información pestaña registro nuevo estudiante-->
<div class="container-fluid"  style="margin: 50px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/img/estudiantes.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
            Bienvenido a la sección donde puedes buscar los estudiantes del sistema.
            Puedes buscarlo por nombre, apellidos, email o DNI.
        </div>
    </div>
</div>
 <div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
              <li><a href="<?php echo SERVERURL; ?>estudiante/">Nuevo estudiante</a></li>
              <li><a href="<?php echo SERVERURL; ?>estudiantelist/">Listado de estudiantes</a></li>
              <li class="active">Buscar estudiante</li>
            </ol>
        </div>
    </div>
</div>
<?php 
	if(!isset($_SESSION['busqueda_estudiante']) && 
		empty($_SESSION['busqueda_estudiante'])): 
?>
<div class="container-fluid">
	<form class="well FormularioAjax" action="<?php echo SERVERURL;?>ajax/buscadorAjax.php" method="POST" data-form="default" autocomplete="off" enctype="multipart/form-data">
		<div class="row">
			<div class="col-xs-12 col-md-8 col-md-offset-2">
				<div class="form-group label-floating">
					<span class="control-label" style="font-weight: bold; font-size: 21px;">¿Qué estudiante estás buscando?</span>
					<input class="form-control" type="text" name="busqueda_inicial_estudiante" required="" placeholder="Escribe aqui el nombre, apellidos, email o DNI del estudiante para buscarlo en el sistema">
				</div>
			</div>
			<div class="col-xs-12">
				<p class="text-center">
					<button type="submit" class="btn btn-primary btn-raised btn-sm"><i class="zmdi zmdi-search"></i> &nbsp; Buscar</button>
				</p>
			</div>
		</div>
		<div class="RespuestaAjax"></div>
	</form>
</div>
<?php else: ?>
<div class="container-fluid">
	<form class="well FormularioAjax" action="<?php echo SERVERURL; ?>ajax/buscadorAjax.php" method="POST" data-form="default" autocomplete="off" enctype="multipart/form-data">
		<p class="lead text-center">Su última búsqueda  fue <strong>"<?php echo $_SESSION['busqueda_estudiante']; ?>"</strong></p>
		<div class="row">
			<input type="hidden" name="eliminar_busqueda_estudiante" value="destruir">
			<div class="col-xs-12">
				<p class="text-center">
					<button type="submit" class="btn btn-danger btn-raised btn-sm"><i class="zmdi zmdi-delete"></i> &nbsp; Eliminar búsqueda</button>
				</p>
			</div>
		</div>
		<div class="RespuestaAjax"></div>
	</form>
</div>
<!-- Panel listado de busqueda de administradores -->
<div class="container-fluid">
	<div class="panel panel-primary">
		<div class="panel-heading">
			<h3 class="panel-title"><i class="zmdi zmdi-search"></i> &nbsp; BUSCAR ESTUDIANTE</h3>
		</div>
		<div class="panel-body">
			<?php 
				require_once "./controladores/estudianteControlador.php";
				$insEstudiante = new estudianteControlador();

				$pagina = explode("/", $_GET['views']);
				echo $insEstudiante->paginador_estudiante_controlador($pagina[1],7,$_SESSION['busqueda_estudiante']);
			?>	
		</div>
	</div>
</div>
<?php endif; ?>