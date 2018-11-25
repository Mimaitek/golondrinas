<!--Desde aquí incluimos el menú de navegación donde dependiendo de si estás logado o no podrás acceder a las diferentes secciones de la web
lo que permitirá realizar diferentes acciones. Variarán sobre todo en base si has hecho login en la web o no -->
<nav class="navbar navbar-expand-lg navbar-light" id="menu">
  <a class="navbar-brand" href="/">
  <img src="/imagenes/logo.png" width="40" height="40" class="d-inline-block align-top" alt="imagen"> Genios del Marketing</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNav">
    <ul class="navbar-nav">
    <!--<li class="nav-item active">
        <a class="nav-link" href="#">Genios Del Marketing <span class="sr-only">(current)</span></a>
     </li>--> 
    <?php
    if(!estasLogado()) {
      echo "
      <li class=\"nav-item\">
        <a class=\"nav-link\" href=\"/login/\">Accede</a>
      </li>
      <li class='nav-item'>
        <a class='nav-link' href='/registro/'>Registro</a>
      </li>
      <li class='nav-item'>
      <a class='nav-link' href='/login/'>Subir productos</a>
      </li>";

    } else {
      echo 
      "<div class=''>
          <li class='nav-item dropdown'>
                <a class='nav-link dropdown-toggle' href='#' id='navbarDropdown' role='button' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>"
                  .  ucfirst($_SESSION["usuario"]);
                echo   
                "</a>
                <div class='dropdown-menu' aria-labelledby='navbarDropdown'>
                  <a class='dropdown-item' href='/productos/'>Subir Productos</a>
                  <a class='dropdown-item' href='/perfil/'> Editar perfil</a>
                </div>";
                echo
                  "<div class='dropdown-divider'></div>
                  <a class='dropdown-item' href=/logout/> Cierra tu sesion </a>
                  
                
          </li>
         
       </div>";

      

    }
    ?>
    </ul>
    </div>
 </nav>
