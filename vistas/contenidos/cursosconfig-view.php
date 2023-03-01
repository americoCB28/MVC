<?php 
  if($_SESSION['tipo_sga']!="Administrador") {
      echo  $lc->forzar_cierre_sesion_controlador(); 
  }
?>
<div class="container-fluid">
    <div class="page-header">
      <h1 class="text-uppercase">
        <i class="zmdi zmdi-wrench zmdi-hc-fw"></i>Sistema de gestión - asycap ltda s.r.l. <small>Gestión de curso</small>
      </h1>
    </div>
</div>
<div class="container-fluid"  style="margin: 40px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/content.png" alt="pdf" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
            Bienvenido a la sección para gestionar el curso, modifica los campos que creas conveniente
            luego debes presionar guardar para modificar la información del curso.
        </div>
    </div>
</div>
<!-- Tabla de adjuntos -->
<div class="container-fluid">
    <div class="panel panel-warning">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-attachment-alt"></i> &nbsp; GESTIONAR ADJUNTOS</h3>
        </div>
        <div class="panel-body">
            <div class="table-responsive">
                <table class="table table-striped table-hover">
                    <thead>
                        <tr>
                            <th class="text-center">Nombre</th>
                            <th class="text-center">Tipo</th>
                            <th class="text-center">Eliminar</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td class="text-center">Nombre Archivo</td>
                            <td class="text-center">Tipo Archivo</td>
                            <td>
                                <form action="">
                                    <input type="hidden" name="adjunto-tipo" value="">
                                    <input type="hidden" name="adjunto-nombre" value="">
                                    <p class="text-center">
                                        <button class="btn btn-raised btn-danger btn-xs">
                                            <i class="zmdi zmdi-delete"></i>
                                        </button>
                                    </p>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- Panel actualizar libro -->
<div class="container-fluid">
    <div class="panel panel-success">
        <div class="panel-heading">
            <h3 class="panel-title"><i class="zmdi zmdi-refresh"></i> &nbsp; ACTUALIZAR LIBRO</h3>
        </div>
        <div class="panel-body">
            <form>
                <fieldset>
                    <legend><i class="zmdi zmdi-library"></i> &nbsp; Información básica</legend>
                    <div class="container-fluid">
                        <div class="row">
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Código del curso *</label>
                                    <input pattern="[a-zA-Z0-9-]{10,30}" class="form-control" type="text" name="codigo-up" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Nombre del curso *</label>
                                    <input pattern="[a-zA-Z0-9áéíóúÁÉÍÓÚñÑ ]{10,30}" class="form-control" type="text" name="nombre-up" required="" maxlength="30">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Numero de horas *</label>
                                    <input pattern="[0-9]{1,4}" class="form-control" type="text" name="horas-up" required="" maxlength="4">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                    <label class="control-label">Precio del curso</label>
                                    <input min="1" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" class="form-control" type="number" name="precio-up">
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                   <span style="font-weight:bold; color:#E34724; font-size:17px;">Estado</span>
                                    <select class="tooltips-general material-control" data-toggle="tooltip" data-placement="top" title="Elige el estado del curso">
                                        <option value="" disabled="" selected="">Selecciona el estado del curso</option>
                                        <option value="">Activo</option>
                                        <option value="">Inhabilitado</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-6">
                                <div class="form-group label-floating">
                                   <span style="font-weight:bold; color:#E34724; font-size:17px;">Categoría</span>
                                    <select class="tooltips-general material-control" data-toggle="tooltip" data-placement="top" title="Elige la categoría del curso">
                                        <option value="" disabled="" selected="">Selecciona una categoría</option>
                                        <option value="categoria"></option>
                                        <option value="categoria"></option>
                                        <option value="categoria"></option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <br>
                <fieldset>
                    <legend><i class="zmdi zmdi-attachment-alt"></i> &nbsp; Imágen y archivo PDF</legend>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <span class="control-label">Imágen</span>
                            <input type="file" name="imagen-up" accept=".jpg, .png, .jpeg">
                            <div class="input-group">
                                <input type="text" readonly="" class="form-control" placeholder="Elija la imágen...">
                                <span class="input-group-btn input-group-sm">
                                    <button type="button" class="btn btn-fab btn-fab-mini">
                                        <i class="zmdi zmdi-attachment-alt"></i>
                                    </button>
                                </span>
                            </div>
                            <span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small></span>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <span class="control-label">PDF</span>
                            <input type="file" name="pdf-up" accept=".pdf">
                            <div class="input-group">
                                <input type="text" readonly="" class="form-control" placeholder="Elija el PDF...">
                                <span class="input-group-btn input-group-sm">
                                    <button type="button" class="btn btn-fab btn-fab-mini">
                                        <i class="zmdi zmdi-attachment-alt"></i>
                                    </button>
                                </span>
                            </div>
                            <span><small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos: documentos PDF</small></span>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                        <div class="form-group">
                            <label class="control-label">¿El archivo PDF será descargable para los clientes?</label>
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="optionsPDF" id="optionsRadios1" value="Si" checked="">
                                    <i class="zmdi zmdi-cloud-download"></i> &nbsp; Si, PDF descargable
                                </label>
                            </div>
                            <div class="radio radio-primary">
                                <label>
                                    <input type="radio" name="optionsPDF" id="optionsRadios2" value="No">
                                    <i class="zmdi zmdi-cloud-off"></i> &nbsp; No, PDF no descargable
                                </label>
                            </div>
                        </div>
                    </div>
                </fieldset>
                <p class="text-center" style="margin-top: 20px;">
                    <button type="submit" class="btn btn-info btn-raised btn-sm"><i class="zmdi zmdi-floppy"></i> Guardar</button>
                </p>
            </form>
        </div>
    </div>
</div>

<!-- Panel eliminar libro -->
<div class="container-fluid">
    <div class="row">
        <div class="col-xs-12">
            <div class="panel panel-danger">
                <div class="panel-heading">
                    <h3 class="panel-title"><i class="zmdi zmdi-delete"></i> &nbsp; ELIMINAR CURSO</h3>
                </div>
                <div class="panel-body">
                    <form>
                        <input type="hidden" value="">
                        <p class="text-center">
                            <button class="btn btn-raised btn-danger">
                                <i class="zmdi zmdi-delete"></i> &nbsp; ELIMINAR DEL SISTEMA
                            </button>   
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>