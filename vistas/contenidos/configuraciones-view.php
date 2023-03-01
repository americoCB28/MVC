<?php 
  if($_SESSION['tipo_sga']!="Administrador") {
      echo  $lc->forzar_cierre_sesion_controlador(); 
  }
?>
<div class="container-fluid">
    <div class="page-header">
      <h1 class="text-uppercase" style="font-size:32px;">
          <i class="zmdi zmdi-wrench zmdi-hc-fw"></i>Sistema de gestión - asycap ltda s.r.l.<small>configuraciones avanzadas</small>
      </h1>
    </div>
</div>
 <ul class="nav nav-tabs nav-justified text-titles" role="tablist" style="font-size: 21px;font-weight:bold;">
    <li role="presentation" class="active"><a href="#security" aria-controls="security" role="tab" data-toggle="tab">Seguridad</a></li>
    <li role="presentation"><a href="#others" aria-controls="others" role="tab" data-toggle="tab">Otras opciones</a></li>
</ul>
<div class="tab-content">
    <div role="tabpanel" class="tab-pane fade in active" id="security">
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <p class="text-center text-danger"><i class="zmdi zmdi-shield-security zmdi-hc-5x"></i></p>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead text-titles">
                    Puedes realizar copias de seguridad de la base de datos en cualquier momento, también puedes restaurar el sistema a un punto de restauración que hayas creado previamente.
                </div>
            </div>
        </div>  
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-md-6">
                    <div class="report-content">
                        <p class="text-center"><i class="zmdi zmdi-cloud-download zmdi-hc-4x"></i></p>
                        <h3 class="text-center text-titles text-uppercase">realizar copia de seguridad</h3>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="report-content">
                        <p class="text-center"><i class="zmdi zmdi-cloud-upload zmdi-hc-4x"></i></p>
                        <h3 class="text-center text-titles text-uppercase">restaurar el sistema</h3>
                    </div>
                </div>
                <div class="col-xs-12 col-md-6">
                    <div class="report-content">
                        <p class="text-center"><i class="zmdi zmdi-cloud-off zmdi-hc-4x"></i></p>
                        <h3 class="text-center text-titles text-uppercase">borrar copias de seguridad</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div role="tabpanel" class="tab-pane fade" id="others">
        <div class="container-fluid"  style="margin: 50px 0;">
            <div class="row">
                <div class="col-xs-12 col-sm-4 col-md-3">
                    <p class="text-center text-danger"><i class="zmdi zmdi-fire zmdi-hc-5x"></i></p>
                </div>
                <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead text-titles">
                    En esta sección se muestran opciones avanzadas para eliminar grandes cantidades de datos. Eliminarás todos los datos registrados en el sistema de la opción que elijas. .
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="report-content">
                        <p class="text-center"><i class="zmdi zmdi-airline-seat-recline-normal zmdi-hc-4x"></i></p>
                        <h3 class="text-center text-titles text-uppercase">eliminar instructores</h3>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="report-content">
                        <p class="text-center"><i class="zmdi zmdi-male-alt zmdi-hc-4x"></i></p>
                        <h3 class="text-center text-titles text-uppercase">eliminar docentes</h3>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="report-content">
                        <p class="text-center"><i class="zmdi zmdi-accounts-alt zmdi-hc-4x"></i></p>
                        <h3 class="text-center text-titles text-uppercase">eliminar estudiantes</h3>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="report-content">
                        <p class="text-center"><i class="zmdi zmdi-male-female zmdi-hc-4x"></i></p>
                        <h3 class="text-center text-titles text-uppercase">eliminar personal ad.</h3>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="report-content">
                        <p class="text-center"><i class="zmdi zmdi-book zmdi-hc-4x"></i></p>
                        <h3 class="text-center text-titles text-uppercase">eliminar cursos</h3>
                    </div>
                </div>
                <div class="col-xs-12 col-sm-6 col-md-4">
                    <div class="report-content">
                        <p class="text-center"><i class="zmdi zmdi-time-restore-setting zmdi-hc-4x"></i></p>
                        <h3 class="text-center text-titles text-uppercase">eliminar bitacora</h3>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>