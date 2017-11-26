-- phpMyAdmin SQL Dump
-- version 4.7.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 26, 2017 at 01:20 PM
-- Server version: 10.1.22-MariaDB
-- PHP Version: 7.1.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `bookstore`
--

-- --------------------------------------------------------

--
-- Table structure for table `customer_order`
--

CREATE TABLE `customer_order` (
  `id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `user_id` int(50) NOT NULL,
  `status` varchar(100) NOT NULL DEFAULT 'pending',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `complete_date` varchar(50) NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer_order`
--

INSERT INTO `customer_order` (`id`, `product_id`, `user_id`, `status`, `date`, `complete_date`, `is_deleted`) VALUES
(1, 11, 3, 'close', '2017-11-20 09:24:38', '2017-11-20 17:41:46', 0),
(2, 6, 3, 'pending', '2017-11-20 09:42:56', '', 1),
(3, 4, 3, 'pending', '2017-11-20 09:44:06', '', 1),
(4, 22, 3, 'pending', '2017-11-21 13:14:00', '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `message`
--

CREATE TABLE `message` (
  `id` int(11) NOT NULL,
  `customer_order_id` varchar(10) NOT NULL,
  `post_message` text NOT NULL,
  `role` varchar(50) NOT NULL,
  `post_date` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `full_name` varchar(100) NOT NULL,
  `is_deleted` int(1) NOT NULL,
  `is_readed` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `message`
--

INSERT INTO `message` (`id`, `customer_order_id`, `post_message`, `role`, `post_date`, `full_name`, `is_deleted`, `is_readed`) VALUES
(1, '1', 'hi', 'user', '2017-11-20 17:29:29', 'Cheam Hau Han', 0, 0),
(3, '1', 'hi', 'admin', '2017-11-20 17:40:27', 'admin admin', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `product_name` varchar(1000) NOT NULL,
  `image_name` varchar(1000) NOT NULL,
  `product_price` int(100) NOT NULL DEFAULT '0',
  `status` varchar(100) NOT NULL DEFAULT 'In Stock',
  `unit` int(100) NOT NULL DEFAULT '0',
  `author` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `is_deleted` int(1) NOT NULL DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `product_name`, `image_name`, `product_price`, `status`, `unit`, `author`, `description`, `is_deleted`) VALUES
(1, 'Harry Potter And The Sorceror Stone', '1.jpg', 2, 'out of stock', 0, 'J.K.Rowling', '', 0),
(2, 'Harry Potter And The Chamber Of Secret', '2.jpg', 1, 'out of stock', 0, 'J.K.Rowling', '', 0),
(3, 'Harry Potter And The Prisoner of Azkaban', '3.jpg', 20, 'In Stock', 20, 'J.K.Rowling', '', 0),
(4, 'Harry Potter And The Goblet Of FIre', '4.jpg', 20, 'In Stock', 20, 'J.K.Rowling', '', 0),
(5, 'Priestdaddy', '5.jpg', 1, 'In Stock', 20, 'Patricia Lockwood', '', 0),
(6, 'Harry Potter And The Order OF Phenix', '6.jpg', 20, 'In Stock', 20, 'J.K.Rowling', '', 0),
(7, 'The Lord Of The Ring The Fellowship Of The Ring', '7.jpg', 20, 'In Stock', 20, 'J.R.R. Tolkien', '', 0),
(8, 'The Lord Of The Ring The Two Tower', '8.jpg', 20, 'In Stock', 20, 'J.R.R. Tolkien', '', 0),
(9, 'The Lord Of The Ring The Return Of The King', '9.jpg', 20, 'In Stock', 20, 'J.R.R. Tolkien', '', 0),
(10, 'Chronicle Of Narnia The Lion,The Witch And The Wardrobe', '10.jpg', 30, 'In Stock', 20, 'kangknag', 'dsadsads', 1),
(11, 'Chronicle Of Narnia The Prince Caspian', '11.jpg', 2, 'In Stock', 17, 'C. S. Lewis', 'The first five books were originally published in the United Kingdom by Geoffrey Bles. The first edition of The Lion, the Witch and the Wardrobe was released in London on 16 October 1950. Although three more books, Prince Caspian, The Voyage of the Dawn Treader and The Horse and His Boy, were already complete, they were not released immediately at that time, but appeared ', 1),
(12, 'The Chronicles of Narnia The Voyage of the Dawn Treader', '12.png', 20, 'In Stock', 20, 'C. S. Lewis', '', 0),
(13, 'The Silver Chair', '13.jpg', 20, 'In Stock', 20, 'C. S. Lewis', '', 0),
(19, 'The Hunger Games', '19.jpg', 20, 'In Stock', 20, 'Suzanne Collins', 'The Hunger Games tells a story of', 0),
(20, 'The Hunger Games Catching Fire', '20.jpg', 20, 'In Stock', 20, 'Suzanne Collins', '', 0),
(21, 'The Hunger Games Mockingjay', '21.jpg', 20, 'In Stock', 20, 'Suzanne Collins', 'The Hunger Games Mockingjay tells a story of', 0),
(22, 'The Little Mermaid', '22.jpg', 20, 'In Stock', 19, 'unknwon', '', 0),
(23, 'red', '23.jpg', 20, 'In Stock', 20, 'C. S. Lewis', 'dsadasdsadsa', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL DEFAULT 'user',
  `email` varchar(50) NOT NULL,
  `first_name` varchar(50) NOT NULL,
  `last_name` varchar(50) NOT NULL,
  `pass` varchar(50) NOT NULL,
  `birthday` varchar(50) NOT NULL,
  `contact_number` varchar(20) NOT NULL,
  `address` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `role`, `email`, `first_name`, `last_name`, `pass`, `birthday`, `contact_number`, `address`) VALUES
(1, 'admin', 'admin@gmail.com', 'admin', 'admin', 'admin', '', '', ''),
(3, 'user', 'hauhan1993@gmail.com', 'Cheam', 'Hau Han', 'hanhan', '2017-11-01', '0122221111', 'kedah');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customer_order`
--
ALTER TABLE `customer_order`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `message`
--
ALTER TABLE `message`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
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
-- AUTO_INCREMENT for table `customer_order`
--
ALTER TABLE `customer_order`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `message`
--
ALTER TABLE `message`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
