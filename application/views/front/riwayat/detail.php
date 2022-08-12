<?php
$tgl1 = new DateTime(date('d-m-Y'));
$tgl2 = new DateTime(date('d-m-Y', strtotime('+1 days', strtotime(date('d-m-Y')))));
$d = $tgl2->diff($tgl1)->days;
if ($this->session->has_userdata('tamu_id')) {
    $tamu_id = $this->session->userdata('tamu_id');
} else {
    $tamu_id = null;
}
$status_kamar = checkStatusKamar($result->status_kamar_id)->nama_status_kamar;

?>
<main class="site-main page-spacing">
    <!-- Page Banner -->
    <div class="container-fluid page-banner about-banner">
        <div class="container">
            <h3>Detail Riwayat Transaksi</h3>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('') ?>">Home</a></li>
                <?php if ($account == null) : ?>
                    <li><a href="<?= base_url('Front/Riwayat') ?>">Riwayat Transaksi</a></li>
                    <li class="active">Detail Riwayat Transaksi</li>
                <?php endif; ?>
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
                                <img src="<?= base_url('images/gambarkamar/' . $r_gambar_slider->gambar_kamar) ?>" alt="Slide">
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
                    <h3>Data Reservasi</h3>
                    <div class="row">
                        <div class="col-lg-12">
                            <h3>Konfirmasi Pembayaran : <?= $result->konfirmasi_pembayaran ?></h3>
                        </div>
                        <div class="col-lg-6">
                            <table class="table">
                                <tr>
                                    <td>Check In</td>
                                    <td>:</td>
                                    <td><?= $result->check_in ?></td>
                                </tr>
                                <tr>
                                    <td>Dewasa</td>
                                    <td>:</td>
                                    <td><?= $kamar->dewasa ?></td>
                                </tr>
                                <tr>
                                    <td>Nama depan</td>
                                    <td>:</td>
                                    <td><?= $result->nama_depan ?></td>
                                </tr>
                                <tr>
                                    <td>Email</td>
                                    <td>:</td>
                                    <td><?= $result->email ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat 1</td>
                                    <td>:</td>
                                    <td><?= $result->alamat_1 ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-6">
                            <table class="table">
                                <tr>
                                    <td>Check Out</td>
                                    <td>:</td>
                                    <td><?= $result->check_out ?></td>
                                </tr>
                                <tr>
                                    <td>Anak</td>
                                    <td>:</td>
                                    <td><?= $kamar->anak ?></td>
                                </tr>
                                <tr>
                                    <td>Nama depan</td>
                                    <td>:</td>
                                    <td><?= $result->nama_belakang ?></td>
                                </tr>
                                <tr>
                                    <td>No. Handphone</td>
                                    <td>:</td>
                                    <td><?= $result->no_hp ?></td>
                                </tr>
                                <tr>
                                    <td>Alamat 2</td>
                                    <td>:</td>
                                    <td><?= $result->alamat_2 ?></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-lg-12">
                            <table class="table">
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td><?= $result->keterangan; ?></td>
                                </tr>
                                <tr>
                                    <td>Pesan / Malam</td>
                                    <td>:</td>
                                    <td><?= $pesan_per_malam; ?></td>
                                </tr>
                                <tr>
                                    <td>Total pembayaran</td>
                                    <td>:</td>
                                    <td><?= number_format($pembayaran->total_bayar, 0); ?></td>
                                </tr>
                                <tr>
                                    <td>Status Reservasi</td>
                                    <td>:</td>
                                    <td><span class="badge <?= $result->status == 'menunggu' ? 'badge-primary' : ($result->status == 'menunggu konfirmasi' ? 'badge-warning' : ($result->status == 'konfirmasi' ? 'badge-success' : ($result->status == 'check out' ? 'badge-success' : 'badge-danger')))  ?>"><?= ucwords($result->status); ?></span></td>
                                </tr>

                                <tr>
                                    <td>Status Kamar</td>
                                    <td>:</td>
                                    <td><span class="badge <?= $status_kamar == 'Tersedia' ? 'badge-info' : ($status_kamar == 'Booking' ? 'badge-primary' : ($status_kamar == 'Check In' ? 'badge-success' : 'badge-danger'))  ?>"><?= ucwords($status_kamar); ?></span></td>
                                </tr>
                                <tr>
                                    <td>Status Pembayaran</td>
                                    <td>:</td>
                                    <td><span class="badge <?= $result->status_orderan == 'belum dibayar' ? 'badge-warning' : ($result->status_orderan == 'menunggu' ? 'badge-info' : ($result->status_orderan == 'dibayar' ? 'badge-success' : 'badge-danger'))  ?>"><?= ucwords($result->status_orderan); ?></span></td>
                                </tr>
                                <?php if ($result->bayar_ditempat == null) : ?>
                                    <tr>
                                        <td>Pembayaran</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            if ($result->bukti_transfer == null) {
                                                echo '<span class="badge badge-warning">Belum upload pembayaran</span>';
                                            } else { ?>
                                                <a href="<?= base_url('images/pembayaran/' . $result->bukti_transfer) ?>" target="_blank">
                                                    <img src="<?= base_url('images/pembayaran/' . $result->bukti_transfer) ?>" alt="" width="50%;">
                                                </a>
                                            <?php

                                            }
                                            ?>
                                        </td>
                                    </tr>
                                <?php else : ?>
                                    <tr>
                                        <td>Bayar ditempat</td>
                                        <td>:</td>
                                        <td>
                                            <?php
                                            echo '<span class="badge badge-success">
                                            <i class="fa fa-check-circle"></i>
                                            </span>';
                                            ?>
                                        </td>
                                    </tr>
                                <?php endif; ?>
                                <?php if ($rekening != null) : ?>
                                    <tr>
                                        <td>No. Rekening</td>
                                        <td>:</td>
                                        <td><?= $rekening->no_rekening ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Bank</td>
                                        <td>:</td>
                                        <td><?= $rekening->nama_bank ?></td>
                                    </tr>
                                    <tr>
                                        <td>Nama Rekening</td>
                                        <td>:</td>
                                        <td><?= $rekening->nama_rekening ?></td>
                                    </tr>
                                    <tr>
                                        <td>Gambar Bank</td>
                                        <td>:</td>
                                        <td>
                                            <a href="<?= base_url('images/rekening/' . $rekening->gambar_bank) ?>" target="_blank">
                                                <img src="<?= base_url('images/rekening/' . $rekening->gambar_bank) ?>" width="50%;" alt="">
                                            </a>

                                        </td>
                                    </tr>
                                <?php endif; ?>
                            </table>
                        </div>
                        <?php if ($account == null) : ?>

                            <div class="col-lg-12">
                                <a href="<?= base_url('Front/Riwayat') ?>" class="btn btn-primary"> <i class="fas fa-undo"></i> Data Riwayat Transaksi</a>
                            </div>
                        <?php endif; ?>
                    </div>
                </div><!-- Form /- -->
            </div><!-- Contenta Area /- -->
            <!-- Widget Area -->
            <div class="col-md-4 col-sm-4 col-xs-12 widget-area">
                <!-- Features Widget -->
                <aside class="widget widget_features">
                    <h3 class="widget-title">Layanan Kami</h3>
                    <p><?= $kamar->keterangan; ?></p>
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
                        <?php if (checkGambarKamar($kamar->id_kamar) != null) : ?>
                            <a href="<?= base_url('images/gambarkamar/' . checkGambarKamar($kamar->id_kamar)->gambar_kamar) ?>" target="_blank">
                                <img width="30%;" src="<?= base_url('images/gambarkamar/' . checkGambarKamar($kamar->id_kamar)->gambar_kamar) ?>" alt="<?= checkGambarKamar($kamar->id_kamar)->gambar_kamar ?>" />
                            </a>
                        <?php endif; ?>
                        <h4><?= $kamar->nama_kamar ?> <b>Rp. <strong class="total_html"><?= rupiah($kamar->harga); ?></strong> </b> <span style="display: inline-block;" class="ket_malam"> Per malam</span></h4>
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
                            <h4>adults <span><?= $kamar->dewasa; ?> ORANG</span></h4>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>children <span><?= $kamar->anak; ?> ORANG</span></h4>
                        </div>
                    </div>
                    <div class="single-room-detail">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>malam <span id="per_malam"><?= $d; ?></span></h4>
                        </div>
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>Tipe Kamar <span><?= checkTipeKamar($kamar->tipe_kamar_id)->nama_tipe_kamar; ?></span></h4>
                        </div>
                    </div>
                    <div class="single-room-detail">
                        <div class="col-md-6 col-sm-6 col-xs-6">
                            <h4>TOTAL HARGA <span> Rp. <?= rupiah($kamar->harga); ?> </span></h4>
                        </div>
                    </div>
                </aside>
                <!-- Room Detail Widget /- -->
            </div><!-- Widget Area /- -->
        </div>
    </div><!-- Container /- -->

    <div class="section-padding"></div>
</main>