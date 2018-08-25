<?php

function getConexion(){

    $servidor = "localhost";
    $basededatos = "proyecto";
    $username = "root";
    $pass = "Geniusyo770";
    $conexion = mysqli_connect($servidor , $username, $pass, $basededatos) or die ("No se ha podido conectar al servidor de Base de datos");;

    if (!$conexion) {
        echo "Fallo al conectar a la base de datos"; 
    }  
    
    mysqli_set_charset($conexion,"utf8");

    return $conexion;
}

?>