
<?php
include_once("controladores/funcionesFUMI.php");
if($_POST){

  $errores= validar($_POST,"login");
  if(count($errores)==0){
    $usuario = buscarEmail($_POST["email"]);
    if($usuario == null){
      $errores["email"]="Usuario no existe";
    }else{
      if(password_verify($_POST["pass"],$usuario["pass"])===false){
        $errores["pass"]="Error en los datos verifique";
      }else{
        seteoUsuario($usuario,$_POST);
        if(validarUsuario()){
          header("location: index.php");
          exit;
        }else{
          header("location: register.php");
          exit;
        }
      }

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
      <?php if(isset($errores)):
            echo "<ul class='alert alert-danger text-center'>";
            foreach ($errores as $key => $value) :?>
              <li><?=$value;?> </li>
            <?php endforeach;
            echo "</ul>";
            endif;?>
      <header class="main-header">

        <?php include_once("headers/noLoggeado.php");?>

    </header>

      <main>
        <section class="regis">
        <div class="body-section">
            <img src="imgs/logo.png" alt="logo" class="logo">

          <form class="form-group" action="" method="post">
            <h3> Recuperaste tu contraseña.</h3>
            <h2>INICIAR SESIÓN</h2>

            <div class="campos">

            <p class="email-pass">
              <label for="email" class="alineacion-email-pass">
                Email
              </label>
              <br>
              <input id="email" class="fondo-campo" type="email" name="email" value="" placeholder="Email" required>
            </p>
            <p class="email-pass">
              <label for="pass" class="alineacion-email-pass">
                Contraseña
              </label>
              <br>
              <input id="pass" class="fondo-campo" type="password" name="pass" value="" placeholder="Password" required>
            </p>

          </div>
            <p class="recordarme">
              <input type="checkbox" name="rem" id="rec" value="r"> Recordarme
            </p>
            <br>
            <div class="botones-login">

              <button id="button-ingresar" type="submit" name="button"> Ingresar </button>

              <a id="button-cancelar" type="button" href="olvidePass.php" name="button"> Olvide mi contraseña </a>

            </div>
          </form>

        </div>
        </section>
      </main>
    </div>
  </body>
</html>
