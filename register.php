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
            REGISTRATE
          </h1>
          <form class="" action="index.html" method="post">
            <p>
              <label for="nombre"> Nombre </label>
              <input id="nombre" class="campo" type="text" name="nombre" value="" placeholder="Nombre" required>
            </p>
            <p>
              <label for="email"> Email </label>
              <input id="email" class="campo" type="email" name="email" value="" placeholder="Email" required>
            </p>
            <p>
              <label for="pass"> Contraseña </label>
              <input id="pass" class="campo" type="password" name="pass" value="" placeholder="Password" required>
            </p>
            <p>
              <label for="pais"> País de nacimiento </label>
                <select class="" name="pais" id="pais" required>
                  <option value="ar"> Argentina </option>
                  <option value="br"> Brasil </option>
                  <option value="co"> Colombia </option>
                  <option value="ch"> Chile </option>
                  <option value="ur"> Uruguay </option>
                  <option value="pe"> Peru </option>
                  <option value="pa"> Paraguay </option>
                  <option value="ve"> Venezuela </option>
                  <option value="bo"> Bolivia </option>
                </select>
            </p>
            <p>
              <label for="genero"> Género </label>
              <input type="radio" name="genero" value="m"> Masculino
              <input type="radio" name="genero" value="f"> Femenino
              <input type="radio" name="genero" value="o"> Otro
            </p>
            <p>
              <label for="hobbie"> Hobbies </label>
              <input type="checkbox" name="hobbie" value="pin"> Pintar
              <input type="checkbox" name="hobbie" value="gui"> Guitarra
              <input type="checkbox" name="hobbie" value="mal"> Malabares
              <input type="checkbox" name="hobbie" value="esc"> Escribir
            </p>
            <p>
              <label for="com"> Dejános tus comentarios</label>
              <textarea name="com" id="com" class="campo" rows="8" cols="80"></textarea>
            </p>
            <p>
              <input type="checkbox" name="term" value="a" required> Acepto los términos y condiciones
            </p>
            <p>
              <button type="submit" name="button"> Registrarme </button>
              <button type="reset" name="button"> Cancelar </button>
            </p>
          </form>
        </section>
      </main>
    </div>
  </body>
</html>