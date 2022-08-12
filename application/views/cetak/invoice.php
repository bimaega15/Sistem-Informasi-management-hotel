<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice Pembayaran</title>

    <style>
        #account_tamu ul li {
            display: inline;
        }

        #invoice_table table {
            width: 100%;
            border-collapse: collapse;
        }

        #invoice_table td,
        th {
            padding: 5px;
            border: 1px solid #4D4C7D;
        }
    </style>
</head>

<body>
    <div style="position: relative; height: 150px;">
        <div id="gambar_konfigurasi" style="float: left; margin-right:15px;">
            <img src="<?= base_url('images/konfigurasi/' . $konfigurasi->gambar_sistem) ?>" alt="Gambar aplikasi" width="150px;" style="border-radius: 5px;">
        </div>
        <div id="konfigurasi_sistem" style="float: left;">
            <strong>
                <?= $konfigurasi->nama_sistem; ?>
            </strong><br>
            <span><?= $konfigurasi->alamat; ?></span><br>
            <span>Telp: <?= $konfigurasi->no_telepon; ?></span><br>
            <span>Email: <?= $konfigurasi->email; ?></span>
        </div>
        <div id="keterangan" style="float: left; margin-top: 60px; margin-left: 90px;">
            <h1 style="letter-spacing: 10px;">INVOICE</h1>
        </div>
        <div style="margin-top: 130px; width: 100%;">
            <p style="border-bottom: 3px solid #4D4C7D;"></p>
        </div>
    </div>
    <div style="position: relative; height: 125px;">
        <strong>Kepada Yth:</strong><br>
        <div id="account_tamu" style="float: left;">
            <table>
                <tr>
                    <td style="font-weight: bold; width: 80px;">Nama</td>
                    <td><?= ucfirst($tamu->nama); ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold; width: 80px;">No. Telp</td>
                    <td><?= ucfirst($tamu->no_hp); ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold; width: 80px;">Alamat</td>
                    <td><?= ucfirst($tamu->alamat); ?></td>
                </tr>
            </table>
        </div>
        <div id="account_pembayaran" style="float: left; margin-left: 250px;">
            <table>
                <tr>
                    <td style="font-weight: bold; width: 120px;">Tanggal</td>
                    <td><?= ucfirst($tanggal_pesan); ?></td>
                </tr>
                <tr>
                    <td style="font-weight: bold; width: 120px;">Pembayaran</td>
                    <td>
                        <?= $status_pembayaran; ?>
                    </td>
                </tr>
            </table>
        </div>
    </div>
    <?php
    $statusOrderan = $pembayaran->status_orderan;
    if ($statusOrderan == 'dibayar') {
        $message = 'Pemesanan anda telah dikonfirmasi';
        $color = 'green';
    }
    if ($statusOrderan == 'menunggu') {
        $message = 'Menunggu pesanan';
        $color = 'yellow';
    }
    if ($statusOrderan == 'belum dibayar') {
        $message = 'Pesanan anda belum dibayar';
        $color = 'yellow';
    }
    if ($statusOrderan == 'ditolak') {
        $message = 'Pesanan anda ditolak';
        $color = 'red';
    }
    ?>
    <div style="position: relative; height: 150px;" id="invoice_table">
        <div style="position: relative;">
            <div>
                <h3 style="text-transform: capitalize; margin: 0; padding-top: 0; color: <?= $color; ?>;">Pembayaran <?= $pembayaran->status_orderan ?>
                </h3>
                <span><?= $message; ?></span>
            </div>
            <div style="position: relative;">
                <span style="position: absolute; top:-40px; right:250px; text-align:center;">
                    Check in<br>
                    <?= get_tanggal_indo($reservasi->check_in); ?>
                </span><br>
                <small style="position: absolute; top:-40px; right:140px; text-align:center; font-size:12px;">
                    <br>
                    <?= $pesan_per_malam; ?> Malam
                </small><br>
                <span style="position: absolute; top:-40px; right:0; text-align:center;">
                    Check Out<br>
                    <?= get_tanggal_indo($reservasi->check_out); ?>
                </span><br>
            </div>
        </div>
        <div style="margin-top: -50px;">
            <table>
                <thead>
                    <tr>
                        <th>Kamar</th>
                        <th>Jumlah</th>
                        <th>Tanggal</th>
                        <th>Total</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td style="padding: 50px 5px;">
                            <span>
                                <?= $kamar->nama_kamar; ?> No. <?= $kamar->no_kamar; ?>
                            </span><br>
                            <span>
                                Tipe: <?= check_tipe_kamar($kamar->tipe_kamar_id)->row()->nama_tipe_kamar; ?>
                            </span><br>
                            <span>
                                Pesan: <?= $pesan_per_malam; ?> Malam
                            </span><br>
                        </td>
                        <td style="padding: 50px 5px;">
                            <span>
                                Dewasa: <?= $kamar->dewasa; ?>
                            </span><br>
                            <span>
                                Anak: <?= $kamar->anak; ?>
                            </span>
                        </td>
                        <td style="padding: 50px 5px;">
                            <span>
                                Check in: <?= get_tanggal_indo($reservasi->check_in); ?>
                            </span><br>
                            <span>
                                Check out: <?= get_tanggal_indo($reservasi->check_out); ?>
                            </span>
                        </td>
                        <td style="padding: 50px 5px;">
                            <div style="letter-spacing: 2px; text-align:center;">
                                <span>
                                    Rp. <?= number_format($pembayaran->total_bayar, 0); ?>
                                </span>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div style="position: relative; height: 150px; margin-top:110px;">
        <div>
            <h3 style="color: #413F42;">Terbilang: <br> <span style="text-transform: capitalize;">
                    <?= terbilang($pembayaran->total_bayar); ?> Rupiah
                </span>
            </h3>
        </div>
        <div style="position: absolute; right:50px; top: 30px;">
            ............., <?= date('d-m-Y') ?>
            <div style="position: absolute; top:100px; left: 0;">
                <strong><?= $konfigurasi->nama_sistem ?></strong>
            </div>
        </div>
    </div>
</body>

</html>