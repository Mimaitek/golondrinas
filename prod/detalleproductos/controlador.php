<?php require_once(dirname(__FILE__)."/../../conexion.php"); ?>

<?php
 
//Comprobar si el usuario está registrado y si tiene permiso para subir productos.

$ID_PRODUCTO = str_replace('/detalleproductos/', '', RUTA_ACTUAL);
$usuarioSesion = $_SESSION["usuario"];


if (isset($_POST["comentario"]) && isset($_POST["voto-comentario"])){
    $comentario = $_POST['comentario'];
    $voto_comentario = $_POST["voto-comentario"];

    if(!comentarioFueVotado($comentario)) {

        $conexion = getConexion();
        $usuarioSesion = $_SESSION["id_usuario"];
        $consulta = "INSERT INTO Votos_Comentarios (usuario_id, comentario_id, puntuacion) VALUES ('$usuarioSesion', '$comentario', '$voto_comentario');";
        $resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));
    }


}


if (isset($_POST["enviar"])){
    $contenido = $_POST["comentariosProducto"];
    $fecha = fechaHoy();
   

    if($contenido == ""){
        echo "error no insercion de datos";

    }else{

   
    insertarComentarios($ID_PRODUCTO, $contenido,$fecha); 
    }

}

require("template.php");

//Rescatar datos del producto
function getProductoDetalle($id){

    $conexion = getConexion();
    $consulta = "SELECT productos.*, usuarios.usuario FROM productos INNER JOIN usuarios ON productos.id_usuario = usuarios.id WHERE productos.id = '$id';";
    $resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

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
function insertarComentarios($producto_id, $contenido, $fecha){
  
    $conexion = getConexion();
    $usuarioSesion = $_SESSION["id_usuario"];
    $consulta = "INSERT INTO comentarios (usuario_id, producto_id, contenido , fecha) VALUES ('$usuarioSesion', '$producto_id', '$contenido', STR_TO_DATE('$fecha', '%d/%m/%Y'));";
    $resultado = mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));
    if ($resultado){
        return true;
    }else{
        addError("Error en la inserción del comentario");
    }
}
//Para recuperar todos los comentarios del producto

function recuperarComentarios($producto_id){
    $conexion = getConexion();
    $consulta = "SELECT comentarios.*, usuarios.usuario FROM comentarios INNER JOIN usuarios ON comentarios.usuario_id = usuarios.id WHERE producto_id = '$producto_id' ORDER BY fecha ;";
    $resultado = mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));
    
    $comentarios = array();
    if ($resultado){
        while ($comentario = mysqli_fetch_assoc($resultado)) {
            array_push($comentarios, $comentario);
        }

        return $comentarios;

}
}
//Funciones referentes a los comentarios de la vista detalles de los productos.

function comentarioFueVotado($comentario_id) {
    /*
    Tiene que retornar un booleano
    */
    $id_usuario = $_SESSION["id_usuario"];
    $conexion = getConexion();
    $consulta = "SELECT * FROM Votos_Comentarios WHERE usuario_id = '$id_usuario' AND comentario_id = '$comentario_id'";
    $resultado = mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));

    if($resultado) {
        while ($row = mysqli_fetch_assoc($resultado)) {
            return true;
        }
    }
    return false;

}

function votosComentario($comentario_id) {
    /*
    tiene que retornar un int
    */

    $id_usuario = $_SESSION["id_usuario"];
    $conexion = getConexion();
    $consulta = "SELECT * FROM Votos_Comentarios WHERE comentario_id = '$comentario_id'";
    $resultado = mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));

    $total = 0;
    if($resultado) {
 
        while ($comentario = mysqli_fetch_assoc($resultado)) {
            $voto = intval($comentario['puntuacion']);
            $total += $voto;
        }

    }

    return $total;

}



?>