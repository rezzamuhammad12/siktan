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

    <title>SIKTAN JABAR</title>
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top ">
        <div class="container d-flex align-items-center">

            <!-- Uncomment below if you prefer to use an image logo -->
            <a href="index.html" class="logo mr-auto"><img src="<?= base_url('assets/'); ?>img/logo.png" alt="" class="img-fluid"></a>

            <nav class="nav-menu d-none d-lg-block">
                <ul>
                    <li class="active"><a href="index.html">Home</a></li>
                    <li><a href="#info">Info & Berita</a></li>
                    <li><a href="#statistik">Statistik</a></li>
                    <li><a href="#portfolio">About Us</a></li>

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
                    <h1>Sistem Informasi Kelompok Tani</h1>
                    <h2>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut
                        labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco
                        laboris nisi ut aliquip ex ea commodo consequat. </h2>
                    <div class="d-lg-flex">
                        <a href="#about" class="btn-get-started scrollto">About US</a>
                    </div>
                </div>
                <div class="col-lg-6 order-1 order-lg-2 hero-img" data-aos="zoom-in" data-aos-delay="200">
                    <img src="<?= base_url('assets/'); ?>img/hero-img.png" class="img-fluid animated" alt="">
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

            <div class="row">
                <div class="col-lg-7 carousel-wrapper">

                    <div class="owl-carousel owl-theme">
                        <div class="item"> </div>
                        <div class="item"> </div>
                        <div class="item"> </div>
                        <div class="item"> </div>
                        <div class="item"> </div>
                        <div class="item"> </div>
                        <div class="item"> </div>
                        <div class="item"> </div>
                        <div class="item"> </div>
                        <div class="item"> </div>
                        <div class="item"> </div>
                        <div class="item"> </div>
                    </div>
                </div>
                <div class="col-lg-5 info-wrapper">
                    <div class="info">

                    </div>

                </div>
            </div>
        </div>
    </section>

    <!-- ======= Data & statik ======= -->

    <section id="statistik">
        <div class="container" data-aos="fade-up">
            <div class="container-fluid">
                <div class="section-title2">
                    <h2>Info & Berita</h2>
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

    <!-- ======= footer ======= -->

    <footer id="footer">
        <div class="footer-text text-center">
            <h2><strong>Dinas Pertanian dan Ketahanan Pangan</strong></h2>
            <h5><i class="icofont-copyright"></i> 2020 Proudly present by Bondowoso</h5>
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