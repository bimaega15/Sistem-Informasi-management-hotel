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
                        <h5 class="card-title text-uppercase"><?= $page ?> Gambar Galeri</h5>
                        <a href="<?= base_url('Admin/Galeri') ?>" class="btn btn-outline-warning">Kembali</a>
                        <form action="<?= base_url('Admin/Galeri/process') ?>" method="post" class="mt-3" enctype="multipart/form-data">
                            <input type="hidden" name="id_galeri" value="<?= $row->id_galeri; ?>">
                            <div class="form-group">
                                <label for="">Nama Galeri</label>
                                <input placeholder="Nama galeri..." type="text" name="nama_galeri" class="form-control" id="" value="<?= $row->nama_galeri != null ? $row->nama_galeri : set_value('nama_galeri') ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="gambar_galeri" class="form-control">
                                <?php if ($row->gambar_galeri != null) {
                                    echo '<img class="w-25" src="' . base_url('images/galeri/' . $row->gambar_galeri) . '"></img>';
                                } ?>
                            </div>

                            <div class="form-group">
                                <button type="reset" class="btn btn-danger"> Reset</button>
                                <button type="submit" name="<?= $page; ?>" class="btn btn-success"> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>