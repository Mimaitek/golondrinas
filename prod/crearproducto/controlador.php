<?php require_once(dirname(__FILE__)."/../../conexion.php"); ?>

<?php
 
//Comprobar si el usuario está registrado y si tiene permiso para subir productos.

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


//Validaciones de los campos del formulario para que sean rellenados

function validarProducto(){
    $producto = $_POST["producto"];
    if($producto!=""){
        return true;
    }else{
        echo  '<span id="formError">Asigne un nombre al producto</span>';
        return false;
    }

}

function validarClasificacion(){
    $clasificacion = $_POST["clasificacion"];
    if($clasificacion){
        return true;
    }else{
        echo '<span id="formError">Seleccione una categoria</span>';
        return false;
        
    }

}

function validarComentarios(){
    $comentarios = ($_POST["comentarios"]);
    if($comentarios == ""){
        echo '<span id="formError">Es necesario una pequeña reseña del producto</span>';
        return false;
    }else{
        return true;
    }

}

function validarMarketingFoto(){

    return isset($_FILES["marketing_foto"]) && isset($_FILES["marketing_foto"]["name"]);

    /*
    array(5) { ["name"]=> string(28) "1680x1050-1268822-nebula.jpg" 
        ["type"]=> string(10) "image/jpeg" 
        ["tmp_name"]=> string(25) "/opt/lampp/temp/phpFr3j50" 
        ["error"]=> int(0) 
        ["size"]=> int(373368) }

    function recogerValoresMarketingFoto(){

        if(validarMarketingFoto()){
            foreach($marketing_foto as $valor => $clave){

            }
        }

    }
*/
}
function validarProductoFoto(){
    $producto_foto = $_FILES["producto_foto"];
    if($producto_foto){
        return true;
    }else{
        echo '<span id="formError"> Es necesario subir una fotografía</span>';
        return false;
    }
}

// Funcion para incorporar la fecha
function fechaHoy(){
    $hoy = getdate();
    $fecha = $hoy["mday"] . "/" . $hoy["mon"] . "/" . $hoy["year"];
    return $fecha;
}



function validaDatos(){
    if(validarProducto() && validarClasificacion() && validarComentarios()){
        return true;
    }else{
        echo '<span id="formError">Existen problemas con su formulario</span>';
        return false;
        
    }
}

function insertarProducto($nombre, $tipo_producto, $comentarios){


    $conexion = getConexion();
    $consulta = "INSERT  INTO productos (nombre, tipo_producto, comentarios, id_usuario) VALUES ('$nombre', '$tipo_producto','$comentarios', $id_usuario );";

    $resultado = mysqli_query($conexion,$consulta) or die(mysqli_error($conexion));

    $last_id = mysql_insert_id($conexion);

    if($resultado){
        return $last_id;
    }else{
        addError("Error en la inserción de datos");
        return false;
        
    }
}


function aniadeFotoProducto($id_producto, $fichero, $tipo) {
    $fecha = fechaHoy();

    $nombre_fichero = $fichero["name"];
    $ruta = $fichero["tmp_name"];
    $nueva_ruta = tempnam(sys_get_temp_dir(), $nombre_fichero);
    $bytes = $fichero["size"];

    copy($ruta, $nueva_ruta);
    chmod($nueva_ruta, 0644);

    if($fichero) {
        $conexion = getConexion();
        $consulta = "INSERT INTO archivo_productos (productos_id, tipo, fecha,  nombre_archivo, contenido_archivo) VALUES ('$id_producto', '$tipo', STR_TO_DATE('$fecha', '%d/%m/%Y'), '$nombre_fichero', LOAD_FILE('$nueva_ruta'));";
        $resultado = mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));
        
          if ($resultado){
              return true;
          }else{
              addError("No inserción de datos");
          }
        mysqli_close($conexion);
    }
}



    if(usuarioValido()){
        require("template.php");
        if(isset($_POST["enviar"])){


            
            if(validaDatos()){
                $producto = $_POST["producto"];
                $clasificacion = $_POST["clasificacion"];
                $comentarios = $_POST["comentarios"];

                $marketing_foto = $_FILES["marketing_foto"];
                $producto_foto = $_FILES["producto_foto"];

                $conexion = getConexion();
                $id_usuario = $_SESSION["id_usuario"];
                $consulta = "INSERT INTO productos (nombre, tipo_producto, comentarios, id_usuario) VALUES ('$producto', '$clasificacion', '$comentarios', '$id_usuario');";
                $resultado = mysqli_query($conexion, $consulta) or die (mysqli_error($conexion));
                $last_id = mysqli_insert_id($conexion);

        
            // addMensaje("Enhorabuena". ucfirst($_SESSION["usuario"])  . "Pronto subiremos tu publicación");

            // primero, guardar en la tabla producto el producto
           
            
           

            
            // guardar, las imagenes, usando la funcion aniadeFotoProducto (hay que completarla!!!!)
                aniadeFotoProducto($last_id, $_FILES["marketing_foto"], 'marketing');
                aniadeFotoProducto($last_id, $_FILES["producto_foto"], 'real');

            }else{
                addError("Error en la inserción de datos");
            }
        


        
    } 
    
}else {
    require("template2.php");
}
?>