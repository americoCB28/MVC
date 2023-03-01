<?php 
  if($_SESSION['tipo_sga']!="Administrador") {
      echo  $lc->forzar_cierre_sesion_controlador(); 
  }
?>
<div class="container-fluid">
    <div class="page-header">
        <h2 class="text-uppercase"> 
            <i class="zmdi zmdi-assignment-o"></i> Sistema de gestión - asycap ltda s.r.l. <small>Información del curso</small>
        </h2>
    </div>
</div>
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/cursos/tractor.png" class="img-responsive center-box" style="max-width: 300px;">          
            <br>
        </div>
        <div class="col-xs-12">
            <div class="table-responsive">
                <table class="table table-hover table-bordered">
                    <thead>
                        <tr>
                            <th colspan="2" class="text-center lead success"><strong>Datos del curso</strong></th>
                        </tr>
                    </thead>
                        <tbody>
                            <tr>
                                <td><strong>Código de curso</strong></td>
                                <td>Código de curso no definido</td>
                            </tr>
                            <tr>
                                <td><strong>Categoría</strong></td>
                                <td>Maquinaria Pesada</td>
                            </tr>
                            <tr>
                                <td><strong>Nombre</strong></td>
                                <td>Curso Operador Cargador frontal</td>
                            </tr>
                            <tr>
                                <td><strong>N° horas</strong></td>
                                <td>32 horas cronológicas</td>
                            </tr>
                            <tr>
                                <td><strong>Precio</strong></td>
                                <td>S/. 1800.00</td>
                            </tr>
                            <tr>
                                <td><strong>Estado</strong></td>
                                <td>Activo</td>
                            </tr>
                            <tr>
                                <td><strong>Lugar de Ejecucion del Curso</strong></td>
                                <td>Villa Estela - Ancón</td>
                            </tr>
                            <tr>
                                <td><strong>Programados</strong></td>
                                <td>1</td>
                            </tr>
                            <tr>
                                <td><strong>PDF visible para los usuarios</strong></td>
                                <td>Es visible</td>
                            </tr>
                        </tbody>
                </table>
            </div>
            <br>
            <fieldset>
                <legend><i class="zmdi zmdi-download"></i> &nbsp; Descargar archivo PDF</legend>
                <p class="text-center">
                    <a href="javascript:void(0)" class="btn btn-raised btn-primary" title="Descargar ficha del curso">
                        <i class="zmdi zmdi-cloud-download"></i> &nbsp; DESCARGAR PDF
                    </a>
                </p>
            </fieldset>
        </div>
    </div>
</div>
