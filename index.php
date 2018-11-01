<?php
session_start(); //Iniciamos la sesion
define('RUTA_ACTUAL', $_SERVER['REQUEST_URI']);


?>
<!--Con este archivo creamos las cabeceras de las páginas además de enrutar hacia las diferentes secciones a través del controlador, cargando los controladores 
de las diferentes secciones de la web-->
<html>
  <head>
    <title>Genios del Marketing</title>
    <meta content="UTF-8">
    
    <link href="https://fonts.googleapis.com/css?family=Modern+Antiqua" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Acme|Gloria+Hallelujah|Merienda" rel="stylesheet">
    <link href="/micss.css" rel="stylesheet">
  </head>
  <body>
  <?php
  $mensajes = array();
  $errores = array();
  function addError($error) {
    global $errores;
    array_push($errores, $error);
  }
  function addMensaje($mensaje) {
    global $mensajes;
    array_push($mensajes, $mensaje);
  }
  function estasLogado() {
    return isset($_SESSION['usuario']) && $_SESSION['usuario'] != '';
  }

  ?>
  <?php require('menu.php');?>
  


    <?php
    //Dependiendo de la ruta cargaremos un controlador u otro, lo que nos permitirá ejecutar el diferente codigo, administrado por otro controlador propio de la sección.
     if(RUTA_ACTUAL == '/'){
      require_once('prod/controlador.php');
    }
      if(RUTA_ACTUAL == '/login/'){
        require_once('usuarios/controlador.php');
      }
      if(RUTA_ACTUAL == '/registro/'){
        require_once('usuarios/controlador.php');
      }
      if(RUTA_ACTUAL == '/perfil/'){
        require_once('usuarios/controlador.php');
      }
      if(RUTA_ACTUAL == '/logout/'){
        require_once('usuarios/controlador.php');
      }
      if(RUTA_ACTUAL == '/productos/'){
        require_once('prod/controlador.php');
      }
      $posicion = strrpos(RUTA_ACTUAL, '/detalleproductos/');
      if(is_int($posicion) && $posicion == 0){
        require('prod/controlador.php');
      }
    ?>
    <!--Aqui añado el footer para completar la web, y añado utiles donde estan alojados los mensajes de error-->
    <?php include("utiles.php");?>
     <?php require('footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    
  
    <script src="/javascript.js"></script>
  </body>
  
</html>