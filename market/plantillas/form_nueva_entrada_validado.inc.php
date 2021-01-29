<div class="form-group">
    <label for="titulo">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="ej: auto rojo"
           <?php $validador->mostrar_titulo(); ?>>
           <?php $validador->mostrar_error_titulo(); ?>
</div> 
<div class="form-group">
    <label for="valor">Valor</label>
    <input type="text" class="form-control" id="valor" name="valor" placeholder="$999" pattern="[0-9]+"
           <?php $validador->mostrar_valor(); ?>>
           <?php $validador->mostrar_error_valor(); ?>
</div> 
<div class="form-group">
    <label for="url">URL</label>
    <input type="text" class="form-control" id="url" name="url" placeholder="ej: nombre-sin-espacios"
           <?php $validador->mostrar_url(); ?>>
           <?php $validador->mostrar_error_url(); ?>
</div> 
<div class="form-group">
    <label for="contenido">Contenido</label>
    <textarea class="form-control" rows="10" id="texto"name="texto"<?php $validador->mostrar_texto(); ?>></textarea>
    <?php $validador->mostrar_error_texto(); ?>
</div>
<div>
    <h4>(Para agregarle imagen a su producto debe entrar al articulo una vez publicado)</h4>
</div>
<br>
<div class="checkbox">
    <label>
        <input type="checkbox" id="publicar" name="publicar" value="si" <?php if ($entrada_publica) echo 'checked'; ?>
               >Marca este recuadro si quieres mandar de inmediato el articulo.
    </label>
</div>
<button type="submit" class="btn btn-default" id="guardar" name="guardar">Publicar</button>
