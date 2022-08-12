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
                        <h5 class="card-title">Data Pelanggan</h5>
                        <!-- <button type="button" class="btn btn-outline-primary">Tambah Data</button> -->
                        <div class="table-responsive mt-3">
                            <table id="zero-conf" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>ID Pelanggan</th>
                                        <th>Contact</th>
                                        <th width="15%;">Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($result as $v_result) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td>
                                                <ul class="list-group">
                                                    <li class="list-group-item">Nama : <?= $v_result->nama ?></li>
                                                    <li class="list-group-item">Username : <?= $v_result->username ?></li>
                                                    <li class="list-group-item">J.K : <?= $v_result->jenis_kelamin == 'L' ? 'Laki laki' : 'Perempuan' ?></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <ul class="list-group">
                                                    <li class="list-group-item">No. HP : <?= $v_result->no_hp ?></li>
                                                    <li class="list-group-item">Email : <?= $v_result->email ?></li>
                                                    <li class="list-group-item">Alamat : <?= $v_result->alamat  ?></li>
                                                </ul>
                                            </td>
                                            <td>
                                                <a href="<?= base_url('images/tamu/' . $v_result->gambar) ?>" target="_blank">
                                                    <img src="<?= base_url('images/tamu/' . $v_result->gambar) ?>" width="50%;" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cog"></i> Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="<?= base_url('Admin/Pelanggan/delete/' . $v_result->id_tamu) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
                                                </div>
                                            </td>
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