<?php
$profile = check_profile();
?>
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
                <div class="card top-products">
                    <div class="card-body">
                        <h5 class="card-title">My Profile<span class="card-title-helper">
                                <i class="fas fa-user"></i>
                            </span></h5>
                        <img src="<?= base_url('images/users/' . $profile->gambar) ?>" width="100%" alt="Gambar Profile">
                        <div class="top-products-list">
                            <div class="product-item">
                                <h5>Nama Users</h5>
                                <span><?= $profile->nama_users; ?></span>
                            </div>
                            <div class="product-item">
                                <h5>Username</h5>
                                <span><?= $profile->username ?></span>
                            </div>
                            <div class="product-item">
                                <h5>Level</h5>
                                <span><?= $profile->level; ?></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8 col-md-12">
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
                        <h5 class="card-title">FORM PROFILE <i class="fas fa-pencil-alt"></i></h5>
                        <form method="post" action="<?= base_url('Admin/Profile/process') ?>" enctype="multipart/form-data">
                            <input type="hidden" name="id_users" value="<?= $profile->id_users; ?>">
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="inputusername4">Username</label>
                                    <input name="username" type="text" class="form-control" id="inputusername4" placeholder="Username..." value="<?= $profile->username; ?>">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="inputPassword4">Password</label>
                                    <input type="password" class="form-control" id="inputPassword4" placeholder="Password...">
                                    <input type="hidden" name="old_password" value="<?= $profile->password; ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="inputnama_users">Nama Lengkap</label>
                                <input name="nama_users" type="text" class="form-control" id="inputnama_users" placeholder="Nama Lengkap..." value="<?= $profile->nama_users; ?>">
                            </div>
                            <div class="form-group">
                                <label for="jenisKelamin">Jenis Kelamin</label>
                                <select name="jenis_kelamin" class="custom-select form-control">
                                    <option selected="">Select Jenis Kelamin...</option>
                                    <option value="P" <?= $profile->jenis_kelamin == 'P' ? 'selected' : '' ?>>Pria</option>
                                    <option value="W" <?= $profile->jenis_kelamin == 'W' ? 'selected' : '' ?>>Wanita</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input type="file" class="form-control" name="gambar">
                                <?php if ($profile->gambar != null) {
                                    echo '<img class="w-25" src="' . base_url('images/users/' . $profile->gambar) . '"></img>';
                                }  ?>
                            </div>

                            <button type="reset" class="btn btn-danger">Reset</button>
                            <button type="submit" name="<?= $page; ?>" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>