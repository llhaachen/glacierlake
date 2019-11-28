-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2019 at 08:34 PM
-- Server version: 10.1.39-MariaDB
-- PHP Version: 7.3.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `glacierlake`
--

-- --------------------------------------------------------

--
-- Table structure for table `bookings`
--

CREATE TABLE `bookings` (
  `id` int(11) NOT NULL,
  `destid` int(11) NOT NULL,
  `uid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `payment` smallint(2) NOT NULL DEFAULT '0',
  `days` int(11) NOT NULL,
  `cost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `bookings`
--

INSERT INTO `bookings` (`id`, `destid`, `uid`, `date`, `payment`, `days`, `cost`) VALUES
(2, 7, 8, '2019-05-26 11:22:25', 0, 16, 12000),
(5, 8, 6, '2019-05-26 13:48:54', 0, 20, 16000),
(6, 9, 2, '2019-05-26 14:24:52', 0, 16, 15000),
(7, 10, 2, '2019-05-26 14:25:01', 1, 3, 4000),
(8, 10, 4, '2019-05-26 14:26:12', 1, 5, 5000),
(9, 7, 4, '2019-05-26 14:26:29', 0, 12, 10000),
(10, 7, 9, '2019-05-27 09:44:37', 0, 16, 12000),
(11, 9, 4, '2019-05-28 10:35:58', 0, 16, 15000),
(12, 7, 10, '2019-05-31 18:01:16', 0, 16, 12000);

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `cid` int(11) NOT NULL,
  `destid` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `uid` varchar(11) COLLATE utf8mb4_unicode_ci NOT NULL,
  `date` datetime NOT NULL,
  `message` text COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`cid`, `destid`, `uid`, `date`, `message`) VALUES
(9, '6', '4', '2019-05-19 08:33:43', 'Amazing trek!'),
(10, '7', '4', '2019-05-19 08:36:22', 'Enjoyed the view.'),
(11, '8', '4', '2019-05-19 08:38:23', 'Definitely visit again.'),
(13, '6', '5', '2019-05-19 08:40:39', 'My first trek!. Experience beyond words.'),
(14, '7', '5', '2019-05-19 08:44:06', 'Recommended Trek.'),
(15, '8', '5', '2019-05-19 08:44:33', 'Adventure of a lifetime!'),
(16, '6', '6', '2019-05-19 08:45:51', 'A popular destination but nevertheless an amazing one.'),
(17, '7', '6', '2019-05-19 08:49:02', 'Scenic destination.'),
(18, '7', '10', '2019-05-31 18:02:08', 'Nice trek. Would like to visit again sometime');

-- --------------------------------------------------------

--
-- Table structure for table `destination`
--

