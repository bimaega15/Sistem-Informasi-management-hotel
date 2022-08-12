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
                        <h5 class="card-title">Data Users</h5>
                        <a href="<?= base_url('Admin/Users/add') ?>" class="btn btn-outline-primary">Tambah Data</a>
                        <div class="table-responsive mt-3">
                            <table id="zero-conf" class="display" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>Nama Users</th>
                                        <th>Level</th>
                                        <th>Username</th>
                                        <th>J.K</th>
                                        <th width="10%;">Gambar</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1;
                                    foreach ($result as $row) { ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= $row->nama_users; ?></td>
                                            <td><?= $row->level ?></td>
                                            <td><?= $row->username ?></td>
                                            <td><?= $row->jenis_kelamin == 'P' ? "Pria" : "Wanita"; ?></td>
                                            <td>
                                                <a href="<?= base_url('images/users/' . $row->gambar) ?>" target="_blank">
                                                    <img width="100%;" src="<?= base_url('images/users/' . $row->gambar) ?>" alt="">
                                                </a>
                                            </td>
                                            <td>
                                                <button class="btn btn-info dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fas fa-cog"></i> Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="<?= base_url('Admin/Users/edit/' . $row->id_users) ?>">Edit</a>
                                                    <a class="dropdown-item" href="<?= base_url('Admin/Users/delete/' . $row->id_users) ?>" onclick="return confirm('Yakin ingin menghapus data ini?')">Delete</a>
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