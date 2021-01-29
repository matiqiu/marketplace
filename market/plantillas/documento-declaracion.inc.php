<!DOCTYPE html>
<html lang="es">
    <head>
        
        <!--sirve para que pueda captar caracteres de cualquier idioma-->
        <meta charset="UTF-8">  
        <!--se usa para que la pagina se adapte al tamaño de la pantalla-->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        
        <!--titulo de la pestaña--> 
        <?php
        if(!isset($titulo) || empty($titulo))
        {
            $titulo = 'Guia Turistica';
        }
        echo "<title>$titulo</title>";
        
        ?>
        <script src="https://kit.fontawesome.com/e294b05859.js" crossorigin="anonymous"></script>

        <link href="<?php echo RUTA_CSS ?>bootstrap.min.css" rel="stylesheet">
        <link href="<?php echo RUTA_CSS ?>fontawesome.min.css" rel="stylesheet">
        <link href="<?php echo RUTA_CSS ?>estilos.css" rel="stylesheet">
        <link href="<?php echo RUTA_CSS ?>estilos-zonas.css" rel="stylesheet">
        
        
    
    </head>
    <body>