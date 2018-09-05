<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
 
 <div class="fondo-perfil">
 

      <h1>Edita tu perfil <?php echo $_SESSION["usuario"];?></h1>
      <form action="#" method="POST">
          <div class="container">
              <div class="row">
                  <div class="col">
                      <div class="form-group">
                          <label for="email">Correo Electrónico</label>
                          <input type="text" class="form-control" id="email"  placeholder="Introduzca su email" name="email">
                      </div>
                      
                      <div class="form-group">
                          <label for="contrasena">Contraseña</label>
                          <input type="password" class="form-control" id="contrasena" placeholder="Cree una contraseña" name="contrasena">
                     </div>
                      
                      
                      <button type="submit" class="btn btn-primary" style="margin:50px;" name="enviar">Enviar</button>
                      
                  </div>
                  <div class="col">
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input type="text" class="form-control" id="email2"  placeholder="Repita email" name="email2">
                    </div>
                    
                    <div class="form-group">
                        <label for="contrasena">Contraseña</label>
                        <input type="password" class="form-control" id="contrasena2" placeholder="Repita contraseña" name="contrasena2">
                     </div>
                  </div>                  
              </div>
          </div>
      </form>
</div>