<?php
/**
 * creative
 * @version 0.1
 * @author Daniel Huidobro <daniel.hui287@gmail.com>
 * @see https://github.com/BlackrockDigital/startbootstrap-creative
 * Creative Template con el rollo del mapa
 */
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

    <head>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta name="description" content="">
        <meta name="author" content="">

        <title>uLocation - Theme</title>

        <!-- Bootstrap core CSS -->
        <link href="/assets/css/bootstrap.min.css" rel="stylesheet">

        <!-- Custom fonts for this template -->
        <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
        <link href='https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800' rel='stylesheet' type='text/css'>
        <link href='https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic,900,900italic' rel='stylesheet' type='text/css'>

        <!-- Plugin CSS -->
        <link href="vendor/magnific-popup/magnific-popup.css" rel="stylesheet">

        <!-- Custom styles for this template -->
        <link href="/assets/css/creative.css" rel="stylesheet">
        <link href="/assets/css/macehuales.css" rel="stylesheet">

        <!-- Temporary navbar container fix -->
        <style>
            .navbar-toggler {
                z-index: 1;
            }

            @media (max-width: 576px) {
                nav > .container {
                    width: 100%;
                }
            }
        </style>

    </head>

    <body id="page-top">
        <?php if ($this->session->userdata('lat')) { ?>
            <input type="hidden" name="user_lat" id="user_lat" value="<?php echo $this->session->userdata('lat'); ?>">
            <input type="hidden" name="user_lng" id="user_lng" value="<?php echo $this->session->userdata('lng'); ?>">
        <?php } ?>

        <!-- Navigation -->
        <nav class="navbar fixed-top navbar-toggleable-md navbar-light" id="mainNav">
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarExample" aria-controls="navbarExample" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="container">
                <a class="navbar-brand" href="#page-top">Tema uLocation</a>
                <div class="collapse navbar-collapse" id="navbarExample">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link" href="#about">Acerca de</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#services">Caracteristicas</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#portfolio">Galería</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#contact">Contacto</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>

        <header class="masthead">
            <div class="header-content">
                <div class="header-content-inner">
                    <h1 id="homeHeading">Tema uLocation</h1>
                    <hr>
                    <p>¿Todos saben donde estan tus sucursales? ¿Donde estan tus puntos de venta? ¿Tu evento tiene varias sedes? Este template es para ti!</p>
                    <a class="btn btn-primary btn-xl" href="#about">¿Que es esto?</a>
                </div>
            </div>
        </header>

        <section class="bg-primary" id="about">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <h2 class="section-heading text-white">Queremos que todos sepan donde estamos sin perder la cabeza!</h2>
                        <hr class="light">
                        <p class="text-faded">Muestra tus magnificos lugares en el mapa, indica la distancia y como llegar, administrador incluido!</p>
                        <a class="btn btn-default btn-xl sr-button" href="#services">Comienza ahóra!</a>
                    </div>
                </div>
            </div>
        </section>

        <section id="services">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 text-center">
                        <h2 class="section-heading">Lo que ofrecemos</h2>
                        <hr class="primary">
                    </div>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-diamond text-primary sr-icons"></i>
                            <h3>Mobile First</h3>
                            <p class="text-muted">Amigable con la mayoría de dispositivos moviles.</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-paper-plane text-primary sr-icons"></i>
                            <h3>Listo para instalar</h3>
                            <p class="text-muted">Un poco de conocimientos tecnicos son suficientes!</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-newspaper-o text-primary sr-icons"></i>
                            <h3>Up to Date</h3>
                            <p class="text-muted">Actualizaremos nuestras dependencias para mantener todo fresco</p>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 text-center">
                        <div class="service-box">
                            <i class="fa fa-4x fa-heart text-primary sr-icons"></i>
                            <h3>Gratis y Libre</h3>
                            <p class="text-muted">Eres libre de descargar, modificar y usar (Sin letras pequeñas)</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <section id="map">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-3">
                        <div class="col-lg-12">
                            <button class="btn btn-lg btn-primary form-control" id="ubicacion"><i class="fa fa-compass"></i> Mi Ubicación</button>
                        </div>
                        <div class="col-lg-12" id="places"></div>
                    </div>
                    <div class="col-lg-9">
                        <h2>Mapa de lugares</h2>
                        <div id="tenochtitlan"></div>
                    </div>
                </div>
            </div>            
        </section>

        <section class="no-padding" id="portfolio">
            <div class="container-fluid">
                <div class="row no-gutter popup-gallery">
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/assets/ui/portfolio/fullsize/1.jpg">
                            <img class="img-fluid" src="/assets/ui/portfolio/thumbnails/1.jpg" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Category
                                    </div>
                                    <div class="project-name">
                                        Project Name
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/assets/ui/portfolio/fullsize/2.jpg">
                            <img class="img-fluid" src="/assets/ui/portfolio/thumbnails/2.jpg" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Category
                                    </div>
                                    <div class="project-name">
                                        Project Name
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/assets/ui/portfolio/fullsize/3.jpg">
                            <img class="img-fluid" src="/assets/ui/portfolio/thumbnails/3.jpg" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Category
                                    </div>
                                    <div class="project-name">
                                        Project Name
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/assets/ui/portfolio/fullsize/4.jpg">
                            <img class="img-fluid" src="/assets/ui/portfolio/thumbnails/4.jpg" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Category
                                    </div>
                                    <div class="project-name">
                                        Project Name
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/assets/ui/portfolio/fullsize/5.jpg">
                            <img class="img-fluid" src="/assets/ui/portfolio/thumbnails/5.jpg" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Category
                                    </div>
                                    <div class="project-name">
                                        Project Name
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                    <div class="col-lg-4 col-sm-6">
                        <a class="portfolio-box" href="/assets/ui/portfolio/fullsize/6.jpg">
                            <img class="img-fluid" src="/assets/ui/portfolio/thumbnails/6.jpg" alt="">
                            <div class="portfolio-box-caption">
                                <div class="portfolio-box-caption-content">
                                    <div class="project-category text-faded">
                                        Category
                                    </div>
                                    <div class="project-name">
                                        Project Name
                                    </div>
                                </div>
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </section>

        <div class="call-to-action bg-dark" style="overflow-x: hidden;">
            <div class="row">
                <div class="col-lg-6 text-center">
                    <h2>Descaga desde GitHub!</h2>
                    <a href="https://github.com/elhui2/uLocation" target="_blank"><i class="fa fa-github fa-5x" aria-hidden="true"></i></a>
                </div>
                <div class="col-lg-6 text-center">

                    <h2>Prueba el admin!</h2>
                    <?php
                    if ($this->session->userdata('logged')) {
                        ?>
                        <a class="btn btn-default btn-xl sr-button" href="/places/admin">Administrador</a>
                        <?php
                    } else {
                        ?>
                        <p>user: ulocation@rebootproject.mx <br> password: reebot1234</p>
                        <a class="btn btn-default btn-xl sr-button" href="/login">Login</a>
                        <?php
                    }
                    ?>

                </div>
            </div>


        </div>

        <section id="contact">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8 offset-lg-2 text-center">
                        <h2 class="section-heading">Ponte en contacto!</h2>
                        <hr class="primary">
                        <p>Queremos saber que es lo que piensas, mejoras, correcciones de errores, sugerencias. ¿tienes dudas? <br>Mandanos tus comentarios</p>
                    </div>
                    <div class="col-lg-4 offset-lg-2 text-center">
                        <i class="fa fa-phone fa-3x sr-contact"></i>
                        <p>+(52) 5555555555</p>
                    </div>
                    <div class="col-lg-4 text-center">
                        <i class="fa fa-envelope-o fa-3x sr-contact"></i>
                        <p><a href="mailto:daniel@rebootproject.mx">daniel@rebootproject.mx</a></p>
                    </div>
                </div>
            </div>
        </section>

        <footer class="footer">
            <div class="container">
                <p class="text-muted">Desarrollado por <a href="http://rebootproject.mx">Reboot Project.</a> Basado en la plantilla <a href="https://github.com/BlackrockDigital/startbootstrap-creative">Creative</a> de Star Bootstrap</p>
            </div>
        </footer>

        <script src="/assets/js/jquery.min.js"></script>
        <script src="vendor/tether/tether.min.js"></script>
        <script src="/assets/js/bootstrap.min.js"></script>
        <script src="vendor/jquery-easing/jquery.easing.min.js"></script>
        <script src="vendor/scrollreveal/scrollreveal.min.js"></script>
        <script src="vendor/magnific-popup/jquery.magnific-popup.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo gmaps_api_key ?>&libraries=places"></script>
        <script type="text/javascript" src="/assets/js/places.js"></script>
        <script src="/assets/js/creative.js"></script>

    </body>

</html>
