-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 07, 2023 at 01:21 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `store`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `admin_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`admin_id`, `user_name`, `name`, `password`) VALUES
(1, 'admin', 'administrator', '$2y$10$l87QaHuH7TdIuYL6z7LhrezDET2QBymod9292NKBHNVSj6cFR8Iq6');

-- --------------------------------------------------------

--
-- Table structure for table `brand`
--

CREATE TABLE `brand` (
  `brand_id` int(11) NOT NULL,
  `brand_name` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `brand`
--

INSERT INTO `brand` (`brand_id`, `brand_name`) VALUES
(5, ' Fortune edited'),
(6, 'Ananda '),
(7, 'EMAMI 2'),
(8, ' Natureland Organics'),
(9, 'dabur '),
(10, ' Daawat');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `number` int(11) NOT NULL,
  `total_price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`id`, `user_id`, `item_id`, `price`, `number`, `total_price`) VALUES
(47, 8, 7, 495, 1, 495),
(48, 8, 9, 139, 1, 139),
(54, 6, 7, 495, 1, 495),
(55, 6, 9, 139, 1, 139);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `cat_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `image` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`cat_id`, `cat_name`, `image`) VALUES
(6, 'Ghee and Oil edited', 'gheeandoil.jpg'),
(7, 'atta and flours', 'atta.jpg'),
(8, 'grocery', 'grocery.jpg'),
(9, 'sports', 'sports.jpg'),
(11, 'masala and spices', 'masala.jpg'),
(12, 'dry fruits', 'dryf ruits.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `invoice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `amount` int(11) NOT NULL,
  `invoice_date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`invoice_id`, `user_id`, `amount`, `invoice_date`) VALUES
(12, 8, 645, '2023-02-04 15:58:14'),
(13, 8, 495, '2023-02-04 17:06:57'),
(14, 6, 495, '2023-02-04 17:13:28'),
(15, 8, 495, '2023-02-04 17:18:58'),
(16, 8, 495, '2023-02-06 16:23:01'),
(22, 6, 429, '2023-02-07 09:46:39'),
(23, 6, 2319, '2023-02-07 09:49:47'),
(24, 9, 3354, '2023-02-07 15:13:23');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `item_id` int(11) NOT NULL,
  `cat_name` varchar(50) NOT NULL,
  `brand_name` varchar(50) NOT NULL,
  `item_name` varchar(100) NOT NULL,
  `keyword` text NOT NULL,
  `price` int(11) NOT NULL,
  `stock` int(11) NOT NULL,
  `description` text NOT NULL,
  `container_type` varchar(50) NOT NULL,
  `quantity` varchar(50) NOT NULL,
  `Ingredients` varchar(255) NOT NULL,
  `maximum_shelf_life` varchar(50) NOT NULL,
  `source_type` varchar(50) NOT NULL,
  `organic` varchar(25) NOT NULL,
  `used_for` varchar(25) NOT NULL,
  `photo` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`item_id`, `cat_name`, `brand_name`, `item_name`, `keyword`, `price`, `stock`, `description`, `container_type`, `quantity`, `Ingredients`, `maximum_shelf_life`, `source_type`, `organic`, `used_for`, `photo`) VALUES
(7, 'Ghee and Oil', 'Ananda', 'Ananda Ghee 900 ml Tetrapack', ' ghee, desi ghee, ananda ghee, pure ghee', 495, 63, ' pure desi ghee', 'Tetrapack', '900 ml', 'NA', '9 months', 'Buffalo Milk', 'no', 'health additive', '-original-imagg2y3dcf9nfrk.jpg'),
(8, 'Ghee and Oil', 'EMAMI 2', 'EMAMI Healthy & Tasty Refined Rice Bran Oil Pouch  ', ' rice bran oil, healthy oil ', 150, 284, ' Healthy & Tasty Refined Rice Bran Oil ', 'pouch', '1 liter', 'NA', '1 year', 'rice bran', 'no', 'cooking food', '-original-imagg9yyvysnqs4b.jpg'),
(9, 'atta and flours', ' Natureland Organics', 'Natureland Organics Organic Wheat Flour  (3 kg)', ' atta, flour, organic atta, chakki atta', 139, 86, ' Natureland Organics atta', 'plastic bag', '3 kg', 'NA', '9 months', 'wheat', 'Yes', 'daily diet', '3-whole-wheat-flour-1-whole-wheat-flour.jpg'),
(10, 'atta and flours', ' Fortune', 'Fortune Chakki Fresh Atta  (10 kg)', ' atta, chakki atta, fresh atta, chakki fresh atta', 384, 391, ' Handpicked from the finest wheat fields across India, every golden amber grain of wheat used for Fortune chakki fresh atta goes through a traditional chakki process that retains all the goodness and natural taste while also giving you the nutritional benefits of dietary fibre. This natural process makes sure that your rotis stay soft and fluffy for long.', 'plastic bag', '10 kg', 'NA', '3 months', 'wheat', 'no', 'daily diet', 'chakki-fresh-atta-whole-wheat-flour.jpg'),
(11, 'atta and flours', ' Fortune', 'Fortune Besan  (1 kg)', 'besan, fresh besan ', 82, 152, ' Fortune Besan is hygienic made from 100% chana dal and passes through more than 25 quality checks and processed with advanced grinding technology which retains the flavors and aroma of natural chana dal. Highest grade of chana dal and only standardized colored chana dal passes through our advanced color sortex machine for grinding to give consistency in Fortune Besan leading to the finest taste of any recipe.', 'plastic', '1kg', 'NA', '5 months', 'gram', 'no', 'cooking food', 'besan-besan-fortune-original-imag4gb4hzv2qzvy.jpg'),
(12, 'grocery', ' Daawat f', 'Daawat Brown Basmati Rice  (5 kg)', ' rice, basmati, basbati chawal, chawal', 140, 295, ' Daawat Brown Basmati Rice  (5 kg)', 'plastic bag', '5kg', 'NA', '1 year', 'rice', 'no', 'cooking food', '5-brown-na-basmati-r.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `order_id` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `quantity` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `item_name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`order_id`, `invoice_id`, `user_id`, `item_id`, `quantity`, `price`, `item_name`) VALUES
(18, 12, 8, 7, 1, 495, 'Ananda Ghee 900 ml Tetrapack'),
(19, 12, 8, 8, 1, 150, 'EMAMI Healthy & Tasty Refined Rice Bran Oil Pouch  '),
(20, 13, 8, 7, 1, 495, 'Ananda Ghee 900 ml Tetrapack'),
(21, 14, 6, 7, 1, 495, 'Ananda Ghee 900 ml Tetrapack'),
(22, 15, 8, 7, 1, 495, 'Ananda Ghee 900 ml Tetrapack'),
(23, 16, 8, 7, 1, 495, 'Ananda Ghee 900 ml Tetrapack'),
(24, 22, 6, 9, 1, 139, 'Natureland Organics Organic Wheat Flour  (3 kg)'),
(25, 22, 6, 8, 1, 150, 'EMAMI Healthy & Tasty Refined Rice Bran Oil Pouch  '),
(26, 22, 6, 12, 1, 140, 'Daawat Brown Basmati Rice  (5 kg)'),
(27, 23, 6, 9, 6, 139, 'Natureland Organics Organic Wheat Flour  (3 kg)'),
(28, 23, 6, 7, 3, 495, 'Ananda Ghee 900 ml Tetrapack'),
(29, 24, 9, 10, 1, 384, 'Fortune Chakki Fresh Atta  (10 kg)'),
(30, 24, 9, 7, 6, 495, 'Ananda Ghee 900 ml Tetrapack');

