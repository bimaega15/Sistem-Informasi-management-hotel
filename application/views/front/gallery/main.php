<style>
    ul.pagination {
        width: 180px;
    }
</style>
<main class="site-main page-spacing">
    <!-- Page Banner -->
    <div class="container-fluid page-banner about-banner">
        <div class="container">
            <h3>gallery</h3>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('') ?>">Home</a></li>
                <li class="active">GALLERY</li>
            </ol>
        </div>
    </div><!-- Page Banner /- -->
    <div class="section-padding"></div>
    <div class="container">
        <!-- Portfolio Section -->
        <div id="portfolio-section" class="container-fluid portfolio-section no-padding animated zoomIn">

            <div class="col-md-12 col-sm-12 col-xs-12 portfolio-list no-padding">
                <?php foreach ($result as $v_result) : ?>
                    <div class="col-md-4 col-sm-4 col-xs-6 no-padding portfolio-box">
                        <a href="<?= base_url('images/galeri/' . $v_result->gambar_galeri) ?>" title="Portfolio" class="popup-modal">
                            <img style="height: 348px;" alt="Portfolio" src="<?= base_url('images/galeri/' . $v_result->gambar_galeri) ?>">
                            <h3><span> <?= $v_result->nama_galeri; ?> </span></h3>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
            <nav aria-label="Page navigation" style="text-align: center;">
                <?= $pagination_link; ?>
            </nav>
        </div>
    </div><!-- Portfolio Section /- -->
    <div class="section-padding"></div>

</main>