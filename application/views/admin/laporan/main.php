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
                        <h5 class="card-title">Data Laporan</h5>
                        <form action="<?= base_url('Admin/Laporan') ?>" method="get">
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" name="dari_tanggal" class="form-control mydatepicker" placeholder="Dari Tanggal..." value="<?= $dari_tanggal; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <input type="text" name="sampai_tanggal" class="form-control mydatepicker" placeholder="Sampai Tanggal..." value="<?= $sampai_tanggal; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary"> <i class="fas fa-search"></i> Search</button>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <a target="_blank" href="<?= base_url('Admin/Laporan/cetakPdf?dari_tanggal=' . $dari_tanggal . '&sampai_tanggal=' . $sampai_tanggal) ?>" class="btn btn-danger"><i class="fas fa-file-pdf"></i> PDF</a>
                        <div class="table-responsive mt-3">
                            <table id="zero-conf" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th width="10%;">No.</th>
                                        <th>Reservasi</th>
                                        <th>Kamar</th>
                                        <th>ID Tamu</th>
                                        <th>Total Bayar</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($result as $v_result) :
                                    ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td>
                                                <ul class="list-form">
                                                    <li>Check In : <br> <span class=""><?= $v_result->check_in; ?> </li>
                                                    <li>Check Out : <br> <span class=""><?= $v_result->check_out; ?> </li>
                                                </ul>

                                            </td>
                                            <td>
                                                <ul class="list-form">
                                                    <li>Nama : <br> <span class=""><?= $v_result->nama_kamar; ?> </li>
                                                    <li>No. : <br> <span class=""><?= $v_result->no_kamar; ?> </li>
                                                    <li>Tipe : <br> <span class=""><?= checkTipeKamar($v_result->tipe_kamar_id)->nama_tipe_kamar; ?> </li>
                                                </ul>

                                            </td>
                                            <td>
                                                <ul class="list-form">
                                                    <li>Nama: <br> <span class=""><?= $v_result->nama_depan; ?> <?= $v_result->nama_belakang; ?></li>
                                                    <li>No. HP: <br> <span class=""><?= $v_result->no_hp; ?> </li>
                                                    <li>Email: <br> <span class=""><?= $v_result->email; ?> </li>
                                                </ul>
                                            </td>
                                            <td><?= rupiah($v_result->total_bayar) ?></td>
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

<div class="modal fade modalShowKamar" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalShowKamar"><i class="fas fa-hotel"></i> DETAIL KAMAR</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <i class="material-icons">close</i>
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
                            <td>Tipe Kamar</td>
                            <td>:</td>
                            <td><span class="nama_tipe_kamar"></span></td>
                        </tr>
                        <tr>
                            <td>Icon Kamar</td>
                            <td>:</td>
                            <td><span class="icon_kamar"></span></td>
                        </tr>
                        <tr>
                            <td>Status Kamar</td>
                            <td>:</td>
                            <td><span class="nama_status_kamar"></span></td>
                        </tr>
                        <tr>
                            <td>Keterangan</td>
                            <td>:</td>
                            <td><span class="keterangan"></span></td>
                        </tr>
                        <tr>
                            <td>Slider</td>
                            <td>:</td>
                            <td><span class="slider"></span></td>
                        </tr>
                        <tr>
                            <td>Rekomendasi</td>
                            <td>:</td>
                            <td><span class="rekomendasi"></span></td>
                        </tr>
                        <tr>
                            <td>Penawaran</td>
                            <td>:</td>
                            <td><span class="penawaran"></span></td>
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
                <button type="button" class="btn btn-success" data-dismiss="modal"><i class="fas fa-check"></i> OK</button>
            </div>
        </div>
    </div>
</div>