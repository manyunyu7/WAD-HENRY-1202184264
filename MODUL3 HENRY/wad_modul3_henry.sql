-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 13 Nov 2020 pada 16.43
-- Versi server: 10.4.11-MariaDB
-- Versi PHP: 7.4.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `wad_modul3_henry`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `event_table`
--

CREATE TABLE `event_table` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `deskripsi` text NOT NULL,
  `gambar` varchar(100) NOT NULL,
  `kategori` varchar(100) NOT NULL,
  `tanggal` varchar(255) NOT NULL,
  `mulai` varchar(255) NOT NULL,
  `berakhir` varchar(255) NOT NULL,
  `tempat` varchar(255) NOT NULL,
  `harga` bigint(20) NOT NULL,
  `benefit` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `event_table`
--

INSERT INTO `event_table` (`id`, `name`, `deskripsi`, `gambar`, `kategori`, `tanggal`, `mulai`, `berakhir`, `tempat`, `harga`, `benefit`) VALUES
(8, 'Makan-Makan Prodase', 'Makan-makan bareng EAD , Daspro dan EDE', './assets/img/1605262595-Makan-Makan Prodase.png', 'Offline', '2020-11-21', '16:30', '19:00', 'Lab Prodase', 9000, '[\"Snack\",\"Souvenir\"]'),
(11, 'Bedah Kode Flutter 1.0', 'Belajar Bareng Flutter                                                             ', './assets/img/1605263433-Bedah Kode Flutter 1.0.png', 'Online', '2020-11-12', '13:30', '14:30', 'Rumah Masing-Masing', 0, '[\"Snack\",\"Sertifikat\",\"Souvenir\"]'),
(12, 'Belajar Bareng Docker', 'Belajar Bareng Docker', './assets/img/1605263504-Belajar Bareng Docker.png', 'Online', '2020-11-21', '13:30', '17:30', 'Lab Prodase', 0, '[\"Snack\",\"Sertifikat\",\"Souvenir\"]'),
(13, 'Ngoding Bareng Kotlin', 'Belajar Bareng Bahasa Pemrograman Kotlin', './assets/img/1605263617-Ngoding Bareng Kotlin.png', 'Online', '2020-11-14', '19:00', '20:00', 'Lab Prodase', 0, '[\"Snack\",\"Sertifikat\",\"Souvenir\"]'),
(14, 'Belajar Kubernetes', 'Kubernetes merupakan platform open-source yang digunakan untuk melakukan manajemen workloads aplikasi yang dikontainerisasi, serta menyediakan konfigurasi dan otomatisasi secara deklaratif. Kubernetes berada di dalam ekosistem yang besar dan berkembang cepat. Service, support, dan perkakas Kubernetes tersedia secara meluas.\r\n\r\nGoogle membuka Kubernetes sebagai proyek open source pada tahun 2014. Kubernetes dibangun berdasarkan pengalaman Google selama satu setengah dekade dalam menjalankan workloads bersamaan dengan kontribusi berupa ide-ide terbaik yang diberikan oleh komunitas.', './assets/img/1605263679-Belajar Kubernetes.png', 'Online', '2020-11-14', '19:00', '20:00', 'Lab Prodase', 0, '[\"Snack\",\"Sertifikat\",\"Souvenir\"]'),
(15, 'Belajar Larevel 8.x', 'Laravel adalah salah satu Framework PHP yang paling populer dan paling banyak digunakan di seluruh dunia dalam membangun aplikasi web mulai dari proyek kecil hingga besar. Framework ini banyak digunakan oleh Web Developer karena kinerja, fitur, dan skalabilitas nya.\r\n\r\nFramework ini mengikuti struktur MVC (Model View Controller), MVC adalah sebuah metode aplikasi dengan memisahkan data dari tampilan berdasarkan komponen- komponen aplikasi, seperti : manipulasi data, controller, dan user interface.\r\n\r\nDengan menggunakan struktur MVC maka membuat laravel mudah untuk dipelajari dan mempercepat proses pembuatan prototipe aplikasi web. Framework ini juga menyediakan fitur bawaan seperti otentikasi, mail, perutean, sesi, dan daftar berjalan.\r\n\r\nFramework ini banyak disukai oleh para web developer, Sesuai sedikit penjelasan diatas. Kelebihan lainnya yaitu Laravel sangat mudah untuk disesuaikan, Karena kemudahan itulah kamu dapat membuat suatu struktur proyek kamu sendiri yang memenuhi permintaan aplikasi web kamu.', './assets/img/1605263753-Belajar Larevel 8.x.png', 'Online', '2020-11-13', '19:00', '20:00', 'Lab Prodase', 12000, '[\"Snack\",\"Sertifikat\",\"Souvenir\"]'),
(16, 'Ngoding Bareng ES6', 'ES6 adalah sebuah singkatan dari ECMAScript versi 6. ES6 release pada tahun 2015, jadi ES6 sama ES 2015 sama aja ya. Lalu apa itu ECMAScript? ECMAScript adalah sebuah standarisasi scripting language (Javascript) yang dibuat oleh European Computer Manufacturers Association (ECMA). Bahasa gampangnya ECMAScript itu standarnya, Javascript itu implementasinya.                                                                                                                        ', './assets/img/1605264332-Ngoding Bareng ES6.png', 'Online', '2020-11-30', '12:00', '13:00', 'Rumah Masing-Masing', 0, '[\"Snack\",\"Sertifikat\",\"Souvenir\"]'),
(17, 'Prodase Jalan-Jalan Santai', 'Jalan-jalan ke Lembang Kuy                                                                                                                                                                                                                                                ', './assets/img/1605264449-Prodase Jalan-Jalan.png', 'Offline', '2020-11-30', '06:00', '20:00', 'Lembang', 17, '[\"Snack\",\"Souvenir\"]'),
(18, 'Mabar Roblox', 'Main Bareng Roblox', './assets/img/1605265123-Mabar Roblox.png', 'Online', '2020-12-05', '19:00', '20:00', 'Rumah Masing-Masing', 10000, '[\"Snack\",\"Sertifikat\",\"Souvenir\"]'),
(19, 'Kunjungan Perusahaan Jilid I', 'Mengunjungi PT Garuda Food Berkah Makmur                                                                                                                        ', './assets/img/1605276731-Kunjungan Perusahaan Jilid I.png', 'Offline', '2020-12-12', '19:00', '20:00', 'PT GARUDA FOOD BERKAH MAKMUR', 100000, '[\"Sertifikat\"]');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `event_table`
--
ALTER TABLE `event_table`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `event_table`
--
ALTER TABLE `event_table`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
