<?php 
  if($_SESSION['tipo_sga']!="Administrador") {
      echo  $lc->forzar_cierre_sesion_controlador(); 
  }
?>
<div class="container-fluid">
    <div class="page-header">
      <h2 class="text-uppercase">
          <i class="zmdi zmdi-face zmdi-hc-fw"></i>Sistema de gestión - asycap ltda s.r.l. <small>Administración usuarios</small>
      </h2>
    </div>
</div>
<div class="container-fluid">
    <ul class="nav nav-tabs nav-justified text-titles"  style="font-size: 19px; font-weight:bold;">
      <li role="presentation" class="active"><a href="<?php echo SERVERURL; ?>admin/">Administradores</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>instructor/">Instructores</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>docente/">Docentes</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>estudiante/">Estudiantes</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>personal/">Personal Administrativo</a></li>
    </ul>
</div>
<!-- Listado Administradores -->
 <div class="container-fluid"  style="margin: 50px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/img/administrador.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead text-titles">
           Bienvenido a la sección donde se encuentra el listado de los administradores, puedes desactivar la cuenta 
           de cualquier administrador o eliminar los datos. Ademas puedes modificar los datos siempre y cuando tengas 
           los permisos necesarios.
        </div>
    </div>
</div>
<div class="container-fluid text-titles">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb text-titles">
              <li><a href="<?php echo SERVERURL; ?>admin/">Nuevo Administrador</a></li>
              <li class="active">Listado de Administradores</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid" style="margin: 0 0 0 0;">
    <form class="pull-right" style="width: 40% !important;" autocomplete="off">
        <div class="group-material">
            <input type="search" style="display: inline-block !important; width: 70%;" class="material-control tooltips-general" 
              placeholder="Buscar administrador" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚ ]{4,50}" maxlength="50" data-toggle="tooltip" 
              data-placement="top" title="Escribe los nombres, sin los apellidos. Mínimo 4 palabras.">
            <button class="btn" style="margin: 0; height: 43px; background-color: transparent !important;">
                <i class="zmdi zmdi-search" style="font-size: 25px;"></i>
            </button>
        </div>
    </form>
</div>
<?php 
  require_once "./controladores/administradorControlador.php";
  $insAdmin= new administradorControlador();
?>
<div class="container-fluid">
  <div class="panel panel-success">
  <br>
  <h2 class="text-center text-titles" style="color: rgba(22, 184, 176); font-size: 35px; font-weight: bold;">Lista de Administradores</h2>
  <br>
  <div class="panel-body">
    <?php 
      $pagina = explode("/", $_GET['views']);
      echo $insAdmin->paginador_administrador_controlador($pagina[1],7,$_SESSION['codigo_cuenta_sga']);
    ?>
  </div>
  </div>
</div>