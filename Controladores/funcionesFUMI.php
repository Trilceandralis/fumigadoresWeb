<?php
//Crear array de errores
function validar($datos){
  $errores = [];

if(isset ($datos["nombre"])) {
  $nombre = trim($datos["nombre"]);
  if (empty($nombre)) {
$errores["nombre"] = "El nombre no puede estar vacio";
}
dd($nombre);
// Armar if(): Si ya existe Base de Datos, elegir otro nombre
}
if (isset($datos["email"])){
  $email = trim($datos["email"]);
  if (empty($email)){
    $errores["email"] = "El email no puede estar vacio";
  }
  elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $errores["email"] = "El email no es valido";
  }
  //Arman if(): Si ya existe en Base de DAtos......
}

if (isset($datos["pass"])){
  $pass = trim($datos["pass"]);
  if (empty($pass)){
    $errores["pass"] = "La contraseña no puede estar vacia"
  }
  elseif(strlen($pass)<6){
    $errores["pass"] = "La contraseña debe tener al menos 6 caracteres"
  }
}

if (isset($datos["repass"])){
  $repass = trim($datos["repass"]);
  if (empty($repass)){
    $errores["repass"] = "La contraseña no puede estar vacia";
  }
  elseif ($repass != $pass) {
$errores["repass"] = "Las contraseñas deben coincidir";
  }
}




}


 ?>
