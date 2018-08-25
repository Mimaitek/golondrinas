
<?php require_once(dirname(__FILE__)."/../conexion.php"); ?>
<?php
     


/*A continuación intentaremos comprobar el email  si es un email válido.A través de la expresión regular.
*/
function verificar_email($email){
  if(preg_match("/^([a-zA-Z0-9])+([a-zA-Z0-9\._-])*@([a-zA-Z0-9_-])+([a-zA-Z0-9\._-]+)+$/",$email)){
    return true;
  }else{
  return false;
  addMensaje("Compruebe email");
  }
}


/*Más tarde intentamos verificar el usuario, no queremos carácteres vacíos ni que superen más de 10 caracteres*/
function verificarUsuario($usuario){
  $userLongitud = strlen($usuario);
  if(trim($userLongitud !="" AND trim($userLongitud<10))){
    return true;
  }else{
    return false;
    addMensaje("Compruebe Usuario");
  }
}



 

    
/** Con esta función lo que hago es comprobar que los datos enviados por el usuario sean correctos y 
 * que además sean insertados correctamente en la base de datos.
 * 
 */
function agregarUsuario($usuario, $email, $passHash){  
        $conexion = getConexion();//Conexión e inserción de datos en la base de datos.
        $consulta = "INSERT INTO usuarios (usuario, email, contrasena, baneo,
                    tipo_user) VALUES ('$usuario', '$email', '$passHash', 0, '0');";
        $resultado = mysqli_query($conexion, $consulta)or die ("Conexion errónea");

          if ($resultado){
              return true;
          }
        mysqli_close($conexion);
     }
  


  

/** Con esta función lo que hago es comprobar que no existe en la base de datos un usuario
 * o un email duplicado.
 * 
 */
          function compruebaRegistro($usuario, $email){
            /*Hacemos que con trim se eliminen las ""
            * para que en caso de que introduzca " " (con espacio) ésto no sea validado.*/
            if($usuario!="" AND $email!=""){  
                $conexion = getConexion();
                $consulta = "SELECT * FROM usuarios WHERE  usuario='$usuario' or email='$email';";

                $resultado = mysqli_query($conexion, $consulta) or die("Conexión errónea");

                $fila=mysqli_fetch_array($resultado, MYSQLI_ASSOC);
                if(!$fila){
                  return true;
                }else{
                  addError("Email o Usuario ya existentes");
                  return false;
                }
            
           }else{
             addError("No ha escrito datos, compruebe la información");
             return false;
          }
        }
        /*Verificamos la contraseña mostrando que tenga al menos 4 caracteres o que no esté vacío*/ 
function verificarContrasena($contrasena){
  $longitud = strlen($contrasena);
          if($longitud<5){
            addMensaje("La contraseña debe contener al menos 5 caracteres");
          }else{
            return true;
          }

}


     /** Con esta función lo que quiero comprobar es que la contraseña es correcta ya que previamente
      * he utilizado la función password_hash(); para codificar la contraseña-
     */
   function compruebaContrasena($contrasena, $passHash){
    if(verificarContrasena){
        if(compruebapass($contrasena)){
           return password_verify($contrasena, $passHash);
        }
    }else{
      return false;
    }
    
     
  }


         

          if(($_SERVER['REQUEST_METHOD'])== "POST"){

            if (isset($_POST["enviar"])){
                $email = $_POST["email"];
                $usuario = $_POST["usuario"];
                $contrasena = $_POST['contrasena'];    
                $passHash = password_hash($contrasena, PASSWORD_BCRYPT); //Función para cifrar contraseña.
                
               
                  if(compruebaRegistro($usuario,$email) AND  verificarContrasena($contrasena)){
                    agregarUsuario($usuario,$email,$passHash);
                    addMensaje("Registro completado");
                    
                  }
                  
                 
                }

              }
              
            
          


    
?>
<?php include("template.php"); ?>