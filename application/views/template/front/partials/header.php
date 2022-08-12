<?php
$konfigurasi = getKonfigurasi();
$uri = $this->uri->segment(1);
$subUri = $this->uri->segment(2);
if ($this->session->has_userdata('tamu_id')) {
    $tamu_id = $this->session->userdata('tamu_id');
} else {
    $tamu_id = null;
}
?>
<header id="header" class="header-section header-position container-fluid no-padding">
    <!-- Top Header -->
    <div class="top-header container-fluid no-padding">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <div class="logo-block col-md-3"><a href="<?= base_url('') ?>" title="Hotely"><img style="height: 50px;" src="<?= base_url('images/konfigurasi/' . $konfigurasi->gambar_sistem) ?>" alt="Logo" /></a></div>
                <div class="col-md-9 contact-detail">
                    <div class="phone">
                        <img src="<?= base_url('asset/HTML/') ?>images/phone-ic.png" alt="Phone" />
                        <h6>Kontak Kami</h6>
                        <a href="tell:1800234567890" title="<?= $konfigurasi->no_telepon ?>"><?= $konfigurasi->no_telepon ?></a>
                    </div>
                    <div class="address">
                        <img src="<?= base_url('asset/HTML/') ?>images/address-ic.png" alt="Address" />
                        <h6>Alamat</h6>
                        <p><?= $konfigurasi->alamat ?></p>
                    </div>
                    <div class="menu-search">
                        <div id="sb-search" class="sb-search">
                            <form method="get" action="<?= base_url('Front/Kamar') ?>">
                                <input class="sb-search-input" placeholder="Cari kamar..." type="text" value="" name="search" id="search" />
                                <button type="submit" class="sb-search-submit"><img src="<?= base_url('asset/HTML/') ?>images/search-ic.png" alt="Search" /></button>
                                <span class="sb-icon-search"></span>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div><!-- Container /- -->
    </div><!-- Top Header /- -->
    <!-- Menu Block -->
    <div class="menu-block">
        <!-- Container -->
        <div class="container">
            <div class="row">
                <div class="col-md-10">
                    <nav class="navbar navbar-default ow-navigation">
                        <div class="navbar-header">
                            <button aria-controls="navbar" aria-expanded="false" data-target="#navbar" data-toggle="collapse" class="navbar-toggle collapsed" type="button">
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a href="index.html" title="Hotely" class="navbar-brand">Hotely</a>
                        </div>
                        <div class="navbar-collapse collapse" id="navbar">
                            <ul class="nav navbar-nav">
                                <li class="<?= $uri == '' || $uri == 'Home'  ? 'active' : '' ?>"><a href="<?= base_url('') ?>" title="Home">Home</a></li>
                                <li class="<?= $uri == 'Front' && $subUri == 'About'  ? 'active' : '' ?>"><a href=" <?= base_url('Front/About') ?>" title="About Us">about Us</a></li>
                                <li class="<?= $uri == 'Front' && $subUri == 'Kamar'  ? 'active' : '' ?>"><a href="<?= base_url('Front/Kamar') ?>" title="Rooms">Rooms</a></li>
                                <li class="<?= $uri == 'Front' && $subUri == 'Service'  ? 'active' : '' ?>"><a href="<?= base_url('Front/Service') ?>" title="Services">Services</a></li>
                                <li class="<?= $uri == 'Front' && $subUri == 'Gallery'  ? 'active' : '' ?>"><a href="<?= base_url('Front/Gallery') ?>" title="Gallery">Gallery</a></li>
                                <li class="<?= $uri == 'Front' && $subUri == 'Contact'  ? 'active' : '' ?>"><a href="<?= base_url('Front/Contact') ?>" title="Contact">Contact</a></li>
                                <?php
                                if ($tamu_id != null) { ?>
                                    <li class="dropdown <?= $uri == 'Front' && $subUri == 'Profile' || $uri == 'Front' && $subUri == 'Riwayat' ? 'active' : '' ?>">
                                        <a href="#" title="Account" class="dropdown-toggle" role="button" aria-haspopup="true" aria-expanded="false">Account</a>
                                        <i class="ddl-switch fa fa-angle-down"></i>
                                        <ul class="dropdown-menu">
                                            <li><a href="<?= base_url('Front/Profile') ?>" title="Profile">Profile</a></li>
                                            <li><a href="<?= base_url('Front/Riwayat') ?>" title="Riwayat">Riwayat</a></li>
                                            <li><a href="<?= base_url('Front/Login/logout') ?>" title="Logout">Logout</a></li>
                                        </ul>
                                    </li>
                                <?php
                                } else { ?>
                                    <li class="<?= $uri == 'Front' && $subUri == 'Login'  ? 'active' : '' ?>"><a href="#" data-toggle="modal" data-target="#modalLogin" class="btn-login" title="Login">Login</a></li>
                                <?php
                                }
                                ?>

                            </ul>
                        </div>
                    </nav>
                </div>
                <div class="col-md-2 book-now">
                    <a href="#" title="Book Now">Book now</a>
                </div>
            </div><!-- Row /- -->
        </div><!-- Container /- -->
    </div><!-- Menu Block /- -->
</header>