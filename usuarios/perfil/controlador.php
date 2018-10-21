<?php require_once(dirname(__FILE__)."/../../conexion.php"); ?>

<?php

function cambiaEmail($email){
    $conexion = getConexion();
    $usuarioSesion = $_SESSION["usuario"];
    $consulta = "UPDATE usuarios SET email='$email' WHERE usuario='$usuarioSesion';";
    $resultado = mysqli_query($conexion,$consulta) or die("Consulta errónea");

    if($resultado){
        return true;
    }else{
        return false;
    }
    
}


function cambiaContrasena($contrasena){
    $conexion = getConexion();
    $usuarioSesion = $_SESSION["usuario"];
    $passHash = password_hash($contrasena, PASSWORD_BCRYPT); //Función para cifrar contraseña.
    $consulta = "UPDATE usuarios SET contrasena='$passHash' WHERE usuario='$usuarioSesion';";
    $resultado = mysqli_query($conexion,$consulta) or die("Consulta errónea");

    if($resultado){
        return true;
    }else{
        return false;
    }
}

$usuarioSesion = $_SESSION["usuario"];

if (isset($usuarioSesion)) {
   include("template.php");
   if(isset($_POST["enviar"])){

      $email = $_POST["email"];
      $email2 = $_POST["email2"];
      $contrasena = $_POST["contrasena"];
      $contrasena2 = $_POST["contrasena2"];
      

      if($email AND $email != ""){
          if($email == $email2){
              cambiaEmail($email);
              addMensaje("Datos actualizaos");
          }else{
              addError("Error en los datos");
          }  
      }if($contrasena AND $contrasena != ""){
          if($contrasena == $contrasena2){
              cambiaContrasena($contrasena);
              addMensaje("Datos actualizaos");
          }else{
              addError("Error en los datos");
          }
      }

    }  
  }






?>