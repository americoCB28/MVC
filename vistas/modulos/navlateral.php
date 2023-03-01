<section class="full-box cover dashboard-sideBar">
   <div class="full-box dashboard-sideBar-bg btn-menu-dashboard"></div>
	<div class="full-box dashboard-sideBar-ct">
		<div class="full-box text-uppercase text-center text-titles dashboard-sideBar-title">
			 <?php echo COMPANY; ?><i class="zmdi zmdi-close btn-menu-dashboard visible-xs"></i>
		</div>
		<!-- SideBar User info -->
		<div class="full-box dashboard-sideBar-UserInfo">
            <figure class="full-box">
                <img src="<?php echo SERVERURL; ?>vistas/assets/avatars/<?php echo $_SESSION['foto_sga']; ?>" alt="UserIcon">
                <br>
                <figcaption class="text-center text-titles" style="font-weight: bold; font-size: medium;">Nombres: <?php echo $_SESSION['nombre_sga']; ?></figcaption>
             	<figcaption class="text-center text-titles" style="font-weight: bold; font-size: medium;">Apellidos: <?php echo $_SESSION['apellido_sga']; ?></figcaption>
             	<figcaption class="text-center text-titles" style="font-weight: bold; font-size: medium;">Usuario: <?php echo $_SESSION['usuario_sga']; ?></figcaption>
            </figure> 
            <?php 
            if ($_SESSION['tipo_sga']=="Administrador") {
            	$tipo="admin";
            }else{
            	$tipo="estudiante";
            }
            ?>    
			<ul class="full-box list-unstyled text-center">
				<li>
					<a href="<?php echo SERVERURL; ?>misdatos/<?php echo $tipo."/". $lc->encryption($_SESSION['codigo_cuenta_sga']); ?>/" title="Mis datos">
						<i class="zmdi zmdi-account-circle"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo SERVERURL; ?>cuenta/<?php echo $tipo."/". $lc->encryption($_SESSION['codigo_cuenta_sga']); ?>/" title="Mi Cuenta">
						<i class="zmdi zmdi-settings"></i>
					</a>
				</li>
				<li>
					<a href="<?php echo $lc->encryption($_SESSION['token_sga']); ?>" title="Cerrar sesión" class="btn-exit-system">
						<i class="zmdi zmdi-power"></i>
					</a>
				</li>
			</ul>
		</div>
		<ul class="list-unstyled full-box dashboard-sideBar-Menu">
			<li>
				<a href="<?php echo SERVERURL; ?>home/">
					<i class="zmdi zmdi-home zmdi-hc-fw"></i> Inicio</a>
			</li>
			<li>
				<a  href="#!" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-case zmdi-hc-fw"></i>&nbsp;Administración<i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
                    <li>
						<a href="<?php echo SERVERURL; ?>sede/"><i class="zmdi zmdi-balance zmdi-hc-fw"></i> Nueva Sede</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>periodo/"><i class="zmdi zmdi-timer zmdi-hc-fw"></i> Nuevo Período</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>categoria/"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i> Nueva Categoría</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>aula/"><i class="zmdi zmdi-font zmdi-hc-fw"></i> Nuevo Salón</a>
					</li>
                </ul>
            </li>
			<li>
				<a href="#!" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-account-add zmdi-hc-fw"></i> Registro de Usuarios<i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
                    <li>
						<a href="<?php echo SERVERURL; ?>admin/"><i class="zmdi zmdi-face zmdi-hc-fw"></i> Nuevo administrador</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>instructor/">&nbsp;<i class="zmdi zmdi-airline-seat-recline-normal"></i>&nbsp;&nbsp;Nuevo Instructor</a>
					</li>
                    <li>
                        <a href="<?php echo SERVERURL; ?>docente/"><i class="zmdi zmdi-male-alt zmdi-hc-fw"></i> Nuevo docente</a>
                    </li>
					<li>
						<a href="<?php echo SERVERURL; ?>estudiante/"><i class="zmdi zmdi-accounts zmdi-hc-fw"></i> Nuevo Estudiante</a>
					</li>
                    <li>
						<a href="<?php echo SERVERURL; ?>personal/"><i class="zmdi zmdi-male-female zmdi-hc-fw"></i> Nuevo Personal Administrativo</a>
					</li>
				</ul>
			</li>
			<li>
				<a href="#!" class="btn-sideBar-SubMenu">
					<i class="glyphicon glyphicon-education"></i>&nbsp;&nbsp;Cursos<i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
					<li>
						<a href="<?php echo SERVERURL; ?>cursos/"><i class="glyphicon glyphicon-education"></i> Nuevo Curso</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>cursoscatalogo/"><i class="zmdi zmdi-bookmark-outline zmdi-hc-fw"></i> Catálogo</a>
					</li>
				</ul>
			</li>
            <li>
				<a href="#!" class="btn-sideBar-SubMenu">
					<i class="zmdi zmdi-alarm zmdi-hc-fw"></i> Cursos programados<i class="zmdi zmdi-caret-down pull-right"></i>
				</a>
				<ul class="list-unstyled full-box">
					<li>
						<a href="<?php echo SERVERURL; ?>cursosprogramados/">
							&nbsp;<i class="zmdi zmdi-assignment-check"></i>&nbsp; Programar curso
						</a>
					</li>
					<li>
						<a href="<?php echo SERVERURL; ?>cursosall/">
							&nbsp;<i class="zmdi zmdi-assignment-o"></i>&nbsp; Cursos programados<span class="label label-danger pull-right label-mhover">0</span>
						</a>
					</li>
				</ul>
			</li>
            <!-- <li>
                <a href="#!" class="btn-sideBar-SubMenu">
                    <i class="zmdi zmdi-card zmdi-hc-fw"></i> Pagos<i class="zmdi zmdi-caret-down pull-right"></i>
                </a>
                <ul class="list-unstyled full-box">
                    <li>
                        <a href="?php echo SERVERURL; ?>pagos/"><i class="zmdi zmdi-money-box zmdi-hc-fw"></i> Registrar Pago</a>
                    </li>
                </ul>      
			</li>-->
			<li>
                <a href="<?php echo SERVERURL; ?>reportes/"><i class="zmdi zmdi-trending-up zmdi-hc-fw"></i> Reportes y estadísticas</a>
			</li>
            <li>
                <a href="<?php echo SERVERURL; ?>configuraciones/"><i class="zmdi zmdi-wrench zmdi-hc-fw"></i> Configuraciones avanzadas</a>
            </li>
       </ul>
     </div>
</section>