<?php
session_start(); //Iniciamos la sesion
define('RUTA_ACTUAL', $_SERVER['REQUEST_URI']);

include("utiles.php");

?>
<!--Con este archivo creamos las cabeceras de las páginas además de enrutar hacia las diferentes secciones a través del controlador, cargando los controladores 
de las diferentes secciones de la web-->
<html>
  <head>
    <title>Genios del Marketing</title>
    <meta content="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <link href="https://fonts.googleapis.com/css?family=Modern+Antiqua" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.2.0/css/all.css" integrity="sha384-hWVjflwFxL6sNzntih27bfxkr27PmbbK/iSvJ+a4+0owXq79v+lsFkW54bOGbiDQ" crossorigin="anonymous">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/toastify-js/src/toastify.min.css">
    <link href="/micss.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">
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
  <?php
    if(RUTA_ACTUAL == '/logout/'){
        require_once('usuarios/controlador.php');
        
    }
        require('menu.php');?>
  


    <?php
    //Dependiendo de la ruta cargaremos un controlador u otro, lo que nos permitirá ejecutar el diferente codigo, administrado por otro controlador propio de la sección.
     if(RUTA_ACTUAL == '/'  ||  (strrpos(RUTA_ACTUAL, '/?') == 0) && is_int(strrpos(RUTA_ACTUAL, '/?'))){
      require_once('prod/controlador.php');
    }
    elseif(RUTA_ACTUAL == '/avisolegal/'){
      require_once('avisolegal.php');
    }
    elseif(RUTA_ACTUAL == '/ayuda/'){
      require_once('ayuda.php');
    } 
    elseif(RUTA_ACTUAL == '/contacto/'){
      require_once('contacto.php');
    }
      elseif(RUTA_ACTUAL == '/login/'){
        require_once('usuarios/controlador.php');
      }
      elseif(RUTA_ACTUAL == '/registro/'){
        require_once('usuarios/controlador.php');
      }
      elseif(RUTA_ACTUAL == '/perfil/'){
        require_once('usuarios/controlador.php');
      }
      elseif(RUTA_ACTUAL == '/productos/'){
        require_once('prod/controlador.php');
      }
      
      elseif(strrpos(RUTA_ACTUAL, '/detalleproductos/') == 0){
        require('prod/controlador.php');
      }

    ?>
    <!--Aqui añado el footer para completar la web, y añado utiles donde estan alojados los mensajes de error-->

     <?php require('footer.php'); ?>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
    
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/toastify-js"></script>
    <script src="/javascript.js"></script>

    <script>
      <?php 
      global $mensajes;
      global $errores;

      $mensajes_procesados = array();
      $errores_procesados = array();

      foreach($mensajes as $mensaje) {
        $mensaje = '"' . $mensaje . '"';
        array_push($mensajes_procesados, $mensaje);
      }
      foreach($errores as $error) {
        $error = '"' . $error . '"';
        array_push($errores_procesados, $error);
      }
      
      ?>
      window.__mensajes = [<?php echo implode(",", $mensajes_procesados); ?>];
      window.__errores = [<?php echo implode(",", $errores_procesados); ?>];

      $( document ).ready(function() {
        for(var n=0; n<window.__mensajes.length; n++){
            var mensaje = window.__mensajes[n];
            muestraMensaje(mensaje);

          }
          for(var n=0; n<window.__errores.length; n++){
            var error = window.__errores[n];
            muestraError(error);
          }
      });
    </script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/cookieconsent2/3.1.0/cookieconsent.min.js"></script>
<script>
window.addEventListener("load", function(){
window.cookieconsent.initialise({
  "palette": {
    "popup": {
      "background": "#01a98c"
    },
    "button": {
      "background": "#f2c115"
    }
  },
  "position": "bottom-right",
  "content": {
    "message": "Esta web utiliza cookies para asegurarse de que consigues la mejor experiencia.",
    "dismiss": "Acepto",
    "link": "Leer más",
    "href": "/avisolegal.php"
  }
})});
</script>
  </body>
  
</html>