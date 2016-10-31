-- phpMyAdmin SQL Dump
-- version 4.5.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Oct 21, 2016 at 05:45 AM
-- Server version: 5.7.11
-- PHP Version: 5.6.19

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `agile_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `citys`
--

CREATE TABLE `citys` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `citys`
--

INSERT INTO `citys` (`id`, `name`) VALUES
(1, 'Auckland, New Zealand'),
(2, 'Christchurch, New Zealand'),
(3, 'Sydney, Australia'),
(4, 'Perth, Australia');

-- --------------------------------------------------------

--
-- Table structure for table `flights`
--

CREATE TABLE `flights` (
  `id` int(11) NOT NULL,
  `origin_id` int(11) NOT NULL,
  `destination_id` int(11) NOT NULL,
  `flight_number` varchar(10) NOT NULL,
  `flight_provider_id` int(11) NOT NULL,
  `departure_time` datetime NOT NULL,
  `arriving_time` datetime NOT NULL,
  `cabin_luguage` int(11) NOT NULL,
  `checkin_luguage` int(11) NOT NULL,
  `total_time` varchar(16) NOT NULL,
  `fare_economy` int(11) NOT NULL,
  `fare_business` int(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights`
--

INSERT INTO `flights` (`id`, `origin_id`, `destination_id`, `flight_number`, `flight_provider_id`, `departure_time`, `arriving_time`, `cabin_luguage`, `checkin_luguage`, `total_time`, `fare_economy`, `fare_business`, `status`) VALUES
(1, 1, 3, 'AIRNZ305', 1, '2016-09-20 01:30:00', '2016-09-20 05:30:00', 7, 20, '4', 290, 600, 1),
(2, 1, 3, 'AIRNZ306', 1, '2016-09-20 06:30:00', '2016-09-20 10:30:00', 7, 20, '4', 250, 550, 1),
(3, 1, 3, 'AIRNZ307', 1, '2016-09-20 10:30:00', '2016-09-20 14:30:00', 7, 20, '4', 200, 500, 1),
(4, 1, 3, 'QUN100', 2, '2016-09-20 01:00:00', '2016-09-20 03:00:00', 7, 22, '4', 290, 700, 1),
(5, 1, 3, 'QUN101', 2, '2016-09-20 03:45:00', '2016-09-20 06:45:00', 7, 22, '4', 260, 650, 1),
(6, 1, 3, 'QUN102', 2, '2016-09-20 15:00:00', '2016-09-20 17:00:00', 7, 22, '4', 230, 600, 1),
(7, 1, 3, 'AIRNZ330', 1, '2016-09-28 01:30:00', '2016-09-28 05:30:00', 7, 20, '4', 300, 600, 1),
(8, 1, 3, 'AIRNZ311', 1, '2016-09-28 06:30:00', '2016-09-28 10:30:00', 7, 20, '4', 250, 550, 1),
(9, 1, 3, 'AIRNZ315', 1, '2016-09-28 10:30:00', '2016-09-28 14:30:00', 7, 20, '4', 200, 500, 1),
(10, 3, 1, 'AIRNZ322', 1, '2016-09-25 01:30:00', '2016-09-25 05:30:00', 7, 20, '4', 300, 600, 1),
(11, 3, 1, 'AIRNZ323', 1, '2016-09-25 06:30:00', '2016-09-25 10:30:00', 7, 20, '4', 250, 550, 1),
(12, 3, 1, 'AIRNZ333', 1, '2016-09-25 10:30:00', '2016-09-25 14:30:00', 7, 20, '4', 200, 500, 1),
(13, 3, 1, 'QUN200', 2, '2016-09-24 01:00:00', '2016-09-24 03:00:00', 7, 22, '4', 290, 700, 1),
(14, 3, 1, 'QUN300', 2, '2016-09-24 03:45:00', '2016-09-24 06:45:00', 7, 22, '4', 260, 650, 1),
(15, 3, 1, 'QUN400', 2, '2016-09-25 15:00:00', '2016-09-25 17:00:00', 7, 22, '4', 230, 600, 1),
(16, 3, 1, 'QUN500', 2, '2016-09-25 01:00:00', '2016-09-25 03:00:00', 7, 22, '4', 290, 700, 1),
(17, 3, 1, 'QUN600', 2, '2016-09-26 03:45:00', '2016-09-26 06:45:00', 7, 22, '4', 260, 650, 1),
(18, 3, 1, 'QUN700', 2, '2016-09-26 15:00:00', '2016-09-26 17:00:00', 7, 22, '4', 230, 600, 1);

-- --------------------------------------------------------

--
-- Table structure for table `flights_provider`
--

