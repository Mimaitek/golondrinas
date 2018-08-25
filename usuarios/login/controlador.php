<?php require_once(dirname(__FILE__)."/../conexion.php"); ?>


<?php

 /** Con esta función lo que quiero comprobar es que la contraseña es correcta ya que previamente
      * he utilizado la función password_hash(); para codificar la contraseña-
     */
    function compruebaContrasena($contrasena, $passHash){
        return password_verify($contrasena, $passHash);
         
      }

function compruebaUsuario($usuario,$passHash){

    $conexion = getConexion();
    $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario' AND contrasena='$passHash';";
    $resultado = mysqli_query($conexion,$consulta) or die("Consulta errónea");
    
    while($fila = mysqli_fetch_array($resultado)){
        $user = $fila["usuario"];
        $pass = $fila["contrasena"];
      

        if($user != $usuario){
            addError("Datos  incorrectos, verifique la información");
            
        }
        if( $pass != $passHash ){
            echo "contraseña incorrecta";
        }
        
        if($user AND $pass){
            addMensaje("Login completado");
            $_SESSION["usuario"] = $user;
            Header('Location: '.$_SERVER['PHP_SELF']);
        }
          mysql_free_result($resultado);
    } 
  
    

    
}
if(($_SERVER['REQUEST_METHOD'])== "POST"){

    $usuario = $_POST["usuario"];
    $contrasena = $_POST["contrasena"];
    $passHash = password_hash($contrasena, PASSWORD_BCRYPT); //Función para cifrar contraseña.

    
    compruebaUsuario($usuario,$passHash);
   
    
}


include("template.php");

?>