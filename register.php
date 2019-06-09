
<?php
include_once("/Controladores/fumigaciones.php");
if($_POST){
  $errores= validar($datos, "register");
  if(count($errores)==0) {
    $usuario = buscarEmail($_POST["email"]);
    if($usuario != NULL){
      $errores["email"] = "Usuario ya registrado";
  } else {
    $avatar = armarAvatar($_FILES);
    $registro = armarRegistro($_POST,$avatar);
    guardarUsuario($registro);
    header("location:login.php"); exit;
  }
  }
}
?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/simuladores.css">
    <title> Los Simuladores </title>
  </head>
  <body class="container-body">
    <div>
      <?php
    if(isset($errores)): ?>
    <ul class="danger">
      <?php foreach($errores as $key => $value) :?>
        <li> <?= $value;?> </li>
        <?php endforeach; ?>
    </ul>
  <?php endif;?>

      <header class="main-header">
        <nav class="nav-desplazado">
          <ul class="izquierda">
            <li><a href="home.php"> HOME </a></li>
            <li><a href="preguntas.php"> REGLAS</a></li>
            <li><a href="login.php"> LOGIN </a></li>
            <li><a href="register.php"> REGISTRO </a></li>
          </ul>
        </nav>
    </header>

      <main>
        <section class="regis">
        <div class="body-section">
            <img src="imgs/logo.png" alt="logo" class="logo">





          <form class="form-group" action="" method="POST" enctype= "multipart/form-data" >
            <h2>INICIAR SESIÓN</h2>

            <div class="campos">


              <input id="nombre" class="fondo-campo" type="text" name="nombre" value="" placeholder="Nombre"/>



              <input id="email" class="fondo-campo" type="email" name="email" value="" placeholder="Email" required>


              <input id="pass" class="fondo-campo" type="password" name="pass" value="" placeholder="Password" required>


              <input id="repass" class="fondo-campo" type="password" name="repass" value="" placeholder="Vuelva a ingresar su Password" required>

              <input type="file" name="avatar" value="" placeholder="Insertar imagen">

          </div>
            <p class="recordarme">
              <input type="checkbox" name="recordar" id="rec" value="r"> Recordarme
            </p>
            <br>
            <div class="botones-login">

              <button id="button-ingresar" type="submit" name="button"> Registrarse </button>

              <button id="button-cancelar" type="reset" name="button"> Cancelar </button>

            </div>
          </form>

        </div>
        </section>
      </main>
    </div>
  </body>
</html>
