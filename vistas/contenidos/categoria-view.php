<?php 
  if($_SESSION['tipo_sga']!="Administrador") {
      echo  $lc->forzar_cierre_sesion_controlador(); 
  }
?>
<div class="container-fluid">
  <div class="page-header">
    <h1 class="text-uppercase">
      <i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>Sistema de gestión - asycap ltda s.r.l. <small>Administración</small>
    </h1>
  </div>
</div>
<div class="container-fluid">
  <ul class="nav nav-tabs nav-justified text-titles"  style="font-size: 21px;font-weight:bold;">
    <li role="presentation"><a href="<?php echo SERVERURL; ?>sede/">Sedes</a></li>
    <li role="presentation"><a href="<?php echo SERVERURL; ?>periodo/">Períodos</a></li>
    <li role="presentation" class="active"><a href="<?php echo SERVERURL; ?>categoria/">Categorías</a></li>
    <li role="presentation"><a href="<?php echo SERVERURL; ?>aula/">Salones</a></li>
  </ul>
</div>
<!-- Cuerpo Categoría -->
<div class="container-fluid"  style="margin: 50px 0;">
  <div class="row">
    <div class="col-xs-12 col-sm-4 col-md-3">
      <img src="<?php echo SERVERURL; ?>/vistas/assets/img/categoria.png" class="img-responsive center-box" style="max-width: 110px;">
    </div>
    <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead text-titles">
      Bienvenido a la sección para registrar nuevas categorías de cursos, debes de llenar el siguiente formulario para registrar una categoría.
    </div>
  </div>
</div>
 <div class="container-fluid">
  <div class="row">
    <div class="col-xs-12 lead">
      <ol class="breadcrumb text-titles" style="color: rgba(22, 184, 176); font-size: 21px; font-weight: bold;">
        <li class="active">Nueva categoría</li>
        <li><a href="<?php echo SERVERURL; ?>categorialist/">Listado de categorías</a></li>
      </ol>
    </div>
  </div>
</div>
<div class="container-fluid">
  <div class="container-flat-form">
    <div class="title-flat-form title-flat-blue text-titles">Agregar una nueva categoría</div>
    <form action="<?php echo SERVERURL; ?>ajax/categoriaAjax.php" data-form="save" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
      <div class="row">
       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
          <div class="group-material">
            <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el código de categoría"  required="" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ ]{5,30}" maxlength="30" data-toggle="tooltip" data-placement="top" title="Escribe el codigo de la categoría. Minino 5 y máximo 30 caracteres" name="codigo-reg">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Código de categoría</label>
          </div>
          <div class="group-material">
            <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el nombre de la categoría" required="" pattern="[a-zA-z0-9áéíóúÁÉÍÓÚñÑ ]{1,100}" maxlength="100" data-toggle="tooltip" data-placement="top" title="Escribe el nombre de la categoría" name="nombre-reg">
            <span class="highlight"></span>
            <span class="bar"></span>
            <label>Nombre</label>
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