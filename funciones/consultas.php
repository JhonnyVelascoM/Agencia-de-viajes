<?php
    function obtener_tours(){
        $tours = array();
        try{
            include 'conexion.php';
            $sql = "SELECT * FROM tour";
            $resul = $conn -> query($sql);
            while($tour = $resul-> fetch_assoc()){
                $tours [] = $tour;
            }
            $conn -> close();
        }catch(Exception $e){
            $e -> getMessage();
            return $e;
        }
        return $tours;
    }
    function obtener_tour($id_tour){
        $tour = array();
        try{
            include 'conexion.php';
            $sql = "SELECT * FROM tour, lugar WHERE tour.id_lugar = lugar.id_lugar AND tour.id_tour = ".$id_tour;
            $resul = $conn -> query($sql);
            while($tr = $resul-> fetch_assoc()){
                $tour [] = $tr;
            }
            $conn -> close();
        }catch(Exception $e){
            $e -> getMessage();
            return $e;
        }
        return $tour;
    }
    function get__tour_lugar($id_lugar){
        $tours = array();
        try{
            include 'conexion.php';
            $sql = "SELECT * FROM tour WHERE id_lugar = ".$id_lugar;
            $resul = $conn -> query($sql);
            while($tour = $resul-> fetch_assoc()){
                $tours [] = $tour;
            }
            $conn -> close();
        }catch(Exception $e){
            $e -> getMessage();
            return $e;
        }
        return $tours;
    }

    function obtener_lugar(){
        $lugares = array();
        try{
            include 'conexion.php';
            $sql = "SELECT * FROM lugar";
            $resul = $conn -> query($sql);
            while($lugar = $resul-> fetch_assoc()){
                $lugares [] = $lugar;
            }
            $conn -> close();
        }catch(Exception $e){
            $e -> getMessage();
            return $e;
        }
        return $lugares;
    }

    function ingresar_lugar($nombre_lugar,$mapa_lugar,$foto_lugar){
        try{
            include 'conexion.php';
            $stm = $conn -> prepare("INSERT INTO lugar (nombre_lugar,mapa_lugar,foto_lugar) VALUES(?,?,?)");
            $stm -> bind_param('sss',$nombre_lugar,$mapa_lugar,$foto_lugar);
            $stm -> execute();
            $stm -> close();
            $conn -> close();
            return 'True';
        }catch(Exception $e){
            $e -> getMessage();
            return $e;
        }
    }

    function ingresar_carrito($id_tour,$cantidad_tickets,$email_usuario){
        try{
            include 'conexion.php';

            $sql = "SELECT vacantes_tour FROM tour WHERE id_tour = ".$id_tour;
            $resul = $conn -> query($sql);
            
            while($lugar = $resul-> fetch_assoc()){
                if ($lugar['vacantes_tour'] < $cantidad_tickets){
                    $conn -> close();
                    return 'FalseF';
                }

            }
            

            $stm = $conn -> prepare("INSERT INTO carrito (email_usuario,id_tour,id_lugar,cantidad_tickets) VALUES(?,?,(SELECT id_lugar FROM tour WHERE id_tour = ?),?)");
            $stm -> bind_param('siii',$email_usuario,$id_tour,$id_tour,$cantidad_tickets);
            $exr = $stm -> execute();
            if($exr == false){
                $stm -> close();
                $conn -> close();
                return 'False';
            }
            $stm -> close();
            $conn -> close();
            return 'True';

            
        }catch(Exception $e){
            $e -> getMessage();
            return $e;
        }
    }

    function pagar_carrito($email_usuario){
        try{
            include 'conexion.php';
            
            $stm = $conn -> prepare("INSERT INTO registro (email_usuario,total_registro) VALUES(?,(SELECT SUM(tour.precio_tour) FROM carrito,tour WHERE carrito.id_tour = tour.id_tour and carrito.email_usuario = ?))");
            $stm -> bind_param('ss',$email_usuario,$email_usuario);
            $exr = $stm -> execute();
            
            $stm1 = $conn -> prepare("INSERT INTO detalle_registro (id_tour,id_lugar,email_usuario,cantidad_tickets,id_registro) SELECT id_tour, id_lugar,email_usuario,cantidad_tickets,(SELECT MAX(id_registro) FROM registro) FROM carrito WHERE email_usuario = ?");
            $stm1 -> bind_param('s',$email_usuario);
            $exr1 = $stm1 -> execute();
            
            $stm2 = $conn -> prepare(" DELETE FROM carrito WHERE email_usuario = ?");
            $stm2 -> bind_param('s',$email_usuario);
            $exr2 = $stm2 -> execute();
            
            if($exr == false && $exr1 == false && $exr2 == false){
                $stm -> close();
                $conn -> close();
                return 'False';
            }
            $stm -> close();
            $conn -> close();
            return 'True';

            
        }catch(Exception $e){
            $e -> getMessage();
            return $e;
        }
    }

    function ingresar_tour($id_lugar,$nombre_tour,$vacantes_tour,$foto_tour,$precio_tour,$descripcion_tour){
        try{
            include 'conexion.php';
            $stm = $conn -> prepare("INSERT INTO tour (id_lugar,nombre_tour,vacantes_tour,foto_tour,precio_tour,descripcion_tour) VALUES(?,?,?,?,?,?)");
            $stm -> bind_param('isisds',$id_lugar,$nombre_tour,$vacantes_tour,$foto_tour,$precio_tour,$descripcion_tour);
            $stm -> execute();
            $stm -> close();
            $conn -> close();
            return 'True';
        }catch(Exception $e){
            $e -> getMessage();
            return $e;
        }
    }

    function eliminar_tour($id_tour){
        try{
            include 'conexion.php';
            $stm = $conn -> prepare("DELETE FROM tour WHERE id_tour = ?");
            $stm -> bind_param('i',$id_tour);
            $exr = $stm -> execute();
            if($exr == false){
                $stm -> close();
            $conn -> close();
                return'False';
            }
            $stm -> close();
            $conn -> close();
            return 'True';
        }catch(Exception $e){
            $e -> getMessage();
            return $e;
        }
    }

    function eliminar_lugar($id_lugar){
        try{
            include 'conexion.php';
            $stm = $conn -> prepare("DELETE FROM lugar WHERE id_lugar = ?");
            $stm -> bind_param('i',$id_lugar);
            $exr = $stm -> execute();
            if($exr == false){
                $stm -> close();
            $conn -> close();
                return'False';
            }
            $stm -> close();
            $conn -> close();
            return 'True';
        }catch(Exception $e){
            $e -> getMessage();
            return $e;
        }
    }

    function obtener_carrito($email_usuario){
        $carrito = array();
        try{
            include 'conexion.php';
            $sql = "SELECT * FROM carrito,tour WHERE tour.id_tour = carrito.id_tour and  email_usuario = '".$email_usuario."'";
            $resul = $conn -> query($sql);
            while($car = $resul-> fetch_assoc()){
                $carrito [] = $car;
            }
            $conn -> close();
        }catch(Exception $e){
            $e -> getMessage();
            return $e;
        }
        return $carrito;
    }

    /*
    function eliminar_coche($producto_id){
        try{
            include '../funciones/conexion.php';//incluyendo la cadena de conexión
            $stmt1=$conn->prepare("DELETE FROM coche WHERE id_producto = ?");
            $stmt1->bind_param('i', $producto_id);
            $stmt1->execute();
            $stmt1->close();
            $conn->close();
            return 'ELIMINACION EXITOSA';

        }
        catch(Exception $e){
            echo $e-> getMessage();
            return 'ELIMINACION FALLIDA';
        }
    }

    function comprar_unidades($producto_name, $unidades_des){
        try{
            include '../funciones/conexion.php';//incluyendo la cadena de conexión
            $stmt=$conn->prepare("UPDATE productos SET unidades=(SELECT unidades 
            FROM productos WHERE product_name=?)-? WHERE product_name=?");
            $stmt->bind_param('sds', $producto_name, $unidades_des, $producto_name);
            $stmt->execute();
            $stmt->close();
            //$conn->close();
            $stmt1=$conn->prepare("INSERT INTO coche (id_producto,unidades) VALUES ((SELECT id_producto FROM productos WHERE product_name=?),?)");
            $stmt1->bind_param('si', $producto_name, $unidades_des);
            $stmt1->execute();
            $stmt1->close();
            $conn->close();
            return 'COMPRA EXITOSA';

        }
        catch(Exception $e){
            echo $e-> getMessage();
            return 'COMPRA FALLIDA';
        }

    }
    */
?>