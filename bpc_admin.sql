-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 27 Sep 2021 pada 07.07
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bpc_admin`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_proyek`
--

CREATE TABLE `detail_proyek` (
  `id_detail` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `fasilitas` varchar(10000) DEFAULT NULL,
  `kamar_tidur` varchar(50) DEFAULT NULL,
  `kamar_mandi` varchar(50) DEFAULT NULL,
  `carport` varchar(50) DEFAULT NULL,
  `luas_bangunan` varchar(50) DEFAULT NULL,
  `luas_tanah` varchar(50) DEFAULT NULL,
  `harga_terendah` varchar(50) DEFAULT NULL,
  `informasi_properti` text DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `lokasi_proyek` varchar(100) DEFAULT NULL,
  `wisata_hiburan` text DEFAULT NULL,
  `status_proyek` enum('Tersedia','Tidak Tersedia','','') DEFAULT NULL,
  `fasilitas_kesehatan` text DEFAULT NULL,
  `fasilitas_pendidikan` text DEFAULT NULL,
  `fasilitas_komersil` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `detail_proyek`
--

INSERT INTO `detail_proyek` (`id_detail`, `id_proyek`, `fasilitas`, `kamar_tidur`, `kamar_mandi`, `carport`, `luas_bangunan`, `luas_tanah`, `harga_terendah`, `informasi_properti`, `deskripsi`, `lokasi_proyek`, `wisata_hiburan`, `status_proyek`, `fasilitas_kesehatan`, `fasilitas_pendidikan`, `fasilitas_komersil`) VALUES
(1, 3, '<i class=\"fas fa-door-open\"></i> One Gate System <i class=\"fas fa-shield-alt\"></i> Security 24 jam <i class=\"fas fa-tree\"></i> Taman Bermain <i class=\"fas fa-leaf\"></i> Konsep Cluster', '2', '1', '1', '36', '72', '390', '<p>Sertifikasi : SHM</p><p>Daya Listrik : 1300 Watt</p><p>Pondasi : Batu Kali + Sloof Beton</p><p>Rangka Atap : Baja Ringan</p><p>Material Atap : Genteng Beton</p><p>Plafond : Gypsum Finishing Cat</p><p>Lantai Ruangan : Granit 60 x 60</p><p>Lantai Kamar Mandi : Keramik 25 x 25</p><p>Kusen : Aluminium</p><p>Pintu : Kayu Oven</p><p>Wc Sanitary : Toto / Setara</p><p>Sumber Air : Bor Pantek / Jetpump</p>', '<p>The Crystal Residence Berada Diatas Lahan Sekitar 1,2 Hektar Dengan Jumlah Keseluruhan Sebanyak 95 Unit.</p><p>The Crystal Residence Berada Di Jalan Cimanggis, Bojonggede. Dengan Mengusung Design Bangunan Modern Minimalis Dan Penataan Ruang Yang Baik. The Crystal Residence Mempunyai Tingkat Privasi Serta Keamanan Yang Lebih Terjamin Sehingga Sangat Cocok Untuk Hunian Bagi Keluarga Baru Dengan Mobilitas Yang Tinggi.</p>', 'https://maps.app.goo.gl/ENnJkNZwbcufsauH6', '<p>Out Bond Sapadia - Marco Polo Water Adventure Bogor - Kampung Wisata Jampang - Stadion Pakansari - Taman Wisata Pasir Putih - Bamboedeen Resort</p>', 'Tersedia', '<p>RS. Sentosa - RS. Citama - RS. Harapan Sehati - RS. Hermina Bogor - Puskesmas Tajur Halang</p>', '<p>SDN 02 Tonjong - SMP Global Insani School - SMKN 1 Kemang Bogor - SMAN 1 Tajur Halang - Sekolah Madaniah Bogor</p>', '<p>Cibinong City Mall - Lotte Mart Yasmin - Trans Mart Yasmin - Giant Yasmin</p>'),
(2, 5, '<i class=\"fas fa-door-open\"></i> One Gate System <i class=\"fas fa-shield-alt\"></i> Security 24 jam <i class=\"fas fa-tree\"></i> Taman Bermain <i class=\"fas fa-leaf\"></i> Konsep Cluster', '2', '1', '1', '36', '72', '390', '', '', 'https://maps.app.goo.gl/ENnJkNZwbcufsauH6', '', 'Tidak Tersedia', '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fasilitas`
--

CREATE TABLE `fasilitas` (
  `id_fasilitas` int(11) NOT NULL,
  `nama_fasilitas` varchar(50) DEFAULT NULL,
  `icon` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `fasilitas`
--

INSERT INTO `fasilitas` (`id_fasilitas`, `nama_fasilitas`, `icon`) VALUES
(1, 'One Gate System', 'fas fa-door-open'),
(2, 'Security 24 jam', 'fas fa-shield-alt'),
(3, 'Taman Bermain', 'fas fa-tree'),
(4, 'Konsep Cluster', 'fas fa-leaf'),
(5, 'row jalan lebar', 'fas fa-road');

-- --------------------------------------------------------

--
-- Struktur dari tabel `komisi`
--

CREATE TABLE `komisi` (
  `id_prospek` int(11) NOT NULL,
  `nama_member` varchar(50) DEFAULT NULL,
  `komisi` double(50,1) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `status_pencairan` enum('Cair','Belum Cair') DEFAULT NULL,
  `status_prospek` enum('Closing','Sp3k','Akad','Reject') DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `komisi`
--

INSERT INTO `komisi` (`id_prospek`, `nama_member`, `komisi`, `keterangan`, `status_pencairan`, `status_prospek`, `created_at`, `updated_at`) VALUES
(1, 'Sudomo Sudirman Sasmita', NULL, '', 'Belum Cair', 'Akad', '2021-09-13', '2021-09-24'),
(2, 'Wulan Glenna Muljana', 2.2, '', 'Cair', 'Akad', '2021-09-13', '2021-09-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `member_profile`
--

CREATE TABLE `member_profile` (
  `id_member` int(11) NOT NULL,
  `nama_member` varchar(50) DEFAULT NULL,
  `handphone` varchar(50) DEFAULT NULL,
  `whatsapp` varchar(50) DEFAULT NULL,
  `alamat` varchar(50) DEFAULT NULL,
  `usia` varchar(50) DEFAULT NULL,
  `jenis_kelamin` enum('Laki-Laki','Perempuan','','') DEFAULT NULL,
  `pekerjaan` varchar(50) DEFAULT NULL,
  `rekomendasi` varchar(50) DEFAULT NULL,
  `nama_rekening` varchar(50) DEFAULT NULL,
  `nama_bank` enum('BTN','BRI','Maybank','Niaga','Hanabank','Mandiri','BJB','BCA','BNI') DEFAULT NULL,
  `no_rekening` varchar(50) DEFAULT NULL,
  `status_member` enum('Aktif','Non Aktif','Suspend') DEFAULT NULL,
  `foto_ktp` varchar(100) DEFAULT NULL,
  `fotodiri_ktp` varchar(100) DEFAULT NULL,
  `foto_profile` varchar(100) DEFAULT NULL,
  `foto_rekening` varchar(100) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `member_profile`
--

INSERT INTO `member_profile` (`id_member`, `nama_member`, `handphone`, `whatsapp`, `alamat`, `usia`, `jenis_kelamin`, `pekerjaan`, `rekomendasi`, `nama_rekening`, `nama_bank`, `no_rekening`, `status_member`, `foto_ktp`, `fotodiri_ktp`, `foto_profile`, `foto_rekening`, `created_at`, `updated_at`) VALUES
(1, 'Suharto Yandi', '031 70127461', '031 70127461', 'Jl Prisma Kedoya Plaza Bl D/28, Dki Jakarta', '48', 'Laki-Laki', 'Own business', 'Sudomo Sudirman Sasmita', 'Sudomo Sudirman Sasmita', 'BTN', '27538712638', 'Aktif', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', '2021-09-26', '2021-09-26'),
(2, 'Delviani Permata Sari', '0-21-535-7000', '0-21-535-7000', 'Jl Dinoyo 82', '39', 'Perempuan', 'Part-time work', 'Wulan Glenna Muljana', 'Wulan Glenna Muljana', 'BRI', '27538712638', 'Non Aktif', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', '2021-09-26', '2021-09-26'),
(3, 'Praja', '021 5861383', '021 5861383', 'Jl Meruya Ilir Raya 20-A,Meruya Ilir', '39', 'Laki-Laki', 'Part-time work', 'Sudomo Sudirman Sasmita', 'Wulan Glenna Muljana', 'Maybank', '27538712638', 'Aktif', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', '2021-09-26', '2021-09-26');

-- --------------------------------------------------------

--
-- Struktur dari tabel `migrations`
--

CREATE TABLE `migrations` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `version` varchar(255) NOT NULL,
  `class` varchar(255) NOT NULL,
  `group` varchar(255) NOT NULL,
  `namespace` varchar(255) NOT NULL,
  `time` int(11) NOT NULL,
  `batch` int(11) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `migrations`
--

INSERT INTO `migrations` (`id`, `version`, `class`, `group`, `namespace`, `time`, `batch`) VALUES
(1, '2021-08-27-053117', 'App\\Database\\Migrations\\MemberProfile', 'default', 'App', 1630364780, 1),
(2, '2021-08-27-053143', 'App\\Database\\Migrations\\User', 'default', 'App', 1630364780, 1),
(3, '2021-08-27-053209', 'App\\Database\\Migrations\\Komisi', 'default', 'App', 1630364780, 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `notifikasi`
--

CREATE TABLE `notifikasi` (
  `id_notifikasi` int(11) NOT NULL,
  `id_member` int(11) NOT NULL,
  `isi_notif` varchar(100) DEFAULT NULL,
  `status` enum('dibaca','belum dibaca','','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id_penjualan` int(11) NOT NULL,
  `id_pegawai` varchar(11) DEFAULT NULL,
  `id_proyek` int(3) NOT NULL,
  `id_unit` int(5) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL,
  `tgl_batal` date DEFAULT NULL,
  `duedate` date DEFAULT NULL,
  `jenis_pembayaran` enum('TUNAI KERAS','TUNAI BERTAHAP','KPR') DEFAULT NULL,
  `status_penjualan` enum('booking','DP','SP3K','Bank Reject','Sold','Move','Withdraw') DEFAULT NULL,
  `status_akad` tinyint(1) DEFAULT 0,
  `tgl_akad` date DEFAULT NULL,
  `status_pencairan` tinyint(1) DEFAULT 0,
  `tgl_pencairan` date DEFAULT NULL,
  `komisi_pencairan` double DEFAULT NULL,
  `tgl_pengajuan` date DEFAULT NULL,
  `tgl_proses` date DEFAULT NULL,
  `pekerjaan_konsumen` varchar(45) DEFAULT NULL,
  `nama_konsumen` varchar(45) DEFAULT NULL,
  `nomor_konsumen` varchar(16) DEFAULT NULL,
  `jk` enum('Pria','Wanita') DEFAULT NULL,
  `no_ktp` varchar(20) DEFAULT NULL,
  `alamat_konsumen` text DEFAULT NULL,
  `status_pernikahan` enum('Lajang','Menikah','Duda','Janda') DEFAULT NULL,
  `nama_pasangan` varchar(30) DEFAULT NULL,
  `sumber_info` enum('Facebook','Instagram','Website Bos Properti','Walk In') DEFAULT NULL,
  `metode_bayar` enum('Single Income','Join Income') DEFAULT NULL,
  `diskon` double DEFAULT 0,
  `harga` double DEFAULT NULL,
  `plafon_kpr` double DEFAULT NULL,
  `harga_net` double DEFAULT NULL,
  `booking_fee` double DEFAULT NULL,
  `tgl_sp3k` date DEFAULT NULL,
  `tgl_dp` date DEFAULT NULL,
  `dp` double DEFAULT NULL,
  `bukti_dp` varchar(50) DEFAULT NULL,
  `hadiah_langsung` varchar(20) DEFAULT NULL,
  `hadiah_snk` varchar(20) DEFAULT NULL,
  `pic` varchar(25) DEFAULT NULL,
  `colead` varchar(50) DEFAULT NULL,
  `transfer` varchar(100) DEFAULT NULL,
  `bank` enum('BTN','BRI','Maybank','Niaga','Hanabank','Mandiri','BJB','BCA','BNI') DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `ket_pencairan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `prospek`
--

CREATE TABLE `prospek` (
  `id_prospek` int(11) NOT NULL,
  `nama_customer` varchar(50) DEFAULT NULL,
  `nama_member` varchar(50) DEFAULT NULL,
  `status_hubungan` enum('Teman','Keluarga','Kolega','') DEFAULT NULL,
  `no_telepon` varchar(50) DEFAULT NULL,
  `proyek_diminati` varchar(100) DEFAULT NULL,
  `range_harga` enum('Dibawah 500jt','500jt - 1M','Diatas 1M','') DEFAULT NULL,
  `jadwal_survei` varchar(50) DEFAULT NULL,
  `keterangan` text DEFAULT NULL,
  `nama_marketing` varchar(50) DEFAULT NULL,
  `created_at` date DEFAULT NULL,
  `updated_at` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `prospek`
--

INSERT INTO `prospek` (`id_prospek`, `nama_customer`, `nama_member`, `status_hubungan`, `no_telepon`, `proyek_diminati`, `range_harga`, `jadwal_survei`, `keterangan`, `nama_marketing`, `created_at`, `updated_at`) VALUES
(1, 'John Doe', 'Sudomo Sudirman Sasmita', 'Teman', '+0200300500', 'Botanica Valley', 'Dibawah 500jt', '2021-09-14', '', NULL, '2021-09-13', '2021-09-24'),
(2, 'John Doe', 'Wulan Glenna Muljana', 'Keluarga', '+0200300500', 'Cilodong Pavillion', '500jt - 1M', '2021-09-15', '', NULL, '2021-09-13', '2021-09-13');

-- --------------------------------------------------------

--
-- Struktur dari tabel `proyek`
--

CREATE TABLE `proyek` (
  `id_proyek` int(3) NOT NULL,
  `nama_proyek` varchar(45) NOT NULL,
  `alamat` text NOT NULL,
  `kota` varchar(30) DEFAULT NULL,
  `developer` varchar(40) NOT NULL,
  `lokasi` text DEFAULT NULL,
  `referrall` varchar(45) NOT NULL,
  `pimpro` varchar(25) NOT NULL,
  `jenis_pks` enum('Inden','Ready') NOT NULL DEFAULT 'Inden',
  `target_perbulan` int(3) DEFAULT NULL,
  `siteplan` varchar(255) DEFAULT NULL,
  `sertifikat` varchar(255) DEFAULT NULL,
  `PBB` varchar(255) DEFAULT NULL,
  `MOU` varchar(255) DEFAULT NULL,
  `MOU_startDate` varchar(20) DEFAULT NULL,
  `MOU_ExpDate` varchar(20) DEFAULT NULL,
  `cloudia` text DEFAULT NULL,
  `persentase` char(4) DEFAULT '0.8',
  `globkomisi` float DEFAULT 0.07,
  `netkomisi` char(4) DEFAULT '0.7',
  `is_active` tinyint(1) NOT NULL DEFAULT 1,
  `nonzone` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data untuk tabel `proyek`
--

INSERT INTO `proyek` (`id_proyek`, `nama_proyek`, `alamat`, `kota`, `developer`, `lokasi`, `referrall`, `pimpro`, `jenis_pks`, `target_perbulan`, `siteplan`, `sertifikat`, `PBB`, `MOU`, `MOU_startDate`, `MOU_ExpDate`, `cloudia`, `persentase`, `globkomisi`, `netkomisi`, `is_active`, `nonzone`) VALUES
(1, 'Allure Mansion', 'Jalan Kampung Sawah No.88, Jatiwarna, Jatimurni, Pondokmelati, Kota Bks, Jawa Barat 17431', NULL, '', 'https://goo.gl/maps/HBGkgtpKY4H2', 'Ajat Sudrajat ', 'Ajat Sudrajat', 'Inden', 5, '', '', '', '', '2018-03-01', '2018-09-01', 'https://drive.google.com/drive/u/0/folders/1_Q1KaLVRN2cjHVnTnoSCDKBq2MhhIDsZ', '0.8', 0.07, '0.06', 0, 0),
(2, 'Asoka Townhouse', 'Jalan Mimosa X, Pejaten Barat, Pasar Minggu, RT.6/RW.4, Pejaten Bar., Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12740', NULL, '', '', 'Sumintong Wibowo', 'Sumintong Wibowo', 'Ready', 4, '', 'Hellobos_FrontEnd.png', '', 'sample.jpg', '2018-06-01', '2018-09-01', 'https://drive.google.com/drive/u/0/folders/1_x0Osqg8DQ_oLq2lbRzoy4nPKa0vvEcU', '0.8', 0.07, '0.06', 0, 0),
(3, 'Botanica Valley', 'Jl. Rawa Kalong No.20, RT.1/RW.1, Rawakalong, Gunung Sindur, Rawakalong, Bogor, Jawa Barat 16340', NULL, '', 'https://goo.gl/maps/EkrsMixHtWz', 'Ihsan Muslihat', 'Ihsan Muslihat', 'Inden', 5, 'chart-line.png', 'blank-man.jpg', 'hasil.png', 'Mitha-Marketing.jpg', '2018-07-11', '2018-09-11', 'https://drive.google.com/drive/u/0/folders/1ohYG7OwG0lFTa-gPpAi57L7QLx7SAV17', '0.75', 0.07, '0.06', 1, 0),
(4, 'Bunga Residense', 'Jl. H. Jairan, Tengah, Cibinong, Bogor, Jawa Barat 16914', NULL, '', 'https://drive.google.com/drive/u/0/folders/1VPQqzNT1QFAuPceo0YRjMJWg5oEsZz6b', 'Putri', 'Mochamad Bhakti Saputra', '', 4, '', '', '', '', '2018-07-10', '2018-10-12', 'https://drive.google.com/drive/u/0/folders/1VPQqzNT1QFAuPceo0YRjMJWg5oEsZz6b', '0.8', 0.07, '0.06', 0, 0),
(5, 'Cilodong Pavillion', 'Jl, Abdul Ghani kampung bedahan kelurahankalibaru kecamatan cilodong - kota depok\r\n', NULL, '', '', 'Ihsan Muslihat', 'Ihsan Muslihat', '', 2, '', '', '', 'Ready-for-a-Dual.jpg', '2018-09-12', '2018-11-15', 'https://drive.google.com/drive/u/0/folders/1mvkkNESfmkQ4Eo4UjkwlJM1EzmGrn88A', '0.8', 0.07, '0.06', 1, 0),
(6, 'Cibanteng Cluster', 'Jl. Babengket, Cihideung Udik, Ciampea, Bogor, Jawa Barat 16620', NULL, '', 'https://goo.gl/maps/2H9XKhhiyXs', 'Sumintong Wibowo', 'Sumintong Wibowo', 'Inden', 0, '', '', '', 'I-Love-You.jpg', '2018-04-01', '2018-05-01', 'https://drive.google.com/drive/u/0/folders/1bJhQwHeKdYFPyxBEwT5msriPpgvYepwl', '0.9', 0.07, '0.05', 1, 0),
(7, 'Dealova Residence', 'Jl. Sukahati (Seberang McD Pemda Cibinong)', NULL, '', '', 'Hernowo', 'Mochamad Bhakti Saputra', '', 0, NULL, NULL, NULL, NULL, '', '', 'https://drive.google.com/drive/u/0/folders/1aQgE0Orsa1S56Ph-DlMZEoyf-b162Sw8', '0.8', 0.07, '0.06', 0, 0),
(8, 'The Flower Residence', 'Jl. Kramat, Sukatani, Tapos, Kota Depok, Jawa Barat 16454', NULL, '', 'https://goo.gl/maps/t9MUdNroYc82', 'Widowati', 'Yanth Heryanto', '', 0, '', '', '', '', '', '', 'https://drive.google.com/drive/u/0/folders/1cYdUmqlYh-6KpYmpNxxviLMUTRRCOFI-', '0.8', 0.07, '0.06', 0, 0),
(9, 'Green Andara Residences', 'Jl. Andara No.17, Pangkalan Jati Baru, Cinere, Kota Depok, Jawa Barat 12450', NULL, '', 'https://goo.gl/maps/25rTJcgcPPK2', 'Sumintong Wibowo', 'Sumintong Wibowo', '', 0, NULL, NULL, NULL, NULL, '', '', 'https://drive.google.com/drive/u/0/folders/1ThsR07Ects56crjwdkTfbTdQRvALeSzB', '0.8', 0.07, '0.06', 0, 0),
(10, 'Green View', 'Jalan Mandor Sanun No.31, Harapan Jaya, Cibinong, Harapan Jaya, Cibinong, Bogor, Jawa Barat 16914', NULL, '', 'https://goo.gl/maps/wHQdyLcUFvv', 'Irma', 'Ahmad Hardian', '', 0, NULL, NULL, NULL, NULL, '', '', 'https://drive.google.com/drive/u/0/folders/1hEHiN8qvq-I4RnzZfqZO3rE87Dy14xIK', '0.8', 0.07, '0.06', 0, 0),
(11, 'Griya Tonjong Asri', 'Jl. Permata Sari Blk. Aa No.2, Tonjong, Tajur Halang, Bogor, Jawa Barat 16320', NULL, '', 'https://goo.gl/maps/zuTBFUrXZ8L2', 'Yanth Heryanto', 'Deny Martian Mercedes', 'Ready', 2, '', '', '', '', '2019-01-08', '2020-01-08', 'https://drive.google.com/drive/u/0/folders/1pzkz4Ufr-q5HtoHCOe5bMZYHBL4rGF4q', '0.8', 0.07, '0.06', 0, 0),
(12, 'Griya Torina', 'Jalan Ikan Paus Raya No.64, Jatikramat, Jatiasih, Jatikramat, Jatiasih, Kota Bks, Jawa Barat 17421', NULL, '', 'https://goo.gl/maps/yavteZxGRQx', 'Sumintong Wibowo', 'Sumintong Wibowo', '', 0, NULL, NULL, NULL, NULL, '', '', 'https://drive.google.com/drive/u/0/folders/1QDGLaUyt1Z6h9RRG7A-t-sCaxIIBH8x3', '0.8', 0.07, '0.06', 0, 0),
(13, 'Kahuripan Residence', '', NULL, '', 'https://goo.gl/maps/fonPHy7Xby72', 'Sumintong Wibowo', 'Yanth Heryanto', '', 0, '', '', '', '', '2018-03-18', '2018-09-18', 'https://drive.google.com/drive/u/0/folders/1ZknUkx7XnrdM3gGEZR563QwvZtN3n5FL', '0.8', 0.07, '0.06', 0, 0),
(14, 'Kalibaru Residences', '', NULL, '', 'https://goo.gl/maps/ixpYCLgVDJp', 'Chaerudin Soleh', 'Chaerudin Soleh', '', 0, '', '', '', '', '2018-04-16', '2018-10-16', 'https://drive.google.com/drive/u/0/folders/1Pye85HPDUn7xM67lW4O3LJIhk4IWd9NO', '0.8', 0.07, '0.06', 0, 0),
(15, 'Kanara Green Village tahap 1', '', NULL, '', 'https://goo.gl/maps/RL7G2WpfmoR2', 'Sumintong Wibowo', 'Yanth Heryanto', '', 0, '', '', '', '', '2016-05-09', '2017-05-09', 'https://drive.google.com/drive/u/0/folders/1mE2vjtYy2oFs5ji0V2JmteIbgEnMRqcw', '0.8', 0.07, '0.06', 0, 0),
(16, 'Mulia Asri', 'Jl. Mandor Naiman No.99, Pasir Jambu, Sukaraja, Bogor, Jawa Barat 16710', NULL, '', 'https://goo.gl/maps/NgXKB4fC1SN2', 'Sumintong Wibowo', 'Sumintong Wibowo', '', 0, NULL, NULL, NULL, NULL, '', '', 'https://drive.google.com/drive/u/0/folders/133bU9Jvv9nh9Q-zeYEeEZ9T0XMQaGMQB', '0.8', 0.07, '0.06', 0, 0),
(17, 'D\'Palas Asri', 'Jl. Kp.Kedung Waringin Tengah Bojong Gede, Kab.Bogor', NULL, '', 'https://goo.gl/maps/jHZxnojsDt52', 'Chaerudin Soleh', 'Chaerudin Soleh', '', 0, '', '', '', '', '2018-07-18', '2019-01-18', 'https://drive.google.com/drive/u/0/folders/126gSqhm4UWWMAv8bQhMgCdvb1K9-UxYF', '0.8', 0.07, '0.06', 0, 0),
(18, 'Palas Green Hills', 'Jl. Bojong Kemang ( Bojong Hillir KOPASSUS , Salabenda ) Bogor', NULL, '', 'https://goo.gl/maps/FsE5qQ7pw3J2', 'Chaerudin Soleh', 'Chaerudin Soleh', '', 0, '', '', '', '', '', '', 'https://drive.google.com/drive/u/0/folders/1G4sPVVjI6c6QredAb-EwGMLrbgsqMaA6', '0.8', 0.07, '0.06', 0, 0),
(19, 'Pesona Hibatillah', 'jalan mandor samin (sebelah smpn 6 depok)\r\nJl. Kalibaru, Kalibaru, Sukmajaya, Kalibaru, Cilodong, Kalibaru, Cilodong, Kota Depok, Jawa Barat 16426', NULL, '', 'https://goo.gl/maps/P1D5q4tguEP2', 'Faried', 'Achmad Syaihu', 'Inden', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0.8', 0.07, '0.06', 0, 0),
(20, 'Portiara Townhouse', '', NULL, '', 'https://goo.gl/maps/YaQLeH3Coi12', 'Rangga Kusuma', 'Rangga Kusuma', '', 0, '', '', '', '', '2018-05-01', '2018-08-12', 'https://drive.google.com/drive/u/2/folders/1PEYu8rife1cw2m-3xFLUFc029zH77k_f', '0.8', 0.07, '0.06', 0, 0),
(21, 'Qnaya Regency', '', NULL, '', 'https://goo.gl/maps/7ykDYqXvWBv', 'Ahmad Syaihu', 'Ahmad Syaihu', 'Inden', 0, '', '', '', '', '2017-04-11', '2017-10-11', '', '0.8', 0.07, '0.06', 0, 0),
(22, 'Square Garden', 'Kalisuren, Tajur Halang, Bogor, West Java 16320', NULL, '', 'https://goo.gl/maps/xe1N4zGVM1r', 'Sumintong Wibowo', 'Ahmad hardian', '', 0, '', '', '', '', '', '', 'https://drive.google.com/drive/u/0/folders/1w3GsnhgIp2QcKIO44EUiXnIoZd3I_usz', '0.8', 0.07, '0.06', 0, 0),
(23, 'Villa Moccara Riverside Townhouse', 'Jl. H. Abdullah, Parakan, Ciomas, Bogor, Jawa Barat 16610', NULL, '', 'https://goo.gl/maps/Wps3GyR3hDw', 'Yanth Heryanto', 'Yanth Heryanto', '', 0, '', '', '', '', '', '', 'https://drive.google.com/drive/u/0/folders/1-phLwXfPVKfD0gbHP6vY4e3tC0Oo17ZX', '0.8', 0.07, '0.06', 0, 0),
(24, 'Wartawangsa Residence', 'Jl. Kol.Edy Yoso Martadipura, Pakansari, Cibinong, Bogor, Jawa Barat 16915', NULL, '', 'https://goo.gl/maps/fEec1LYd6jA2', 'Ihsan Muslihat', 'Ihsan Muslihat', '', 0, '', '', '', '', '', '', 'https://drive.google.com/drive/u/0/folders/1e2fWAVcvr5Ug-3FS_Z4A5wC6mFSB4NJE', '0.8', 0.07, '0.06', 0, 0),
(25, 'Kirana Green Valley', 'Jl. Raya Rancabungur, Semplak Bar., Kemang, Bogor, Jawa Barat 16310', NULL, '', '#', '-', '-', 'Ready', 3, NULL, NULL, NULL, NULL, '', '', NULL, '0.8', 0.07, '0.06', 0, 0),
(26, 'Green Living', '', NULL, '', '#', 'Sumintong Wibowo', '-', 'Ready', 3, '', '', '', '', '2018-09-20', '2019-03-20', 'https://drive.google.com/drive/u/2/folders/1Don03Ds6onmeO-cMds9bn8vnbLL9Mdjy', '0.8', 0.07, '0.06', 0, 0),
(27, 'SAI Residence', 'Tajur Halang, Dekat kantor kecamatan tajur halang, Kabupaten Bogor', NULL, '', '#', '-', '-', 'Ready', 3, '', '', '', '', '', '', 'https://drive.google.com/drive/u/0/folders/1as03haYGMquTwe5VatXgazY4_POE0Cvh', '0.8', 0.07, '0.06', 0, 0),
(28, 'Infinity Resort Townhouse', 'Jl. Kesuma Puri Raya No.23, Harjamukti, Cimanggis, Kota Depok, Jawa Barat 16454', NULL, '', '#', '-', '-', 'Inden', 3, '', '', '', '', '2018-09-29', '2019-03-29', 'https://drive.google.com/drive/u/0/folders/1rDiFJf-X8jHKTXrdyWC1-vfhk-siO4lD', '0.8', 0.07, '0.06', 0, 0),
(29, 'Hanasangka Residence', '', NULL, '', '#', 'Sumintong Wibowo', '-', 'Ready', 3, '', '', '', '', '2018-09-21', '2019-01-21', 'https://drive.google.com/drive/u/0/folders/1Evbj8ZdoHR2M1zZ5wPUUs05_HKL3DXTw', '0.8', 0.07, '0.06', 0, 0),
(30, 'Green House Depok', '-', NULL, '', '-', 'Ajat', 'Ajat', 'Inden', 0, '', '', '', 'DB_KPI_Hello_bos.pdf', '2018-02-01', '2018-05-01', '', '0.8', 0.07, '0.06', 0, 0),
(31, 'Garuda Park Residence', 'Jl. Raya Kalisuren, Tonjong, Tajur Halang, Bogor, Jawa Barat 16320', NULL, '', '-', 'Ihsan Muslihat', '-', 'Inden', 0, '', '', '', '', '2018-10-22', '2019-04-22', '', '0.8', 0.07, '0.06', 0, 0),
(32, 'Dedeul', '-', NULL, '', '-', 'sumintong', 'sumintong', 'Ready', 1, NULL, NULL, NULL, NULL, '', '', '-', '0.8', 0.07, '0.06', 1, 0),
(33, 'Green Savana', 'Pasireurih, Tamansari, Bogor, Jawa Barat 16610', NULL, '', 'https://goo.gl/maps/aA5G2NPHhHo', 'Ajat', 'Yanth Heriyanto', 'Inden', 0, '', '', '', '', '2019-01-29', '2019-04-29', 'https://drive.google.com/drive/folders/1H8HwmT9EylOFWaOVURwsFTamr6I2-rvd', '0.8', 0.07, '0.06', 0, 0),
(34, 'Lavita Residence', 'Jalan Pabuaran Cibinong', NULL, '', '', 'Agni Setiaji', 'Bhakti Saputra', 'Ready', 1, NULL, NULL, NULL, NULL, '2018-12-14', '2019-04-14', '', '0.8', 0.07, '0.06', 0, 0),
(35, 'Graha Kirana Residence', 'Bojong Gede ', NULL, '', '', 'Ahmad Zainudin ', 'Syarif', 'Inden', 5, '', '', '', '', '2019-01-13', '2019-06-13', 'https://drive.google.com/drive/u/2/folders/11YM_k2n9gX7reIDl5Vev_DZmmAsRPdpB', '0.8', 0.07, '0.06', 0, 0),
(36, 'Graha Kartika Pesona ', 'Jl. Wr. Jaud, Wr. Jaud, Kasemen, Kota Serang, Banten 42191', NULL, '', 'https://goo.gl/maps/2VSQxD4hBGs', 'Ajat Sudrajat ', 'Eddi Maryadi ', 'Ready', 10, '', '', '', '', '2019-01-15', '2020-01-15', 'https://drive.google.com/drive/u/3/folders/16zL5nonaijckKLqA7o2khzbcIYdlpgqV', '0.8', 0.07, '0.06', 0, 0),
(37, 'Grand Permata Residence', '', NULL, '', '', 'Eddi Maryadi', 'Eddi Maryadi ', 'Ready', 0, '', '', '', '', '2019-01-10', '2019-06-10', 'https://drive.google.com/drive/u/2/folders/1nPCM0lYT4rOTuu4q6OJxAXS7dHlQHn7c', '0.8', 0.07, '0.06', 0, 0),
(38, 'Griya Jasmine Cimuning ', '', NULL, '', '', 'Airlangga Reza Dwi Putra', 'Airlangga Reza Dwi Putra ', 'Inden', 0, '', '', '', '', '2019-01-15', '2019-04-15', 'https://drive.google.com/drive/u/2/folders/1jQRB--oLCaTkpQLSnQsUAcg4R85m4RDn', '0.8', 0.07, '0.06', 0, 0),
(39, 'Kanaya Hills', 'Rangkasbitung', NULL, '', '', 'Kantor ', 'Eddi Maryadi ', 'Inden', 0, '', '', '', '', '2019-01-26', '2019-04-20', 'https://drive.google.com/drive/u/2/folders/1tNjcGAmcg68RM5B1f6mUjIsoWirf-QXF', '0.8', 0.07, '0.06', 0, 0),
(40, 'Sevilla Residence', '', NULL, '', '', 'Eddi Maryadi', 'Rangga Kusuma', 'Inden', 0, '', '', '', '', '2019-02-15', '2019-04-15', 'https://drive.google.com/drive/u/2/folders/1zwSDLqZfXqv4voCyTQ6G2LYRBrXr0nxV', '0.8', 0.07, '0.06', 0, 0),
(41, 'The Royal Margonda', '', NULL, '', '', 'Eddi Maryadi', 'Rangga Kusuma', 'Inden', 0, '', '', '', '', '2019-02-15', '2019-08-15', 'https://drive.google.com/drive/u/2/folders/1OyZJ68k4T_ry1MPE5swKB8ts0gV613rq', '0.8', 0.07, '0.06', 0, 0),
(42, 'Padjajaran Village', '', NULL, '', '', 'Maulana Saputra', 'Maulana Saputra', 'Inden', 0, '', '', '', '', '2019-02-13', '2019-11-13', 'https://drive.google.com/drive/u/2/folders/1h9691NSGcc166XppxwwfGpOT0pTsT3a3', '0.8', 0.07, '0.06', 0, 0),
(43, 'Blessing Hills Village', '', NULL, '', '', 'Eddi Maryadi', 'Alexander Nusalim', 'Ready', 0, '', '', '', '', '2019-02-15', '2019-08-15', 'https://drive.google.com/drive/u/2/folders/1VEX-Fv9LYEEwaF_DVrBbtsjUL9k8uvkA', '0.8', 0.07, '0.06', 0, 0),
(44, 'Global Town House', '', NULL, '', '', 'Eddi Maryadi', 'Alexander', 'Ready', 3, '', '', '', '', '2019-03-05', '2019-09-05', 'https://drive.google.com/drive/u/2/folders/1xogsiviv9aKdVM2f7nTJBCzkOR6RDMbJ', '0.8', 0.07, '0.06', 0, 0),
(45, 'The Colony Residence', '', NULL, '', '', 'Rangga Kusuma ', 'Rangga Kusuma', 'Inden', 0, '', '', '', '', '2019-02-23', '2019-08-23', 'https://drive.google.com/drive/u/2/folders/1D9DX9_VjuDwlc5j7_NOWnm_PuU16ug89', '0.8', 0.07, '0.06', 0, 0),
(46, 'NU Green Residence', '', NULL, '', '', 'Rangga Kusuma ', 'Rangga Kusuma', 'Inden', 0, '', '', '', '', '2019-02-19', '2019-05-19', 'https://drive.google.com/drive/u/2/folders/1IqwRXyV7iMlZS_897JVDCQAyltB1KyWw', '0.8', 0.07, '0.06', 0, 0),
(47, 'Mahameru Jasmine Hill', '', NULL, '', '', 'Eddi Maryadi', 'Eddi Maryadi ', 'Inden', 0, '', '', '', '', '', '', 'https://drive.google.com/drive/u/2/folders/1JZf1-S9AL4LWqaAHz0oNo5gzzokD--nB', '0.8', 0.07, '0.06', 0, 0),
(48, 'Rumah Hijau', '', NULL, '', '', 'Indra', '', 'Inden', 0, '', '', '', '', '2019-03-19', '2019-06-19', '', '0.8', 0.07, '0.06', 0, 0),
(49, 'The Belle Residence', '', NULL, '', '', 'Ihsan ', 'Eddi Maryadi ', 'Ready', 0, '', '', '', '', '2019-03-27', '2019-09-27', '', '0.8', 0.07, '0.06', 0, 0),
(50, 'Sentra Tajur Halang ', '', NULL, '', '', 'Eddi Maryadi', 'Maulana Saputra', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '0.8', 0.07, '0.06', 0, 0),
(51, 'Sewangi Garden', '', NULL, '', '', 'Elis Resmiati', 'Mandala ', 'Ready', 0, '', '', '', '', '2019-04-20', '2019-07-25', '', NULL, 0.07, '0.7', 0, 0),
(52, 'D`Florrie', '', NULL, '', '', 'Rangga Kusuma ', 'Eddi Maryadi ', 'Inden', 0, '', '', '', '', '2019-05-21', '2019-08-30', 'https://drive.google.com/drive/u/2/folders/1quMBmZ0yosGWi5rD0y1xoiSlFmKaRNJc', '', 0.07, '', 0, 0),
(53, 'Bukit Savanna ', '', NULL, '', '', 'Rangga Kusuma ', 'Rangga Kusuma', 'Inden', 0, '', '', '', '', '2019-06-21', '2019-10-21', 'https://drive.google.com/drive/u/2/folders/1A_QZZZ0Are5FqteF42DKXODSr0_JGMph', '', 0.07, '', 0, 0),
(54, 'New Town Residence', '', NULL, '', '', 'Agni Setiaji', 'Mandala ', 'Inden', 0, '', '', '', '', '2019-07-04', '2020-01-04', '', '', 0.07, '', 0, 0),
(55, '9 Residence', '', NULL, '', '', 'Agni Setiaji', 'Rangga Kusuma', 'Inden', 0, '', '', '', '', '2019-05-20', '2019-08-20', 'https://drive.google.com/drive/u/2/folders/1KAu2r-p2cdyaFQT-eLcA0Q895zkZPgXp', '', 0.07, '', 0, 0),
(56, 'Pelita 8 Residence', '', NULL, '', '', 'Eddi Maryadi', 'Eddi Maryadi ', 'Inden', 0, '', '', '', '', '2019-07-11', '2020-01-11', '', '', 0.07, '', 0, 0),
(57, 'Havilla Residence', '', NULL, '', '', 'Rangga Kusuma ', 'egha', 'Inden', 0, '', '', '', '', '2019-07-16', '2020-01-16', 'https://drive.google.com/drive/u/2/folders/1AcXtIrtFAoAuZd5nRxAWktd2vWd81OX5', '', 0.07, '', 0, 0),
(58, 'Terrace Park Residence', '', NULL, '', '', 'Fanny Ilham', 'Eddi Maryadi', 'Inden', 0, '', '', '', '', '2019-07-12', '2020-01-12', '', '', 0.07, '', 0, 0),
(59, 'The Hermosa Garden ', '', NULL, '', '', '  Eddi Maryadi', 'Eddi Maryadi', 'Inden', 0, '', '', '', '', '2019-06-29', '2019-12-31', '', '', 0.07, '', 0, 0),
(60, 'Pratama Residence ', '', NULL, '', '', 'Maulana Saputra', 'Maulana Saputra', 'Inden', 0, '', '', '', '', '2019-08-06', '2020-05-06', '', '', 0.07, '', 1, 0),
(61, 'Lavanya Hills Residences', '', NULL, '', '', 'Sumintong Wibowo', 'Rangga Kusuma', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 0, 0),
(62, 'Tanbassa Residence Ciputat', '', NULL, '', '', 'Ihsan Muslihat', 'Eddi Maryadi ', 'Inden', 0, '', '', '', '', '2019-08-13', '2020-02-13', '', '', 0.07, '', 0, 0),
(63, 'Tanbassa Residence Pondok Cabe', '', NULL, '', '', 'Ihsan Muslihat', 'Eddi Maryadi ', 'Inden', 0, '', '', '', '', '2019-08-13', '2020-02-13', '', '', 0.07, '', 0, 0),
(64, 'The Crystal Residence', '', NULL, '', '', 'Ardantio', 'Ardantio', 'Inden', 0, '', '', '', '', '2019-08-06', '2020-02-02', '', '', 0.07, '', 0, 0),
(65, 'Ayla Village Citayam', '', NULL, '', '', 'Mandala', 'Mandala ', 'Inden', 0, '', '', '', '', '2019-08-15', '2020-02-05', '', '', 0.07, '', 0, 0),
(66, 'Griya Palem Hijau ', '', NULL, '', '', 'Indra', 'Ardantio', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 0, 0),
(67, 'Rumah Kita ', '', NULL, '', '', 'Airlangga Reza Dwi Putra', 'Airlangga Reza Dwi Putra ', 'Inden', 0, '', '', '', '', '2019-08-15', '2020-02-29', '', '', 0.07, '', 0, 0),
(68, 'Jess Icon Residence', '', NULL, '', '', 'Rangga Kusuma ', 'Rangga Kusuma', 'Inden', 0, '', '', '', '', '2019-07-24', '2020-01-20', '', '', 0.07, '', 0, 0),
(69, 'Zahra Residence', '', NULL, '', '', 'Airlangga Reza Dwi Putra', 'Airlangga Reza Dwi Putra ', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 0, 0),
(70, 'Sunrise Garden ', '', NULL, '', '', 'Booby Kurniawan', 'Ardantio', 'Inden', 0, '', '', '', '', '', '', '', '', 0.07, '', 0, 0),
(71, 'Kemang Mansion', '', NULL, '', '', 'Maulana Saputra', 'Maulana Saputra', 'Inden', 0, '', '', '', '', '2019-08-27', '2020-02-27', '', '', 0.07, '', 0, 0),
(72, 'Harizma Homes Bukit Golf ', '', NULL, '', '', 'Rangga Kusuma ', 'Rangga Kusuma', 'Inden', 0, '', '', '', '', '2019-08-21', '2020-02-17', '', '', 0.07, '', 0, 0),
(73, 'Griya Anugrah Regency', '', NULL, '', '', 'Chaerudin Soleh', 'Maulana Saputra', 'Inden', 0, '', '', '', '', '2019-10-15', '2020-04-15', '', '', 0.07, '', 0, 0),
(74, 'Cimanggis Residence', '', NULL, '', '', 'Chaerudin Soleh', 'Maulana Saputra', 'Inden', 0, '', '', '', '', '2019-10-15', '2020-04-15', '', '', 0.07, '', 0, 0),
(75, 'Royal Oak ', '', NULL, '', '', 'Ardanti', 'Rangga Kusuma', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 0, 0),
(76, 'Aryawidura', '', NULL, '', '', 'Sumintong Wibowo', 'Sumintong Wibowo', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '80', 0.07, '7', 1, 0),
(79, 'Transsera Residence Sawangan', '', NULL, '', '', 'Ihsan Muslihat', 'Rangga Kusuma', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 0, 0),
(80, 'bojonggede dibawah 500jt', '', NULL, '', '', '-', '-', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(81, 'Bojong 500jt-1M', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(82, 'Bekasi diatas 1M', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(83, 'Cibinong dibawah 500jt', '', NULL, '', '', '-', '', 'Inden', 0, '', '', '', '', '', '', '', '', 0.07, '', 1, 1),
(84, 'Jakarta diatas 2M', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(85, 'Depok diatas 1M', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(86, 'Bogor dibawah 500jt', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(87, 'Tangerang 500jt-1M', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(88, 'Cibinong diatas 1M', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(89, 'Cibinong 500jt-1M', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(90, 'Parung 500jt-1M', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(91, 'Karawang 500jtan kebawah', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(92, 'Bogor 500-750jt', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(93, 'Bogor 750jt-1M', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(94, 'Depok 500jt-1M', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(95, 'Parung  dibawah 500jt', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 1, 1),
(97, 'Kanara Green Village', '', NULL, '', '', 'Ardantio', 'Ardantio', 'Inden', 0, '', '', '', '', '', '', '', '', 0.07, '', 0, 0),
(98, 'Griya Bumi Pasundan ', '', NULL, '', '', 'Ardantio', 'Ardantio', 'Inden', 0, '', '', '', 'kpicolead-Maulana_Saputra_(2).pdf', '', '', '', '', 0.07, '', 0, 0),
(99, 'Cisadane Riverview', '', NULL, '', '', 'Ardantio', 'Ardantio', 'Inden', 0, '', '', '', '', '', '', '', '', 0.06, '', 0, 0),
(100, 'D`Kampoeng Regency', '', NULL, '', '', 'Ihsan Muslihat', 'Ihsan Muslihat', 'Inden', 0, '', '', '', '', '', '', '', '', 0.07, '', 0, 0),
(101, 'My Village', '', NULL, '', '', 'Rangga Kusuma ', 'Rangga Kusuma', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0.07, '', 0, 0),
(102, 'Bekasi dibawah 500jt', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 1, 1),
(103, 'Depok dibawah 500jt', '', NULL, '', '', '-', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 1, 1),
(104, 'Square Garden 2', '', NULL, '', '', 'Maulana ', 'Maulana', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 0, 0),
(105, 'Graha Tonjong Asri', '', NULL, '', '', 'Maulana', 'Maulana', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 0, 0),
(106, 'De Lisdin Green Residence', '', NULL, '', '', 'Maulana', 'Maulana', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 0, 0),
(107, 'Bumi Ciomas Asri', '', NULL, '', '', 'Maulana', 'Maulana', 'Ready', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 0, 0),
(108, 'Kavling Siap Bangun Sunrise Garden', '', NULL, '', '', 'Sumintong Wibowo', 'Ihsan Muslihat', 'Inden', 0, '', '', '', '', '', '', '', '', 0, '0.7', 0, 0),
(109, 'The Andalus', '', NULL, '', '', 'Ardantio', 'Ardantio', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 0, 0),
(110, 'Bueno Residence', '', NULL, '', '', 'Maulana', 'Maulana', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 1, 0),
(111, 'Padi 3 Residence', '', NULL, '', '', 'Maulana', 'Maulana', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 1, 0),
(112, 'Pesona Hinggil ', '', NULL, '', '', '-', '-', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 0, 0),
(113, 'Pesona Rancasari', '', NULL, '', '', '-', '-', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 0, 0),
(114, 'Proyek Demo', '', NULL, '', '', 'Demo', 'Demo', 'Ready', 2, NULL, NULL, NULL, NULL, '2020-11-06', '2021-01-01', '', '20', 7, '0.7', 0, 0),
(115, 'Qurnia Residence', '', NULL, '', '', 'Maulana', 'Maulana', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 1, 0),
(116, 'Pratama Indah Cipanas ', '', NULL, '', '', 'Maulana', 'Maulana', 'Ready', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 0, 0),
(117, 'Dirgantara Residence', '', NULL, '', '', 'Ihsan ,Muslihat ', 'I', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 0, 0),
(118, 'Bukit Nanggerang Village', '', NULL, '', '', 'Ihsan Muslihat ', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 1, 0),
(119, 'Silah Hills', 'Jl. Wr. Sila, RT.3/RW.5, Ciganjur, Kec. Jagakarsa, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta 12630', NULL, '', 'https://goo.gl/maps/qFmMZynzEiBpmZJg7', 'Maulana', 'Felix', 'Inden', 1, NULL, NULL, NULL, NULL, '', '', 'https://drive.google.com/drive/u/2/folders/1NPAeXwHZJasyeP9Ep6F0pE86eqaEHud6', '100', 5, '0.7', 1, 0),
(120, 'Jagad Mekar Wangi ', '', NULL, '', '', 'Kantor ', 'Siswanto', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 1, 0),
(122, 'Manara Village ', '', NULL, '', '', 'Kantor', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 0, 0),
(123, 'Griya Permata Tonjong', '', NULL, '', '', 'Kantor', 'Siswanto', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 0, 0),
(124, 'Villa Moccara', '', NULL, '', '', 'Kantor', 'Fanni Ilham', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 1, 0),
(125, 'Lavista Townhouse', '', NULL, '', '', 'Ihsan', 'Lukman', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 1, 0),
(126, 'Grand Kemang Residence', '', NULL, '', '', 'Jon', 'Jon', 'Ready', 0, NULL, NULL, NULL, NULL, '', '', '', '', 4, '0.7', 1, 0),
(127, 'Hapus aja', '', NULL, '', '', 'Hapus', 'Hapus', 'Inden', 0, '', '', '', '', '', '', '', '', 0, '0.7', 1, 0),
(128, 'D\'ragajaya Residence', '', NULL, '', '', 'Airlangga', 'Siswan', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 1, 0),
(129, 'Saga Village ', '', NULL, '', '', 'Kantor', '', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 1, 0),
(131, 'Tata Green Residence', '', NULL, '', '', 'Kantor', 'Lukman', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 1, 0),
(133, 'Cibanteng Asri Residence', '', NULL, '', '', 'Kantor', 'Jon', 'Inden', 0, NULL, NULL, NULL, NULL, '', '', '', '', 0, '0.7', 1, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tools_marketing`
--

CREATE TABLE `tools_marketing` (
  `id_detail` int(11) NOT NULL,
  `id_proyek` int(11) NOT NULL,
  `brosur1` varchar(100) DEFAULT NULL,
  `brosur2` varchar(100) DEFAULT NULL,
  `brosur3` varchar(100) DEFAULT NULL,
  `featured` varchar(100) DEFAULT NULL,
  `foto1` varchar(100) DEFAULT NULL,
  `foto2` varchar(100) DEFAULT NULL,
  `foto3` varchar(100) DEFAULT NULL,
  `foto4` varchar(100) DEFAULT NULL,
  `foto5` varchar(100) DEFAULT NULL,
  `foto6` varchar(100) DEFAULT NULL,
  `foto7` varchar(100) DEFAULT NULL,
  `foto8` varchar(100) DEFAULT NULL,
  `foto9` varchar(100) DEFAULT NULL,
  `pricelist1` varchar(100) DEFAULT NULL,
  `pricelist2` varchar(100) DEFAULT NULL,
  `pricelist3` varchar(100) DEFAULT NULL,
  `video1` varchar(100) DEFAULT NULL,
  `video2` varchar(100) DEFAULT NULL,
  `video3` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tools_marketing`
--

INSERT INTO `tools_marketing` (`id_detail`, `id_proyek`, `brosur1`, `brosur2`, `brosur3`, `featured`, `foto1`, `foto2`, `foto3`, `foto4`, `foto5`, `foto6`, `foto7`, `foto8`, `foto9`, `pricelist1`, `pricelist2`, `pricelist3`, `video1`, `video2`, `video3`) VALUES
(1, 3, '1630997767_c5c6b978e7db7cb3f833.jpg', '1630986168_52830741b2fcfc69fdbc.jpg', '1630986168_4fb8c2211639a606b2d9.jpg', '1630986168_1cb30f3acccaf6a406de.jpg', '1630986168_1b3af3d16c2e0aa2af8e.jpg', '1630986168_b6523e45aea1fd89190c.jpg', '1630986168_2314b7f09f3ce2423521.jpg', '1630986168_be282c50252c39f99707.jpg', '1630986168_c946cd17534d08a930ea.jpg', '1630986168_7acf16c2d31003d65c73.jpg', '1630986168_75914a1ef7a18512e510.jpg', '1630986168_59d9c4a5812ee0182080.jpg', '1630986168_deac49e4159abf72212e.jpg', '1630986168_35b14f5dec0fc8f8e8d1.pdf', '1630986168_93672860d686b07d2f19.pdf', '1630986168_6d0e9c79a39f9451df00.pdf', 'https://www.youtube.com/embed/viPl7WExqzo', 'https://www.youtube.com/embed/viPl7WExqzo', 'https://www.youtube.com/embed/viPl7WExqzo'),
(2, 5, 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.jpg', 'default.pdf', 'default.pdf', 'default.pdf', 'https://www.youtube.com/embed/viPl7WExqzo', 'https://www.youtube.com/embed/viPl7WExqzo', 'https://www.youtube.com/embed/viPl7WExqzo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `unit_stock`
--

CREATE TABLE `unit_stock` (
  `id_unit` int(11) NOT NULL,
  `id_proyek` int(3) NOT NULL,
  `blok` varchar(5) DEFAULT NULL,
  `nomor` varchar(4) NOT NULL,
  `lb` int(3) NOT NULL,
  `lt` int(3) NOT NULL,
  `harga` double NOT NULL,
  `status` enum('Available','Process','Sold','Bank Process') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_member` int(11) NOT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `role` enum('admin','super admin','member','') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_member`, `email`, `password`, `role`) VALUES
(1, 'doddy@gmail.com', '$2y$10$HiQskdLRyBHmmCfHthOsIu/tbuyFNRj/FXywKU9oDlDW9qgqDrkxO', 'member'),
(2, 'delvianipermatas81@gmail.com', '$2y$10$zlzuiIGtTDHFfZuRPQ6qnO.09KoO1e9MrIiAlkdC8xrmJztefq4lS', 'member'),
(3, 'prajaramdhani89@gmail.com', '$2y$10$2ILaSNQkpzukV0yq5U8TaehoWzoYKWgrvnXhM3vucdVQpVxVxV7wi', 'member');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `detail_proyek`
--
ALTER TABLE `detail_proyek`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_proyek` (`id_proyek`);

--
-- Indeks untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  ADD PRIMARY KEY (`id_fasilitas`);

--
-- Indeks untuk tabel `komisi`
--
ALTER TABLE `komisi`
  ADD PRIMARY KEY (`id_prospek`);

--
-- Indeks untuk tabel `member_profile`
--
ALTER TABLE `member_profile`
  ADD PRIMARY KEY (`id_member`);

--
-- Indeks untuk tabel `migrations`
--
ALTER TABLE `migrations`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD PRIMARY KEY (`id_notifikasi`),
  ADD KEY `id_member` (`id_member`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id_penjualan`),
  ADD KEY `fk_penjualan_proyek` (`id_proyek`),
  ADD KEY `fk_id_unit` (`id_unit`);

--
-- Indeks untuk tabel `prospek`
--
ALTER TABLE `prospek`
  ADD PRIMARY KEY (`id_prospek`);

--
-- Indeks untuk tabel `proyek`
--
ALTER TABLE `proyek`
  ADD PRIMARY KEY (`id_proyek`);

--
-- Indeks untuk tabel `tools_marketing`
--
ALTER TABLE `tools_marketing`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_proyek` (`id_proyek`);

--
-- Indeks untuk tabel `unit_stock`
--
ALTER TABLE `unit_stock`
  ADD PRIMARY KEY (`id_unit`),
  ADD KEY `fk_idproyek_unit` (`id_proyek`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_member`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `detail_proyek`
--
ALTER TABLE `detail_proyek`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `fasilitas`
--
ALTER TABLE `fasilitas`
  MODIFY `id_fasilitas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `komisi`
--
ALTER TABLE `komisi`
  MODIFY `id_prospek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `member_profile`
--
ALTER TABLE `member_profile`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `migrations`
--
ALTER TABLE `migrations`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  MODIFY `id_notifikasi` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `prospek`
--
ALTER TABLE `prospek`
  MODIFY `id_prospek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tools_marketing`
--
ALTER TABLE `tools_marketing`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `unit_stock`
--
ALTER TABLE `unit_stock`
  MODIFY `id_unit` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_member` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `detail_proyek`
--
ALTER TABLE `detail_proyek`
  ADD CONSTRAINT `detail_proyek_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`);

--
-- Ketidakleluasaan untuk tabel `notifikasi`
--
ALTER TABLE `notifikasi`
  ADD CONSTRAINT `notifikasi_ibfk_1` FOREIGN KEY (`id_member`) REFERENCES `member_profile` (`id_member`);

--
-- Ketidakleluasaan untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD CONSTRAINT `penjualan_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`),
  ADD CONSTRAINT `penjualan_ibfk_2` FOREIGN KEY (`id_unit`) REFERENCES `unit_stock` (`id_unit`);

--
-- Ketidakleluasaan untuk tabel `tools_marketing`
--
ALTER TABLE `tools_marketing`
  ADD CONSTRAINT `tools_marketing_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`);

--
-- Ketidakleluasaan untuk tabel `unit_stock`
--
ALTER TABLE `unit_stock`
  ADD CONSTRAINT `unit_stock_ibfk_1` FOREIGN KEY (`id_proyek`) REFERENCES `proyek` (`id_proyek`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
