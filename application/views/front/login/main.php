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
        <div class="panel panel-default mt-3">
            <div class="panel-heading text-center">Histori Transaksi</div>
            <div class="panel-body">
                <div class="row" style="padding: 20px 0px;">
                    <!-- Contact Content -->
                    <div class="col-lg-12">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Reservasi</th>
                                        <th>Pembayaran</th>
                                        <th>Kamar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td></td>
                                    </tr>
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