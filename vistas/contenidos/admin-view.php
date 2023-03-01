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
<!--Información pestaña registro nuevo administrador-->
<div class="container-fluid"  style="margin: 50px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/img/administrador.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead text-titles">
            Bienvenido a la sección para registrar nuevos administradores del sistema, debes de 
            llenar todos los campos del siguiente formulario para registrar un administrador.
        </div>
    </div>
</div>
 <div class="container-fluid">
    <div class="row">
        <div class="col-xs-12 lead">
            <ol class="breadcrumb text-titles">
              <li class="active">Nuevo administrador</li>
              <li><a href="<?php echo SERVERURL; ?>adminlist/">Listado de administradores</a></li>
            </ol>
        </div>
    </div>
</div>
 <!--Formulario pestaña registro de nuevo administrador-->
<div class="container-fluid">
  <div class="container-flat-form text-titles">
    <div class="title-flat-form title-flat-blue ">Registrar un nuevo administrador</div>
    <form  action="<?php echo SERVERURL; ?>ajax/administradorAjax.php" data-form="save" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
      <div class="row">
        <div class="col-xs-12 col-sm-8 col-sm-offset-2">
        <legend style="font-weight: bold;"><i class="zmdi zmdi-account-box"></i> &nbsp;Información Personal</legend><br>
        <div class="group-material">
          <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el DNI del administrador" required="" maxlength="10" pattern="[0-9-]{8,10}" data-toggle="tooltip" data-placement="top" title="Escribe el DNI del administrador, solamente números." name="dni-reg">
          <span class="highlight"></span>
          <span class="bar"></span>
          <label style="font-weight: bold;">DNI/CE</label>
       </div>
        <div class="group-material">
          <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los nombres del administrador" required="" maxlength="70" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="tooltip" data-placement="top" title="Escribe los nombres del administrador, solamente letras." name="nombre-reg">
          <span class="highlight"></span>
          <span class="bar"></span>
          <label style="font-weight: bold;">Nombres</label>
       </div>
       <div class="group-material">
          <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los apellidos del administrador" required="" maxlength="70" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,70}" data-toggle="tooltip" data-placement="top" title="Escribe los apellidos del administrador, solamente letras." name="apellido-reg">
          <span class="highlight"></span>
          <span class="bar"></span>
          <label style="font-weight: bold;">Apellidos</label>
        </div>
        <br>
        <legend style="font-weight: bold;"><i class="zmdi zmdi-key"></i> &nbsp; Datos de la cuenta</legend>
        <br>
        <div class="group-material">
          <input type="text" class="material-control tooltips-general input-check-user" placeholder="Escribe aquí el nombre de usuario para iniciar sesión" required="" maxlength="20" pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ]{5,20}" data-toggle="tooltip" data-placement="top" title="Escribe un nombre de usuario sin espacios, que servira para iniciar sesión. Mínimo 5 y máximo 20 caracteres." name="usuario-reg">
          <span class="highlight"></span>
          <span class="bar"></span>
          <label style="font-weight: bold;">Nombre de usuario</label>
        </div>
        <div class="group-material">
          <input type="password" class="material-control tooltips-general" placeholder="Escribe aqui su contraseña para iniciar sesión" required="" pattern=".{6,20}" maxlength="20" data-toggle="tooltip" data-placement="top" title="Escribe una contraseña, minimo 6 y máximo 20 caracteres." name="contra1-reg">
          <span class="highlight"></span>
          <span class="bar"></span>
          <label style="font-weight: bold;">Contraseña</label>
        </div>
        <div class="group-material">
          <input type="password" class="material-control tooltips-general" placeholder="Repite la contraseña" required="" pattern=".{6,20}" maxlength="20" data-toggle="tooltip" data-placement="top" title="Repite la contraseña, minimo 6 y máximo 20 caracteres." name="contra2-reg">
          <span class="highlight"></span>
          <span class="bar"></span>
          <label style="font-weight: bold;">Repetir contraseña</label>
        </div>
        <div class="group-material">
          <input type="email" class="material-control tooltips-general" placeholder="Escribe aquí el E-mail del administrador" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el Email del administrador" required="" name="email-reg">
          <span class="highlight"></span>
          <span class="bar"></span>
          <label style="font-weight: bold;">Email</label>
        </div>
        <div class="col-xs-12">
          <label class="control-label" style="color:#E34724; font-size:17px; font-weight: bold;">Género</label>
          <div class="radio radio-primary">
            <label style="color:#333333; font-size:17px;">
              <input type="radio" name="optionsGenero" id="optionsRadios1" value="Masculino" checked="">
              <i class="zmdi zmdi-male-alt"></i> &nbsp; Masculino
            </label>
          </div>
          <div class="radio radio-primary">
            <label style="color:#333333; font-size:17px;">
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