<!DOCTYPE html>
<html lang="en" xmlns="http://www.w3.org/1999/xhtml" xmlns:v="urn:schemas-microsoft-com:vml" xmlns:o="urn:schemas-microsoft-com:office:office">

<head>
    <meta charset="utf-8"> <!-- utf-8 works for most cases -->
    <meta name="viewport" content="width=device-width"> <!-- Forcing initial-scale shouldn't be necessary -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge"> <!-- Use the latest (edge) version of IE rendering engine -->
    <meta name="x-apple-disable-message-reformatting"> <!-- Disable auto-scale in iOS 10 Mail entirely -->
    <title></title> <!-- The title tag shows in email notifications, like Android 4.4. -->

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,400i,700" rel="stylesheet">

    <!-- CSS Reset : BEGIN -->
    <style>
        /* What it does: Remove spaces around the email design added by some email clients. */
        /* Beware: It can remove the padding / margin and add a background color to the compose a reply window. */
        html,
        body {
            margin: 0 auto !important;
            padding: 0 !important;
            height: 100% !important;
            width: 100% !important;
            background: #f1f1f1;
        }

        /* What it does: Stops email clients resizing small text. */
        * {
            -ms-text-size-adjust: 100%;
            -webkit-text-size-adjust: 100%;
        }

        /* What it does: Centers email on Android 4.4 */
        div[style*="margin: 16px 0"] {
            margin: 0 !important;
        }

        /* What it does: Stops Outlook from adding extra spacing to tables. */
        table,
        td {
            mso-table-lspace: 0pt !important;
            mso-table-rspace: 0pt !important;
        }

        /* What it does: Fixes webkit padding issue. */
        table {
            border-spacing: 0 !important;
            border-collapse: collapse !important;
            table-layout: fixed !important;
            margin: 0 auto !important;
        }

        /* What it does: Uses a better rendering method when resizing images in IE. */
        img {
            -ms-interpolation-mode: bicubic;
        }

        /* What it does: Prevents Windows 10 Mail from underlining links despite inline CSS. Styles for underlined links should be inline. */
        a {
            text-decoration: none;
        }

        /* What it does: A work-around for email clients meddling in triggered links. */
        *[x-apple-data-detectors],
        /* iOS */
        .unstyle-auto-detected-links *,
        .aBn {
            border-bottom: 0 !important;
            cursor: default !important;
            color: inherit !important;
            text-decoration: none !important;
            font-size: inherit !important;
            font-family: inherit !important;
            font-weight: inherit !important;
            line-height: inherit !important;
        }

        /* What it does: Prevents Gmail from displaying a download button on large, non-linked images. */
        .a6S {
            display: none !important;
            opacity: 0.01 !important;
        }

        /* What it does: Prevents Gmail from changing the text color in conversation threads. */
        .im {
            color: inherit !important;
        }

        /* If the above doesn't work, add a .g-img class to any image in question. */
        img.g-img+div {
            display: none !important;
        }

        /* What it does: Removes right gutter in Gmail iOS app: https://github.com/TedGoas/Cerberus/issues/89  */
        /* Create one of these media queries for each additional viewport size you'd like to fix */

        /* iPhone 4, 4S, 5, 5S, 5C, and 5SE */
        @media only screen and (min-device-width: 320px) and (max-device-width: 374px) {
            u~div .email-container {
                min-width: 320px !important;
            }
        }

        /* iPhone 6, 6S, 7, 8, and X */
        @media only screen and (min-device-width: 375px) and (max-device-width: 413px) {
            u~div .email-container {
                min-width: 375px !important;
            }
        }

        /* iPhone 6+, 7+, and 8+ */
        @media only screen and (min-device-width: 414px) {
            u~div .email-container {
                min-width: 414px !important;
            }
        }
    </style>

    <!-- CSS Reset : END -->

    <!-- Progressive Enhancements : BEGIN -->
    <style>
        .primary {
            background: #ffc0d0;
        }

        .bg_white {
            background: #ffffff;
        }

        .bg_light {
            background: #fafafa;
        }

        .bg_black {
            background: #000000;
        }

        .bg_dark {
            background: rgba(0, 0, 0, .8);
        }

        .email-section {
            padding: 2.5em;
        }

        /*BUTTON*/
        .btn {
            padding: 5px 20px;
            display: inline-block;
        }

        .btn.btn-primary {
            border-radius: 5px;
            background: #ffc0d0;
            color: #ffffff;
        }

        .btn.btn-white {
            border-radius: 5px;
            background: #ffffff;
            color: #000000;
        }

        .btn.btn-white-outline {
            border-radius: 5px;
            background: transparent;
            border: 1px solid #fff;
            color: #fff;
        }

        .btn.btn-black {
            border-radius: 0px;
            background: #000;
            color: #fff;
        }

        .btn.btn-black-outline {
            border-radius: 0px;
            background: transparent;
            border: 2px solid #000;
            color: #000;
            font-weight: 700;
        }

        h1,
        h2,
        h3,
        h4,
        h5,
        h6 {
            font-family: 'Playfair Display', sans-serif;
            color: #000000;
            margin-top: 0;
            font-weight: 400;
        }

        body {
            font-family: 'Lato', sans-serif;
            font-weight: 400;
            font-size: 15px;
            line-height: 1.8;
            color: rgba(0, 0, 0, .5);
        }

        a {
            color: #ffc0d0;
        }

        table {}

        /*LOGO*/

        .logo h1 {
            margin: 0;
        }

        .logo h1 a {
            color: #000000;
            font-size: 30px;
            font-weight: 700;
            /*text-transform: uppercase;*/
            font-family: 'Playfair Display', sans-serif;
            font-style: italic;
        }

        .navigation {
            padding: 0;
            padding: 1em 0;
            /*background: rgba(0,0,0,1);*/
            border-top: 1px solid rgba(0, 0, 0, 0.1);
            border-bottom: 1px solid rgba(0, 0, 0, 0.1);
            margin-bottom: 0;
        }

        .navigation li {
            list-style: none;
            display: inline-block;
            ;
            margin-left: 5px;
            margin-right: 5px;
            font-size: 13px;
            font-weight: 500;
            text-transform: uppercase;
            letter-spacing: 2px;
        }

        .navigation li a {
            color: rgba(0, 0, 0, 1);
        }

        /*HERO*/
        .hero {
            position: relative;
            z-index: 0;
        }

        .hero .overlay {
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            content: '';
            width: 100%;
            background: #000000;
            z-index: -1;
            opacity: .2;
        }

        .hero .text {
            color: rgba(255, 255, 255, .9);
            max-width: 50%;
            margin: 0 auto 0;
        }

        .hero .text h2 {
            color: #fff;
            font-size: 30px;
            margin-bottom: 0;
            font-weight: 300;
            line-height: 1.4;
        }

        .hero .text h2 span {
            font-weight: 600;
            color: #ffc0d0;
        }

        /*INTRO*/
        .intro {
            position: relative;
            z-index: 0;
        }

        .intro .text {
            color: rgba(0, 0, 0, .3);
        }

        .intro .text h2 {
            color: #000;
            font-size: 34px;
            margin-bottom: 0;
            font-weight: 300;
        }

        .intro .text h2 span {
            font-weight: 600;
            color: #ffc0d0;
        }


        /*PRODUCT*/
        .text-product {}

        .text-product .price {
            font-size: 20px;
            color: #fff;
            display: inline-block;
            ;
            margin-bottom: 1em;
            border: 2px solid #fff;
            padding: 0 10px;
        }

        .text-product h2 {
            font-family: 'Lato', sans-serif;
        }

        /*HEADING SECTION*/
        .heading-section {}

        .heading-section h2 {
            color: #000000;
            font-size: 28px;
            margin-top: 0;
            line-height: 1.4;
            font-weight: 400;
        }

        .heading-section .subheading {
            margin-bottom: 20px !important;
            display: inline-block;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(0, 0, 0, .4);
            position: relative;
        }

        .heading-section .subheading::after {
            position: absolute;
            left: 0;
            right: 0;
            bottom: -10px;
            content: '';
            width: 100%;
            height: 2px;
            background: #ffc0d0;
            margin: 0 auto;
        }

        .heading-section-white {
            color: rgba(255, 255, 255, .8);
        }

        .heading-section-white h2 {
            font-family:
                line-height: 1;
            padding-bottom: 0;
        }

        .heading-section-white h2 {
            color: #ffffff;
        }

        .heading-section-white .subheading {
            margin-bottom: 0;
            display: inline-block;
            font-size: 13px;
            text-transform: uppercase;
            letter-spacing: 2px;
            color: rgba(255, 255, 255, .4);
        }


        ul.social {
            padding: 0;
        }

        ul.social li {
            display: inline-block;
            margin-right: 10px;
        }

        /*FOOTER*/

        .footer {
            border-top: 1px solid rgba(0, 0, 0, .05);
            color: rgba(0, 0, 0, .5);
        }

        .footer .heading {
            color: #000;
            font-size: 20px;
        }

        .footer ul {
            margin: 0;
            padding: 0;
        }

        .footer ul li {
            list-style: none;
            margin-bottom: 10px;
        }

        .footer ul li a {
            color: rgba(0, 0, 0, 1);
        }

        #table_pemesanan {
            width: 100% !important;
        }

        #table_pemesanan td,
        th {
            padding: 5px;
            border: 1px solid #aba9a9;
        }


        @media screen and (max-width: 500px) {}
    </style>


