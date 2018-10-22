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


<?php
foreach(getProductos() as $producto){
    echo '<div class="container">
    <div class="row justify-content-md-center">
        <div class="col col-lg-2">'.
        $producto['tipo_producto'] .
        
        '</div>
        <div class="col-md-auto">
        Variable width content
        </div>
        <div class="col col-lg-2">'.
        $producto['nombre'] .
        '</div>
    </div>
    <div class="row">
        <div class="col">
        </div>
        <div class="col-md-auto">
        Variable width content
        </div>
        <div class="col col-lg-2">'.
        $producto['comentarios'] .
        '</div>
    </div>
    </div>';
}



foreach(getFoto() as $foto){
  echo '<img src="data:image/png;base64,'.$foto. '" alt="imagen campaña marketing" height="300px"  width="400px" />';
  echo "<hr>";
}

?>