<?php require_once(dirname(__FILE__)."/../../conexion.php"); ?>

<?php
 
//Comprobar si el usuario está registrado y si tiene permiso para subir productos.


require("template.php");


function getProductos(){

    $conexion = getConexion();
    $consulta = "SELECT * FROM productos";
    $resultado = mysqli_query($conexion,$consulta) or die("Consulta errónea");

    $productos = array();

    if ($resultado){
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($productos, $row);
    }

    return $productos;
 }
 mysqli_free_result($resultado);
}
    
function enlaceImagen(){
     
    $conexion = getCone
}

function getImageMarke($producto_id){

    $conexion = getConexion();
    $consulta = "SELECT * FROM archivo_productos WHERE WHERE tipo = 'marketing' AND producto_id = '$producto_id';";
    $resultado = mysqli_query($conexion,$consulta) or die("Consulta errónea");

    $foto = array();

    if ($resultado){
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($foto, base64_encode($row['contenido_archivo']));
    }

    return $foto;
 }
 mysqli_free_result($resultado);
}

function getImageReal(){

    $conexion = getConexion($producto_id);
    $consulta = "SELECT * FROM archivo_productos WHERE WHERE tipo = 'real' AND producto_id = '$producto_id';";
    $resultado = mysqli_query($conexion,$consulta) or die("Consulta errónea");

    $foto = array();

    if ($resultado){
        while ($row = mysqli_fetch_assoc($resultado)) {
            array_push($foto, base64_encode($row['contenido_archivo']));
    }

    return $foto;
 }
 mysqli_free_result($resultado);
}
    




?>