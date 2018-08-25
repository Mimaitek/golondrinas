<?php
      if(RUTA_ACTUAL == '/login/'){
        require('login/controlador.php');
      }
      if(RUTA_ACTUAL == '/registro/'){
        require_once('registro/controlador.php');
      }
      if(RUTA_ACTUAL == '/perfil/'){
        require_once('perfil/template.php');
      }
      if(RUTA_ACTUAL == '/logout/'){
        addMensaje("Sesión cerrada con éxtio");
        $_SESSION["usuario"]="";
        Header('Location: '.$_SERVER['PHP_SELF']);
      }



 
?>

