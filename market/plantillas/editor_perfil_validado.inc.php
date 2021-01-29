<div class="form-group">
    <label for="celular">Celular/Whatsapp</label>
    <input type="text" class="form-control" id="celular" name="celular" placeholder="569.." pattern="[0-9]+"
           <?php $validador->mostrar_celular(); ?> >
           <?php $validador->mostrar_error_celular(); ?>
</div> 
<div class="form-group">
    <label for="facebook">Facebook</label>
    <input type="text" class="form-control" id="facebook" name="facebook" placeholder="F"
           <?php $validador->mostrar_facebook(); ?> >
           <?php $validador->mostrar_error_facebook(); ?>
</div>
<div class="form-group">
    <label for="twitter">Twitter</label>
    <input type="text" class="form-control" id="twitter" name="twitter" placeholder="T"
           <?php $validador->mostrar_twitter(); ?> >
           <?php $validador->mostrar_error_twitter(); ?>
</div>
<div class="form-group">
    <label for="instagram">Instagram</label>
    <input type="text" class="form-control" id="instagram" name="instagram" placeholder="I"
           <?php $validador->mostrar_instagram(); ?> >
           <?php $validador->mostrar_error_instagram(); ?>
</div> 
<br>
<button type="submit" class="btn btn-default" id="guardar3" name="guardar3">Publicar</button>
