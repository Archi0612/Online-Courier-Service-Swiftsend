-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2024 at 11:45 AM
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
-- Database: `cms_db`
--
CREATE DATABASE IF NOT EXISTS `cms_db` DEFAULT CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci;
USE `cms_db`;

-- --------------------------------------------------------

--
-- Table structure for table `branches`
--

DROP TABLE IF EXISTS `branches`;
CREATE TABLE `branches` (
  `id` int(30) NOT NULL,
  `branch_code` varchar(50) NOT NULL,
  `street` text NOT NULL,
  `city` text NOT NULL,
  `state` text NOT NULL,
  `zip_code` varchar(50) NOT NULL,
  `country` text NOT NULL,
  `contact` varchar(100) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `branches`
--

INSERT INTO `branches` (`id`, `branch_code`, `street`, `city`, `state`, `zip_code`, `country`, `contact`, `date_created`) VALUES
(1, 'vzTL0PqMogyOWhF', 'Branch 1 St., Ahmedabad', 'Ahmedabad', 'Gujarat', '1001', 'India', '98153 86729', '2024-01-01 11:21:41'),
(3, 'KyIab3mYBgAX71t', '2nd branch, sector 11', 'Gandhinagar', 'Gujarat', '382821', 'India', '1234567489', '2024-01-05 16:45:05'),
(4, 'dIbUK5mEh96f0Zc', '1st floor,Sunshine buildng', 'vadodara', 'Gujarat', '382801', 'India', '1234567890', '2024-01-07 13:31:49');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE `feedback` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `parcel_id` varchar(20) NOT NULL,
  `rating` int(11) NOT NULL,
  `comments` text NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `name`, `email`, `parcel_id`, `rating`, `comments`, `created_at`) VALUES
(1, 'Archi', 'archi@gmail.com', '2', 4, 'Excellent delivery service', '2024-02-06 13:13:12');

-- --------------------------------------------------------

--
-- Table structure for table `parcels`
--

