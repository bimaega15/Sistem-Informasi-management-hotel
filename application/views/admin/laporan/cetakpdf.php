<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title; ?></title>
    <style>
        .text-center {
            text-align: center;
        }

        table.table {
            width: 100%;
        }

        table,
        td,
        th {
            border: 1px solid #7171efed;
            border-collapse: collapse;
            padding: 5px;
            text-align: center;
        }

        .bg-info {
            background: #7171efed;
        }

        .text-white {
            color: #fff;
        }

        .list-form {
            padding: 0;
            margin: 0;
            list-style: none;
        }

        .text-justify {
            text-align: justify !important;
        }

        .img-thumb {
            position: absolute;
            top: 0;
            left: 0;
            height: 80px;
        }

        .footer {
            position: fixed;
            bottom: 10px;
            text-align: center;
        }
    </style>
</head>

<body>
    <img src="<?= base_url('images/konfigurasi/' . $konfigurasi->gambar_sistem) ?>" alt="" class="img-thumb">
    <?php if ($dari_tanggal != null && $sampai_tanggal != null) : ?>

        <h2 class="text-center">
            Laporan Dari Tanggal <br> <?= get_tanggal_indo($dari_tanggal); ?> Sampai Tanggal <?= get_tanggal_indo($sampai_tanggal); ?>
        </h2>
    <?php else : ?>
        <h2 class="text-center">
            Laporan Management Hotel
        </h2>
    <?php endif; ?>
    <div class="text-center">
        <small><?= $konfigurasi->alamat ?></small><br>
        <small><?= $konfigurasi->no_telepon ?> | <?= $konfigurasi->email ?></small>
    </div>
    <hr>
    <table class="table">
        <thead class="bg-info text-white">
            <tr>
                <th width="10%;">No.</th>
                <th>Reservasi</th>
                <th>Kamar</th>
                <th>ID Tamu</th>
                <th>Total Bayar</th>
            </tr>
        </thead>
        <tbody class="text-justify">
            <?php
            $no = 1;
            foreach ($result as $v_result) : ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td>
                        <ul class="list-form">
                            <li>Check In : <br><span class="pull-right"><?= $v_result->check_in; ?> </li>
                            <li>Check Out : <br><span class="pull-right"><?= $v_result->check_out; ?> </li>
                        </ul>

                    </td>
                    <td>
                        <ul class="list-form">
                            <li>Nama : <span class="pull-right"><?= $v_result->nama_kamar; ?> </li>
                            <li>No. : <span class="pull-right"><?= $v_result->no_kamar; ?> </li>
                            <li>Tipe : <span class="pull-right"><?= checkStatusTipeKamar($v_result->id_kamar)->nama_tipe_kamar; ?> </li>
                        </ul>

                    </td>
                    <td>
                        <ul class="list-form">
                            <li>Nama : <span class="pull-right"><?= $v_result->nama_depan; ?> <?= $v_result->nama_belakang; ?></li>
                            <li>No. HP : <span class="pull-right"><?= $v_result->no_hp; ?> </li>
                            <li>Email : <span class="pull-right"><?= $v_result->email; ?> </li>
                        </ul>
                    </td>
                    <td><?= rupiah($v_result->total_bayar) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="footer">
        <strong>Laporan Managment Hotel</strong><br>
        <small>Created By <?= $konfigurasi->copyright; ?></small>
    </div>
</body>

</html>