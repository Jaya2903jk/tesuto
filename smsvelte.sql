-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 20, 2023 at 05:08 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 7.2.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `smsvelte_asset`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id` int(20) NOT NULL,
  `dept_id` varchar(50) NOT NULL,
  `password` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id`, `dept_id`, `password`, `role`) VALUES
(1, 'veltech', 1234, 1),
(2, 'veltech', 12345, 2);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `categories_id` int(11) NOT NULL,
  `category_unique_id` text NOT NULL,
  `categories_name` varchar(100) NOT NULL,
  `sub_category` varchar(50) DEFAULT NULL,
  `product_name` varchar(100) DEFAULT NULL,
  `product_shorthand` varchar(50) NOT NULL,
  `categories_active` int(11) NOT NULL DEFAULT 0,
  `categories_status` int(11) NOT NULL DEFAULT 0 COMMENT 'active=2\r\n,inactive=0\r\n'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`categories_id`, `category_unique_id`, `categories_name`, `sub_category`, `product_name`, `product_shorthand`, `categories_active`, `categories_status`) VALUES
(1, '1', 'Mobile and Electronics', 'Mobiles', 'Smartphone', 'Sm', 0, 0),
(2, '1', 'Healthcare Essentials', 'Testing Kits', 'Weighing Scale', 'We', 0, 0),
(3, '1', 'Automotive', 'vehicles carrying passenger', 'Cars', 'Ca', 0, 0),
(4, '1', 'Contruction Materials', 'Natural Raw Materials', 'Sand', 'Sa', 0, 0),
(5, '1', 'Mobile and Electronics', 'Computer accessories', 'Moniter', 'Mo', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `category_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`category_id`, `category_name`) VALUES
(1, 'Mobile and Electronics'),
(2, 'Groceries'),
(3, 'Healthcare Essentials'),
(4, 'Large Appliances'),
(5, 'Sports Eqiupment'),
(6, 'Stationery Item'),
(7, 'Automotive'),
(8, 'Contruction Materials'),
(9, 'Laboratory Equipment'),
(10, 'Other');

-- --------------------------------------------------------

--
-- Table structure for table `department`
--

CREATE TABLE `department` (
  `dept_id` int(11) NOT NULL,
  `dept_named` varchar(30) NOT NULL,
  `dept_name` text NOT NULL,
  `sub_department` text NOT NULL,
  `department_hod` varchar(200) NOT NULL,
  `department_room_no` int(11) NOT NULL,
  `dept_details` varchar(255) NOT NULL,
  `added_at` date DEFAULT NULL,
  `password` int(11) NOT NULL,
  `role` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department`
--

INSERT INTO `department` (`dept_id`, `dept_named`, `dept_name`, `sub_department`, `department_hod`, `department_room_no`, `dept_details`, `added_at`, `password`, `role`) VALUES
(11, '', 'SCHOOL OF COMPUTING', 'Artificial Intelligence (AI) and Data Science', '', 4545, 'ggt', '0000-00-00', 0, 0),
(12, '', 'SCHOOL OF COMPUTING', 'Artificial Intelligence and Machine Learning', '', 0, '3r3', '2023-10-04', 0, 0),
(13, '', 'SCHOOL OF MECHANICAL AND CONSTRUCTION', 'Mechanical Engineering', '', 4005, 'no comments', '2023-10-04', 0, 0),
(14, '', 'SCHOOL OF SCIENCES AND HUMANITIES', '', 'kumar', 1211, 'bfg', '2023-10-05', 0, 0),
(15, '', 'School Of Management', 'Commerce and Business Administration', 'deva', 21312, 'rgg', '2023-10-05', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `department_created`
--

CREATE TABLE `department_created` (
  `department_id` int(11) NOT NULL,
  `department_name` text NOT NULL,
  `org_depart_id` int(11) NOT NULL,
  `sub_department_name` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `department_created`
--

INSERT INTO `department_created` (`department_id`, `department_name`, `org_depart_id`, `sub_department_name`) VALUES
(1, 'SCHOOL OF COMPUTING', 1, 'Artificial Intelligence (AI) and Data Science'),
(2, 'SCHOOL OF COMPUTING', 1, ' Artificial Intelligence and Machine Learning'),
(3, 'SCHOOL OF COMPUTING', 1, 'Computer Science & Engineering'),
(4, 'SCHOOL OF COMPUTING', 1, 'Department of Computer Science and Engineering(Artificial Intelligence and Machine Learning)'),
(5, 'SCHOOL OF COMPUTING', 1, 'Department of Computer Science and Engineering(Cyber Security)'),
(6, 'SCHOOL OF COMPUTING', 1, 'Department of Computer Science and Engineering(Data Science)'),
(7, 'SCHOOL OF COMPUTING', 1, 'Computer Science and Design'),
(8, 'SCHOOL OF COMPUTING', 1, 'Information Technology');

-- --------------------------------------------------------

--
-- Table structure for table `parent_category`
--

CREATE TABLE `parent_category` (
  `id` int(11) NOT NULL,
  `parent_category_name` text NOT NULL,
  `sub_categories_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `parent_category`
--

INSERT INTO `parent_category` (`id`, `parent_category_name`, `sub_categories_id`) VALUES
(1, '', 0),
(2, 'Moniter', 1),
(3, 'Printer', 1),
(4, 'CPU', 1),
(5, 'Keyboard', 1),
(6, 'Mouse', 1),
(7, 'Networking', 1),
(8, 'Projecters', 1),
(9, 'DSLR', 2),
(10, 'Mirrorless', 2),
(11, 'Action camera', 2),
(12, 'Security camera', 2),
(13, 'Smartphone', 3),
(14, 'Handset', 3),
(15, 'Tablets', 3),
(16, 'Hard Disk', 4),
(17, 'Solid state drive', 4),
(18, 'Pen Drive', 4),
(19, 'Memory Card', 4),
(20, 'Television', 5),
(21, 'Washing Machine', 5),
(22, 'Refrigerators', 5),
(23, 'Air Coditioner', 5),
(24, 'Microwaves and ovens', 5),
(25, 'Fresh Vegetables', 6),
(26, 'Fresh Fruits', 6),
(27, 'Herbs and Seasonings', 6),
(28, 'Flower and Bouquets,Bunches', 6),
(29, 'Atta, Flours and Sooji', 7),
(30, 'Rice and Rice Products', 7),
(31, 'Dals and Pulses', 7),
(32, 'Edible Oils and Ghee', 7),
(33, 'Dry Fruits', 7),
(34, 'Masalas and Spices', 7),
(35, 'Salt, Sugar and Jaggery', 7),
(36, 'Bakery Snacks ', 8),
(37, 'Breads and Buns', 8),
(38, 'Cakes and Pastries', 8),
(39, 'Cookies,Rusk and Khari', 8),
(40, 'Gourmet Breads', 8),
(41, 'Ice Creams and Desserts', 8),
(42, 'Adhesive tapes', 10),
(43, 'Cotton balls', 10),
(44, 'Bandages', 10),
(45, 'Syringes', 10),
(46, 'Scissors and tweezers', 10),
(47, 'surgical mask', 10),
(48, 'Antibiotic ointment', 10),
(49, 'Stretcher', 10),
(50, 'Wheelchair', 10),
(51, 'Crutch', 10),
(52, 'Aspirin', 11),
(53, 'Anti-diarrhe', 11),
(54, 'Antacids', 11),
(55, 'Laxative', 11),
(56, 'Cough and common cold medicines', 11),
(57, 'Acetaminophen', 11),
(58, 'Oxygen masks', 12),
(59, 'Thermometer', 12),
(60, 'Weighing Scale', 12),
(61, 'Blood Pressure Moninter', 12),
(62, 'Stethoscope', 12),
(63, 'Beds', 13),
(64, 'cabinets', 13),
(65, 'Office chairs', 13),
(66, 'Desks', 13),
(67, 'Sofas', 13),
(68, 'Bearu', 13),
(69, 'Water pumps', 14),
(70, 'Watering Hoses', 14),
(71, 'Sprinklers', 14),
(72, 'Hose Nozzles', 14),
(73, 'Trowels', 14),
(74, 'Scissors', 14),
(75, 'Garden forks', 14),
(76, 'Shovels', 14),
(77, 'Rakes', 14),
(78, 'Mowers', 14),
(79, 'Welding Machine', 15),
(80, 'Drilling Machine', 15),
(81, 'Angle Grinder', 15),
(82, 'Marble Cutter', 15),
(83, 'Soldering', 15),
(84, 'Multimeter', 15),
(85, 'Gloves', 16),
(86, 'Safety Shoes', 16),
(87, 'Bags', 17),
(88, 'Clipboard', 17),
(89, 'Pinnies', 17),
(90, 'Whistle', 17),
(91, 'Balls', 18),
(92, 'Bases', 18),
(93, 'Bats and Sticks', 18),
(94, 'Goals and Posts', 18),
(95, 'Racquets', 18),
(96, 'Nets', 18),
(97, 'Cleats', 19),
(98, 'Jerseys', 19),
(99, 'Sneakers', 19),
(100, 'Skates', 19),
(101, 'Uniforms', 19),
(102, 'Penatly Cards', 20),
(103, 'Uniform', 20),
(104, 'Whistle', 20),
(105, 'Cones', 21),
(106, 'Weightlifting Belts', 21),
(107, 'Weights', 21),
(108, 'Elbow Pads', 22),
(109, 'Gloves', 22),
(110, 'Sports Helmet', 22),
(111, 'Mouth Gaurds', 22),
(112, 'Shin Pads', 22),
(113, 'Ballpoint Pen', 23),
(114, 'Fountain Pen', 23),
(115, 'Pencils', 23),
(116, 'Roller Pen', 23),
(117, 'Highlighter Pen', 23),
(118, 'Markers', 23),
(119, 'Staplers', 24),
(120, 'Punching Machine', 24),
(121, 'Sticky Tapes', 24),
(122, 'Scissors', 24),
(123, 'Desk Tidy', 24),
(124, 'Note Holders', 24),
(125, 'Waste Buckets', 24),
(126, 'Glue Gun', 24),
(127, 'Calculator', 24),
(128, 'Ink Cartridges', 25),
(129, 'Printing Toners', 25),
(130, 'Printing Papers', 25),
(131, 'Card Holder', 26),
(132, 'Files', 27),
(133, 'Folders', 26),
(134, 'Letter Holders', 26),
(135, 'Document Holders', 26),
(136, 'Paper Trays', 26),
(137, 'Envelope', 26),
(138, 'NoteBooks', 27),
(139, 'Wirebound notebooks', 27),
(140, 'Writing pads', 27),
(141, 'Cars', 28),
(142, 'Buses', 28),
(143, 'Vehicle Lift', 31),
(144, 'Air Compressor', 31),
(145, 'jack stands', 31),
(146, 'Oil drain and oil caddy', 31),
(147, 'Battery charger and jumper', 31),
(148, 'Engine hoist', 31),
(149, 'Brake lathe', 31),
(150, 'Strut compressor', 31),
(151, 'Breaker bar', 32),
(152, 'Pliers', 32),
(153, 'Hammers (traditional and dead-blow)', 32),
(154, 'Impact wrench', 32),
(155, 'Oil filter wrench', 32),
(156, 'Pick set', 32),
(157, 'Pry bar', 32),
(158, 'Punches and chisels', 32),
(159, 'Ratchet and Socket Set', 32),
(160, 'Screwdriver Set', 32),
(161, 'Tire pressure gauge', 32),
(162, 'Torque wrench', 32),
(163, 'Fire extinguisher', 32),
(164, 'Flashlight', 32),
(165, 'Funnels', 32),
(166, 'Safety Glasses', 32),
(167, 'Mechanic’s Stethoscope', 32),
(168, 'Jumper Cables', 32),
(169, 'Sand', 33),
(170, 'Wood/Timber', 33),
(171, 'Rock', 33),
(172, 'Soil', 33),
(173, 'clay', 33),
(174, 'Cement', 34),
(175, 'Bricks', 34),
(176, 'Steel', 34),
(177, 'Tiles', 34),
(178, 'Ceramic', 34),
(179, 'Paints/Varnishes', 34),
(180, 'Glass', 34),
(181, 'Plastic', 34),
(182, 'Stone', 34),
(183, 'Lime', 34),
(184, 'Battery eliminator', 35),
(185, 'Various meters', 35),
(186, 'Lens', 35),
(187, 'Magnet', 35),
(188, 'Vernier caliper', 35),
(189, 'Test tube', 36),
(190, 'Beaker', 36),
(191, 'Flask', 36),
(192, 'Pipette', 36),
(193, 'Burette', 36),
(194, 'Bunsen burner', 37),
(195, 'Microscope', 37),
(196, 'Hot plate', 37),
(197, 'Magnetic stirrer', 37),
(198, 'Water bath', 37),
(199, 'Lab glasses', 38),
(200, 'Lab coats', 38),
(201, 'Nitrile gloves', 38),
(202, 'Eye wash', 38),
(203, 'Emergency shower', 38);

-- --------------------------------------------------------

--
-- Table structure for table `product`
--

CREATE TABLE `product` (
  `productId` int(11) NOT NULL,
  `vendor_ref_no` text NOT NULL,
  `product_name` varchar(255) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `type_category` varchar(100) NOT NULL,
  `item_no` varchar(100) NOT NULL,
  `Date_of_purchase` date DEFAULT NULL,
  `voucher_number` text NOT NULL,
  `po_number` text NOT NULL,
  `created_at` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `unit` varchar(20) DEFAULT NULL,
  `quantity` varchar(255) NOT NULL,
  `dummy_qty` int(11) DEFAULT NULL,
  `stock_in` int(11) NOT NULL,
  `stock_out` int(11) NOT NULL,
  `allocate_at` date DEFAULT NULL,
  `rate` varchar(255) NOT NULL,
  `total_price` int(11) NOT NULL,
  `active` int(11) NOT NULL DEFAULT 0,
  `status` varchar(20) NOT NULL DEFAULT '0' COMMENT 'status=''Allocate and status=''0'' not allocated\r\n',
  `asset_num` varchar(100) NOT NULL,
  `department_id` text NOT NULL,
  `product_collector_name` varchar(50) NOT NULL,
  `dep_room_no` text NOT NULL,
  `pro_unique` text NOT NULL,
  `dummy_number` text NOT NULL,
  `scrap_at` datetime NOT NULL,
  `scrap_status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `product`
--

INSERT INTO `product` (`productId`, `vendor_ref_no`, `product_name`, `category_name`, `type_category`, `item_no`, `Date_of_purchase`, `voucher_number`, `po_number`, `created_at`, `unit`, `quantity`, `dummy_qty`, `stock_in`, `stock_out`, `allocate_at`, `rate`, `total_price`, `active`, `status`, `asset_num`, `department_id`, `product_collector_name`, `dep_room_no`, `pro_unique`, `dummy_number`, `scrap_at`, `scrap_status`) VALUES
(1, 'cus-2', 'yu', 'Mobile and Electronics', 'Smartphone', 'ASSm_230001', '2023-09-07', 'GGF344TT', 'gry56', '2023-10-04 12:51:54', 'Box', '5', 0, 4, 1, '2025-09-23', '55', 275, 1, 'Allocated', 'ASSm_230001', '2', 'rajagopal', '2133', 'product-69', 'd', '2024-09-23 11:07:38', 2),
(2, 'cus-2', 'yu', 'Mobile and Electronics', 'Smartphone', 'ASSm_230002', '2023-09-07', 'GGF344TT', '', '2023-10-03 09:16:39', 'Box', '5', 0, 4, 1, '2025-09-23', '55', 275, 1, 'Allocated', 'ASSm_230002', '3', 'mahendranjj', '366', 'product-69', 'u', '2002-10-23 11:46:39', 2),
(3, 'cus-2', 'yu', 'Mobile and Electronics', 'Smartphone', 'ASSm_230003', '2023-09-07', 'GGF344TT', '', '2023-10-03 09:16:48', 'Box', '5', 0, 4, 1, '2025-09-23', '55', 275, 1, 'Allocated', 'ASSm_230003', '3', 'mahendranjj', '366', 'product-69', 'm', '2002-10-23 11:46:48', 2),
(4, 'cus-2', 'yu', 'Mobile and Electronics', 'Smartphone', 'ASSm_230004', '2023-09-07', 'GGF344TT', '', '2023-10-03 15:38:11', 'Box', '5', 0, 4, 1, '2025-09-23', '55', 275, 1, 'Allocated', 'ASSm_230004', '3', 'mahendranjj', '366', 'product-69', 'm', '2003-10-23 06:08:11', 2),
(5, 'cus-2', 'yu', 'Mobile and Electronics', 'Smartphone', 'ASSm_230005', '2023-09-07', 'GGF344TT', '', '2023-09-25 08:36:29', 'Box', '5', 0, 4, 1, '2025-09-23', '55', 275, 1, 'Allocated', 'ASSm_230005', '2', 'rajagopal', '2133', 'product-69', 'y', '0000-00-00 00:00:00', 0),
(6, 'cus-3', 'maruthi', 'Automotive', 'Cars', 'ASCa_230001', '2023-09-14', 'rreg554jhjg', '', '2023-09-25 08:33:46', 'Ton', '5', 1, 5, 0, NULL, '50,000', 250000, 1, '0', 'ASCa_230001', '', '', '', 'product-18', 'd', '0000-00-00 00:00:00', 0),
(7, 'cus-3', 'maruthi', 'Automotive', 'Cars', 'ASCa_230002', '2023-09-14', 'rreg554jhjg', '', '2023-09-25 08:33:46', 'Ton', '5', 1, 5, 0, NULL, '50,000', 250000, 1, '0', 'ASCa_230002', '', '', '', 'product-18', 'u', '0000-00-00 00:00:00', 0),
(8, 'cus-3', 'maruthi', 'Automotive', 'Cars', 'ASCa_230003', '2023-09-14', 'rreg554jhjg', '', '2023-09-25 08:33:46', 'Ton', '5', 1, 5, 0, NULL, '50,000', 250000, 1, '0', 'ASCa_230003', '', '', '', 'product-18', 'm', '0000-00-00 00:00:00', 0),
(9, 'cus-3', 'maruthi', 'Automotive', 'Cars', 'ASCa_230004', '2023-09-14', 'rreg554jhjg', '', '2023-09-25 08:33:46', 'Ton', '5', 1, 5, 0, NULL, '50,000', 250000, 1, '0', 'ASCa_230004', '', '', '', 'product-18', 'm', '0000-00-00 00:00:00', 0),
(10, 'cus-3', 'maruthi', 'Automotive', 'Cars', 'ASCa_230005', '2023-09-14', 'rreg554jhjg', '', '2023-09-25 08:33:46', 'Ton', '5', 1, 5, 0, NULL, '50,000', 250000, 1, '0', 'ASCa_230005', '', '', '', 'product-18', 'y', '0000-00-00 00:00:00', 0),
(11, 'cus-5', 'msand', 'Contruction Materials', 'Sand', 'ASSa_230001', '2023-10-03', 'GGF344TTw', '', '2023-10-03 15:18:15', 'Ton', '11', 1, 11, 0, NULL, '1,111', 12221, 1, '0', 'ASSa_230001', '', '', '', 'product-17', 'd', '0000-00-00 00:00:00', 0),
(12, 'cus-5', 'msand', 'Contruction Materials', 'Sand', 'ASSa_230002', '2023-10-03', 'GGF344TTw', '', '2023-10-03 15:18:15', 'Ton', '11', 1, 11, 0, NULL, '1,111', 12221, 1, '0', 'ASSa_230002', '', '', '', 'product-17', 'u', '0000-00-00 00:00:00', 0),
(13, 'cus-5', 'msand', 'Contruction Materials', 'Sand', 'ASSa_230003', '2023-10-03', 'GGF344TTw', '', '2023-10-03 15:18:15', 'Ton', '11', 1, 11, 0, NULL, '1,111', 12221, 1, '0', 'ASSa_230003', '', '', '', 'product-17', 'm', '0000-00-00 00:00:00', 0),
(14, 'cus-5', 'msand', 'Contruction Materials', 'Sand', 'ASSa_230004', '2023-10-03', 'GGF344TTw', '', '2023-10-03 15:18:15', 'Ton', '11', 1, 11, 0, NULL, '1,111', 12221, 1, '0', 'ASSa_230004', '', '', '', 'product-17', 'm', '0000-00-00 00:00:00', 0),
(15, 'cus-5', 'msand', 'Contruction Materials', 'Sand', 'ASSa_230005', '2023-10-03', 'GGF344TTw', '', '2023-10-03 15:18:15', 'Ton', '11', 1, 11, 0, NULL, '1,111', 12221, 1, '0', 'ASSa_230005', '', '', '', 'product-17', 'y', '0000-00-00 00:00:00', 0),
(16, 'cus-5', 'msand', 'Contruction Materials', 'Sand', 'ASSa_230006', '2023-10-03', 'GGF344TTw', '', '2023-10-03 15:18:15', 'Ton', '11', 1, 11, 0, NULL, '1,111', 12221, 1, '0', 'ASSa_230006', '', '', '', 'product-17', '_', '0000-00-00 00:00:00', 0),
(17, 'cus-5', 'msand', 'Contruction Materials', 'Sand', 'ASSa_230007', '2023-10-03', 'GGF344TTw', '', '2023-10-03 15:18:15', 'Ton', '11', 1, 11, 0, NULL, '1,111', 12221, 1, '0', 'ASSa_230007', '', '', '', 'product-17', 'r', '0000-00-00 00:00:00', 0),
(18, 'cus-5', 'msand', 'Contruction Materials', 'Sand', 'ASSa_230008', '2023-10-03', 'GGF344TTw', '', '2023-10-03 15:18:15', 'Ton', '11', 1, 11, 0, NULL, '1,111', 12221, 1, '0', 'ASSa_230008', '', '', '', 'product-17', 'e', '0000-00-00 00:00:00', 0),
(19, 'cus-5', 'msand', 'Contruction Materials', 'Sand', 'ASSa_230009', '2023-10-03', 'GGF344TTw', '', '2023-10-03 15:18:15', 'Ton', '11', 1, 11, 0, NULL, '1,111', 12221, 1, '0', 'ASSa_230009', '', '', '', 'product-17', 'f', '0000-00-00 00:00:00', 0),
(20, 'cus-5', 'msand', 'Contruction Materials', 'Sand', 'ASSa_230010', '2023-10-03', 'GGF344TTw', '', '2023-10-03 15:18:15', 'Ton', '11', 1, 11, 0, NULL, '1,111', 12221, 1, '0', 'ASSa_230010', '', '', '', 'product-17', '-', '0000-00-00 00:00:00', 0),
(21, 'cus-5', 'msand', 'Contruction Materials', 'Sand', 'ASSa_230011', '2023-10-03', 'GGF344TTw', '', '2023-10-03 15:18:15', 'Ton', '11', 1, 11, 0, NULL, '1,111', 12221, 1, '0', 'ASSa_230011', '', '', '', 'product-17', '4', '0000-00-00 00:00:00', 0),
(22, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230001', '2023-10-03', 'INV123456', '', '2023-10-03 15:34:56', 'pieces', '50', 0, 50, 0, '2003-10-23', '10,000', 500000, 1, 'Allocated', 'ASMo_230001', '2', 'rajagopal', '2133', 'product-83', 'd', '0000-00-00 00:00:00', 0),
(23, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230002', '2023-10-03', 'INV123456', '', '2023-10-03 15:34:56', 'pieces', '50', 0, 50, 0, '2003-10-23', '10,000', 500000, 1, 'Allocated', 'ASMo_230002', '2', 'rajagopal', '2133', 'product-83', 'u', '0000-00-00 00:00:00', 0),
(24, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230003', '2023-10-03', 'INV123456', '', '2023-10-03 15:34:56', 'pieces', '50', 0, 50, 0, '2003-10-23', '10,000', 500000, 1, 'Allocated', 'ASMo_230003', '2', 'rajagopal', '2133', 'product-83', 'm', '0000-00-00 00:00:00', 0),
(25, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230004', '2023-10-03', 'INV123456', '', '2023-10-03 15:34:56', 'pieces', '50', 0, 50, 0, '2003-10-23', '10,000', 500000, 1, 'Allocated', 'ASMo_230004', '2', 'rajagopal', '2133', 'product-83', 'm', '0000-00-00 00:00:00', 0),
(26, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230005', '2023-10-03', 'INV123456', '', '2023-10-03 15:34:56', 'pieces', '50', 0, 50, 0, '2003-10-23', '10,000', 500000, 1, 'Allocated', 'ASMo_230005', '2', 'rajagopal', '2133', 'product-83', 'y', '0000-00-00 00:00:00', 0),
(27, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230006', '2023-10-03', 'INV123456', '', '2023-10-03 15:34:56', 'pieces', '50', 0, 50, 0, '2003-10-23', '10,000', 500000, 1, 'Allocated', 'ASMo_230006', '2', 'rajagopal', '2133', 'product-83', '_', '0000-00-00 00:00:00', 0),
(28, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230007', '2023-10-03', 'INV123456', '', '2023-10-03 15:34:56', 'pieces', '50', 0, 50, 0, '2003-10-23', '10,000', 500000, 1, 'Allocated', 'ASMo_230007', '2', 'rajagopal', '2133', 'product-83', 'r', '0000-00-00 00:00:00', 0),
(29, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230008', '2023-10-03', 'INV123456', '', '2023-10-03 15:34:56', 'pieces', '50', 0, 50, 0, '2003-10-23', '10,000', 500000, 1, 'Allocated', 'ASMo_230008', '2', 'rajagopal', '2133', 'product-83', 'e', '0000-00-00 00:00:00', 0),
(30, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230009', '2023-10-03', 'INV123456', '', '2023-10-03 15:34:56', 'pieces', '50', 0, 50, 0, '2003-10-23', '10,000', 500000, 1, 'Allocated', 'ASMo_230009', '2', 'rajagopal', '2133', 'product-83', 'f', '0000-00-00 00:00:00', 0),
(31, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230010', '2023-10-03', 'INV123456', '', '2023-10-03 15:34:56', 'pieces', '50', 0, 50, 0, '2003-10-23', '10,000', 500000, 1, 'Allocated', 'ASMo_230010', '2', 'rajagopal', '2133', 'product-83', '-', '0000-00-00 00:00:00', 0),
(32, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230011', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230011', '', '', '', 'product-83', '1', '0000-00-00 00:00:00', 0),
(33, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230012', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230012', '', '', '', 'product-83', '3', '0000-00-00 00:00:00', 0),
(34, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230013', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230013', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(35, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230014', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230014', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(36, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230015', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230015', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(37, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230016', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230016', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(38, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230017', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230017', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(39, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230018', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230018', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(40, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230019', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230019', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(41, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230020', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230020', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(42, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230021', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230021', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(43, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230022', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230022', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(44, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230023', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230023', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(45, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230024', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230024', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(46, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230025', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230025', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(47, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230026', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230026', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(48, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230027', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230027', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(49, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230028', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230028', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(50, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230029', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230029', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(51, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230030', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230030', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(52, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230031', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230031', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(53, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230032', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230032', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(54, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230033', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230033', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(55, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230034', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230034', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(56, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230035', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230035', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(57, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230036', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230036', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(58, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230037', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230037', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(59, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230038', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230038', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(60, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230039', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230039', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(61, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230040', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230040', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(62, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230041', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230041', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(63, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230042', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230042', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(64, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230043', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230043', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(65, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230044', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230044', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(66, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230045', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230045', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(67, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230046', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230046', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(68, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230047', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230047', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(69, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230048', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230048', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(70, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230049', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230049', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(71, 'cus-6', 'HP', 'Mobile and Electronics', 'Moniter', 'ASMo_230050', '2023-10-03', 'INV123456', '', '2023-10-03 15:33:37', 'pieces', '50', 1, 50, 0, NULL, '10,000', 500000, 1, '0', 'ASMo_230050', '', '', '', 'product-83', '', '0000-00-00 00:00:00', 0),
(72, 'cus-5', 'suziki', 'Automotive', 'Cars', 'ASCa_230006', '2023-10-18', 'GGF344TT', 'vel53453', '2023-10-03 15:56:04', 'Dozens', '2', 1, 2, 0, NULL, '150,000', 300000, 1, '0', 'ASCa_230006', '', '', '', 'product-81', 'd', '0000-00-00 00:00:00', 0),
(73, 'cus-5', 'suziki', 'Automotive', 'Cars', 'ASCa_230007', '2023-10-18', 'GGF344TT', 'vel53453', '2023-10-03 15:56:04', 'Dozens', '2', 1, 2, 0, NULL, '150,000', 300000, 1, '0', 'ASCa_230007', '', '', '', 'product-81', 'u', '0000-00-00 00:00:00', 0);

-- --------------------------------------------------------

--
-- Table structure for table `purchase_report`
--

CREATE TABLE `purchase_report` (
  `id` int(11) NOT NULL,
  `vendor_refno` text NOT NULL,
  `company_name` text NOT NULL,
  `vendorname` text NOT NULL,
  `item_no` text NOT NULL,
  `voucherno` text NOT NULL,
  `category` text NOT NULL,
  `subcategory` text NOT NULL,
  `product_name` text NOT NULL,
  `unittype` text NOT NULL,
  `perunitcost` text NOT NULL,
  `quantity` text NOT NULL,
  `purchasedate` text NOT NULL,
  `totalprice` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `sub_categories`
--

CREATE TABLE `sub_categories` (
  `id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_categories` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `sub_categories`
--

INSERT INTO `sub_categories` (`id`, `category_id`, `sub_categories`) VALUES
(1, 1, 'Computer accessories'),
(2, 1, 'Cameras'),
(3, 1, 'Mobiles'),
(4, 1, 'Storage Devices'),
(5, 1, 'Tv appliances'),
(6, 2, 'Fruits and Vegetables'),
(7, 2, 'Food grains and oil masala'),
(8, 2, 'Bakery,Cakes and Dairy'),
(9, 2, 'Snacks'),
(10, 3, 'Emergengy Kits'),
(11, 3, 'Emergengy Medicine'),
(12, 3, 'Testing Kits'),
(13, 4, 'Furniture'),
(14, 4, 'Garden and Outdoors'),
(15, 4, 'Power Tools'),
(16, 4, 'Safety tools'),
(17, 5, 'Coaching Eqiupment'),
(18, 5, 'Gaming Eqiupment'),
(19, 5, 'Player Eqiupment'),
(20, 5, 'Referee Eqiupment'),
(21, 5, 'Training Eqiupment'),
(22, 5, 'Protective Eqiupment'),
(23, 6, 'Writing Stationery Accessories'),
(24, 6, 'Desktop Organizer'),
(25, 6, 'Consumable Stationery item'),
(26, 6, 'Filing & Storage Stationeryitem'),
(27, 6, 'Paper Stationery item'),
(28, 7, 'vehicles carrying passenger'),
(29, 7, 'vehicles carrying goods'),
(30, 7, 'Heavy vehicles'),
(31, 7, 'Repairing Eqiupment'),
(32, 7, 'Auto Mechanic’s Hand Tools'),
(33, 8, 'Natural Raw Materials'),
(34, 8, 'Industrial Raw Materials'),
(35, 9, 'Eqiupment'),
(36, 9, 'Glassware'),
(37, 9, 'Devices'),
(38, 9, 'Safety equipment'),
(39, 1, 'other'),
(40, 2, 'other'),
(41, 3, 'other'),
(42, 4, 'other'),
(43, 5, 'other'),
(44, 6, 'other'),
(45, 7, 'other'),
(46, 8, 'other'),
(47, 9, 'other');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `supplier_id` int(11) NOT NULL,
  `supplier_name` varchar(30) NOT NULL,
  `supplier_details` varchar(255) NOT NULL,
  `added_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`supplier_id`, `supplier_name`, `supplier_details`, `added_at`) VALUES
(1, 'Fozzby', '984 Woodstock Drive', '2019-04-12'),
(2, 'Redsupplies', '4407 Jerry Toth Drive', '2019-02-01'),
(3, 'MegaGoods Supplies', '1908 Leo Street', '2020-01-17'),
(4, 'Mooszer Electronics', '1491 Shinn Avenue', '2019-12-06'),
(5, 'AEC Components', '1743 Washburn Street', '2019-12-13'),
(6, 'MG Foods', '2617 Happy Hollow Road', '2019-10-18'),
(7, 'Vista Suppliers', '2820 Sunset Drive', '2019-02-07'),
(8, 'Edens Collection', '4407 Jerry Toth Drive', '2019-03-01'),
(9, 'USPharma', '2781 Leverton Cove Road', '2019-05-04'),
(10, 'efewfe', ' few', '2022-12-22');

-- --------------------------------------------------------

--
-- Table structure for table `tesuto_admin`
--

CREATE TABLE `tesuto_admin` (
  `id` int(50) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tesuto_admin`
--

INSERT INTO `tesuto_admin` (`id`, `username`, `password`) VALUES
(1, 'veltech', '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tesuto_answer`
--

CREATE TABLE `tesuto_answer` (
  `id` int(11) NOT NULL,
  `qid` text NOT NULL,
  `ansid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tesuto_answer`
--

INSERT INTO `tesuto_answer` (`id`, `qid`, `ansid`) VALUES
(1, 'qus_23001', '655877bed84d7'),
(2, 'qus_23002', '655877bedb4c5'),
(3, 'qus_23003', '655877bedf2a5'),
(4, 'qus_23004', '655877bee1c69'),
(5, 'qus_23005', '655877bee44f7'),
(6, 'qus_23006', '655877bee6e59'),
(7, 'qus_23007', '655877bee99d8'),
(8, 'qus_23008', '655877beec5e3'),
(9, 'qus_23009', '655877beeec31'),
(10, 'qus_23010', '655877bef18c9'),
(11, 'qus_23011', '6558783894a1b'),
(12, 'qus_23012', '6558783897236'),
(13, 'qus_23013', '655878389a2bd'),
(14, 'qus_23014', '655878389e83b'),
(15, 'qus_23015', '65587838a0e9f'),
(16, 'qus_23016', '65587838a367a'),
(17, 'qus_23017', '65587838a5be4'),
(18, 'qus_23018', '65587838a8296'),
(19, 'qus_23019', '65587838aa953'),
(20, 'qus_23020', '65587838acfcd'),
(21, 'qus_23021', '655878c1b4bb8'),
(22, 'qus_23022', '655878c1b7ac1'),
(23, 'qus_23023', '655878c1ba836'),
(24, 'qus_23024', '655878c1be372'),
(25, 'qus_23025', '655878c1c2e05'),
(26, 'qus_23026', '655878c1c5b5c'),
(27, 'qus_23027', '655878c1c8a0f'),
(28, 'qus_23028', '655878c1cb753'),
(29, 'qus_23029', '655878c1ce5a8'),
(30, 'qus_23030', '655878c1d1372'),
(31, 'qus_23031', '6558794426927'),
(32, 'qus_23032', '65587944292b9'),
(33, 'qus_23033', '655879442bcbe'),
(34, 'qus_23034', '655879442e44a'),
(35, 'qus_23035', '6558794431793'),
(36, 'qus_23036', '6558794435829'),
(37, 'qus_23037', '65587944380b2'),
(38, 'qus_23038', '655879443ad40'),
(39, 'qus_23039', '655879443da80'),
(40, 'qus_23040', '65587944403d0');

-- --------------------------------------------------------

--
-- Table structure for table `tesuto_exam_code`
--

CREATE TABLE `tesuto_exam_code` (
  `id` int(11) NOT NULL,
  `ex_code` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tesuto_exam_code`
--

INSERT INTO `tesuto_exam_code` (`id`, `ex_code`) VALUES
(1, 'VEL_CSC09');

-- --------------------------------------------------------

--
-- Table structure for table `tesuto_history`
--

CREATE TABLE `tesuto_history` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `eid` text NOT NULL,
  `score` int(11) NOT NULL,
  `level` int(11) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `timestamp` bigint(50) NOT NULL,
  `status` varchar(40) NOT NULL,
  `score_updated` varchar(40) NOT NULL,
  `status_cont` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tesuto_history`
--

INSERT INTO `tesuto_history` (`id`, `username`, `eid`, `score`, `level`, `correct`, `wrong`, `date`, `timestamp`, `status`, `score_updated`, `status_cont`) VALUES
(1, 'vtu001', 'Exam_230001', 0, 0, 0, 0, '2023-11-20 06:54:58', 1700463298, 'ongoing', 'false', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tesuto_options`
--

CREATE TABLE `tesuto_options` (
  `id` int(100) NOT NULL,
  `qid` varchar(100) NOT NULL,
  `option` text NOT NULL,
  `optionid` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tesuto_options`
--

INSERT INTO `tesuto_options` (`id`, `qid`, `option`, `optionid`) VALUES
(1, 'qus_23001', 'a', '655877bed84d7'),
(2, 'qus_23001', 'b', '655877bed84da'),
(3, 'qus_23001', 'c', '655877bed84db'),
(4, 'qus_23001', 'd', '655877bed84dc'),
(5, 'qus_23002', 'a', '655877bedb4c2'),
(6, 'qus_23002', 'b', '655877bedb4c5'),
(7, 'qus_23002', 'c', '655877bedb4c6'),
(8, 'qus_23002', 'd', '655877bedb4c7'),
(9, 'qus_23003', 'a', '655877bedf2a1'),
(10, 'qus_23003', 'b', '655877bedf2a4'),
(11, 'qus_23003', 'c', '655877bedf2a5'),
(12, 'qus_23003', 'd', '655877bedf2a6'),
(13, 'qus_23004', 'a', '655877bee1c63'),
(14, 'qus_23004', 'b', '655877bee1c67'),
(15, 'qus_23004', 'c', '655877bee1c68'),
(16, 'qus_23004', 'd', '655877bee1c69'),
(17, 'qus_23005', 'a', '655877bee44f2'),
(18, 'qus_23005', 'b', '655877bee44f5'),
(19, 'qus_23005', 'c', '655877bee44f6'),
(20, 'qus_23005', 'd', '655877bee44f7'),
(21, 'qus_23006', 'a', '655877bee6e55'),
(22, 'qus_23006', 'b', '655877bee6e58'),
(23, 'qus_23006', 'c', '655877bee6e59'),
(24, 'qus_23006', 'd', '655877bee6e5a'),
(25, 'qus_23007', 'a', '655877bee99d4'),
(26, 'qus_23007', 'b', '655877bee99d6'),
(27, 'qus_23007', 'c', '655877bee99d7'),
(28, 'qus_23007', 'd', '655877bee99d8'),
(29, 'qus_23008', 'a', '655877beec5e3'),
(30, 'qus_23008', 'b', '655877beec5e6'),
(31, 'qus_23008', 'c', '655877beec5e7'),
(32, 'qus_23008', 'd', '655877beec5e8'),
(33, 'qus_23009', 'a', '655877beeec31'),
(34, 'qus_23009', 'b', '655877beeec34'),
(35, 'qus_23009', 'c', '655877beeec35'),
(36, 'qus_23009', 'd', '655877beeec36'),
(37, 'qus_23010', 'a', '655877bef18c4'),
(38, 'qus_23010', 'b', '655877bef18c7'),
(39, 'qus_23010', 'c', '655877bef18c8'),
(40, 'qus_23010', 'd', '655877bef18c9'),
(41, 'qus_23011', 'a', '6558783894a17'),
(42, 'qus_23011', 'b', '6558783894a19'),
(43, 'qus_23011', 'c', '6558783894a1a'),
(44, 'qus_23011', 'd', '6558783894a1b'),
(45, 'qus_23012', 'a', '6558783897233'),
(46, 'qus_23012', 'b', '6558783897236'),
(47, 'qus_23012', 'c', '6558783897237'),
(48, 'qus_23012', 'd', '6558783897238'),
(49, 'qus_23013', 'a', '655878389a2bd'),
(50, 'qus_23013', 'b', '655878389a2c5'),
(51, 'qus_23013', 'c', '655878389a2c7'),
(52, 'qus_23013', 'd', '655878389a2c8'),
(53, 'qus_23014', 'a', '655878389e836'),
(54, 'qus_23014', 'b', '655878389e83a'),
(55, 'qus_23014', 'c', '655878389e83b'),
(56, 'qus_23014', 'd', '655878389e83c'),
(57, 'qus_23015', 'a', '65587838a0e9c'),
(58, 'qus_23015', 'b', '65587838a0e9d'),
(59, 'qus_23015', 'c', '65587838a0e9e'),
(60, 'qus_23015', 'd', '65587838a0e9f'),
(61, 'qus_23016', 'a', '65587838a3676'),
(62, 'qus_23016', 'b', '65587838a3679'),
(63, 'qus_23016', 'c', '65587838a367a'),
(64, 'qus_23016', 'd', '65587838a367b'),
(65, 'qus_23017', 'a', '65587838a5be0'),
(66, 'qus_23017', 'b', '65587838a5be3'),
(67, 'qus_23017', 'c', '65587838a5be4'),
(68, 'qus_23017', 'd', '65587838a5be5'),
(69, 'qus_23018', 'a', '65587838a8296'),
(70, 'qus_23018', 'b', '65587838a8298'),
(71, 'qus_23018', 'c', '65587838a8299'),
(72, 'qus_23018', 'd', '65587838a829a'),
(73, 'qus_23019', 'a', '65587838aa94e'),
(74, 'qus_23019', 'b', '65587838aa951'),
(75, 'qus_23019', 'c', '65587838aa952'),
(76, 'qus_23019', 'd', '65587838aa953'),
(77, 'qus_23020', 'a', '65587838acfca'),
(78, 'qus_23020', 'b', '65587838acfcd'),
(79, 'qus_23020', 'c', '65587838acfce'),
(80, 'qus_23020', 'd', '65587838acfcf'),
(81, 'qus_23021', 'a', '655878c1b4bb8'),
(82, 'qus_23021', 'b', '655878c1b4bba'),
(83, 'qus_23021', 'c', '655878c1b4bbb'),
(84, 'qus_23021', 'd', '655878c1b4bbc'),
(85, 'qus_23022', 'a', '655878c1b7abd'),
(86, 'qus_23022', 'b', '655878c1b7abf'),
(87, 'qus_23022', 'c', '655878c1b7ac0'),
(88, 'qus_23022', 'd', '655878c1b7ac1'),
(89, 'qus_23023', 'a', '655878c1ba832'),
(90, 'qus_23023', 'b', '655878c1ba835'),
(91, 'qus_23023', 'c', '655878c1ba836'),
(92, 'qus_23023', 'd', '655878c1ba837'),
(93, 'qus_23024', 'a', '655878c1be36f'),
(94, 'qus_23024', 'b', '655878c1be372'),
(95, 'qus_23024', 'c', '655878c1be373'),
(96, 'qus_23024', 'd', '655878c1be374'),
(97, 'qus_23025', 'a', '655878c1c2e01'),
(98, 'qus_23025', 'b', '655878c1c2e05'),
(99, 'qus_23025', 'c', '655878c1c2e06'),
(100, 'qus_23025', 'd', '655878c1c2e07'),
(101, 'qus_23026', 'a', '655878c1c5b58'),
(102, 'qus_23026', 'b', '655878c1c5b5b'),
(103, 'qus_23026', 'c', '655878c1c5b5c'),
(104, 'qus_23026', 'd', '655878c1c5b5d'),
(105, 'qus_23027', 'a', '655878c1c8a0b'),
(106, 'qus_23027', 'b', '655878c1c8a0e'),
(107, 'qus_23027', 'c', '655878c1c8a0f'),
(108, 'qus_23027', 'd', '655878c1c8a10'),
(109, 'qus_23028', 'a', '655878c1cb74e'),
(110, 'qus_23028', 'b', '655878c1cb751'),
(111, 'qus_23028', 'c', '655878c1cb752'),
(112, 'qus_23028', 'd', '655878c1cb753'),
(113, 'qus_23029', 'a', '655878c1ce5a4'),
(114, 'qus_23029', 'b', '655878c1ce5a6'),
(115, 'qus_23029', 'c', '655878c1ce5a7'),
(116, 'qus_23029', 'd', '655878c1ce5a8'),
(117, 'qus_23030', 'a', '655878c1d1372'),
(118, 'qus_23030', 'b', '655878c1d1375'),
(119, 'qus_23030', 'c', '655878c1d1376'),
(120, 'qus_23030', 'd', '655878c1d1377'),
(121, 'qus_23031', 'a', '6558794426923'),
(122, 'qus_23031', 'b', '6558794426925'),
(123, 'qus_23031', 'c', '6558794426926'),
(124, 'qus_23031', 'd', '6558794426927'),
(125, 'qus_23032', 'a', '65587944292b4'),
(126, 'qus_23032', 'b', '65587944292b7'),
(127, 'qus_23032', 'c', '65587944292b8'),
(128, 'qus_23032', 'd', '65587944292b9'),
(129, 'qus_23033', 'a', '655879442bcbe'),
(130, 'qus_23033', 'b', '655879442bcc8'),
(131, 'qus_23033', 'c', '655879442bcc9'),
(132, 'qus_23033', 'd', '655879442bccf'),
(133, 'qus_23034', 'a', '655879442e448'),
(134, 'qus_23034', 'b', '655879442e44a'),
(135, 'qus_23034', 'c', '655879442e44b'),
(136, 'qus_23034', 'd', '655879442e44c'),
(137, 'qus_23035', 'a', '6558794431790'),
(138, 'qus_23035', 'b', '6558794431792'),
(139, 'qus_23035', 'c', '6558794431793'),
(140, 'qus_23035', 'd', '6558794431794'),
(141, 'qus_23036', 'a', '6558794435824'),
(142, 'qus_23036', 'b', '6558794435827'),
(143, 'qus_23036', 'c', '6558794435828'),
(144, 'qus_23036', 'd', '6558794435829'),
(145, 'qus_23037', 'a', '65587944380ae'),
(146, 'qus_23037', 'b', '65587944380b1'),
(147, 'qus_23037', 'c', '65587944380b2'),
(148, 'qus_23037', 'd', '65587944380b3'),
(149, 'qus_23038', 'a', '655879443ad3c'),
(150, 'qus_23038', 'b', '655879443ad3f'),
(151, 'qus_23038', 'c', '655879443ad40'),
(152, 'qus_23038', 'd', '655879443ad41'),
(153, 'qus_23039', 'a', '655879443da80'),
(154, 'qus_23039', 'b', '655879443da83'),
(155, 'qus_23039', 'c', '655879443da84'),
(156, 'qus_23039', 'd', '655879443da85'),
(157, 'qus_23040', 'a', '65587944403cc'),
(158, 'qus_23040', 'b', '65587944403ce'),
(159, 'qus_23040', 'c', '65587944403cf'),
(160, 'qus_23040', 'd', '65587944403d0');

-- --------------------------------------------------------

--
-- Table structure for table `tesuto_questions`
--

CREATE TABLE `tesuto_questions` (
  `id` int(11) NOT NULL,
  `eid` text NOT NULL,
  `qid` text NOT NULL,
  `qns` text NOT NULL,
  `branch` text NOT NULL,
  `choice` int(20) NOT NULL,
  `sn` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tesuto_questions`
--

INSERT INTO `tesuto_questions` (`id`, `eid`, `qid`, `qns`, `branch`, `choice`, `sn`) VALUES
(1, 'Exam_230001', 'qus_23001', 'qs-1096935-Capture.JPG', 'CSE', 4, 1),
(2, 'Exam_230001', 'qus_23002', 'qs-429938-1q.JPG', 'CSE', 4, 2),
(3, 'Exam_230001', 'qus_23003', 'qs-1807841-2q.JPG', 'CSE', 4, 3),
(4, 'Exam_230001', 'qus_23004', 'qs-1081110-3q.JPG', 'CSE', 4, 4),
(5, 'Exam_230001', 'qus_23005', 'qs-1578934-4Q.JPG', 'CSE', 4, 5),
(6, 'Exam_230001', 'qus_23006', 'qs-1619195-5q.JPG', 'CSE', 4, 6),
(7, 'Exam_230001', 'qus_23007', 'qs-1889624-6q.JPG', 'CSE', 4, 7),
(8, 'Exam_230001', 'qus_23008', 'qs-1027264-7q.JPG', 'CSE', 4, 8),
(9, 'Exam_230001', 'qus_23009', 'qs-1098446-8q.JPG', 'CSE', 4, 9),
(10, 'Exam_230001', 'qus_23010', 'qs-1327375-9q.JPG', 'CSE', 4, 10),
(11, 'Exam_230002', 'qus_23011', 'qs-1197660-20q.JPG', 'IT', 4, 1),
(12, 'Exam_230002', 'qus_23012', 'qs-1878101-19q.JPG', 'IT', 4, 2),
(13, 'Exam_230002', 'qus_23013', 'qs-1353131-18q.JPG', 'IT', 4, 3),
(14, 'Exam_230002', 'qus_23014', 'qs-1343888-17q.JPG', 'IT', 4, 4),
(15, 'Exam_230002', 'qus_23015', 'qs-673016-16q.JPG', 'IT', 4, 5),
(16, 'Exam_230002', 'qus_23016', 'qs-1631773-15q.JPG', 'IT', 4, 6),
(17, 'Exam_230002', 'qus_23017', 'qs-585238-14q.JPG', 'IT', 4, 7),
(18, 'Exam_230002', 'qus_23018', 'qs-1008513-13q.JPG', 'IT', 4, 8),
(19, 'Exam_230002', 'qus_23019', 'qs-1163561-12q.JPG', 'IT', 4, 9),
(20, 'Exam_230002', 'qus_23020', 'qs-1287647-11q.JPG', 'IT', 4, 10),
(21, 'Exam_230003', 'qus_23021', 'qs-221159-12q.JPG', 'ECE', 4, 1),
(22, 'Exam_230003', 'qus_23022', 'qs-1322543-11q.JPG', 'ECE', 4, 2),
(23, 'Exam_230003', 'qus_23023', 'qs-642521-10q.JPG', 'ECE', 4, 3),
(24, 'Exam_230003', 'qus_23024', 'qs-1835739-7q.JPG', 'ECE', 4, 4),
(25, 'Exam_230003', 'qus_23025', 'qs-293055-5q.JPG', 'ECE', 4, 5),
(26, 'Exam_230003', 'qus_23026', 'qs-271877-4Q.JPG', 'ECE', 4, 6),
(27, 'Exam_230003', 'qus_23027', 'qs-896582-3q.JPG', 'ECE', 4, 7),
(28, 'Exam_230003', 'qus_23028', 'qs-1225448-2q.JPG', 'ECE', 4, 8),
(29, 'Exam_230003', 'qus_23029', 'qs-1977178-1q.JPG', 'ECE', 4, 9),
(30, 'Exam_230003', 'qus_23030', 'qs-205855-Capture.JPG', 'ECE', 4, 10),
(31, 'Exam_230004', 'qus_23031', 'qs-1785361-5q.JPG', 'EEE', 4, 1),
(32, 'Exam_230004', 'qus_23032', 'qs-1323201-7q.JPG', 'EEE', 4, 2),
(33, 'Exam_230004', 'qus_23033', 'qs-472988-6q.JPG', 'EEE', 4, 3),
(34, 'Exam_230004', 'qus_23034', 'qs-402314-4Q.JPG', 'EEE', 4, 4),
(35, 'Exam_230004', 'qus_23035', 'qs-1547221-3q.JPG', 'EEE', 4, 5),
(36, 'Exam_230004', 'qus_23036', 'qs-787358-Capture.JPG', 'EEE', 4, 6),
(37, 'Exam_230004', 'qus_23037', 'qs-208481-1q.JPG', 'EEE', 4, 7),
(38, 'Exam_230004', 'qus_23038', 'qs-634376-2q.JPG', 'EEE', 4, 8),
(39, 'Exam_230004', 'qus_23039', 'qs-257498-7q.JPG', 'EEE', 4, 9),
(40, 'Exam_230004', 'qus_23040', 'qs-912427-8q.JPG', 'EEE', 4, 10);

-- --------------------------------------------------------

--
-- Table structure for table `tesuto_quiz`
--

CREATE TABLE `tesuto_quiz` (
  `id` int(11) NOT NULL,
  `eid` text NOT NULL,
  `title` varchar(100) NOT NULL,
  `correct` int(11) NOT NULL,
  `wrong` int(11) NOT NULL,
  `total` int(11) NOT NULL,
  `time` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tesuto_quiz`
--

INSERT INTO `tesuto_quiz` (`id`, `eid`, `title`, `correct`, `wrong`, `total`, `time`, `date`, `status`) VALUES
(1, 'Exam_230001', 'CSE', 1, 1, 10, 5, '2023-11-20 06:44:15', 'enabled'),
(2, 'Exam_230002', 'IT', 1, 1, 10, 10, '2023-11-18 09:53:42', 'enabled'),
(3, 'Exam_230003', 'ECE', 1, 1, 10, 10, '2023-11-18 10:22:37', 'enabled'),
(4, 'Exam_230004', 'EEE', 1, 1, 10, 10, '0000-00-00 00:00:00', 'disabled'),
(5, 'Exam_230005', 'MECH', 1, 0, 5, 60, '0000-00-00 00:00:00', 'disabled');

-- --------------------------------------------------------

--
-- Table structure for table `tesuto_rank`
--

CREATE TABLE `tesuto_rank` (
  `id` int(100) NOT NULL,
  `username` varchar(50) NOT NULL,
  `score` int(11) NOT NULL,
  `time` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `tesuto_user`
--

CREATE TABLE `tesuto_user` (
  `id` int(100) NOT NULL,
  `name` varchar(100) NOT NULL,
  `rollno` varchar(20) NOT NULL,
  `branch` varchar(20) NOT NULL,
  `gender` varchar(5) NOT NULL,
  `username` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `phno` bigint(20) NOT NULL,
  `password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tesuto_user`
--

INSERT INTO `tesuto_user` (`id`, `name`, `rollno`, `branch`, `gender`, `username`, `phno`, `password`) VALUES
(1, 'jayakanthan', '', 'CSE', 'male', 'vtu001', 976657575, '1234'),
(2, 'durairaj', '', 'CSE', 'male', 'vtu002', 976657575, '1234'),
(3, 'Bala', '', 'ECE', 'male', 'vtu003', 976657575, '1234'),
(4, 'Pushpakumar', '', 'EEE', 'male', 'vtu004', 976657575, '1234');

-- --------------------------------------------------------

--
-- Table structure for table `tesuto_user_answer`
--

CREATE TABLE `tesuto_user_answer` (
  `id` int(100) NOT NULL,
  `qid` varchar(50) NOT NULL,
  `ans` varchar(50) NOT NULL,
  `correctans` varchar(50) NOT NULL,
  `eid` varchar(50) NOT NULL,
  `username` varchar(50) NOT NULL,
  `time_stamp` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

-- --------------------------------------------------------

--
-- Table structure for table `vendor`
--

CREATE TABLE `vendor` (
  `vendor_id` int(11) NOT NULL,
  `vendor_ref_no` text NOT NULL,
  `vendor_name` varchar(100) NOT NULL,
  `vendor_dop` date NOT NULL,
  `company_name` text NOT NULL,
  `vendor_address` varchar(100) NOT NULL,
  `vendor_city` varchar(100) NOT NULL,
  `vendor_state` varchar(100) NOT NULL,
  `vendor_phone` text NOT NULL,
  `vendor_gst` text NOT NULL,
  `added_at` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `vendor`
--

INSERT INTO `vendor` (`vendor_id`, `vendor_ref_no`, `vendor_name`, `vendor_dop`, `company_name`, `vendor_address`, `vendor_city`, `vendor_state`, `vendor_phone`, `vendor_gst`, `added_at`) VALUES
(1, 'cus-1', 'jayakanthan11', '2023-08-29', 'steels and pvt211', '3/317 duraisamy nagar kallavi post uthangarai talu', 'Krishnagiri', 'Tamil Nadu', '882581643311', '5645bbe111', '0000-00-00'),
(2, 'cus-2', 'janani', '2023-09-12', 'steels and pvg', '3/317 duraisamy nagar kallavi post uthangarai talu', 'Krishnagiri', 'Tamil Nadu', '8982552528', 'GJHG85', '0000-00-00'),
(3, 'cus-3', 'jayakanthan', '2023-08-30', 'steels and pvt2324', '3/317 duraisamy nagar kallavi post uthangarai talu', 'Krishnagiri', 'Tamil Nadu', '8825816545', 'GJHG85434', '2023-09-22'),
(4, 'cus-4', 'mani', '2023-09-07', 'fefe', '3/317 duraisamy nagar kallavi post uthangarai talu', 'Krishnagiri', 'Tamil Nadu', '8865655854', '5645bbe', '2023-09-25'),
(5, 'cus-5', 'Durai', '2023-10-03', 'digital;', '4-ee', 'chennai', 'Andhra Pradesh', '9940584717', 'dfdf4546', '2023-10-03'),
(6, 'cus-6', 'Naresh', '2023-10-03', 'naresh tec', 'avadi', 'chennai', 'Tamil Nadu', '8754416295', 'gstnaresh23', '2023-10-03'),
(7, 'cus-7', 'jk', '2023-10-10', 'steels and pvtttt', '3/317 duraisamy nagar kallavi post uthangarai talu', 'Krishnagiri', 'Tamil Nadu', '9879787897', 'dfs234776', '2023-10-05'),
(8, 'cus-8', 'edwin', '2023-10-26', 'steels and pvgedmim', '3/317 duraisamy nagar kallavi post uthangarai talu', 'Krishnagiri', 'Tamil Nadu', '5656464564', 'dfs234564543', '2023-10-05'),
(9, 'cus-9', 'gjhg', '2023-10-11', 'steels and pvg34tr', '3/317 duraisamy nagar kallavi post uthangarai talu', 'Krishnagiri', 'Tamil Nadu', '567675377', 'dfs234232352', '2023-10-05'),
(10, 'cus-10', 'jack', '2023-10-18', 'steels and pvtjack', '3/317 duraisamy nagar kallavi post uthangarai talu', 'Krishnagiri', 'Tamil Nadu', '0986564564', 'GJHG85345', '2023-10-05'),
(11, 'cus-10', 'efewf', '2023-10-10', 'steels and pvt363', '3/317 duraisamy nagar kallavi post uthangarai talu', 'Krishnagiri', 'Tamil Nadu', '7655465464', 'dfs23434535', '2023-10-05');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`categories_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `department`
--
ALTER TABLE `department`
  ADD PRIMARY KEY (`dept_id`),
  ADD KEY `dept_name_2` (`dept_named`),
  ADD KEY `dept_name_3` (`dept_named`),
  ADD KEY `dept_name` (`dept_named`) USING BTREE;
ALTER TABLE `department` ADD FULLTEXT KEY `dept_name_4` (`dept_named`);

--
-- Indexes for table `department_created`
--
ALTER TABLE `department_created`
  ADD PRIMARY KEY (`department_id`);

--
-- Indexes for table `parent_category`
--
ALTER TABLE `parent_category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product`
--
ALTER TABLE `product`
  ADD PRIMARY KEY (`productId`);

--
-- Indexes for table `purchase_report`
--
ALTER TABLE `purchase_report`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sub_categories`
--
ALTER TABLE `sub_categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`supplier_id`),
  ADD UNIQUE KEY `supplier_name` (`supplier_name`);

--
-- Indexes for table `tesuto_admin`
--
ALTER TABLE `tesuto_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tesuto_answer`
--
ALTER TABLE `tesuto_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tesuto_exam_code`
--
ALTER TABLE `tesuto_exam_code`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tesuto_history`
--
ALTER TABLE `tesuto_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tesuto_options`
--
ALTER TABLE `tesuto_options`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tesuto_questions`
--
ALTER TABLE `tesuto_questions`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tesuto_quiz`
--
ALTER TABLE `tesuto_quiz`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `tesuto_rank`
--
ALTER TABLE `tesuto_rank`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tesuto_user`
--
ALTER TABLE `tesuto_user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `tesuto_user_answer`
--
ALTER TABLE `tesuto_user_answer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vendor`
--
ALTER TABLE `vendor`
  ADD PRIMARY KEY (`vendor_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `categories_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `department`
--
ALTER TABLE `department`
  MODIFY `dept_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `department_created`
--
ALTER TABLE `department_created`
  MODIFY `department_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `parent_category`
--
ALTER TABLE `parent_category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `product`
--
ALTER TABLE `product`
  MODIFY `productId` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `purchase_report`
--
ALTER TABLE `purchase_report`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `sub_categories`
--
ALTER TABLE `sub_categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `supplier`
--
ALTER TABLE `supplier`
  MODIFY `supplier_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tesuto_admin`
--
ALTER TABLE `tesuto_admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tesuto_answer`
--
ALTER TABLE `tesuto_answer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tesuto_exam_code`
--
ALTER TABLE `tesuto_exam_code`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tesuto_history`
--
ALTER TABLE `tesuto_history`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tesuto_options`
--
ALTER TABLE `tesuto_options`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=161;

--
-- AUTO_INCREMENT for table `tesuto_questions`
--
ALTER TABLE `tesuto_questions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tesuto_quiz`
--
ALTER TABLE `tesuto_quiz`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tesuto_rank`
--
ALTER TABLE `tesuto_rank`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tesuto_user`
--
ALTER TABLE `tesuto_user`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tesuto_user_answer`
--
ALTER TABLE `tesuto_user_answer`
  MODIFY `id` int(100) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `vendor`
--
ALTER TABLE `vendor`
  MODIFY `vendor_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
