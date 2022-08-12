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
                        <h5 class="card-title text-uppercase"><?= $page ?> Gambar Kamar</h5>
                        <a href="<?= base_url('Admin/Gambarkamar') ?>" class="btn btn-outline-warning">Kembali</a>
                        <form action="<?= base_url('Admin/Gambarkamar/process') ?>" method="post" class="mt-3" enctype="multipart/form-data">
                            <input type="hidden" name="id_gambar_kamar" value="<?= $row->id_gambar_kamar; ?>">
                            <div class="form-group">
                                <label for="">Kamar</label>
                                <select name="kamar_id" class="form-control" id="">
                                    <option value="">-- KAMAR --</option>
                                    <?php foreach ($kamar as $obj) { ?>
                                        <option value="<?= $obj->id_kamar ?>" <?php
                                                                                if ($row->kamar_id != null) {
                                                                                    if ($row->kamar_id == $obj->id_kamar) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                } else {
                                                                                    if (set_value('kamar_id') == $obj->id_kamar) {
                                                                                        echo 'selected';
                                                                                    }
                                                                                }
                                                                                ?>><?= $obj->nama_tipe_kamar ?> | <?= $obj->nama_kamar ?> | <?= $obj->nama_status_kamar ?></option>

                                    <?php  } ?>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <?php if ($page == 'tambah') { ?>
                                    <input type="file" name="gambar_kamar[]" multiple class="form-control">

                                <?php } else { ?>

                                    <input type="file" name="gambar_kamar" class="form-control">
                                <?php } ?>
                                <?php if ($row->gambar_kamar != null) {
                                    echo '<img class="w-25" src="' . base_url('images/gambarkamar/' . $row->gambar_kamar) . '"></img>';
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