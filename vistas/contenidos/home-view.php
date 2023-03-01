<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-uppercase">
          <i class="zmdi zmdi-home zmdi-hc-fw"></i>Sistema de gestión - asycap ltda s.r.l. <small>Inicio</small>
	  </h1>
	</div>
</div>
<div class="full-box text-center" style="padding: 30px 10px;">
	<?php 
		require "./controladores/administradorControlador.php";
		$IAdmin = new administradorControlador();
		$CAdmin = $IAdmin->datos_administrador_controlador("Conteo",0);
	?>
	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			Administradores
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-account"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"><?php echo $CAdmin->rowCount(); ?></p>
			<small>Registrados</small>
			<a href="<?php echo SERVERURL; ?>admin/" title="Agregar administrador">
				<i class="zmdi zmdi-accounts-add"></i>
			</a>
		</div>
	</article>
	<?php 
		require "./controladores/estudianteControlador.php";
		$IEstudiante = new estudianteControlador();
		$CEstudiante = $IEstudiante->datos_estudiante_controlador("Conteo",0);
	?>
    <article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			Estudiantes
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-accounts"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"><?php echo $CEstudiante->rowCount(); ?></p>
			<small>Registrados</small>
			<a href="<?php echo SERVERURL; ?>estudiante/" title="Agregar estudiante">
				<i class="zmdi zmdi-accounts-add"></i>
			</a>
		</div>
	</article>
    <article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			Cursos
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-assignment"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box">0</p>
			<small>Registrados</small>
			<a href="<?php echo SERVERURL; ?>cursos/" title="Agregar curso">
				<i class="zmdi zmdi-accounts-add"></i>
			</a>
		</div>
	</article>
	<?php 
		require "./controladores/instructorControlador.php";
		$IInstructor = new instructorControlador();
		$CInstructor = $IInstructor->datos_instructor_controlador("Conteo",0);
	?>
	<article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			Instructores
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-airline-seat-recline-normal"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"><?php echo $CInstructor->rowCount(); ?></p>
			<small>Registrados</small>
			<a href="<?php echo SERVERURL; ?>instructor/" title="Agregar instructor">
				<i class="zmdi zmdi-accounts-add"></i>
			</a>
		</div>
	</article>
	<?php 
		require "./controladores/docenteControlador.php";
		$IDocente = new docenteControlador();
		$CDocente = $IDocente->datos_docente_controlador("Conteo",0);
	?>
    <article class="full-box tile" data-href="<?php echo SERVERURL; ?>docente/">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			Docentes
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-male-alt zmdi-hc-fw"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"><?php echo $CDocente->rowCount(); ?></p>
			<small>Registrados</small>
			<a href="<?php echo SERVERURL; ?>docente/" title="Agregar docente">
				<i class="zmdi zmdi-accounts-add"></i>
			</a>
		</div>
	</article>
	<?php 
		require "./controladores/personalControlador.php";
		$IPersonal = new personalControlador();
		$CPersonal = $IPersonal->datos_personal_controlador("Conteo",0);
	?>
    <article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			Personal Administrativo
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-male-female"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"><?php echo $CPersonal->rowCount(); ?></p>
			<small>Registrados</small>
			<a href="<?php echo SERVERURL; ?>personal/" title="Agregar personal">
				<i class="zmdi zmdi-accounts-add"></i>
			</a>
		</div>
	</article>
	<?php 
		require "./controladores/sedeControlador.php";
		$ISedes = new sedeControlador();
		$CSedes = $ISedes->datos_sede_controlador("Conteo",0);
	?>
    <article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			Sedes Administrativas
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-balance zmdi-hc-fw"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"><?php echo $CSedes->rowCount(); ?></p>
			<small>Registrados</small>
			<a href="<?php echo SERVERURL; ?>sede/" title="Agregar sede">
				<i class="zmdi zmdi-accounts-add"></i>
			</a>
		</div>
	</article>
	<?php 
		require "./controladores/periodoControlador.php";
		$IPeriodos = new periodoControlador();
		$CPeriodos = $IPeriodos->datos_periodo_controlador("Conteo",0);
	?>
    <article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			Períodos
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-timer zmdi-hc-fw"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"><?php echo $CPeriodos->rowCount(); ?></p>
			<small>Registrados</small>
			<a href="<?php echo SERVERURL; ?>periodo/" title="Agregar período">
				<i class="zmdi zmdi-accounts-add"></i>
			</a>
		</div>
	</article>
	<?php 
		require "./controladores/categoriaControlador.php";
		$ICategorias = new categoriaControlador();
		$CCategorias = $ICategorias->datos_categoria_controlador("Conteo",0);
	?>
    <article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			Categorías
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"><?php echo $CCategorias->rowCount(); ?></p>
			<small>Registrados</small>
			<a href="<?php echo SERVERURL; ?>categoria/" title="Agregar categoria">
				<i class="zmdi zmdi-accounts-add"></i>
			</a>
		</div>
	</article>
	<?php 
		require "./controladores/aulaControlador.php";
		$IAula = new aulaControlador();
		$CAula = $IAula->datos_aula_controlador("Conteo",0);
	?>
    <article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			Salones
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-font zmdi-hc-fw"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"><?php echo $CAula->rowCount(); ?></p>
           <small>Registrados</small>
           <a href="<?php echo SERVERURL; ?>aula/" title="Agregar salón">
				<i class="zmdi zmdi-accounts-add"></i>
			</a>
		</div>
	</article>
	    <article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			Cursos programados
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-assignment-o"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box">0</p>
			<small>Registrados</small>
           <a href="<?php echo SERVERURL; ?>cursosprogramados/" title="Programar curso">
				<i class="zmdi zmdi-accounts-add"></i>
			</a>
		</div>
	</article>
    <article class="full-box tile">
		<div class="full-box tile-title text-center text-titles text-uppercase">
			Reportes y estadisticas
		</div>
		<div class="full-box tile-icon text-center">
			<i class="zmdi zmdi-trending-up"></i>
		</div>
		<div class="full-box tile-number text-titles">
			<p class="full-box"></p>
            <br />
            <br />
			<a href="#!">
                <i class="zmdi zmdi-arrow-right" ></i>
                <small class="text-titles" style="font-size:18px; font-weight:bold;"> Ingresar</small>
			</a>
		</div>
	</article>
</div>
<div class="container-fluid">
	<div class="page-header">
	  <h1 class="text-titles">Sistema <small>Cronología</small></h1>
	</div>
	<p class="lead text-center" style="font-weight: bold;">Últimos 14 usuarios que iniciaron sesión en el sistema</p>
	<section id="cd-timeline" class="cd-container">
        <?php  
        	require "./controladores/bitacoraControlador.php";
        	$IBitacora = new bitacoraControlador();

        	echo $IBitacora->listado_bitacora_controlador(14);
     	?>
    </section>
</div>