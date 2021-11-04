-- phpMyAdmin SQL Dump
-- version 4.8.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: 04-Nov-2021 às 14:33
-- Versão do servidor: 10.1.34-MariaDB
-- PHP Version: 7.2.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `test`
--

-- --------------------------------------------------------

--
-- Estrutura da tabela `photo`
--

CREATE TABLE `photo` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_bin NOT NULL,
  `binaryphoto` longtext COLLATE utf8_bin NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_bin;

--
-- Extraindo dados da tabela `photo`
--

INSERT INTO `photo` (`id`, `title`, `binaryphoto`) VALUES
(45, 'SCAM - MAVENDA-1635976629.jpeg', 'MAVENDA-1635976629.jpeg'),
(47, 'SCAM - MAVENDA-1635977547.jpeg', 'MAVENDA-1635977547.jpeg'),
(48, 'SCAM - MAVENDA-1635977576.jpeg', 'MAVENDA-1635977576.jpeg'),
(49, 'SCAM - MAVENDA-1635978482.jpeg', 'MAVENDA-1635978482.jpeg'),
(50, 'SCAM - MAVENDA-1635978629.jpeg', 'MAVENDA-1635978629.jpeg'),
(51, 'SCAM - MAVENDA-1635978633.jpeg', 'MAVENDA-1635978633.jpeg'),
(53, 'SCAM - MAVENDA-1635978740.jpeg', 'MAVENDA-1635978740.jpeg'),
(54, 'SCAM - MAVENDA-1636009964.png', 'MAVENDA-1636009964.png'),
(55, 'SCAM - MAVENDA-1636009979.png', 'MAVENDA-1636009979.png');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `photo`
--
ALTER TABLE `photo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `photo`
--
ALTER TABLE `photo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
