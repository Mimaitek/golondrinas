<div class="detalleproducto">
<?php
$producto = getProductoDetalle($ID_PRODUCTO);


?>
<div class="container">
<div class="row" >
  <div class="col-12">Nombre del Producto: <span class="estiloletra"><?php echo $producto["nombre"]; ?></span></div>
  <div class="col-12">Enviado por:<span class="estiloletra"><?php echo $producto["id_usuario"];?> </span></div>
  <div class="col-12">Descripción del Producto: <?php echo $producto["comentarios"]; ?></div>
</div>

<div class="row">
  <div class="col-6">Campaña de Marketing </div>
  <div class="col-6">La realidad </div>
  <div class="col-6"><img src="/prod/detalleproductos/caraalegre.svg" alt="Smiley face" height="20" width="20"></div>
  <div class="col-6"><img src="/prod/detalleproductos/caratriste.png" alt="Smiley face" height="20" width="20"></div>  
  <br>
  <br>
  <div class="col-6"><img width="500" height="350" src="data:<?php echo get_mime_type($producto['foto_marketing']['nombre_archivo']) ?>;base64,<?php echo $producto['foto_marketing']['contenido_archivo']; ?>"/></div>
  <div class="col-6"><img width="500" height="350" src="data:<?php echo get_mime_type($producto['foto_real']['nombre_archivo'])?>;base64,<?php echo $producto['foto_real']['contenido_archivo']; ?>"/></div>
</div>

</div>





<?php


$comentarios = recuperarComentarios($ID_PRODUCTO);

foreach($comentarios as $comentario){
    echo '<div style="text-align:left; margin-top:20px; padding: 10px;"><div class="container">
    <div class="row">
        <div class="col-12"><br>Fecha publicación '.
        $comentario['fecha'] .
       '</div><div class="col-8">'. 
        $comentario['contenido'] .
        '</div><div class="col-4"> Usuario: '.

        $comentario['usuario_id'] .
        '</div>
       
    </div>
    </div></div><hr>';
}


?>



<?php

if($usuarioSesion = $_SESSION["usuario"]){
    echo "<form method='POST'><div class='detallecomentario'><fieldset>
    <legend>Envía un comentario</legend>
    <textarea rows='4' cols='110' autofocus placeholder='Escribe tu comentario...' style='overflow:auto;resize:none' name='comentariosProducto'></textarea><hr>
    <input class='btn btn-primary' type='submit' value='enviar' name='enviar'></fieldset></div></form>";
}else{
    echo "<div class='detallecomentario'><fieldset>
    <legend>Envía un comentario</legend>
    <p>Necesitas estár registrado para comentar</p>
    <a href='/login/'><button>Accede</button></a>
    <a href='/registro/'><button>Registrate</button></a>";

}


?>
</div>
