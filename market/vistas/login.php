

<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Iniciar sesión</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_LOGIN ?>">
                        <h2>Introduce tus datos</h2>
                        <br>
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email"
                               <?php
                               if(isset($_POST['login']) && isset($_POST['email']) && !empty($_POST['email'])){
                                   echo 'value"' . $_POST['email'] .'"';
                               }
                               ?>
                               required autofocus>
                        <br>
                        <label for="clave" class="sr-only">Contraseña</label>
                        <input type="password" name="clave" id="clave" class="form-control" placeholder="Contraseña" required>
                        <br>
                        <?php
                        if(isset($_POST['login'])){
                            $validador -> mostrar_error();
                        }
                        ?>
                        <button type="submit" name="login" class="btn btn-lg btn-default btn-block">
                            Iniciar sesión
                        </button>
                    </form>
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="<?php echo RUTA_REGISTRO; ?>">¿Aún no tienes cuenta?</a>
                    </div>
                    <br>
                    <br>
                    <div class="text-center">
                        <a href="<?php echo RUTA_RECUPERAR_CLAVE; ?>">¿Olvidaste tu contraseña?</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
    
