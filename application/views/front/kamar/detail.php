<?php
$tgl1 = new DateTime(date('d-m-Y'));
$tgl2 = new DateTime(date('d-m-Y', strtotime('+1 days', strtotime(date('d-m-Y')))));
$d = $tgl2->diff($tgl1)->days;
if ($this->session->has_userdata('tamu_id')) {
    $tamu_id = $this->session->userdata('tamu_id');
} else {
    $tamu_id = null;
}
?>
<main class="site-main page-spacing">
    <!-- Page Banner -->
    <div class="container-fluid page-banner about-banner">
        <div class="container">
            <h3>booking</h3>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('') ?>">Home</a></li>
                <li class="active">booking</li>
            </ol>
        </div>
    </div><!-- Page Banner /- -->

    <div class="section-padding"></div>

    <!-- Container -->
    <div class="container">
        <div class="row">
            <!-- Contenta Area -->
            <div class="col-md-8 col-sm-8 col-xs-12 content-area">
                <div id="booking-carousel" class="carousel slide booking-carousel" data-ride="carousel">
                    <!-- Wrapper for slides -->
                    <div class="carousel-inner" role="listbox">
                        <?php foreach ($gambar_slider as $index => $r_gambar_slider) : ?>
                            <div class="item <?= $index == 0 ? 'active' : '' ?>">
                                <img src="<?= base_url('images/gambarkamar/' . $r_gambar_slider->gambar_kamar) ?>" alt="Slide" width="100%;">
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- Controls -->
                    <a class="left carousel-control" href="#booking-carousel" role="button" data-slide="prev">
                        <span class="fa fa-caret-left" aria-hidden="true"></span>
                    </a>
                    <a class="right carousel-control" href="#booking-carousel" role="button" data-slide="next">
                        <span class="fa fa-caret-right" aria-hidden="true"></span>
                    </a>
                </div>

                <!-- Form -->
                <div class="booking-form2">
                    <h3>booking form</h3>
                    <form class="row" method="post" action="<?= base_url('Front/Kamar/order') ?>">
                        <input type="hidden" name="total" value="<?= $row->harga; ?>">
                        <input type="hidden" name="kamar_id" value="<?= $row->id_kamar; ?>">
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <i class="fa fa-calendar-minus-o"></i>
                            <input data-harga="<?= $row->harga; ?>" name="check_in" type="text" placeholder="Check In" id="datepicker1" class="form-control datepicker1" value="" />
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <i class="fa fa-calendar-minus-o"></i>
                            <input data-harga="<?= $row->harga; ?>" type="text" name="check_out" placeholder="Check out" id="datepicker2" class="form-control datepicker2" value="" />
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" placeholder="Dewasa <?= $row->dewasa ?> orang" value="<?= $row->dewasa ?>" class="form-control" readonly />
                            <small class="badge badge-info mt-2">Dewasa <?= $row->dewasa ?> orang</small>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" placeholder="Anak <?= $row->anak ?> orang" value="<?= $row->anak ?>" class="form-control" readonly />
                            <small class="badge badge-info mt-2">Anak <?= $row->anak ?> orang</small>
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input required type="text" name="nama_depan" placeholder="Nama Depan" class="form-control" />
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input required type="text" name="nama_belakang" placeholder="Nama Belakang" class="form-control" />
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input required type="email" name="email" placeholder="Email" class="form-control" />
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input required type="number" min="0" name="no_hp" placeholder="No.handphone" class="form-control" />
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="alamat_1" placeholder="Alamat 1" class="form-control" />
                        </div>
                        <div class="form-group col-md-6 col-sm-6 col-xs-12">
                            <input type="text" name="alamat_2" placeholder="Alamat 2" class="form-control" />
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <textarea placeholder="Keterangan" name="keterangan" class="form-control"></textarea>
                        </div>
                        <div class="form-group col-md-12 col-sm-12 col-xs-12">
                            <?php if ($tamu_id == null) : ?>
                                <button type="button" class="read-more" title="Book Now" data-toggle="modal" data-target="#modalLogin">Login Dahulu ! <i class="fas fa-sign-in-alt"></i></button>
                            <?php elseif (checkStatusKamar($row->status_kamar_id)->nama_status_kamar == 'Tersedia') : ?>
                                <button type="submit" class="read-more" title="Book Now">Book Now <i class="fas fa-arrow-right"></i></button>
                            <?php else : ?>
                                <span class="border border-primary cursor-pointer">Sudah ada yang pesan maaf :)</span>
                            <?php endif; ?>
                        </div>
                    </form>
                </div><!-- Form /- -->
            </div><!-- Contenta Area /- -->
            <!-- Widget Area -->
            <div class="col-md-4 col-sm-4 col-xs-12 widget-area">
                <!-- Features Widget -->
                <aside class="widget widget_features">
                    <h3 class="widget-title">Layanan Kami</h3>
                    <p><?= $row->keterangan; ?></p>
                    <ul>
                        <?php foreach ($fasilitas as $v_fasilitas) : ?>
                            <li><i class="<?= check_icon($v_fasilitas->icon_id)->row()->nama_icon; ?> text-primary mr-3"></i> <?= $v_fasilitas->nama_fasilitas; ?></li>
                        <?php endforeach; ?>
                    </ul>
                </aside><!-- Features Widget -->
                <!-- Room Detail Widget -->
                <aside class="widget widget_room">
                    <h3 class="widget-title">Selected Rooms</h3>
                    <div class="single-room">
                        <?php if (checkGambarKamar($row->id_kamar) != null) : ?>
                            <a href="<?= base_url('images/gambarkamar/' . checkGambarKamar($row->id_kamar)->gambar_kamar) ?>" target="_blank">
                                <img width="30%;" src="<?= base_url('images/gambarkamar/' . checkGambarKamar($row->id_kamar)->gambar_kamar) ?>" alt="<?= checkGambarKamar($row->id_kamar)->gambar_kamar ?>" />
                            </a>
                        <?php endif; ?>
                        <h4><?= $row->nama_kamar ?> <b>Rp. <strong class="total_html"><?= rupiah($row->harga); ?></strong> </b> <span style="display: inline-block;" class="ket_malam"> Per malam</span></h4>
                    </div>
                    <div class="single-room-detail">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>check in <span class="checkin_html"><?= date('d-m-Y') ?></span></h4>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>check Out <span class="checkout_html"><?= date('d-m-Y', strtotime('+1 days', strtotime(date('d-m-Y')))) ?></span></h4>
                        </div>
                    </div>
                    <div class="single-room-detail">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>adults <span><?= $row->dewasa; ?> ORANG</span></h4>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>children <span><?= $row->anak; ?> ORANG</span></h4>
                        </div>
                    </div>
                    <div class="single-room-detail">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>malam <span id="per_malam"><?= $d; ?></span></h4>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>Tipe Kamar <span><?= checkTipeKamar($row->tipe_kamar_id)->nama_tipe_kamar; ?></span></h4>
                        </div>
                    </div>
                    <div class="single-room-detail">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>TOTAL HARGA <span> Rp. <?= rupiah($row->harga); ?> </span></h4>
                        </div>
                    </div>
                </aside>
                <!-- Room Detail Widget /- -->
            </div><!-- Widget Area /- -->
        </div>
    </div><!-- Container /- -->

    <div class="section-padding"></div>
</main>