<?php
$konfigurasi = getKonfigurasi();

?>
<main class="site-main page-spacing">
    <!-- Page Banner -->
    <div class="container-fluid page-banner about-banner">
        <div class="container">
            <h3>about us</h3>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('') ?>">Home</a></li>
                <li class="active">About Us</li>
            </ol>
        </div>
    </div><!-- Page Banner /- -->
    <div class="section-padding"></div>
    <!-- container -->
    <div class="container">
        <div class="content-block container-fluid">
            <div class="row">
                <div class="col-lg-4">
                    <img src="<?= base_url('images/konfigurasi/' . $konfigurasi->gambar_sistem) ?>" alt="Waiter" />
                </div>
                <div class="col-lg-8">
                    <h3>About Us</h3>
                    <p><?= $konfigurasi->tentang; ?></p>
                </div>
            </div>
        </div>
    </div><!-- container /- -->
    <div class="section-padding"></div>


    <div class="section-padding"></div>
    <!-- container -->
    <div class="container">
        <div class="content-block container-fluid">
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-12 content-img-block text-center">
                    <img src="<?= base_url('images/konfigurasi/employee.png') ?>" alt="Waiter" />
                </div>
                <div class="col-md-8 col-sm-6 col-xs-12">
                    <h3>Nikmati Hari dan Kenangan Dengan Hotel Anda</h3>
                    <p>Teruntuk anda yang sedang berlibur, dan menciptakan kesan yang indah, Silahkan berkunjung ke hotel kami dan melihat suasana disekitarnya, Dijamin anda akan merasakan kenyamanan hotel kami, untuk lihat detailnya silahkan klik link dibawah ini.</p>
                    <a href="<?= base_url('Front/Kamar') ?>" title="view details" class="read-more">Lihat Detail <i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </div><!-- container /- -->
    <div class="section-padding"></div>



    <!-- Statistics Section -->
    <div id="statistics-section" class="statistics-section container-fluid no-padding">
        <div class="section-padding"></div>
        <!-- Container -->
        <div class="container">
            <!-- Section Header -->
            <div class="section-header">
                <h3>Hal yang menyenangkan</h3>
                <p>Hal-hal yang anda dapat nikmati di hotel kami <br> Begitu menyenangkan, kepuasan pelanggan hal yang utama pada kami, mari pesan sekarang</p>
            </div><!-- Section Header /- -->
            <div class="row">
                <!-- col-md-3 /- -->
                <div class="col-md-3 col-sm-3 col-xs-6 animated fadeInDown">
                    <div class="statistics-box">
                        <i class="fas fa-users fa-2x text-primary"></i>
                        <h6>guests</h6>
                        <h2><span id="statistics_count-1" data-statistics_percent="<?= $users ?>"><?= $users ?></span>&nbsp;</h2>
                    </div>
                </div><!-- col-md-3 /- -->
                <!-- col-md-3 /- -->
                <div class="col-md-3 col-sm-3 col-xs-6 animated fadeInDown">
                    <div class="statistics-box">
                        <i class="fas fa-bed fa-2x text-primary"></i>
                        <h6>Kamar</h6>
                        <h2><span id="statistics_count-2" data-statistics_percent="<?= $kamar ?>"><?= $kamar ?></span>&nbsp;</h2>
                    </div>
                </div><!-- col-md-3 /- -->
                <!-- col-md-3 /- -->
                <div class="col-md-3 col-sm-3 col-xs-6 animated fadeInDown">
                    <div class="statistics-box">
                        <i class="fas fa-concierge-bell fa-2x text-primary"></i>
                        <h6>Fasilitas</h6>
                        <h2><span id="statistics_count-3" data-statistics_percent="<?= $fasilitas; ?>"><?= $fasilitas; ?></span></h2>
                    </div>
                </div><!-- col-md-3 /- -->
                <!-- col-md-3 /- -->
                <div class="col-md-3 col-sm-3 col-xs-6 animated fadeInDown">
                    <div class="statistics-box">
                        <i class="fab fa-servicestack fa-2x text-primary"></i>
                        <h6>Tipe</h6>
                        <h2><span id="statistics_count-4" data-statistics_percent="<?= $tipe ?>"><?= $tipe ?></span>&nbsp;</h2>
                    </div>
                </div><!-- col-md-3 /- -->
            </div>
        </div><!-- Container /- -->
        <div class="section-padding"></div>
    </div><!-- Statistics Section /- -->

</main>