<?php
//Recibir y enviar los datos desde y hacia el Fron-end
include 'consultas.php';
session_start();
$flag = $_POST['flag'];

if($flag == 'get_tours'){
    echo json_encode(obtener_tours());
}

if($flag == 'get_tour'){
    echo json_encode(obtener_tour($_POST['id_tour']));
}

if($flag == 'insert_tour'){
    echo json_encode(ingresar_tour($_POST['id_lugar'],$_POST['nombre_tour'],$_POST['vacantes_tour'],$_POST['foto_tour'],$_POST['precio_tour'],$_POST['descripcion_tour']));
}
if($flag == 'delete_tour'){
    echo json_encode(eliminar_tour($_POST['id_tour']));
}

if($flag == 'get_lugar'){
    echo json_encode(obtener_lugar());
}

if($flag == 'insert_lugar'){
    
    echo json_encode(ingresar_lugar($_POST['nombre_lugar'],$_POST['mapa_lugar'],$_POST['foto_lugar']));
}

if($flag == 'insert_carrito'){
    echo json_encode(ingresar_carrito($_POST['id_tour'],$_POST['cantidad_tickets'],$_SESSION['email_usuario']));
}

if($flag == 'delete_lugar'){
    echo json_encode(eliminar_lugar($_POST['id_lugar']));
}

if($flag == 'get_carrito'){
    echo json_encode(obtener_carrito($_SESSION['email_usuario']));
}

if($flag == 'pagar_carrito'){
    echo json_encode(pagar_carrito($_SESSION['email_usuario']));
}

if($flag == 'get__tour_lugar'){
    echo json_encode(get__tour_lugar($_POST['id_lugar']));
}

?>