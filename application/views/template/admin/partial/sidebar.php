<?php
$url = $this->uri->segment(1);
$subUrl = $this->uri->segment(2);
$konfigurasi = getKonfigurasi();
$profile = check_profile();
?>

<div class="page-sidebar" style="margin-bottom: 30px;">
    <div class="logo-box"><a href="#" class="logo-text"><?= $konfigurasi->nama_sistem; ?></a><a href="#" id="sidebar-close"><i class="material-icons">close</i></a> <a href="#" id="sidebar-state"><i class="material-icons">adjust</i><i class="material-icons compact-sidebar-icon">panorama_fish_eye</i></a></div>
    <div class="page-sidebar-inner slimscroll">
        <ul class="accordion-menu">
            <li class="sidebar-title">
                Menu
            </li>

            <li class="<?= $url == 'Admin' && $subUrl == 'Home' || $url == 'Admin' && $subUrl == '' ? 'active-page' : '' ?>">
                <a href="<?= base_url('Admin/Home') ?>"><i class="material-icons-outlined">dashboard</i>Dashboard</a>
            </li>
            <li class="<?= $url == 'Admin' && $subUrl == 'Profile' ? 'active-page' : '' ?>">
                <a href="<?= base_url('Admin/Profile') ?>"><i class="material-icons-outlined">person</i>Profile</a>
            </li>
            <?php if ($profile->level == 'kasir' || $profile->level == 'admin') : ?>
                <li class="<?= $url == 'Admin' && $subUrl == 'Hotel' || $url == 'Admin' && $subUrl == 'Tipe' || $url == 'Admin' && $subUrl == 'Status' || $url == 'Admin' && $subUrl == 'Kamar' ||  $url == 'Admin' && $subUrl == 'Fasilitas' || $url == 'Admin' && $subUrl == 'Gambarkamar'     ? 'active-page' : '' ?>">
                    <a href="#"><i class="material-icons">home_work</i>Management Hotel<i class="material-icons has-sub-menu">add</i></a>
                    <ul class="sub-menu">
                        <li class="<?= $url == 'Admin' && $subUrl == 'Hotel' ? 'active-page' : '' ?>">
                            <a href="<?= base_url('Admin/Hotel') ?>">Hotel</a>
                        </li>
                        <li class="<?= $url == 'Admin' && $subUrl == 'Tipe' ? 'active-page' : '' ?>">
                            <a href="<?= base_url('Admin/Tipe') ?>">Tipe Kamar</a>
                        </li>
                        <li class="<?= $url == 'Admin' && $subUrl == 'Status' ? 'active-page' : '' ?>">
                            <a href="<?= base_url('Admin/Status') ?>">Status Kamar</a>
                        </li>
                        <li class="<?= $url == 'Admin' && $subUrl == 'Kamar' ? 'active-page' : '' ?>">
                            <a href="<?= base_url('Admin/Kamar') ?>">Kamar</a>
                        </li>
                        <li class="<?= $url == 'Admin' && $subUrl == 'Icon' ? 'active-page' : '' ?>">
                            <a href="<?= base_url('Admin/Icon') ?>">Icon</a>
                        </li>
                        <li class="<?= $url == 'Admin' && $subUrl == 'Fasilitas' ? 'active-page' : '' ?>">
                            <a href="<?= base_url('Admin/Fasilitas') ?>">Fasilitas</a>
                        </li>
                        <li class="<?= $url == 'Admin' && $subUrl == 'Gambarkamar' ? 'active-page' : '' ?>">
                            <a href="<?= base_url('Admin/Gambarkamar') ?>">Gambar Kamar</a>
                        </li>
                    </ul>
                </li>



                <li class="<?= $url == 'Admin' && $subUrl == 'Reservasi' ? 'active-page' : '' ?>">
                    <a href="<?= base_url('Admin/Reservasi') ?>"><i class="material-icons">fact_check</i>Reservasi</a>
                </li>
            <?php endif; ?>
            <?php if ($profile->level == 'admin') : ?>
                <li class="<?= $url == 'Admin' && $subUrl == 'Galeri' ||
                                $url == 'Admin' && $subUrl == 'Users' ||
                                $url == 'Admin' && $subUrl == 'Rekening' ||
                                $url == 'Admin' && $subUrl == 'Konfigurasi'    ? 'active-page' : '' ?>">
                    <a href="#"><i class="material-icons">settings</i> Pengaturan<i class="material-icons has-sub-menu">add</i></a>
                    <ul class="sub-menu">
                        <li class="<?= $url == 'Admin' && $subUrl == 'Galeri' ? 'active-page' : '' ?>">
                            <a href="<?= base_url('Admin/Galeri') ?>">Galeri</a>
                        </li>
                        <!-- <li class="<?= $url == 'Admin' && $subUrl == 'Client' ? 'active-page' : '' ?>">
                            <a href="<?= base_url('Admin/Client') ?>">Client</a>
                        </li> -->
                        <li class="<?= $url == 'Admin' && $subUrl == 'Users' ? 'active-page' : '' ?>">
                            <a href="<?= base_url('Admin/Users') ?>">Users</a>
                        </li>
                        <li class="<?= $url == 'Admin' && $subUrl == 'Rekening' ? 'active-page' : '' ?>">
                            <a href="<?= base_url('Admin/Rekening') ?>">Rekening</a>
                        </li>
                        <li class="<?= $url == 'Admin' && $subUrl == 'Konfigurasi' ? 'active-page' : '' ?>">
                            <a href="<?= base_url('Admin/Konfigurasi') ?>">Konfigurasi</a>
                        </li>
                    </ul>
                </li>
            <?php endif; ?>
            <?php if ($profile->level == 'admin') : ?>
                <li class="sidebar-title">
                    Pelanggan
                </li>

                <li class="<?= $url == 'Admin' && $subUrl == 'Pelanggan' ? 'active-page' : '' ?>">
                    <a href="<?= base_url('Admin/Pelanggan') ?>"><i class="material-icons-outlined">groups</i>Pelanggan</a>
                </li>
                <li class="<?= $url == 'Admin' && $subUrl == 'Contact' ? 'active-page' : '' ?>">
                    <a href="<?= base_url('Admin/Contact') ?>"><i class="material-icons">contact_page</i>Contact</a>
                </li>
            <?php endif; ?>
            <?php if ($profile->level == 'admin' || $profile->level == 'manager') : ?>

                <li class="sidebar-title">
                    Laporan
                </li>
                <li class="<?= $url == 'Admin' && $subUrl == 'Laporan' ? 'active-page' : '' ?>">
                    <a href="<?= base_url('Admin/Laporan') ?>"><i class="material-icons">book</i>Laporan</a>
                </li>
            <?php endif; ?>
            <li class="sidebar-title">
            </li>
            <li>
                <a href="#">&emsp;</a>
            </li>
        </ul>
    </div>
</div>