<?php require_once(dirname(__FILE__)."/../../conexion.php"); ?>

<?php
 
//Comprobar si el usuario está registrado y si tiene permiso para subir productos.


require("template.php");


function getProductos(){

    $conexion = getConexion();
    $consulta = "SELECT * FROM productos";
    $resultado = mysqli_query($conexion,$consulta) or die("Consulta errónea linea15");

    $productos = array();

    if ($resultado){
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($productos, $row);
    }

    return $productos;
 }
 mysqli_free_result($resultado);
}    


function getImageMarke($producto_id){

    $conexion = getConexion();
    $consulta = "SELECT * FROM archivo_productos  WHERE tipo = 'marketing' AND productos_id = '$producto_id';";
    $resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

    $foto = array();

    if ($resultado){
        while ($row = mysqli_fetch_assoc($resultado)) {

            return base64_encode($row['contenido_archivo']);
    }

    }
}

function getImageReal($producto_id){

    $conexion = getConexion();
    $consulta = "SELECT * FROM archivo_productos WHERE tipo = 'real' AND productos_id = '$producto_id';";
    $resultado = mysqli_query($conexion, $consulta) or die( mysqli_error($conexion));

    $foto = array();

    if ($resultado){
        while ($row = mysqli_fetch_assoc($resultado)) {
           return base64_encode($row['contenido_archivo']);
    }
    

 }

}
    




?>