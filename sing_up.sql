-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 08, 2026 at 03:17 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sing_up`
--

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `stid` int(11) NOT NULL,
  `full_name` varchar(200) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `number` int(10) DEFAULT NULL,
  `code` int(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT 'pending'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`stid`, `full_name`, `email`, `password`, `number`, `code`, `status`) VALUES
(15, 'iranzi ishimwe roben', 'robenishimweiranzi@gmail.com', '$2y$10$NM90uR/VtxUcZGuTjHwWjen6Evvjqn0CXSPHUXskJ0OBjdfA0fuQi', 794691168, 613891, 'confirmed'),
(16, 'iranzi roben', 'iranzi@gmail.com', '$2y$10$bGWGya2wfshkIdJaL71Za.kHDVUKgZjWp2FThhv9ERyXKTsy7EJL.', 784581234, 831309, 'confirmed'),
(17, 'ishimwe roben', 'robeni@gmail.com', '$2y$10$ANSaW77A4.L8r9T0orEXU.zyDY7DDaSNYe982iqFXQ79OjIGNz7CW', 785565432, 455501, 'confirmed'),
(18, 'iranziishimwe', 'robenish@gmail.com', '$2y$10$CCvrrbBV2Po2UPqx9Vgage5gvvsWfse7mWoYWQH3D/Ky6GlXHDJ7W', 788804571, 557202, 'confirmed'),
(19, 'kenny mugisha', 'kennymugisha@gmail.com', '$2y$10$myIkCGC3FdtxKsZD66Al3OISL.rpE4S1F1vZCwx5px/U3yXMDp1.q', 786766548, 337083, 'confirmed');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`stid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `manager`
--
ALTER TABLE `manager`
  MODIFY `stid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
