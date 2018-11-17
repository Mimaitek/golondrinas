<!--Desde aquí incluimos el menú de navegación donde dependiendo de si estás logado o no podrás acceder a las diferentes secciones de la web
lo que permitirá realizar diferentes acciones. Variarán sobre todo en base si has hecho login en la web o no -->
<nav class="navbar navbar-expand-lg navbar-light" id="menu">
  <a class="navbar-brand" href="/">
  <img src="/imagenes/logo.png" width="40" height="40" class="d-inline-block align-top" alt=""> Genios del Marketing</a>
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
              <a class='dropdown-item' href='/perfil/'> Editar perfil</a>";
            echo
              "<div class='dropdown-divider'></div>
              <a class='dropdown-item' href=/logout/> Cierra tu sesion </a>
              
            </div>
        </li>
       </div>";

      

    }
    ?>
      
      
     <!-- <li >
        <a class="nav-link disabled" href="#">Disabled</a>
      </li>-->
    </ul>
    </div>
 </nav>
 <!--Aquí podremos hacer unas búsquedas dependiendo de la sección en donde se encuentre el producto-->
   <!-- <ul class="nav justify-content-center">
       <li class="nav-item">
         <a class="nav-link active" href="#">Nuevos</a>
       </li>
       <li class="nav-item">
         <a class="nav-link" href="#">Populares</a>
       </li>
      <li class="nav-item">
         <a class="nav-link" href="#">Más votadas</a>
       </li>
       <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Más
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
          <a class="dropdown-item" href="#">Tecnología</a>
          <a class="dropdown-item" href="#">Servicios</a>
          <a class="dropdown-item" href="#">Alimentación</a>
          <a class="dropdown-item" href="#">Ocio</a>
          <a class="dropdown-item" href="#">Deportes</a>
        </div>
      </li>
    </ul>-->
  
