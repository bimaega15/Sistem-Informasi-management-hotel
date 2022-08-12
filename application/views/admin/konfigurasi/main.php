<div class="page-content">
    <div class="page-info">
        <?= $breadcrumbs; ?>
        <div class="page-options">
            <button type="button" class="btn btn-primary"><?= $title; ?></button>
        </div>
    </div>
    <div class="main-wrapper">
        <div class="row">
            <div class="col-xl">
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
                        <h5 class="card-title">Data Konfigurasi</h5>
                        <form method="post" enctype="multipart/form-data" action="<?= base_url('Admin/Konfigurasi/process') ?>">
                            <input type="hidden" name="id_konfigurasi" value="<?= @$row->id_konfigurasi ?>">

                            <div class="form-group">
                                <label for="namaSistem">Nama Sistem</label>
                                <input name="nama_sistem" type="text" class="form-control" id="namaSistem" placeholder="Nama Sistem..." value="<?= $row->nama_sistem != null ? $row->nama_sistem : set_value('nama_sistem') ?>">
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="koordinat">Koordinat</label>
                                    <textarea name="koordinat" type="text" class="form-control" id="koordinat" placeholder="Koordinat...">
                                    <?= $row->koordinat != null ? $row->koordinat : set_value('koordinat') ?>
                                    </textarea>
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="alamat">Alamat</label>
                                    <input name="alamat" type="text" class="form-control" id="alamat" placeholder="Alamat..." value="<?= $row->alamat != null ? $row->alamat : set_value('alamat') ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="tentang">Tentang</label>
                                <textarea name="tentang" class="form-control" id="tentang" placeholder="Tentang..."><?= $row->tentang != null ? $row->tentang : set_value('tentang') ?></textarea>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="noTelepon">No.Telepon</label>
                                    <input name="no_telepon" type="number" class="form-control" id="noTelepon" placeholder="No. Telepon..." value="<?= $row->no_telepon != null ? $row->no_telepon : set_value('no_telepon') ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="email">Email</label>
                                    <input name="email" id="email" type="text" class="form-control" placeholder="Email..." value="<?= $row->email != null ? $row->email : set_value('email') ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="facebook">Facebook</label>
                                    <input name="facebook" type="text" class="form-control" id="facebook" placeholder="Facebook..." value="<?= $row->facebook != null ? $row->facebook : set_value('facebook') ?>">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="instagram">Instagram</label>
                                    <input name="instagram" type="text" class="form-control" id="instagram" placeholder="Instagram..." value="<?= $row->instagram != null ? $row->instagram : set_value('instagram') ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="twitter">Twitter</label>
                                    <input name="twitter" id="twitter" type="text" class="form-control" placeholder="Twitter..." value="<?= $row->twitter != null ? $row->twitter : set_value('twitter') ?>">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="copyright">Copyright</label>
                                    <input name="copyright" type="text" class="form-control" id="copyright" placeholder="Copyright..." value="<?= $row->copyright != null ? $row->copyright : set_value('copyright') ?>">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Link Youtube</label>
                                <input name="link_yt" type="text" class="form-control" id="link_yt" placeholder="Link Youtube..." value="<?= $row->link_yt != null ? $row->link_yt : set_value('link_yt') ?>">
                            </div>
                            <div class="form-group">
                                <label for="gambar">Gambar</label>
                                <input class="form-control" name="gambar_sistem" id="gambar" type="file">
                                <?php if ($row->gambar_sistem != null) {
                                    echo '
                                    <a href="' . base_url('images/konfigurasi/' . $row->gambar_sistem) . '" target="_blank">
                                        <img class="w-25" src="' . base_url('images/konfigurasi/' . $row->gambar_sistem) . '"></img>
                                    </a>';
                                } ?>
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