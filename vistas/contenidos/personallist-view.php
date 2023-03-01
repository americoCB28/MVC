<?php 
  if($_SESSION['tipo_sga']!="Administrador") {
      echo  $lc->forzar_cierre_sesion_controlador(); 
  }
?>
<div class="container-fluid">
    <div class="page-header">
      <h2 class="text-uppercase">
          <i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Sistema de gestión - asycap ltda s.r.l. <small>Administración usuarios</small>
      </h2>
    </div>
</div>
<div class="container-fluid">
    <ul class="nav nav-tabs nav-justified text-titles"  style="font-size: 19px; font-weight:bold;">
      <li role="presentation"><a href="<?php echo SERVERURL; ?>admin/">Administradores</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>instructor/">Instructores</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>docente/">Docentes</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>estudiante/">Estudiantes</a></li>
      <li role="presentation" class="active"><a href="<?php echo SERVERURL; ?>personal/">Personal Administrativo</a></li>
    </ul>
</div>
 <!--Información pestaña registro nuevo estudiante-->
<div class="container-fluid"  style="margin: 50px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/img/personal.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
            Bienvenido a la sección donde se encuentra el listado del personal administrativo registrado en el sistema, puedes actualizar 
            algunos datos  o eliminar el registro completo del personal administrativo.<br>
            <strong class="text-danger"><i class="zmdi zmdi-alert-triangle"></i> &nbsp; ¡Importante! </strong>Si eliminas el personal administrativo 
            del sistema se borrarán todos los datos relacionados con él, por ejemplo registros en la bitácora.
        </div>
    </div>
</div>
 <div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
              <li><a href="<?php echo SERVERURL; ?>personal/">Nuevo personal administrativo</a></li>
              <li  class="active">Listado personal administrativo</li>
            </ol>
        </div>
    </div>
</div>
<?php 
    require_once "./controladores/personalControlador.php";
    $insPersonal = new personalControlador();
?>
<div class="container-fluid">
  <div class="panel panel-success">
  <br>
  <h2 class="text-center text-titles" style="color: rgba(22, 184, 176); font-size: 35px; font-weight: bold;">Lista de Personal Administrativo</h2>
  <br>
  <div class="panel-body">
    <?php  
      $pagina = explode("/", $_GET['views']);
      echo $insPersonal->paginador_personal_controlador($pagina[1],7);
    ?>
  </div>
  </div>
</div>