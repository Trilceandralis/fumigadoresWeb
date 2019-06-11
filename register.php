<?php
include_once("controladores/funcionesFUMI.php");
if ($_POST){
  $errores=validar($_POST,"registro");
  if(count($errores)==0){
    $usuario = buscarEmail($_POST["email"]);
    if($usuario !== null){
      $errores["email"]="Usuario ya registrado";
    }else{
      $avatar = armarAvatar($_FILES);
      $registro = armarRegistro($_POST,$avatar);
      guardarUsuario($registro);
      header("location:login.php");
      exit;
    }

  }
}

?>


<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="css/simuladores.css">
    <title> Los Simuladores </title>
  </head>
  <body class="container-body">
    <div>
      <?php if(isset($errores)):
            echo "<ul class='alert alert-danger text-center'>";
            foreach ($errores as $key => $value) :?>
              <li><?=$value;?> </li>
            <?php endforeach;
            echo "</ul>";
            endif;?>
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

              <input id="nombre" class="fondo-campo" type="text" name="nombre" value="<?= (isset($errores["nombre"]))? "" : persistir("nombre"); ?>" placeholder="Nombre" />

              <input id="email" class="fondo-campo" type="email" name="email" value="<?=(isset($errores["email"]))? "" : persistir("email");?>" placeholder="Email"/>


              <input id="pass" class="fondo-campo" type="password" name="pass" value="" placeholder="Password" required />


              <input id="repass" class="fondo-campo" type="password" name="repass" value="" placeholder="Reingrese Password" required>

              <input type="file" name="avatar" value="" placeholder="Insertar imagen" />

          </div>
            <p class="recordarme">
              <input type="checkbox" name="recordar" id="rec" value="" /> Recordarme
            </p>
            <br>
            <div class="botones-login">

              <button id="button-ingresar" type="submit"> Registrarse </button>

              <button id="button-cancelar" type="reset"> Cancelar </button>

            </div>
          </form>

        </div>
        </section>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
      </main>
    </div>
  </body>
</html>
