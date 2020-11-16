-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 16 Nov 2020 pada 11.35
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
(8, 'Makan-Makan Tumpeng', 'Makan-makan bareng EAD , Daspro dan EDE                                                                                                                                                                                    ', './assets/img/1605262595-Makan-Makan Prodase.png', 'Online', '2020-11-21', '16:30', '19:00', 'Lab Prodase', 9000, '[\"Snack\"]'),
(12, 'Belajar Bareng Docker', 'Docker is a set of platform as a service products that use OS-level virtualization to deliver software in packages called containers. Containers are isolated from one another and bundle their own software, libraries and configuration files; they can communicate with each other through well-defined channels                                                                                                                        ', './assets/img/1605263504-Belajar Bareng Docker.png', 'Online', '2020-11-21', '13:30', '17:30', 'Lab Prodase', 0, '[\"Sertifikat\",\"Souvenir\"]'),
(13, 'Ngoding Bareng Kotlin', 'Belajar Bareng Bahasa Pemrograman Kotlin', './assets/img/1605263617-Ngoding Bareng Kotlin.png', 'Online', '2020-11-14', '19:00', '20:00', 'Lab Prodase', 0, '[\"Snack\",\"Sertifikat\",\"Souvenir\"]'),
(14, 'Kubernetes On Gojek', 'Kubernetes merupakan platform open-source yang digunakan untuk melakukan manajemen workloads aplikasi yang dikontainerisasi, serta menyediakan konfigurasi dan otomatisasi secara deklaratif. Kubernetes berada di dalam ekosistem yang besar dan berkembang cepat. Service, support, dan perkakas Kubernetes tersedia secara meluas.\r\n\r\nGoogle membuka Kubernetes sebagai proyek open source pada tahun 2014. Kubernetes dibangun berdasarkan pengalaman Google selama satu setengah dekade dalam menjalankan workloads bersamaan dengan kontribusi berupa ide-ide terbaik yang diberikan oleh komunitas.                                                                                                                                                                                                                                                ', './assets/img/1605521341-Kubernetes On Gojek.png', 'Online', '2020-11-14', '19:00', '20:00', 'Lab Prodase', 0, '[\"Snack\",\"Sertifikat\",\"Souvenir\"]'),
(16, 'Ngoding Bareng ES6', 'ES6 adalah sebuah singkatan dari ECMAScript versi 6. ES6 release pada tahun 2015, jadi ES6 sama ES 2015 sama aja ya. Lalu apa itu ECMAScript? ECMAScript adalah sebuah standarisasi scripting language (Javascript) yang dibuat oleh European Computer Manufacturers Association (ECMA). Bahasa gampangnya ECMAScript itu standarnya, Javascript itu implementasinya.                                                                                                                        ', './assets/img/1605264332-Ngoding Bareng ES6.png', 'Online', '2020-11-30', '12:00', '13:00', 'Rumah Masing-Masing', 0, '[\"Snack\",\"Sertifikat\",\"Souvenir\"]'),
(17, 'Jalan-Jalan Ke Lembang', 'Jalan-jalan ke Lembang Kuy                                                                                                                                                                                                                                                                                                            ', './assets/img/1605264449-Prodase Jalan-Jalan.png', 'Offline', '2020-11-30', '06:00', '20:00', 'Lembang', 17, '[\"Snack\",\"Souvenir\"]'),
(18, 'Mabar Roblox', 'Main Bareng Roblox                                                                                                                                                                                    ', './assets/img/1605521659-Mabar Roblox.png', 'Online', '2020-12-05', '19:00', '20:00', 'Rumah Masing-Masing', 10000, '[\"Snack\",\"Sertifikat\",\"Souvenir\"]'),
(19, 'Kunjungan Perusahaan Jilid I', 'Mengunjungi PT Garuda Food Berkah Makmur                                                                                                                        ', './assets/img/1605276731-Kunjungan Perusahaan Jilid I.png', 'Offline', '2020-12-12', '19:00', '20:00', 'PT GARUDA FOOD BERKAH MAKMUR', 100000, '[\"Sertifikat\"]'),
(20, 'Webinar Dasar Visualisasi Data', 'Tes', './assets/img/1605517180-Webinar Dasar Visualisasi Data.png', 'Offline', '2020-11-28', '19:00', '20:00', 'Lab Prodase', 90000, '[\"Snack\",\"Sertifikat\",\"Souvenir\"]');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
