-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Agu 2022 pada 10.45
-- Versi server: 10.4.20-MariaDB
-- Versi PHP: 7.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_hotel`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `contact`
--

CREATE TABLE `contact` (
  `id_contact` int(11) NOT NULL,
  `name` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `message` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `contact`
--

INSERT INTO `contact` (`id_contact`, `name`, `email`, `message`) VALUES
(3, 'dimas', 'dimas123@gmail.com', 'bagus.dipertahankan kualitas pelayanan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(250) NOT NULL,
  `icon_id` int(11) DEFAULT NULL,
  `kamar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `icon_id`, `kamar_id`) VALUES
(8, 'Wifi', 9, 5),
(10, 'double Bed', 1, 5),
(12, 'TV', 14, 5),
(13, 'Kipas', 17, 5),
(14, 'Toilet', 18, 5),
(15, 'double Bed', 1, 7),
(16, 'TV', 14, 7),
(17, 'Kipas', 17, 7),
(18, 'Toilet', 18, 7),
(19, 'Wifi', 9, 7),
(20, 'double Bed', 1, 8),
(21, 'TV', 14, 8),
(22, 'Kipas', 17, 8),
(23, 'Toilet', 18, 8),
(24, 'Wifi', 9, 8),
(25, 'double Bed', 1, 9),
(26, 'TV', 14, 9),
(27, 'Toilet', 18, 9),
(28, 'Wifi', 9, 9),
(29, 'Ac', 16, 9),
(30, 'double Bed', 1, 10),
(31, 'TV', 14, 10),
(32, 'Toilet', 18, 10),
(33, 'Wifi', 9, 10),
(34, 'Ac', 16, 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `galeri`
--

CREATE TABLE `galeri` (
  `id_galeri` int(11) NOT NULL,
  `nama_galeri` varchar(300) NOT NULL,
  `gambar_galeri` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `galeri`
--

INSERT INTO `galeri` (`id_galeri`, `nama_galeri`, `gambar_galeri`) VALUES
(1, 'Lobby', '969631647958284WhatsApp_Image_2022-01-08_at_20_24_41.jpeg'),
(2, 'Parkiran', '56391647958546WhatsApp_Image_2022-01-08_at_20_24_34.jpeg'),
(13, 'Hotel Arjuna Baturaja', '384001652365236WhatsApp_Image_2021-10-25_at_14_12_22_(1).jpeg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `gambar_kamar`
--

CREATE TABLE `gambar_kamar` (
  `id_gambar_kamar` int(11) NOT NULL,
  `gambar_kamar` varchar(250) NOT NULL,
  `pilihan` enum('utama','tidak utama') NOT NULL,
  `kamar_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `gambar_kamar`
--

INSERT INTO `gambar_kamar` (`id_gambar_kamar`, `gambar_kamar`, `pilihan`, `kamar_id`) VALUES
(18, '444321647423711WhatsApp_Image_2022-01-08_at_20_24_35.jpeg', 'utama', 5),
(19, '482061647345557WhatsApp_Image_2022-01-08_at_20_24_40.jpeg', 'utama', 7),
(22, '760191652331696WhatsApp_Image_2021-06-22_at_16_53_47_(1).jpeg', 'utama', 8),
(23, '77221652328078WhatsApp_Image_2022-05-12_at_09_56_41.jpeg', 'utama', 9),
(24, '500191652323568kamar_ac.jpeg', 'utama', 10);

-- --------------------------------------------------------

--
-- Struktur dari tabel `hotel`
--

CREATE TABLE `hotel` (
  `id_hotel` int(11) NOT NULL,
  `nama_hotel` varchar(250) NOT NULL,
  `gambar_hotel` varchar(250) NOT NULL,
  `alamat_hotel` tinytext NOT NULL,
  `koordinat_hotel` varchar(300) NOT NULL,
  `email_hotel` varchar(50) NOT NULL,
  `no_telepon_hotel` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `hotel`
--

INSERT INTO `hotel` (`id_hotel`, `nama_hotel`, `gambar_hotel`, `alamat_hotel`, `koordinat_hotel`, `email_hotel`, `no_telepon_hotel`) VALUES
(1, 'Hotel Arjuna Baturaja', '949851647411754WhatsApp_Image_2021-10-25_at_14_12_22_(1).jpeg', 'Hotel Arjuna beralamat di Sukajadi, Jl.Dr.Sutomo No700A, Baturaja , Kec. Baturaja Timur, Kabupaten Ogan Komering Ulu, Sumatera Selatan 32117,.', '&amp;lt;iframe src=&quot;https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.556445204433!2d104.1680409147602!3d-4.110243597011399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e39af5e5e8e2607:0xe89e007422791e0e!2sHotel Arjuna!5e0!3m2!1sid!2sid!4v1627513341878!5m2!1sid!2sid&quot; width', 'Hotelarjunabta@gmail.com', 2147483647);

-- --------------------------------------------------------

--
-- Struktur dari tabel `icon`
--

CREATE TABLE `icon` (
  `id_icon` int(11) NOT NULL,
  `nama_icon` varchar(150) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `icon`
--

INSERT INTO `icon` (`id_icon`, `nama_icon`) VALUES
(1, 'fas fa-bed'),
(9, 'fas fa-wifi'),
(14, 'fas fa-tv'),
(15, 'fas fa-smoking'),
(16, 'fas fa-snowflake'),
(17, 'fas fa-fan'),
(18, 'fas fa-toilet');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kamar`
--

CREATE TABLE `kamar` (
  `id_kamar` int(11) NOT NULL,
  `status_kamar_id` int(11) NOT NULL,
  `tipe_kamar_id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `dewasa` varchar(50) NOT NULL,
  `anak` varchar(50) NOT NULL,
  `nama_kamar` varchar(250) NOT NULL,
  `no_kamar` varchar(50) NOT NULL,
  `keterangan` text DEFAULT NULL,
  `harga` varchar(50) NOT NULL,
  `slider` enum('iya','tidak') NOT NULL DEFAULT 'tidak',
  `rekomendasi` enum('iya','tidak') NOT NULL DEFAULT 'tidak',
  `penawaran` enum('iya','tidak') NOT NULL DEFAULT 'tidak'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kamar`
--

INSERT INTO `kamar` (`id_kamar`, `status_kamar_id`, `tipe_kamar_id`, `hotel_id`, `dewasa`, `anak`, `nama_kamar`, `no_kamar`, `keterangan`, `harga`, `slider`, `rekomendasi`, `penawaran`) VALUES
(5, 3, 3, 1, '2', '2', 'Standar01', '1', '', '150000', 'iya', 'iya', 'iya'),
(7, 3, 3, 1, '2', '2', 'Standar02', '2', '', '150000', 'iya', 'iya', 'iya'),
(8, 3, 3, 1, '2', '2', 'Standar03', '3', '', '150000', 'iya', 'iya', 'iya'),
(9, 3, 4, 1, '2', '2', 'Vip1', '1', '', '250000', 'iya', 'iya', 'iya'),
(10, 2, 4, 1, '2', '2', 'Vip2', '2', '', '250000', 'iya', 'iya', 'iya');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `nama_sistem` varchar(100) NOT NULL,
  `gambar_sistem` varchar(100) NOT NULL,
  `koordinat` text NOT NULL,
  `tentang` text NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(50) NOT NULL,
  `email` varchar(150) DEFAULT NULL,
  `facebook` varchar(150) DEFAULT NULL,
  `instagram` varchar(150) DEFAULT NULL,
  `twitter` varchar(150) DEFAULT NULL,
  `copyright` varchar(300) NOT NULL,
  `link_yt` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `nama_sistem`, `gambar_sistem`, `koordinat`, `tentang`, `alamat`, `no_telepon`, `email`, `facebook`, `instagram`, `twitter`, `copyright`, `link_yt`) VALUES
(1, 'Hotel Arjuna Baturaja', '474381647958876WhatsApp_Image_2021-10-25_at_14_12_22_(1).jpeg', '                                                                                                                                                <iframe src=\"https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3979.556445204433!2d104.1680409147602!3d-4.110243597011399!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2e39af5e5e8e2607:0xe89e007422791e0e!2sHotel Arjuna!5e0!3m2!1sid!2sid!4v1627513341878!5m2!1sid!2sid\" width=\"600\" height=\"450\" style=\"border:0;\" allowfullscreen=\"\" loading=\"lazy\"></iframe>                                                                                                                                                ', 'Hotel Arjuna merupakan salah satu hotel yang beralamat di Sukajadi, Jl.Dr.Sutomo No700A, Baturaja , Kec. Baturaja Timur, Kabupaten Ogan Komering Ulu, Sumatera Selatan 32117,.', 'Jl.Dr.Sutomo No700A, Baturaja', '089604298047', 'Hotelarjunabta@gmail.com', 'Hotel Arjuna Baturaja', 'hotelarjunabta', '', 'Hotel Arjuna', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id_pembayaran` int(11) NOT NULL,
  `nama_depan` varchar(250) NOT NULL,
  `nama_belakang` varchar(250) NOT NULL,
  `rekening_id` int(11) DEFAULT NULL,
  `total_bayar` varchar(50) NOT NULL,
  `status_orderan` enum('dibayar','menunggu','belum dibayar','ditolak') NOT NULL,
  `bukti_transfer` varchar(250) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `email` varchar(300) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `alamat_1` text DEFAULT NULL,
  `alamat_2` text DEFAULT NULL,
  `bayar_ditempat` tinyint(1) DEFAULT 0,
  `tamu_id` int(11) NOT NULL,
  `reservasi_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pembayaran`
--

INSERT INTO `pembayaran` (`id_pembayaran`, `nama_depan`, `nama_belakang`, `rekening_id`, `total_bayar`, `status_orderan`, `bukti_transfer`, `keterangan`, `email`, `no_hp`, `alamat_1`, `alamat_2`, `bayar_ditempat`, `tamu_id`, `reservasi_id`) VALUES
(27, 'Bima', 'Ega', NULL, '300000', 'belum dibayar', NULL, 'keterangan 1', 'bimaega15@gmail.com', '082389872382', 'my alamat 1', '', 0, 12, 31),
(30, 'Bima', 'Ega', NULL, '150000', 'belum dibayar', NULL, 'my keterangan', 'bimaega15@gmail.com', '0832948723894', 'my alamat 1', '', 0, 12, 34),
(31, 'Bima', 'Ega', NULL, '150000', 'belum dibayar', NULL, 'my ket', 'bimaega15@gmail.com', '082394723849', 'my alamat 1', '', 0, 12, 35),
(32, 'Bima', 'Ega', NULL, '150000', 'belum dibayar', NULL, 'keterangan', 'bimaega15@gmail.com', '0832947823743', 'my alamat 1', '', 0, 12, 36),
(33, 'Bima', 'Ega', NULL, '250000', 'belum dibayar', NULL, '', 'bimaega15@gmail.com', '089783472', 'my alamat 1', 'Hello alamat 2', 0, 12, 37);

-- --------------------------------------------------------

--
-- Struktur dari tabel `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_rekening` varchar(250) NOT NULL,
  `gambar_bank` varchar(250) NOT NULL,
  `nama_bank` varchar(250) NOT NULL,
  `no_rekening` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_rekening`, `gambar_bank`, `nama_bank`, `no_rekening`) VALUES
(2, 'Hotel Arjuna Baturaja', '998291617690454logo-bca.png', 'BANK BCA', '2353253255');

-- --------------------------------------------------------

--
-- Struktur dari tabel `reservasi`
--

CREATE TABLE `reservasi` (
  `id_reservasi` int(11) NOT NULL,
  `kamar_id` int(11) NOT NULL,
  `tanggal` datetime NOT NULL,
  `check_in` date NOT NULL,
  `check_out` date NOT NULL,
  `konfirmasi_pembayaran` datetime NOT NULL,
  `tamu_id` int(11) NOT NULL,
  `status` enum('menunggu','menunggu konfirmasi','konfirmasi','batal','check out') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `reservasi`
--

INSERT INTO `reservasi` (`id_reservasi`, `kamar_id`, `tanggal`, `check_in`, `check_out`, `konfirmasi_pembayaran`, `tamu_id`, `status`) VALUES
(31, 7, '2022-06-05 18:44:35', '2022-06-06', '2022-06-08', '2022-06-05 19:14:35', 12, 'batal'),
(34, 7, '2022-06-07 08:04:44', '2022-06-07', '2022-06-08', '2022-06-07 08:34:44', 12, 'menunggu'),
(35, 5, '2022-06-07 08:08:18', '2022-06-07', '2022-06-08', '2022-06-07 08:38:18', 12, 'menunggu'),
(36, 8, '2022-06-07 08:10:43', '2022-06-08', '2022-06-09', '2022-06-07 08:40:43', 12, 'menunggu'),
(37, 9, '2022-06-07 08:14:09', '2022-06-07', '2022-06-08', '2022-06-07 08:44:09', 12, 'menunggu');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_kamar`
--

CREATE TABLE `status_kamar` (
  `id_status_kamar` int(11) NOT NULL,
  `nama_status_kamar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `status_kamar`
--

INSERT INTO `status_kamar` (`id_status_kamar`, `nama_status_kamar`) VALUES
(2, 'Tersedia'),
(3, 'Booking'),
(4, 'Check In');

-- --------------------------------------------------------

--
-- Struktur dari tabel `subscribe`
--

CREATE TABLE `subscribe` (
  `id_subscribe` int(11) NOT NULL,
  `email` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `subscribe`
--

INSERT INTO `subscribe` (`id_subscribe`, `email`) VALUES
(1, 'bimaega15@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tamu`
--

CREATE TABLE `tamu` (
  `id_tamu` int(11) NOT NULL,
  `nama` varchar(300) NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `alamat` text DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `gambar` varchar(300) DEFAULT NULL,
  `jenis_kelamin` enum('P','L') NOT NULL,
  `cookie` varchar(300) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tamu`
--

INSERT INTO `tamu` (`id_tamu`, `nama`, `no_hp`, `alamat`, `email`, `username`, `password`, `gambar`, `jenis_kelamin`, `cookie`) VALUES
(9, 'dimas', '081243969261', 'belitang', 'dimas123@gmail.com', 'dimass', '51947e3cf64ee746b6f2c73d174d525a', '178451648045072parkir.png', 'P', NULL),
(10, 'ferdinan', '081234665212', 'palembang', 'ferdinan10@gmail.com', 'ferdi', '9d10af6c4eabc11d5d9e62f7b75501bb', 'male.png', 'L', NULL),
(11, 'ferdi', '081233333', '', 'ferdi123@gmail.com', 'ferdi123', '1f2ef40e3ad6fa16b08b615217876b8a', 'male.png', 'L', NULL),
(12, 'ajengap', '081243969261', 'palembang', 'ajengap2404@gmail.com', 'ajeng123', 'ed2126a2dc5e62a6f5c405035b8cdb39', '691211652942606Sss.png', 'P', '472a10a397b8a2f137dfa5378dc9dfdf3dfec549251b2b1af789f186dcbd1587');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tipe_kamar`
--

CREATE TABLE `tipe_kamar` (
  `id_tipe_kamar` int(11) NOT NULL,
  `nama_tipe_kamar` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tipe_kamar`
--

INSERT INTO `tipe_kamar` (`id_tipe_kamar`, `nama_tipe_kamar`) VALUES
(3, 'Standar'),
(4, 'VIP');

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `nama_users` varchar(250) NOT NULL,
  `level` enum('admin','manager','kasir') NOT NULL,
  `username` varchar(250) NOT NULL,
  `password` varchar(250) NOT NULL,
  `jenis_kelamin` enum('P','W') NOT NULL,
  `gambar` varchar(250) DEFAULT NULL,
  `cookie` varchar(300) DEFAULT NULL,
  `status` enum('active','not_active') NOT NULL DEFAULT 'not_active'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_users`, `nama_users`, `level`, `username`, `password`, `jenis_kelamin`, `gambar`, `cookie`, `status`) VALUES
(2, 'Adrian Ronaldi', 'admin', 'admin123', '0192023a7bbd73250516f069df18b500', 'P', '728931627512861icon.png', '240be518fabd2724ddb6f04eeb1da5967448d7e831c08c8fa822809f74c720a9', 'active');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id_contact`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`),
  ADD KEY `kamar_id` (`kamar_id`),
  ADD KEY `icon_id` (`icon_id`);

--
-- Indeks untuk tabel `galeri`
--
ALTER TABLE `galeri`
  ADD PRIMARY KEY (`id_galeri`);

--
-- Indeks untuk tabel `gambar_kamar`
--
ALTER TABLE `gambar_kamar`
  ADD PRIMARY KEY (`id_gambar_kamar`),
  ADD KEY `kamar_id` (`kamar_id`);

--
-- Indeks untuk tabel `hotel`
--
ALTER TABLE `hotel`
  ADD PRIMARY KEY (`id_hotel`);

--
-- Indeks untuk tabel `icon`
--
ALTER TABLE `icon`
  ADD PRIMARY KEY (`id_icon`);

--
-- Indeks untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD PRIMARY KEY (`id_kamar`),
  ADD KEY `kamar_ibfk_2` (`status_kamar_id`),
  ADD KEY `kamar_ibfk_3` (`tipe_kamar_id`),
  ADD KEY `kamar_ibfk_1` (`hotel_id`);

--
-- Indeks untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indeks untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id_pembayaran`),
  ADD KEY `reservasi_id` (`reservasi_id`),
  ADD KEY `rekening_id` (`rekening_id`),
  ADD KEY `tamu_id` (`tamu_id`);

--
-- Indeks untuk tabel `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`);

--
-- Indeks untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD PRIMARY KEY (`id_reservasi`),
  ADD KEY `kamar_id` (`kamar_id`),
  ADD KEY `tamu_id` (`tamu_id`);

--
-- Indeks untuk tabel `status_kamar`
--
ALTER TABLE `status_kamar`
  ADD PRIMARY KEY (`id_status_kamar`);

--
-- Indeks untuk tabel `subscribe`
--
ALTER TABLE `subscribe`
  ADD PRIMARY KEY (`id_subscribe`);

--
-- Indeks untuk tabel `tamu`
--
ALTER TABLE `tamu`
  ADD PRIMARY KEY (`id_tamu`);

--
-- Indeks untuk tabel `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  ADD PRIMARY KEY (`id_tipe_kamar`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `contact`
--
ALTER TABLE `contact`
  MODIFY `id_contact` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `galeri`
--
ALTER TABLE `galeri`
  MODIFY `id_galeri` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `gambar_kamar`
--
ALTER TABLE `gambar_kamar`
  MODIFY `id_gambar_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `hotel`
--
ALTER TABLE `hotel`
  MODIFY `id_hotel` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `icon`
--
ALTER TABLE `icon`
  MODIFY `id_icon` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `kamar`
--
ALTER TABLE `kamar`
  MODIFY `id_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT untuk tabel `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  MODIFY `id_reservasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `status_kamar`
--
ALTER TABLE `status_kamar`
  MODIFY `id_status_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `subscribe`
--
ALTER TABLE `subscribe`
  MODIFY `id_subscribe` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tamu`
--
ALTER TABLE `tamu`
  MODIFY `id_tamu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `tipe_kamar`
--
ALTER TABLE `tipe_kamar`
  MODIFY `id_tipe_kamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD CONSTRAINT `fasilitas_ibfk_1` FOREIGN KEY (`kamar_id`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fasilitas_ibfk_2` FOREIGN KEY (`icon_id`) REFERENCES `icon` (`id_icon`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `gambar_kamar`
--
ALTER TABLE `gambar_kamar`
  ADD CONSTRAINT `gambar_kamar_ibfk_1` FOREIGN KEY (`kamar_id`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kamar`
--
ALTER TABLE `kamar`
  ADD CONSTRAINT `kamar_ibfk_1` FOREIGN KEY (`hotel_id`) REFERENCES `hotel` (`id_hotel`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kamar_ibfk_2` FOREIGN KEY (`status_kamar_id`) REFERENCES `status_kamar` (`id_status_kamar`) ON UPDATE CASCADE,
  ADD CONSTRAINT `kamar_ibfk_3` FOREIGN KEY (`tipe_kamar_id`) REFERENCES `tipe_kamar` (`id_tipe_kamar`) ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `pembayaran_ibfk_1` FOREIGN KEY (`reservasi_id`) REFERENCES `reservasi` (`id_reservasi`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pembayaran_ibfk_3` FOREIGN KEY (`tamu_id`) REFERENCES `tamu` (`id_tamu`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `reservasi`
--
ALTER TABLE `reservasi`
  ADD CONSTRAINT `reservasi_ibfk_1` FOREIGN KEY (`kamar_id`) REFERENCES `kamar` (`id_kamar`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `reservasi_ibfk_2` FOREIGN KEY (`tamu_id`) REFERENCES `tamu` (`id_tamu`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
