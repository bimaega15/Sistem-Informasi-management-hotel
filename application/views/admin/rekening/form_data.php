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
                        <h5 class="card-title"><?= $page ?> Rekening</h5>
                        <a href="<?= base_url('Admin/Rekening') ?>" class="btn btn-outline-warning">Kembali</a>
                        <form action="<?= base_url('Admin/Rekening/process') ?>" method="post" class="mt-2" enctype="multipart/form-data">
                            <input type="hidden" name="id_rekening" value="<?= @$row->id_rekening; ?>">

                            <div class="form-group">
                                <label for="">No. Rekening</label>
                                <input type="number" min="0" class="form-control" placeholder="No. Rekening..." name="no_rekening" value="<?= $row->no_rekening != null ? $row->no_rekening : set_value('no_rekening') ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Rekening</label>
                                <input type="text" class="form-control" placeholder="Nama Rekening..." name="nama_rekening" value="<?= $row->nama_rekening != null ? $row->nama_rekening : set_value('nama_rekening') ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Nama Bank</label>
                                <input type="text" class="form-control" placeholder="Nama Bank..." name="nama_bank" value="<?= $row->nama_bank != null ? $row->nama_bank : set_value('nama_bank') ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input name="gambar_bank" type="file" class="form-control">
                                <?php if ($row->gambar_bank != null) {
                                    echo '<img class="w-25" src="' . base_url('images/rekening/' . $row->gambar_bank) . '"></img>';
                                } ?>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" name="<?= $page ?>" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>