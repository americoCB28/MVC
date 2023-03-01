<?php 
  if($_SESSION['tipo_sga']!="Administrador") {
      echo  $lc->forzar_cierre_sesion_controlador(); 
  }
?>
<div class="container-fluid">
    <div class="page-header">
      <h1 class="text-uppercase">
          <i class="zmdi zmdi-balance zmdi-hc-fw"></i>Sistema de gestión - asycap ltda s.r.l. <small>Administración</small>
      </h1>
    </div>
</div>
<div class="container-fluid">
    <ul class="nav nav-tabs nav-justified text-titles"  style="font-size: 21px;font-weight:bold;">
      <li role="presentation" class="active"><a href="<?php echo SERVERURL; ?>sede/">Sedes</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>periodo/">Períodos</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>categoria/">Categorías</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>aula/">Salones</a></li>
    </ul>
</div>
<div class="container-fluid"  style="margin: 50px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/img/institution.png" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead text-titles">
            Guarda los datos de la nueva sede, una vez almacenados los datos no podrás hacer más registros con el mismo codigo.
            Puedes actualizar la información actual, o eliminar el registro completamente y añadir uno nuevo.
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb text-titles" style="color: rgba(22, 184, 176); font-size: 21px; font-weight: bold;">
              <li class="active">Nueva Sede</li>
              <li><a href="<?php echo SERVERURL; ?>sedelist/">Listado de Sedes</a></li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue text-titles">Agregar una nueva sede</div>
        <form action="<?php echo SERVERURL; ?>ajax/sedeAjax.php" data-form="save" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Código de la sede" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{8,10}" maxlength="10" data-toggle="tooltip" data-placement="top" title="Escriba el codigo de la sede. Minimo 8 y máximo 20 caracteres" name="codigo-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Código</label>
                    </div>
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Nombre de la sede" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{10,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el nombre de la sede. Minimo 10 y máximo 50 caracteres" name="nombre-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Nombre</label>
                    </div>
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Dirección de la Sede" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{10,100}" maxlength="100" data-toggle="tooltip" data-placement="top" title="Escribe la dirección de la sede. Minimo 10 y máximo 100 caracteres" name="direccion-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Dirección</label>
                    </div>
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Responsable de la sede" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{10,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el responsable de la sede. Minimo 10 y máximo 50 caracteres" name="responsable-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Responsable</label>
                    </div>
                    <div class="group-material">
                        <input type="tel" class="material-control tooltips-general" placeholder="Teléfono de la sede" required="" pattern="[0-9+]{7,15}" maxlength="15" data-toggle="tooltip" data-placement="top" title="Solo números" name="telefono-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Teléfono</label>
                    </div>
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Año de creación" required="" pattern="[0-9- ]{4,4}"  maxlength="4" data-toggle="tooltip" data-placement="top" title="Solo números, máximo 4 caracteres" name="anio-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Año</label>
                    </div>
                    <p class="text-center">
                        <button type="reset" class="btn btn-info btn-raised btn-sm" style="margin-right: 20px;"><i class="zmdi zmdi-roller"></i> &nbsp;&nbsp; Limpiar</button>
                        <button type="submit" class="btn btn-primary btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar</button>
                    </p> 
               </div>
           </div>
        <div class="RespuestaAjax"></div>
       </form>
    </div>
</div>