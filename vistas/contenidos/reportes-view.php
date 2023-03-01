<?php 
  if($_SESSION['tipo_sga']!="Administrador") {
      echo  $lc->forzar_cierre_sesion_controlador(); 
  }
?>
<div class="container-fluid">
    <div class="page-header">
      <h2 class="text-uppercase">
          <i class="zmdi zmdi-trending-up zmdi-hc-fw"></i>Sistema de gestión - asycap ltda s.r.l.<small>Reportes y estadísticas</small>
      </h2>
    </div>
</div>
<div class="container-fluid">
    <ul class="nav nav-tabs nav-justified text-titles" role="tablist" style="font-size: 21px;font-weight:bold;">
        <li role="presentation" class="active text-titles"><a href="#statistics" aria-controls="statistics" role="tab" data-toggle="tab">Estadísticas</a></li>
        <li role="presentation"><a href="#bitacora" aria-controls="bitacora" role="tab" data-toggle="tab">Bitácora</a></li>
        <li role="presentation"><a href="#reports" aria-controls="reports" role="tab" data-toggle="tab">Reportes y fichas</a></li>
    </ul>
    <div class="tab-content">
        <div role="tabpanel" class="tab-pane fade in active" id="statistics">
            <div class="container-fluid"  style="margin: 50px 0;">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <img src="<?php echo SERVERURL; ?>/vistas/assets/img/chart.png" alt="chart" class="img-responsive center-box" style="max-width: 120px;">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead text-titles">
                        Bienvenido al área de estadísticas, aquí puedes ver las diferentes estadísticas de los cursos y alumnos.
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="page-header">
                  <h3 class="text-uppercase text-titles">cursos <small>en general</small></h3>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="text-center text-titles text-uppercase">total cursos del año 2020</h3>
                        <div class="table-responsive">
                            <table class="table table-hover text-center text-titles">
                                <thead>
                                    <tr class="success">
                                        <th class="text-center">Nombre curso</th>
                                        <th class="text-center">N. Cursos</th>
                                        <th class="text-center">Porcentaje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="info">
                                        <th class="text-center">Total</th>
                                        <th class="text-center">0</th>
                                        <th class="text-center">0%</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <p class="lead text-center text-titles" style="font-size:18px;"><strong><i class="zmdi zmdi-info-outline"></i>&nbsp; ¡Importante!</strong> Para imprimir esta tabla ve a la sección de reportes y selecciona “Cursos entregados (por usuarios)”</p>
                    </div>
                </div>
                <div class="page-header">
                  <h3 class="text-titles text-uppercase">cursos <small>por sección</small></h3>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="text-center text-titles text-uppercase">cursos de estudiantes por periodos año 2020</h3>
                        <div class="table-responsive">
                            <table class="table table-hover text-center text-titles">
                                <thead>
                                    <tr class="success">
                                        <th class="text-center">Sección</th>
                                        <th class="text-center">N. Cursos</th>
                                        <th class="text-center">Porcentaje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="info">
                                        <th class="text-center">Total</th>
                                        <th class="text-center"></th>
                                        <th class="text-center"></th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <p class="lead text-titles text-center" style="font-size:18px;"><strong><i class="zmdi zmdi-info-outline"></i>&nbsp; ¡Importante!</strong> Para imprimir esta tabla ve a la sección de reportes y selecciona “Cursos entregados (por período)”</p>
                    </div>
                </div>
                <div class="page-header">
                  <h3 class="text-titles text-uppercase">cursos <small>por categorías</small></h3>
                </div>
                <div class="row">
                    <div class="col-xs-12">
                        <h3 class="text-center text-titles text-uppercase">cursos por categorías año 2020</h3>
                        <div class="table-responsive">
                            <table class="table table-hover text-center text-titles">
                                <thead>
                                    <tr class="success">
                                        <th class="text-center">Categoría</th>
                                        <th class="text-center">Código</th>
                                        <th class="text-center">Total Cursos</th>
                                        <th class="text-center">Porcentaje</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>Nombre</td>
                                        <td>Código categoría</td>
                                        <td>0</td>
                                        <td>0%</td>
                                    </tr>
                                </tbody>
                                <tfoot>
                                    <tr class="info">
                                        <th class="text-center"></th>
                                        <th class="text-center">Total Cursos</th>
                                        <th class="text-center">0</th>
                                        <th class="text-center">0%</th>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                        <p class="lead text-center text-titles" style="font-size:18px;"><strong><i class="zmdi zmdi-info-outline"></i>&nbsp; ¡Importante!</strong> Para imprimir esta tabla ve a la sección de reportes y selecciona “Reporte Cursos por Categoría”</p>
                    </div>
                </div>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="bitacora">
            <div class="container-fluid"  style="margin: 50px 0;">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <img src="<?php echo SERVERURL; ?>/vistas/assets/img/user-sesion.png" alt="users-sesion" class="img-responsive center-box" style="max-width: 120px;">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead text-titles">
                        Bienvenido al área de bitácora, aquí se muestran los registros de los últimos 28 usuarios (personal administrativo, docentes, administradores, estudiantes y visitantes) que han iniciado sesión en el sistema. Recuerda eliminar los registros de la bitácora cada año para que el sistema funcione correctamente.
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <section id="cd-timeline" class="cd-container">
                    <?php  
                        require "./controladores/bitacoraControlador.php";
                        $IBitacora = new bitacoraControlador();

                        echo $IBitacora->listado_bitacora_controlador(28);
                    ?>
                </section>
            </div>
        </div>
        <div role="tabpanel" class="tab-pane fade" id="reports">
            <div class="container-fluid"  style="margin: 50px 0;">
                <div class="row">
                    <div class="col-xs-12 col-sm-4 col-md-3">
                        <img src="<?php echo SERVERURL; ?>/vistas/assets/img/pdf.png" alt="pdf" class="img-responsive center-box" style="max-width: 120px;">
                    </div>
                    <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead text-titles">
                        Bienvenido al área de reportes, aquí puedes generar fichas de cursos vacías de estudiantes, docentes o visitantes en formato pdf, también puedes generar reportes de inventario entre otros.
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <div class="page-header">
                      <h2 class="text-titles text-uppercase">fichas <small>vacías</small></h2>
                    </div><br>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="full-reset report-content">
                            <p class="text-center">
                                <i class="zmdi zmdi-file-text zmdi-hc-5x"></i>
                            </p>
                            <h3 class="text-center">Ficha estudiante</h3>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="full-reset report-content">
                            <p class="text-center">
                                <i class="zmdi zmdi-file-text zmdi-hc-5x"></i>
                            </p>
                            <h3 class="text-center">Ficha docente</h3>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="full-reset report-content">
                            <p class="text-center">
                                <i class="zmdi zmdi-file-text zmdi-hc-5x"></i>
                            </p>
                            <h3 class="text-center">Ficha personal administrativo</h3>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="full-reset report-content">
                            <p class="text-center">
                                <i class="zmdi zmdi-file-text zmdi-hc-5x"></i>
                            </p>
                            <h3 class="text-center">Ficha visitante</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="page-header">
                      <h2 class="text-titles text-uppercase">reportes <small>generales</small></h2>
                    </div><br>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="full-reset report-content">
                            <p class="text-center">
                                <i class="zmdi zmdi-trending-up zmdi-hc-5x"></i>
                            </p>
                            <h3 class="text-center">Reporte General de Cursos</h3>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="full-reset report-content">
                            <p class="text-center">
                                <i class="zmdi zmdi-trending-up zmdi-hc-5x"></i>
                            </p>
                            <h3 class="text-center">Reporte Cursos por Categoría</h3>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="full-reset report-content">
                            <p class="text-center">
                                <i class="zmdi zmdi-trending-up zmdi-hc-5x"></i>
                            </p>
                            <h3 class="text-center">Cursos entregados (por usuarios)</h3>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="full-reset report-content">
                            <p class="text-center">
                                <i class="zmdi zmdi-trending-up zmdi-hc-5x"></i>
                            </p>
                            <h3 class="text-center">Cursos entregados (por sección)</h3>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="page-header">
                        <h2 class="text-titles text-uppercase">reportes <small>cursos pendientes</small></h2>
                    </div><br>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="full-reset report-content">
                            <p class="text-center">
                                <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                            </p>
                            <h3 class="text-center">Docentes</h3>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="full-reset report-content">
                            <p class="text-center">
                                <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                            </p>
                            <h3 class="text-center">Personal Administrativo</h3>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="full-reset report-content">
                            <p class="text-center">
                                <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                            </p>
                            <h3 class="text-center">Estudiantes</h3>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="full-reset report-content">
                            <p class="text-center">
                                <i class="zmdi zmdi-calendar-close zmdi-hc-5x"></i>
                            </p>
                            <h3 class="text-center">Visitantes</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>