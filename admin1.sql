-- phpMyAdmin SQL Dump
-- version 5.1.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 14, 2023 at 06:45 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `admin1`
--

-- --------------------------------------------------------

--
-- Table structure for table `agama`
--

CREATE TABLE `agama` (
  `id_agama` varchar(5) NOT NULL,
  `nama_agama` varchar(15) NOT NULL,
  `tgl_input` date NOT NULL,
  `user_input` varchar(10) NOT NULL,
  `tgl_update` date NOT NULL,
  `user_update` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `agama`
--

INSERT INTO `agama` (`id_agama`, `nama_agama`, `tgl_input`, `user_input`, `tgl_update`, `user_update`, `id_user`) VALUES
('A-01', 'Penyembah kayu', '2023-09-11', 'Rizki', '2023-09-11', 'nanda', 17),
('A-02', 'Animisme', '2023-09-12', 'Kiris', '2023-09-12', 'Danu', 17),
('A-03', 'atheisme', '2023-09-12', 'nanda', '0000-00-00', '', 17),
('A-04', 'Nandanisme', '2023-09-12', 'Pandu', '0000-00-00', '', 17),
('A-06', 'Dinamisme', '2023-09-13', 'Danu', '0000-00-00', '', 17);

-- --------------------------------------------------------

--
-- Table structure for table `jenjang`
--

CREATE TABLE `jenjang` (
  `id_jenjang` varchar(5) NOT NULL,
  `nama_jenjang` varchar(5) NOT NULL,
  `tgl_input` date NOT NULL,
  `user_update` varchar(10) NOT NULL,
  `tgl_update` date NOT NULL,
  `user_input` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `jurusan`
--

CREATE TABLE `jurusan` (
  `id_jurusan` varchar(5) NOT NULL,
  `nama_jurusan` varchar(15) NOT NULL,
  `id_jenjang` varchar(5) NOT NULL,
  `tgl_input` date NOT NULL,
  `user_input` varchar(10) NOT NULL,
  `tgl_update` date NOT NULL,
  `user_update` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `kewarganegaraan`
--

CREATE TABLE `kewarganegaraan` (
  `id_negara` varchar(5) NOT NULL,
  `nama_negara` varchar(15) NOT NULL,
  `tgl_input` date NOT NULL,
  `user_input` varchar(10) NOT NULL,
  `tgl_update` date NOT NULL,
  `user_update` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kewarganegaraan`
--

INSERT INTO `kewarganegaraan` (`id_negara`, `nama_negara`, `tgl_input`, `user_input`, `tgl_update`, `user_update`, `id_user`) VALUES
('N-01', 'Konohagakure', '2023-09-13', 'Naruto', '0000-00-00', '', 17),
('N-02', 'Sunagakure', '2023-09-13', 'Gaara', '0000-00-00', '', 17),
('N-06', 'Kirigakure', '2023-09-13', 'Kisame', '0000-00-00', '', 17),
('N-07', 'Kumogakure', '2023-09-13', 'Killer Bee', '0000-00-00', '', 17),
('N-08', 'Iwagakure', '2023-09-13', 'Deidara', '0000-00-00', '', 17);

-- --------------------------------------------------------

--
-- Table structure for table `pendaftaran`
--

CREATE TABLE `pendaftaran` (
  `NIS` varchar(15) NOT NULL,
  `nama_siswa` varchar(25) NOT NULL,
  `alamat` text NOT NULL,
  `jenis_kelamin` varchar(10) NOT NULL,
  `tempat_lahir` varchar(15) NOT NULL,
  `tlg_lahir` date NOT NULL,
  `status` varchar(10) NOT NULL,
  `id_negara` varchar(5) NOT NULL,
  `id_agama` varchar(5) NOT NULL,
  `id_jurusan` varchar(5) NOT NULL,
  `tgl_input` date NOT NULL,
  `user_input` varchar(10) NOT NULL,
  `tgl_update` date NOT NULL,
  `user_update` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `hak_akses` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `nama`, `email`, `hak_akses`) VALUES
(17, 'admin', '$2y$10$wbSbVq7aSD.0RnWZdhHwtOa2/tc6OI1ogrzbUee1WDcHgfM8aZoku', 'admin', 'admin@gmail.com', 'admin'),
(19, 'operator', '$2y$10$jZciUnFdeVnNPwzU931RWur2wtUCL8SugmdgeWzuGcMYckQVI3e16', 'operator', 'operator@gmail.com', 'operator'),
(20, 'operator1', '$2y$10$821Csqitf98cIq/MCPZM0OIH1oPh/HeaCXI4uh1ofsvSSaFRhwhP.', 'operator1', 'operator1@gmail.com', 'operator'),
(21, 'admin1', '$2y$10$IfvLzlrxtybDZx57i6Up8eTxTHZGdfPUyKIjK3EZCpHZdgm9VouHG', 'admin2', 'admin2@gmail.com', 'admin'),
(22, 'rimba', '$2y$10$vxxlf7p/OFLOA./A41.A..eJKOOwZUWsc6VVj5hiuuwSsKwFV1ab2', 'rimba', 'rimba', 'admin'),
(23, 'reihan', '$2y$10$MJi1fc2JZ6nOdqBmTeiugOvvm0n62Tl5izNDkYGdkxZ2GQTI0nHTy', 'reihan', 'operator@gmail.com', 'operator');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `agama`
--
ALTER TABLE `agama`
  ADD PRIMARY KEY (`id_agama`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `jenjang`
--
ALTER TABLE `jenjang`
  ADD PRIMARY KEY (`id_jenjang`);

--
-- Indexes for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD PRIMARY KEY (`id_jurusan`),
  ADD KEY `id_jenjang` (`id_jenjang`);

--
-- Indexes for table `kewarganegaraan`
--
ALTER TABLE `kewarganegaraan`
  ADD PRIMARY KEY (`id_negara`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD PRIMARY KEY (`NIS`),
  ADD KEY `id_agama` (`id_agama`),
  ADD KEY `id_jurusan` (`id_jurusan`),
  ADD KEY `id_negara` (`id_negara`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `agama`
--
ALTER TABLE `agama`
  ADD CONSTRAINT `agama_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `jurusan`
--
ALTER TABLE `jurusan`
  ADD CONSTRAINT `jurusan_ibfk_1` FOREIGN KEY (`id_jenjang`) REFERENCES `jenjang` (`id_jenjang`);

--
-- Constraints for table `kewarganegaraan`
--
ALTER TABLE `kewarganegaraan`
  ADD CONSTRAINT `kewarganegaraan_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `user` (`id_user`);

--
-- Constraints for table `pendaftaran`
--
ALTER TABLE `pendaftaran`
  ADD CONSTRAINT `pendaftaran_ibfk_1` FOREIGN KEY (`id_agama`) REFERENCES `agama` (`id_agama`),
  ADD CONSTRAINT `pendaftaran_ibfk_2` FOREIGN KEY (`id_jurusan`) REFERENCES `jurusan` (`id_jurusan`),
  ADD CONSTRAINT `pendaftaran_ibfk_3` FOREIGN KEY (`id_negara`) REFERENCES `kewarganegaraan` (`id_negara`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
