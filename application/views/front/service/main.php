<?php
$konfiurasi = getKonfigurasi();
?>
<main class="site-main page-spacing">
    <!-- Page Banner -->
    <div class="container-fluid page-banner about-banner">
        <div class="container">
            <h3>Services</h3>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('') ?>">Home</a></li>
                <li class="active">Services</li>
            </ol>
        </div>
    </div><!-- Page Banner /- -->
    <div class="section-padding"></div>
    <!-- Services Section -->
    <div id="services-section" class="services-section container-fluid no-padding">
        <div class="container">
            <!-- Section Header -->
            <div class="section-header">
                <h3>Layanan Kami</h3>
                <p>Beberapa layanan kami yang dapat anda nikmati <br> dijamin anda akan senang dengan layanan di hotel kami berikut beberapa diantaranya sebagai berikut:</p>
            </div><!-- Section Header /- -->
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6 srv-left animated fadeInLeft">
                    <?php foreach ($limit3 as $v_limit3) : ?>
                        <div class="srv-box">
                            <i class="<?= check_icon($v_limit3->icon_id)->row()->nama_icon; ?>"></i>
                            <h4><?= $v_limit3->nama_fasilitas; ?></h4>
                        </div>
                    <?php endforeach; ?>
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6 srv-img animated zoomIn text-center">
                    <img src="<?= base_url('images/konfigurasi/service.png') ?>" alt="Services">
                </div>
                <div class="col-md-4 col-sm-6 col-xs-6 srv-right animated fadeInRight">
                    <?php foreach ($limit6 as $v_limit6) : ?>
                        <div class="srv-box">
                            <i class="<?= check_icon($v_limit6->icon_id)->row()->nama_icon; ?>"></i>
                            <h4><?= $v_limit6->nama_fasilitas; ?></h4>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div><!-- Services Section /- -->
    <div class="section-padding"></div>

    <!-- Room Section -->
    <div id="room-section" class="room-section container-fluid no-padding">
        <div class="section-padding"></div>
        <!-- Container -->
        <div class="container">
            <div id="room-carousel" class="carousel slide" data-ride="carousel">
                <div class="carousel-inner" role="listbox">
                    <?php foreach ($kamar as $index => $v_kamar) :
                        if (isset(checkGambarKamar($v_kamar->id_kamar)->gambar_kamar)) :
                    ?>
                            <div class="item <?= $index == 0 ? 'active' : '' ?>">
                                <div class="col-md-6 no-padding room-img">
                                    <img src="<?= base_url('images/gambarkamar/' . checkGambarKamar($v_kamar->id_kamar)->gambar_kamar) ?>" alt="Room" width="100%;">
                                </div>
                                <div class="col-md-6 no-padding room-detail">
                                    <h4><?= $v_kamar->nama_kamar ?></h4>
                                    <div class="room-facility">
                                        <?php $fasilitas = checkFasilitas($v_kamar->id_kamar);
                                        if ($fasilitas != null) {
                                            foreach ($fasilitas as $v_fasilitas) { ?>
                                                <div class="facility-box">
                                                    <i class="<?= check_icon($v_fasilitas->icon_id)->row()->nama_icon ?>"></i>
                                                    <h5> <span><?= $v_fasilitas->nama_fasilitas ?></span></h5>
                                                </div>
                                            <?php
                                            }
                                            ?>

                                        <?php
                                        }
                                        ?>
                                    </div>
                                    <p><?= wordText($v_kamar->keterangan, 200) ?></p>
                                    <a class="read-more" title="Read More" href="<?= base_url('Front/Kamar/detail/' . $v_kamar->id_kamar) ?>">Read More <i class="fa fa-long-arrow-right"></i></a>
                                </div>
                            </div>
                        <?php endif; ?>
                    <?php endforeach; ?>
                </div>
                <!-- Controls -->
                <div class="carousel-contorls" style="left: 10px; top: 60px;">
                    <a class="left carousel-control" href="#room-carousel" role="button" data-slide="prev">
                        <span class="fa fa-angle-left" aria-hidden="true"></span>
                    </a>
                    <div class="num">1 / 6</div>
                    <a class="right carousel-control" href="#room-carousel" role="button" data-slide="next">
                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div><!-- Container /- -->
        <div class="section-padding"></div>
    </div><!-- Room Section /- -->

    <!-- Video Section -->
    <div id="video-section" class="video-section container-fluid no-padding" style="height: 500px;">
        <img src="<?= base_url('images/konfigurasi/' . $konfiurasi->gambar_sistem) ?>" alt="Video">
        <div class="video-link">
            <a href="<?= $konfiurasi->link_yt; ?>" class="popup-youtube" title="video">Watch our Video Tour</a>
        </div>
    </div><!-- Video Section /- -->

</main>