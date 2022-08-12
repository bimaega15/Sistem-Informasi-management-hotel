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
                        <h5 class="card-title text-uppercase"><?= $page ?> Fasilitas</h5>
                        <a href="<?= base_url('Admin/Fasilitas') ?>" class="btn btn-outline-warning">Kembali</a>
                        <form action="<?= base_url('Admin/Fasilitas/process') ?>" method="post" class="mt-3">
                            <input type="hidden" name="id_fasilitas" value="<?= $row->id_fasilitas; ?>">
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
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Nama Fasilitas</label>
                                        <input type="text" name="nama_fasilitas" class="form-control" placeholder="Nama Fasilitas..." value="<?= $row->nama_fasilitas != null ? $row->nama_fasilitas : set_value('nama_fasilitas') ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Icon</label> <br>
                                        <?php foreach ($icon as $key => $v_icon) { ?>
                                            <div class="form-check form-check-inline">
                                                <input class="form-check-input" type="radio" name="icon_id" id="icon_id<?= $key ?>" value="<?= $v_icon->id_icon; ?>" <?= $row->icon_fasilitas == $v_icon->id_icon ? 'checked' : '' ?>>
                                                <label class="form-check-label" for="icon_id<?= $key ?>">
                                                    <i class="<?= $v_icon->nama_icon; ?> fa-2x"></i>
                                                </label>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
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