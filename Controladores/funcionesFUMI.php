<?php
function validar($datos){
  $errores = [];

if(isset ($datos["nombre"])) {
  $nombre = trim($datos["nombre"]);
  if (empty($nombre)) {
$errores["nombre"] = "El nombre no puede estar vacio";
}
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
    $errores["pass"] = "La contraseña no puede estar vacia";
  }
  elseif(strlen($pass)<6){
    $errores["pass"] = "La contraseña debe tener al menos 6 caracteres";
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
  return $errores;
}
//hay que decidir si vamos a tener imagen y agregar el imput para subir imágenes y la validación de las mismas

function abrirJson($archivo){
    if(file_exists($archivo)){
        $json = file_get_contents($archivo);
        $json = explode(PHP_EOL,$json);
        array_pop($json);
        foreach ($json as $key => $value) {
            $arrayUsuarios[]=json_decode($value,true);
        }
        return $arrayUsuarios;
    }
    return null;
}

}

function buscarPor($email){
    $usuarios = abrirJSON("usuarios.json");
    if($usuarios !== NULL){
        foreach($usuarios as $usuario){
          if($email === $usuario["email"]){
            return $usuario;
          }
        }
    }


    foreach ($usuarios as $key => $value) {

        if($usuarios == $value[$posicion]){
            return $value;
        }
    }
    return null;
}

 ?>
