<?php
      if(RUTA_ACTUAL == '/productos/'){
        require('crearproducto/controlador.php');
      }
      if(RUTA_ACTUAL == '/'){
        require('listaproductos/controlador.php');
      }
 
 
?>

