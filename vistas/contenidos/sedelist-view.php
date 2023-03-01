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
<div class="container-fluid">
    <ul class="nav nav-tabs nav-justified text-titles"  style="font-size: 21px;font-weight:bold;">
      <li role="presentation" class="active"><a href="<?php echo SERVERURL; ?>sede/">Sedes</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>periodo/">Períodos</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>categoria/">Categorías</a></li>
      <li role="presentation"><a href="<?php echo SERVERURL; ?>aula/">Salones</a></li>
    </ul>
</div>
<!-- Contenido Listado Sedes -->
 <div class="container-fluid"  style="margin: 50px 0;">
    <div class="row">
        <div class="col-xs-12 col-sm-4 col-md-3">
            <img src="<?php echo SERVERURL; ?>/vistas/assets/img/institution.png" class="img-responsive center-box" style="max-width: 110px;">
        </div>
        <div class="col-xs-12 col-sm-8 col-md-8 text-justify lead text-titles">
            Bienvenido a la sección donde se encuentra el listado de sedes del instituto. Puedes actualizar o eliminar los datos de las sedes.
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
    $insSede = new sedeControlador();
?>
<div class="container-fluid">
    <div class="panel panel-success">
    <br>
    <h2 class="text-center text-titles" style="color: rgba(22, 184, 176); font-size: 35px; font-weight: bold;">Lista de Sedes</h2>
    <br>
    <div class="panel-body">
        <?php  
            $pagina = explode("/", $_GET['views']);
            echo $insSede->paginador_sede_controlador($pagina[1],7);
        ?>
    </div>
    </div>
</div>