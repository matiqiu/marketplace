<input type="hidden" id="id-entrada" name="id-entrada" value="<?php echo $id_entrada; ?>">
<div class="form-group">
    <label for="titulo">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="ej: auto rojo" pattern="[0-9]+"
           value="<?php echo $validador->obtener_titulo(); ?>">
    <input type="hidden" id="titulo-original" name="titulo-original" value="<?php echo $entrada_recuperada->obtener_titulo(); ?>" >

    <?php $validador -> mostrar_error_titulo(); ?>
</div> 
<div class="form-group">
    <label for="valor">Valor</label>
    <input type="text" class="form-control" id="valor" name="valor" placeholder="$999"
           value="<?php echo $validador->obtener_valor(); ?>">
    <input type="hidden" id="valor-original" name="valor-original" value="<?php echo $entrada_recuperada->obtener_valor(); ?>" >

    <?php $validador -> mostrar_error_valor(); ?>
</div> 
<div class="form-group">
    <label for="url">URL</label>
    <input type="text" class="form-control" id="url" name="url" placeholder="ej: nombre-sin-espacios" value="<?php echo $validador->obtener_titulo(); ?>">
    <input type="hidden" id="url-original" name="url-original" value="<?php echo $entrada_recuperada->obtener_url(); ?>" >

    <?php $validador -> mostrar_error_url(); ?>
</div> 
<div class="form-group">
    <label for="contenido">Contenido</label>
    <textarea class="form-control" rows="10" id="texto"name="texto"><?php echo $validador->obtener_texto(); ?></textarea>
    <input type="hidden" id="texto-original" name="texto-original" value="<?php echo $entrada_recuperada->obtener_texto(); ?>" >

    <?php $validador -> mostrar_error_texto(); ?>
</div>
<div>
    <h4>(Para agregarle imagen a su producto debe entrar al articulo una vez publicado)</h4>
</div>
<div class="checkbox">
    <label>
        <input type="checkbox" id="publicar" name="publicar" value="si" <?php if ($validador->obtener_checkbox()) echo 'checked' ?>>Marca este recuadro si quieres mandar de inmediato el articulo.
        <input type="hidden" id="publicar-original" name="publicar-original" value="<?php echo $entrada_recuperada->obtener_activa(); ?>" 
    </label>
</div>
<button type="submit" class="btn btn-default" id="guardar" name="guardar_cambios_entrada">Guardar cambios</button>

