<?php require_once(dirname(__FILE__)."/../../conexion.php"); ?>

<?php
 
//Comprobar si el usuario está registrado y si tiene permiso para subir productos.


require("template.php");


function getProductos(){
/**
 >>> def dame_limit_y_offset(page=1):
...   page = page - 1
...   return limit, limit*page


limit=20

>>> dame_limit_y_offset(1)
(20, 0)
>>> dame_limit_y_offset(2)
(20, 20)
>>> dame_limit_y_offset(3)
(20, 40)

 */
    $limit = 2;
    $offset = 0;

    $conexion = getConexion();
    $consulta = "SELECT * FROM productos ORDER BY id DESC LIMIT $offset, $limit";
    $resultado = mysqli_query($conexion,$consulta) or die("Consulta errónea linea15");

    $productos = array();

    if ($resultado){
        while ($producto = mysqli_fetch_assoc($resultado)) {
            $producto['foto_marketing'] = getImageMarke($producto['id']);
            $producto['foto_marketing']['contenido_archivo'] = base64_encode($producto['foto_marketing']['contenido_archivo']);
            $producto['foto_real'] = getImageReal($producto['id']);
            $producto['foto_real']['contenido_archivo'] = base64_encode($producto['foto_real']['contenido_archivo']);
            array_push($productos, $producto);
            
    }
    return $productos;
 }
}    


function getImageMarke($producto_id){

    $conexion = getConexion();
    $consulta = "SELECT * FROM archivo_productos  WHERE tipo = 'marketing' AND productos_id = '$producto_id';";
    $resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

    $foto = array();

    if ($resultado){
        while ($imagen = mysqli_fetch_assoc($resultado)) {

            return $imagen;
    }
    }
}

function getImageReal($producto_id){

    $conexion = getConexion();
    $consulta = "SELECT * FROM archivo_productos WHERE tipo = 'real' AND productos_id = '$producto_id';";
    $resultado = mysqli_query($conexion, $consulta) or die( mysqli_error($conexion));
  

    $foto = array();

    if ($resultado){
        while ($imagen = mysqli_fetch_assoc($resultado)) {
           return $imagen;
    }   
 }
}