</head>

<body width="100%" style="margin: 0; padding: 0 !important; mso-line-height-rule: exactly; background-color: #fff;">
    <center style="width: 100%; background-color: #fff;">
        <div style="display: none; font-size: 1px;max-height: 0px; max-width: 0px; opacity: 0; overflow: hidden; mso-hide: all; font-family: sans-serif;">
            &zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;&zwnj;&nbsp;
        </div>
        <div style="max-width: 700px; margin: 0 auto; box-shadow: 0px 0px 10px 0px #888888;" class="email-container">
            <!-- BEGIN BODY -->
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%" style="margin: auto;">
                <tr>
                    <td valign="top" class="bg_white" style="padding: 1em 2.5em 0 2.5em;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td style="width: 20%;">
                                    <img src="cid:gambar_sistem" alt="Gambar sistem" style=" width: 100%; border-radius: 10px;">
                                </td>
                                <td>
                                    <div style="margin-left: 15px;">
                                        <p style="font-size: 16px; font-weight: bold;">
                                            <?= $konfigurasi->nama_sistem; ?>
                                        </p>
                                        <p style="font-size: 14px; margin:0; padding:0;"><?= $konfigurasi->alamat; ?></p>
                                        <p style="font-size: 14px; margin:0; padding:0;">Telp: <?= $konfigurasi->no_telepon; ?></p>
                                        <p style="font-size: 14px; margin:0; padding:0;">Email: <?= $konfigurasi->email; ?></p>
                                    </div>
                                </td>
                                <td style="width: 35%;">
                                    <h4 style="text-align: right; bottom:0; font-weight: 800;font-size:16px;">Invoice Pembayaran</h4>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr><!-- end tr -->
                <tr>
                    <td valign="top" class="bg_white" style="padding-left: 40px; padding-right: 40px; border-top: 1px solid rgba(0, 0, 0, 0.1); padding-top: 10px; padding-bottom: 10px;;">
                        <table role="presentation" border="0" cellpadding="0" cellspacing="0" width="100%">
                            <tr>
                                <td width="55%">
                                    <div>
                                        <p style="font-weight: bold; margin:0;">Kepada Yth:</p>
                                        <p style="margin:0;">
                                            <strong style="font-size: 14px; margin-right: 35px;">Nama:</strong><span style="font-size: 14px;"><?= $pembayaran->nama_depan; ?> <?= $pembayaran->nama_belakang; ?></span>
                                        </p>
                                        <p style="margin:0;">
                                            <strong style="font-size: 14px; margin-right: 22px;">No. Telp:</strong><span style="font-size: 14px;"><?= $pembayaran->no_hp; ?></span>
                                        </p>
                                        <p style="margin:0;">
                                            <strong style="font-size: 14px; margin-right: 27px;">Alamat:</strong><span style="font-size: 14px;"><?= $pembayaran->alamat_1; ?></span>
                                        </p>
                                    </div>
                                </td>
                                <td width="45%">
                                    <div>
                                        <p style="margin:0; padding-top: 15px;">
                                            <strong style="font-size: 14px; margin-right: 53px;">Tanggal:</strong><span style="font-size: 14px;"><?= $tanggal_pesan; ?></span>
                                        </p>
                                        <p style="margin:0;">
                                            <strong style="font-size: 14px; margin-right: 22px;">Pembayaran:</strong> Waktu 30 Menit</span>
                                        </p>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr><!-- end tr -->

                <tr>
                    <td valign="middle" class="intro bg_white" style="padding: 20px 0 20px 0;">
                        <table>
                            <tr>
                                <td>
                                    <div class="text" style="padding: 0 2.5em; text-align: center;">
                                        <h2>Booking Kamar</h2>
                                        <div style="display: flex;">
                                            <div style="margin-right: 35px; margin-right: 35px;">
                                                <p style="margin:0; padding:0; color:#8b8b8b;">Check In</p>
                                                <p style="margin:0; padding:0; color:#8b8b8b;"> <?= get_tanggal_indo($reservasi->check_in); ?> </p>
                                            </div>
                                            <div style="margin-right: 35px; margin-right: 35px;">
                                                <small style="font-size: 10px; color:#8b8b8b;height: 100%; align-items: center; display: flex;"> <?= $pesan_per_malam; ?> Malam</small>
                                            </div>
                                            <div style="margin-right: 35px; margin-right: 35px;">
                                                <p style="margin:0; padding:0; color:#8b8b8b;">Check Out</p>
                                                <p style="margin:0; padding:0; color:#8b8b8b;"><?= get_tanggal_indo($reservasi->check_out); ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr><!-- end tr -->
                <tr>
                    <td class="bg_white" style="padding-left: 40px; padding-right: 40px;">
                        <table role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                            <tr>
                                <td>
                                    <div>
                                        <h2 style="font-size: 20px; margin: 0;">Pemesanan kamar anda:</h2>
                                        <table style="width: 100%px;" id="table_pemesanan" border="1" width="100%;">
                                            <thead>
                                                <tr>
                                                    <th>Kamar</th>
                                                    <th>Jumlah</th>
                                                    <th style="width: 28%;">Tanggal</th>
                                                    <th>Total</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <tr>
                                                    <td>
                                                        <p style="margin: 0; padding:0; font-size: 12px;"><?= $kamar->nama_kamar; ?> No. <?= $kamar->no_kamar; ?></p>
                                                        <p style="margin: 0; padding:0; font-size: 12px;">Tipe: <?= check_tipe_kamar($kamar->tipe_kamar_id)->row()->nama_tipe_kamar; ?></p>
                                                        <p style="margin: 0; padding:0; font-size: 12px;"> Pesan: <?= $pesan_per_malam; ?> Malam</p>
                                                    </td>
                                                    <td>
                                                        <p style="margin: 0; padding:0; font-size: 12px;"> Dewasa: <?= $kamar->dewasa; ?></p>
                                                        <p style="margin: 0; padding:0; font-size: 12px;"> Anak: <?= $kamar->anak; ?></p>
                                                    </td>
                                                    <td>
                                                        <p style="margin: 0; padding:0; font-size: 12px;">
                                                            Check in: <?= get_tanggal_indo($reservasi->check_in); ?>
                                                        </p>
                                                        <p style="margin: 0; padding:0; font-size: 12px;">
                                                            Check out: <?= get_tanggal_indo($reservasi->check_out); ?>
                                                        </p>
                                                    </td>
                                                    <td>
                                                        <p style="margin: 0; padding:0; font-size: 12px; font-weight:bold; text-align:center;"> Rp. <?= number_format($pembayaran->total_bayar, 0); ?></p>
                                                    </td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </td>
                            </tr><!-- end: tr -->
                        </table>
                    </td>
                </tr><!-- end:tr -->
            </table>
            <table align="center" role="presentation" cellspacing="0" cellpadding="0" border="0" width="100%">
                <tr>
                    <td valign="middle" class="bg_white footer" style="padding-left: 40px; padding-right: 40px; width: 100%; padding-top: 30px;">
                        <table style="width: 100%;">
                            <tr>
                                <td style="width: 70%;">
                                    <h4 style="margin: 0; padding:0; font-size: 18px;">Terbilang:</h4>
                                    <h4 style="margin: 0; padding:0; font-size: 18px;"> <?= ucwords(terbilang($pembayaran->total_bayar)); ?> Rupiah</h4>
                                </td>
                                <td style="width: 30%;">
                                    <p>..........., <?= date('d-m-Y') ?></p>
                                    <p>&nbsp;</p>
                                    <strong><?= $konfigurasi->nama_sistem ?></strong>
                                </td>
                            </tr>
                        </table>
                    </td>
                </tr><!-- end: tr -->
                <tr>
                    <td class="bg_light" style="text-align: center;">
                        <p>&nbsp;</p>
                    </td>
                </tr>
                <tr>
                    <td class="bg_light" style="text-align: center;">
                        <p>&nbsp;</p>
                    </td>
                </tr>
            </table>

        </div>
    </center>
</body>

</html>