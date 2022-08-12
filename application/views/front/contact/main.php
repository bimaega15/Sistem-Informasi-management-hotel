<?php
$konfigurasi = getKonfigurasi();
?>
<style>
    iframe {
        width: 100%;
        height: 550px;
    }
</style>
<main class="site-main page-spacing">
    <!-- Page Banner -->
    <div class="container-fluid page-banner about-banner">
        <div class="container">
            <h3>contact</h3>
            <ol class="breadcrumb">
                <li><a href="<?= base_url('') ?>">Home</a></li>
                <li class="active">contact</li>
            </ol>
        </div>
    </div><!-- Page Banner /- -->
    <!-- Map Section -->
    <div class="map container-fluid no-padding">
        <?= $konfigurasi->koordinat; ?>
    </div><!--  Map Section /- -->

    <!-- Container -->
    <div class="container">
        <div class="row" style="padding: 20px 0px;">
            <!-- Contact Content -->
            <div class="col-md-6 col-sm-6 col-xs-12 contact-content">
                <h4>Leave A Message</h4>
                <form class="contact-form" method="post" action="<?= base_url('Front/Contact/process') ?>">
                    <div class="form-group">
                        <input type="text" class="form-control" id="input_name" name="name" placeholder="Full Name" required />
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" id="input_email" name="email" placeholder="Email Address" required />
                    </div>
                    <div class="form-group">
                        <textarea id="textarea_message" class="form-control" rows="5" name="message" placeholder="Type here message" required></textarea>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-info w-100 py-3">
                            Send Message
                        </button>
                    </div>
                    <div id="alert-msg" class="alert-msg"></div>
                </form>
            </div><!-- Contact Content /- -->
            <!-- Contact Content -->
            <div class="col-md-6 col-sm-6 col-xs-12 contact-content">
                <h4>Contact Details</h4>
                <div class="contact-detail">
                    <i class="fa fa-map-marker"></i>
                    <h5>Alamat</h5>
                    <p><?= $konfigurasi->alamat; ?> </p>
                </div>
                <div class="contact-detail">
                    <i class="fa fa-phone"></i>
                    <h5>Telepon</h5>
                    <p>Mobile: <?= $konfigurasi->no_telepon; ?></span></p>
                </div>
                <div class="contact-detail">
                    <i class="fa fa-envelope"></i>
                    <h5>Email Address</h5>
                    <p><a href="mailto:<?= $konfigurasi->email; ?>" title="<?= $konfigurasi->email; ?>"><?= $konfigurasi->email; ?></a>
                </div>
                <ul>
                    <?php if ($konfigurasi->twitter != null) : ?>
                        <li><a href="<?= $konfigurasi->twitter ?>" title="Twitter"><i class="fab fa-twitter"></i></a></li>
                    <?php endif; ?>
                    <?php if ($konfigurasi->facebook != null) : ?>
                        <li><a href="<?= $konfigurasi->facebook ?>" title="Facebook"><i class="fab fa-facebook"></i></a></li>
                    <?php endif; ?>
                    <?php if ($konfigurasi->instagram != null) : ?>
                        <li><a href="<?= $konfigurasi->instagram ?>" title="Instagram"><i class="fab fa-instagram"></i></a></li>
                    <?php endif; ?>
                    <?php if ($konfigurasi->email != null) : ?>
                        <li><a href="mailto:<?= $konfigurasi->email ?>" title="Email"><i class="fab fa-google-plus"></i></a></li>
                    <?php endif; ?>
                </ul>
            </div><!-- Contact Content /- -->
        </div>
    </div><!-- Container /- -->

    <div class="section-padding"></div>
</main>