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
                        <h5 class="card-title text-uppercase"><?= $page ?> Tipe Kamar</h5>
                        <a href="<?= base_url('Admin/Tipe') ?>" class="btn btn-outline-warning">Kembali</a>
                        <form action="<?= base_url('Admin/Tipe/process') ?>" method="post" class="mt-3">
                            <input type="hidden" name="id_tipe_kamar" value="<?= @$row->id_tipe_kamar; ?>">
                            <div class="form-group">
                                <label for="">Nama Tipe Kamar</label>
                                <input type="text" name="nama_tipe_kamar" class="form-control" placeholder="Nama Tipe Kamar..." value="<?= $row->nama_tipe_kamar != null ? $row->nama_tipe_kamar : set_value('nama_tipe_kamar') ?>">
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger"> Reset</button>
                                <button type="submit" name="<?= $page ?>" class="btn btn-success"> Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>