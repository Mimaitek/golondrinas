<?php
      if(RUTA_ACTUAL == '/login/'){
        require('login/controlador.php');
      }
      if(RUTA_ACTUAL == '/registro/'){
        require_once('registro/controlador.php');
      }
      if(RUTA_ACTUAL == '/perfil/'){
        if(!($_SESSION["usuario"])){
          header("Location: /login/");
        }else{
          require_once('perfil/controlador.php');
        }
      }
      if(RUTA_ACTUAL == '/logout/'){
        $_SESSION["usuario"]="";
        Header('Location: '.$_SERVER['PHP_SELF']);
      }
    



 
?>

