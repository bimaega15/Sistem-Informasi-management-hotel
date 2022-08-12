<?php
if (isset($title)) {
    $title_fix = $title;
} else {
    $title_fix = 'Not Found Page';
    $title = $title_fix;
}
$url = current_url();
$check = checkTransaksi();
$konfigurasi = getKonfigurasi();
error_reporting(0);

?>
<!DOCTYPE html>
<!--[if lt IE 7 ]> <html class="ie6"> <![endif]-->
<!--[if IE 7 ]>    <html class="ie7"> <![endif]-->
<!--[if IE 8 ]>    <html class="ie8"> <![endif]-->
<!--[if IE 9 ]>    <html class="ie9"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!-->
<html class="">
<!--<![endif]-->

<head>
    <meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="description" content="">
    <meta name="author" content="">

    <title><?= $title_fix; ?></title>

    <!-- Standard Favicon -->
    <link rel="icon" type="image/x-icon" href="<?= base_url('images/konfigurasi/' . $konfigurasi->gambar_sistem) ?>" />

    <!-- For iPhone 4 Retina display: -->
    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?= base_url('images/konfigurasi/' . $konfigurasi->gambar_sistem) ?>">

    <!-- For iPad: -->
    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?= base_url('images/konfigurasi/' . $konfigurasi->gambar_sistem) ?>">

    <!-- For iPhone: -->
    <link rel="apple-touch-icon-precomposed" href="<?= base_url('images/konfigurasi/' . $konfigurasi->gambar_sistem) ?>">

    <!-- Library - Google Font Familys -->

    <!-- Library - Bootstrap v3.3.5 -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('asset/HTML/') ?>libraries/lib.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('asset/HTML/') ?>libraries/calender/calendar.css">

    <!-- Custom - Common CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('asset/HTML/') ?>css/plugins.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url('asset/HTML/') ?>css/navigation-menu.css">

    <!-- Custom - Theme CSS -->
    <link rel="stylesheet" type="text/css" href="<?= base_url('asset/HTML/') ?>style.css" />
    <link rel="stylesheet" type="text/css" href="<?= base_url('asset/HTML/') ?>css/shortcodes.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url('asset/') ?>jquery-toast-plugin-master/dist/jquery.toast.min.css">

    <style>
        .content-block p {
            padding-right: 0;
        }

        .w-100 {
            width: 100%;
        }

        .py-3 {
            padding-top: 15px;
            padding-bottom: 15px;
        }

        section.range-slider {
            position: relative;
            width: 100%;
            height: 35px;
            text-align: center;
        }

        section.range-slider input {
            pointer-events: none;
            position: absolute;
            overflow: hidden;
            left: 0;
            top: 15px;
            width: 100%;
            outline: none;
            height: 18px;
            margin: 0;
            padding: 0;
        }

        section.range-slider input::-webkit-slider-thumb {
            pointer-events: all;
            position: relative;
            z-index: 1;
            outline: 0;
        }

        section.range-slider input::-moz-range-thumb {
            pointer-events: all;
            position: relative;
            z-index: 10;
            -moz-appearance: none;
            width: 9px;
        }

        section.range-slider input::-moz-range-track {
            position: relative;
            z-index: -1;
            background-color: rgba(0, 0, 0, 1);
            border: 0;
        }

        section.range-slider input:last-of-type::-moz-range-track {
            -moz-appearance: none;
            background: none transparent;
            border: 0;
        }

        section.range-slider input[type=range]::-moz-focus-outer {
            border: 0;
        }

        .p-3 {
            padding: 20px;
            border: 1px solid #cfdcf7;
            margin: 5px 0px;
            background: #fbfbfb;
            box-sizing: border-box;
        }

        .badge-info {
            background-color: #826bea;
        }

        .badge-success {
            background-color: #08c774;
        }

        .badge-primary {
            background-color: #2b08c7;
        }

        .badge-danger {
            background-color: #d00c6a;
        }

        .badge-warning {
            background-color: #d0590c;
        }

        i.fas.fa-star {
            color: #ffc800;
        }

        .fasilitas {
            display: block;
            margin-bottom: 30px;
        }

        .fasilitas i {
            border-radius: 50%;
            padding: 10px;
            border: 1px solid #5a5bf5;
            box-sizing: border-box;
            margin-right: 10px;
            display: inline-block;
            color: #9c6dd0;
        }

        .fasilitas i:last-child {
            margin-right: 0px;
        }

        .border {
            padding: 10px 15px;
            border-radius: 10%;
            text-decoration: none !important;
        }

        .border-primary {
            border: 1px solid blue;
            transition: 0.5s all;
        }

        .border-primary:hover {
            background-color: #6137d0;
            color: #fff;
            border: none;
            box-shadow: 5px 7px 10px rgb(0 0 0 / 11%);
        }

        .w-75 {
            width: 75%;
        }

        .d-flex {
            display: flex;
        }

        .flex-row {
            flex-direction: row;
        }

        .justify-content-center {
            justify-content: center;
        }

        .mr-3 {
            margin-right: 15px;
        }

        .cursor-pointer {
            cursor: pointer;
        }

        .mt-2 {
            margin-top: 10px;
        }

        .mt-3 {
            margin-top: 15px;
        }

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

        .text-white {
            color: #fff;
        }

        .d-none {
            display: none;
        }
    </style>

