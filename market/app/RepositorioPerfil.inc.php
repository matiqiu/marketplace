<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Perfil.inc.php';

class RepositorioPerfil {

    public static function insertar_perfil($conexion, $perfil) {
        $perfil_insertado = false;

        if (isset($conexion)) {
            try {
                $sql = "insert into perfil(usuario_id,celular,facebook,twitter,instagram) values(:usuario_id, :celular, :facebook, :twitter, :instagram)" or die("Error : " . mysqli_error($conexion));

                $usuario_id_temp = $perfil->obtener_usuario_id();
                $celular_temp = $perfil->obtener_celular();
                $facebook_temp = $perfil->obtener_facebook();
                $twitter_temp = $perfil->obtener_twitter();
                $instagram_temp = $perfil->obtener_instagram();

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':usuario_id', $usuario_id_temp, PDO::PARAM_STR);
                $sentencia->bindParam(':celular', $celular_temp, PDO::PARAM_STR);
                $sentencia->bindParam(':facebook', $facebook_temp, PDO::PARAM_STR);
                $sentencia->bindParam(':twitter', $twitter_temp, PDO::PARAM_STR);
                $sentencia->bindParam(':instagram', $instagram_temp, PDO::PARAM_STR);
            
                $perfil_insertado = $sentencia -> execute();                
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $perfil_insertado;
    }

    public static function obtener_perfil($conexion, $usuario_id) {
        $perfiles = array();

        if (isset($conexion)) {
            try {
                include_once 'Perfil.inc.php';

                $sql = "select * from perfil where usuario_id = :usuario_id";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':usuario_id', $usuario_id, PDO::PARAM_STR);
                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {

                        $perfiles[] = new Perfil(
                                $fila['id'], $fila['usuario_id'], $fila['celular'], $fila['facebook'], $fila['twitter'], $fila['instagram']);
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex->getMessage();
            }
        }
        return $perfiles;
    }

    public static function obtener_perfil_por_id($conexion, $id) {
        $perfil = null;

        if (isset($conexion)) {
            try {
                include_once 'Perfil.inc.php';

                $sql = "SELECT * from perfil where id = :id";

                $sentencia = $conexion->prepare($sql);

                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);

                $sentencia->execute();

                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $usuario = new Usuario($resultado['id'], $resultado['usuario_id'], $resultado['celular'], $resultado['facebook'], $resultado['twitter'], $resultado['instagram']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $perfil;
    }

}
