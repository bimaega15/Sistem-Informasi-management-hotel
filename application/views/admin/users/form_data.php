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
                    <?php if (validation_errors()) : ?>
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            <?= validation_errors() ?>
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    <?php endif; ?>
                    <div class="card-body">
                        <h5 class="card-title"><?= $page ?> Users</h5>
                        <a href="<?= base_url('Admin/Users') ?>" class="btn btn-outline-warning">Kembali</a>
                        <form action="<?= base_url('Admin/Users/process') ?>" method="post" class="mt-2">
                            <input type="hidden" name="id_users" value="<?= @$row->id_users; ?>">
                            <div class="form-group">
                                <label for="">Nama Users</label>
                                <input type="text" class="form-control" placeholder="Nama Users..." name="nama_users" value="<?= $row->nama_users != null ? $row->nama_users : set_value('nama_users') ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Level</label>
                                <select class="form-control" name="level">
                                    <option value=""> -- Level -- </option>
                                    <option value="admin" <?php
                                                            if ($row->level != null) {
                                                                if ($row->level == 'admin') {
                                                                    echo 'selected';
                                                                }
                                                            } else {
                                                                if (set_value('level') == 'admin') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>> Admin </option>
                                    <option value="manager" <?php
                                                            if ($row->level != null) {
                                                                if ($row->level == 'manager') {
                                                                    echo 'selected';
                                                                }
                                                            } else {
                                                                if (set_value('level') == 'manager') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>> Manager </option>
                                    <option value="kasir" <?php
                                                            if ($row->level != null) {
                                                                if ($row->level == 'kasir') {
                                                                    echo 'selected';
                                                                }
                                                            } else {
                                                                if (set_value('level') == 'kasir') {
                                                                    echo 'selected';
                                                                }
                                                            }
                                                            ?>> Kasir </option>
                                </select>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Username</label>
                                        <input type="text" class="form-control" name="username" placeholder="Username..." value="<?= $row->username != null ? $row->username : set_value('username') ?>">
                                        <input type="hidden" name="password_old" value="<?= $row->password; ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control" name="password" placeholder="Password...">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Jenis Kelamin</label>
                                <div class="custom-control custom-radio">
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelaminp" value="P" <?php
                                                                                                                                        if ($row->jenis_kelamin != null) {
                                                                                                                                            if ($row->jenis_kelamin == 'P') {
                                                                                                                                                echo 'checked';
                                                                                                                                            }
                                                                                                                                        } else {
                                                                                                                                            if (set_value('jenis_kelamin') == 'P') {
                                                                                                                                                echo 'checked';
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                        ?>>
                                        <label class="form-check-label" for="jenis_kelaminp">Pria</label>
                                    </div>
                                    <div class="form-check form-check-inline">
                                        <input class="form-check-input" type="radio" name="jenis_kelamin" id="jenis_kelaminw" value="W" <?php
                                                                                                                                        if ($row->jenis_kelamin != null) {
                                                                                                                                            if ($row->jenis_kelamin == 'W') {
                                                                                                                                                echo 'checked';
                                                                                                                                            }
                                                                                                                                        } else {
                                                                                                                                            if (set_value('jenis_kelamin') == 'W') {
                                                                                                                                                echo 'checked';
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                        ?>>
                                        <label class="form-check-label" for="jenis_kelaminw">Wanita</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input name="gambar" type="file" class="form-control">
                                <?php
                                if ($row->gambar != null) {
                                    echo '<img src="' . base_url('images/users/' . $row->gambar) . '" class="w-25"></img>';
                                }
                                ?>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" name="<?= $page; ?>" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>