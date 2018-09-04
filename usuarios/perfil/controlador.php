<?php

function cambiaEmail($email, $email2){
    $conexion = getConexion();
    $consulta = "SELECT * FROM usuarios WHERE usuario='usuarioSesion';";
    $resultado = mysqli_query($conexion,$consulta) or die("Consulta errónea");

    if($resultado){
        
    }
    

}
function cambiaContrasena($contrasena){
    $conexion = getConexion();
}

$usuarioSesion = $_SESSION["usuario"];

if (isset($usuarioSesion)) {
   include("template.php");
   if(isset($_POST["enviar"])){

      $email = $_POST["email"];
      $email2 = $_POST["email2"];
      $contrasena = $_POST["contrasena"];
      $contrasena2 = $_POST["contrasena2"];

      if($email AND $email2){
          cambiaEmail($email, $email2);
      }else{
          addError("El email no coincide");
      }

      if($contrasena AND $contrasena2){
          cambiaContrasena($contrasena, $contrasena2);
      }else{
          addError("La contraseña no coincide,verifique");
      }

   }
}






?>