CREATE TABLE `destination` (
  `destid` int(11) NOT NULL,
  `destname` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `cost` int(11) NOT NULL,
  `overview` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `days` int(11) NOT NULL,
  `descrip` text COLLATE utf8mb4_unicode_ci NOT NULL,
  `destimg` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `bdays` int(11) NOT NULL,
  `bcost` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `destination`
--

INSERT INTO `destination` (`destid`, `destname`, `cost`, `overview`, `days`, `descrip`, `destimg`, `bdays`, `bcost`) VALUES
(6, 'Annapurna Base Camp', 15000, 'Annapurna Base Camp Trek is a famous trek available for trekkers visiting Nepal. The trek takes tekkers along a number of mountain peaks belonging to the western area of the Great Annapurna Himalayas. These include Annapurna South, Hiunchuli, Annapurna, Fang, Annapurna 3, Gangapurna and Machhapuchhare, all of which remain arranged in a precise way within a circle of about 10 miles diameter with a deep mountain glacier covered amphitheater at its center.', 15, 'Day 01:Arrive at Kathmandu airport (1345meters). You will be met by our representative and transfer to hotel and a short brief about the trekking after refreshment.\r\n\r\nDay 02:Drive from Kathmandu to Pokhara.\r\n\r\nDay 03:One hour drive to Nayapul by private Car / Van, then trek to Tikhedhunga.\r\n\r\nDay 04:Trek to Ghorepani.\r\n\r\nDay 05:Hiking to Poonhill - back to Ghorepani, and trek to Tadapani.\r\n\r\nDay 06:Tadapani to Sinuwa [ Altitude 2340m]\r\n\r\nDay 07: Sinuwa to Deurali [ Altitude 3230m]\r\n\r\nDay 08:Deurali to Annapurna Base Camp [Altitude 4130m]\r\n\r\nDay 09:Base Camp to Bamboo [Altitude 2340m]\r\n\r\nDay 10: Bamboo to Jhinu [Altitude 1780m\r\n\r\nDay 11:Jhinu to Pokhara [3-4 hrs trek & 1 hr drive]\r\n\r\nDay 12:Drive or flight back to Kathmandu.\r\n\r\nDay 13:Transfer to international airport for your final flight departure.', 'destination934207.jpg', 12, 12000),
(7, 'Gokyo Trek', 12000, 'Located at the Lukla region Gokyo is best suited for spring/autumn treks. It is a 14 day trek with glimpses of Ngozumba glacier, Mount Everest, Chho-yo, TabucheCholatse, Makalu, Amadablam, Thamserku and many more.', 16, 'Day 01: Arrival in Kathmandu\r\n\r\nDay 02: Prepare for Trek\r\n\r\nDay03: Flight from Kathmandu to Lukla 35 min. Trek to Phakding (2610m) 4 hours\r\n\r\nDay 04: Trek to Namche Bazaar (3,440m) 5 hours\r\n\r\nDay 05: Rest day for Acclimatization at Namche Bazaar\r\n\r\nDay 06: Trek to Dole (4,110 m) 6/7 hours\r\n\r\nDay 07: Trek to Machhermo (4,470 m) 5/6 hours\r\n\r\nDay 08: Trek to Gokyo Lake (4,790 ) 5/6 hours\r\n\r\nDay 09: Early morning climb to Gokyo-Ri (5,357m) [View of Ngozumba glacier, Mount Everest, Chho-yo, TabucheCholatse, Makalu, Amadablam, Thamserku many etc] then trek down to Na Village. 6/7 hours\r\n\r\nDay 10: Trek back to Phortse (3,810 m)\r\n\r\nDay 11: Trek to Namche (3,440 m) 6/7 hours\r\n\r\nDay 12: Trek to Lukla (2,827m) 4/5 hours\r\n\r\nDay 13: Morning flight back to Kathmandu\r\n\r\nDay 14: Final Departure', 'destination542461.jpg', 12, 10000),
(8, 'Makalu Base Camp', 20000, 'Makalu base camp trekking route lies in the area of Makalu Barun Nation Park and Conservation Area in the eastern part of nepal. It is a long trek with the main focal pont being the Makalu Barun National partk itself', 25, 'Day 01: Arrival in Kathmandu-Transfer to Hotel\r\n\r\nDay 02:  Kathmandu Sightseeing and Trek Preparation            \r\n\r\nDay 03: Fly to Tumlingtar (518m), Trek to Khadbari (1025m)\r\n\r\nDay 04: Trek from Khadbari to Chichila (1,800m)            \r\n\r\nDay 05: Trek from Chichile to Num (1,500m)            \r\n\r\nDay 06: Trek Num to Seduwa (1,493m)            \r\n\r\nDay 07: Trek Seduwa to Tashi Gaun (2,200m)\r\n\r\nDay 08: Trek Tashi Gaun to Kahuma Danda (3,500m)            \r\n\r\nDay 09: Trek Kahuma Danda to Mumbuk (3,400m)             \r\n\r\nDay 10: Trek Mumbuk to Nehe Kharka (3,750m)            \r\n\r\nDay 11: Trek from Nehe Kharka to Sherson (4,600m)\r\n\r\nDay 12: Free day at Sherson for a day excursion\r\n\r\nDay 13: Trek Sherson to Yangri Kharka (3,645m)\r\n\r\nDay 14: Trek from Yangri Kharka to Mumbuk (3,400m)\r\n\r\nDay 15: Trek from Mumbuk to Kahuma Danda (3,500m)\r\n\r\nDay 16: Trek from Kahuma Danda to Navagaun (2,500m) via Tashi Gaun\r\n\r\nDay 17: Trek from Navagaun to Num via Seduwa\r\n\r\nDay 18: Trek from Num to Chichile (1,800m)\r\n\r\nDay 19: Trek from Chichile to Khadbari\r\n\r\nDay 20: Trek from Khadbari to Tumlingtar (400m)\r\n\r\nDay 21: Fly from Tumlingtar to Kathmandu\r\n\r\nDay 22: Rest and Farewell Dinner in Kathmandu\r\n\r\nDay 23: Final Departure to your port of Destination', 'destination803332.jpg', 20, 16000),
(9, 'Langtang Gosainkunda Trek', 18000, 'The Langtang Gosaikunda trek is a pristine trekking experience in the central Himalayan region of Nepal. This trek takes you to the magical trio of destinations that defines the culture, nature, and the lifestyle of these regions as a whole. This trail is recently growing its popularity as the best of the moderately difficult trekking routes in Nepal.', 20, 'Day 1: Arrival and transfer to hotel in Kathmandu (1300 m/4255 ft)\r\n\r\nDay 2: Trek preparation\r\n\r\nDay 3: Drive to Syabrubesi (1467 m/4812 ft)\r\n\r\nDay 4: Trek to Lama Hotel (2470 m/8103 ft)\r\n\r\nDay 5: Trek to Langtang Valley (3430 m/11253 ft)\r\n\r\nDay 6: Trek to KyanjinGompa (3860 m/12664 ft)\r\n\r\nDay 7: Excursion around TserkoRi and trek to Langtang Valley\r\n\r\nDay 8: Trek to Lama Hotel (2470 m/8103 ft)\r\n\r\nDay 9: Trek to ThuloSyabru (2260 m/7414 ft)\r\n\r\nDay 10: Trek to Sing Gompa or Chandanbar (3330 m/10925 ft)\r\n\r\nDay 11: Trek to Gosainkunda (4400 m/14435 ft)\r\n\r\nDay 12: Trek to Ghopte (3440 m/11286 ft)\r\n\r\nDay 13: Trek to Thadepati (3640 m/11942 ft)\r\n\r\nDay 14: Trek to GolphuBhanjyang (2140 m/7020 ft)\r\n\r\nDay 15: Trek to Patibhanjyang (1770 m/5807 ft)\r\n\r\nDay 16: Trek to Chisapani (2140 m/7020 ft) and drive to Kathmandu\r\n\r\nDay 17: Kathmandu Leisure\r\n\r\nDay 18: Final Departure', 'destination871745.jpg', 16, 15000),
(10, 'Ghandruk Trek', 5000, 'It is short but beautiful trek in the Annapurna region. It passes through lots of beautiful villages with the focal point being Ghandruk village itself.', 5, 'Day 1: Drive from Kathmandu to Pokhara (914m.) takes about six hours\r\n\r\nDay 2: Drive from Pokhara (915 m.) to Phedi (1130 m.) and trek from Phedi to Pothana takes about five hours.\r\n\r\nDay 3: Trek from Pothana to Ghandruk (1950 m.) takes about six hours. \r\n\r\nDay 4: Trek from Ghandruk to Nayapul via Birethanti takes about 5 hours.\r\n\r\nDay 5: Drive from Pokhara to Kathmandu by tourist mini bus', 'destination855746.jpg', 3, 4000);

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `gid` int(11) NOT NULL,
  `imgtitle` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `imgdesc` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `userid` int(11) NOT NULL,
  `imgfile` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`gid`, `imgtitle`, `imgdesc`, `userid`, `imgfile`) VALUES
