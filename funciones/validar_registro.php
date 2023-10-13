<?php

$email = $_POST['email'];
$nombre = $_POST['nombre'];
$password = $_POST['password'];


include 'conexion.php';
try{

    $stm = $conn -> prepare("INSERT INTO usuario (email_usuario,nombre_usuario,password_usuario) VALUES(?,?,?)");
    $stm -> bind_param('sss',$email,$nombre,$password);
    $ex = $stm -> execute();
    
    if($ex){
        $stm -> close();
        $conn -> close();
        header('location: ../registro.php?msg=true');
        exit;
    }
    $stm -> close();
    $conn -> close();
    header('location: ../registro.php?msg=false');
    exit ;
}catch(Exception $e){
    $e -> getMessage();
    return $e;
}
?>