<?php
$ci = &get_instance();
$ci->load->model('Home/Home_model');
$galeri = $ci->Home_model->getGaleri()->result();
$konfigurasi = getKonfigurasi();
$currentUrl = current_url();
?>
<div class="footer-section container-fluid no-padding">
    <!-- Top Footer -->
    <div class="top-footer container-fluid no-padding">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <!-- Text Widget -->
                <aside class="col-md-4 col-sm-12 col-xs-12 widget text_widget">
                    <h4 class="widget_title">about us</h4>
                    <p><?= wordText($konfigurasi->tentang, 320) ?></p>
                    <ul class="social_widget">
                        <?php
                        if ($konfigurasi->facebook != null) : ?>
                            <li><a target="_blank" href="<?= $konfigurasi->facebook ?>" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                        <?php
                        endif;
                        ?>
                        <?php
                        if ($konfigurasi->twitter != null) : ?>
                            <li><a target="_blank" href="<?= $konfigurasi->twitter ?>" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                        <?php
                        endif;
                        ?>
                        <?php
                        if ($konfigurasi->email != null) : ?>
                            <li><a target="_blank" href="mailto:<?= $konfigurasi->email ?>" title="Google Plus"><i class="fab fa-google-plus"></i></a></li>
                        <?php
                        endif;
                        ?>
                        <?php
                        if ($konfigurasi->instagram != null) : ?>
                            <li><a target="_blank" href="<?= $konfigurasi->instagram ?>" title="Instagram"><i class="fab fa-instagram"></i></a></li>

                        <?php
                        endif;
                        ?>

                    </ul>
                </aside><!-- Text Widget /- -->
                <!-- Newsletter -->
                <aside class="col-md-4 col-sm-6 col-xs-6 widget widget_newsletter">
                    <h4 class="widget_title">newsletter</h4>
                    <form method="post" action="<?= base_url('Home/subscribe') ?>">
                        <input type="email" class="form-control" placeholder="your mail id" name="email" required />
                        <input type="hidden" name="url" value="<?= $currentUrl ?>">
                        <input type="submit" value="subscribe" />
                    </form>
                </aside><!-- Newsletter /- -->
                <!-- Gallery -->
                <aside class="col-md-4 col-sm-6 col-xs-6 widget widget_gallery">
                    <h4 class="widget_title">Gallery</h4>
                    <ul>
                        <?php foreach ($galeri as $v_galeri) : ?>
                            <li><a href="#" title="<?= $v_galeri->nama_galeri ?>"><img src="<?= base_url('images/galeri/' . $v_galeri->gambar_galeri) ?>" alt="Gallery" /></a></li>
                        <?php endforeach; ?>
                    </ul>
                </aside><!-- Gallery /- -->
            </div>
        </div><!-- Container /- -->
    </div><!-- Top Footer -->
    <div class="bottom-footer container-fluid">
        <p>&copy; Copyrights 2021 <?= $konfigurasi->nama_sistem; ?></p>
    </div>
</div>