DROP TABLE IF EXISTS `parcels`;
CREATE TABLE `parcels` (
  `id` int(30) NOT NULL,
  `reference_number` varchar(100) NOT NULL,
  `sender_name` text NOT NULL,
  `sender_address` text NOT NULL,
  `sender_contact` text NOT NULL,
  `recipient_name` text NOT NULL,
  `recipient_address` text NOT NULL,
  `recipient_contact` text NOT NULL,
  `type` int(1) NOT NULL COMMENT '1 = Deliver, 2=Pickup',
  `from_branch_id` varchar(30) NOT NULL,
  `to_branch_id` varchar(30) NOT NULL,
  `weight` varchar(100) NOT NULL,
  `height` varchar(100) NOT NULL,
  `width` varchar(100) NOT NULL,
  `length` varchar(100) NOT NULL,
  `price` float NOT NULL,
  `status` int(2) NOT NULL DEFAULT 0,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parcels`
--

INSERT INTO `parcels` (`id`, `reference_number`, `sender_name`, `sender_address`, `sender_contact`, `recipient_name`, `recipient_address`, `recipient_contact`, `type`, `from_branch_id`, `to_branch_id`, `weight`, `height`, `width`, `length`, `price`, `status`, `date_created`) VALUES
(4, '514912669061', 'Vishal khaghad', '2, om residance, Vadodara', '1233467890', 'Malhar Solanki', '5th street, sec 11, Gandhinagar', '6789000440', 2, '3', '4', '23kg', '12in', '12in', '15in', 1900, 7, '2024-02-20 13:52:14'),
(5, '897856905844', 'Archi Saksena', ' At: Mansa, Ta: Mansa, Dis: Gandhinagar, state: Gujarat', '1234567890', 'Malhar Solanki', '5th street, sec 11, Gandhinagar', '0000034400', 1, '4', '1', '30kg', '10in', '10in', '10in', 1450, 6, '2024-01-10 13:52:14'),
(7, '282845157001', 'Archi Saksena', ' At: Mansa, Ta: Mansa, Dis: Gandhinagar, state: Gujarat', '1234567890', 'Harsh Rupavatiya', 'At: Amreli, Ta: Amreli, Dis: Amreli, state: Gujarat', '72800000', 2, '3', '1', '100', '50', '35', '30', 500, 1, '2024-02-21 18:56:45'),
(8, '894097309831', 'Vishal khaghad', '2, om residance, Vadodara', '1234567890', 'Harsh Rupavatiya', 'At: Amreli, Ta: Amreli, Dis: Amreli, state: Gujarat', '670003440', 1, '1', '4', '20kg', '50in', '20in', '30in', 1000, 4, '2024-02-21 19:04:02');

-- --------------------------------------------------------

--
-- Table structure for table `parcel_tracks`
--

DROP TABLE IF EXISTS `parcel_tracks`;
CREATE TABLE `parcel_tracks` (
  `id` int(30) NOT NULL,
  `parcel_id` int(30) NOT NULL,
  `status` int(2) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parcel_tracks`
--

INSERT INTO `parcel_tracks` (`id`, `parcel_id`, `status`, `date_created`) VALUES
(1, 2, 1, '2024-01-07 09:53:27'),
(2, 3, 1, '2024-01-07 09:55:17'),
(3, 1, 1, '2024-01-07 10:28:01'),
(4, 1, 2, '2024-01-07 10:28:10'),
(5, 1, 3, '2024-01-07 10:28:16'),
(6, 1, 4, '2024-01-07 11:05:03'),
(7, 1, 5, '2024-01-07 11:05:17'),
(8, 1, 7, '2024-01-07 11:05:26'),
(9, 3, 2, '2024-01-07 11:05:41'),
(10, 6, 1, '2024-01-07 14:06:57'),
(11, 7, 1, '2024-02-21 19:02:14'),
(12, 5, 6, '2024-02-21 19:02:34'),
(13, 8, 4, '2024-02-21 19:04:28'),
(14, 4, 2, '2024-02-21 19:04:53'),
(15, 4, 7, '2024-02-21 19:10:49');

-- --------------------------------------------------------

--
-- Table structure for table `system_settings`
--

DROP TABLE IF EXISTS `system_settings`;
CREATE TABLE `system_settings` (
  `id` int(30) NOT NULL,
  `name` text NOT NULL,
  `email` varchar(200) NOT NULL,
  `contact` varchar(20) NOT NULL,
  `address` text NOT NULL,
  `cover_img` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `system_settings`
--

INSERT INTO `system_settings` (`id`, `name`, `email`, `contact`, `address`, `cover_img`) VALUES
(1, 'SwiftSend', 'info@sample.comm', '69485 42623', '2102  Caldwell Road ,Baroda, 14608', '');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(30) NOT NULL,
  `firstname` varchar(200) NOT NULL,
  `lastname` varchar(200) NOT NULL,
  `email` varchar(200) NOT NULL,
  `password` longtext NOT NULL,
  `type` tinyint(1) NOT NULL DEFAULT 2 COMMENT '1 = admin, 2 = staff',
  `branch_id` int(30) NOT NULL,
  `date_created` datetime NOT NULL DEFAULT current_timestamp(),
  `contact` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `firstname`, `lastname`, `email`, `password`, `type`, `branch_id`, `date_created`, `contact`) VALUES
(1, 'Administrator', '', 'admin@admin.com', '0192023a7bbd73250516f069df18b500', 1, 0, '2024-01-06 10:57:04', ''),
(2, 'Ronak', 'Roy', 'rroy@sample.com', '288c642238fb2008ff454ce64e4510ce', 2, 1, '2024-01-06 11:52:04', ''),
(3, 'Parsis', 'Saksena', 'psaksena@sample.com', 'e97f30eb2888118d9fc658c05684f407', 2, 4, '2024-01-08 13:32:12', ''),
(4, 'Archi', 'Saksena', 'archi@gmail.com', '47f99b4252a485e7de748746eee20c5a', 3, 0, '2024-02-06 15:09:50', '700000000'),
(6, 'Harsh', 'Rupavatiya', 'harsh@gmail.com', 'b0aa651c991deca550252ed6cbba99ba', 3, 0, '2024-02-06 15:27:35', '7280000740'),
(9, 'Malhar', 'Solanki', 'malhar@sample.com', '43afc98bc492364f7eaf7636a9f46e2a', 3, 0, '2024-02-06 15:47:31', '9000000878'),
(10, 'Charmi ', 'Patel', 'cpatel@gmail.com', 'f4e9ede58832094df601bd44663ab72e', 2, 4, '2024-02-21 18:53:52', ''),
(11, 'Veer', 'Patel', 'veer@gmail.com', 'f0e8669d93cf4e6c823ecc114c04fabd', 2, 3, '2024-02-22 16:12:33', '');

--
-- Indexes for dumped tables
--
-- Table structure for table `parcels_photos`--

-- Create 'parcels_photos' table


-- Adjust the INSERT statements above with your actual data


--
-- Indexes for table `branches`
--
ALTER TABLE `branches`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `feedback`
--
ALTER TABLE `feedback`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcels`
--
ALTER TABLE `parcels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `parcel_tracks`
--
ALTER TABLE `parcel_tracks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_settings`
--
ALTER TABLE `system_settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);
ALTER TABLE `users` ADD FULLTEXT KEY `contact` (`contact`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `branches`
--
ALTER TABLE `branches`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `feedback`
--
ALTER TABLE `feedback`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `parcels`
--
ALTER TABLE `parcels`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parcel_tracks`
--
ALTER TABLE `parcel_tracks`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `system_settings`
--
ALTER TABLE `system_settings`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(30) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- Metadata
--
USE `phpmyadmin`;

--
-- Metadata for table branches
--

--
-- Metadata for table feedback
--

--
-- Metadata for table parcels
--

--
-- Metadata for table parcel_tracks
--

--
-- Metadata for table system_settings
--

--
-- Metadata for table users
--

--
-- Metadata for database cms_db
--
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
