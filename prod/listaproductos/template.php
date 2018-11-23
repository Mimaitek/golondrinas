<?php
if($pagina_actual ==1){
    echo '<img src="/imagenes/fondo_marketing4.jpg"  class="img-fluid"  alt="Responsive image" style="width:1400px; height:400px";>';
    echo '<div style="background: #FAB639; height:60px;" ></div>';
    echo '<div  style="background: white; text-align: center; padding:10px;" >
          <div class="row">
            <div class="col">
              <h2>Sube tus reviews</h2>
              <img src="/imagenes/blog.svg"  alt="Responsive image" height=\'150px\' weight=\'150px\'>
            </div>
            <div class="col">
              <h2>Comenta los productos</h2>
              <img src="/imagenes/talk.svg"  alt="Responsive image"height=\'150px\' weight=\'150px\'>
            </div>
            <div class="col">
             <h2>¡Vótalos!</h2>
             <img src="/imagenes/thumbs.svg" alt="Responsive image" height=\'150px\' weight=\'150px\'>
            </div>
          </div>
          </div>'; 
}
?>

<div  id="categorias">
  <div class="container"> 
     <div class="row">
     <div class="col"><a href="/?categoria=all">Todas <img src="/imagenes/arrow.svg" height="15px" width="15px" ></a></div>
      <div class="col"><a href="/?categoria=tecnologia">Tecnología <img src="/imagenes/arrow.svg" height="15px" width="15px""></a></div>
      <div class="col"><a href="/?categoria=alimentacion">Alimentación <img src="/imagenes/arrow.svg" height="15px" width="15px""></a></div>
      <div class="col"><a href="/?categoria=servicios">Servicios <img src="/imagenes/arrow.svg" height="15px" width="15px""></a></div>
      <div class="col"><a href="/?categoria=ocio">Ocio <img src="/imagenes/arrow.svg" height="15px" width="15px""></a></div>
      <div class="col"><a href="/?categoria=deportes">Deportes <img src="/imagenes/arrow.svg" height="15px" width="15px""></a></div>
    </div>
</div>
</div>
<div class="container">
      <h2 class="tituloHome">Categoría de <?php echo ucfirst($categoria); ?><span class="miniatura"><?php if($pagina_actual !=1){echo ' (Página ' .$pagina_actual .')';}?></span></h2>
  


<div class="back_css">
<?php
 //get_mime_type("mifoto.jPG");

 // <!--<h6>Descripción :</h6>'.$producto['comentarios'] Por si necesito imprimir los comentarios

foreach($productos as $producto){
  $disabled = '';
  if(productoFueVotado($producto['id'])) {
      $disabled = ' disabled ';
 }


    if(isset($_SESSION["usuario"]) && $usuarioSesion = $_SESSION["usuario"]){
      $botones_votos = '<form style="display: inline; margin-top:5px;" method="POST"><input type="hidden" name="producto_id" value="' . $producto['id'] . '"/>
  <button type="submit" class="btn btn-success" id="megusta" ' . $disabled . ' name="voto_producto" value="1"><img src="/imagenes/like.svg" alt="megusta" height="30" width="30"></button>
  <button type="submit" class="btn btn-danger" id="nomegusta" ' . $disabled . ' name="voto_producto" value="-1"><img src="/imagenes/nogusta.svg" alt="nomegusta" height="30" width="30"></button>
  </form>';
}else{
  $botones_votos = "";
}

    echo '<div class="divproductos">
              <div class="container-fluid">
                  <div class="row">
                     <div class="col">
                     <h5 style="color: #197575 !important; font-size: 20px; font-weight: bolder;">'. ucfirst ($producto['nombre']) .'</h5>
                        <h6  style="color: #197575 !important;">'.ucfirst ($producto['tipo_producto']) .'</h6><hr>
                            
                    <br>
                    
                    <a href="' .'/detalleproductos/' .$producto["id"]. '"><button class="btn btn-outline-warning">Leer más</button></a>
                    ' .$botones_votos. '
                    </div>
                     <div class="col" style="text-align:center; padding-top: 20px; margin:10px;">
                         <img style="margin:20px; border-radius: 5px;" width="100" height="100" src="data:'. get_mime_type($producto['foto_marketing']['nombre_archivo']).';base64, ' . $producto['foto_marketing']['contenido_archivo'] .'"/>
                         <img style="margin:20px; border-radius: 5px;" width="100" height="100" src="data:'. get_mime_type($producto['foto_real']['nombre_archivo']) .';base64, ' . $producto['foto_real']['contenido_archivo'] . '"/>
                     </div>
                 <div>
                
              </div>
        </div>
        </div>
        </div>';

    
}

?>
</div>
<div class="btn-group" role="group" aria-label="Basic example">
<?php if($pagina_anterior){ 
  echo '<a class="btn btn-secondary" id="botons" href="/?page=' . ($pagina_actual-1) .  '&categoria='.$categoria.'">Anterior</a>';
} 

if($pagina_siguiente){ 
  echo '<a class="btn btn-secondary" id="botons2" href="/?page=' . ($pagina_actual+1) . '&categoria='.$categoria.'">Siguiente</a>';

}
  ?>

</div>
</div>
</div>
</div>