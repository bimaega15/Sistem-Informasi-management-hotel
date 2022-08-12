<?php
$konfigurasi = getKonfigurasi();
$urlGrafik = base_url('Admin/Home/dataGrafik');
checkTransaksi();
error_reporting(0);
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="<?= $konfigurasi->nama_sistem ?>">
    <meta name="keywords" content="management hotel, created by bima ega, aplikasi web hotel">
    <meta name="author" content="bima ega">
    <!-- The above 6 meta tags *must* come first in the head; any other head content must come *after* these tags -->

    <!-- Title -->
    <title><?= $title; ?></title>

    <!-- Styles -->
    <link href="https://fonts.googleapis.com/css?family=Lato:400,700,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,500,700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Material+Icons|Material+Icons+Outlined|Material+Icons+Two+Tone|Material+Icons+Round|Material+Icons+Sharp" rel="stylesheet">
    <link href="<?= base_url('asset/backend/theme/') ?>assets/plugins/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <!-- <link href="<?= base_url('asset/backend/theme/') ?>assets/plugins/font-awesome/css/all.min.css" rel="stylesheet"> -->
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link rel="shortcut icon" href="<?= base_url('images/konfigurasi/' . $konfigurasi->gambar_sistem) ?>">


    <!-- Theme Styles -->
    <link href="<?= base_url('asset/backend/theme/') ?>assets/css/connect.min.css" rel="stylesheet">
    <link href="<?= base_url('asset/backend/theme/') ?>assets/css/dark_theme.css" rel="stylesheet">
    <link href="<?= base_url('asset/backend/theme/') ?>assets/css/custom.css" rel="stylesheet">
    <link href="<?= base_url('asset/backend/theme/') ?>assets/plugins/DataTables/datatables.min.css" rel="stylesheet">
    <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
    <style>
        .list-form {
            list-style: none;
            margin: 0;
            padding: 0 10px;
            box-shadow: rgba(0, 0, 0, 0.8);
        }

        .list-form li {
            position: relative;
            padding: 10px 0px;
        }

        .list-form li::after {
            position: absolute;
            content: '';
            width: 100%;
            height: 1px;
            background-color: #615656d4;
            bottom: 0;
            left: 0;

        }

        .pull-right {
            float: right;
        }

        .d-none {
            display: none;
        }
    </style>
</head>

