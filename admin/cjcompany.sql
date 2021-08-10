-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Aug 04, 2021 at 05:54 PM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cjcompany`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart_tbl`
--

CREATE TABLE `cart_tbl` (
  `id` int(10) NOT NULL,
  `product_id` varchar(10) NOT NULL,
  `qty` int(8) NOT NULL DEFAULT 1,
  `user_ip` varchar(2010) NOT NULL,
  `cart_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart_tbl`
--

INSERT INTO `cart_tbl` (`id`, `product_id`, `qty`, `user_ip`, `cart_date`) VALUES
(71, '22', 1, '192.168.43.109', '2021-07-06 14:21:03'),
(72, '19', 1, '192.168.43.109', '2021-07-06 14:23:06');

-- --------------------------------------------------------

--
-- Table structure for table `category_tbl`
--

CREATE TABLE `category_tbl` (
  `id` int(10) NOT NULL,
  `category` varchar(50) NOT NULL,
  `time_created` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `category_tbl`
--

INSERT INTO `category_tbl` (`id`, `category`, `time_created`) VALUES
(14, ' laptop', '2021-02-18 16:49:38.005895'),
(16, ' Bulbs', '2021-02-18 16:52:33.445625'),
(18, ' Generator', '2021-02-18 16:53:41.845243'),
(21, ' Fan', '2021-07-09 15:53:17.583036'),
(22, ' suckets', '2021-07-09 15:55:15.862387');

-- --------------------------------------------------------

--
-- Table structure for table `contact_tbl`
--

CREATE TABLE `contact_tbl` (
  `id` int(12) NOT NULL,
  `name` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `message` mediumtext NOT NULL,
  `status` varchar(10) NOT NULL DEFAULT 'unread',
  `contact_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `contact_tbl`
--

INSERT INTO `contact_tbl` (`id`, `name`, `email`, `message`, `status`, `contact_date`) VALUES
(1, 'ghg', 'k@yahoo.com', 'rdthe\nhet5h', 'unread', '2021-04-07 14:24:20.671265'),
(2, 'vivian', 'vivian@yahoo.com', 'gfiqweufgefiug', 'unread', '2021-04-22 11:58:30.692531'),
(3, 'ij', 'jcchi2004@yahoo.com', 'yfufuifgiougio', 'unread', '2021-06-06 22:10:34.434305'),
(4, 'skirto', 'dj@yah00.com', 'we here', 'unread', '2021-06-19 16:28:05.914775');

-- --------------------------------------------------------

--
-- Table structure for table `product_tbl`
--

CREATE TABLE `product_tbl` (
  `id` int(10) NOT NULL,
  `product` varchar(20) NOT NULL,
  `category` varchar(50) NOT NULL,
  `price` double NOT NULL,
  `image` varchar(1000) NOT NULL,
  `Description` varchar(1000) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `product_tbl`
--

INSERT INTO `product_tbl` (`id`, `product`, `category`, `price`, `image`, `Description`, `created_at`) VALUES
(4, '2500 kv yahama', ' Generator', 70000, 'index1613993476.jpg', 'Defend the poor and fatherless: do justice to the afflicted and needy. Deliver the poor and needy; rid them out of the hand of the wicked. They know not, neither will they understand’ they walk on in darkness; all the foundation of the earth are out of course. I have said, you are gods; and all of you are children of the Most High, but you shall die like men and fall like one of the princes.\r\nIf you’ve been walking with the Holy Ghost, you will agree with me that He often leads us by the word of God. This scripture was the confirmation of the instruction given to me by God through the ministry of the Holy Ghost.\r\n', '2021-03-18 17:25:59'),
(25, 'Lebekan white bulb', ' Bulbs', 500, 'wh1625845791.jpg', 'Maintenance is a continuous process to adapt through which system can change, regular debugging of the software to check for errors will ensure the program long life', '2021-07-09 15:49:51'),
(26, 'Gold bulb', ' Bulbs', 3000, 'b1625845956.jpg', '. Maintenance should be scheduled periodically so that the application will be able to meet up with possible up rising work challenges of the users. ', '2021-07-09 15:52:36'),
(27, 'Ceiling fan', ' Fan', 10000, 'f1625846061.webp', 'The program implementation includes all the activities that are carried out in order to put the program designed into a functional or practical state. All activities like programming, installation ', '2021-07-09 15:54:21'),
(28, 'Wall sucket', ' suckets', 800, 'suck1625846214.jpg', 'This web application may not run effectively if the minimum system specification is not met therefore, there is need to install a proper', '2021-07-09 15:56:54'),
(29, 'Extension', ' suckets', 2000, 'exte1625846363.jpg', 'In a Situation where the unit testing proves ineffective, the integrated testing maybe adopted for testing of different units of the program at the same time. ', '2021-07-09 15:59:23'),
(30, 'Big light', ' Bulbs', 150000, 'L1625846565.jpg', 'This is the process of examining a system to find out errors in the project work. Unit testing method is adopted in other to make it easier to gather reports from the test users.', '2021-07-09 16:02:45'),
(31, 'center Light', ' Bulbs', 20000, 'U1625846656.png', 'This is the process of examining a system to find out errors in the project work. Unit testing method is adopted in other to make it easier to gather reports from the test users.', '2021-07-09 16:04:16'),
(32, 'wall light', ' Bulbs', 15000, 'h1625846772.jpg', 'This is the process of examining a system to find out errors in the project work. Unit testing method is adopted in other to make it easier to gather reports from the test users.', '2021-07-09 16:06:12'),
(33, 'HP', ' laptop', 200000, 'lenovo-ideapad-320s-14ikb-14-laptop-grey1625846860.jpg', 'This is the process of examining a system to find out errors in the project work. Unit testing method is adopted in other to make it easier to gather reports from the test users.', '2021-07-09 16:07:40'),
(34, 'kL', ' Generator', 90000, 'Nl1625846950.jpg', 'This is the process of examining a system to find out errors in the project work. Unit testing method is adopted in other to ', '2021-07-09 16:09:10');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `sn` int(10) NOT NULL,
  `firstname` varchar(20) NOT NULL,
  `lastname` varchar(20) NOT NULL,
  `phone` varchar(15) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(35) NOT NULL,
  `image` varchar(1000) NOT NULL,
  `current_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`sn`, `firstname`, `lastname`, `phone`, `email`, `password`, `image`, `current_time`) VALUES
(1, 'joseph', 'endless', '08067134630', 'jcchi2004@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'IMG_20201104_202511_7261614639336.jpg', '2021-03-25 16:30:27.800402'),
(2, 'destiny', 'sir', '090123456789', 'destinyb@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'male21625826965.png', '2021-07-09 10:36:05.601298'),
(3, 'mrs nneka', 'amadi', '0903456456', 'nvivian43@gmail.com', 'e9510081ac30ffa83f10b68cde1cac07', 'attachment_111150259 copy1616258094.jpg', '2021-03-20 16:34:54.283788'),
(4, 'obiora', 'happiness', '08067134631', 'happiness@yahoo.com', '81dc9bdb52d04dc20036dbd8313ed055', 'img21627482505.jpg', '2021-07-28 14:28:25.080069');

-- --------------------------------------------------------

--
-- Table structure for table `viewer_tbl`
--

CREATE TABLE `viewer_tbl` (
  `id` int(20) NOT NULL,
  `user_ip` varchar(50) NOT NULL,
  `product_id` int(20) NOT NULL,
  `device` varchar(100) NOT NULL,
  `visited_date` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `viewer_tbl`
--

INSERT INTO `viewer_tbl` (`id`, `user_ip`, `product_id`, `device`, `visited_date`) VALUES
(1, '::1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0', '2021-03-29 11:06:13.488577'),
(2, '::1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0', '2021-03-29 11:07:19.845605'),
(3, '::1', 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0', '2021-03-29 11:39:48.132004'),
(4, '::1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0', '2021-03-29 13:05:42.359062'),
(5, '::1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0', '2021-03-30 10:46:01.433826'),
(6, '::1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:82.0) Gecko/20100101 Firefox/82.0', '2021-03-30 13:00:12.018440'),
(7, '127.0.0.1', 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-02 13:56:57.251810'),
(8, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-02 14:03:31.319888'),
(9, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-02 14:04:08.092713'),
(10, '127.0.0.1', 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-02 14:23:25.377006'),
(11, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-02 14:24:44.442770'),
(12, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-02 14:24:58.983155'),
(13, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-02 14:26:35.350512'),
(14, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-03 20:49:05.843700'),
(15, '127.0.0.1', 22, 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Vers', '2021-04-04 16:30:59.869126'),
(16, '127.0.0.1', 22, 'Mozilla/5.0 (iPhone; CPU iPhone OS 12_0 like Mac OS X) AppleWebKit/604.1.38 (KHTML, like Gecko) Vers', '2021-04-04 16:31:53.620276'),
(17, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-04 16:33:17.754906'),
(18, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-07 15:26:53.202107'),
(19, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-07 15:28:58.019974'),
(20, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-07 15:57:54.160745'),
(21, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-07 15:58:03.042331'),
(22, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-07 15:58:26.166360'),
(23, '127.0.0.1', 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-07 15:58:33.238147'),
(24, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-07 15:58:55.206703'),
(25, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-07 15:59:03.111828'),
(26, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 21:53:52.569820'),
(27, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 21:53:57.434835'),
(28, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 21:54:22.653314'),
(29, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 21:54:42.219323'),
(30, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 21:56:46.468582'),
(31, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:00:49.749083'),
(32, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:02:08.024866'),
(33, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:02:57.890370'),
(34, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:03:35.748589'),
(35, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:05:56.091292'),
(36, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:08:55.921090'),
(37, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:20:05.261671'),
(38, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:21:20.800280'),
(39, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:23:14.962067'),
(40, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:30:11.856027'),
(41, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:31:28.983490'),
(42, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:32:30.428948'),
(43, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:35:27.946070'),
(44, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:37:27.550427'),
(45, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:38:54.256260'),
(46, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:39:27.539831'),
(47, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:42:10.334412'),
(48, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:42:39.399249'),
(49, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:43:29.519172'),
(50, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:45:43.385850'),
(51, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:46:53.530995'),
(52, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:47:25.209820'),
(53, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:47:42.469719'),
(54, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:52:24.081118'),
(55, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:52:56.915101'),
(56, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:59:35.467765'),
(57, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 22:59:55.647395'),
(58, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:00:15.514240'),
(59, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:01:27.102193'),
(60, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:03:26.573238'),
(61, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:03:57.302666'),
(62, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:04:08.446010'),
(63, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:04:48.541082'),
(64, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:06:05.790695'),
(65, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:06:21.750229'),
(66, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:07:20.085155'),
(67, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:09:01.083969'),
(68, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:09:37.965169'),
(69, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:09:57.168688'),
(70, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:10:17.318249'),
(71, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:10:36.352323'),
(72, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:11:04.556088'),
(73, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:11:29.704202'),
(74, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:12:41.122025'),
(75, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:12:57.171436'),
(76, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:13:27.472739'),
(77, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:13:50.653388'),
(78, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:14:00.716601'),
(79, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:15:10.593179'),
(80, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:15:49.016083'),
(81, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:16:54.136208'),
(82, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:18:00.738682'),
(83, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:18:27.333680'),
(84, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-12 23:19:54.669521'),
(85, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-13 11:43:30.884913'),
(86, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-13 11:52:19.798437'),
(87, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 11:41:54.446658'),
(88, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 11:47:08.903547'),
(89, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 11:48:24.555436'),
(90, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 11:48:47.138920'),
(91, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 11:51:57.192900'),
(92, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 11:52:34.670569'),
(93, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 11:52:47.906373'),
(94, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 11:52:55.133872'),
(95, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 11:53:46.390249'),
(96, '127.0.0.1', 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 11:53:52.558926'),
(97, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 11:54:35.383086'),
(98, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 11:56:07.009601'),
(99, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 11:57:55.861173'),
(100, '127.0.0.1', 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 11:58:30.683338'),
(101, '127.0.0.1', 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 12:01:22.287775'),
(102, '127.0.0.1', 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 12:01:23.856198'),
(103, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 12:11:21.869893'),
(104, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 14:14:05.593999'),
(105, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 14:14:32.310274'),
(106, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-14 14:49:11.706073'),
(107, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 14:39:28.473909'),
(108, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 14:49:16.184200'),
(109, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 14:49:56.512855'),
(110, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 14:53:47.074304'),
(111, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 15:50:32.417311'),
(112, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 15:52:00.183891'),
(113, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 15:52:18.252321'),
(114, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 15:53:32.771041'),
(115, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 15:53:54.611162'),
(116, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 16:09:33.758970'),
(117, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 16:16:23.273696'),
(118, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 16:21:33.001528'),
(119, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 16:22:57.357650'),
(120, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 16:23:36.360055'),
(121, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 16:24:23.567603'),
(122, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 16:27:23.816142'),
(123, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 16:34:33.602191'),
(124, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-15 16:35:32.458498'),
(125, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-16 20:28:16.290191'),
(126, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-16 21:02:02.663309'),
(127, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-16 21:02:21.892271'),
(128, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-16 21:23:53.458225'),
(129, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-16 21:24:00.827242'),
(130, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-16 21:24:22.319930'),
(131, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-16 21:24:31.772816'),
(132, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-16 22:37:45.754177'),
(133, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-16 22:37:56.322938'),
(134, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-16 22:55:52.412711'),
(135, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:08:08.600808'),
(136, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:14:27.932717'),
(137, '127.0.0.1', 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:14:37.313684'),
(138, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:14:43.674368'),
(139, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:14:49.448564'),
(140, '127.0.0.1', 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:14:59.623514'),
(141, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:15:07.690488'),
(142, '127.0.0.1', 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:15:14.845721'),
(143, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:15:29.839571'),
(144, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:29:45.306387'),
(145, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:30:53.019658'),
(146, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:30:58.665094'),
(147, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:32:17.556199'),
(148, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:32:18.495064'),
(149, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:35:46.952849'),
(150, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:35:53.722613'),
(151, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:35:59.647230'),
(152, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:36:01.248452'),
(153, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:36:02.304871'),
(154, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:36:03.083349'),
(155, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:36:10.976222'),
(156, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:36:35.067898'),
(157, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:37:37.562522'),
(158, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:37:38.509991'),
(159, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:39:07.665529'),
(160, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:39:10.132294'),
(161, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:41:57.515434'),
(162, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:41:58.529954'),
(163, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:58:27.363380'),
(164, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:58:34.152872'),
(165, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:58:44.493225'),
(166, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 11:58:55.423118'),
(167, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:02:00.034570'),
(168, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:02:04.365092'),
(169, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:02:05.007231'),
(170, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:04:42.836510'),
(171, '127.0.0.1', 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:05:06.611337'),
(172, '127.0.0.1', 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:05:16.561680'),
(173, '127.0.0.1', 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:37:51.077005'),
(174, '127.0.0.1', 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:50:09.586263'),
(175, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:50:25.137486'),
(176, '127.0.0.1', 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:50:44.540191'),
(177, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:50:55.170036'),
(178, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:51:03.020846'),
(179, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:51:10.670342'),
(180, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:52:13.893673'),
(181, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:52:47.825328'),
(182, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:52:59.482740'),
(183, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:53:06.839806'),
(184, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:53:48.209553'),
(185, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-17 12:54:29.831394'),
(186, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 12:35:21.449341'),
(187, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 12:36:21.599915'),
(188, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 12:36:37.042001'),
(189, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 12:36:44.350871'),
(190, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 12:36:50.568572'),
(191, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 12:50:40.229714'),
(192, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 12:50:48.257006'),
(193, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 12:50:52.592637'),
(194, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 12:50:56.334191'),
(195, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 12:58:57.800830'),
(196, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 13:02:28.932122'),
(197, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 13:22:51.860076'),
(198, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 13:49:42.767588'),
(199, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 13:49:51.436360'),
(200, '127.0.0.1', 18, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 13:50:10.048587'),
(201, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 13:50:22.995720'),
(202, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 13:56:19.202468'),
(203, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 13:56:31.763878'),
(204, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 13:58:16.678786'),
(205, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 13:58:44.105205'),
(206, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 14:00:28.898964'),
(207, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 14:52:27.571512'),
(208, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 14:53:48.151550'),
(209, '127.0.0.1', 5, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-19 14:54:03.507019'),
(210, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-21 14:04:35.761481'),
(211, '127.0.0.1', 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-21 14:04:43.042255'),
(212, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-21 14:04:46.649710'),
(213, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-21 14:04:48.465413'),
(214, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-21 14:04:51.840304'),
(215, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-21 14:04:55.192212'),
(216, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-21 14:04:57.844732'),
(217, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-21 14:05:03.919366'),
(218, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-21 14:05:39.015805'),
(219, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-21 14:05:42.322972'),
(220, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:87.0) Gecko/20100101 Firefox/87.0', '2021-04-21 14:44:20.733853'),
(221, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-05-15 18:29:22.660225'),
(222, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-05-15 18:30:24.877716'),
(223, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-05-26 14:55:29.593900'),
(224, '127.0.0.1', 4, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-05-26 15:07:38.490219'),
(225, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-05-26 15:10:04.370803'),
(226, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-05-26 15:59:46.449077'),
(227, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-05-26 16:04:18.236941'),
(228, '127.0.0.1', 17, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-06-06 22:05:02.806767'),
(229, '127.0.0.1', 24, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-06-06 22:13:50.304337'),
(230, '127.0.0.1', 24, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-06-19 16:20:10.336101'),
(231, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-06-30 15:00:21.943561'),
(232, '127.0.0.1', 22, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-06-30 15:01:01.018620'),
(233, '127.0.0.1', 23, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-06-30 15:01:36.731074'),
(234, '192.168.43.109', 23, 'Mozilla/5.0 (Linux; Android 10; M2006C3MG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.1', '2021-07-06 14:20:34.158255'),
(235, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-06 14:20:48.766614'),
(236, '127.0.0.1', 19, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-06 14:21:22.895527'),
(237, '192.168.43.109', 24, 'Mozilla/5.0 (Linux; Android 10; M2006C3MG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.1', '2021-07-06 14:22:17.466291'),
(238, '192.168.43.109', 24, 'Mozilla/5.0 (Linux; Android 10; M2006C3MG) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/86.0.4240.1', '2021-07-06 14:22:41.809085'),
(239, '127.0.0.1', 25, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-09 15:50:17.995879'),
(240, '127.0.0.1', 25, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-09 15:57:00.523482'),
(241, '127.0.0.1', 34, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-12 14:21:45.972783'),
(242, '127.0.0.1', 34, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-12 14:22:07.821126'),
(243, '127.0.0.1', 34, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-12 14:25:10.984590'),
(244, '127.0.0.1', 34, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-12 14:25:18.054510'),
(245, '127.0.0.1', 34, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-12 14:26:48.326893'),
(246, '127.0.0.1', 34, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-12 14:26:49.306806'),
(247, '127.0.0.1', 34, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-12 14:27:14.692450'),
(248, '127.0.0.1', 30, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-12 15:14:31.371571'),
(249, '127.0.0.1', 26, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-12 15:16:18.677083'),
(250, '127.0.0.1', 26, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-12 15:19:57.597706'),
(251, '127.0.0.1', 29, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-12 15:32:18.248947'),
(252, '127.0.0.1', 29, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-12 15:32:24.994400'),
(253, '127.0.0.1', 33, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-13 09:10:50.230728'),
(254, '127.0.0.1', 32, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-13 09:23:47.381163'),
(255, '127.0.0.1', 33, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-13 09:36:13.665247'),
(256, '127.0.0.1', 31, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-13 11:48:58.005802'),
(257, '127.0.0.1', 34, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', '2021-07-16 17:55:05.256979'),
(258, '127.0.0.1', 34, 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', '2021-07-16 17:55:14.241681');

-- --------------------------------------------------------

--
-- Table structure for table `visitor_tbl`
--

CREATE TABLE `visitor_tbl` (
  `id` int(20) NOT NULL,
  `user_ip` varchar(100) NOT NULL,
  `device` varchar(100) DEFAULT NULL,
  `visited_time` timestamp(6) NOT NULL DEFAULT current_timestamp(6) ON UPDATE current_timestamp(6)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `visitor_tbl`
--

INSERT INTO `visitor_tbl` (`id`, `user_ip`, `device`, `visited_time`) VALUES
(129, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-14 18:07:13.693088'),
(130, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:88.0) Gecko/20100101 Firefox/88.0', '2021-07-15 07:33:55.134878'),
(131, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', '2021-07-16 17:54:40.903314'),
(132, '127.0.0.1', 'Mozilla/5.0 (Windows NT 10.0; Win64; x64; rv:89.0) Gecko/20100101 Firefox/89.0', '2021-08-01 20:16:34.518647');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category_tbl`
--
ALTER TABLE `category_tbl`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `category` (`category`);

--
-- Indexes for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `product_tbl`
--
ALTER TABLE `product_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`sn`);

--
-- Indexes for table `viewer_tbl`
--
ALTER TABLE `viewer_tbl`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `visitor_tbl`
--
ALTER TABLE `visitor_tbl`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart_tbl`
--
ALTER TABLE `cart_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- AUTO_INCREMENT for table `category_tbl`
--
ALTER TABLE `category_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `contact_tbl`
--
ALTER TABLE `contact_tbl`
  MODIFY `id` int(12) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `product_tbl`
--
ALTER TABLE `product_tbl`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `sn` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `viewer_tbl`
--
ALTER TABLE `viewer_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=259;

--
-- AUTO_INCREMENT for table `visitor_tbl`
--
ALTER TABLE `visitor_tbl`
  MODIFY `id` int(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=133;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
