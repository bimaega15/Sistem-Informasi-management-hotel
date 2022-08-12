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
                        <h5 class="card-title">Data Rekening</h5>
                        <a href="<?= base_url('Admin/Rekening/add') ?>" class="btn btn-outline-primary">Tambah Data</a>
                        <div class="table-responsive mt-3">
                            <table id="zero-conf" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>No. Rekening</th>
                                        <th>Nama Rekening</th>
                                        <th>Nama Bank</th>
                                        <th width="15%;">Gambar</th>
                                        <th width="15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($result as $row) { ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $row->no_rekening; ?></td>
                                            <td><?= $row->nama_rekening; ?></td>
                                            <td><?= $row->nama_bank; ?></td>
                                            <td>
                                                <a target="_blank" href="<?= base_url('images/rekening/' . $row->gambar_bank) ?>">
                                                    <img src="<?= base_url('images/rekening/' . $row->gambar_bank) ?>" width="100%;" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cog"></i> Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="<?= base_url('Admin/Rekening/edit/' . $row->id_rekening) ?>">Edit</a>
                                                    <a class="dropdown-item" href="<?= base_url('Admin/Rekening/delete/' . $row->id_rekening) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                                                </div>
                                            </td>
                                        </tr>
                                    <?php  } ?>
                                </tbody>
                            </table>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>