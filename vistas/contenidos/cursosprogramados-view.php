<?php 
  if($_SESSION['tipo_sga']!="Administrador") {
      echo  $lc->forzar_cierre_sesion_controlador(); 
  }
?>
<div class="container-fluid">
    <div class="page-header">
        <h2 class="text-uppercase">
            <i class="zmdi zmdi-assignment-check"></i> Sistema de gestión - asycap ltda s.r.l. <small>Cursos programados</small>
        </h2>
    </div>
</div>
<div class="conteiner-fluid">
    <ul class="nav nav-tabs nav-justified text-titles"  style="font-size: 19px; font-weight:bold;">
        <li class="active">
            <a href="<?php echo SERVERURL; ?>cursosprogramados/">Programar curso</a>
        </li>
        <li>
            <a href="<?php echo SERVERURL; ?>cursosall/">Todos los cursos</a>
        </li>
    </ul>
</div>
<div class="container-fluid"  style="margin: 50px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/pen.png" alt="calendar" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
            Bienvenido a esta sección, aquí podrás programar un curso. Debes de completar el siguiente formulario para programar un curso.
        </div>
    </div>
</div>
<div class="container-fluid">
    <div class="container-flat-form">
        <div class="title-flat-form title-flat-blue text-titles">Programar un curso</div>
        <form action="<?php echo SERVERURL; ?>ajax/programadoAjax.php" data-form="save" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
            <div class="row">
                <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <legend style="font-weight: bold;">Asignar curso</legend>
                    <div class="group-material">
                        <span class="bar" style="color:#E34724; font-size:17px;font-weight: bold;">&nbsp;Curso</span>
                        <select class="material-control tooltips-general btn-sideBar-SubMenu" data-toggle="tooltip" required="" data-placement="top" title="Elige el curso a programar"name="curso-reg">
                          <option value="" disabled="" selected="">Selecciona una opción</option>
                          <option value=""></option>
                          <option value=""></option>
                        </select>
                    </div>
                    <legend style="font-weight: bold;">Asignar docente</legend>
                    <div class="group-material">
                        <span class="bar" style="color:#E34724; font-size:17px; font-weight: bold;">&nbsp;Docente</span>
                        <select class="material-control tooltips-general btn-sideBar-SubMenu" data-toggle="tooltip" required="" data-placement="top" title="Elige el docente a asignar"name="docente-reg">
                            <option value="" disabled="" selected="">Selecciona una opción</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <legend style="font-weight: bold;">Asignar instructor</legend>
                    <div class="group-material">
                        <span class="bar" style="color:#E34724; font-size:17px;font-weight: bold;">&nbsp;Instructor</span>
                        <select class="material-control tooltips-general btn-sideBar-SubMenu" data-toggle="tooltip" required="" data-placement="top" title="Elige el instructor a asignar" name="instructor-reg">
                            <option value="" disabled="" selected="">Selecciona una opción</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <legend style="font-weight: bold;">Asignar estudiante</legend>
                    <div class="group-material">
                        <span class="bar" style="color:#E34724; font-size:17px;font-weight: bold;">&nbsp;Estudiante</span>
                        <select class="material-control tooltips-general btn-sideBar-SubMenu" data-toggle="tooltip" required="" data-placement="top" title="Elige el estudiante a asignar" name="estudiante-reg">
                            <option value="" disabled="" selected="">Selecciona una opción</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <legend style="font-weight: bold;">Asignar período</legend>
                    <div class="group-material">
                        <span class="bar" style="color:#E34724; font-size:17px;font-weight: bold;">&nbsp;Período</span>
                        <select class="material-control tooltips-general btn-sideBar-SubMenu" data-toggle="tooltip" required="" data-placement="top" title="Elige el periodo" name="periodo-reg">
                            <option value="" disabled="" selected="">Selecciona una opción</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                     <legend style="font-weight: bold;">Asignar salón</legend>
                    <div class="group-material">
                        <span class="bar" style="color:#E34724; font-size:17px;font-weight: bold;">&nbsp;Salón</span>
                        <select class="material-control tooltips-general btn-sideBar-SubMenu" data-toggle="tooltip" required="" data-placement="top" title="Elige el salón" name="salon-reg">
                            <option value="" disabled="" selected="">Selecciona una opción</option>
                            <option value=""></option>
                            <option value=""></option>
                        </select>
                    </div>
                    <legend style="font-weight: bold;">Asignar fecha de inicio y fin de clases</legend>
                    <br>
                    <div class="group-material">
                        <input type="date" class="tooltips-general material-control" required=""  data-toggle="tooltip" data-placement="top" 
                        title="Eliga la fecha de inicio de clases del curso" name="fechainicio-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label style="color:#E34724; font-size:17px;font-weight: bold;">Fecha de Inicio</label>
                    </div>
                    <br>
                    <div class="group-material">
                        <input type="date" class="tooltips-general material-control" required=""  data-toggle="tooltip" data-placement="top" 
                        title="Eliga la fecha de fin de clases del curso" name="fechafin-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label style="color:#E34724; font-size:17px;font-weight: bold;">Fecha de Fin</label>
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