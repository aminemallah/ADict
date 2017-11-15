-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2017 at 12:54 PM
-- Server version: 10.1.26-MariaDB
-- PHP Version: 7.1.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `offers_table`
--

-- --------------------------------------------------------

--
-- Table structure for table `posts`
--

CREATE TABLE `posts` (
  `id` varchar(255) NOT NULL,
  `url` varchar(255) NOT NULL,
  `restaurant_pic` varchar(255) NOT NULL,
  `restaurant_name` varchar(100) NOT NULL,
  `restaurant_insta` varchar(100) NOT NULL,
  `caption` varchar(255) NOT NULL,
  `img_start_date` varchar(255) NOT NULL,
  `img_end_date` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `posts`
--

INSERT INTO `posts` (`id`, `url`, `restaurant_pic`, `restaurant_name`, `restaurant_insta`, `caption`, `img_start_date`, `img_end_date`) VALUES
('1645001114460762979', 'https://instagram.fbey5-1.fna.fbcdn.net/t51.2885-15/s1080x1080/e35/23421987_146708712745931_5557888294651428864_n.jpg', 'https://instagram.fbey5-1.fna.fbcdn.net/t51.2885-19/s150x150/10894943_1621396888124583_1854566724_a.jpg', 'Lord of the Wings', 'lordofthewings_lb', 'Our Lunch offer is still going strong! One of our all-time favorite Veggie Flatbread is for $7! For more offers head to any of our branches! *valid on weekdays, holidays excluded', '1510319435', '1510924235'),
('1647361303570790799', 'https://instagram.fbey5-1.fna.fbcdn.net/t51.2885-15/e35/23421551_168165857113529_1228711652858265600_n.jpg', 'https://instagram.fbey5-1.fna.fbcdn.net/t51.2885-19/s150x150/18812108_499516727046340_4228706490472464384_a.jpg', 'Mr International', 'mr.international.lb', 'You know that the PartyPackage is made for wings lovers! - 50pcs wings, large wedges box, 3 soft drinks for 30$ - 100pcs wings, 2 large wedges box, 6 soft drinks for 55$ â˜Ž Horsh Tabet: 01-488381 Hamra: 01-344710', '1510600792', '1511205592'),
('1647773804669573717', 'https://instagram.fbey5-1.fna.fbcdn.net/t51.2885-15/e15/23507657_145627466070971_7557306505649717248_n.jpg', 'https://instagram.fbey5-1.fna.fbcdn.net/t51.2885-19/s150x150/14677339_527008447509463_8737624275197886464_a.jpg', 'Burger King Lebanon', 'bklebanon', 'A preview of what you could be enjoying right now! 1 Big King Beef + 1 Big King Chicken + 1 Fries + 1 Coke for LBP 10,000 only! For delivery call on 1525.', '1510649972', '1511254772'),
('1648465465774741272', 'https://instagram.fbey5-1.fna.fbcdn.net/t51.2885-15/e35/23507860_315156845633448_9212903943129006080_n.jpg', 'https://instagram.fbey5-1.fna.fbcdn.net/t51.2885-19/s150x150/22280949_143192173082702_9148572909357236224_n.jpg', 'SubwayLB', 'subwaylebanon', 'Choose any 2 from the following flavorful 6-inch subs with a drink for just LBP 10 000. Italian BMT Chicken Tikka Steak & Cheese Chicken Pizziola', '1510732418', '1511337218'),
('1648466321815726256', 'https://instagram.fbey5-1.fna.fbcdn.net/t51.2885-15/e35/23595037_546076249061193_1497750225345839104_n.jpg', 'https://instagram.fbey5-1.fna.fbcdn.net/t51.2885-19/s150x150/22802238_125227228167370_8033200199285342208_n.jpg', 'ADict', 'adictlb', 'Choose any 2 from the following flavorful 6-inch subs with a drink for just LBP 10 000. Italian BMT Chicken Tikka Steak & Cheese Chicken Pizziola', '1510732520', '1511337320'),
('1648549937237366800', 'https://instagram.fbey5-1.fna.fbcdn.net/t51.2885-15/e35/23498607_949955198494997_4492177947825799168_n.jpg', 'https://instagram.fbey5-1.fna.fbcdn.net/t51.2885-19/s150x150/19761632_140602543183761_2231299445155168256_a.jpg', 'PizzahutðŸ•', 'pizzahutlebanon', 'Wow offer too hard to resist , Ø¹Ø±Ø¶ ÙˆØ§ÙˆØ§ ÙØ±ØµØ© Ù„Ø§ØªÙÙˆØª Small 5000 / Medium 10000 / Large 15000 / and wow for XLarge 20000 !! Make your order online : Pizzahut-lb.com OR call 1212 / available in all branches and valid for dine-in, takeaway & ', '1510742488', '1511347288');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `posts`
--
ALTER TABLE `posts`
  ADD UNIQUE KEY `id` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
