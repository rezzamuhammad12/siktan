<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">

    <!-- Favicons -->
    <link rel='shortcut icon' type='image/x-icon' href="<?= base_url('assets/'); ?>img/favicon.ico" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="<?= base_url('assets/'); ?>vendor/icofont/icofont.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/venobox/venobox.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/aos/aos.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>vendor/owl.carousel/assets/owl.carousel.min.css" rel="stylesheet">

    <!-- Custom CSS -->

    <link href="<?= base_url('assets/'); ?>css/sb-admin-2.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/main_landingpage.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/landingstyle.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/ionicons.min.css" rel="stylesheet">
    <link href="<?= base_url('assets/'); ?>css/ionicons.css" rel="stylesheet">


    <title>Si-Petani</title>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.php" class="logo mr-auto"><img src="<?= base_url('assets/'); ?>img/logo-baru.png" alt="" class="img-fluid"></a>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="index.php">Home</a></li>
                    <li><a href="#info">Info & Berita</a></li>
                    <li><a href="#statistik">Statistik</a></li>
                    <li><a href="#maps">Peta Informasi</a></li>

                </ul>
            </nav><!-- .nav-menu -->

            <a href="auth" class="get-started-btn scrollto">Login</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex align-items-center">

        <div class="container">
            <div class="row">
                <div class="col-lg-6 d-flex flex-column justify-content-center pt-4 pt-lg-0 order-2 order-lg-1" data-aos="fade-up" data-aos-delay="200">
                    <h1>Sistem Informasi Database <br>Kelompok Tani</h1>
                    <br>
                    <h3><b>Provinsi Jawa Barat</b></h3><br>
                    <div class="d-lg-flex">
                        <a href="#about" class="btn-get-started scrollto">Selengkapnya...</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="<?= base_url('assets/'); ?>img/hero-logo.png" class="img-fluid animated" alt="">
                </div>
            </div>
        </div>

    </section><!-- End Hero -->


    <!-- ======= info & berita ======= -->

    <section id="info">
        <div class="container" data-aos="fade-up">
            <div class="section-title">
                <h2>Info & Berita</h2>
            </div>

            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                    </div>


                    <div id="carouselExample" class="carousel slide d-none d-sm-none d-md-block" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="d-block w-100" src="https://fakeimg.pl/800x400/?retina=1&text=Logo 1&font=noto" alt="First slide">
                                    </div>
                                    <div class="col-md-4">
                                        <img class="d-block w-100" src="https://fakeimg.pl/800x400/?retina=1&text=Logo 2&font=noto" alt="First slide">
                                    </div>
                                    <div class="col-md-4">
                                        <img class="d-block w-100" src="https://fakeimg.pl/800x400/?retina=1&text=Logo 3&font=noto" alt="First slide">
                                    </div>
                                </div>
                            </div>


                            <div class="carousel-item">
                                <div class="row">
                                    <div class="col-md-4">
                                        <img class="d-block w-100" src="https://fakeimg.pl/800x400/?retina=1&text=Logo 5&font=noto" alt="First slide">
                                    </div>
                                    <div class="col-md-4">
                                        <img class="d-block w-100" src="https://fakeimg.pl/800x400/?retina=1&text=Logo 6&font=noto" alt="First slide">
                                    </div>
                                    <div class="col-md-4">
                                        <img class="d-block w-100" src="https://fakeimg.pl/800x400/?retina=1&text=Logo 7&font=noto" alt="First slide">
                                    </div>
                                </div>
                            </div>


                        </div>

                        <a class="carousel-control-prev" href="#carouselExample" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>


                        <a class="carousel-control-next" href="#carouselExample" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>


                    </div>


                    <div id="carouselExampleMobile" class="carousel slide d-md-none d-lg-none d-xl-none" data-ride="carousel">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img class="d-block w-100" src="https://fakeimg.pl/800x400/?retina=1&text=Logo 1&font=noto" alt="First slide">
                            </div>


                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://fakeimg.pl/800x400/?retina=1&text=Logo 2&font=noto" alt="Second slide">
                            </div>


                            <div class="carousel-item">
                                <img class="d-block w-100" src="https://fakeimg.pl/800x400/?retina=1&text=Logo 3&font=noto" alt="Third slide">
                            </div>


                        </div>

                        <a class="carousel-control-prev" href="#carouselExampleMobile" role="button" data-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="sr-only">Previous</span>
                        </a>


                        <a class="carousel-control-next" href="#carouselExampleMobile" role="button" data-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="sr-only">Next</span>
                        </a>
                    </div>
                </div>
            </div>

            <br><br><br><br>

            <div class="row feature-item">
                <div class="col-lg-6 wow fadeInUp">
                    <img src="<?= base_url('assets/'); ?>img/cobas.png" alt="" class="img-fluid">
                </div>
                <div class="col-lg-6 wow fadeInUp pt-5 pt-lg-0">

                    <section id="faq">
                        <div class="container" style="margin-top: -50px;">
                            <header class="section-header">
                                <h3>
                                    <font color="white">Berita Terbaru</font>
                                </h3>

                            </header>

                            <font color="white">
                                <ul id="faq-list" class="wow fadeInUp">
                                    <li>
                                        <a data-toggle="collapse" class="collapsed" href="#faq1">
                                            <font size="4px" color="white">Non consectetur a erat nam at lectus urna duis? </font> <i class="ion-android-remove"></i>
                                        </a>
                                        <div id="faq1" class="collapse" data-parent="#faq-list">
                                            <p>
                                                <font color="white">
                                                    Feugiat pretium nibh ipsum consequat. Tempus iaculis urna id volutpat lacus laoreet non curabitur gravida. Venenatis lectus magna fringilla urna porttitor rhoncus dolor purus non. </font>
                                            </p>
                                            <p style="font-size: 10px">22 September 2020</p>
                                        </div>
                                    </li>

                                    <li>
                                        <a data-toggle="collapse" href="#faq2" class="collapsed">
                                            <font size="4px" color="white">Feugiat scelerisque varius morbi enim nunc faucibus a pellentesque? </font><i class="ion-android-remove"></i>
                                        </a>
                                        <div id="faq2" class="collapse" data-parent="#faq-list">
                                            <p>
                                                Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi. Id interdum velit laoreet id donec ultrices. Fringilla phasellus faucibus scelerisque eleifend donec pretium. Est pellentesque elit ullamcorper dignissim. Mauris ultrices eros in cursus turpis massa tincidunt dui.
                                            </p>
                                            <p style="font-size: 10px">25 September 2020</p>
                                        </div>
                                    </li>

                                    <li>
                                        <a data-toggle="collapse" href="#faq3" class="collapsed">
                                            <font size="4px" color="white">Dolor sit amet consectetur adipiscing elit pellentesque habitant morbi? </font><i class="ion-android-remove"></i>
                                        </a>
                                        <div id="faq3" class="collapse" data-parent="#faq-list">
                                            <p>
                                                Eleifend mi in nulla posuere sollicitudin aliquam ultrices sagittis orci. Faucibus pulvinar elementum integer enim. Sem nulla pharetra diam sit amet nisl suscipit. Rutrum tellus pellentesque eu tincidunt. Lectus urna duis convallis convallis tellus. Urna molestie at elementum eu facilisis sed odio morbi quis
                                            </p>
                                            <p style="font-size: 10px">21 September 2020</p>
                                        </div>
                                    </li>

                                </ul>
                            </font>
                            <a href="#">
                                <font color="cyan">Lihat Selengkapnya...</font>
                            </a>

                        </div>
                    </section><!-- #faq -->

                </div>
            </div>
        </div>
    </section>


    <!-- ============== info & berita ================= -->





    <!-- ======= Data & statik ======= -->

    <section id="statistik">
        <div class="container" data-aos="fade-up">
            <div class="container-fluid">
                <div class="section-title2">
                    <h2>Data Statistik</h2>
                </div>


                <!-- Content Row -->
                <div class="row">

                    <div class="col-xl-8 col-lg-7">

                        <!-- Area Chart -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Area Chart</h6>
                            </div>
                            <div class="card-body">
                                <div class="chart-area">
                                    <canvas id="myAreaChart"></canvas>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>

                    <!-- Donut Chart -->
                    <div class="col-xl-4 col-lg-5">
                        <div class="card shadow mb-4">
                            <!-- Card Header - Dropdown -->
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">Donut Chart</h6>
                            </div>
                            <!-- Card Body -->
                            <div class="card-body">
                                <div class="chart-pie pt-4">
                                    <canvas id="myPieChart"></canvas>
                                </div>
                                <hr>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">Kota
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">21</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">Kecamatan
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">66</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-4 col-md-6 mb-4">
                        <div class="card border-left-info shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Desa
                                        </div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800">99</div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-dollar-sign fa-2x text-gray-300"></i>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-clipboard-list fa-2x text-gray-300"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>

    </section>



    <!-- ======= Peta Informasi ======= -->

    <section id="maps">
        <div class="container" data-aos="fade-up">
            <div class="section-title2">
                <h2>Peta Informasi Jawa Barat</h2>
            </div>


            <center>
                <h1></h1>
                <button type="button" data-toggle="modal" data-target="#myModal">
                    <img src="<?= base_url('assets/'); ?>img/mapjabar.png" alt="" class="img-responsive" width="700" height="1000">
                </button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                                <h4 class="modal-title" id="myModalLabel">Kota Tasikmalaya</h4>
                            </div>
                            <div class="modal-body">
                                <center>
                                    <img src="<?= base_url('assets/'); ?>img/mapkotatasik.png" alt="" class="img-responsive">
                                </center>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>
            </center>






            <!--<center>-->

            <!--    <br><br>-->
            <!--<img src="<?= base_url('assets/'); ?>img/mapkotatasik.png" class="img-fluid animated" alt="Workspace" usemap="#workmap" width="600" height="900" >-->

            <!--    <map name="workmap">-->
            <!--      <area shape="circle" coords="110,60,22" alt="Indihiang" href="#" >  -->
            <!--      <area shape="circle" coords="70,100,22" alt="Bungursari" href="#" > -->
            <!--      <area shape="circle" coords="100,200,22" alt"Mangkubumi" href="#" >-->
            <!--      <area shape="circle" coords="220,210,22" alt="Cihideung" href="#" >-->
            <!--      <area shape="circle" coords="240,140,22" alt="Cipedes" href="#" >-->
            <!--      <area shape="circle" coords="140,330,30" alt"Kawalu" href="#" >-->
            <!--      <area shape="circle" coords="270,450,30" alt"Tamansari" href="#" >-->
            <!--      <area shape="circle" coords="280,270,23" alt"Tawang" href="#" >-->
            <!--      <area shape="circle" coords="420,310,30" alt"Cibeureum" href="#" >-->
            <!--      <area shape="circle" coords="480,230,27" alt"Purbaratu" href="#" >-->
            <!--    </map>-->


            <!--<script> function myFunction() {alert("Kecamatan Indihiang!");}</script>-->


            <!--</center>-->
            <!--<div class="map-responsive">-->
            <!--    <iframe src="https://www.google.com/maps/d/u/0/embed?mid=1xO4byHHHNenUNTj_OsEWxdGa_rLBaysO" width="1100" height="600">-->
            <!--    </iframe>-->
            <!--</div>-->
        </div>
    </section>


    <footer id="footer">
        <div class="footer-text text-center">
            <h2><strong>Dinas Tanaman Pangan dan Hortikultura Provinsi Jawa Barat</strong></h2>
            <h5><i class="icofont-copyright"></i> 2020 Proudly present by Si-Petani Jabar</h5>
        </div>

    </footer>




    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="<?= base_url('assets/'); ?>vendor/jquery/jquery.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous">
    </script>

    <!-- Vendor JS Files -->
    <script src="<?= base_url('assets/'); ?>vendor/jquery.easing/jquery.easing.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/venobox/venobox.min.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/aos/aos.js"></script>
    <script src="<?= base_url('assets/'); ?>vendor/owl.carousel/owl.carousel.min.js"></script>





    <!-- Custom scripts for all pages-->
    <script src="<?= base_url('assets/'); ?>js/sb-admin-2.min.js"></script>

    <!-- Page level plugins -->
    <script src="<?= base_url('assets/'); ?>vendor/chart.js/Chart.min.js"></script>

    <!-- Page level custom scripts -->
    <script src="<?= base_url('assets/'); ?>js/demo/chart-area-demo.js"></script>
    <script src="<?= base_url('assets/'); ?>js/demo/chart-pie-demo.js"></script>
    <script src="<?= base_url('assets/'); ?>js/demo/chart-bar-demo.js"></script>

    <!-- Custom JS File -->
    <script src="<?= base_url('assets/'); ?>js/landingpage_script.js"></script>

</body>

</html>