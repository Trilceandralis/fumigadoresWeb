<?php

session_start();


function dd($valor){
    echo "<pre>";
        var_dump($valor);
        exit;
    echo "</pre>";
}

function validar($datos, $bandera){
    $errores = [];

if($bandera=="register"){
    $nombre = trim($datos["nombre"]);
    if (empty($nombre)){
        $errores["nombre"]="Complete su nombre";
    }
  }
    $email = trim($datos["email"]);
    if(empty($email)){
        $errores["email"]="Complete su email";
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $errores["email"]="Email inválido";

    }
    $pass = trim($datos["pass"]);
    if($bandera=="register" || $bandera=="olvidePass"){
    $repass = trim($datos["repass"]);
    if(empty($pass)){
        $errores["pass"] = "Introduzca su contraseña";
    }
    elseif (strlen($pass)<8) {
        $errores["pass"] = "La contraseña debe tener mínimo ocho caracteres";
    }elseif ($pass != $repass) {
        $errores["repass"]= "Las contraseñas no coinciden";
    }
    }
    if($bandera == "register"){

        if(isset($_FILES)){
        if($_FILES["avatar"]["error"] !=UPLOAD_ERR_OK){
            $errores["avatar"]="No olvides subir tu imagen";
        }
        $nombre = $_FILES["avatar"]["name"];
        $ext = pathinfo($nombre,PATHINFO_EXTENSION);
        if($ext != "jpg" && $ext != "png"){
            $errores["avatar"]="Tu imagen debe tener un formato .jpg ó .png";
        }
    }
  }

return $errores;
}

function persistir($campo){
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
    $usuario = [
        "nombre"=>$datos["nombre"],
        "email"=>$datos["email"],
        "pass"=> password_hash($datos["pass"],PASSWORD_DEFAULT),
        "avatar"=>$imagen

    ];
    return $usuario;
}

function guardarUsuario($usuario){
    $jsusuario = json_encode($usuario);
    file_put_contents('usuarios.json', $jsusuario . PHP_EOL , FILE_APPEND);
}

function abrirBaseDatos(){
    if(file_exists("usuarios.json")){
        $baseDatosJson= file_get_contents("usuarios.json");
        $baseDatosJson = explode(PHP_EOL,$baseDatosJson);
        array_pop($baseDatosJson);
        foreach ($baseDatosJson as  $usuarios) {
            $arrayUsuarios[]= json_decode($usuarios,true);
        }
        return $arrayUsuarios;
    }else{
        return null;
    }
}

function buscarEmail($email){
    $usuarios = abrirBaseDatos();
    if($usuarios!==null){
        foreach ($usuarios as $usuario) {
            if($email === $usuario["email"]){
                return $usuario;
            }
        }
    }

    return null;
}

function armarRegistroOlvide($datos){
    $usuarios = abrirBaseDatos();

    foreach ($usuarios as $key=>$usuario) {

        if($datos["email"]==$usuario["email"]){

            $usuario["pass"]= password_hash($datos["pass"],PASSWORD_DEFAULT);
            $usuarios[$key] = $usuario;
        }
        $usuarios[$key] = $usuario;
    }

    unlink("usuarios.json");
    foreach ($usuarios as  $usuario) {
        $jsusuario = json_encode($usuario);
        file_put_contents('usuarios.json',$jsusuario. PHP_EOL,FILE_APPEND);
    }
}


function seteoUsuario($user,$dato){
    $_SESSION["nombre"]=$user["nombre"];
    $_SESSION["email"] = $user["email"];
    $_SESSION["perfil"]= $user["perfil"];
    $_SESSION["avatar"]= $user["avatar"];
    if(isset($dato["recordar"]) ){
        setcookie("email",$dato["email"],time()+3600);
        setcookie("pass",$dato["pass"],time()+3600);
    }
}



function validarUsuario(){
    if($_SESSION["email"]){
        return true;
    }elseif ($_COOKIE["email"]) {
        $_SESSION["email"]=$_COOKIE["email"];
        return true;
    }else{
        return false;
    }

}
