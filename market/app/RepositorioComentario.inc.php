<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Comentario.inc.php';

class RepositorioComentario{
    
    public static function insertar_comentario($conexion, $comentario){
        $comentario_insertado = false;

        if (isset($conexion)) {
            try {

                $sql = "insert into comentarios(autor_id,entrada_id,titulo,texto, fecha) values(:autor_id, :entrada_id, :titulo, :texto, NOW())";

                $autor_id_temp = $comentario -> obtener_autor_id();
                $entrada_id_temp = $comentario -> obtener_entrada_id();
                $titulo_temp = $comentario->obtener_titulo();
                $texto_temp = $comentario->obtener_texto();
                
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':autor_id', $autor_id_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':entrada_id', $entrada_id_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':titulo', $titulo_temp, PDO::PARAM_STR);
                $sentencia -> bindParam(':texto', $texto_temp, PDO::PARAM_STR);
                
 
                /*$sentencia->bindParam(':nombre', $usuario->obtener_nombre(), PDO::PARAM_STR);
                $sentencia->bindParam(':email', $usuario->obtener_email(), PDO::PARAM_STR);
                $sentencia->bindParam(':clave', $usuario->obtener_clave(), PDO::PARAM_STR);*/
                
                $comentario_insertado =$sentencia -> execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $comentario_insertado;
    }
    public static function obtener_comentarios($conexion, $entrada_id){
        $comentarios = array();
        
        if(isset($conexion)){
            try{
                include_once 'Comentario.inc.php';
                
                $sql = "select * from comentarios where entrada_id = :entrada_id order by fecha desc";

                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':entrada_id', $entrada_id, PDO::PARAM_STR);
                $sentencia -> execute();
                
                $resultado = $sentencia ->fetchAll();
                
                if(count($resultado)){
                    foreach ($resultado as $fila){
                        $comentarios[] = new Comentario($fila['id'], $fila['autor_id'], $fila['entrada_id'], $fila['titulo'], $fila['texto'], $fila['fecha']);
                    }
                }
            } catch (PDOException $ex) {
                print "ERROR" . $ex -> getMessage();
            }
        }
        return $comentarios;
    }

    public static function contar_comentarios_usuario($conexion,$id_usuario){
        
        $total_comentarios ='0';
        
        if(isset($conexion)) {
            try {
                $sql="select count(*) as total_comentarios from comentarios where autor_id = :autor_id";
                $sentencia= $conexion ->prepare($sql);
                $sentencia-> bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia -> fetch();
                 
                if(!empty($resultado)){
                    $total_comentarios = $resultado['total_comentarios'];
                }
            } catch (PDOException $ex) {
                print 'ERROR'. $ex -> getMessage();
            }
        }
        return $total_comentarios;
    }
    
    public static function titulo_existe($conexion, $titulo){
        $titulo_existe = true;
        
        if (isset($conexion)){
            try{
                $sql = "select * from entradas where titulo = :titulo";
                $sentencia = $conexion -> prepare($sql);
                $sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
                $sentencia -> execute();
                $resultado = $sentencia -> fetchAll();
                
                if (count($resultado)){
                    $titulo_existe = true;
                } else {
                    $titulo_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
            }
        }
        return $titulo_existe;
    }
}