-- --------------------------------------------------------

--
-- Table structure for table `review`
--

CREATE TABLE `review` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `user_name` varchar(100) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `time` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `review`
--

INSERT INTO `review` (`id`, `user_id`, `user_name`, `product_id`, `comment`, `time`) VALUES
(12, 8, 'user 1', 6, 'first comment', '2023-02-03 11:43:08'),
(13, 9, 'user 1', 6, 'second comment', '2023-02-03 11:44:07'),
(14, 10, 'user 1', 6, 'third comment', '2023-02-03 11:45:23'),
(15, 1, 'user 1', 6, 'comment by admin', '2023-02-03 11:47:02'),
(16, 10, 'user 1', 6, 'test message', '2023-02-03 11:51:28'),
(17, 9, 'user 2', 6, 'test again after update', '2023-02-03 12:10:35'),
(18, 9, 'user 2', 6, 'Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Pellentesque dignissim enim sit amet venenatis urna cursus eget. Donec pretium vulputate sapien nec sagittis aliquam malesuada. Duis ultricies lacus sed turpis tincidunt id. Et netus et malesuada fames. Facilisi cras fermentum odio eu. Dictum at tempor commodo ullamcorper a lacus vestibulum sed. Non quam lacus suspendisse faucibus interdum posuere lorem. Cursus sit amet dictum sit amet justo. Enim tortor at auctor urna nunc id cursus metus. Egestas sed sed risus pretium quam vulputate dignissim. Blandit libero volutpat sed cras. Diam maecenas ultricies mi eget mauris pharetra et ultrices. Potenti nullam ac tortor vitae purus faucibus ornare suspendisse. Sed viverra ipsum nunc aliquet bibendum enim facilisis gravida. Etiam sit amet nisl purus in mollis nunc sed id. Adipiscing commodo elit at imperdiet dui. Arcu bibendum at varius vel pharetra vel turpis nunc eget. Aliquam ut porttitor leo a diam sollicitudin tempor. Sed felis eget velit aliquet sagittis id consectetur.  Tellus cras adipiscing enim eu. Nunc eget lorem dolor sed viverra ipsum nunc aliquet bibendum. Sagittis eu volutpat odio facilisis. Malesuada proin libero nunc consequat interdum varius. At in tellus integer feugiat scelerisque varius. Tellus pellentesque eu tincidunt tortor aliquam nulla facilisi cras. Urna nunc id cursus metus aliquam. Turpis egestas maecenas pharetra convallis posuere morbi. Risus at ultrices mi tempus imperdiet. Non nisi est sit amet facilisis magna etiam tempor orci. Mattis nunc sed blandit libero volutpat sed cras ornare arcu. Consectetur purus ut faucibus pulvinar elementum integer enim. Enim sed faucibus turpis in eu mi bibendum neque egestas. Quam elementum pulvinar etiam non quam lacus suspendisse. Dignissim diam quis enim lobortis scelerisque fermentum dui faucibus.  Interdum posuere lorem ipsum dolor sit. Vitae sapien pellentesque habitant morbi tristique senectus et. Amet porttitor eget dolor morbi non arcu risus. Sit amet commodo nulla facilisi nullam vehicula ipsum a arcu. Dolor morbi non arcu risus quis varius quam quisque. Morbi leo urna molestie at elementum eu. A condimentum vitae sapien pellentesque. Suspendisse in est ante in. Morbi tristique senectus et netus et malesuada fames ac turpis. Duis ut diam quam nulla porttitor massa id neque aliquam. Maecenas accumsan lacus vel facilisis volutpat est velit. Massa enim nec dui nunc. Nullam vehicula ipsum a arcu cursus vitae. Turpis tincidunt id aliquet risus. Dui sapien eget mi proin sed libero enim. Dis parturient montes nascetur ridiculus mus mauris vitae ultricies leo. Scelerisque varius morbi enim nunc faucibus a pellentesque sit. At tellus at urna condimentum mattis pellentesque id nibh tortor.  Tortor at risus viverra adipiscing at in tellus. Vel pretium lectus quam id leo in vitae. Convallis a cras semper auctor neque vitae tempus. Sed euismod nisi porta lorem mollis aliquam. Proin libero nunc consequat interdum varius sit amet. Lacus suspendisse faucibus interdum posuere lorem ipsum dolor sit amet. Urna cursus eget nunc scelerisque viverra mauris in. Volutpat commodo sed egestas egestas fringilla phasellus faucibus scelerisque eleifend. Tincidunt eget nullam non nisi. Elit eget gravida cum sociis natoque. Pharetra magna ac placerat vestibulum lectus. Lacus laoreet non curabitur gravida arcu ac tortor dignissim. Nulla pharetra diam sit amet nisl. Pellentesque eu tincidunt tortor aliquam nulla facilisi cras fermentum odio.  Ornare arcu odio ut sem. Nec feugiat in fermentum posuere urna nec tincidunt praesent semper. Sit amet aliquam id diam maecenas ultricies mi eget mauris. Proin sagittis nisl rhoncus mattis rhoncus urna. Nunc sed augue lacus viverra vitae congue. Tempus urna et pharetra pharetra massa massa. Adipiscing bibendum est ultricies integer quis. Consequat semper viverra nam libero justo laoreet sit. Aenean euismod elementum nisi quis eleifend. Ornare lectus sit amet est placerat. Ut morbi tincidunt augue interdum. At augue eget arcu dictum varius duis at. In ornare quam viverra orci sagittis. Pretium lectus quam id leo in. Vel pharetra vel turpis nunc eget lorem dolor. Non blandit massa enim nec dui nunc mattis enim.', '2023-02-03 12:25:27'),
(19, 6, 'shubham', 7, 'test comment', '2023-02-03 14:56:13'),
(20, 1, 'administrator', 11, 'asddsa', '2023-02-04 17:59:15'),
(21, 1, 'administrator', 7, 'sdfdsdf', '2023-02-07 15:12:24');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `user_id` int(11) NOT NULL,
  `user_name` varchar(50) NOT NULL,
  `name` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `category` varchar(50) NOT NULL DEFAULT 'starter'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`user_id`, `user_name`, `name`, `password`, `category`) VALUES
