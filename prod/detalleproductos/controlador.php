<?php require_once(dirname(__FILE__)."/../../conexion.php"); ?>

<?php
 
//Comprobar si el usuario está registrado y si tiene permiso para subir productos.

$ID_PRODUCTO = str_replace('/detalleproductos/', '', RUTA_ACTUAL);
$usuarioSesion = $_SESSION["usuario"];


if (isset($_POST["enviar"])){

    $contenido = $_POST["comentariosProducto"];
    $fecha = fechaHoy();
   
    insertarComentarios($ID_PRODUCTO, $contenido,$fecha); 

}

require("template.php");

//Rescatar datos del producto
function getProductoDetalle($id){

    $conexion = getConexion();
    $consulta = "SELECT * FROM productos WHERE id = '$id';";
    $resultado = mysqli_query($conexion,$consulta) or die("Consulta errónea linea");

    $producto = null;
    if ($resultado){
        while ($p = mysqli_fetch_assoc($resultado)) {
            $producto = $p;
            break;
        }
    }

    $producto["foto_marketing"] =  getImageMarke($id);
    $producto['foto_marketing']['contenido_archivo'] = base64_encode($producto['foto_marketing']['contenido_archivo']);
    $producto["foto_real"] = getImageReal($id);
    $producto['foto_real']['contenido_archivo'] = base64_encode($producto['foto_real']['contenido_archivo']);
    return $producto;
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

// Funcion para incorporar la fecha
function fechaHoy(){
    $hoy = getdate();
    $fecha = $hoy["mday"] . "/" . $hoy["mon"] . "/" . $hoy["year"];
    return $fecha;
}


//Función para la inserción de comentarios en la pagina web.
function insertarComentarios($producto_id, $contenido,$fecha){
  
    $conexion = getConexion();
    $usuarioSesion = $_SESSION["id_usuario"];
    $consulta = "INSERT INTO comentarios (usuario_id, producto_id, contenido , fecha) VALUES ('$usuarioSesion', '$producto_id', '$contenido', STR_TO_DATE('$fecha', '%d/%m/%Y'));";
    $resultado = mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));
    if ($resultado){
        return true;
    }else{
        echo "<h1>Error en la inserción del comentario</h1>";
    }
}
//Para recuperar todos los comentarios del producto

function recuperarComentarios($producto_id){
    $conexion = getConexion();
    $consulta = "SELECT * FROM comentarios WHERE producto_id = '$producto_id'  ORDER BY fecha ;";
    $resultado = mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));
    
    $comentarios = array();
    if ($resultado){
        while ($comentario = mysqli_fetch_assoc($resultado)) {
            array_push($comentarios, $comentario);

        }

        return $comentarios;

}
}

function recuperarUsuario(){
    $conexion = getConexion();
    $consulta = "SELECT * FROM comentarios WHERE producto_id = '$producto_id'  ORDER BY fecha ;";
}

?>