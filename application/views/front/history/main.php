<?php
$konfigurasi = getKonfigurasi();
?>
<style>
    iframe {
        width: 100%;
        height: 550px;
    }
</style>
<main class="site-main page-spacing">
    <!-- Page Banner -->
    <div class="container-fluid page-banner about-banner">
        <div class="container">
            <h3>History</h3>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('') ?>">Home</a></li>
                <li class="active">History</li>
            </ol>
        </div>
    </div><!-- Page Banner /- -->

    <!-- Container -->
    <div class="container">
        <div class="panel panel-primary mt-3">
            <div class="panel-heading text-center">Histori Transaksi</div>
            <div class="panel-body">
                <div class="row" style="padding: 20px 0px;">
                    <!-- Contact Content -->
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th width="10%;">No.</th>
                                        <th width="15%;">Reservasi</th>
                                        <th width="25%;">Tamu</th>
                                        <th width="25%;">Kamar</th>
                                        <th width="15%;" class="text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($result as $v_result) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <?= $v_result->tanggal; ?>
                                                <br>
                                                <?= btnDetailName(base_url('Front/History/detailReservasi/' . $v_result->id_reservasi), 'modalDetailReservasi', 'btn-detail-reservasi') ?>
                                            </td>
                                            <td>

                                                <ul class="list-form">
                                                    <li>Nama <span class="pull-right"><?= $v_result->nama_depan; ?> <?= $v_result->nama_belakang; ?></span> </li>
                                                    <li>No. HP <span class="pull-right"><?= $v_result->no_hp; ?></span> </li>
                                                    <li style="text-align: center;">
                                                        <?= btnDetailName(base_url('Front/History/detailTamu/' . $v_result->id_pembayaran), 'modalDetailTamu', 'btn-detail-pembayaran') ?>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="list-form">
                                                    <li>Kamar <span class="pull-right"><?= $v_result->nama_kamar; ?> </li>
                                                    <li style="text-align: center;">
                                                        <?= btnDetailName(base_url('Front/History/detailKamar/' . $v_result->id_kamar), 'modaldetailKamar', 'btn-detail-kamar') ?>
                                                    </li>
                                                </ul>
                                            </td>
                                            <td>
                                                <div class="dropdown text-center">
                                                    <button id="dLabel" class="btn btn-primary btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                        <i class="fas fa-cog"></i> Action
                                                        <span class="caret"></span>
                                                    </button>
                                                    <ul class="dropdown-menu" id="menu1" aria-labelledby="drop4">
                                                        <li><a href="<?= base_url('Front/History/detail/' . $v_result->id_reservasi) ?>">Detail</a></li>
                                                        <li><a onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?= base_url('Front/History/delete/' . $v_result->id_reservasi) ?>">Delete
                                                    </ul>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div><!-- Contact Content /- -->
                </div>
            </div>
        </div>

    </div><!-- Container /- -->

    <div class="section-padding"></div>
</main>