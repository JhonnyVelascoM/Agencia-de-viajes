<?php session_start();?>
<?php 
     if(!isset($_SESSION['email_usuario'])){
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
    <title>Detalle Tour <?php echo $_GET['id_tour']?></title>

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
                                    <li class="active"><a href="./index.php">Inicio</a></li>
                                    <li><a href="./carrito.php">Carrito</a></li>
                                    <li><a href="./contacto.php">Contacto</a></li>
                                    <li><a href="funciones/logout.php">Cerrar Sesion</a></li>
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
                        <h2 class="room-title"><?php echo $_GET['nombre_tour'] ?></h2>
                        <h2 class="room-price">$<?php echo $_GET['precio_tour'] ?> <span>/ por dia</span></h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Breadcrumb Area End -->

    <!-- Rooms Area Start -->
    <div class="roberto-rooms-area section-padding-100-0">
        <div class="container">
            <div class="row">
                <div class="col-12 col-lg-8">
                    <!-- Single Room Details Area -->
                    <div class="single-room-details-area mb-50">
                        <!-- Room Thumbnail Slides -->
                        <div class="room-thumbnail-slides mb-50">
                            <div id="room-thumbnail--slide" class="carousel slide" data-ride="carousel" >
                                <div id="img_tour"></div>
                            </div>
                        </div>

                        <!-- Room Features -->
                        <div class="room-features-area d-flex flex-wrap mb-50">
                            <h6>Vacantes: <span id="vacantes_tour"></span></h6>
                            <h6>Precio: <span id="precio_tour"></span></h6>
                        </div>

                        <p id="descripcion_tour"></p>
                        <h3>Mapa del Lugar</h3>
                        <hr>
                        <div id="mapa_lugar">

                        </div>
                    </div>

                    
                </div>

                <!-- Publicidad -->
                <div class="col-12 col-lg-4">
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <div id="alert_carrito"></div>
                            <h3>Agrega al carrito</h3>
                            <p>Elige la cantidad de tickets que deseas.</p>
                            <hr>
                        </div>    
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12">
                            <label for="ticket">Ticket</label>
                            <input type="text" id="cantidad_tickets" name="cantidad_tickets" class="form-control" placeholder="cantidad...">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12 col-md-12 mt-50 mb-50">
                            <button type="button" class="form-control btn roberto-btn w-100" onclick="agregar_carrito()">Agregar</button>
                        </div>
                    </div>
                    <div class="cta-content bg-img bg-overlay jarallax roberto-cta-area" style="background-image: url(img/bg-img/8.jpg);">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-12 mt-50">
                                <div class="cta-text mt-100 ml-3">
                                    <h2>Las mejores vaciones de tu vida</h2>
                                </div>

                            </div>
                        </div>
                        <hr style="height: 350px">
                        <div class="row align-items-center">
                            <div class="col-12 col-md-12">
                                <div class="cta-text mb-100 ml-3">
                                    <h2>Ven y Disfruta</h2>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Rooms Area End -->

    <!-- Call To Action Area Start -->
    <section class="roberto-cta-area">
        <div class="container">
            <div class="cta-content bg-img bg-overlay jarallax" style="background-image: url(img/bg-img/1.jpg);">
                <div class="row align-items-center">
                    <div class="col-12 col-md-7">
                        <div class="cta-text mb-50">
                            <h2>Contactanos</h2>
                            <h6>Para ayudarte con tus dudas</h6>
                        </div>
                    </div>
                    <div class="col-12 col-md-5 text-right">
                        <a href="#" class="btn roberto-btn mb-50">Ahora</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Call To Action Area End -->

    <!-- Partner Area Start -->
    <div class="partner-area">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="partner-logo-content d-flex align-items-center justify-content-between wow fadeInUp" data-wow-delay="300ms">
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="img/core-img/p1.png" alt=""></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="img/core-img/p2.png" alt=""></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="img/core-img/p3.png" alt=""></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="img/core-img/p4.png" alt=""></a>
                        <!-- Single Partner Logo -->
                        <a href="#" class="partner-logo"><img src="img/core-img/p5.png" alt=""></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Partner Area End -->

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
    <script src="js/script_detalle.js"></script>

    <script>
        let xhr = new XMLHttpRequest();
    let id_tour = <?php echo $_GET['id_tour']?>;
function getTour() {
    let xhr = new XMLHttpRequest();
    xhr.open('POST', 'funciones/logica_data.php', true);
    xhr.onload = function() {
        if (this.status == 200) {
            let rsp = JSON.parse(xhr.responseText);
            let r = `<div class="carousel-inner">`;
            let rr = '<ol class="carousel-indicators">';
            console.log(rsp);
            rsp[0].foto_tour.split(',').forEach((e,i) => {
                r += `
                        <div class="carousel-item ${(i==0)? 'active': ''}">
                            <img src="img/bg-img/${e}" class="d-block w-100" alt="">
                        </div>`;
                                
                rr += `
                        <li data-target="#room-thumbnail--slide" data-slide-to="${i}" ${(i==0)? 'class="active"': ''}>
                            <img src="img/bg-img/${e}" class="d-block w-100" alt="">
                        </li>
                                    
                                
                `;

            });
            r += `</div>`;
            rr += '</ol>';
            r+=rr;
            document.getElementById("vacantes_tour").innerHTML = rsp[0].vacantes_tour;
            document.getElementById("precio_tour").innerHTML = '$'+rsp[0].precio_tour;
            document.getElementById("descripcion_tour").innerHTML = rsp[0].descripcion_tour;
            document.getElementById("mapa_lugar").innerHTML = rsp[0].mapa_lugar;
            document.getElementById("img_tour").innerHTML = r;
        }
    }
    let opcion = new FormData();
    opcion.append('flag', 'get_tour');
    opcion.append('id_tour',id_tour);
    xhr.send(opcion);
}
getTour();
    </script>

</body>

</html>