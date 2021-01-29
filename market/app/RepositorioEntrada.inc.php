<?php

include_once 'app/config.inc.php';
include_once 'app/Conexion.inc.php';
include_once 'app/Entrada.inc.php';

class RepositorioEntrada {

    public static function insertar_entrada($conexion, $entrada) {
        $entrada_insertada = false;

        if (isset($conexion)) {
            try {

                $sql = "insert into entradas(autor_id,url,titulo,valor,texto, fecha, activa) values(:autor_id, :url, :titulo, :valor, :texto, NOW(), :activa)";
                
                $activa = 0;
                
                if ($entrada -> obtener_activa()){
                    $activa = 1;
                }
                
                $autor_id_temp = $entrada->obtener_autor_id();
                $url_temp = $entrada->obtener_url();
                $titulo_temp = $entrada->obtener_titulo();
                $valor_temp = $entrada->obtener_valor();
                $texto_temp = $entrada->obtener_texto();
                
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':autor_id', $autor_id_temp, PDO::PARAM_STR);
                $sentencia->bindParam(':url', $url_temp, PDO::PARAM_STR);
                $sentencia->bindParam(':titulo', $titulo_temp, PDO::PARAM_STR);
                $sentencia->bindParam(':valor', $valor_temp, PDO::PARAM_STR);
                $sentencia->bindParam(':texto', $texto_temp, PDO::PARAM_STR);
                $sentencia->bindParam(':activa', $activa, PDO::PARAM_STR);

                /*
                  $sentencia = $conexion -> prepare($sql);
                  $sentencia->bindParam(':autor_id', $entrada->obtener_autor_id(), PDO::PARAM_STR);
                  $sentencia->bindParam(':titulo', $entrada->obtener_titulo(), PDO::PARAM_STR);
                  $sentencia->bindParam(':clave', $entrada->obtener_clave(), PDO::PARAM_STR); */

                $entrada_insertada = $sentencia->execute();
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $entrada_insertada;
    }

    public static function obtener_todas_por_fecha_descendiente($conexion) {
        $entradas = [];

        if (isset($conexion)) {
            try {
                $sql = "SELECT * FROM entradas order by fecha desc";

                $sentencia = $conexion->prepare($sql);

                $sentencia->execute();

                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new Entrada(
                                $fila['id'], $fila['autor_id'], $fila['url'], $fila['titulo'], $fila['valor'], $fila['texto'], $fila['fecha'], $fila['activa']
                        );
                    }
                }
            } catch (Exception $ex) {
                print 'ERROR: ' . $ex->getMessage();
            }
            return $entradas;
        }
    }

    public static function obtener_entrada_por_url($conexion, $url) {
        $entrada = null;

        if (isset($conexion)) {
            try {
                $sql = "select * from entradas where url LIKE :url";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':url', $url, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $entrada = new Entrada(
                            $resultado['id'], $resultado['autor_id'], $resultado['url'], $resultado['titulo'], $resultado['valor'], $resultado['texto'], $resultado['fecha'], $resultado['activa']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $entrada;
    }

    public static function obtener_entradas_al_azar($conexion, $limite) {
        $entradas = [];
        if (isset($conexion)) {
            try {
                $sql = "select * from entradas order by rand() limit $limite";

                $sentencia = $conexion->prepare($sql);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new Entrada(
                                $fila['id'], $fila['autor_id'], $fila['url'], $fila['titulo'], $fila['valor'], $fila['texto'], $fila['fecha'], $fila['activa']);
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $entradas;
    }

    public static function contar_entradas_activas_usuario($conexion, $id_usuario) {

        $total_entradas = '0';

        if (isset($conexion)) {
            try {
                $sql = "select count(*) as total_entradas from entradas where autor_id = :autor_id and activa =1";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $total_entradas = $resultado['total_entradas'];
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $total_entradas;
    }

    public static function contar_entradas_inactivas_usuario($conexion, $id_usuario) {
        $total_entradas = '0';

        if (isset($conexion)) {
            try {
                $sql = "select count(*) as total_entradas from entradas where autor_id = :autor_id and activa =0";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $total_entradas = $resultado['total_entradas'];
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $total_entradas;
    }

    public static function obtener_entradas_usuario_fecha_descendente($conexion, $id_usuario) {
        $entradas_obtenidas = [];

        if (isset($conexion)) {
            try {
                $sql = "SELECT a.id, a.autor_id, a.url, a.titulo, a.valor, a.texto, a.fecha, a.activa, COUNT(b.id) ";
                $sql .= "AS 'cantidad_comentarios' ";
                $sql .= "FROM entradas a LEFT JOIN comentarios b ON a.id = b.entrada_id ";
                $sql .= "WHERE a.autor_id = :autor_id ";
                $sql .= "GROUP BY a.id ";
                $sql .= "ORDER BY a.fecha DESC ";

                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':autor_id', $id_usuario, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchALL();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas_obtenidas[] = array(
                            new Entrada($fila['id'], $fila['autor_id'], $fila['url'], $fila['titulo'], $fila['valor'], $fila['texto'], $fila['fecha'], $fila['activa']),
                            $fila['cantidad_comentarios']
                        );
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $entradas_obtenidas;
    }

    public static function titulo_existe($conexion, $titulo) {
        $titulo_existe = true;

        if (isset($conexion)) {
            try {
                $sql = "select * from entradas where titulo = :titulo";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':titulo', $titulo, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $titulo_existe = true;
                } else {
                    $titulo_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $titulo_existe;
    }

    public static function url_existe($conexion, $url) {
        $url_existe = true;

        if (isset($conexion)) {
            try {
                $sql = "select * from entradas where url = :url";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':url', $url, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    $url_existe = true;
                } else {
                    $url_existe = false;
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $url_existe;
    }

    public static function buscar_entradas_todos_los_campos($conexion, $termino_busqueda) {
        $entradas = [];

        $termino_busqueda = '%' . $termino_busqueda . '%';

        if (isset($conexion)) {
            try {
                $sql = "select * from entradas where titulo LIKE :busqueda or texto LIKE :busqueda order by "
                        . "fecha DESC LIMIT 25";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':busqueda', $termino_busqueda, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetchAll();

                if (count($resultado)) {
                    foreach ($resultado as $fila) {
                        $entradas[] = new Entrada(
                                $fila['id'], $fila['autor_id'], $fila['url'], $fila['titulo'], $fila['valor'], $fila['texto'], $fila['fecha'], $fila['activa']);
                    }
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $entradas;
    }
    
    public static function eliminar_comentarios_y_entrada($conexion, $entrada_id){
        if(isset($conexion)){
            try{
                $conexion ->beginTransaction();
                
                $sql1= "DELETE FROM comentarios WHERE entrada_id=:entrada_id";
                $sentencia1 = $conexion -> prepare($sql1);
                $sentencia1 -> bindParam(':entrada_id',$entrada_id, PDO::PARAM_STR);
                $sentencia1 -> execute();
                
                $sql2= "DELETE FROM entradas WHERE id=:entrada_id";
                $sentencia2 = $conexion -> prepare($sql2);
                $sentencia2 -> bindParam(':entrada_id',$entrada_id, PDO::PARAM_STR);
                $sentencia2 -> execute();
                
                $conexion -> commit();                
            } catch (PDOException $ex) {
                print 'ERROR' . $ex -> getMessage();
                $conexion ->rollBack();
            }
        }
    }
    public static function obtener_entrada_por_id($conexion, $id) {
        $entrada = null;

        if (isset($conexion)) {
            try {
                $sql = "select * from entradas where id=:id";
                $sentencia = $conexion->prepare($sql);
                $sentencia->bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia->execute();
                $resultado = $sentencia->fetch();

                if (!empty($resultado)) {
                    $entrada = new Entrada(
                            $resultado['id'], $resultado['autor_id'], $resultado['url'], $resultado['titulo'], $resultado['valor'], $resultado['texto'], $resultado['fecha'], $resultado['activa']
                    );
                }
            } catch (PDOException $ex) {
                print 'ERROR' . $ex->getMessage();
            }
        }
        return $entrada;
    }

    public static function actualizar_entrada($conexion, $id, $titulo, $valor, $url, $texto, $activa){
        $actualizacion_correcta = false;
        
        if (isset($conexion)){
            try{
                $sql = "update entradas set titulo = :titulo, valor = :valor, url = :url, texto = :texto, activa = :activa where id = :id";
                $sentencia = $conexion->prepare($sql);
                $sentencia -> bindParam(':id', $id, PDO::PARAM_STR);
                $sentencia -> bindParam(':titulo', $titulo, PDO::PARAM_STR);
                $sentencia -> bindParam(':valor', $valor, PDO::PARAM_STR);
                $sentencia -> bindParam(':url', $url, PDO::PARAM_STR);
                $sentencia -> bindParam(':texto', $texto, PDO::PARAM_STR);
                $sentencia -> bindParam(':activa', $activa, PDO::PARAM_STR);
                
                
                $sentencia -> execute();
                
                $resultado = $sentencia -> rowCount();
                
                if($resultado){
                    $actualizacion_correcta = true;
                } else{
                    $actualizacion_correcta = false;
                }
                                
            } catch (PDOException $ex) {
                print ' ERROR' . $ex -> getMessage();
            }
        }
        
        return $actualizacion_correcta;
    }

}

/*
 * SELECT a.id, a.autor_id, a.url, a.titulo, a.texto, a.fecha, a.activa, COUNT(b.id) AS 'CANTIDAD_COMENTARIOS'
FROM entradas a
LEFT JOIN comentarios b ON a.id =b.entrada_id
where a.autor_id = 0
GROUP BY a.id
ORDER BY a.fecha DESC
 */