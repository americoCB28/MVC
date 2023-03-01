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
<div class="container-fluid"  style="margin: 50px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/img/institution.png" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead text-titles">
           Bienvenidos a la seccion para actualizar una sede. Tiene que llenar el formulario correctamente para actualizar los datos de la sede.
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb text-titles" style="color: rgba(22, 184, 176); font-size: 21px; font-weight: bold;">
              <li><a href="<?php echo SERVERURL; ?>sede/">Nueva Sede</a></li>
              <li class="active">Listado de Sedes</li>
            </ol>
        </div>
    </div>
</div>
<?php 
    require_once "./controladores/sedeControlador.php";

    $iSe = new sedeControlador();

    $datos=explode("/", $_GET['views']);

    $fileSe=$iSe->datos_sede_controlador("Unico",$datos[1]);

    if ($fileSe->rowCount()==1) {

        $campos=$fileSe->fetch();
?>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-green text-titles"><i class="zmdi zmdi-refresh"></i>&nbsp;&nbsp;Actualizar datos de la sede</div>
        <form action="<?php echo SERVERURL; ?>ajax/sedeAjax.php" data-form="update" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
            <input type="hidden" name="codigo" value="<?php echo $datos[1]; ?>">
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Código de la sede" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{8,10}" maxlength="10" data-toggle="tooltip" data-placement="top" title="Escriba el codigo de la sede. Minimo 8 y máximo 20 caracteres" name="codigo-up" value="<?php echo $campos['CODSEDE']; ?>">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Código</label>
                    </div>
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Nombre de la sede" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{10,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el nombre de la sede. Minimo 10 y máximo 50 caracteres" name="nombre-up" value="<?php echo $campos['NOMSEDE']; ?>">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Nombre</label>
                    </div>
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Dirección de la Sede" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{10,100}" maxlength="100" data-toggle="tooltip" data-placement="top" title="Escribe la dirección de la sede. Minimo 10 y máximo 100 caracteres" name="direccion-up"value="<?php echo $campos['DIRSEDE']; ?>">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Dirección</label>
                    </div>
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Responsable de la sede" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{10,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el responsable de la sede. Minimo 10 y máximo 50 caracteres" name="responsable-up" value="<?php echo $campos['RESPOSEDE']; ?>">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Responsable</label>
                    </div>
                    <div class="group-material">
                        <input type="tel" class="material-control tooltips-general" placeholder="Teléfono de la sede" required="" pattern="[0-9+]{7,15}" maxlength="15" data-toggle="tooltip" data-placement="top" title="Solo números" name="telefono-up" value="<?php echo $campos['TELSEDE']; ?>">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Teléfono</label>
                    </div>
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Año de creación" required="" pattern="[0-9- ]{4,4}"  maxlength="4" data-toggle="tooltip" data-placement="top" title="Solo números, máximo 4 caracteres" name="anio-up" value="<?php echo $campos['ANIOSEDE']; ?>">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Año</label>
                    </div>
                    <p class="text-center">
                       <button type="submit" class="btn btn-success btn-raised btn-sm"><i class="zmdi zmdi-refresh"></i>&nbsp;&nbsp;Actualizar</button>
                    </p> 
               </div>
           </div>
        <div class="RespuestaAjax"></div>
       </form>
    </div>
</div>
<?php }else{ ?>
<div class="alert alert-dismissible alert-warning text-center">
    <button type="button" class="close" data-dismiss="alert">x</button>
    <i class="zmdi zmdi-alert-triangle zmdi-hc-5x"></i>
    <h4>Lo sentimos</h4>
    <p>No podemos mostrar la información de la sede en estos momentos</p>
</div>
<?php } ?>