<body>
    <div class='loader'>
        <div class='spinner-grow text-primary' role='status'>
            <span class='sr-only'>Loading...</span>
        </div>
    </div>
    <div class="connect-container align-content-stretch d-flex flex-wrap">
        <?= $sidebar; ?>

        <div class="page-container">
            <?= $topbar; ?>
            <?= $content; ?>
            <?= $footer; ?>
        </div>
    </div>

    <div class="modal fade" id="modalDetailReservasi" tabindex="-1" aria-labelledby="modalDetailReservasi" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="modalDetailReservasi">Detail Reservasi</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Tanggal</td>
                                <td>:</td>
                                <td><span class="tanggal_reservasi"></span></td>
                            </tr>
                            <tr>
                                <td>Check in</td>
                                <td>:</td>
                                <td><span class="check_in_reservasi"></span></td>
                            </tr>
                            <tr>
                                <td>Check out</td>
                                <td>:</td>
                                <td><span class="check_out_reservasi"></span></td>
                            </tr>
                            <tr>
                                <td>Pesan / Malam</td>
                                <td>:</td>
                                <td><span class="pesan_per_malan_reservasi"></span></td>
                            </tr>
                            <tr>
                                <td>Batas Waktu Pembayaran</td>
                                <td>:</td>
                                <td><span class="konfirmasi_pembayaran_reservasi"></span></td>
                            </tr>
                            <tr>
                                <td>Status</td>
                                <td>:</td>
                                <td><span class="status_reservasi badge badge-primary"></span></td>
                            </tr>
                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-check"></i> OK</button>
                </div>
            </div>
        </div>
    </div>


    <div class="modal fade" id="modalPembayaran" tabindex="-1" aria-labelledby="modalPembayaran" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="modalPembayaran">Detail Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Front/Riwayat/uploadPembayaran') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_pembayaran">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Upload bukti pembayaran</label>
                            <input type="file" class="form-control" name="bukti_transfer">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Submit</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modalDetailTamu" tabindex="-1" aria-labelledby="modalDetailTamu" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="modalDetailTamu">Detail Tamu</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Nama</td>
                                <td>:</td>
                                <td><span class="nama_tamu"></span></td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>:</td>
                                <td><span class="email_tamu"></span></td>
                            </tr>
                            <tr>
                                <td>No. Hp</td>
                                <td>:</td>
                                <td><span class="no_hp_tamu"></span></td>
                            </tr>
                            <tr>
                                <td>Alamat 1</td>
                                <td>:</td>
                                <td><span class="alamat_1_tamu"></span></td>
                            </tr>
                            <tr>
                                <td>Alamat 2</td>
                                <td>:</td>
                                <td><span class="alamat_2_tamu"></span></td>
                            </tr>
                            <tr>
                                <td>Status Pembayaran</td>
                                <td>:</td>
                                <td><span class="status_orderan_tamu badge badge-primary"></span></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td><span class="keterangan_tamu"></span></td>
                            </tr>
                            <tr>
                                <td>Total Bayar</td>
                                <td>:</td>
                                <td><span class="total_bayar_tamu"></span></td>
                            </tr>
                            <tr class="tampil_bayar_ditempat">
                                <td>Bayar ditempat</td>
                                <td>:</td>
                                <td><span class="bayar_ditempat"></span></td>
                            </tr>
                            <tr class="tampil_bukti_transfer">
                                <td>Bukti Transfer</td>
                                <td>:</td>
                                <td><span class="bukti_transfer_tamu"></span></td>
                            </tr>
                            <tr class="tampil_bukti_transfer">
                                <td>No. Rekening</td>
                                <td>:</td>
                                <td><span class="no_rekening_bank_tamu"></span></td>
                            </tr>
                            <tr class="tampil_bukti_transfer">
                                <td>Nama bank</td>
                                <td>:</td>
                                <td><span class="nama_bank_tamu"></span></td>
                            </tr>
                            <tr class="tampil_bukti_transfer">
                                <td>Rekening bank</td>
                                <td>:</td>
                                <td><span class="rekening_bank_tamu"></span></td>
                            </tr>
                            <tr class="tampil_bukti_transfer">
                                <td>Gambar bank</td>
                                <td>:</td>
                                <td><span class="gambar_bank_tamu"></span></td>
                            </tr>

                        </table>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-check"></i> OK</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modaldetailKamar" tabindex="-1" aria-labelledby="modaldetailKamarLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-center" id="modaldetailKamarLabel">Detail Kamar</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="table-responsive">
                        <table class="table">
                            <tr>
                                <td>Kamar</td>
                                <td>:</td>
                                <td><span class="nama_kamar"></span></td>
                            </tr>
                            <tr>
                                <td>No. Kamar</td>
                                <td>:</td>
                                <td><span class="no_kamar"></span></td>
                            </tr>
                            <tr>
                                <td>Harga Kamar</td>
                                <td>:</td>
                                <td><span class="harga"></span></td>
                            </tr>
                            <tr>
                                <td>Status Kamar</td>
                                <td>:</td>
                                <td><span class="nama_status_kamar badge badge-info"></span></td>
                            </tr>
                            <tr>
                                <td>Tipe Kamar</td>
                                <td>:</td>
                                <td><span class="nama_tipe_kamar"></span></td>
                            </tr>
                            <tr>
                                <td>Keterangan</td>
                                <td>:</td>
                                <td><span class="keterangan"></span></td>
                            </tr>
                            <tr>
                                <td>Gambar</td>
                                <td>:</td>
                                <td><span class="gambar"></span></td>
                            </tr>
                        </table>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-check"></i> Ok</button>
                </div>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="modalPembayaranKonfirmasi" tabindex="-1" aria-labelledby="modalPembayaranKonfirmasi" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title text-center" id="modalPembayaranKonfirmasi">Konfirmasi Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Admin/Reservasi/konfirmasiPembayaran') ?>" method="post">
                    <input type="hidden" name="id_pembayaran">
                    <input type="hidden" name="id_reservasi">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Konfirmasi Pembayaran</label>
                            <select name="status_orderan" class="form-control" id="" required>
                                <option value="">-- Konfirmasi Pembayaran --</option>
                                <option value="dibayar">Dibayar</option>
                                <option value="ditolak">Ditolak</option>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Javascripts -->
    <script src="<?= base_url('asset/backend/theme/') ?>assets/plugins/jquery/jquery-3.4.1.min.js"></script>

    <script src="<?= base_url('asset/backend/theme/') ?>assets/plugins/bootstrap/popper.min.js"></script>
    <script src="<?= base_url('asset/backend/theme/') ?>assets/plugins/bootstrap/js/bootstrap.min.js"></script>
    <script src="<?= base_url('asset/backend/theme/') ?>assets/plugins/jquery-slimscroll/jquery.slimscroll.min.js"></script>


    <!-- <script src="<?= base_url('asset/backend/theme/') ?>assets/js/pages/dashboard.js"></script> -->
    <script src="<?= base_url('asset/backend/theme/') ?>assets/js/connect.min.js"></script>
    <script src="<?= base_url('asset/backend/theme/') ?>assets/plugins/DataTables/datatables.min.js"></script>
    <script src="<?= base_url('asset/backend/theme/') ?>assets/js/pages/datatables.js"></script>
    <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/autonumeric@4.5.4"></script>
    <script src="https://code.highcharts.com/highcharts.js"></script>
    <script src="https://code.highcharts.com/modules/data.js"></script>
    <script src="https://code.highcharts.com/modules/exporting.js"></script>
    <script src="https://code.highcharts.com/modules/export-data.js"></script>
    <script src="https://code.highcharts.com/modules/accessibility.js"></script>
    <script>
        $(".mydatepicker").datepicker({
            dateFormat: "yy-mm-dd"
        });
        new AutoNumeric('.price', {
            decimalCharacter: '.',
            digitGroupSeparator: ',',
            decimalPlaces: 0,
            todayHighlight: true,
        });
    </script>
    <script>
        $(document).ready(function() {
            function number_format(number, decimals, dec_point, thousands_sep) {
                // Strip all characters but numerical ones.
                number = (number + '').replace(/[^0-9+\-Ee.]/g, '');
                var n = !isFinite(+number) ? 0 : +number,
                    prec = !isFinite(+decimals) ? 0 : Math.abs(decimals),
                    sep = (typeof thousands_sep === 'undefined') ? ',' : thousands_sep,
                    dec = (typeof dec_point === 'undefined') ? '.' : dec_point,
                    s = '',
                    toFixedFix = function(n, prec) {
                        var k = Math.pow(10, prec);
                        return '' + Math.round(n * k) / k;
                    };
                // Fix for IE parseFloat(0.55).toFixed(0) = 0;
                s = (prec ? toFixedFix(n, prec) : '' + Math.round(n)).split('.');
                if (s[0].length > 3) {
                    s[0] = s[0].replace(/\B(?=(?:\d{3})+(?!\d))/g, sep);
                }
                if ((s[1] || '').length < prec) {
                    s[1] = s[1] || '';
                    s[1] += new Array(prec - s[1].length + 1).join('0');
                }
                return s.join(dec);
            }
            $(document).on('click', '.btn-detail', function() {
                const url = $(this).data('url');
                $.ajax({
                    url: url,
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        console.log(data);
                        $('span.harga').html(number_format(data.row.harga));
                        $('span.nama_kamar').html(data.row.nama_kamar);
                        $('span.no_kamar').html(data.row.no_kamar);
                        $('span.nama_status_kamar').html(data.row.nama_status_kamar);
                        $('span.nama_tipe_kamar').html(data.row.nama_tipe_kamar);
                        $('span.icon_id').html('<i class="' + data.icon_kamar + '"></i> ' + data.icon_kamar);
                        $('span.keterangan').html(data.row.keterangan);
                        $('span.nama_tipe_kamar').html(data.row.nama_tipe_kamar);
                        $('span.nama_status_kamar').html(data.row.nama_status_kamar);
                        $('span.slider').html(data.row.slider);
                        $('span.rekomendasi').html(data.row.rekomendasi);
                        $('span.penawaran').html(data.row.penawaran);
                        $('span.harga').html(number_format(data.row.harga));
                        $('span.gambar').html(data.gambar);
                    },
                    error: function(x, t, m) {
                        console.log(x.responseText);
                    }
                })
            })
            $(document).on('click', '.btn-konfirmasi-pembayaran', function() {
                const id_pembayaran = $(this).data('id_pembayaran');
                const id_reservasi = $(this).data('id_reservasi');

                $('input[name="id_pembayaran"]').val(id_pembayaran);
                $('input[name="id_reservasi"]').val(id_reservasi);

            })
            $(document).on('click', '.btn-detail-keterangan', function() {
                const url = $(this).data('url');
                $.ajax({
                    url: url,
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        $('p.keterangan').html(data.keterangan);
                    },
                    error: function(x, t, m) {
                        console.log(x.responseText);
                    }
                })
            })

            $(document).on('click', '.btn-detail-kamar', function(e) {
                e.preventDefault();
                var url = $(this).data('url');
                $.ajax({
                    url: url,
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        $('span.harga').html(number_format(data.row.harga));
                        $('span.nama_kamar').html(data.row.nama_kamar);
                        $('span.no_kamar').html(data.row.no_kamar);
                        $('span.nama_status_kamar').html(data.row.nama_status_kamar);
                        $('span.nama_tipe_kamar').html(data.row.nama_tipe_kamar);
                        $('span.icon_id').html('<i class="' + data.row.icon_kamar + '"></i>' + data.row.icon_kamar);
                        $('span.keterangan').html(data.row.keterangan);
                        $('span.nama_tipe_kamar').html(data.row.nama_tipe_kamar);
                        $('span.nama_status_kamar').html(data.row.nama_status_kamar);
                        $('span.slider').html(data.row.slider);
                        $('span.rekomendasi').html(data.row.rekomendasi);
                        $('span.penawaran').html(data.row.penawaran);
                        $('span.harga').html(number_format(data.row.harga));
                        $('span.gambar').html(data.gambar);
                    },
                    error: function(x, t, m) {
                        console.log(x.responseText);
                    }
                })
            })

            $(document).on('click', '.btn-detail-reservasi', function(e) {
                e.preventDefault();
                const url = $(this).data('url');
                $.ajax({
                    url: url,
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        var a = new Date(data.check_in);
                        var b = new Date(data.check_out);
                        var timeDiff = 0
                        if (b) {
                            timeDiff = (b.getTime() - a.getTime()) / 1000;
                        }
                        var selisih = Math.floor(timeDiff / (86400));

                        $('.pesan_per_malan_reservasi').html(`
                        ${selisih} Malam
                        `);
                        $('.tanggal_reservasi').html(data.tanggal);
                        $('.check_in_reservasi').html(data.check_in);
                        $('.check_out_reservasi').html(data.check_out);
                        $('.konfirmasi_pembayaran_reservasi').html(data.konfirmasi_pembayaran);
                        $('.status_reservasi').html(data.status);
                        if (data.status == 'menunggu') {
                            $('.status_reservasi').attr('class', 'status_reservasi badge badge-primary');
                        } else if (data.status == 'menunggu konfirmasi') {
                            $('.status_reservasi').attr('class', 'status_reservasi badge badge-warning');
                        } else if (data.status == 'batal') {
                            $('.status_reservasi').attr('class', 'status_reservasi badge badge-danger');
                        }
                    },
                    error: function(x, t, m) {
                        console.log(x.responseText);
                    }
                })
            })

            $(document).on('click', '.btn-detail-pembayaran', function(e) {
                e.preventDefault();
                const url = $(this).data('url');
                $.ajax({
                    url: url,
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        const {
                            pembayaran,
                            rekening
                        } = data;
                        const base_url = window.location.origin + '/management_hotel';
                        $('.nama_tamu').html(pembayaran.nama_depan + " " + pembayaran.nama_belakang)
                        $('.status_orderan_tamu').html(pembayaran.status_orderan);
                        if (pembayaran.status_orderan == 'dibayar') {
                            $('.status_orderan_tamu').attr('class', 'status_orderan_tamu badge badge-success');
                        } else if (pembayaran.status_orderan == 'menunggu') {
                            $('.status_orderan_tamu').attr('class', 'status_orderan_tamu badge badge-warning');
                        } else if (pembayaran.status_orderan == 'belum dibayar') {
                            $('.status_orderan_tamu').attr('class', 'status_orderan_tamu badge badge-danger');
                        } else if (pembayaran.status_orderan == 'ditolak') {
                            $('.status_orderan_tamu').attr('class', 'status_orderan_tamu badge badge-danger');
                        }
                        $('.keterangan_tamu').html(pembayaran.keterangan);
                        $('.email_tamu').html(pembayaran.email);
                        $('.no_hp_tamu').html(pembayaran.no_hp);
                        $('.alamat_1_tamu').html(pembayaran.alamat_1);
                        $('.alamat_2_tamu').html(pembayaran.alamat_2);
                        $('.total_bayar_tamu').html(number_format(pembayaran.total_bayar));

                        var bayar_ditempat = pembayaran.bayar_ditempat;
                        var html_bayar_ditempat = null;
                        if (bayar_ditempat != null) {
                            html_bayar_ditempat = '<span class="badge badge-success"><i class="fa fa-check-circle"></i></span>';
                            $('.tampil_bukti_transfer').addClass('d-none');
                        } else {
                            $('.tampil_bayar_ditempat').addClass('d-none');
                        }

                        var src = base_url + "/images/pembayaran/" + pembayaran.bukti_transfer;
                        if (pembayaran.bukti_transfer != null) {
                            $('.bukti_transfer_tamu').html(`
                            <a href="` + src + `" target="_blank">
                            <img src="` + src + `" width="100%;"></a>`);
                        } else {
                            $('.bukti_transfer_tamu').attr('class', 'bukti_transfer_tamu badge badge-warning').html('Menunggu pembayaran');
                        }
                        if (rekening != null) {
                            $('.no_rekening_bank_tamu').html(rekening.no_rekening);
                            $('.nama_bank_tamu').html(rekening.nama_bank);
                            $('.rekening_bank_tamu').html(rekening.nama_rekening);
                            const src_bank = base_url + "/images/rekening/" + rekening.gambar_bank;
                            $('.gambar_bank_tamu').html(`
                                <a href="` + src_bank + `" target="_blank">
                                <img src="` + src_bank + `" width="100%;"></a>`);
                        } else {
                            $('.no_rekening_bank_tamu').html('-');
                            $('.nama_bank_tamu').html('-');
                            $('.rekening_bank_tamu').html('-');
                            $('.gambar_bank_tamu').html('-');
                        }

                        $('.bayar_ditempat').html(html_bayar_ditempat);

                    },
                    error: function(x, t, m) {
                        console.log(x.responseText);
                    }
                })
            })
            Highcharts.getJSON(
                '<?= $urlGrafik ?>',
                function(data) {
                    Highcharts.chart('container-chart', {
                        chart: {
                            zoomType: 'x'
                        },
                        title: {
                            text: 'Grafik Transaksi'
                        },
                        subtitle: {
                            text: document.ontouchstart === undefined ?
                                'Klik seret lalu lepas untuk memperdekat grafik' : 'Cubit diagram untuk memperbesar'
                        },
                        xAxis: {
                            type: 'datetime'
                        },
                        yAxis: {
                            title: {
                                text: 'Penghasilan'
                            }
                        },
                        legend: {
                            enabled: false
                        },
                        plotOptions: {
                            area: {
                                fillColor: {
                                    linearGradient: {
                                        x1: 0,
                                        y1: 0,
                                        x2: 0,
                                        y2: 1
                                    },
                                    stops: [
                                        [0, Highcharts.getOptions().colors[0]],
                                        [1, Highcharts.color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                                    ]
                                },
                                marker: {
                                    radius: 2
                                },
                                lineWidth: 1,
                                states: {
                                    hover: {
                                        lineWidth: 1
                                    }
                                },
                                threshold: null
                            }
                        },

                        series: [{
                            type: 'area',
                            name: 'Pemasukan',
                            data: data
                        }]
                    });
                }
            );
        })
    </script>
</body>

</html>