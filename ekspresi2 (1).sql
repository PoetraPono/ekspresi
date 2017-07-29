-- phpMyAdmin SQL Dump
-- version 3.5.2.2
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2016 at 07:29 PM
-- Server version: 5.5.27
-- PHP Version: 5.4.7

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ekspresi2`
--

-- --------------------------------------------------------

--
-- Table structure for table `angkatan`
--

CREATE TABLE IF NOT EXISTS `angkatan` (
  `id_angkatan` int(11) NOT NULL AUTO_INCREMENT,
  `keterangan` varchar(15) NOT NULL,
  PRIMARY KEY (`id_angkatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `angkatan`
--

INSERT INTO `angkatan` (`id_angkatan`, `keterangan`) VALUES
(1, '2010-2011'),
(2, '2011-2012'),
(3, '2012-2013'),
(4, '2013-2014'),
(5, '2014-2015'),
(6, '2015-2016'),
(7, '2016-2017'),
(8, '2017-2018');

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE IF NOT EXISTS `divisi` (
  `id_divisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_divisi` varchar(100) NOT NULL,
  PRIMARY KEY (`id_divisi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=8 ;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id_divisi`, `nama_divisi`) VALUES
(1, 'Semua Divisi'),
(2, 'Expedisi'),
(3, 'Redaksi'),
(4, 'PSDM'),
(5, 'Jaringan Kerja'),
(6, 'Perusahaan'),
(7, 'Pengurus Harian');

-- --------------------------------------------------------

--
-- Table structure for table `mainmenu`
--

CREATE TABLE IF NOT EXISTS `mainmenu` (
  `id_mainmenu` int(11) NOT NULL AUTO_INCREMENT,
  `nama_mainmenu` varchar(100) NOT NULL,
  `icon` varchar(30) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `link` varchar(50) NOT NULL,
  `level` int(11) NOT NULL COMMENT '1= admin,2=jurusan,3 dosen',
  PRIMARY KEY (`id_mainmenu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=42 ;

--
-- Dumping data for table `mainmenu`
--

INSERT INTO `mainmenu` (`id_mainmenu`, `nama_mainmenu`, `icon`, `aktif`, `link`, `level`) VALUES
(20, 'master data', 'glyphicon glyphicon-tasks', 'y', '#', 1),
(21, 'Anggota', 'glyphicon glyphicon-th-list', 'y', 'anggota', 1),
(22, 'Masukkan Nilai', 'glyphicon glyphicon-list-alt', 'y', 'input/masuk', 1),
(23, 'Laporan', 'glyphicon glyphicon-file', 'y', 'rekapbulan', 1),
(24, 'Profil', 'glyphicon glyphicon-user', 'y', 'anggota/profile', 1),
(30, 'Anggota', 'glyphicon glyphicon-th-list', 'y', 'anggota', 2),
(31, 'Masukkan Nilai', 'glyphicon glyphicon-list-alt', 'y', 'input/masuk', 2),
(32, 'Laporan', 'glyphicon glyphicon-file', 'y', 'rekapbulan', 2),
(33, 'Profil', 'glyphicon glyphicon-user', 'y', 'users/profile', 2),
(40, 'Anggota', 'glyphicon glyphicon-th-list', 'y', 'anggota', 3),
(41, 'Profil', 'glyphicon glyphicon-user', 'y', 'users/profile', 3);

-- --------------------------------------------------------

--
-- Table structure for table `pekerjaan`
--

CREATE TABLE IF NOT EXISTS `pekerjaan` (
  `id_pekerjaan` varchar(2) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  PRIMARY KEY (`id_pekerjaan`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pekerjaan`
--

INSERT INTO `pekerjaan` (`id_pekerjaan`, `keterangan`) VALUES
('01', 'tidak bekerja'),
('02', 'nelayan'),
('03', 'petani'),
('04', 'peternak'),
('05', 'PNS/ TNI/ Polri'),
('06', 'Karyawan Swasta'),
('07', 'Pedagang Kecil'),
('08', 'Pedagang Besar'),
('09', 'Wiraswasta'),
('10', 'Wirausaha'),
('11', 'buruh'),
('12', 'pensiunan'),
('99', 'lainya');

-- --------------------------------------------------------

--
-- Table structure for table `penilaian`
--

CREATE TABLE IF NOT EXISTS `penilaian` (
  `id_penilaian` int(11) NOT NULL AUTO_INCREMENT,
  `penilaianredaksi1` int(50) DEFAULT NULL,
  `penilaianredaksi2` int(50) DEFAULT NULL,
  `penilaianpsdm1` int(50) DEFAULT NULL,
  `penilaianpsdm2` int(50) DEFAULT NULL,
  `penilaianjk1` int(50) DEFAULT NULL,
  `penilaianjk2` int(50) DEFAULT NULL,
  `penilaianperusahaan1` int(50) DEFAULT NULL,
  `penilaianperusahaan2` int(50) DEFAULT NULL,
  `id_users` int(11) NOT NULL,
  `tgl` date NOT NULL,
  `id_angkatan` int(11) NOT NULL,
  `minggu` int(2) NOT NULL,
  PRIMARY KEY (`id_penilaian`),
  KEY `FK_penilaian_app_users` (`id_users`),
  KEY `FK_penilaian_angkatan` (`id_angkatan`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=1068 ;

-- --------------------------------------------------------

--
-- Table structure for table `subdivisi`
--

CREATE TABLE IF NOT EXISTS `subdivisi` (
  `id_subdivisi` int(11) NOT NULL AUTO_INCREMENT,
  `nama_subdivisi` varchar(100) NOT NULL,
  `id_divisi` int(11) NOT NULL,
  PRIMARY KEY (`id_subdivisi`),
  KEY `FK_akademik_konsentrasi_akademik_prodi` (`id_divisi`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `subdivisi`
--

INSERT INTO `subdivisi` (`id_subdivisi`, `nama_subdivisi`, `id_divisi`) VALUES
(1, 'Expedisi', 2),
(2, 'Pemimpin Redaksi', 3),
(3, 'Redaktur Bahasa', 3),
(4, 'Redaktur Artistik', 3),
(5, 'Redaktur Foto', 3),
(6, 'Redpel Online', 3),
(7, 'Redpel Buku', 3),
(8, 'Redpel Majalah', 3),
(9, 'Kepala Sekolah', 4),
(10, 'Litbang', 4),
(11, 'Diskusi', 4),
(12, 'Diklat dan Kaderisasi', 4),
(13, 'Perpustakaan', 4),
(14, 'Pemimpin JK', 5),
(15, 'JK Eksternal', 5),
(16, 'JK Internal', 5),
(17, 'Pemimpin Perusahaan', 6),
(18, 'EO', 6),
(19, 'Iklan', 6),
(20, 'Sirkulasi dan Produksi', 6),
(21, 'PU', 7),
(22, 'Sekretaris', 7),
(23, 'Bendahara', 7);

-- --------------------------------------------------------

--
-- Table structure for table `submenu`
--

CREATE TABLE IF NOT EXISTS `submenu` (
  `id_submenu` int(11) NOT NULL AUTO_INCREMENT,
  `id_mainmenu` int(11) NOT NULL,
  `nama_submenu` varchar(50) NOT NULL,
  `link` varchar(50) NOT NULL,
  `aktif` enum('y','t') NOT NULL,
  `icon` varchar(30) NOT NULL,
  `level` int(11) NOT NULL,
  PRIMARY KEY (`id_submenu`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `submenu`
--

INSERT INTO `submenu` (`id_submenu`, `id_mainmenu`, `nama_submenu`, `link`, `aktif`, `icon`, `level`) VALUES
(1, 20, 'Data Anggota', 'users', 'y', 'glyphicon glyphicon-retweet', 1),
(2, 20, 'Angkatan', 'tahunangkatan', 'y', 'glyphicon glyphicon-send', 1);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id_users` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(20) NOT NULL,
  `password` varchar(32) NOT NULL,
  `level` int(1) NOT NULL COMMENT '1=admin, 2=pengurus, 3=anggota',
  `divisi` varchar(5) NOT NULL,
  `last_login` datetime NOT NULL,
  `nim` varchar(50) DEFAULT NULL,
  `nama` varchar(50) DEFAULT NULL,
  `id_subdivisi` int(2) DEFAULT NULL,
  `id_angkatan` int(4) DEFAULT NULL,
  `alamat` text,
  `gender` varchar(1) DEFAULT NULL,
  `tempat_lahir` varchar(100) DEFAULT NULL,
  `tanggal_lahir` date DEFAULT NULL,
  `riwayat` varchar(200) DEFAULT NULL,
  `nama_ibu` varchar(50) DEFAULT NULL,
  `nama_ayah` varchar(50) DEFAULT NULL,
  `no_hp_ortu` int(20) DEFAULT NULL,
  `pekerjaan_id_ibu` int(11) DEFAULT NULL,
  `pekerjaan_id_ayah` int(11) DEFAULT NULL,
  `alamat_ibu` text,
  `alamat_ayah` text,
  `semester_aktif` int(11) NOT NULL,
  `telp` varchar(20) DEFAULT NULL,
  PRIMARY KEY (`id_users`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=102 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `username`, `password`, `level`, `divisi`, `last_login`, `nim`, `nama`, `id_subdivisi`, `id_angkatan`, `alamat`, `gender`, `tempat_lahir`, `tanggal_lahir`, `riwayat`, `nama_ibu`, `nama_ayah`, `no_hp_ortu`, `pekerjaan_id_ibu`, `pekerjaan_id_ayah`, `alamat_ibu`, `alamat_ayah`, `semester_aktif`, `telp`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 1, '1', '2016-11-14 00:34:29', 'admin', 'admin', 17, 1, '', '1', 'seyegan', '1993-12-20', '', 'admin', 'admin', 93284, 1, 1, 'admin', 'admin', 0, '085643356050'),
(58, '12407141009', '3fb96e987bdd279002e6b7eebc387e2f', 3, '4', '0000-00-00 00:00:00', '12407141009', 'Winna Wijayanti', 9, 4, 'Malang', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085749664190'),
(57, '13201241066', 'be8f50170fabe25abc9ed9261cb854be', 3, '7', '0000-00-00 00:00:00', '13201241066', 'Milda Ulya Rahma', 23, 4, '', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085743659559'),
(56, '13407144003', '2d668e1a184fdfc262784211b7b7bfdf', 3, '3', '0000-00-00 00:00:00', '13407144003', 'Imam Ghazali', 7, 4, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085645900050'),
(55, '13520244018', 'bd4fa35d99b2f669a5b112ee9cd00bda', 3, '3', '0000-00-00 00:00:00', '13520244018', 'Muhammad Azis Darmawan', 2, 4, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085727228448'),
(54, '13407141063', 'd953c5556f388aa69b2058ef2a415f46', 3, '5', '0000-00-00 00:00:00', '13407141063', 'Arfrian Rahmanta', 14, 4, 'Malang', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085799885023'),
(53, '13812141030', '068633e594089edea1a579cd4410f0d1', 3, '7', '0000-00-00 00:00:00', '13812141030', 'Anggun Mita Tri Kusumawardani', 22, 4, '', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '081227072329'),
(52, '13803241072', '033d3c85caf22b644c3f543711f30a3e', 3, '6', '0000-00-00 00:00:00', '13803241072', 'Triana Yuniasari', 17, 4, 'Tempel', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085740599145'),
(51, '11412141042', '714ac09447906466375bffdec103ee59', 3, '2', '0000-00-00 00:00:00', '11412141042', 'Ratih Lailathi', 1, 3, '', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085643197221'),
(50, '12202241018', '419032b96b14986b69823ebe9da00d27', 3, '2', '0000-00-00 00:00:00', '12202241018', 'Gresthi Pramadya Dewi', 1, 3, '', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085728526271'),
(49, '10110244028', '34fbd2f1d0cdb61fa2f82a55c8ec3ebc', 3, '2', '0000-00-00 00:00:00', '10110244028', 'Irega Gelly Gera', 1, 3, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085326302308'),
(48, '12303241045', 'ebddb92c14511ff23f871a1e4a9b9cf2', 3, '6', '0000-00-00 00:00:00', '12303241045', 'Heri Yulianta', 20, 3, 'Gunungkidul', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '087839051411'),
(47, 'Fatmawati', '85815fae4188ccb0f8a1a43c8c0abe1b', 3, '6', '0000-00-00 00:00:00', '11', 'Fatmawati', 19, 3, '', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085729703968'),
(46, '11412141041', '69c8a1d5c20f9cf31edfa6b60a3e74c1', 3, '7', '0000-00-00 00:00:00', '11412141041', 'Merynda Puspitaningrum', 23, 3, '', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085643347013'),
(45, '11518241038', '9fa3faea551ecc36a6b1aff82f14b781', 3, '2', '0000-00-00 00:00:00', '11518241038', 'Hengky Afrinata', 1, 3, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085758217135'),
(44, '12103241080', 'c5bf8d0d325c5620d2af997914bd5e6d', 3, '4', '0000-00-00 00:00:00', '12103241080', 'Ginanjar Rohmat', 11, 3, 'Gunungkidul', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '087739514127'),
(43, '11407144015', '26889e055c6aab63d15e4a120bb20343', 3, '6', '0000-00-00 00:00:00', '11407144015', 'Desinta Kusumaningrum', 20, 3, 'Madiun', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '082243951892'),
(41, '12210141040', 'dfb30c22be7cfcf1e3db725c76069e28', 3, '3', '0000-00-00 00:00:00', '12210141040', 'Hesti Pratiwi', 2, 3, 'Solo', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085640651094'),
(42, '12201241048', 'd44a13c836a1820f51a169aee96ef5ac', 3, '5', '0000-00-00 00:00:00', '12201241048', 'Agil Widiatmoko', 14, 3, 'Temanggung', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085729367767'),
(39, '11520241052', '7c9434ceaa92f814de1bb0b1066d4e45', 3, '3', '0000-00-00 00:00:00', '11520241052', 'Muhammad Nur Farid', 5, 3, 'Kulonprogo', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085725701993'),
(40, '12510134029', '83d57d2f5f3f9cf9893e6d629182f9c2', 3, '4', '0000-00-00 00:00:00', '12510134029', 'Prasetyo Wibowo', 9, 3, 'Solo-Bantul', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '087736008356'),
(36, '11407141029', '8c98736d9761cf74ce72da9d8bd30e1f', 3, '7', '0000-00-00 00:00:00', '11407141029', 'Rizpat Anugrah', 21, 3, 'Garut', '2', 'Garut', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '082315144435'),
(37, '12520241063', 'b66113fbc0aca5ca64adbfcbb0ea9fe4', 3, '3', '0000-00-00 00:00:00', '12520241063', 'Randy Arba Pahlevi', 4, 3, 'Bantul', '1', 'Bantul', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '85799007278'),
(38, '12520244051', 'f44c7d6e80f945789a4b3750f6e25ff3', 3, '6', '0000-00-00 00:00:00', '12520244051', 'Arde Candra Pamungkas', 17, 3, 'Seyegan, Margokaton, Seyegan, Sleman', '1', 'Sleman', '1993-12-20', '', '', '', 0, 1, 1, '', '', 0, '085643356050'),
(34, '11201241023', '675f0a4f2a0753b73bd907af9967ea08', 3, '3', '0000-00-00 00:00:00', '11201241023', 'Nia Aprilianingsih', 8, 2, 'Pokoh 05/20, Wedomartani, Ngemplak, Sleman, Yogyakarta 55584', '2', 'Sleman', '1994-04-05', 'Expedisi, Redaksi, Redaksi', '', '', 0, 1, 1, '', '', 0, '085743733434'),
(35, '11407144010', 'cf8fb3719b6cf36f48f5daf44148586e', 3, '3', '0000-00-00 00:00:00', '11407144010', 'Nur Janti', 2, 2, 'Ds. Butuh, RT02/06, Kec. Butuh, Kab. Purworejo, Jawa Tengah', '2', 'Jakarta', '1994-01-25', '', '', '', 0, 1, 1, '', '', 0, '085643500175'),
(59, '130111613623', '6544e47d41d60cd00dd3b8ca307d66bf', 3, '6', '0000-00-00 00:00:00', '130111613623', 'Rohmana Sulik Setyo M', 20, 4, 'Malang', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '08970401672'),
(60, '13312244016', 'f64585733e5fdd04a2abde76fb0527a3', 3, '7', '0000-00-00 00:00:00', '13312244016', 'Mariyatul Kibtiyah', 21, 4, 'Kebumen', '2', 'Kebumen', '1995-10-10', '', '', '', 0, 1, 1, '', '', 0, '085726377758'),
(61, '12417144014', '6145e08d58a699274900052576631e4b', 3, '5', '0000-00-00 00:00:00', '12417144014', 'M. Fahrur S', 15, 4, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085713876176'),
(62, '13105241054', '13e8b731ad1678539759c30e1decee3f', 3, '4', '0000-00-00 00:00:00', '13105241054', 'Ubaidillah Fatawi', 11, 4, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085786441749'),
(63, '13407141064', 'a7b1f1ec94ab374ed4419550247d8d71', 3, '4', '0000-00-00 00:00:00', '13407141064', 'Prima Abdi S', 13, 4, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085746444642'),
(64, '12110241044', '84d7ff80e5b4ec926ab246c95121c182', 3, '5', '0000-00-00 00:00:00', '12110241044', 'Rinda M. Zakaria', 16, 4, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085786753215'),
(65, '14407141061', 'e12c24fe3d6bc86c23a6968e903ba0de', 3, '3', '0000-00-00 00:00:00', '14407141061', 'Putra Ramadhan', 3, 5, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '087871571514'),
(66, '14211141055', '90f29c34c81f3de98555091ee428bf48', 3, '2', '0000-00-00 00:00:00', '14211141055', 'Dinda Sekarwangi', 1, 5, '', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, ''),
(67, '14407141059', '6773d478a3f2140fa3213ce1d7c4230b', 3, '3', '0000-00-00 00:00:00', '14407141059', 'Ade Luqman Hakim', 4, 5, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '083898128656'),
(68, '13210141022', 'ec31bc5568e1c2139b8e1a4703fa4573', 3, '4', '0000-00-00 00:00:00', '13210141022', 'Khusnul Khitam', 12, 5, '', '2', 'Banjarnegara', '1994-05-10', '', '', '', 0, 1, 1, '', '', 0, '085641941131'),
(69, '14518241005', '0698052b9aa9e475a94b3be6e829be14', 3, '4', '0000-00-00 00:00:00', '14518241005', 'A. S. Rimbawana', 11, 5, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085745241598'),
(70, '13407141015', 'f4c5cb38144648f262fe258f3993f665', 3, '3', '0000-00-00 00:00:00', '13407141015', 'Triyo Handoko', 6, 5, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085729092850'),
(71, '13307141035', '0c4d573022d36f8e41a550f46174ed17', 3, '6', '0000-00-00 00:00:00', '13307141035', 'Bayu Hendrawati', 18, 5, '', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085728589496'),
(72, '14210141041', '7ede846490f5d8cfa92547233eb70a3f', 3, '1', '0000-00-00 00:00:00', '14210141041', 'Ayuningtyas Rachmansari', 0, 5, '', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, ''),
(73, '14210141036', '79d831ae696c0ba755f675182b5e0aa0', 3, '1', '0000-00-00 00:00:00', '14210141036', 'Andhika Yusuf W.', 0, 5, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, ''),
(74, '14201241036', '58888ae91e2ce55bdc0c6f7c09ae1166', 3, '1', '0000-00-00 00:00:00', '14201241036', 'Ahmad Wijayanto', 0, 5, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '0838402922132'),
(75, '12812141029', 'ea80669fa30081c932dda2429129ae0e', 3, '1', '0000-00-00 00:00:00', '12812141029', 'Riska Putri P.', 0, 5, '', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, ''),
(76, '14210144002', 'db07cc65ac238a4de0e12f99ac1dbb3e', 3, '6', '0000-00-00 00:00:00', '14210144002', 'Ghazali Saputra', 19, 5, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, ''),
(77, '14407141040', '14048e4c4d45b21731acb659733cb078', 3, '1', '0000-00-00 00:00:00', '14407141040', 'Kustian Rudianto', 0, 5, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, ''),
(78, '14407141015', '8a5c9e3f5a935626c4a1fc3eaacbd14c', 3, '1', '0000-00-00 00:00:00', '14407141015', 'Devi Elok W.', 0, 5, '', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085799328339'),
(79, '14201241041', '543764524df54d28afbc026c185775e7', 3, '4', '0000-00-00 00:00:00', '14201241041', 'Ervina Nur Fauzia', 10, 5, '', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '083867657250'),
(80, '14407144010', 'b8d2ec67c89bc280fe9bfbc8b5e03f9c', 3, '1', '0000-00-00 00:00:00', '14407144010', 'Andi Vangeran Vathir', 0, 5, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '082239385031'),
(81, '14407141019', '0133f63c861c4403e486d197c1c96e29', 3, '1', '0000-00-00 00:00:00', '14407141019', 'Fara Famular', 0, 5, '', '2', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085747442324'),
(82, '14407141044', '2fda10da7e6735eed42ca45e94c27ad9', 3, '6', '0000-00-00 00:00:00', '14407141044', 'Ristianto Indra', 20, 5, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085726328437'),
(83, '14210144003', '65d259a2f631595d9b9cf82443bbba94', 3, '1', '0000-00-00 00:00:00', '14210144003', 'M. Fajar Azizi', 0, 5, '', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, ''),
(84, '15210144013', '4a04e95fec49b97c0a80e1a342d3a50f', 3, '2', '0000-00-00 00:00:00', '15210144013', 'Danang Suryo Laksono', 1, 6, 'Perum Dayu Permai Blok S-40 Ngaglik Sleman', '1', 'Semarang', '1996-03-15', '', '', '', 0, 1, 1, '', '', 0, '08157965796'),
(85, '15210141043', 'f477bf56ddd4ca482595c08965d523d9', 3, '2', '0000-00-00 00:00:00', '15210141043', 'Nisa Maulan Shofa', 1, 6, 'Jl. Akasia Ds. Pamutih, Rt/Rw 03/06 \r\n', '1', 'Pemalang', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '089667227367'),
(86, '15203241029', 'f755a37aae70f7d9ccb3276cf81daf6a', 3, '2', '0000-00-00 00:00:00', '15203241029', 'Gigih Nindia Bella', 1, 6, 'Jl. Hasanudin 123 Jambean, Cekok, Babadan Ponorogo', '1', 'Ponorogo', '1997-03-01', '', '', '', 0, 1, 1, '', '', 0, '08988736441'),
(87, '15604221051', '7d69b084a092bb58e3d0a7aaa03c9171', 3, '2', '0000-00-00 00:00:00', '15604221051', 'Muhammad Sukron Fitriansyah', 1, 6, 'Jl. Tayu-Puncel KM 6', '1', 'Pati', '1996-03-14', '', '', '', 0, 1, 1, '', '', 0, '08971600966'),
(88, '15210144002', '61f71ec83ade4af6922bd1dce1502fdb', 3, '2', '0000-00-00 00:00:00', '15210144002', 'Dwi Putri Ratnasari', 1, 6, 'Butuh, Purworejo', '2', 'Purworejo', '1997-10-19', '', '', '', 0, 1, 1, '', '', 0, '089679880749'),
(89, '15405241029', '3b9c1110d394d0f8e1349f2a9343d6a9', 3, '2', '0000-00-00 00:00:00', '15405241029', 'Erya Ananda', 1, 6, 'Perum Gedongkuning gg Kartika V/12', '2', 'Jakarta', '1997-08-04', '', '', '', 0, 1, 1, '', '', 0, '081325723520'),
(90, '15401241050', '748254b692c60f853ffde5e857181006', 3, '2', '0000-00-00 00:00:00', '15401241050', 'Singgih Norma Wardi', 1, 6, 'Demakan, Gadingsari, Sanden, Bantul', '1', 'Bantul', '1996-12-06', '', '', '', 0, 1, 1, '', '', 0, '085868771923'),
(91, '14102244004', '2716f693415710f47e08faba2ce7cc0f', 3, '2', '0000-00-00 00:00:00', '14102244004', 'Meida Rahma', 1, 6, ' Jl. Mojokrapak Tembalang Jombang', '2', 'Sidoarjo', '1996-05-03', '', '', '', 0, 1, 1, '', '', 0, '087702675144'),
(92, '14405244024', '4eb4fa64b13941f230024248b90489b1', 3, '2', '0000-00-00 00:00:00', '14405244024', 'Fahrudin', 1, 6, 'Buton Selatan, Sulawesi Tenggara', '1', '', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '085241812033'),
(93, '15520241014', '6e4dec4491cd847069cfa79163177f20', 3, '2', '0000-00-00 00:00:00', '15520241014', 'Moh. Agung Syahroni', 1, 6, 'Jl. Pu Tanjungkerta Kec. Kroya Kab. Indramayu', '1', 'Indramayu', '1997-04-20', '', '', '', 0, 1, 1, '', '', 0, '083824017640'),
(94, '14201241005', 'c2454ba7b044763f3f172c21a9ba2d5b', 3, '2', '0000-00-00 00:00:00', '14201241005', 'Heni Wulandari', 1, 6, 'Tegalsari, Karangpakel, Trucuk, Klaten', '2', 'Klaten', '1996-10-02', '', '', '', 0, 1, 1, '', '', 0, '085643554413'),
(95, '15406241007', '2364d95ce65aa630bfff216d977049c0', 3, '2', '0000-00-00 00:00:00', '15406241007', 'Hanum Tirtaningrum', 1, 6, ' Gerso, Rt 18 Trimurti Srandakan Bantul', '2', 'Bantul', '1997-10-09', '', '', '', 0, 1, 1, '', '', 0, '085729387681'),
(96, '15201241064', '6e8d5d83c6c6a1ffe7a6808bb539fa8e', 3, '2', '0000-00-00 00:00:00', '15201241064', 'Maria Purbandari P. Putri', 1, 6, 'Sukoponco, Sukoreno, Sentolo, Kulonprogo', '2', 'Yogyakarta', '1997-05-10', '', '', '', 0, 1, 1, '', '', 0, '088216707521'),
(97, '15201241069', 'db20fb7b9fec4f18dc8d7bc3596fef76', 3, '2', '0000-00-00 00:00:00', '15201241069', 'Maria Gracia Putri R.', 1, 6, 'Kriyanan, rt/rw 05/06 Kulonprogo', '2', 'Sleman', '1996-07-21', '', '', '', 0, 1, 1, '', '', 0, '085643296491'),
(98, '15407141042', '2a1df574b27efbb55a98f439a502e90f', 3, '2', '0000-00-00 00:00:00', '15407141042', 'Ah. Abd. Wahid A', 1, 6, ' Jl. Veteran 30 Lamongan', '1', 'Lamongan', '1996-09-25', '', '', '', 0, 1, 1, '', '', 0, '085729773636'),
(99, '14201244002', 'dd468d657088e9628b062b8030ae3f45', 3, '2', '0000-00-00 00:00:00', '14201244002', 'Reni Nuryyati', 1, 6, 'Jl. Kemuning No. 8 Tegal', '2', 'Tegal', '1996-10-31', '', '', '', 0, 1, 1, '', '', 0, '085726582769'),
(100, '14102241048', 'c2ce05beef8adf7b19ba5a65beff6804', 3, '2', '0000-00-00 00:00:00', '14102241048', 'Umi Zahriah', 1, 6, ' Tanjung, Wukirsari, Cangkringan, Sleman', '2', 'Sleman', '1997-01-14', '', '', '', 0, 1, 1, '', '', 0, '085729685224'),
(101, '15419144017', 'b6b7886add06a4dd7f9de165b979f374', 3, '2', '0000-00-00 00:00:00', '15419144017', 'Ikrimah Abdurahman', 1, 6, ' Madugondo rt 04 Sitimulyo, Piyungan, Bantul', '1', 'Makassar', '0000-00-00', '', '', '', 0, 1, 1, '', '', 0, '082137842866');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
