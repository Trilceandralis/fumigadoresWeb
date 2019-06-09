<?php
function dd($valor){
    echo "<pre>";
    var_dump($valor);
    echo "</pre>";
    exit;
}


function validar($datos){
  $errores=[];

  if(isset($datos["nombre"])){
  $nombre= trim($datos["nombre"]);
  if (empty($nombre)) {
    $errores["nombre"]="Complete su nombre";
  }
}

  if(isset($datos["email"])){
    $email= trim($datos["email"]);
  if(empty($email)){
    $errores["email"] = "Complete su email";
  } elseif (!filter_var($email,FILTER_VALIDATE_EMAIL)){
    $errores["email"] = "Email invalido";
  }
}

  $pass = trim($datos["pass"]);
  $repass = trim($datos["repass"]);
  if(empty($pass)){
    $errores["pass"] = "Introduzca una contrasena";
  } elseif (strlen($pass) < 8) {
    $errores["pass"] = "La contrasena debe tener como minimo 8 caracteres";
  } elseif($pass != $repass) {
    $errores["repass"] = "Sus contrasenas no coinciden";
  }

  if($bandera == "register"){
    if($_FILES["avatar"]["error"] != 0){
      $errores["avatar"] = "No olvides subir tu imagen";
    }
    $nombre = $_FILES["avatar"]["name"];
    $ext = pathinfo($nombre, PATHINFO_EXTENSION);
    if($ext != "png" && $ext != "jpg"){
      $errores["avatar"]= "La imagen debe tener formato .jpg o .png";
    }
  }
  return $errores;

  }

function inputUsuario($campo){
  if(isset($_POST[$campo])){
    return $_POST[$campo];
  }
}

function armarAvatar($imagen){
  $nombre = $imagen["avatar"]["name"];
  $ext = pathinfo($nombre,PATHINFO_EXTENSION);
  $archivoOrigen = $imagen["avatar"]["tmp_name"];
  $archivoDestino = dirname(__DIR__);
  $archivoDestino = $archivoDestino."/imagenes/";
  $avatar = uniqid();
  $archivoDestino = $archivoDestino.$avatar;
  $archivoDestino = $archivoDestino.".".$ext;
  move_uploaded_file($archivoOrigen,$archivoDestino);
  $avatar = $avatar.".".$ext;
  return $avatar;
}

function armarRegistro($datos,$imagen){
  $usuario=[
    "nombre"=> $datos["nombre"],
    "email"=> $datos["email"],
    "pass"=> password_hash($datos["pass"], PASSWORD_DEFAULT),
    "avatar"=> $imagen,
    "perfil"=> 1
  ];
  return $usuario;
}

function guardarUsuario($usuario){
  $jsusuario= json_encode($usuario);
  file_put_content('usuarios.json', $jsusuario. PHP_EOL, FILE_APPEND);
}

function buscarPorEmail($email){
  $usuario= abrirBaseDatos();
  if($usuarios !==NULL){
    foreach($usuarios as $usuario){
      if($email===$usuario["email"]){
        return $usuario;
      }
    }

  }
  return null;
}



function abrirBaseDatos(){
  if(file_exist("usuarios.json")){
    $baseDatosJson=file_get_contents("usuarios.json");
    $baseDatosJson= explode(PHP_EOL,$baseDatosJson);
    array_pop($baseDatosJson);
    foreach ($baseDatosJson as $usuarios){
      $arrayUsuarios[]= json_decode($usuarios,true);
    }
    return $arrayUsuarios;
  }else{
    return null;
  }
}



function seteoUsuario($user, $dato){
  $_SESSION["nombre"]= $user["nombre"];
  $_SESSION["email"]= $user["email"];
  $_SESSION["perfil"]= $user["perfil"];
  $_SESSION["avatar"]= $user["avatar"];
  if(isset($dato["recordar"])){
    setcookie("email",$dato["email"], time()+3600);
    setcookie("pass",$dato["pass"], time()+3600);
  }
}



function validarUsuario(){
  if($_SESSION["email"]){
    return true;
  }elseif($_COOKIE["email"]){
    $_SESSION["email"]=$_COOKIE["email"];
    return true;
  }else{
    return false;
  }

}


 ?>
