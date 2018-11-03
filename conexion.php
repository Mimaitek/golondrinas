<?php

function getConexion(){

    $servidor = $_ENV['GOLONDRINAS_SERVER'];
    $basededatos = $_ENV['GOLONDRINAS_DB'];
    $username = $_ENV['GOLONDRINAS_USER'];
    $pass = $_ENV['GOLONDRINAS_PASS'];
    $conexion = mysqli_connect($servidor , $username, $pass, $basededatos) or die ("No se ha podido conectar al servidor de Base de datos");;

    if (!$conexion) {
        echo "Fallo al conectar a la base de datos"; 
    }  
    
    mysqli_set_charset($conexion,"utf8");

    return $conexion;
}

?>