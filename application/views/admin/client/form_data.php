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
                        <h5 class="card-title text-uppercase"><?= $page ?> Gambar Client</h5>
                        <a href="<?= base_url('Admin/Client') ?>" class="btn btn-outline-warning">Kembali</a>
                        <form action="<?= base_url('Admin/Client/process') ?>" method="post" class="mt-3" enctype="multipart/form-data">
                            <input type="hidden" name="id_client" value="<?= $row->id_client; ?>">
                            <div class="form-group">
                                <label for="">Nama Client</label>
                                <input placeholder="Nama Client..." type="text" name="nama_client" class="form-control" id="" value="<?= $row->nama_client != null ? $row->nama_client : set_value('nama_client') ?>">
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="keterangan" class="form-control" id="" placeholder="Keterangan"  rows="10"><?= $row->keterangan != null ? $row->keterangan : set_value('keterangan') ?></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="gambar_client" class="form-control">
                                <?php if ($row->gambar_client != null) {
                                    echo '<img class="w-25" src="' . base_url('images/client/' . $row->gambar_client) . '"></img>';
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
