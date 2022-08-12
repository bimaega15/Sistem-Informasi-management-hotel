<div class="page-content">
    <div class="page-info">
        <?= $breadcrumbs; ?>
        <div class="page-options">
            <button type="button" class="btn btn-primary"><?= $title; ?></button>
        </div>
    </div>
    <div class="main-wrapper">
        <div class="row stats-row">
            <div class="col-lg-4 col-md-12">
                <div class="card card-white stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title"><?= $check_in ?><span class="stats-change stats-change-danger"></span></h5>
                            <p class="stats-text">Check In</p>
                        </div>
                        <div class="stats-icon bg-primary text-white">
                            <i class="material-icons">east</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card card-white stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title"><?= $check_out ?><span class="stats-change stats-change-danger"></span></h5>
                            <p class="stats-text">Check Out</p>
                        </div>
                        <div class="stats-icon bg-success text-white">
                            <i class="material-icons">west</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-12">
                <div class="card card-white stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title"><?= $booking ?><span class="stats-change stats-change-danger"></span></h5>
                            <p class="stats-text">Booking</p>
                        </div>
                        <div class="stats-icon bg-info text-white">
                            <i class="material-icons">message</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card card-white stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title">Rp. <?= rupiah($transaksi_today->total_bayar_today) ?><span class="stats-change stats-change-danger"></span></h5>
                            <p class="stats-text">Transaksi Hari ini</p>
                        </div>
                        <div class="stats-icon bg-success text-white">
                            <i class="material-icons">attach_money</i>

                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card card-white stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title">Rp. <?= rupiah($transaksi_month->total_bayar_month) ?><span class="stats-change stats-change-danger"></span></h5>
                            <p class="stats-text">Transaksi Bulan Ini</p>
                        </div>
                        <div class="stats-icon bg-success text-white">
                            <i class="material-icons">monetization_on</i>
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card card-white stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title"><?= $tamu ?><span class="stats-change stats-change-danger"></span></h5>
                            <p class="stats-text">Pelanggan</p>
                        </div>
                        <div class="stats-icon bg-info text-white">
                            <i class="material-icons">person_outline</i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card card-white stats-card">
                    <div class="card-body">
                        <div class="stats-info">
                            <h5 class="card-title"><?= $kamar ?><span class="stats-change stats-change-danger"></span></h5>
                            <p class="stats-text">Kamar</p>
                        </div>
                        <div class="stats-icon bg-info text-white">
                            <i class="material-icons">home</i>
                        </div>
                    </div>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-lg-12">
                <figure class="highcharts-figure">
                    <div id="container-chart"></div>
                </figure>
            </div>

        </div>
    </div>
</div>