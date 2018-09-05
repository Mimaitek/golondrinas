<?php require_once(dirname(__FILE__)."/../conexion.php"); ?>

<?php
 

 function usuarioValido(){
     $usuarioSesion = $_SESSION["usuario"];
     $conexion = getCOnexion();
     $consulta = "SELECT * FROM usuarios WHERE usuario='$usuarioSesion' AND baneo='0';";
     $resultado = mysqli_query($conexion, $consulta) or die("consulta errónea");
     if ($resultado){
        while ($row = mysqli_fetch_assoc($resultado)) {
             $row["baneo"];
             if($row["baneo"] == 0){
                 return true;
             }else{
                 addError("No puede agregar reviews de productos");
                 return false;
             }
        }
    }

 }

 if(usuarioValido()){
    require("template.php");
 }else{
     require("template2.php");
 }
 
 

?>