</head>

<body data-offset="200" data-spy="scroll" data-target=".ow-navigation">
    <?php
    $this->view('toastr');
    ?>
    <!-- Loader -->
    <div id="site-loader" class="load-complete">
        <div class="loader">
            <div class="loader-inner ball-clip-rotate">
                <div></div>
            </div>
        </div>
    </div><!-- Loader /- -->

    <a id="top"></a>

    <!-- Header Section -->
    <?= $header; ?>
    <!-- Header Section /- -->

    <?= $content; ?>

    <!-- Footer Section -->
    <?= $footer; ?>
    <!-- Footer Section /- -->
    <!-- Modal -->
    <div class="modal fade" id="modalClient" tabindex="-1" aria-labelledby="modalClientLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalClientLabel">Keterangan</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <span class="keterangan_client"></span>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal"><i class="fas fa-check"></i> OK</button>
                </div>
            </div>
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
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary">
                    <h4 class="modal-title" id="modalPembayaran">Detail Pembayaran</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="<?= base_url('Front/Riwayat/uploadPembayaran') ?>" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="id_pembayaran">
                    <input type="hidden" name="id_reservasi">
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="">Jika anda ingin bayar ditempat, centang dibawah ini:</label>
                            <div class="form-check">
                                <input class="form-check-input" name="bayar_ditempat" type="checkbox" value="1" id="bayar_ditempat">
                                <label class="form-check-label" for="bayar_ditempat">
                                    Bayar ditempat
                                </label>
                            </div>
                        </div>
                        <div id="transaksi_tf">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Rekening</th>
                                        <th>Nama Rekening</th>
                                        <th>Nama Bank</th>
                                        <th>Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($rekening as $v_rekening) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= @$v_rekening->no_rekening; ?></td>
                                            <td><?= @$v_rekening->nama_rekening; ?></td>
                                            <td><?= @$v_rekening->nama_bank; ?></td>
                                            <td>
                                                <a href="<?= base_url('images/rekening/' . @$v_rekening->gambar_bank) ?>" target="_blank">
                                                    <img src="<?= base_url('images/rekening/' . @$v_rekening->gambar_bank) ?>" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <label class="radio-inline">
                                                    <input type="radio" name="rekening_id" id="inlineRadio1" value="<?= @$v_rekening->id_rekening ?>"> </label>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                            <div class="form-group">
                                <label for="">Upload bukti pembayaran</label>
                                <input type="file" class="form-control" name="bukti_transfer">
                            </div>
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
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                </div>
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
    <div class="modal fade" id="modalLogin" tabindex="-1" aria-labelledby="modalLoginLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h4 class="modal-title text-center" id="modalLoginLabel">Form Account <i class="fas fa-user-tie"></i></h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <ul class="nav nav-tabs" role="tablist">
                            <li role="presentation" class="active"><a href="#login" aria-controls="login" role="tab" data-toggle="tab">Login</a></li>
                            <li role="presentation"><a href="#register" aria-controls="register" role="tab" data-toggle="tab">Register</a></li>

                        </ul>

                        <!-- Tab panes -->
                        <div class="tab-content mt-3">
                            <div role="tabpanel" class="tab-pane active" id="login">
                                <form action="<?= base_url('Front/Login/process') ?>" method="post">
                                    <input type="hidden" name="url" value="<?= $url ?>">
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" name="username" class="form-control" required placeholder="Username..." value="<?= get_cookie('username') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control" required placeholder="Password...">
                                    </div>
                                    <div class="checkbox">
                                        <label>
                                            <input type="checkbox" name="remember_me" value="true"> Ingat Saya
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-danger"><i class="fas fa-undo-alt"></i> Reset</button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </form>
                            </div>
                            <div role="tabpanel" class="tab-pane" id="register">
                                <form action="<?= base_url('Front/Login/processRegister') ?>" method="post" enctype="multipart/form-data">
                                    <input type="hidden" name="url" value="<?= $url ?>">
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" name="username" class="form-control" required placeholder="Username..." value="<?= get_cookie('username') ?>">
                                    </div>
                                    <div class="form-group" style="position: relative;">
                                        <label for="">Password</label>
                                        <input type="password" name="password" class="form-control password" required placeholder="Password...">
                                        <i class="fas fa-eye password_1" style="position:absolute; right:10px; bottom:10px; cursor:pointer;"></i>
                                    </div>
                                    <div class="form-group" style="position: relative;">
                                        <label for="">Ulangi Password</label>
                                        <input type="password" name="confirm_password" class="form-control password_confirm" required placeholder="Konfirmasi Password...">
                                        <i class="fas fa-eye password_2" style="position:absolute; right:10px; bottom:10px; cursor:pointer;"></i>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Nama</label>
                                        <input type="text" name="nama" class="form-control" required placeholder="Nama..." value="<?= get_cookie('nama') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" name="email" class="form-control" required placeholder="Email..." value="<?= get_cookie('email') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">No. Handphone</label>
                                        <input type="number" name="no_hp" class="form-control" required placeholder="No. Handphone..." value="<?= get_cookie('no_hp') ?>">
                                    </div>
                                    <div class="form-group">
                                        <label for="">Alamat</label>
                                        <textarea name="alamat" class="form-control" rows="5" placeholder="Alamat..."><?= get_cookie('alamat') ?></textarea>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Jenis Kelamin</label> <br>
                                        <label class="radio-inline">
                                            <input type="radio" name="jenis_kelamin" id="inlineRadio1" value="L" <?= get_cookie('jenis_kelamin') == 'L' ? 'checked' : '' ?>> Laki laki
                                        </label>
                                        <label class="radio-inline">
                                            <input type="radio" name="jenis_kelamin" id="inlineRadio2" value="P" <?= get_cookie('jenis_kelamin') == 'P' ? 'checked' : '' ?>> Perempuan
                                        </label>
                                    </div>
                                    <div class="form-group">
                                        <label for="">Gambar</label>
                                        <input type="file" name="gambar" class="form-control">
                                    </div>
                                    <div class="form-group">
                                        <button type="reset" class="btn btn-danger"><i class="fas fa-undo-alt"></i> Reset</button>
                                        <button type="submit" class="btn btn-primary"><i class="fas fa-save"></i> Submit</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>


                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fas fa-window-close"></i> Close</button>
                </div>
            </div>
        </div>
    </div>




    <!-- JQuery v1.11.3 -->
    <script src="<?= base_url('asset/HTML/') ?>js/jquery.min.js"></script>

    <!-- Library JS -->
    <script src="<?= base_url('asset/HTML/') ?>libraries/lib.js"></script>
    <script src="<?= base_url('asset/HTML/') ?>libraries/calender/jquery-ui-datepicker.min.js"></script>
    <script src="http://code.jquery.com/jquery-migrate-1.0.0.js"></script>

    <!-- Library - Theme JS -->
    <script src="<?= base_url('asset/HTML/') ?>js/functions.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap.min.js"></script>
    <script src="<?= base_url('asset/') ?>jquery-toast-plugin-master/dist/jquery.toast.min.js"></script>
    <script>
        $(document).ready(function() {
            $(document).on('click', '.btn-upload-pembayaran', function() {
                const id_pembayaran = $(this).data('id_pembayaran');
                const id_reservasi = $(this).data('id_reservasi');
                $('input[name="id_pembayaran"]').val(id_pembayaran);
                $('input[name="id_reservasi"]').val(id_reservasi);
            })
            $(document).on('click', '.password_1', function() {
                var type = $('.password').attr('type');
                if (type == 'password') {
                    $('.password').attr('type', 'text');
                    $('.password_1').attr('class', 'fas fa-eye-slash password_1')
                } else {
                    $('.password').attr('type', 'password');
                    $('.password_1').attr('class', 'fas fa-eye password_1')

                }
            })

            $(document).on('click', '.password_2', function() {
                var type = $('.password_confirm').attr('type');
                if (type == 'password') {
                    $('.password_confirm').attr('type', 'text');
                    $('.password_2').attr('class', 'fas fa-eye-slash password_2')
                } else {
                    $('.password_confirm').attr('type', 'password');
                    $('.password_2').attr('class', 'fas fa-eye password_2')

                }
            })


            $('#DataTable').DataTable();
            $(document).on('click', '.btn-detail-keterangan', function(e) {
                e.preventDefault();
                const url = $(this).data('url');
                $.ajax({
                    url: url,
                    method: 'post',
                    dataType: 'json',
                    success: function(data) {
                        $('span.keterangan_client').html(data.keterangan);
                    },
                    error: function(x, t, m) {
                        console.log(x.responseText);
                    }
                })
            })
            $(document).on('click', '.btn-login', function(e) {
                e.preventDefault();
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
                        } else if (data.status == 'konfirmasi') {
                            $('.status_reservasi').attr('class', 'status_reservasi badge badge-success');
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
                        console.log(data);
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
                        var html_bayar_ditempat = '';
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

            $(document).on('change', '.datepicker2', function(e) {
                e.preventDefault();
                var harga = $(this).data('harga');
                rangePicker(harga);
            })

            $(document).on('change', '.datepicker1', function(e) {
                e.preventDefault();
                var harga = $(this).data('harga');
                rangePicker(harga);
            })

            function rangePicker(harga) {
                var datepicker1 = $('.datepicker1').val();
                var datepicker2 = $('.datepicker2').val();

                var split1 = datepicker1.split('-');
                var tanggal1 = split1[2] + '-' + split1[1] + '-' + split1[0];
                tanggal1 = new Date(tanggal1);

                var split2 = datepicker2.split('-');
                var tanggal2 = split2[2] + '-' + split2[1] + '-' + split2[0];
                tanggal2 = new Date(tanggal2);

                if (tanggal2 <= tanggal1) {
                    alert('Tanggal Checkout tidak boleh dibawah tanggal check in');
                    $('.datepicker2').val('');
                    return;
                }

                if (tanggal1 >= tanggal2) {
                    alert('Checkin tidak boleh lebih besar dari check out');
                    $('.datepicker1').val('');
                    return;
                }
                timeDiff = (tanggal2 - tanggal1) / 1000;
                var selisih = Math.floor(timeDiff / (86400));
                var total = harga * selisih;
                $('input[name="total"]').val(total);
                $('strong.total_html').html(number_format(total));
                $('span.ket_malam').html(selisih + " Malam");
                $('span.checkin_html').html(datepicker1);
                $('span.checkout_html').html(datepicker2);
            }

            var status_toastr = $('#session_status_toastr').data('status');
            var text_toastr = $('#session_status_toastr').data('text');

            if (status_toastr != null) {
                if (status_toastr == 'success') {
                    $.toast({
                        heading: 'Success',
                        text: text_toastr,
                        position: 'top-right',
                        icon: 'success',
                        stack: false
                    })
                }
                if (status_toastr == 'error') {
                    $.toast({
                        heading: 'Error',
                        text: text_toastr,
                        position: 'top-right',
                        icon: 'error',
                        stack: false
                    })
                }
            }

            function getVals() {
                // Get slider values
                var parent = this.parentNode;
                var slides = parent.getElementsByTagName("input");
                var slide1 = parseFloat(slides[0].value);
                var slide2 = parseFloat(slides[1].value);
                // Neither slider will clip the other, so make sure we determine which is larger
                if (slide1 > slide2) {
                    var tmp = slide2;
                    slide2 = slide1;
                    slide1 = tmp;
                }

                var displayElement = parent.getElementsByClassName("rangeValues")[0];
                displayElement.innerHTML = slide1 + " - " + slide2;
            }

            window.onload = function() {
                // Initialize Sliders
                var sliderSections = document.getElementsByClassName("range-slider");
                for (var x = 0; x < sliderSections.length; x++) {
                    var sliders = sliderSections[x].getElementsByTagName("input");
                    for (var y = 0; y < sliders.length; y++) {
                        if (sliders[y].type === "range") {
                            sliders[y].oninput = getVals;
                            // Manually trigger event first time to display values
                            sliders[y].oninput();
                        }
                    }
                }
            }

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

            // untuk bayar ditempat
            $(document).on('click', '#bayar_ditempat', function() {
                if ($(this).is(':checked')) {
                    $('#transaksi_tf').addClass('d-none');
                } else {
                    $('#transaksi_tf').removeClass('d-none');
                }
            })

        });
    </script>

</body>

</html>