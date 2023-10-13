<?php session_start();?>
<?php 
     if(!isset($_SESSION['email_admin'])){
        header('location: login.php');
        exit;
     }
    ?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Title -->
    <title>Dashboard</title>

    <!-- Favicon -->
    <link rel="icon" href="./img/core-img/favicon.png">

    <!-- Stylesheet -->
    <link rel="stylesheet" href="./css/style1.css">

</head>

<body>
    <!-- Preloader -->
    <div id="preloader">
        <div class="loader"></div>
    </div>
    <!-- /Preloader -->

    <!-- Header Area Start -->
    <header class="header-area">
        <!-- Main Header Start -->
        <div class="main-header-area">
            <div class="classy-nav-container breakpoint-off">
                <div class="container">
                    <!-- Classy Menu -->
                    <nav class="classy-navbar justify-content-between" id="robertoNav">

                        <!-- Logo -->
                        <a class="nav-brand" href="index.php">Agencia de Viajes UPS</a>

                        <!-- Navbar Toggler -->
                        <div class="classy-navbar-toggler">
                            <span class="navbarToggler"><span></span><span></span><span></span></span>
                        </div>

                        <!-- Menu -->
                        <div class="classy-menu">
                            <!-- Menu Close Button -->
                            <div class="classycloseIcon">
                                <div class="cross-wrap"><span class="top"></span><span class="bottom"></span></div>
                            </div>
                            <!-- Nav Start -->
                            <div class="classynav">
                                <ul id="nav">
                                    <li class="active"><a href="funciones/logout.php">Cerrar Sesion</a></li>
                                </ul>
                            </div>
                            <!-- Nav End -->
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- Header Area End -->

    <!-- Breadcrumb Area Start -->
    <div class="breadcrumb-area bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/16.jpg);">
        <div class="container h-100">
            <div class="row h-100 align-items-end">
                <div class="col-12">
                    <div class="breadcrumb-content d-flex align-items-center justify-content-between pb-5">
                        <h2 class="room-title">Dashboard</h2>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Dashboard -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <h3>Lugar</h3>
            <!-- Lugar -->
            <div class="row">
                <div class="col-6 table-responsive" style="height: 300px;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Foto</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="tabla_lugar">

                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    <form action="">
                        <div class="row">
                            <div class="col-12 col-md-12" id="alert_lugar"></div>
                        </div>
                        <div class="row">

                            <div class="col-6 col-md-6">

                                <label for="room">Nombre Lugar</label>
                                <input type="text" name="nombre_lugar" id="nombre_lugar" class="form-control" placeholder="Miami">

                            </div>
                            <div class="col-6 col-md-6">
                                <label for="room">Foto Lugar</label>
                                <input type="text" name="foto_lugar" id="foto_lugar" class="form-control" placeholder="img.jpg">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12 mt-15">
                                <label for="room">Mapa Lugar</label>
                                <input type="text" name="mapa_lugar" id="mapa_lugar" class="form-control" placeholder="mapa">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 col-md-3 mt-15 ">
                                <button type="button" class="form-control btn roberto-btn w-100" onclick="insertLugar()">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>

            <h3>Tour</h3>
            <!-- Lugar -->
            <div class="row">
                <div class="col-6 table-responsive" style="height: 450px;">
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Vacantes</th>
                                <th>Foto</th>
                                <th>Precio</th>
                                <th>Eliminar</th>
                            </tr>
                        </thead>
                        <tbody id="tabla_tour">

                        </tbody>
                    </table>
                </div>
                <div class="col-6">
                    <form action="">
                        <div class="row">
                            <div class="col-12 col-md-12" id="alert_tour"></div>
                        </div>
                        <div class="row">
                            <div class="col-6 col-md-6">
                                <label for="id_destino">Destino</label>
                                <div id="selectD"></div>
                            </div>
                            <div class="col-6 col-md-6">
                                <label for="room">Nombre Tour</label>
                                <input type="text" name="nombre_tour" id="nombre_tour" class="form-control" placeholder="Tour por Miami">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-12 col-md-4">
                                <label for="room">Vacantes Tour</label>
                                <input type="text" name="vacantes_tour" id="vacantes_tour" class="form-control" placeholder="10">
                            </div>
                            <div class="col-6 col-md-4 mt-15">
                                <label for="room">Foto Tour</label>
                                <input type="text" name="foto_tour" id="foto_tour" class="form-control" placeholder="img2.jpg">
                            </div>
                            <div class="col-6 col-md-4 mt-15">
                                <label for="room">Precio Tour</label>
                                <input type="number" name="precio_tour" id="precio_tour" class="form-control" placeholder="120.5">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 col-md-12 mt-15">
                                <label for="room">Descripcion Tour</label>
                                <textarea name="descripcion_tour" id="descripcion_tour" cols="30" rows="5" class="form-control" placeholder="Descripcion del tour..."></textarea>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3 col-md-3 mt-15 ">
                                <button type="button" class="form-control btn roberto-btn w-100" onclick="insertTour()">Registrar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Dashboard -->

    <!-- Footer Area Start -->
    <footer class="footer-area section-padding-80-0">

        <!-- Copywrite Area -->
        <div class="container">
            <div class="copywrite-content">
                <div class="row align-items-center">
                    <div class="col-12 col-md-8">
                        <!-- Copywrite Text -->
                        <div class="copywrite-text">
                            <p>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                                Copyright &copy;
                                <script>
                                    document.write(new Date().getFullYear());
                                </script>
                                <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            </p>
                        </div>
                    </div>
                    <div class="col-12 col-md-4">
                        <!-- Social Info -->
                        <div class="social-info">
                            <a href="#"><i class="fa fa-facebook" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-twitter" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-instagram" aria-hidden="true"></i></a>
                            <a href="#"><i class="fa fa-linkedin" aria-hidden="true"></i></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Footer Area End -->

    <!-- **** All JS Files ***** -->
    <!-- jQuery 2.2.4 -->
    <script src="js/jquery.min.js"></script>
    <!-- Popper -->
    <script src="js/popper.min.js"></script>
    <!-- Bootstrap -->
    <script src="js/bootstrap.min.js"></script>
    <!-- All Plugins -->
    <script src="js/roberto.bundle.js"></script>
    <!-- Active -->
    <script src="js/default-assets/active.js"></script>
    <script src="js/script_dashboard.js"></script>

</body>

</html>