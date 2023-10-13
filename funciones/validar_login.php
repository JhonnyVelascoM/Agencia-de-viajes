<?php
$email = $_POST['email'];
$password = $_POST['password'];

if(isset($email) && isset($password)){
    if($email == 'admin@admin.com' && $password == 'admin'){
        session_start();
        header('location: ../dashboard.php');
        $_SESSION['email_admin']='admin';
        exit;
    }
}

include 'conexion.php';
try{
    include 'conexion.php';
    $sql = "SELECT * FROM usuario WHERE email_usuario = '".$email."' and password_usuario = '".$password."'";

    $resul = $conn->query($sql);
    if($resul){
        if($resul->num_rows > 0){
            $conn -> close();
            session_start();
            $_SESSION['email_usuario'] = $email;
            header('location: ../index.php');
            exit;
        }
    }
    
    $conn -> close();
     header('location: ../login.php?msg=Ha%20ocurrido%20un%20error');
     exit;
}catch(Exception $e){
    $e -> getMessage();
    echo $e;
}

?>