
<script>

window._comentarioValido = false;
     
    

    function checkeaBotonSubmit() {
        
        var boton = document.getElementById('botonenvio');
        if(window._comentarioValido) {
            boton.disabled = false;
           
            
        } else {
            boton.disabled = true;
            muestraError("Comentario vacío");
        }
    }



</script>

<?php
$producto = getProductoDetalle($ID_PRODUCTO);

?>
<div class="divproductos" style="margin:40px; padding:40px; ">
    <div class="container-fluid">
        <div class="row" >
            <div class="col-12">Producto:<br> <span class="estiloletra"><?php echo $producto["nombre"]; ?></span></div>
            <div class="col-12">Enviado por:<br> <span class="estiloletra"><?php echo ucfirst($producto["usuario"]); ?> </span></div>
            <div class="col-12">Descripción:<br><span class="descripcion"><?php echo $producto["comentarios"]; ?></span></div>
        </div>

        <div class="row">
            <div class="col-6" style="padding: 20px; display:inline block;">
                <img style="margin: 20px;"  src="/imagenes/good.svg" alt="Smiley face" height="50" width="50">
                Campaña de Marketing
            </div>
            <div class="col-6" style="padding: 20px; display:inline block;"><img  style="margin: 20px;" src="/imagenes/dislike.svg" alt="Smiley face" height="50" width="50">  La realidad</div>  
            <br>
            <br>
            <div class="col-6"><img style="border-radius: 25px; box-shadow: 10px 10px 15px #aaaaaa;" width="500" height="350" src="data:<?php echo get_mime_type($producto['foto_marketing']['nombre_archivo']) ?>;base64,<?php echo $producto['foto_marketing']['contenido_archivo']; ?>"/></div>
            <div class="col-6"><img style="border-radius: 25px; box-shadow: 10px 10px 15px #aaaaaa;" width="500" height="350" src="data:<?php echo get_mime_type($producto['foto_real']['nombre_archivo'])?>;base64,<?php echo $producto['foto_real']['contenido_archivo']; ?>"/></div>
        </div>

    </div>
</div>




<?php


$comentarios = recuperarComentarios($ID_PRODUCTO);

foreach($comentarios as $comentario){
    echo '<div style="text-align:left; margin-top:10px;"><div class="container coments">
    <div class="row" style="margin-left: 20px !important;">
        <div class="col-12"><br><span class="apartados">Fecha publicación </span>'.
        $comentario['fecha'] .
       '</div><div class="col-8">'. 
       str_replace("\n", "<br/>", $comentario['contenido'])    .
        '</div><div class="col-4"><span class="apartados">Usuario: </span> '.

        ucfirst($comentario['usuario']). '<br><br>  <button type="button"';

        if(votosComentario($comentario['id'])<-5){
            echo "class='btn btn-outline-danger'";
        }
        if(votosComentario($comentario['id'])>12){
            echo "class='btn btn-outline-success'";
        }
        if((votosComentario($comentario['id'])>=-5) && (votosComentario($comentario['id'])<=12)){
            echo "class='btn btn-outline-warning'";
        }
         echo '>Puntuación total: ' . votosComentario($comentario['id']) . '</button>'.
        
        
        $disabled = '';
        if(comentarioFueVotado($comentario['id'])) {
            $disabled = ' disabled ';
        }
 
 
        if($usuarioSesion = $_SESSION["usuario"]){
         echo '<form method="POST"><div class="votos">
         <input type="hidden" name="comentario" value="' . $comentario['id'] . '"/>
        <button type="submit" class="btn btn-success" id="megusta" ' . $disabled . 'name="voto-comentario" value="1"><img src="/imagenes/like.svg" alt="megusta" height="30" width="30"></button>
        <button type="submit" class="btn btn-danger" id="nomegusta" ' . $disabled . 'name="voto-comentario" value="-1"><img src="/imagenes/nogusta.svg" alt="nomegusta" height="30" width="30"></button></div>';
    }
     echo ' </div>
    
        </div>
       </div>
       </div>';
       
      echo '</form><hr>';
}


?>



<?php

if($usuarioSesion = $_SESSION["usuario"]){
    echo "<form method='POST'><div class='container comentarios'><fieldset>
    <legend>Envía un comentario</legend>
    <textarea rows='4' cols='105' autofocus placeholder='Escribe tu comentario...' style='overflow:auto; resize:none; margin: 20px;' id='comentarios'  name='comentariosProducto'
    onkeyup='window._comentarioValido = validacion(\"comentarios\", \"mensajecomentarios\", \"\"); checkeaBotonSubmit();'></textarea><hr>
    <input class='btn btn-success btn-lg' type='submit' value='enviar' name='enviar' id='botonenvio' disabled></fieldset></div></form>
    <div id=\"mensajecomentarios\"></div>";
}else{
    echo "<div class='comentarios animated bounceIn delay-4s'><fieldset style='text-align: center;'>
    <legend>Envía un comentario</legend>
    <p>Necesitas estár registrado para comentar</p>
    <a href='/login/'><button class='btn  btn-lg' style='background:#236350; color: white;'>Accede</button></a>
    <a href='/registro/'><button class='btn  btn-lg' style='background:#236350; color:white;'>Registrate</button></a></div>";

}


?>

