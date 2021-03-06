
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
        $errores["pass"]="Usuario o contraseña incorrecto. Verifique los campos, por favor.";
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
    <link rel="stylesheet" href="css/lampone.css">
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

        <img src="imgs/logo.png" alt="logo" class="logo">
        <?php include_once("headers/noLoggeado.php");?>

    </header>

      <main>


        <section class="body-section">


          <h2>INICIAR SESIÓN</h2>

          <form class="formulario" action="" method="post">

            <div class="campos">


              <input id="email" class="fondo-campo" type="email" name="email" value="" placeholder="Email" required>

              <input id="pass" class="fondo-campo" type="password" name="pass" value="" placeholder="Password" required>

            </div>

            <label id="recordarme">
              <input type="checkbox" name="rem"  value="r"> Recordarme
            </label>


            <div class="botones-login">

              <button id="button" type="submit" name="button"> Ingresar </button>

              <a id="button-olvide" type="button" href="olvidePass.php" name="button"> Olvide mi contraseña </a>

            </div>
          </form>
        </section>
      </main>
    </div>
  </body>
</html>
