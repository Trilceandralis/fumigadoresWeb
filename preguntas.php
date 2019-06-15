<?php
include_once("controladores/funcionesFUMI.php");
?>

<html dir="ltr" lang="en"><head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/simuladores.css">
  <title> Los Simuladores </title>
</head>
<body class="container-body">
  <div>
    <header class="main-header">
      <?php
      if(isset($_SESSION["nombre"])){
  include_once("headers/loggeado.php");
  }else{
  include_once("headers/noLoggeado.php");}

  ?>
  </header>
  <main>
    <section class="regis">
    <div class="body-section">
        <img src="imgs/logo.png" alt="logo" class="logo">
        <div class="simuladoreglas">

        <h2 class="reglas"> REGLAS: </h2>
          <ol>
            <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </li>
            <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </li>
            <li> Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum. </li>

          </ol>
        <br>


      </div>
      </div>
      </section>
    </main>
    </div>


</body>
</html>
