<?php require_once(dirname(__FILE__)."/../../conexion.php"); ?>

<?php
//Función para recuperar la contraseña
$usuarioSesion = $_SESSION["usuario"];
$email_usuario = "";
function recuperaMail($usuarioSesion){
    global $usuarioSesion;
    global $email_usuario;
    $conexion = getConexion();
    $consulta = "SELECT * FROM usuarios WHERE usuario = '$usuarioSesion'";

    $resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
    
    if ($resultado){
        while ($row = mysqli_fetch_assoc($resultado)) {
             $email_usuario = $row["email"];
             return $email_usuario;
        }
}
}


recuperaMail($usuarioSesion);



//Función para verificar el email
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

//Función para verificar la contraseña 
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
//si cumple las condiciones podrá cambiar la contraseña antigua por la nueva.
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