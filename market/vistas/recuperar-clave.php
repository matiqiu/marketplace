
<br>
<br>
<div class="container">
    <div class="row">
        <div class="col-md-3">
            
        </div>
        <div class="col-md-6">
            <div class="panel panel-default">
                <div class="panel-heading text-center">
                    <h4>Recuperación de contraseña</h4>
                </div>
                <div class="panel-body">
                    <form role="form" method="post" action="<?php echo RUTA_GENERAR_URL_SECRETA; ?>">
                        <h2>Introduce tu email</h2>
                        <br>
                        <p>
                            Escribe la direccion de correo electrónico y te enviaremos un email con la que podras restablecer tu contraseña.
                        </p>
                        <br>
                        <label for="email" class="sr-only">Email</label>
                        <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
                        <br>
                        <button type="submit" name="enviar_email" class="btn btn-lg btn-default btn-block">
                            Enviar
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
    

