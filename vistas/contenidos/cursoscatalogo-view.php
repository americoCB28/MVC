<div class="container-fluid">
    <div class="page-header">
      <h2 class="text-uppercase">
          <i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i> Sistema de gestión - asycap ltda s.r.l. <small>Catálogo de cursos</small>
      </h2>
    </div>
</div>
<!--Información menu catálogo de cursos-->
<div class="container-fluid"  style="margin: 40px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>vistas/assets/img/catalogo.png" alt="cata" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead">
            Bienvenido al catálogo, selecciona una categoría de la lista para empezar. Presiona en <span style="font-weight:bold; color:red;">mas información</span>
            para ver la informacion completa del curso.
        </div>
    </div>
</div>
<div class="container-fluid text-center">
    <div class="btn-group">
      <a href="javascript:void(0)" class="btn btn-default btn-raised">SELECCIONE UNA CATEORÍA</a>
      <a href="javascript:void(0)" data-target="dropdown-menu" class="btn btn-default btn-raised dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></a>
      <ul class="dropdown-menu">
        <li><a href="#!">Categoría 1</a></li>
        <li><a href="#!">Categoría 2</a></li>
        <li><a href="#!">Categoría 3</a></li>
        <li><a href="#!">Categoría 4</a></li>
        <li><a href="#!">Categoría 5</a></li>
        <li><a href="#!">Categoría 6</a></li>
        <li><a href="#!">Categoría 7</a></li>
      </ul>
    </div>
</div>
<!--Listado de cursos-->
<div class="container-fluid">
    <h2 class="text-titles text-center">Categoría seleccionada</h2>
    <div class="row">
        <div class="col-xs-12">
            <div class="list-group">
                <div class="list-group-item">
                    <div class="row-picture">
                        <img class="circle" src="<?php echo SERVERURL; ?>vistas/assets/cursos/tractor.png" alt="icon">
                    </div>
                    <div class="row-content">
                        <h4 class="list-group-item-heading">1 - Título completo del curso</h4>
                        <p class="list-group-item-text">
                            <strong>Precio: </strong>Precio del curso <br>
                            <a href="<?php echo SERVERURL; ?>cursosinfo/" class="btn btn-primary" title="Más información"><i class="zmdi zmdi-info"></i></a>
                            <a href="#!" class="btn btn-primary" title="Ver PDF"><i class="zmdi zmdi-file"></i></a>
                            <a href="#!" class="btn btn-primary" title="Descargar PDF"><i class="zmdi zmdi-cloud-download"></i></a>
                            <a href="<?php echo SERVERURL; ?>cursosconfig/" class="btn btn-primary" title="Gestionar curso"><i class="zmdi zmdi-wrench"></i></a>
                        </p>
                    </div>
                </div>
                <div class="list-group-separator"></div>
                <div class="list-group-item">
                    <div class="row-picture">
                        <img class="circle" src="<?php echo SERVERURL; ?>vistas/assets/cursos/excavadora.png" alt="icon">
                    </div>
                    <div class="row-content">
                        <h4 class="list-group-item-heading">2 - Título completo del curso</h4>
                        <p class="list-group-item-text">
                            <strong>Precio: </strong>Precio del curso <br>
                            <a href="<?php echo SERVERURL; ?>cursosinfo/" class="btn btn-primary" title="Más información"><i class="zmdi zmdi-info"></i></a>
                            <a href="#!" class="btn btn-primary" title="Ver PDF"><i class="zmdi zmdi-file"></i></a>
                            <a href="#!" class="btn btn-primary" title="Descargar PDF"><i class="zmdi zmdi-cloud-download"></i></a>
                            <a href="<?php echo SERVERURL; ?>cursosconfig/" class="btn btn-primary" title="Gestionar curso"><i class="zmdi zmdi-wrench"></i></a>
                        </p>
                    </div>
                </div>
                <div class="list-group-separator"></div>
                <div class="list-group-item">
                    <div class="row-picture">
                        <img class="circle" src="<?php echo SERVERURL; ?>vistas/assets/cursos/volquete.png" alt="icon">
                    </div>
                    <div class="row-content">
                        <h4 class="list-group-item-heading">3 - Título completo del curso</h4>
                        <p class="list-group-item-text">
                            <strong>Precio: </strong>Precio del curso <br>
                            <a href="<?php echo SERVERURL; ?>cursosinfo/" class="btn btn-primary" title="Más información"><i class="zmdi zmdi-info"></i></a>
                            <a href="#!" class="btn btn-primary" title="Ver PDF"><i class="zmdi zmdi-file"></i></a>
                            <a href="#!" class="btn btn-primary" title="Descargar PDF"><i class="zmdi zmdi-cloud-download"></i></a>
                            <a href="<?php echo SERVERURL; ?>cursosconfig/" class="btn btn-primary" title="Gestionar curso"><i class="zmdi zmdi-wrench"></i></a>
                        </p>
                    </div>
                </div>
                <div class="list-group-separator"></div>
            </div>
            <nav class="text-center">
                <ul class="pagination pagination-sm">
                    <li class="disabled"><a href="javascript:void(0)">«</a></li>
                    <li class="active"><a href="javascript:void(0)">1</a></li>
                    <li><a href="javascript:void(0)">2</a></li>
                    <li><a href="javascript:void(0)">3</a></li>
                    <li><a href="javascript:void(0)">4</a></li>
                    <li><a href="javascript:void(0)">5</a></li>
                    <li><a href="javascript:void(0)">»</a></li>
                </ul>
            </nav>
        </div>
    </div>
</div>