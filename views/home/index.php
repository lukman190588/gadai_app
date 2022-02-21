<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Desa Inovatif</title>
        <link rel="icon" type="image/x-icon" href="<?=get_foto('/public_style/front/assets/img/favicon.ico')?>" />
        <!-- Font Awesome icons (free version)-->
        <script src="https://use.fontawesome.com/releases/v5.15.1/js/all.js" crossorigin="anonymous"></script>
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700" rel="stylesheet" type="text/css" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <!-- <link href="css/styles.css" rel="stylesheet" /> -->

        <link rel="stylesheet" href="<?php echo get_template_directory('front/vendor/OwlCarousel2/dist/assets/owl.carousel.min.css') ;?>">
        <link rel="stylesheet" href="<?php echo get_template_directory('front/vendor/OwlCarousel2/dist/assets/owl.theme.default.min.css') ;?>">

        <link rel="stylesheet" href="<?php echo get_template_directory('front/css/styles.css') ;?>">
    </head>

    <!-- <style type="text/css">
        .card {
padding-left: 20px;
padding-right: 20px;
box-shadow: 0 0px 20px 0 rgba(0,0,0,0.2);
background-color: rgba(0,0,0,0.2);
transition: 0.3s;}
    </style> -->

    <body id="page-top">
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
            <div class="container">
                <a class="navbar-brand js-scroll-trigger" href="#page-top"><img src="<?=get_foto('/public_style/front/assets/img/navbar-logo.svg')?>" alt="" /></a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars ml-1"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav text-uppercase ml-auto">
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#services">Services</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#portfolio">Portfolio</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#about">About</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#team">Team</a></li>
                        <li class="nav-item"><a class="nav-link js-scroll-trigger" href="#contact">Contact</a></li>
                    </ul>
                </div>
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container">
                <div class="masthead-subheading">Welcome to Desa Inovatif!</div>
                <div class="masthead-heading text-uppercase">It's Nice To Meet You</div>
                <a class="btn btn-primary btn-xl text-uppercase js-scroll-trigger" href="#services">Tell Me More</a>
            </div>
        </header>
        <!-- Services-->
        <section class="page-section" id="services">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Tentang Desa Inovatif</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.<br>Kami pun memberikan beberapa layanan sebagai berikut.</h3>
                </div>
                <div class="row text-center">
                    <div class="col-md-6 mb-3">
                        <div class="card p-3">
                            <center>
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-file-contract fa-stack-1x fa-inverse"></i>
                            </span>
                            </center>
                            <h4 class="my-3">Administrasi Desa</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                        </div>
                        
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card p-3">
                            <center>
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-hand-holding-heart fa-stack-1x fa-inverse"></i>
                            </span>
                            </center>
                            <h4 class="my-3">Pelayanan Desa</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card p-3">
                            <center>
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-splotch fa-stack-1x fa-inverse"></i>
                            </span>
                            </center>
                            <h4 class="my-3">Website Profil</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <div class="card p-3">
                            <center>
                            <span class="fa-stack fa-4x">
                                <i class="fas fa-circle fa-stack-2x text-primary"></i>
                                <i class="fas fa-mobile-alt fa-stack-1x fa-inverse"></i>
                            </span>
                            </center>
                            <h4 class="my-3">Android App</h4>
                            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Minima maxime quam architecto quo inventore harum ex magni, dicta impedit.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Portfolio Grid-->
        <section class="page-section bg-light" id="portfolio">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Why Us?</h2>
                    <h3 class="section-subheading text-muted">Desa Inovatif memiliki Fitur yang Lengkap dan Mudah Digunakan</h3>
                </div>
                <div class="row">
                    <div class="col-sm-6">
                        <p>Desa Inovatif merupakan platform tata kelola desa yang menawarkan sejumlah layanan seperti sistem informasi pembangunan desa, administrasi, kependudukan, pelayanan publik, anggaran, dan berbagai layanan lainnya.</p>

                        <div class="row">
                            <div class="col-2 text-center" style="font-size: 30px;">
                                <i class="fas fa-users"></i>
                            </div>
                            <div class="col-9">
                                <p> Mengelola data kependudukan dengan cara cerdas, cepat, tepat dan terintegrasi.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2 text-center" style="font-size: 30px;">
                                <i class="fas fa-tachometer-alt"></i>
                            </div>
                            <div class="col-9">
                                <p> Pelayanan administrasi menjadi lebih cepat dan efisien dengan dukungan data yang akurat.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2 text-center" style="font-size: 30px;">
                                <i class="far fa-clock"></i>
                            </div>
                            <div class="col-9">
                                <p> Kecepatan memproses pelaporan data dan administrasi secara realtime.</p>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-2 text-center" style="font-size: 30px;">
                                <i class="fas fa-shield-alt"></i>
                            </div>
                            <div class="col-9">
                                <p> Penggunaan teknologi cloud untuk kemudahan akses dan keamanan data.</p>
                            </div>
                        </div>

                    </div>
                    <div class="col-sm-6 text-center mt-5">
                        <img src="<?=get_foto_assets('whyus.svg')?>" class="img-fluid w-50">
                    </div>
                </div>
            </div>
        </section>
        <!-- About-->
        <section class="page-section" id="about">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Maanfaat Menggunakan Desa Inovatif</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <center><h4>MEMBUAT PROSES LEBIH CEPAT</h4></center>
                        <div class="card" style="color: white;">
                            <div class="card-body p-0">
                                <div class="row m-0">
                                    <div class="col-6 p-3" style="background-color: #2E99A5;">
                                        <h5>Tanpa Desa Inovatif</h5>
                                        Proses dapat memakan waktu mulai dari 30 Menit s/d 1 → 4 hari.
                                    </div>
                                    <div class="col-6 p-3" style="background-color:  #32CD32;">
                                        <h5>Dengan Desa Inovatif</h5>
                                        Proses lebih mudah dan cepat bahkan hanya memakan waktu 1-5 Menit.
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <center><h4>MEMBUAT LEBIH MUDAH DIJANGKAU</h4></center>
                        <div class="card" style="color: white;">
                            <div class="card-body p-0">
                                <div class="row m-0">
                                    <div class="col-6 p-3" style="background-color: #2E99A5;">
                                        <h5>Tanpa Desa Inovatif</h5>
                                        Pengenalan Potensi Desa sangat terbatas karena beberapa alasan yaitu salah satunya merupakan faktor geografis.
                                    </div>
                                    <div class="col-6 p-3" style="background-color:  #32CD32;">
                                        <h5>Dengan Desa Inovatif</h5>
                                        Dengan promosi digital dapat menjangkau lebih banyak (tak terbatas), bahkan desa dapat dikenal diseluruh Indonesia.
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                    </div>
                </div>
                <div class="row mb-5">
                    <div class="col">
                        <center><h4>MEMBUAT DATA LEBIH AMAN DAN NYAMAN</h4></center>
                        <div class="card" style="color: white;">
                            <div class="card-body p-0">
                                <div class="row m-0">
                                    <div class="col-6 p-3" style="background-color: #2E99A5;">
                                        <h5>Tanpa Desa Inovatif</h5>
                                        Data terkadang kacau akibat human error dan waktu untuk memperbaikinya butuh waktu cukup lama.
                                    </div>
                                    <div class="col-6 p-3" style="background-color:  #32CD32;">
                                        <h5>Dengan Desa Inovatif</h5>
                                        Data dapat dengan mudah diperiksa dan diverifikasi karena dapat diakses dengan mudah.
                                    </div>
                                </div>
                            </div>
                                
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Team-->
        <section class="page-section bg-light" id="team">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Testimoni</h2>
                    <h3 class="section-subheading text-muted">Banyak yang sudah terbantu atas adanya aplikasi Desa Inovatif ini, berikut beberapa testimoni yang kami dapat dari user kami.</h3>
                </div>
                <div class="row">
                    <div class="owl-carousel owl-one">
                      <div class="text-center">
                        <div class="row">
                            <div class="col-md-8">
                                <center><img src="<?=get_foto_assets('quote.png')?>" class="img-fluid" style="height: 30px; width: auto;"></center><br>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="col-md-4">
                                <center><img src="https://digitaldesa.id/templates/homepage/media/testimoni/kades-lakatong.webp" class="img-fluid"></center>
                            </div>
                        </div>
                      </div>
                      <div class="text-center">
                        <div class="row">
                            <div class="col-md-8">
                                <center><img src="<?=get_foto_assets('quote.png')?>" class="img-fluid" style="height: 30px; width: auto;"></center><br>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="col-md-4">
                                <center><img src="https://digitaldesa.id/templates/homepage/media/testimoni/kades-lakatong.webp" class="img-fluid"></center>
                            </div>
                        </div>
                      </div>
                      <div class="text-center">
                        <div class="row">
                            <div class="col-md-8">
                                <center><img src="<?=get_foto_assets('quote.png')?>" class="img-fluid" style="height: 30px; width: auto;"></center><br>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="col-md-4">
                                <center><img src="https://digitaldesa.id/templates/homepage/media/testimoni/kades-lakatong.webp" class="img-fluid"></center>
                            </div>
                        </div>
                      </div>
                      <div class="text-center">
                        <div class="row">
                            <div class="col-md-8">
                                <center><img src="<?=get_foto_assets('quote.png')?>" class="img-fluid" style="height: 30px; width: auto;"></center><br>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="col-md-4">
                                <center><img src="https://digitaldesa.id/templates/homepage/media/testimoni/kades-lakatong.webp" class="img-fluid"></center>
                            </div>
                        </div>
                      </div>
                      <div class="text-center">
                        <div class="row">
                            <div class="col-md-8">
                                <center><img src="<?=get_foto_assets('quote.png')?>" class="img-fluid" style="height: 30px; width: auto;"></center><br>
                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
                            </div>
                            <div class="col-md-4">
                                <center><img src="https://digitaldesa.id/templates/homepage/media/testimoni/kades-lakatong.webp" class="img-fluid"></center>
                            </div>
                        </div>
                      </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Clients-->
        <div class="py-5">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Partner Kami</h2>
                </div>
                <div class="row mt-3">
                    <div class="owl-carousel owl-two">
                      <div class="text-center">
                        <center>
                            <img src="https://digitaldesa.id/templates/homepage/media/klien/barru.webp" class="img-fluid mb-3" style="height: 250px; width: auto;">
                        </center>
                        <p>Kabupaten Barru</p>
                      </div>
                      <div class="text-center">
                        <center>
                            <img src="https://digitaldesa.id/templates/homepage/media/klien/jeneponto.webp" class="img-fluid mb-3" style="height: 250px; width: auto;">
                        </center>
                        <p>Kabupaten Jeneponto</p>
                      </div>
                      <div class="text-center">
                        <center>
                            <img src="https://digitaldesa.id/templates/homepage/media/klien/takalar.webp" class="img-fluid mb-3" style="height: 250px; width: auto;">
                        </center>
                        <p>Kabupaten Takalar</p>
                      </div>
                      <div class="text-center">
                        <center>
                            <img src="https://digitaldesa.id/templates/homepage/media/klien/sinjai.webp" class="img-fluid mb-3" style="height: 250px; width: auto;">
                        </center>
                        <p>Kabupaten Sinjai</p>
                      </div>
                      <div class="text-center">
                        <center>
                            <img src="https://digitaldesa.id/templates/homepage/media/klien/enrekang.webp" class="img-fluid mb-3" style="height: 250px; width: auto;">
                        </center>
                        <p>Kabupaten Enrekang</p>
                      </div>
                      <div class="text-center">
                        <center>
                            <img src="https://digitaldesa.id/templates/homepage/media/klien/kolut.webp" class="img-fluid mb-3" style="height: 250px; width: auto;">
                            <p>Kabupaten Kolaka Kolut</p>
                        </center>
                      </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Contact-->
        <section class="page-section" id="contact">
            <div class="container">
                <div class="text-center">
                    <h2 class="section-heading text-uppercase">Contact Us</h2>
                    <h3 class="section-subheading text-muted">Lorem ipsum dolor sit amet consectetur.</h3>
                </div>
                <form id="contactForm" name="sentMessage" novalidate="novalidate">
                    <div class="row align-items-stretch mb-5">
                        <div class="col-md-6">
                            <div class="form-group">
                                <input class="form-control" id="name" type="text" placeholder="Your Name *" required="required" data-validation-required-message="Please enter your name." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group">
                                <input class="form-control" id="email" type="email" placeholder="Your Email *" required="required" data-validation-required-message="Please enter your email address." />
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group mb-md-0">
                                <input class="form-control" id="phone" type="tel" placeholder="Your Phone *" required="required" data-validation-required-message="Please enter your phone number." />
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group form-group-textarea mb-md-0">
                                <textarea class="form-control" id="message" placeholder="Your Message *" required="required" data-validation-required-message="Please enter a message."></textarea>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                    </div>
                    <div class="text-center">
                        <div id="success"></div>
                        <button class="btn btn-primary btn-xl text-uppercase" id="sendMessageButton" type="submit">Send Message</button>
                    </div>
                </form>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer py-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-4 text-lg-left">Copyright © Your Website 2020</div>
                    <div class="col-lg-4 my-3 my-lg-0">
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-twitter"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-facebook-f"></i></a>
                        <a class="btn btn-dark btn-social mx-2" href="#!"><i class="fab fa-linkedin-in"></i></a>
                    </div>
                    <div class="col-lg-4 text-lg-right">
                        <a class="mr-3" href="#!">Privacy Policy</a>
                        <a href="#!">Terms of Use</a>
                    </div>
                </div>
            </div>
        </footer>

        

        <!-- Bootstrap core JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Third party plugin JS-->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.min.js"></script>
        <!-- Contact form JS-->

        <script src="<?php echo get_template_directory('front/vendor/OwlCarousel2/dist/owl.carousel.min.js') ;?>"></script>

        <!-- <script src="assets/mail/jqBootstrapValidation.js"></script> -->
        <script src="<?php echo get_template_directory('front/assets/mail/jqBootstrapValidation.js') ;?>"></script>
        <!-- <script src="assets/mail/contact_me.js"></script> -->
        <script src="<?php echo get_template_directory('front/assets/mail/contact_me.js') ;?>"></script>
        <!-- Core theme JS-->
        <!-- <script src="js/scripts.js"></script> -->
        <script src="<?php echo get_template_directory('front/js/scripts.js') ;?>"></script>

        <script type="text/javascript">
            $(document).ready(function(){
              $(".owl-one").owlCarousel({
                items : 1,
                loop : 1
              });
            });

            $(document).ready(function(){
              $(".owl-two").owlCarousel({
                items : 3,
                loop : 1
              });
            });
        </script>
    </body>
</html>
