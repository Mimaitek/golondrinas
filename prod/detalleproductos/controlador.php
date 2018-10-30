<?php require_once(dirname(__FILE__)."/../../conexion.php"); ?>

<?php
 
//Comprobar si el usuario está registrado y si tiene permiso para subir productos.

$ID_PRODUCTO = str_replace('/detalleproductos/', '', RUTA_ACTUAL);

echo $ID_PRODUCTO;

require("template.php");

function getProductoDetalle($id){

    $conexion = getConexion();
    $consulta = "SELECT * FROM productos WHERE id = '$id';";
    $resultado = mysqli_query($conexion,$consulta) or die("Consulta errónea linea15");


    if ($resultado){
        while ($row = mysqli_fetch_assoc($resultado)) {
            return $row;
    }
}
}    


?>