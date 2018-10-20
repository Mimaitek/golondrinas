<?php require_once(dirname(__FILE__)."/../conexion.php"); ?>


<?php

//Informamos que los campos están vacíos.
function existeDatos($usuario, $contrasena){
    if($usuario =="" OR $contrasena ==""){
        addMensaje("No existen datos");
        return false;
    }else{
        return true;
    }
}





function compruebaUsuario($usuario){

    $conexion = getConexion();
    $consulta = "SELECT * FROM usuarios WHERE usuario='$usuario';";
    $resultado = mysqli_query($conexion,$consulta) or die("Consulta errónea");
    

    if ($resultado){
        while ($row = mysqli_fetch_assoc($resultado)) {
             $usuario = $row["usuario"];
             $pass = $row["contrasena"];
             $id_usuario = $row["id"];

        $contrasena = $_POST["contrasena"];

        if(password_verify($contrasena, $pass)){
            echo "Password correcto";
            return $id_usuario;
        }else{
            return 0;
        }

    }
 }
 mysqli_free_result($resultado);
}
    

    

if(($_SERVER['REQUEST_METHOD'])== "POST"){

     $usuario = $_POST["usuario"];
     $contrasena = $_POST["contrasena"];
     
    
    $id_usuario = compruebaUsuario($usuario);
    
       if($id_usuario){
        addMensaje("Login completado");
        $_SESSION["usuario"] = $usuario;
        $_SESSION["id_usuario"] = $id_usuario;
        Header('Location: '.$_SERVER['PHP_SELF']);
        }else{
            addError("Error de login");
        }
    }

    
   
    



include("template.php");

?>