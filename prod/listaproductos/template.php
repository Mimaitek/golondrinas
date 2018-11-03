<div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner" style="height: 400px;">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://cdn.pagatelia.com/images/ing/oferta-via-t-clientes-ing-direct_ok.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://i.ytimg.com/vi/to4JAIRlsv4/maxresdefault.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://media.metrolatam.com/2018/02/13/movistarfusionsmarttv-1200x800.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>

<div class="head_css">
<h2>Lista de productos lo</h2>

</div>

<div class="back_css">
<?php
 //get_mime_type("mifoto.jPG");


foreach($productos as $producto){
    echo '<div class="divproductos" class="container">
    <div class="row justify-content-md-center">
        <div class="col" class="col_bg"><h5>Tipo de producto:</h5>'.
        $producto['tipo_producto'] .
       '<h4>Nombre:</h4>'. 
        $producto['nombre'] .
        '<h5>Descripción:</h5>'.

        $producto['comentarios'] .
        '</div>
        <div>
          <img width="300" height="300" src="data:'. get_mime_type($producto['foto_marketing']['nombre_archivo']).';base64, ' . $producto['foto_marketing']['contenido_archivo'] .'"/>
        </div>
        <div>
        <img width="300" height="300" src="data:'. get_mime_type($producto['foto_real']['nombre_archivo']) .';base64, ' . $producto['foto_real']['contenido_archivo'] . '"/>
        </div>
        <div>
        <a href="' .'/detalleproductos/' .$producto["id"]. '">Leer más</a>
        </div>
    </div>
    </div>
    <div style="padding-bottom: 300px;"></div>';
}

?>
</div>
<div class="btn-group" role="group" aria-label="Basic example">
<?php if($pagina_anterior){ 
  echo '<a class="btn btn-secondary" href="/?page='
  . ($pagina_actual-1)
  . '">Anterior</a>';
} 

if($pagina_siguiente){ 
  echo '<a class="btn btn-secondary" href="/?page='
  . ($pagina_actual+1)
  . '">Siguiente</a>';

}
  ?>

</div>
