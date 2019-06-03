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
            <li><a href="home.php"> HOME </a></li>
            <li><a href="preguntas.php"> REGLAS </a></li>
            <li><a href="login.php"> LOGIN </a></li>
            <li><a href="register.php"> REGISTRO </a></li>
          </ul>
        </nav>
    </header>

      <main>
        <section class="regis">
        <div class="body-section">
            <img src="imgs/logo.png" alt="logo" class="logo">

          <form class="form-group" action="index.html" method="post">
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

              <button id="button-cancelar" type="submit" name="button"> Cancelar </button>

            </div>
          </form>

        </div>
        </section>
      </main>
    </div>
  </body>
</html>
