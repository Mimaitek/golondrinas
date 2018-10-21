
<div class="fondo-productos">
<?php echo "<h1>" .ucfirst($_SESSION["usuario"]) . " Sube tus propios reviews </h1>"?>
    <div class="container-productos">
        <div class="row">
            <div class="col-8">
                <form action="#" method="POST" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="producto">Nombre del producto</label>
                    <input type="text" class="form-control" name="producto" aria-describedby="Help" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">Introduce el nombre del producto.</small>
                </div>
                <div class="form-group">
                    <label for="clasificacion">Tipo de Producto</label>
                    <select class="form-control" name="clasificacion">
                    <option value="0">Seleccione el tipo de producto</option>
                    <option value="tecnologia">Tecnología</option>
                    <option value="servicios">Servicios</option>
                    <option value="alimentacion">Alimentación</option>
                    <option value="ocio">Ocio</option>
                    <option value="deportes">Deportes</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="comentarios">Háblanos de él</label>
                    <textarea class="form-control" name="comentarios" rows="3"></textarea>
                    <small id="fileHelp" class="form-text text-muted">Describe y analiza al producto!!!</small>
                </div>
                <div class="form-group">
                    <label for="marketing_foto">Sube imágenes de la campaña de marketing</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                    <input type="file" class="form-control-file" name="marketing_foto" aria-describedby="fileHelp">
                </div>
                <div class="form-group">
                    <label for="producto_foto">Sube imágenes de tu producto</label>
                    <input type="hidden" name="MAX_FILE_SIZE" value="16777215" />
                    <input type="file" class="form-control-file" name="producto_foto" aria-describedby="fileHelp">
                    <span id="formError"></span>
                </div>
            
            
                <button type="submit" class="btn btn-primary" name="enviar">Submit</button>
                </form>
             </div>
            <div class="col-4">
            <img src="/usuarios/productos/compras.png" alt="compras" width="400px" height="300px";/>
             </div>
        </div>
        
    </div>
</div>
