<?php 
  if($_SESSION['tipo_sga']!="Administrador") {
      echo  $lc->forzar_cierre_sesion_controlador(); 
  }
?>
<div class="container-fluid">
    <div class="page-header">
      <h2 class="text-uppercase">
          <i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>Sistema de gestión - asycap ltda s.r.l. <small>Administración usuarios</small>
      </h2>
    </div>
</div>
<div class="container-fluid">
    <ul class="nav nav-tabs nav-justified text-titles"  style="font-size: 19px; font-weight:bold;">
      <li role="presentation"><a href="<?php echo SERVERURL; ?>admin/">Administradores</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>instructor/">Instructores</a></li>
      <li role="presentation" class="active"><a href="<?php echo SERVERURL; ?>docente/">Docentes</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>estudiante/">Estudiantes</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>personal/">Personal Administrativo</a></li>
    </ul>
</div>
<div class="container-fluid"  style="margin: 50px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/img/docente.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
           Bienvenido a la sección para registrar un nuevo docente. Para registrar un docente debes de llenar todos los 
           campos del siguiente formulario, también puedes ver el listado de docentes registrados.
        </div>
    </div>
</div>
 <div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb">
              <li class="active">Nuevo docente</li>
              <li><a href="<?php echo SERVERURL; ?>docentelist/">Listado de docentes</a></li>
            </ol>
        </div>
    </div>
</div>
 <!--Formulario pestaña registro de nuevo docente-->
<div class="container-fluid">
    <div class="container-flat-form text-titles">
        <div class="title-flat-form title-flat-blue text-titles">Registrar un nuevo docente</div>
        <form action="<?php echo SERVERURL; ?>ajax/docenteAjax.php" data-form="save" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2 text-titles">
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el número del DNI/CE del docente" pattern="[0-9-]{8,10}" required="" maxlength="10" data-toggle="tooltip" data-placement="top" title="Solamente números. Minímo 08 y máximo 10 dígitos" name="dni-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Número de DNI/CE</label>
                    </div>
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los nombres del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los nombres del docente, solamente letras" name="nombre-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Nombres</label>
                    </div>
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los apellidos del docente" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe los apellidos del docente, solamente letras" name="apellido-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Apellidos</label>
                    </div>
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí la dirección del docente" required="" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{1,100}" maxlength="100" data-toggle="tooltip" data-placement="top" title="Escribe la dirección del docente" name="direccion-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Dirección</label>
                    </div>
                    <div class="group-material">
                        <input type="email" class="material-control tooltips-general" placeholder="Escribe aquí el email del docente" required="" maxlength="320" data-toggle="tooltip" data-placement="top" title="Escribe el email del docente" name="email-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Email</label>
                    </div>
                    <div class="group-material">
                        <input type="tel" class="material-control tooltips-general" placeholder="Escribe aquí el número de teléfono del docente" pattern="[0-9- ]{8,9}" required="" maxlength="9" data-toggle="tooltip" data-placement="top" title="Solamente números" name="telefono-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Teléfono</label>
                    </div>
                    <div class="group-material">
                        <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí la especialidad del docente" required="" maxlength="40" data-toggle="tooltip" data-placement="top" title="Especialidad del docente" name="especialidad-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label>Especialidad</label>
                    </div>
                    <div class="col-xs-12">
                      <label class="control-label" style="color:#E34724; font-size:17px;">Género</label>
                      <div class="radio radio-primary">
                        <label>
                          <input type="radio" name="optionsGenero" id="optionsRadios1" value="Masculino" checked="">
                          <i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
                        </label>
                      </div>
                      <div class="radio radio-primary">
                        <label>
                          <input type="radio" name="optionsGenero" id="optionsRadios2" value="Femenino">
                          <i class="zmdi zmdi-female"></i> &nbsp; Femenino
                        </label>
                      </div>
                    </div>
                    <p class="text-center">
                        <button type="reset" class="btn btn-info btn-raised btn-sm">
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