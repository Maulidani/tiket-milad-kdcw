-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 26, 2022 at 06:55 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ticket_milad_kdcw`
--

-- --------------------------------------------------------

--
-- Table structure for table `statuses`
--

CREATE TABLE `statuses` (
  `id` bigint(20) NOT NULL,
  `name` varchar(10) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `statuses`
--

INSERT INTO `statuses` (`id`, `name`, `description`) VALUES
(1, 'pending', 'belum melakukan pembayaran'),
(2, 'paid', 'sudah melakukan pembayaran'),
(3, 'attend', 'menghadiri acara');

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `id` bigint(20) NOT NULL,
  `ticket_category_id` bigint(20) NOT NULL,
  `quantity` double NOT NULL,
  `customer_name` varchar(35) NOT NULL,
  `customer_nra` varchar(20) NOT NULL,
  `customer_phone` varchar(20) NOT NULL,
  `customer_email` varchar(50) NOT NULL,
  `customer_address` text NOT NULL,
  `customer_campus` enum('dipa','umi') NOT NULL,
  `merchandise` varchar(200) DEFAULT NULL,
  `status_id` bigint(20) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tickets`
--

INSERT INTO `tickets` (`id`, `ticket_category_id`, `quantity`, `customer_name`, `customer_nra`, `customer_phone`, `customer_email`, `customer_address`, `customer_campus`, `merchandise`, `status_id`, `created_at`, `updated_at`) VALUES
(47, 1, 1, 'nkajdnw', 'u8ou8o', '789789', 'hkjhkjh@bbfujksad', 'hkhkh', 'dipa', ',,', 3, '2022-11-08 10:52:05', '2022-11-08 12:59:43'),
(48, 1, 1, 'vjhbvj', '79878', '797', 'bkjbkj@gujkg', 'hkih', 'dipa', ',,', 2, '2022-11-08 12:14:43', '2022-11-08 12:42:58');

-- --------------------------------------------------------

--
-- Table structure for table `ticket_categories`
--

CREATE TABLE `ticket_categories` (
  `id` bigint(20) NOT NULL,
  `name` varchar(15) NOT NULL,
  `price` double NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ticket_categories`
--

INSERT INTO `ticket_categories` (`id`, `name`, `price`, `description`) VALUES
(1, 'Silver', 165000, '<p><strong>Termasuk :</strong><br>                            - Welcome drink <br>                                            \r\n- Snack <br>\r\n- Dinner <br>\r\n- Dessert <br>\r\n- 1 Tumblr minuman                                                                            </p>'),
(2, 'Gold', 200000, '<p><strong>Termasuk :</strong><br>                            - Welcome drink <br>                                            \r\n- Snack <br>\r\n- Dinner <br>\r\n- Dessert <br>\r\n- 1 Tumblr minuman <br>\r\n- 1 Baju milad 22 KDCW                                                                          </p>'),
(3, 'Platinum', 400000, '<p><strong>Termasuk :</strong><br>                            - Welcome drink <br>                                            \r\n- Snack <br>\r\n- Dinner <br>\r\n- Dessert <br>\r\n- 1 Tumblr minuman <br>\r\n- 1 Baju milad 22 KDCW                                   </p>');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `statuses`
--
ALTER TABLE `statuses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`id`),
  ADD KEY `tickets_ibfk_1` (`ticket_category_id`),
  ADD KEY `status` (`status_id`);

--
-- Indexes for table `ticket_categories`
--
ALTER TABLE `ticket_categories`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tickets`
--
ALTER TABLE `tickets`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=49;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tickets`
--
ALTER TABLE `tickets`
  ADD CONSTRAINT `tickets_ibfk_1` FOREIGN KEY (`ticket_category_id`) REFERENCES `ticket_categories` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `tickets_ibfk_2` FOREIGN KEY (`status_id`) REFERENCES `statuses` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
