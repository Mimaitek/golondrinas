<?php require_once(dirname(__FILE__)."/../../conexion.php"); ?>

<?php
 
//Comprobar si el usuario está registrado y si tiene permiso para subir productos.

$pagina_siguiente = true;
$pagina_actual = 1;
$pagina_anterior = true;

$parts = parse_url(RUTA_ACTUAL);
if(isset($parts['query'])) {
    parse_str($parts['query'], $parametros_url);
    if(isset($parametros_url["page"])){
        $pagina_actual = $parametros_url['page'];
    }


}
$pagina_anterior = $pagina_actual > 1;

$productos = getProductos();
require("template.php");



function getProductos(){

    global $pagina_actual, $pagina_siguiente;
    $limit = 2;
    $offset = $limit*($pagina_actual -1);

    $conexion = getConexion();
    $consulta = "SELECT * FROM productos ORDER BY id DESC LIMIT $offset, $limit";
    $resultado = mysqli_query($conexion,$consulta) or die("Consulta errónea ");

    $productos = array();

    $contar = 0;

    if ($resultado){
        while ($producto = mysqli_fetch_assoc($resultado)) {
            $producto['foto_marketing'] = getImageMarke($producto['id']);
            $producto['foto_marketing']['contenido_archivo'] = base64_encode($producto['foto_marketing']['contenido_archivo']);
            $producto['foto_real'] = getImageReal($producto['id']);
            $producto['foto_real']['contenido_archivo'] = base64_encode($producto['foto_real']['contenido_archivo']);
            array_push($productos, $producto);
            $contar++;
            
    }


    if($contar <$limit){
        $pagina_siguiente = false;
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



