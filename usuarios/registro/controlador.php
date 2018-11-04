
<?php require_once(dirname(__FILE__)."/../../conexion.php"); ?>
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


/*Más tarde intentamos verificar el usuario, no queremos carácteres vacíos ni que superen más de 10 caracteres. Además debe ser caracteres alfanuméricos*/

function verificarUsuario($usuario){
  if(preg_match("/^[\s\S]{0,10}$/",$usuario)){
      return true;
      if(trim($usuario !="" AND trim($usuario<10))){
        return true;
      }else{
        return false;
        addMensaje("Compruebe Usuario, máximo 10 caracteres");
      }
  }else{
    return false; 
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
             addError("No ha escrito todos los datos, compruebe la información");
             return false;
          }
        }


 /*Verificamos la contraseña mostrando que tenga al menos 5 caracteres o que no esté vacío*/ 

function verificarContrasena($contrasena){
  $longitud = strlen($contrasena);
          if($longitud<5){
            addMensaje("La contraseña debe contener al menos 5 caracteres");
          }else{
            return true;
          }

}
     





         

          if(($_SERVER['REQUEST_METHOD'])== "POST"){

            if (isset($_POST["enviar"])){
                $email = $_POST["email"];
                $usuario = $_POST["usuario"];
                $contrasena = $_POST['contrasena'];    
                $passHash = password_hash($contrasena, PASSWORD_BCRYPT); //Función para cifrar contraseña.
                
                /*Comprobamos el usuario si es correcto, si lo es comprobamos el email para más tarde comprobar si existe el usuario 
                y si la contraseña es correcta. Si es true, se ejecuta el registro.*/
                if(verificarUsuario($usuario)){
                    if(verificar_email($email)){
                      if(compruebaRegistro($usuario,$email) AND  verificarContrasena($contrasena)){
                        agregarUsuario($usuario,$email,$passHash);
                       addMensaje("Registro completado");
                    }
                      }else{
                        addError("Email incorrecto");
                      }
                  }else{
                    addError("Usuario incorrecto");
                  }
                
                 
                }

              }
              
            
          


    
?>
<?php include("template.php"); ?>