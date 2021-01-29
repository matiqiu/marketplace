<?php

class RepositorioUsuario {

    public static function obtener_todos($Conexion) {
        $usuario = array();

        if (isset($Conexion)) {
            try {
                include_once 'usuario.inc.php';

                $sql = "select * from usuarios";

                $sentencia = $Conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $usuarios[] = new usuario(
                                $fila['id'], $fila['nombre'], $fila['email'], $fila['clave'], $fila['fecha_registro'], $fila['activo']
                        );
                    }
                } else {
                    print 'No hay usuarios';
                }
            } catch (Exception $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $usuarios;
    }

    public static function obtener_numero_usuarios($conexion) {
        $total_usuarios = null;

        if (isset($conexion)) {
            try {
                
                $sql = "select count(*) as total from usuarios";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                $total_usuarios = $resultado['total'];
            } catch (Exception $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $total_usuarios;
    }

    public static function insertar_usuario($conexion, $usuario) {
        $usuario_insertado = false;

        if (isset($conexion)) {
            try {

                $sql = "insert into usuarios(nombre, email, clave, fecha_registro, activo) values(:nombre, :email, :clave, NOW(), 0)";

                $nombretemp = $usuario -> obtener_nombre();
                $emailtemp = $usuario->obtener_email();
                $clavetemp = $usuario->obtener_clave();
                
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':nombre', $nombretemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':email', $emailtemp, PDO::PARAM_STR);
                $sentencia -> bindParam(':clave', $clavetemp, PDO::PARAM_STR);
                
 
                /*$sentencia->bindParam(':nombre', $usuario->obtener_nombre(), PDO::PARAM_STR);
                $sentencia->bindParam(':email', $usuario->obtener_email(), PDO::PARAM_STR);
                $sentencia->bindParam(':clave', $usuario->obtener_clave(), PDO::PARAM_STR);*/
                
                $usuario_insertado =$sentencia -> execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $usuario_insertado;
    }
    
    public static function nombre_existe($conexion, $nombre){
        $nombre_existe = true;
        if (isset($conexion)){
            try {
                $sql = "select * from usuarios where nombre = :nombre";
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':nombre', $nombre, PDO::PARAM_STR);
                
                $sentencia -> execute();
                
                $resultado = $sentencia -> fetchAll();
                
                if (count($resultado)){
                    $nombre_existe = true;
                }else{
                    $nombre_existe = false;
                }
                        
            } catch (PDOException $ex) {
                print 'ERROR' . $ex ->getMessage();

            }
        }
        return $nombre_existe;
    }
    
    public static function email_existe($conexion, $email){
        $email_existe = true;
        if (isset($conexion)){
            try {
                $sql = "select * from usuarios where email = :email";
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':email', $email, PDO::PARAM_STR);
                
                $sentencia -> execute();
                
                $resultado = $sentencia -> fetchAll();
                
                if (count($resultado)){
                    $email_existe = true;
                }else{
                    $email_existe = false;
                }
                        
            } catch (PDOException $ex) {
                print 'ERROR' . $ex ->getMessage();

            }
        }
        return $email_existe;
    }
    
    public static function obtener_usuario_por_email($conexion, $email){
        $usuario =null;
        
        if (isset($conexion)){
            try {
                include_once 'Usuario.inc.php';
                
                $sql = "SELECT * from usuarios where email = :email";
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':email', $email, PDO::PARAM_STR);
                
                $sentencia ->execute();
                
                $resultado = $sentencia -> fetch();
                
                if(!empty($resultado)){
                    $usuario = new Usuario($resultado['id'],
                            $resultado['nombre'],
                            $resultado['email'],
                            $resultado['clave'],
                            $resultado['fecha_registro'],
                            $resultado['activo']);
                }
            } catch (Exception $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $usuario;
    }
    public static function obtener_usuario_por_id($conexion, $id){
        $usuario =null;
        
        if (isset($conexion)){
            try {
                include_once 'Usuario.inc.php';
                
                $sql = "SELECT * from usuarios where id = :id";
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
                
                $sentencia ->execute();
                
                $resultado = $sentencia -> fetch();
                
                if(!empty($resultado)){
                    $usuario = new Usuario($resultado['id'],
                            $resultado['nombre'],
                            $resultado['email'],
                            $resultado['clave'],
                            $resultado['fecha_registro'],
                            $resultado['activo']);
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $usuario;
    }    
    
    public static function actualizar_clave($conexion, $id_usuario, $nueva_clave){
        $actualizacion_correcta = false;
        
        if (isset($conexion)){
            try {
                $sql ="update usuarios set clave = :clave where id = :id";
                
                $sentencia = $conexion -> prepare($sql);
                
                $sentencia -> bindParam(':clave', $nueva_clave, PDO::PARAM_STR);
                $sentencia -> bindParam(':id', $id_usuario, PDO::PARAM_STR);
                
                $sentencia -> execute();
                
                $resultado = $sentencia -> rowCount();
                
                if(count($resultado)){
                    $actualizacion_correcta = true;
                } else {
                    $actualizacion_corecta = false;
                }
                
            } catch (PDOException $ex) {
                print 'ERROR' .$ex -> getMessage();
            }
        }
        return $actualizacion_correcta;
    }
    
    public static function obtener_usuario_por_nombre($conexion, $nombre) {
        $usuario = null;

        if (isset($conexion)) {
            try {
                $sql = "select * from usuarios where nombre LIKE :nombre";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':nombre', $nombre, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $usuario = new Usuario(
                            $resultado['id'], $resultado['nombre'], $resultado['email'], $resultado['clave'], $resultado['fecha_registro'], $resultado['activo']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $usuario;
    }
}