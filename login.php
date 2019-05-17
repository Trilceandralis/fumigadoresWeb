<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/simuladores.css">
    <title> Los Simuladores </title>
  </head>
  <body>
    <div class="container">
      <header class="main-header">
        <img src="" alt="" class="">
        <nav class="nav1">
          <ul class="izquierda">
            <li><a href="home.php"> HOME </a></li>
            <li><a href="preguntas.php"> PREGUNTAS </a></li>
          </ul>
        </nav>
        <nav class="nav2">
          <ul class="derecha">
            <li><a href="login.php"> LOGIN </a></li>
            <li><a href="register.php"> REGISTRO </a></li>
          </ul>
        </nav>
      </header>
      <main>
        <section class="regis">
          <h1>
            LOS SIMULADORES
          </h1>
          <form class="form-group" action="index.html" method="post">
            <p>
              <label for="email">
                Email
              </label>
              <br>
              <input id="email" class="campo" type="email" name="email" value="" placeholder="Email" required>
            </p>
            <p>
              <label for="pass">
                Contraseña
              </label>
              <br>
              <input id="pass" class="campo" type="password" name="pass" value="" placeholder="Password" required>
            </p>
            <p>
              <input type="checkbox" name="rem" id="rec" value="r"> Recordarme
            </p>
            <br>
            <p>
              <button type="submit" name="button"> Ingresar </button>
            </p>
          </form>
        </section>
      </main>
    </div>
  </body>
</html>
