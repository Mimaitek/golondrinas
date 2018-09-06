
<div class="fondo-productos">
<?php echo "<h1>" .ucfirst($_SESSION["usuario"]) . " Sube tus propios reviews </h1>"?>
    <div class="container-productos">
        <div class="row">
            <div class="col-8">
                <form action="#" method="POST">
                <div class="form-group">
                    <label for="producto">Nombre del producto</label>
                    <input type="text" class="form-control" id="producto" aria-describedby="Help" placeholder="">
                    <small id="emailHelp" class="form-text text-muted">Introduce el nombre del producto.</small>
                </div>
                <div class="form-group">
                    <label for="clasificacion">Tipo de Producto</label>
                    <select class="form-control" id="productos">
                    <option value="tecnologia">Tecnología</option>
                    <option value="servicios">Servicios</option>
                    <option value="alimentacion">Alimentación</option>
                    <option value="ocio">Ocio</option>
                    <option value="deportes">Deportes</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleSelect2">Puntuación</label>
                    <select multiple class="form-control" id="puntuacion">
                    <option value="1">Pésimo</option>
                    <option value="3">Malo</option>
                    <option value="5">Regular</option>
                    <option value="7">Bueno</option>
                    <option value="10">Muy bueno</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="exampleTextarea">Háblanos de él</label>
                    <textarea class="form-control" id="comentarios" rows="3"></textarea>
                    <small id="fileHelp" class="form-text text-muted">Describe y analiza al producto!!!</small>
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Sube imágenes de la campaña de marketing</label>
                    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputFile">Sube imágenes de tu producto</label>
                    <input type="file" class="form-control-file" id="exampleInputFile" aria-describedby="fileHelp">
                </div>
            
            
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
             </div>
            <div class="col-4">
            <img src="/usuarios/productos/compras.png" alt="compras" width="400px" height="300px";/>
             </div>
        </div>
        
    </div>
</div>
