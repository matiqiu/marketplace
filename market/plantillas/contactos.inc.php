<h4><small>Celular/Whatsapp</small></h4>
<?php
for ($i = 0; $i < count($perfil2); $i++) {
    $perfil4 = $perfil2[$i];
    ?>
    <h4><i class="fab fa-whatsapp"></i> +<?php echo $perfil4->obtener_celular(); ?></h4>
    <?php
}
?>
<br>
<h4><small>Facebook</small></h4>
<?php
for ($i = 0; $i < count($perfil2); $i++) {
    $perfil4 = $perfil2[$i];
    ?>
    <h4><i class="fab fa-facebook"></i> <?php echo $perfil4->obtener_facebook(); ?></h4>
    <?php
}
?>
<br>
<h4><small>Twitter</small></h4>
<?php
for ($i = 0; $i < count($perfil2); $i++) {
    $perfil4 = $perfil2[$i];
    ?>
    <h4><i class="fab fa-twitter"></i> <?php echo $perfil4->obtener_twitter(); ?></h4>
    <?php
}
?>
<br>
<h4><small>Instagram</small></h4>
<?php
for ($i = 0; $i < count($perfil2); $i++) {
    $perfil4 = $perfil2[$i];
    ?>
    <h4><i class="fab fa-instagram"></i> <?php echo $perfil4->obtener_instagram(); ?></h4>
    <?php
}
?>
<br>