CREATE TABLE `flights_provider` (
  `id` int(11) NOT NULL,
  `provider_name` varchar(32) NOT NULL,
  `provider_logo` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flights_provider`
--

INSERT INTO `flights_provider` (`id`, `provider_name`, `provider_logo`) VALUES
(1, 'Air New Zealand', 'http://localhost/agile_project/assets/images/air_newzealand.jpg'),
(2, 'Qantas', 'http://localhost/agile_project/assets/images/qantas.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `flight_alerts`
--

CREATE TABLE `flight_alerts` (
  `id` int(11) NOT NULL,
  `flight_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `expected_price` int(11) NOT NULL,
  `class_type` varchar(11) NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `flight_alerts`
--

INSERT INTO `flight_alerts` (`id`, `flight_id`, `user_id`, `expected_price`, `class_type`, `status`) VALUES
(10, 4, 5, 500, 'economy', 0),
(9, 4, 5, 2000, 'business', 0),
(8, 1, 5, 280, 'economy', 0),
(7, 1, 5, 290, 'economy', 0),
(11, 5, 5, 200, 'economy', 0),
(12, 2, 8, 240, 'economy', 0),
(13, 5, 5, 240, 'economy', 0),
(14, 4, 5, 180, 'economy', 0);

-- --------------------------------------------------------

--
-- Table structure for table `hotels`
--

CREATE TABLE `hotels` (
  `id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `description` text NOT NULL,
  `addreaa_line1` text NOT NULL,
  `addreaa_line2` text NOT NULL,
  `subhurb` varchar(50) NOT NULL,
  `city_id` int(11) NOT NULL,
  `minimum_rate` int(11) NOT NULL,
  `facility_list` text NOT NULL COMMENT 'Free Internet, Full Kitchen, Reserve now pay later, Swimming pool, Bar, Gym, Free parking on site, Complimentary Laptop, Car & ATV rental '
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_images`
--

CREATE TABLE `hotel_images` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `image_source` text NOT NULL,
  `main_image` tinyint(4) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `hotel_room_details`
--

CREATE TABLE `hotel_room_details` (
  `id` int(11) NOT NULL,
  `hotel_id` int(11) NOT NULL,
  `room_type` varchar(50) NOT NULL,
  `detail` text NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `places`
--

CREATE TABLE `places` (
  `id` int(11) NOT NULL,
  `place_id` int(11) NOT NULL,
  `image_src` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `places`
--

INSERT INTO `places` (`id`, `place_id`, `image_src`) VALUES
(1, 3, 'sydney-opera-house.jpg'),
(2, 3, 'sydney-east-3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

CREATE TABLE `roles` (
  `id` int(11) NOT NULL,
  `role_name` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `role_name`) VALUES
(1, 'Administrator'),
(2, 'front_user');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL,
  `email_id` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `password` varchar(100) NOT NULL,
  `contact_no` bigint(20) NOT NULL,
  `facebook_id` varchar(50) DEFAULT NULL,
  `google_id` varchar(50) DEFAULT NULL,
  `status` tinyint(4) NOT NULL,
  `last_login` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role_id`, `email_id`, `first_name`, `last_name`, `password`, `contact_no`, `facebook_id`, `google_id`, `status`, `last_login`) VALUES
(1, 1, 'nisarg.phpdeveloper@gmail.com', 'Nisarg', 'Patel', 'e10adc3949ba59abbe56e057f20f883e', 220336290, '', '', 1, '2016-09-17 06:18:06'),
(2, 2, 'krunal@gmail.com', 'Krunal', 'Parikh', 'e10adc3949ba59abbe56e057f20f883e', 220336093, '', '', 0, '2016-09-17 11:01:31'),
(5, 2, 'nisarg.phpdeveloper+agile@gmail.com', 'Nisarg', 'Patel', '', 0, '100001674643512', NULL, 1, '2016-10-10 03:38:57'),
(6, 2, 'mayur_11889@yahoo.com', 'Mayur', 'Gattu', '', 0, '10210248444104992', NULL, 1, '2016-09-18 22:49:57'),
(8, 2, 'jawakar92@gmail.com', 'Jawakar', 'Selvaraj', '', 0, '1413867651974071', NULL, 1, '2016-09-19 05:23:05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `citys`
--
ALTER TABLE `citys`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flights`
--
ALTER TABLE `flights`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flights_provider`
--
ALTER TABLE `flights_provider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `flight_alerts`
--
ALTER TABLE `flight_alerts`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotels`
--
ALTER TABLE `hotels`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_images`
--
ALTER TABLE `hotel_images`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hotel_room_details`
--
ALTER TABLE `hotel_room_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `places`
--
ALTER TABLE `places`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `citys`
--
ALTER TABLE `citys`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `flights`
--
ALTER TABLE `flights`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;
--
-- AUTO_INCREMENT for table `flights_provider`
--
ALTER TABLE `flights_provider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `flight_alerts`
--
ALTER TABLE `flight_alerts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;
--
-- AUTO_INCREMENT for table `hotels`
--
ALTER TABLE `hotels`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel_images`
--
ALTER TABLE `hotel_images`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `hotel_room_details`
--
ALTER TABLE `hotel_room_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `places`
--
ALTER TABLE `places`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
