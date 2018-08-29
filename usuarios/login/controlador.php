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
    echo $consulta."<br>";

    if ($resultado){
        while ($row = mysqli_fetch_assoc($resultado)) {
             $row["usuario"];
             $row["contrasena"];
             $usuario = $row["usuario"];
             $pass = $row["contrasena"];

        $contrasena = $_POST["contrasena"];

        if(password_verify($contrasena, $pass)){
            echo "Password correcto";
            return true;
        }else{
            return false;
            echo "Contraseña inválida";
        }

    }
 }
 mysqli_free_result($resultado);
}
    

    

if(($_SERVER['REQUEST_METHOD'])== "POST"){

     $usuario = $_POST["usuario"];
     $contrasena = $_POST["contrasena"];
     
    

    
       if(compruebaUsuario($usuario)){
        addMensaje("Login completado");
        }else{
            addError("Error de login");
    }
    
    /*
        if( $usuario AND $pass){
            $_SESSION["usuario"] = $user;
            Header('Location: '.$_SERVER['PHP_SELF']);
        }else{
            addError("Error de login");
        }*/
    
}


include("template.php");

?>