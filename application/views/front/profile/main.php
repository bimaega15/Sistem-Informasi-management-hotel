<?php
$profile = check_profile_tamu();
?>
<main class="site-main page-spacing">
    <!-- Page Banner -->
    <div class="container-fluid page-banner about-banner">
        <div class="container">
            <h3>My Profile</h3>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('') ?>">Home</a></li>
                <li class="active">Profile</li>
            </ol>
        </div>
    </div><!-- Page Banner /- -->
    <div class="section-padding"></div>
    <!-- profile Section -->
    <div id="profile-section" class="profile-section container-fluid no-padding">
        <div class="container">
            <!-- Section Header -->
            <div class="section-header">
                <h3>My Account</h3>
            </div><!-- Section Header /- -->
            <div class="row">
                <div class="col-md-4 col-sm-6 col-xs-6 srv-left animated fadeInLeft">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><i class="fas fa-pencil-alt"></i> Profile</div>
                        <div class="panel-body">
                            <img src="<?= base_url('images/tamu/' . $profile->gambar) ?>" height="450px;" width="100%" alt="gambar saya">

                            <ul class="list-group">
                                <li class="list-group-item">
                                    Username <span class="pull-right"><?= $profile->username; ?></span>
                                </li>
                                <li class="list-group-item">
                                    Nama <span class="pull-right"><?= $profile->nama; ?></span>
                                </li>
                                <li class="list-group-item">
                                    No. Handphone <span class="pull-right"><?= $profile->no_hp; ?></span>
                                </li>
                                <li class="list-group-item">
                                    Email <span class="pull-right"><?= $profile->email; ?></span>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-8 col-sm-6 col-xs-6 srv-img animated zoomIn">
                    <div class="panel panel-primary">
                        <div class="panel-heading"><i class="fas fa-pencil-alt"></i> My Form</div>
                        <div class="panel-body">
                            <form action="<?= base_url('Front/Profile/process') ?>" method="post" enctype="multipart/form-data">
                                <input type="hidden" name="password_old" value="<?= $profile->password; ?>">
                                <input type="hidden" name="id_tamu" value="<?= $profile->id_tamu; ?>">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Nama</label>
                                            <input type="text" name="nama" class="form-control" placeholder="Nama..." value="<?= $profile->nama ?>">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Email</label>
                                            <input type="email" name="email" class="form-control" placeholder="Email..." value="<?= $profile->email; ?>">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">No. Handphone</label>
                                    <input type="number" min="0" name="no_hp" class="form-control" placeholder="no_hp..." value="<?= $profile->no_hp; ?>">
                                </div>
                                <div class="form-group">
                                    <label for="">Alamat</label>
                                    <textarea name="alamat" class="form-control" placeholder="Alamat..."><?= $profile->alamat; ?></textarea>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Password</label>
                                            <input type="text" name="password" class="form-control" placeholder="Password...">
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <div class="form-group">
                                            <label for="">Ulangi Password</label>
                                            <input type="text" name="konfirmasi_password" class="form-control" placeholder="Konfirmasi Password...">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label for="">Jenis Kelamin</label><br>
                                    <label class="radio-inline">
                                        <input type="radio" name="jenis_kelamin" id="inlineRadio1" value="L" <?= $profile->jenis_kelamin == 'L' ? 'checked' : '' ?>> Laki laki
                                    </label>
                                    <label class="radio-inline">
                                        <input type="radio" name="jenis_kelamin" id="inlineRadio2" value="P" <?= $profile->jenis_kelamin == 'P' ? 'checked' : '' ?>> Perempuan
                                    </label>
                                </div>
                                <div class="form-group">
                                    <label for="">Upload Foto</label>
                                    <input type="file" name="gambar" class="form-control">
                                </div>
                                <div class="form-group">
                                    <button type="reset" class="btn btn-danger"><i class="fas fa-window-close"></i> Reset</button>
                                    <button type="submit" class="btn btn-success"><i class="fas fa-save"></i> Submit</button>
                                </div>

                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div><!-- Profile Section /- -->


</main>