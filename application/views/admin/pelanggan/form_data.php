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
                    <div class="card-body">
                        <h5 class="card-title"><?= $page ?> Pelanggan</h5>
                        <a href="#" class="btn btn-outline-warning">Kembali</a>
                        <form action="" method="post" class="mt-2">
                            <div class="form-group">
                                <label for="">Nama Pelanggan</label>
                                <input type="text" class="form-control" placeholder="Nama Pelanggan..." name="nama_pelanggan">
                            </div>

                            <div class="form-group">
                                <label for="">Keterangan</label>
                                <textarea name="keterangan" class="form-control" placeholder="Keterangan..."></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Gambar</label>
                                <input type="file" name="gambar_pelanggan" class="form-control">
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