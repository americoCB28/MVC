<div class="full-box login-container cover text-titles" >
  <form action="" method="POST" autocomplete="off" class="logInForm form-container">
    <p class="text-center text-muted"><i class="zmdi zmdi-account-circle zmdi-hc-5x"></i></p>
    <p class="text-center text-muted text-uppercase" style="font-size: 20px;">Inicia sesión con tu cuenta</p>
    <br>
    <div class="group-material-login">
      <input type="text" class="material-login-control" required="" id="UserName" name="usuario">
      <span class="highlight-login"></span>
      <span class="bar-login"></span>
      <label for="UserName"><i class="zmdi zmdi-account"></i> &nbsp; Nombres</label>
    </div>
    <br>
    <div class="group-material-login">
      <input type="password" class="material-login-control" required="" id="UserPass" name="clave" autocomplete="on">
      <span class="highlight-login"></span>
      <span class="bar-login"></span>
      <label for="UserPass"><i class="zmdi zmdi-lock"></i> &nbsp; Contraseña</label>
    </div>
    <div class="form-group text-center">
      <input class="btn btn-info" type="submit" value="Ingresar al sistema" style="colo: #FFF;">
    </div>
  </form>
</div>
<?php 
  if(isset($_POST['usuario']) && isset($_POST['clave'])){
      require_once "./controladores/loginControlador.php";
      $login = new loginControlador();
      echo $login->iniciar_sesion_controlador();
  }
?>