(5, 'My trekking group', 'Line', 4, 'profile8141084.jpeg'),
(6, 'Temples and Monasteries', 'Traditional', 4, 'profile5349177.jpg'),
(7, 'Travel Diaries', 'Snap 1', 5, 'profile5953463.jpg'),
(8, 'Travel Diaries', 'Snap 2', 5, 'profile3158351.jpg'),
(9, 'Kathmandu', 'Capital city', 6, 'profile2765906.jpeg'),
(10, 'Himalayas', 'Breathtaking!', 6, 'profile9264016.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `id` int(6) NOT NULL,
  `txnid` varchar(20) NOT NULL,
  `payment_amount` decimal(7,2) NOT NULL,
  `payment_status` varchar(25) NOT NULL,
  `itemid` varchar(25) NOT NULL,
  `createdtime` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE `ratings` (
  `rid` int(11) NOT NULL,
  `dest` int(11) NOT NULL,
  `rating` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`rid`, `dest`, `rating`) VALUES
(1, 1, 4),
(2, 1, 4),
(3, 1, 4),
(4, 2, 5),
(5, 5, 4),
(6, 6, 4),
(7, 7, 5),
(8, 8, 3),
(9, 10, 4),
(10, 6, 4),
(11, 7, 4),
(12, 6, 5),
(13, 7, 4),
(14, 8, 4),
(15, 10, 5),
(16, 6, 4),
(17, 10, 4),
(18, 7, 4);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL,
  `profimg` varchar(128) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'userlog.png',
  `level` tinyint(2) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `email`, `password`, `profimg`, `level`) VALUES
(1, 'username11', 'user11@mail.com', 'password1', 'profile1.png', 2),
(2, 'username12', 'user12@mail.com', 'password1', 'profile2.png', 0),
(3, 'admin1', 'admin1@mail.com', 'password1', 'userlog.png', 1),
(4, 'rajesh93', 'rajesh@mail.com', 'password1', 'profile4.jpeg', 0),
(5, '07sulav', 'sulav@mail.com', 'password1', 'userlog.png', 0),
(6, 'avidtrekker', 'avid@mail.com', 'password1', 'userlog.png', 0),
(7, 'nepalikancha', 'kancha@mail.com', 'password1', 'userlog.png', 0),
(8, 'username14', 'user14@mail.com', 'password1', 'userlog.png', 0),
(9, 'raju123', 'raju123@gmail.com', 'password1', 'userlog.png', 0),
(10, 'username21', 'user21@gmail.com', 'password1', 'userlog.png', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bookings`
--
ALTER TABLE `bookings`
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`cid`);

--
-- Indexes for table `destination`
--
ALTER TABLE `destination`
  ADD PRIMARY KEY (`destid`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`gid`);

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`rid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bookings`
--
ALTER TABLE `bookings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `cid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `destination`
--
ALTER TABLE `destination`
  MODIFY `destid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `gid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `id` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `rid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