(5, 'ssk', 'shubham', '$2y$10$2wHMvr3N1G8kaaSGbw9Kw.DV63/ULcmgOvmOmBu6NxBXvEhFOShK6', 'starter'),
(6, 'ssk1', 'shubham', '$2y$10$vwqj1Ef4fHmcAqxK8qL8DecCeuasbPJayFLR03GFQTEROxpJh7ckG', 'starter'),
(8, 'u1', 'user 1', '$2y$10$QWqJJDVMNbSv8lpFPBShXenFN3lS5rDIeMMGWn8dCnu.25IBxKgjG', 'starter'),
(9, 'u2', 'user 2', '$2y$10$1Ax2ajpVygnd60jk681Qsul9h7n2B9G0z68SzdgOKaQtnjkSywAeW', 'starter'),
(10, 'u3', 'user 3', '$2y$10$z0/dnREsVqbUCwuOS33qhOD/nL4oefK0pqg7xaRIk0t/eOHAoxkJW', 'starter');

-- --------------------------------------------------------

--
-- Table structure for table `wishlist`
--

CREATE TABLE `wishlist` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `item_id` int(11) NOT NULL,
  `price` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `wishlist`
--

INSERT INTO `wishlist` (`id`, `user_id`, `item_id`, `price`) VALUES
(8, 6, 11, 82),
(9, 10, 8, 150),
(11, 6, 7, 495);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `brand`
--
ALTER TABLE `brand`
  ADD PRIMARY KEY (`brand_id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`cat_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`invoice_id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`item_id`);
ALTER TABLE `item` ADD FULLTEXT KEY `cat_name` (`cat_name`,`keyword`,`item_name`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`order_id`);

--
-- Indexes for table `review`
--
ALTER TABLE `review`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `wishlist`
--
ALTER TABLE `wishlist`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `admin_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `brand`
--
ALTER TABLE `brand`
  MODIFY `brand_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=56;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `cat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `invoice_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `item_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `order_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `review`
--
ALTER TABLE `review`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `wishlist`
--
ALTER TABLE `wishlist`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
