<div class="form-group">
    <label for="titulo2">Motivo</label>
    <input type="text" class="form-control" id="titulo2" name="titulo2" placeholder=""
           <?php $validador->mostrar_titulo(); ?> >
           <?php $validador->mostrar_error_titulo(); ?>
</div> 
<div class="form-group">
    <label for="contenido">Contenido</label>
    <textarea class="form-control" rows="5" id="texto2" name="texto2"<?php $validador->mostrar_texto(); ?>></textarea>
    <?php $validador->mostrar_error_texto(); ?>
    <br>
</div>
<button type="submit" class="btn btn-default" id="guardar2" name="guardar2">Publicar</button>