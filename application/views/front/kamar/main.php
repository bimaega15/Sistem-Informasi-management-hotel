<main class="site-main page-spacing">
    <!-- Page Banner -->
    <div class="container-fluid page-banner about-banner">
        <div class="container">
            <h3>booking</h3>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('') ?>">Home</a></li>
                <li class="active">booking</li>
            </ol>
        </div>
    </div><!-- Page Banner /- -->

    <div class="section-padding"></div>

    <!-- Container -->
    <div class="container-fluid">
        <div class="row">
            <!-- Widget Area -->
            <div class="col-md-4 col-sm-4 col-xs-12 widget-area">
                <!-- Features Widget -->
                <aside class="widget widget_features">
                    <h3 class="widget-title">Filter</h3>
                    <form action="<?= base_url('Front/Kamar/index') ?>" method="get">
                        <div class="form-group">
                            <label for="dari_tanggal">Dari Tanggal</label>
                            <input name="dari_tanggal" type="text" class="form-control" id="datepicker1" placeholder="Dari Tanggal..." p />
                        </div>
                        <div class="form-group">
                            <label for="sampai_tanggal">Sampai Tanggal</label>
                            <input name="sampai_tanggal" type="text" class="form-control" id="datepicker2" placeholder="Sampai Tanggal..." />
                        </div>
                        <div class="form-group">
                            <label for="harga">Harga</label>
                            <section class="range-slider">
                                <span class="rangeValues"></span>
                                <input name="dari_harga" value="0" min="0" max="1000000" step="50000" type="range">
                                <input name="sampai_harga" value="100000" min="0" max="1000000" step="50000" type="range">
                            </section>
                        </div>
                        <div class="form-group">
                            <label for="">Kamar</label>
                            <select name="berapa_kamar" class="selectpicker form-control">
                                <option value="">-- BERAPA KAMAR--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="">Orang</label>
                            <select name="berapa_orang" class="selectpicker form-control">
                                <option value="">-- BERAPA ORANG--</option>
                                <option value="1">1</option>
                                <option value="2">2</option>
                                <option value="3">3</option>
                                <option value="4">4</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary form-control py-3" style="padding-bottom: 30px;"><i class="fas fa-save"></i> Submit</button>
                        </div>
                    </form>
                </aside><!-- Features Widget -->
            </div><!-- Widget Area /- -->
            <!-- Contenta Area -->
            <div class="col-md-8 col-sm-8 col-xs-12 content-area">
                <h3 class="widget-title">Daftar Kamar</h3>
                <span>Temukan kamar yang sesuai dengan keinginan anda</span>
                <br>
                <!-- <?php if ($count != null) : ?>
                    <b style="font-size: 20px;">Ditemukan <?= $count ?> data</b>

                <?php endif; ?> -->
                <br>
                <?php foreach ($result as $v_kamar) : ?>
                    <div class="p-3">
                        <div class="row">
                            <div class="col-lg-4">
                                <a href="<?= base_url('images/gambarkamar/' . checkGambarKamar($v_kamar->id_kamar)->gambar_kamar) ?>" target="_blank">
                                    <img style="width:100%;" src="<?= base_url('images/gambarkamar/' . checkGambarKamar($v_kamar->id_kamar)->gambar_kamar) ?>" alt="">
                                </a>
                            </div>
                            <div class="col-lg-8">
                                <strong style="font-size: 20px;"><?= $v_kamar->nama_kamar; ?></strong>
                                <span class="badge badge-primary pull-right"> NO. Kamar <?= $v_kamar->no_kamar; ?></span>
                                <br>
                                <span style="font-size: 16px;">Status Kamar : </span> <span class="badge badge-info"><?= checkStatusKamar($v_kamar->status_kamar_id)->nama_status_kamar; ?></span><br>
                                <span style="font-size: 16px;" class="badge badge-primary">Rp. <?= rupiah($v_kamar->harga) ?></span> <br><br>
                                <!-- <div class="star">
                                    <span>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    <span>
                                        <i class="fas fa-star"></i>
                                    </span>
                                    |
                                    <span>358 Reviews</span>
                                    <br> <br>
                                </div> -->
                                <div class="fasilitas">
                                    <?php foreach (checkFasilitas($v_kamar->id_kamar) as $r_fasilitas) : ?>
                                        <span>
                                            <i class="<?= check_icon($r_fasilitas->icon_id)->row()->nama_icon; ?> fa-2x"></i>
                                        </span>
                                    <?php endforeach; ?>
                                </div>

                                <a href="<?= base_url('Front/Kamar/detail/' . $v_kamar->id_kamar) ?>" class="border border-primary"> <i class="fas fa-eye"></i> Lihat Detail</a>
                            </div>
                        </div>

                    </div>
                <?php endforeach; ?>
                <div class="row">
                    <div class="col-lg-12 d-flex justify-content-center">
                        <?= $pagination_link; ?>
                    </div>
                </div>
            </div><!-- Contenta Area /- -->

        </div>
    </div><!-- Container /- -->

    <div class="section-padding"></div>
</main>