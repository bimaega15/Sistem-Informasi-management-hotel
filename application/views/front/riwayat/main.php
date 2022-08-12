<main class="site-main page-spacing">
    <!-- Page Banner -->
    <div class="container-fluid page-banner about-banner">
        <div class="container">
            <h3>Riwayat Transaksi</h3>
            <ol class="breadcrumb">
                <li><a href="index.html">Home</a></li>
                <li class="active">Riwayat</li>
            </ol>
        </div>
    </div><!-- Page Banner /- -->
    <div class="section-padding"></div>
    <!-- riwayat Section -->
    <div id="riwayat-section" class="riwayat-section container-fluid no-padding">
        <div class="container">
            <!-- Section Header -->
            <div class="section-header">
                <h3>Riwayat Transaksi</h3>
                <p>Daftar riwayat transaksi<br> Berikut merupakan data riwayat transaksi anda: </b></p>
            </div><!-- Section Header /- -->
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12 srv-left animated fadeInLeft">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><i class="fas fa-note-list"></i> Riwayat Transaksi</div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="DataTable">
                                    <thead>
                                        <tr>
                                            <th width="5%;">No.</th>
                                            <th width="15%;">Reservasi</th>
                                            <th width="20%;">Tamu</th>
                                            <th width="20%;">Kamar</th>
                                            <th width="10%;" class="text-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $no = 1;
                                        foreach ($result as $v_result) : ?>
                                            <tr>
                                                <td><?= $no++; ?></td>
                                                <td>
                                                    <ul class="list-form">
                                                        <li>Tanggal: <br> <span class=""><?= $v_result->tanggal; ?></span> </li>
                                                        <li style="text-align: center;">
                                                            <?= btnDetailName(base_url('Front/Riwayat/detailReservasi/' . $v_result->id_reservasi), 'modalDetailReservasi', 'btn-detail-reservasi') ?>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>

                                                    <ul class="list-form">
                                                        <li>Nama: <br> <span class=""><?= $v_result->nama_depan; ?> <?= $v_result->nama_belakang; ?></span> </li>
                                                        <li>No. HP <br> <span class=""><?= $v_result->no_hp; ?></span> </li>
                                                        <li style="text-align: center;">
                                                            <?= btnDetailName(base_url('Front/Riwayat/detailTamu/' . $v_result->id_pembayaran), 'modalDetailTamu', 'btn-detail-pembayaran') ?>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <ul class="list-form">
                                                        <li>Kamar: <br> <span class=""><?= $v_result->nama_kamar; ?> </li>
                                                        <li style="text-align: center;">
                                                            <?= btnDetailName(base_url('Front/Riwayat/detailKamar/' . $v_result->id_kamar), 'modaldetailKamar', 'btn-detail-kamar') ?>
                                                        </li>
                                                    </ul>
                                                </td>
                                                <td>
                                                    <div class="text-center">
                                                        <div class="dropdown">
                                                            <button id="dLabel" class="btn btn-primary btn-sm" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                                <i class="fas fa-cog"></i> Action
                                                                <span class="caret"></span>
                                                            </button>
                                                            <ul class="dropdown-menu" id="menu1" aria-labelledby="drop4">
                                                                <li><a href="<?= base_url('Front/Riwayat/detail/' . $v_result->id_reservasi) ?>">Detail</a></li>
                                                                <li><a onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?= base_url('Front/Riwayat/delete/' . $v_result->id_reservasi) ?>">Delete </a> </li>
                                                                <?php if ($v_result->status == 'menunggu') : ?>
                                                                    <li><a class="btn-upload-pembayaran" data-id_pembayaran="<?= $v_result->id_pembayaran; ?>" data-id_reservasi="<?= $v_result->id_reservasi; ?>" data-toggle='modal' data-target='#modalPembayaran' href="#">Upload Pembayaran</a></li>
                                                                <?php endif; ?>

                                                            </ul>
                                                        </div>
                                                        <a href="<?= base_url('Cetak/invoice/' . $v_result->id_reservasi) ?>" class="btn btn-danger btn-sm">
                                                            <i class="fas fa-file-pdf"></i> Cetak Invoice
                                                        </a>
                                                    </div>

                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Profile Section /- -->
</main>