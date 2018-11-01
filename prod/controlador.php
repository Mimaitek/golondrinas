<?php
/*Si estás logado accedes directamente a subir productos sino te deriva a una web para realizar el login o el registro*/
      if(RUTA_ACTUAL == '/productos/'){
        require('crearproducto/controlador.php');
      }
      if(RUTA_ACTUAL == '/'){
        require('listaproductos/controlador.php');
      }
      $posicion = strrpos(RUTA_ACTUAL, '/detalleproductos/');
      if(is_int($posicion) && $posicion == 0){
        require('detalleproductos/controlador.php');
      }
 
 
?>

