<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="./css/style2.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <link rel="icon" href="./img/core-img/favicon.png">
</head>

<body>
    <div class="container-fluid">
        <div class="row no-gutter">
            <!-- The image half -->
            <div class="col-md-6 d-none d-md-flex bg-image"></div>


            <!-- The content half -->
            <div class="col-md-6 bg-light">
                <div class="login d-flex align-items-center py-5">

                    <!-- Demo content-->
                    <div class="container">
                    <?php   
                            $msg = isset($_GET['msg']); 
                            if ($msg){
                                echo '<div class="alert alert-danger" role="alert">
                                '.$_GET['msg'].'<button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                                </div>';
                            }
                        ?>
                        <div class="row">
                        
                            <div class="col-lg-10 col-xl-7 mx-auto">
                                <h3 class="display-4">Agencia de viajes UPS</h3>
                                <p class="text-muted mb-4"></p>
                                <form action="funciones/validar_login.php" method="POST">
                                    <div class="form-group mb-3">
                                        <input id="email" name="email" type="email" placeholder="Correo Electrónico" required="" autofocus="" class="form-control rounded-pill border-0 shadow-sm px-4">
                                    </div>
                                    <div class="form-group mb-3">
                                        <input id="password" name="password" type="password" placeholder="Contraseña" required="" class="form-control rounded-pill border-0 shadow-sm px-4 text-primary">
                                    </div>
                                    <div class="custom-control custom-checkbox mb-3">
                                        <input id="customCheck1" type="checkbox" checked class="custom-control-input">
                                        <label for="customCheck1" class="custom-control-label">Recordar Contraseña</label>
                                    </div>
                                    <button type="submit" class="btn btn-primary btn-block text-uppercase mb-2 rounded-pill shadow-sm">Iniciar Sesión</button>
                                    <div class="text-center d-flex justify-content-between mt-4">
                                        <p>¿No tienes cuenta? <a href="registro.php"> Create una cuenta </a>
                                        </p>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!-- End -->

                </div>
            </div>
            <!-- End -->

        </div>
    </div>

</body>

</html>