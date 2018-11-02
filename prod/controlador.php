<?php

/*Si estás logado accedes directamente a subir productos sino te deriva a una web para realizar el login o el registro*/
      if(RUTA_ACTUAL == '/productos/'){
        require('crearproducto/controlador.php');
      }
      elseif(RUTA_ACTUAL == '/' || (strrpos(RUTA_ACTUAL, '/?') == 0) && is_int(strrpos(RUTA_ACTUAL, '/?'))){

        require('listaproductos/controlador.php');
      }
      
      elseif(strrpos(RUTA_ACTUAL, '/detalleproductos/') == 0){
        require('detalleproductos/controlador.php');
      }
 
 
?>

