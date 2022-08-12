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
                        <h5 class="card-title">Data Fasilitas</h5>
                        <a href="<?= base_url('Admin/Fasilitas/add') ?>" class="btn btn-outline-primary">Tambah Data</a>
                        <div class="table-responsive mt-3">
                            <table id="zero-conf" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Fasilitas</th>
                                        <th>Icon</th>
                                        <th>Kamar</th>
                                        <th width="10%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($result as $row) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row->nama_fasilitas; ?></td>
                                            <?php
                                            $icon = check_icon($row->icon_fasilitas)->row()->nama_icon;
                                            ?>
                                            <td><i class="<?= $icon; ?> fa-2x"></i></td>
                                            <td>
                                                <ul class="list-group">
                                                    <li class="list-group-item"><?= $row->nama_kamar; ?></li>
                                                    <li class="list-group-item"> <a href="#" class="btn btn-sm btn-info btn-detail" data-url="<?= base_url('Admin/Kamar/detailKamar/' . $row->id_kamar) ?>" data-toggle="modal" data-target=".modalShowKamar">Detail</a></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cog"></i> Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="<?= base_url('Admin/Fasilitas/edit/' . $row->id_fasilitas) ?>">Edit</a>
                                                    <a class="dropdown-item" href="<?= base_url('Admin/Fasilitas/delete/' . $row->id_fasilitas) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                                                </div>
                                            </td>
                                        </tr>

                                    <?php } ?>
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
                            <td><span class="icon_id"></span></td>
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