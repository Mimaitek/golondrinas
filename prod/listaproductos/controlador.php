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
    
function imprimirResultados(){




}



?>