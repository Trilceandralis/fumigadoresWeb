
<?php
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
      <header class="main-header">
        <nav class="nav-desplazado">
          <ul class="izquierda">
            <li><a href="home.html"> HOME </a></li>
            <li><a href="preguntas.html"> REGLAS</a></li>
            <li><a href="login.html"> LOGIN </a></li>
            <li><a href="register.html"> REGISTRO </a></li>
          </ul>
        </nav>
    </header>

      <main>
        <section class="regis">
        <div class="body-section">
            <img src="imgs/logo.png" alt="logo" class="logo">

// REVISAR CSS: clases "form-group", "fondo-campo". Todas las de INPUT.

          <form class="form-group" action="index.html" method="post">
            <h2>INICIAR SESIÓN</h2>

            <div class="campos">


                <input id="nombre" class="fondo-campo" type="text" name="nombre" value="" placeholder="Nombre" required>



              <input id="email" class="fondo-campo" type="email" name="email" value="" placeholder="Email" required>


              <input id="pass" class="fondo-campo" type="password" name="pass" value="" placeholder="Password" required>


              <input id="repass" class="fondo-campo" type="password" name="repass" value="" placeholder="Vuelva a ingresar su Password" required>





          </div>
            <p class="recordarme">
              <input type="checkbox" name="rem" id="rec" value="r"> Recordarme
            </p>
            <br>
            <div class="botones-login">

              <button id="button-ingresar" type="submit" name="button"> Ingresar </button>

              <button id="button-cancelar" type="submit" name="button"> Cancelar </button>

            </div>
          </form>

        </div>
        </section>
      </main>
    </div>
  </body>
</html>
