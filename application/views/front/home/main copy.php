<main class="site-main page-spacing">
    <!-- Slider Section -->
    <div id="slider-section" class="slider-section container-fluid no-padding">
        <div id="photo-slider" class="carousel slide" data-ride="carousel">
            <!-- Wrapper for slides -->
            <div class="carousel-inner" role="listbox">
                <?php
                if ($slider != null) :
                    foreach ($slider as $index => $v_slider) : ?>

                        <div class="item <?= $index == 0 ? 'active' : '' ?>">
                            <img style="width: 100%;" src="<?= base_url('images/gambarkamar/' . $v_slider->gambar_kamar) ?>" alt="Slide" />
                            <div class="carousel-caption">
                                <h2 data-animation="animated fadeInDown">
                                    <?php $s_kamar = checkKamar($v_slider->kamar_id)->nama_kamar;
                                    echo $s_kamar;
                                    ?>
                                </h2>
                                <h6 data-animation="animated bounceIn"><span class="left-sep"></span>
                                    <?php
                                    $keterangan = checkKamar($v_slider->kamar_id)->keterangan;
                                    $v_keterangan = wordTextSlider($keterangan, 100, base_url('Front/Kamar/detail/' . $v_slider->kamar_id));
                                    echo $v_keterangan;
                                    ?>
                                    <span class="right-sep"></span>
                                </h6>
                            </div>
                        </div>
                <?php
                    endforeach;
                endif;
                ?>
            </div>
            <!-- Controls -->
            <a class="left carousel-control" href="#photo-slider" role="button" data-slide="prev">
                <span class="fa fa-angle-left" aria-hidden="true"></span>
            </a>
            <a class="right carousel-control" href="#photo-slider" role="button" data-slide="next">
                <span class="fa fa-angle-right" aria-hidden="true"></span>
            </a>
        </div>
        <!-- <p class="goto-next"><a href="#" title="Go to Next" class="bounce"><img src="<?= base_url('asset/HTML/') ?>images/slider/go-to-next.png" alt="Go To Next" /></a></p> -->
    </div><!-- Slider Section /- -->

    <!-- container -->
    <div class="container">
        <div class="booking-form container-fluid">
            <div class="col-md-2 col-sm-12 col-xs-12">
                <h4>book your<span>rooms</span></h4>
            </div>
            <form class="col-md-10 col-sm-12 col-xs-12" method="get" action="<?= base_url('Front/Kamar') ?>">
                <div class="form-group">
                    <i class="fa fa-calendar-minus-o"></i>
                    <input name="dari_tanggal" type="text" class="form-control" id="datepicker1" placeholder="ARRIVAL DATE" />
                </div>
                <div class="form-group">
                    <i class="fa fa-calendar-minus-o"></i>
                    <input name="sampai_tanggal" type="text" class="form-control" id="datepicker2" placeholder="DEPARTURE DATE" />
                </div>
                <div class="form-group">
                    <select class="selectpicker" name="berapa_kamar">
                        <option value="">- BERAPA KAMAR -</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="form-group">
                    <select class="selectpicker">
                        <option value="">- BERAPA ORANG -</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                    </select>
                </div>
                <div class="form-group">
                    <input type="submit" value="book now" title="Book Now" />
                </div>
            </form>
        </div>
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

    <!-- Offer Section -->
    <div class="container-fluid offer-section no-padding">
        <!-- container -->
        <div class="container">
            <!-- Section Header -->
            <div class="section-header">
                <h3>Penawaran Kami</h3>
                <p>Berikut daftar hotel penawaran yang kami sediakan untuk anda</p>
            </div><!-- Section Header /- -->
            <div class="offer-list">
                <?php foreach ($penawaran as $index => $v_penawaran) : ?>
                    <div class="offer-box <?= $index == 0 ? 'tall' : ($index == 1 ? 'wide' : ($index == 2 ? 'wide' : 'full')) ?>">
                        <img style="
                        <?php
                        if ($index == 0) {
                            echo 'width:385px; height:600px;';
                        }
                        if ($index == 1) {
                            echo 'width:775px; height:295px;';
                        }
                        if ($index == 2) {
                            echo 'width:775px; height:295px;';
                        }
                        if ($index == 3) {
                            echo 'width:1170px; height:300px;';
                        }
                        ?>
                        " src="<?= base_url('images/gambarkamar/' . checkGambarKamar($v_penawaran->id_kamar)->gambar_kamar) ?>" alt="Offer" />
                        <div class="offer-detail">
                            <h3><?= $v_penawaran->nama_kamar ?> &amp; <span><?= $v_penawaran->nama_tipe_kamar; ?></span></h3>
                            <div class="price-detail">
                                <h4>starts from - <span>Rp. <?= rupiah($v_penawaran->harga) ?><sup></sup></span></h4>
                                <a class="read-more" title="book now" href="<?= base_url('Front/Kamar/detail/' . $v_penawaran->id_kamar) ?>">book now <i class="fa fa-long-arrow-right"></i></a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div><!-- container /- -->
    </div><!-- Offer Section /- -->
    <div class="section-padding"></div>

    <!-- Recommended Section -->
    <div id="recommended-section" class="recommended-section container-fluid no-padding">
        <!-- Container -->
        <div class="container">
            <div class="section-header">
                <h3>Rekomendasi Hotel</h3>
                <p>Daftar hotel yang kami rekomendasikan untuk anda.<br> Lihat beberapa daftar hotel yang kami sediakan untuk anda</p>
            </div>
            <div class="recommended-detail">
                <?php foreach ($rekomendasi as $v_rekomendasi) :
                    if (isset(checkGambarKamar($v_rekomendasi->id_kamar)->gambar_kamar)) { ?>
                        <div class="col-md-6 col-sm-12 col-xs-12 no-padding hotel-detail">
                            <div class="col-md-6 col-sm-6 col-xs-6 no-padding hotel-img-box">
                                <img src="<?= base_url('images/gambarkamar/' . checkGambarKamar($v_rekomendasi->id_kamar)->gambar_kamar) ?>" alt="Recommended" style="height: 267px;" />
                                <span><a href="<?= base_url('Front/Kamar/detail/' . $v_rekomendasi->id_kamar) ?>" title="Book Now">Book Now</a></span>
                            </div>
                            <div class="col-md-6 col-sm-6 col-xs-6 hotel-detail-box">
                                <h4><?= $v_rekomendasi->nama_kamar; ?></h4>
                                <p><?= wordText($v_rekomendasi->keterangan, 100); ?></p>
                                <h6 style="font-size:20px;"><b>Rp. <?= rupiah($v_rekomendasi->harga); ?></b></h6>
                                <br><br><br>
                                <p>1 Orang Per Malam</p>
                                <span>

                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star-half-o"></i>
                                </span>
                            </div>
                        </div>
                    <?php
                    }
                    ?>

                <?php endforeach; ?>
                <div class="col-lg-12 text-center">
                    <a href="<?= base_url('Front/Kamar') ?>" title="View More Hotels" class="read-more">Lihat Detail Kamar<i class="fa fa-long-arrow-right"></i></a>
                </div>
            </div>
        </div><!-- Container /- -->
        <div class="section-padding"></div>
    </div><!-- Recommended Section /- -->

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
                                    <img src="<?= base_url('images/gambarkamar/' . checkGambarKamar($v_kamar->id_kamar)->gambar_kamar) ?>" alt="Room">
                                </div>
                                <div class="col-md-6 no-padding room-detail">
                                    <h4><?= $v_kamar->nama_kamar ?></h4>
                                    <div class="room-facility">
                                        <?php $fasilitas = checkFasilitas($v_kamar->id_kamar);
                                        if ($fasilitas != null) {
                                            foreach ($fasilitas as $v_fasilitas) { ?>
                                                <div class="facility-box">
                                                    <i class="<?= check_icon($v_fasilitas->icon_id)->row()->nama_icon; ?>"></i>
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
                <div class="carousel-contorls">
                    <a class="left carousel-control" href="#room-carousel" role="button" data-slide="prev">
                        <span class="fa fa-angle-left" aria-hidden="true"></span>
                    </a>
                    <div class="num"></div>
                    <a class="right carousel-control" href="#room-carousel" role="button" data-slide="next">
                        <span class="fa fa-angle-right" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div><!-- Container /- -->
        <div class="section-padding"></div>
    </div><!-- Room Section /- -->
    <div class="section-padding"></div>

    <!-- Testimonial Section -->
    <div id="testimonial-section" class="testimonial-section container-fluid no-padding">
        <!-- section Header -->
        <div class="section-header">
            <h3>Client yang kami katakan</h3>
        </div><!-- section Header /- -->
        <!-- Container -->
        <div class="container">
            <div class="col-md-1"></div>
            <div class="col-md-10 col-sm-12 col-xs-12">
                <div id="testimonial-carousel" class="carousel slide" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php foreach ($client as $index => $v_client) : ?>
                            <div class="item <?= $index == 0 ? 'active' : '' ?>">
                                <span>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                    <i class="fa fa-star-o"></i>
                                </span>
                                <p> <?= wordTextClient($v_client->keterangan, 350, base_url('Home/keteranganClient/' . $v_client->id_client)); ?></p>
                                <img src="<?= base_url('images/client/' . $v_client->gambar_client) ?>" alt="Testi" style="height:120px;" />
                                <h4><?= $v_client->nama_client; ?></h4>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Indicators -->
                    <ol class="carousel-indicators">
                        <li data-target="#testimonial-carousel" data-slide-to="0" class="active"></li>
                        <li data-target="#testimonial-carousel" data-slide-to="1"></li>
                        <li data-target="#testimonial-carousel" data-slide-to="2"></li>
                    </ol>

                    <!-- Controls -->
                    <a class="left carousel-control" href="#testimonial-carousel" role="button" data-slide="prev">
                        <i class="arrow_carrot-left"></i>
                    </a>
                    <a class="right carousel-control" href="#testimonial-carousel" role="button" data-slide="next">
                        <i class="arrow_carrot-right"></i>
                    </a>
                </div>
            </div>
            <div class="col-md-1"></div>
        </div><!-- Container /- -->
        <div class="section-padding"></div>
    </div><!-- Testimonial Section /- -->


</main>