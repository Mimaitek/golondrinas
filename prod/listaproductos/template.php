<?php
if($pagina_actual ==1){
    echo '<img src="/imagenes/dibujo-1.svg" class="img-fluid" alt="Responsive image"style="width:100%;">';
}
?>
<div class="container">
  
      <h2 class="tituloHome">Últimos Reviews</h2>
  


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
      $botones_votos = '<form style="display: inline;" method="POST"><input type="hidden" name="producto_id" value="' . $producto['id'] . '"/>
  <button type="submit" class="btn btn-success" id="megusta" ' . $disabled . ' name="voto_producto" value="1"><img src="/prod/detalleproductos/icons8-me-gusta-64.png" alt="megusta" height="20" width="20"></button>
  <button type="submit" class="btn btn-danger" id="nomegusta" ' . $disabled . ' name="voto_producto" value="-1"><img src="/prod/detalleproductos/icons8-pulgar-hacia-abajo-64.png" alt="nomegusta" height="20" width="20"></button>
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
                    
                    <button class="btn btn-outline-warning"><a href="' .'/detalleproductos/' .$producto["id"]. '">Leer más</a></button>
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
  echo '<a class="btn btn-secondary" id="botons" href="/?page='
  . ($pagina_actual-1)
  . '">Anterior</a>';
} 

if($pagina_siguiente){ 
  echo '<a class="btn btn-secondary" id="botons2" href="/?page='
  . ($pagina_actual+1)
  . '">Siguiente</a>';

}
  ?>

</div>
</div>
</div>
</div>