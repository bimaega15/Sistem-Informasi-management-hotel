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
                        <h5 class="card-title text-uppercase"><?= $page ?> Icon</h5>
                        <a href="<?= base_url('Admin/Icon') ?>" class="btn btn-outline-warning">Kembali</a>
                        <form action="<?= base_url('Admin/Icon/process') ?>" method="post" class="mt-3">
                            <input type="hidden" name="id_icon" value="<?= @$row->id_icon; ?>">
                            <div class="form-group">
                                <label for="">Icon</label>
                                <input type="text" name="nama_icon" class="form-control" placeholder="Nama Icon..." value="<?= $row->nama_icon != null ? $row->nama_icon : set_value('nama_icon') ?>">
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