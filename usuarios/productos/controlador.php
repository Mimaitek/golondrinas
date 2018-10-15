<?php require_once(dirname(__FILE__)."/../conexion.php"); ?>

<?php
 

 function usuarioValido(){
     $usuarioSesion = $_SESSION["usuario"];
     $conexion = getConexion();
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




function validarProducto(){
    $producto = $_POST["producto"];
    if($producto!=""){
        return true;
    }else{
        return false;
        addMensaje("Debe Incluir un nombre del producto");
    }

}

function validarClasificacion(){
    $clasificacion = $_POST["clasificacion"];
    if($clasificacion){
        return true;
    }else{
        return false;
        addMensaje("Debe seleccionar un tipo de Producto");
    }

}

function validarPuntuacion(){
    $puntuacion = $_POST["puntuacion"];
    foreach ($puntuacion as $puntos){
        $puntos = $puntos_producto;
    }
   
    if($puntos_producto){
        return true;
    }else{
        return false;
        addMensaje("Debe seleccionar una puntuación");
    }
}

function validarComentarios(){
    $comentarios = strlen($_POST["comentarios"]);
    if($comentarios<200 || $comentarios == ""){
        return false;
        addMensaje("Debe escribir al menos 200 caracteres");
    }else{
        return true;
    }

}

function validarMarketingFoto(){
    $marketing_foto = $_POST["marketing_foto"];
    if($marketing_foto){
        return true;
    }

}
function validarProductoFoto(){
    $producto_foto = $_POST["producto_foto"];
    if($producto_foto){
        return true;
    }
}

function validaDatos(){
    if(validarProducto() && validarClasificacion() && validarPuntuacion() && validarComentarios() && validarMarketingFoto() && validarProductoFoto()){
        return true;
    }else{
        return false;
        addError("Error en el formulario");
    }
}

function insertarProducto(){
    $conexion = getConexion();
    $consulta = "INSERT productos (nombre, tipo_producto, puntuacion, comentarios, marketing_foto, producto_foto) VALUES ('$nombre', '$tipo_producto', '$puntuacion', '$comentarios', '$marketing_foto', '$producto_foto');";

    $resultado = mysqli_query($conexion,$consulta) or die("Consulta errónea");

    if($resultado){
        return true;
    }else{
        return false;
        addError("Error en la inserción de datos");
    }
}





if(usuarioValido()){
    require("template.php");
    if(isset($_POST["enviar"])){

        $producto = $_POST["producto"];
        $clasificacion = $_POST["clasificacion"];
        $puntuacion = $_POST["puntuacion"];
        $comentarios = $_POST["comentarios"];
        $marketing_foto = $_POST["marketing_foto"];
        $producto_foto = $_POST["producto_foto"];

        if(validaDatos()){
            insertarProducto();
            addMensaje("Enhorabuena". ucfirst($_SESSION["usuario"])  . "Pronto subiremos tu publicación");

        }
    } 
    
} else {
    require("template2.php");
}

?>