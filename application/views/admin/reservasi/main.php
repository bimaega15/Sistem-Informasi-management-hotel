<div class="page-content">
    <div class="page-info">
        <?= $breadcrumbs; ?>
        <div class="page-options">
            <button type="button" class="btn btn-primary"><?= $title; ?></button>
        </div>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col">
                <div class="card">
                    <?php $this->view('session'); ?>
                    <div class="card-body">
                        <h5 class="card-title">Data Reservasi</h5>
                        <div class="table-responsive mt-3">
                            <table id="zero-conf" class="display" style="width:100%">
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
                                                    <li>No. HP: <br> <span class=""><?= $v_result->no_hp; ?></span> </li>
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
                                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cog"></i> Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a target="_blank" class="dropdown-item" href="<?= base_url('Front/Riwayat/detail/' . $v_result->id_reservasi . '?account=admin') ?>">Detail</a>
                                                    <a target="_blank" class="dropdown-item" href="<?= base_url('Front/Riwayat/delete/' . $v_result->id_reservasi) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>

                                                    <?php if ($v_result->status == 'menunggu konfirmasi') : ?>
                                                        <li><a class="btn-konfirmasi-pembayaran dropdown-item" data-id_pembayaran="<?= $v_result->id_pembayaran; ?>" data-id_reservasi="<?= $v_result->id_reservasi; ?>" data-toggle='modal' data-target='#modalPembayaranKonfirmasi' href="#">Konfirmasi Pembayaran</a></li>
                                                    <?php endif; ?>
                                                    <?php if ($v_result->status == 'konfirmasi' &&  checkStatusKamar($v_result->status_kamar_id)->nama_status_kamar != 'Check In') : ?>
                                                        <li><a class="dropdown-item" onclick="return confirm('Apakah sudah saatnya check in ?')" href="<?= base_url('Admin/Reservasi/checkIn/' . $v_result->id_reservasi) ?>">Check in</a></li>
                                                    <?php endif; ?>
                                                    <?php if (checkStatusKamar($v_result->status_kamar_id)->nama_status_kamar == 'Check In') : ?>
                                                        <li><a class="dropdown-item" onclick="return confirm('Apakah sudah saatnya check out ?')" href="<?= base_url('Admin/Reservasi/checkOut/' . $v_result->id_reservasi) ?>">Check Out</a></li>
                                                    <?php endif; ?>
                                                </div>

                                                <a href="<?= base_url('Cetak/invoice/' . $v_result->id_reservasi) ?>" class="btn btn-danger btn-sm">
                                                    <i class="fas fa-file-pdf"></i> Cetak Invoice
                                                </a>
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
</div>