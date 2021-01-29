<div class="form-group">
    <label for="titulo">Título</label>
    <input type="text" class="form-control" id="titulo" name="titulo" placeholder="ej: auto rojo">
</div> 
<div class="form-group">
    <label for="valor">Valor</label>
    <input type="text" class="form-control" id="valor" name="valor" placeholder="$999" pattern="[0-9]+">
</div> 
<div class="form-group">
    <label for="url">URL</label>
    <input type="text" class="form-control" id="url" name="url" placeholder="ej: nombre-sin-espacios">
</div>
<div class="form-group">
    <label for="contenido">Contenido</label>
    <textarea class="form-control" rows="10" id="contenido"name="texto"></textarea>
</div>
<div>
    <h4>(Para agregarle imagen a su producto debe entrar al articulo una vez publicado)</h4>
</div>
<br>
<div class="checkbox">
    <label>
        <input type="checkbox" id="publicar" name="publicar" value="si">Marca este recuadro si quieres mandar de inmediato el articulo.
    </label>
</div>
<button type="submit" class="btn btn-default" id="guardar" name="guardar">Publicar</button>
