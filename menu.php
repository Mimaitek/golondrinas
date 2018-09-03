<nav class="navbar navbar-expand-lg navbar-light" id="menu">
  <a class="navbar-brand" href="/">
  <img src="https://image.flaticon.com/icons/svg/47/47244.svg" width="30" height="30" class="d-inline-block align-top" alt="">Inicio</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
      <li class="nav-item active">
        <a class="nav-link" href="#">Genios Del Marketing <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Subir Productos</a>
      </li>
    <?php
    if(!estasLogado()) {
      echo "
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/login/\">Accede</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='/registro/'>Registro</a>
      </li>";

    } else {
      echo "
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/logout/\">logout " . $_SESSION["usuario"] . "</a>
      </li>";
      

    }
    ?>
      
      <li class="nav-item">
        <a class="nav-link" href="/perfil/">Editar perfil</a>
      </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>
    </ul>
  </div>
</nav>