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
                        <h5 class="card-title"><?= $page ?> Kamar</h5>
                        <a href="<?= base_url('Admin/Kamar') ?>" class="btn btn-outline-warning">Kembali</a>
                        <form action="<?= base_url('Admin/Kamar/process') ?>" method="post" class="mt-2" enctype="multipart/form-data">
                            <input type="hidden" name="id_kamar" value="<?= @$row->id_kamar ?>">
                            <input type="hidden" name="hotel_id" value="<?= $hotel->id_hotel ?>">
                            <div class="form-group">
                                <label for="">Hotel</label>
                                <input type="text" class="form-control" placeholder="Hotel..." readonly value="<?= $hotel->nama_hotel; ?>">
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Status Kamar</label>
                                        <select name="status_kamar_id" class="form-control">
                                            <option value="">--Status Kamar--</option>
                                            <?php foreach ($status as $obj) { ?>
                                                <option value="<?= $obj->id_status_kamar ?>" <?php
                                                                                                if ($row->status_kamar_id != null) {
                                                                                                    if ($row->status_kamar_id == $obj->id_status_kamar) {
                                                                                                        echo 'selected';
                                                                                                    }
                                                                                                } else {
                                                                                                    if (set_value('status_kamar_id') == $obj->id_status_kamar) {
                                                                                                        echo 'selected';
                                                                                                    }
                                                                                                }
                                                                                                ?>><?= $obj->nama_status_kamar; ?>
                                                </option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Tipe Kamar</label>
                                        <select name="tipe_kamar_id" class="form-control">
                                            <option value="">--Tipe Kamar--</option>
                                            <?php foreach ($tipe as $obj) { ?>
                                                <option value="<?= $obj->id_tipe_kamar ?>" <?php
                                                                                            if ($row->tipe_kamar_id != null) {
                                                                                                if ($row->tipe_kamar_id == $obj->id_tipe_kamar) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            } else {
                                                                                                if (set_value('tipe_kamar_id') == $obj->id_tipe_kamar) {
                                                                                                    echo 'selected';
                                                                                                }
                                                                                            }
                                                                                            ?>><?= $obj->nama_tipe_kamar; ?></option>

                                            <?php } ?>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Jumlah dewasa</label>
                                        <input type="number" name="dewasa" class="form-control" placeholder="Jumlah dewasa..." value="<?= $row->dewasa != null ? $row->dewasa : set_value('dewasa') ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Jumlah anak</label>
                                        <input type="number" name="anak" class="form-control" placeholder="Jumlah anak..." value="<?= $row->anak != null ? $row->anak : set_value('anak') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Nama Kamar</label>
                                        <input type="text" name="nama_kamar" class="form-control" placeholder="Nama kamar..." value="<?= $row->nama_kamar != null ? $row->nama_kamar : set_value('nama_kamar') ?>">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">No. Kamar</label>
                                        <input type="number" name="no_kamar" class="form-control" placeholder="No. kamar..." value="<?= $row->no_kamar != null ? $row->no_kamar : set_value('no_kamar') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group">
                                        <label for="">Harga Kamar</label>
                                        <input type="text" name="harga" class="form-control price" placeholder="Harga kamar..." value="<?= $row->harga != null ? $row->harga : set_value('harga') ?>">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="keterangan" class="form-control" placeholder="Keterangan..."><?= $row->keterangan != null ? $row->keterangan : set_value('keterangan') ?></textarea>
                            </div>
                            <div class="row">
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Slider ?</label> <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="slider" id="slider1" value="iya" <?php
                                                                                                                                if ($row->slider != null) {
                                                                                                                                    if ($row->slider == 'iya') {
                                                                                                                                        echo 'checked';
                                                                                                                                    }
                                                                                                                                } else {
                                                                                                                                    if (set_value('checked') == 'iya') {
                                                                                                                                        echo 'checked';
                                                                                                                                    }
                                                                                                                                }
                                                                                                                                ?>>
                                            <label class="form-check-label" for="slider1">Iya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="slider" id="slider2" value="tidak" <?php
                                                                                                                                    if ($row->slider != null) {
                                                                                                                                        if ($row->slider == 'tidak') {
                                                                                                                                            echo 'checked';
                                                                                                                                        }
                                                                                                                                    } else {
                                                                                                                                        if (set_value('checked') == 'tidak') {
                                                                                                                                            echo 'checked';
                                                                                                                                        }
                                                                                                                                    }
                                                                                                                                    ?>>
                                            <label class="form-check-label" for="slider2">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Penawaran ?</label> <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penawaran" id="penawaran1" value="iya" <?php
                                                                                                                                        if ($row->penawaran != null) {
                                                                                                                                            if ($row->penawaran == 'iya') {
                                                                                                                                                echo 'checked';
                                                                                                                                            }
                                                                                                                                        } else {
                                                                                                                                            if (set_value('checked') == 'iya') {
                                                                                                                                                echo 'checked';
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                        ?>>
                                            <label class="form-check-label" for="penawaran1">Iya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="penawaran" id="penawaran2" value="tidak" <?php
                                                                                                                                        if ($row->penawaran != null) {
                                                                                                                                            if ($row->penawaran == 'tidak') {
                                                                                                                                                echo 'checked';
                                                                                                                                            }
                                                                                                                                        } else {
                                                                                                                                            if (set_value('checked') == 'tidak') {
                                                                                                                                                echo 'checked';
                                                                                                                                            }
                                                                                                                                        }
                                                                                                                                        ?>>
                                            <label class="form-check-label" for="penawaran2">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-4">
                                    <div class="form-group">
                                        <label for="">Rekomendasi ?</label> <br>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rekomendasi" id="rekomendasi1" value="iya" <?php
                                                                                                                                            if ($row->rekomendasi != null) {
                                                                                                                                                if ($row->rekomendasi == 'iya') {
                                                                                                                                                    echo 'checked';
                                                                                                                                                }
                                                                                                                                            } else {
                                                                                                                                                if (set_value('checked') == 'iya') {
                                                                                                                                                    echo 'checked';
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                            ?>>
                                            <label class="form-check-label" for="rekomendasi1">Iya</label>
                                        </div>
                                        <div class="form-check form-check-inline">
                                            <input class="form-check-input" type="radio" name="rekomendasi" id="rekomendasi2" value="tidak" <?php
                                                                                                                                            if ($row->rekomendasi != null) {
                                                                                                                                                if ($row->rekomendasi == 'tidak') {
                                                                                                                                                    echo 'checked';
                                                                                                                                                }
                                                                                                                                            } else {
                                                                                                                                                if (set_value('checked') == 'tidak') {
                                                                                                                                                    echo 'checked';
                                                                                                                                                }
                                                                                                                                            }
                                                                                                                                            ?>>
                                            <label class="form-check-label" for="rekomendasi2">Tidak</label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="">Gambar kamar</label> <br>
                                <?php if ($row->gambar_kamar != null) : ?>
                                    <img src="<?= base_url('images/gambarkamar/' . $row->gambar_kamar) ?>" alt="" width="85px;" style="border-radius: 8px;">
                                <?php endif; ?>
                                <input type="file" name="gambar_kamar" class="form-control">
                            </div>
                            <input type="hidden" name="page" value="<?= $page; ?>">

                            <div class="form-group">
                                <button type="reset" class="btn btn-danger">Reset</button>
                                <button type="submit" name="<?= $page; ?>" class="btn btn-success">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>