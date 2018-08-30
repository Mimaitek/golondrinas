<?php
if (!isset($_SESSION)) {
  session_start();
}
?>
  <div class="container container-registro">

      <h2>Bienvenido a tu perfil </h2>
      <form action="#" method="POST">
          <div class="container">
              <div class="row">
                  <div class="col">
                    <h2>Editar perfil</h2>
                  
                    <div class="row">
                        <div class="col">
                             <div class="form-group">
                                <label for="email">Correo Electrónico</label>
                                <input type="email" class="form-control" id="email"  placeholder="Introduzca su email" name="email">
                            </div>
                        <div> 

                        <div class="col">
                            <div class="form-group">
                                <label for="email">Confirmar Correo Electrónico</label>
                                <input type="email" class="form-control" id="email"  placeholder="Introduzca su email" name="email">
                            </div>
                        </div>
                    </div>


                    <div class="container">  
                     <div class="row">
                        <div class="col">
                             <div class="form-group">
                                <label for="contrasena">Contraseña</label>
                                <input type="password" class="form-control" id="contrasena" placeholder="Cree una contraseña" name="contrasena">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                 <label for="contrasena">Confirmar Contraseña</label>
                                 <input type="password" class="form-control" id="contrasena" placeholder="Cree una contraseña" name="contrasena">
                            </div>
                        </div>
                    </div> 
                      
                      
                      
                      <button type="submit" class="btn btn-primary" style="margin:50px;" name="enviar">Enviar</button>
                      
                  </div>
                  <div class="col">
                  
                  </div>
                  
              </div>
          </div>
      </form>

</div>
