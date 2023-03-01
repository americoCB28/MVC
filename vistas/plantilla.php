<!DOCTYPE html>
<html lang="es">
<head>	 
	<title> <?php echo COMPANY; ?></title>
    <meta charset="UTF-8"> 
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link rel="stylesheet" href="<?php echo SERVERURL; ?>vistas/css/main.css">
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>vistas/css/style.css">
    <link rel="stylesheet" href="<?php echo SERVERURL; ?>vistas/css/login.css">

       <!--  Scripts -->
    <?php include "vistas/modulos/script.php"; ?>
</head>
<body>
    <?php 
        $peticionAjax=false;

        require_once "./controladores/adminControlador.php";

        $vt = new adminControlador();
        $vistasR=$vt->obtener_admin_controlador();

        if($vistasR=="login" || $vistasR=="404"):
            if ($vistasR=="login") {
                 require_once "./vistas/contenidos/login-view.php";
            } else {
                 require_once "./vistas/contenidos/404-view.php";
            }
        else:
            session_start(['name'=>'SGA']); 

            require_once "./controladores/loginControlador.php";

            $lc = new loginControlador();
            
            if(!isset($_SESSION['token_sga']) || !isset($_SESSION['usuario_sga'])){
               echo $lc->forzar_cierre_sesion_controlador(); 
            }
    ?>
	<!-- Navegador Lateral -->
	 <?php include "vistas/modulos/navlateral.php"; ?>

    <section class="full-box dashboard-contentPage">

    	<!-- Barra navegador -->
    	 <?php include "vistas/modulos/navbar.php"; ?>

        <!--  Content Page -->
        <?php require_once $vistasR; ?>

        <!--Pie de página-->
        <?php include "vistas/modulos/footerpage.php"; ?>
	</section>
     <?php 
        include "vistas/modulos/logoutScript.php"; 
        endif; 
     ?>
    <script>
        $.material.init();
    </script>
</body>
</html>