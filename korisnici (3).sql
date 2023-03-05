-- phpMyAdmin SQL Dump
-- version 4.7.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 21, 2021 at 08:57 PM
-- Server version: 5.6.34
-- PHP Version: 5.6.32

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `korisnici`
--

-- --------------------------------------------------------

--
-- Table structure for table `anketaprasanja`
--

CREATE TABLE `anketaprasanja` (
  `id_anketa` int(200) NOT NULL DEFAULT '0',
  `id_prasanje` int(200) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anketaprasanja`
--

INSERT INTO `anketaprasanja` (`id_anketa`, `id_prasanje`) VALUES
(1, 1),
(1, 2),
(2, 4);

-- --------------------------------------------------------

--
-- Table structure for table `anketi`
--

CREATE TABLE `anketi` (
  `id_anketa` int(200) NOT NULL,
  `id_user` int(200) NOT NULL,
  `naslov` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `anketi`
--

INSERT INTO `anketi` (`id_anketa`, `id_user`, `naslov`) VALUES
(1, 1, 'Fakulteti'),
(2, 4, 'Ekologija');

-- --------------------------------------------------------

--
-- Table structure for table `korisnickiodg`
--

CREATE TABLE `korisnickiodg` (
  `id` int(200) NOT NULL,
  `id_anketa` int(200) NOT NULL DEFAULT '0',
  `id_prasanje` int(200) NOT NULL DEFAULT '0',
  `id_odgovor` int(200) NOT NULL DEFAULT '0',
  `odgovor` varchar(200) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `korisnickiodg`
--

INSERT INTO `korisnickiodg` (`id`, `id_anketa`, `id_prasanje`, `id_odgovor`, `odgovor`) VALUES
(1, 1, 1, 3, 'zavisi od predmetot,fakultetot,profesorot itn'),
(2, 1, 2, 4, 'Kompajleri'),
(4, 2, 4, 10, 'sekogas saka'),
(5, 2, 4, 11, 'NIKOGAS');

-- --------------------------------------------------------

--
-- Table structure for table `odgovori`
--

CREATE TABLE `odgovori` (
  `id_odgovor` int(200) NOT NULL,
  `id_user` int(200) NOT NULL DEFAULT '0',
  `id_prasanje` int(200) NOT NULL DEFAULT '0',
  `odgovor` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `odgovori`
--

INSERT INTO `odgovori` (`id_odgovor`, `id_user`, `id_prasanje`, `odgovor`) VALUES
(1, 1, 1, 'da'),
(2, 1, 1, 'ne'),
(3, 1, 1, 'zavisi od predmetot,fakultetot,profesorot itn'),
(4, 1, 2, 'Kompajleri'),
(5, 1, 2, 'Napredni algoritmi'),
(6, 1, 2, 'Vizuelno'),
(10, 4, 4, 'sekogas saka'),
(11, 4, 4, 'NIKOGAS'),
(12, 4, 4, 'SAMO posle obrok');

-- --------------------------------------------------------

--
-- Table structure for table `prasanja`
--

CREATE TABLE `prasanja` (
  `id_prasanje` int(200) NOT NULL,
  `prasanje` varchar(200) NOT NULL,
  `vid` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `prasanja`
--

INSERT INTO `prasanja` (`id_prasanje`, `prasanje`, `vid`) VALUES
(1, 'Dali online nastavata e isto efikasna kako i nastava vo zivo', 'checkbox'),
(2, 'Po koi predmeti e najdobro izvedena online nastavata', 'checkbox'),
(4, 'dali rokki saka soncogled', 'checkbox');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `name` varchar(200) NOT NULL,
  `surname` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(200) NOT NULL,
  `admin` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `name`, `surname`, `username`, `password`, `admin`) VALUES
(1, 'ana.atanasova@gmail.com', 'Ana', 'Atanasova', 'a.atanasova', 'c976a31818501781e2f971fc0a63d9c0', 0),
(2, 'aleks.zdravkova@gmail.com', 'Aleksandra', 'Zdravkova', 'a.zdravkova', '10e6f1500fb503a1ebe9d06d7106423c', 0),
(4, 'tanja.milososka@gmail.com', 'Tanja', 'Milososka', 't.milososka', 'd57c0f948948be0d03f13a162afcc2c7', 1),
(5, 'stefan.ef@gmail.com', 'Stefan', 'Efremov', 's.efremov', 'b18672f94294051a5aad88e6a1634b33', 0),
(6, 'eli.z@gmail.com', 'Eli', 'Zafirova', 'e.zafirova', '98208e02cc64ef24bc1655fafa727e92', 0),
(7, 'ivana.s@gmail.com', 'Ivana', 'Sisoska', 'i.sisoska', '2d75fde363598eaad74c11ad618a99a7', 0),
(8, 'kire.t@gmail.com', 'Kire', 'Trboevik', 'k.trboevik', '459d634777801b5a04b79ece34db464f', 0),
(9, 'nikola.v@gmail.com', 'Nikola', 'Velkov', 'n.velkov', 'cc01de81f3ea2377ee292ea5e9e1b97d', 0),
(10, 'simona.p@gmail.com', 'Simona', 'Petrova', 's.petrova', '31f275f93eec1bfda7d9e149c0c670f8', 0),
(11, 'elena.k@gmail.com', 'Elena', 'Krsteva', 'e.krsteva', 'd6af56d5d475e537db9509a7d1e051bf', 0),
(12, 'marija.d@gmail.com', 'Marija', 'Doneva', 'm.doneva', 'e1f91da9a3495209b328f43a5a104c3f', 0),
(13, 'sara.m@gmail.com', 'Sara', 'Maneva', 's.maneva', 'cae1a8b547c5a86270fa9dd72d73373c', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `anketaprasanja`
--
ALTER TABLE `anketaprasanja`
  ADD PRIMARY KEY (`id_anketa`,`id_prasanje`),
  ADD KEY `id_prasanje` (`id_prasanje`);

--
-- Indexes for table `anketi`
--
ALTER TABLE `anketi`
  ADD PRIMARY KEY (`id_anketa`,`id_user`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `korisnickiodg`
--
ALTER TABLE `korisnickiodg`
  ADD PRIMARY KEY (`id`,`id_anketa`,`id_prasanje`,`id_odgovor`),
  ADD KEY `id_anketa` (`id_anketa`),
  ADD KEY `id_odgovor` (`id_odgovor`),
  ADD KEY `id_prasanje` (`id_prasanje`);

--
-- Indexes for table `odgovori`
--
ALTER TABLE `odgovori`
  ADD PRIMARY KEY (`id_odgovor`,`id_user`,`id_prasanje`),
  ADD KEY `id_prasanje` (`id_prasanje`),
  ADD KEY `id_user` (`id_user`);

--
-- Indexes for table `prasanja`
--
ALTER TABLE `prasanja`
  ADD PRIMARY KEY (`id_prasanje`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `anketi`
--
ALTER TABLE `anketi`
  MODIFY `id_anketa` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `korisnickiodg`
--
ALTER TABLE `korisnickiodg`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `odgovori`
--
ALTER TABLE `odgovori`
  MODIFY `id_odgovor` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `prasanja`
--
ALTER TABLE `prasanja`
  MODIFY `id_prasanje` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(200) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `anketi`
--
ALTER TABLE `anketi`
  ADD CONSTRAINT `anketi_ibfk_1` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
