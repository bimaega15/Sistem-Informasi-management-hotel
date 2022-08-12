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
                        <h5 class="card-title">Data Hotel</h5>
                        <form action="<?= base_url('Admin/Hotel/process') ?>" method="post" class="mt-2" enctype="multipart/form-data">
                            <input type="hidden" name="id_hotel" value="<?= @$row->id_hotel; ?>">
                            <div class="form-group">
                                <label for="">Nama Hotel</label>
                                <input type="text" class="form-control" placeholder="Nama Hotel..." name="nama_hotel" value="<?= $row->nama_hotel != null ? $row->nama_hotel : set_value('nama_hotel') ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Koordinat Hotel</label>
                                        <input type="text" name="koordinat_hotel" class="form-control" placeholder="Koordinat Hotel..." value="<?= $row->koordinat_hotel != null ? $row->koordinat_hotel : set_value('koordinat_hotel') ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Alamat Hotel</label>
                                        <textarea class="form-control" placeholder="Alamat Hotel..." name="alamat_hotel"><?= $row->alamat_hotel != null ? $row->alamat_hotel : set_value('alamat_hotel') ?></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Email Hotel</label>
                                        <input type="text" name="email_hotel" class="form-control" placeholder="Email Hotel..." value="<?= $row->email_hotel != null ? $row->email_hotel : set_value('email_hotel') ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">No Telepon Hotel</label>
                                        <input type="number" name="no_telepon_hotel" class="form-control" placeholder="No. Telepon Hotel..." value="<?= $row->no_telepon_hotel != null ? $row->no_telepon_hotel : set_value('no_telepon_hotel') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Gambar Hotel</label>
                                <input type="file" name="gambar_hotel" class="form-control">
                                <?php 
                                    if ($row->gambar_hotel != null) {
                                        echo '
                                        <a target="_blank" href="' . base_url('images/hotel/' . $row->gambar_hotel) . '">
                                            <img class="w-25" src="' . base_url('images/hotel/' . $row->gambar_hotel) . '"></img>
                                        </a>';
                                    }
                                 ?>
                            </div>
                            <div class="form-group">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>