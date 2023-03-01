<?php 
  if($_SESSION['tipo_sga']!="Administrador") {
      echo  $lc->forzar_cierre_sesion_controlador(); 
  }
?>
<div class="container-fluid">
  <div class="page-header">
    <h1 class="text-uppercase">
      <i class="zmdi zmdi-timer zmdi-hc-fw"></i>Sistema de gestión - asycap ltda s.r.l. <small>Administración</small>
    </h1>
  </div>
</div>
<div class="container-fluid">
  <ul class="nav nav-tabs nav-justified text-titles"  style="font-size: 21px;font-weight:bold;">
    <li role="presentation"><a href="<?php echo SERVERURL; ?>sede/">Sedes</a></li>
    <li role="presentation" class="active"><a href="<?php echo SERVERURL; ?>periodo/">Períodos</a></li>
    <li role="presentation"><a href="<?php echo SERVERURL; ?>categoria/">Categorías</a></li>
    <li role="presentation"><a href="<?php echo SERVERURL; ?>aula/">Salones</a></li>
  </ul>
</div>
<div class="container-fluid"  style="margin: 50px 0;">
  <div class="row">
    <div class="col-xs-12 col-sm-4 col-md-3">
      <img src="<?php echo SERVERURL; ?>/vistas/assets/img/periodo.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
    </div>
    <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead text-titles">
      Bienvenido a la sección para registrar un nuevo periodo, debes de llenar 
      todos los campos del siguiente formulario para poder registrar un periodo.
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 lead">
      <ol class="breadcrumb text-titles" style="color: rgba(22, 184, 176); font-size: 21px; font-weight: bold;">
        <li class="active">Nuevo periodo</li>
        <li><a href="<?php echo SERVERURL; ?>periodolist/">Listado de periodos</a></li>
      </ol>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="container-flat-form">
    <div class="title-flat-form title-flat-blue text-titles">Agregar un nuevo periodo</div>
    <form action="<?php echo SERVERURL; ?>ajax/periodoAjax.php" data-form="save" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
          <div class="group-material">
            <input type="text" class="material-control tooltips-general" placeholder="Código del periodo" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{8,10}" maxlength="10" data-toggle="tooltip" data-placement="top" title="Escribe el codigo del periodo, máximo 10 caracteres" name="codigo-reg">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Código</label>
          </div>
          <div class="group-material">
            <input type="date" class="material-control tooltips-general" required="" data-toggle="tooltip" data-placement="top" title="Eliga la fecha de inicio"name="fechainicio-reg">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Fecha inicio</label>
          </div>
          <div class="group-material">
            <input type="date" class="material-control tooltips-general" required="" data-toggle="tooltip" data-placement="top" title="Eliga la fecha de fin"  name="fechafin-reg">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Fecha fin</label>
          </div>
          <div class="col-xs-12">
            <label class="control-label" style="color:#E34724; font-size:17px; font-weight: bold;">Estado</label>
            <div class="radio radio-primary">
              <label style="color:#333333; font-size:17px;">
                <input type="radio" name="optionsEstado" id="optionsRadios1" value="Activo" checked="">
                <i class="zmdi zmdi-thumb-up"></i> &nbsp; Activo
              </label>
            </div>
            <div class="radio radio-primary">
              <label style="color:#333333; font-size:17px;">
                <input type="radio" name="optionsEstado" id="optionsRadios2" value="Inactivo">
                <i class="zmdi zmdi-thumb-down"></i> &nbsp; Inactivo
              </label>
            </div>
          </div>
          <p class="text-center">
            <button type="reset" class="btn btn-info btn-raised btn-sm" style="margin-right: 20px;">
              <i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar
            </button>
            <button type="submit" class="btn btn-primary btn-raised btn-sm">
              <i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar
            </button>
          </p> 
        </div>
      </div>
      <div class="RespuestaAjax"></div>
   </form>
  </div>
</div>