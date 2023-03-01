<?php 
  if($_SESSION['tipo_sga']!="Administrador") {
      echo  $lc->forzar_cierre_sesion_controlador(); 
  }
?>
<div class="container-fluid">
    <div class="page-header">
      <h1 class="text-uppercase">
          <i class="glyphicon glyphicon-education"></i> Sistema de gestión - asycap ltda s.r.l. <small>Añadir curso</small>
      </h1>
    </div>
</div>
<!--Información pestaña registro nuevo curso-->
<div class="container-fluid"  style="margin: 50px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/img/cursos.png" alt="user" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead" style="font-size:24px;">
           Bienvenido a la sección para agregar nuevos cursos al sistema, 
           deberas de llenar todos los campos para poder registrar el curso.
        </div>
    </div>
</div>
<!--Formulario registro de nuevo curso-->
<div class="container-fluid">
    <form  action="<?php echo SERVERURL; ?>ajax/cursoAjax.php" data-form="save" method="POST" class="FormularioAjax" autocomplete="off" enctype="multipart/form-data">
        <div class="container-flat-form">
            <div class="title-flat-form title-flat-blue" style="font-size:28px;font-weight:bold;">Registrar un nuevo curso</div>
            <div class="row">
               <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                    <legend><i class="zmdi zmdi-assignment"></i><strong>&nbsp;Información básica</strong></legend><br>
                    <div class="group-material">
                        <span style="font-weight:bold; color:#E34724; font-size:17px;">Categoría</span>
                        <select class="tooltips-general material-control" data-toggle="tooltip" data-placement="top" title="Elige la categoría del curso" name="categoria-reg">
                             <?php 
                                require_once "./controladores/categoriaControlador.php";
                                $insCa= new categoriaControlador();

                                $dataCa=$insCa->datos_categoria_controlador("Select",0);

                                while($rowS=$dataCa->fetch()){
                                    echo '<option value="'.$rowS['CODCATEGORIA'].'">'.$rowS['NOMCATEGORIA'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <div class="group-material">
                        <input type="text" class="tooltips-general material-control" placeholder="Escribe aquí el código correlativo del curso" pattern="[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{15,50}" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Escribe el código correlativo del curso" name="codigo-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label style="font-weight:bold;">Código correlativo</label>
                    </div>
                    <div class="group-material">
                        <input type="text" class="tooltips-general material-control" placeholder="Escribe aquí el título o nombre del curso" pattern="[0-9a-zA-ZáéíóúÁÉÍÓÚñÑ ]{10,70}" required="" maxlength="70" data-toggle="tooltip" data-placement="top" title="Escribe el título o nombre del curso" name="nombre-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label style="font-weight:bold;">Nombre</label>
                    </div>
                    <div class="group-material">
                        <input type="number" class="tooltips-general material-control" min="10" max="100" placeholder="Escribe aquí el número de horas cronológicas del curso" required=""  data-toggle="tooltip" data-placement="top" title="Escribe el número de horas cronológicas del curso" name="horas-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label style="font-weight:bold;">Número horas cronológicas</label>
                    </div>
                    <div class="group-material">
                        <input type="number" class="tooltips-general material-control" min="1" step="0.01" data-number-to-fixed="2" data-number-stepfactor="100" placeholder="Escribe aquí el costo del curso" required=""  data-toggle="tooltip" data-placement="top" title="Escribe el precio del curso" name="precio-reg">
                        <span class="highlight"></span>
                        <span class="bar"></span>
                        <label style="font-weight:bold;">Precio</label>
                    </div>
                    <div class="col-xs-12">
                        <label class="control-label" style="color:#E34724; font-size:17px; font-weight: bold;">Estado</label>
                        <div class="radio radio-primary">
                          <label style="color:#333333; font-size:17px;">
                            <input type="radio" name="optionsEstado" id="optionsRadiosA" value="Activo" checked="">
                            <i class="zmdi zmdi-thumb-up"></i> &nbsp; Activo
                          </label>
                        </div>
                        <div class="radio radio-primary">
                          <label style="color:#333333; font-size:17px;">
                            <input type="radio" name="optionsEstado" id="optionsRadiosI" value="Inactivo">
                            <i class="zmdi zmdi-thumb-down"></i> &nbsp; Inactivo
                          </label>
                        </div>
                    </div>
                    <br>
                    <legend><i class="zmdi zmdi-pin-drop"></i><strong>&nbsp;Lugar de ejecución del curso</strong></legend><br>
                    <div class="group-material">
                        <span style="font-weight:bold; color:#E34724; font-size:17px;">Sede</span>
                        <select class="tooltips-general material-control" data-toggle="tooltip" data-placement="top" title="Elige la sede del curso" name="sede-reg">
                            <?php 
                                require_once "./controladores/sedeControlador.php";
                                $inSe= new sedeControlador();

                                $dataS=$inSe->datos_sede_controlador("Select",0);

                                while($rowS=$dataS->fetch()){
                                    echo '<option value="'.$rowS['CODSEDE'].'">'.$rowS['NOMSEDE'].'</option>';
                                }
                            ?>
                        </select>
                    </div>
                    <legend><i class="zmdi zmdi-attachment-alt"></i><strong>&nbsp;Imagen y archivo PDF</strong></legend>
                    <div class="col-xs-13">
                        <div class="form-group">
                            <span class="control-label" style="font-weight:bold; color:#E34724; font-size:17px;">Imagen</span>
                            <input type="file" name="imagen" accept=".jpg, .png, .jpeg" required="">
                            <div class="input-group">
                                <input type="text" readonly="" class="form-control" placeholder="Elija la imágen...">
                                <span class="input-group-btn input-group-sm">
                                    <button type="button" class="btn btn-fab btn-fab-mini">
                                        <i class="zmdi zmdi-attachment-alt"></i>
                                    </button>
                                </span>
                            </div>
                            <span>
                                <small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos imágenes: PNG, JPEG y JPG</small>
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-13">
                        <div class="form-group">
                            <span class="control-label" style="font-weight:bold; color:#E34724; font-size:17px;">PDF</span>
                            <input type="file" name="pdf" accept=".pdf" required="">
                            <div class="input-group">
                                <input type="text" readonly="" class="form-control" placeholder="Elija el PDF...">
                                <span class="input-group-btn input-group-sm">
                                    <button type="button" class="btn btn-fab btn-fab-mini">
                                        <i class="zmdi zmdi-attachment-alt"></i>
                                    </button>
                                </span>
                            </div>
                            <span>
                                <small>Tamaño máximo de los archivos adjuntos 5MB. Tipos de archivos permitidos: documentos PDF</small>
                            </span>
                        </div>
                    </div>
                    <div class="col-xs-13">
                        <div class="form-group">
                            <label class="control-label" style="font-size: 21px; font-weight: bold;">
                                ¿El archivo PDF será descargable para los clientes?
                            </label>
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
        </div>
        <div class="RespuestaAjax"></div>
    </form>
</div>