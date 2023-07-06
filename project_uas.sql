-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2023 at 09:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `project_uas`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `id_users`, `nama_lengkap`) VALUES
(1, 1, 'Willy'),
(2, 2, 'Oka'),
(3, 3, 'Hendra'),
(6, 24, 'Dwik');

-- --------------------------------------------------------

--
-- Table structure for table `iklan`
--

CREATE TABLE `iklan` (
  `id_iklan` int(11) NOT NULL,
  `id_penyedia` int(11) NOT NULL,
  `jabatan` varchar(20) NOT NULL,
  `syarat` varchar(1000) NOT NULL,
  `salary` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `iklan`
--

INSERT INTO `iklan` (`id_iklan`, `id_penyedia`, `jabatan`, `syarat`, `salary`) VALUES
(1, 1, 'Kasir Urban Company', '• Wanita, usia maksimal 30 tahun\r\n• Pendidikan minimal D3/Sederajat (Jurusan Akunatansi diutamakan)\r\n•	Memiliki pengalaman minimal 1 tahun sebagai finance cashier (wajib)\r\n• Bisa bekerja dibawah tekanan\r\n• Menguasai aplikasi Ms Office\r\n• Penempatan Bali', 3500000),
(2, 2, 'Staf Admin ', '• Experience with Salesforce, Slack, Dropbox, Monday.com\r\n• Strong verbal and written communication skills\r\n• Excellent organizational and time management skills\r\n• Ability to work well in a team environment\r\n• Strong attention to detail\r\n• Knowledge of the yachting industry is a plus but not a must', 3000000),
(3, 3, 'Audio, Visual, Light', '• 30 years old maximum, vaccinated (2nd dose)\r\n• Music enthusiast\r\n• Minimal 1 year experience\r\n• Familiar with console mixer audio TF5\r\n• Experience operating/programming a grand MA lighting mixer\r\n•	Experience operating/programming mixer resolume\r\n• Minimum education high school / vocational school\r\n• Able to work with team\r\n• Placement in Bali', 4800000),
(4, 4, 'Administrasi Kasir', '- Wanita, usia Max 28 thn\r\n- Pendidikan minimal SMK / Diploma Keuangan / akuntansi/ setara\r\n- Bisa mengoperasikan komputer Word, Excell, Adobe\r\n- Tidak sedang Kuliah\r\n- Bisa bekerja individual dan Team work\r\n- Mandiri, disiplin, jujur , Tanggung jawab dan supel\r\n- Domisili area Denpasar Kota\r\n- Memiliki sim C\r\n- Memiliki pengalaman min 1 thn kasir dan Administrasi, contoh: Keuangan, perpajakan ata', 2300000);

-- --------------------------------------------------------

--
-- Table structure for table `pelamar`
--

CREATE TABLE `pelamar` (
  `id_pelamar` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama_lengkap` varchar(20) NOT NULL,
  `lulusan` varchar(100) DEFAULT NULL,
  `no_wa` varchar(13) DEFAULT NULL,
  `tempat_tinggal` varchar(50) DEFAULT NULL,
  `pengalaman` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pelamar`
--

INSERT INTO `pelamar` (`id_pelamar`, `id_users`, `nama_lengkap`, `lulusan`, `no_wa`, `tempat_tinggal`, `pengalaman`) VALUES
(1, 25, 'Dravin', 'Politeknik Negeri Bali', '089763547212', 'Jln. Pulau Kawe no 40, Denpasar Barat', '- PT Jaya Esport Sebagai Manager\r\n- PT Anumas Sebagai Web Development'),
(2, 26, 'Nexky', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `pengajuan`
--

CREATE TABLE `pengajuan` (
  `id_pengajuan` int(11) NOT NULL,
  `id_iklan` int(11) NOT NULL,
  `id_pelamar` int(11) NOT NULL,
  `id_penyedia` int(11) NOT NULL,
  `cv` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pengajuan`
--

INSERT INTO `pengajuan` (`id_pengajuan`, `id_iklan`, `id_pelamar`, `id_penyedia`, `cv`) VALUES
(2, 4, 1, 4, 'CV_Dravin_PANDUAN PEMBUATAN DAN PENGUMPULAN(WEB).pdf'),
(3, 3, 1, 3, 'CV_Dravin_bahasa_Inggris.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `penyedia`
--

CREATE TABLE `penyedia` (
  `id_penyedia` int(11) NOT NULL,
  `id_users` int(11) NOT NULL,
  `nama_perusahaan` varchar(25) NOT NULL,
  `logo` varchar(100) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `penyedia`
--

INSERT INTO `penyedia` (`id_penyedia`, `id_users`, `nama_perusahaan`, `logo`, `kota`, `alamat`) VALUES
(1, 15, 'Urban Company', 'LOGO_urban-company-logo.png', 'Denpasar', 'Jl. Jepun Pipil No.11, Kesiman Kertalangu, Kec. Denpasar Timur, Kota Denpasar, Bali'),
(2, 16, 'Astra Internasional', 'LOGO_astra motor logo.png', 'Denpasar', 'JL. Gusti Ngurah Rai No. 24, Simpang siur Kuta, Denpasar, Bali'),
(3, 17, 'Atlas Beach Club', 'LOGO_atlas-main-logo-fullcolor_11zon.png', 'Badung', 'Jl. Pantai Berawa No.88, Canggu, Bali, Kabupaten Badung, Bali 80361'),
(4, 18, 'Blessing Computer', 'LOGO_blessing computer.png', 'Denpasar', 'Jl. Pulau Kawe No.40e, Dauh Puri Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80114'),
(5, 19, 'GOGO UNUD', 'LOGO_gogo fried chiken.png', 'Jimbaran', 'Jl. Raya Kampus Unud No.2013, Jimbaran, Kec. Kuta Sel., Kabupaten Badung, Bali 80361'),
(6, 20, 'Gosha Kitchen', 'LOGO_gosha logo.png', 'Denpasar', 'Jl. Tukad Gangga No.28, Dauh Puri Klod, Kec. Denpasar Bar., Kota Denpasar, Bali 80234'),
(7, 21, 'Krisna Bali', 'LOGO_khrisna oleh-oleh.png', 'Badung', 'Jl. Sunset Road No.88, Kuta, Kec. Kuta, Kabupaten Badung, Bali 80361'),
(8, 22, 'PLN BALI', 'LOGO_logo PLN.png', 'Denpasar', 'Jl. Letda Tantular No.1, Dangin Puri Klod, Kec. Denpasar Timur, Kota Denpasar, Bali 80234'),
(9, 23, 'The Keranjang', 'LOGO_The_Keranjang.png', 'Badung', 'Jl. Bypass Ngurah Rai No.97, Kuta, Kec. Kuta, Kabupaten Badung, Bali 80361');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(11) NOT NULL,
  `email` varchar(25) NOT NULL,
  `password` varchar(25) NOT NULL,
  `role` enum('admin','penyedia','pelamar') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `email`, `password`, `role`) VALUES
(1, 'admin@gmail.com', 'admin', 'admin'),
(2, 'admin2@gmail.com', 'admin2', 'admin'),
(3, 'admin3@gmail.com', 'admin3', 'admin'),
(15, 'urban@gmail.com', '12345', 'penyedia'),
(16, 'astra@gmail.com', '12345', 'penyedia'),
(17, 'atlas@gmail.com', '12345', 'penyedia'),
(18, 'blessing@gmail.com', '12345', 'penyedia'),
(19, 'gogo@gmail.com', '12345', 'penyedia'),
(20, 'gosha@gmail.com', '12345', 'penyedia'),
(21, 'krisna@gmail.com', '12345', 'penyedia'),
(22, 'pln@gmail.com', '12345', 'penyedia'),
(23, 'keranjang@gmail.com', '12345', 'penyedia'),
(24, 'admin4@gmail.com', 'admin4', 'admin'),
(25, 'dravin@gmail.com', '12345', 'pelamar'),
(26, 'nexky@gmail.com', '12345', 'pelamar');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`),
  ADD KEY `id_user` (`id_users`);

--
-- Indexes for table `iklan`
--
ALTER TABLE `iklan`
  ADD PRIMARY KEY (`id_iklan`);

--
-- Indexes for table `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`id_pelamar`),
  ADD KEY `id_user` (`id_users`);

--
-- Indexes for table `pengajuan`
--
ALTER TABLE `pengajuan`
  ADD PRIMARY KEY (`id_pengajuan`);

--
-- Indexes for table `penyedia`
--
ALTER TABLE `penyedia`
  ADD PRIMARY KEY (`id_penyedia`),
  ADD KEY `id_user` (`id_users`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `iklan`
--
ALTER TABLE `iklan`
  MODIFY `id_iklan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `id_pelamar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `pengajuan`
--
ALTER TABLE `pengajuan`
  MODIFY `id_pengajuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `penyedia`
--
ALTER TABLE `penyedia`
  MODIFY `id_penyedia` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
