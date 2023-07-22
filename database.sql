-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 22, 2023 at 06:22 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `be19_cr4_mehdisalimi_biglibrary`
--

-- --------------------------------------------------------

--
-- Table structure for table `media`
--

CREATE TABLE `media` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `image` varchar(250) NOT NULL,
  `ISBN_code` varchar(250) NOT NULL,
  `short_description` varchar(1000) NOT NULL,
  `type` enum('book','CD','DVD') DEFAULT 'book',
  `author_first_name` varchar(100) NOT NULL,
  `author_last_name` varchar(100) NOT NULL,
  `publisher_name` varchar(200) NOT NULL,
  `publisher_address` varchar(400) NOT NULL,
  `publish_date` date NOT NULL,
  `status` enum('available','reserved','suspend') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `image`, `ISBN_code`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status`) VALUES
(1, 'Pride & Prejudice', '64bbf24161d1f.jpg', '9789387779679', 'Pride and Prejudice is an \'1813\' novel of manners by Jane Austen The novel follows the character development of Elizabeth \'Bennet\', the protagonist of the book, who learns about the \'repercussions\' \\ of hasty judgments and comes to appreciate the difference between superficial goodness and actual goodness.\r\n\r\nMr Bennet, owner of the Longbourn estate in Hertfordshire, has five daughters, but his property is entailed and can only be passed to a male heir. His wife also lacks an inheritance, so his family faces becoming poor upon his death. Thus, it is imperative that at least one of the daughters marry well to support the others, which is a motivation that drives the plot.', 'book', 'Jane', 'Austen', 'Prakash Books India Pvt. Limited', 'New Delhi, Delhi, India · +91 11 2324 3051', '2018-04-24', 'available'),
(2, 'To Kill A Mockingbird', '64bbe4a87284c.jpg', '9781784752637', 'To Kill a Mockingbird is a novel by the American author Harper Lee. It was published in 1960 and was instantly successful. In the United States, it is widely read in high schools and middle schools. To Kill a Mockingbird has become a classic of modern American literature; a year after its release, it won the Pulitzer Prize. The plot and characters are loosely based on Lee\'s observations of her family, her neighbors and an event that occurred near her hometown of Monroeville, Alabama, in 1936, wh', 'book', 'Harper', 'Lee', 'Publisher 2', 'Publisher 2 Address', '2015-06-04', 'available'),
(3, 'The Book Thief', '64bbe59a3d803.jpg', '9780375842207, 0375842209', 'The Book Thief is a historical fiction novel by the Australian author Markus Zusak, set in Nazi Germany during World War II. Published in 2006, The Book Thief became an international bestseller and was translated into 63 languages and sold 17 million copies. It was adapted into the 2013 feature film, The Book Thief.\r\n\r\nThe novel follows the adventures of a young girl, Liesel Meminger. Narrated by Death, the novel presents the lives and viewpoints of the many victims of the ongoing war. Themes throughout the story include death, literature, and love.', 'CD', 'Markus', 'Zusak', 'Random House Children\'s Books', 'Penguin Random House Tower 1745 Bdwy Manhattan, New York, New York, 10019, United States', '2007-09-11', 'available'),
(4, 'The Picture of Dorian Gray', '64bbf34acd340.jpg', '7987978987987', 'The Picture of Dorian Gray is a philosophical novel by Irish writer Oscar Wilde. A shorter novella-length version was published in the July 1890 issue of the American periodical Lippincott\'s Monthly Magazine.The novel-length version was published in April 1891.\r\n\r\nThe story revolves around a portrait of Dorian Gray painted by Basil Hallward, a friend of Dorian\'s and an artist infatuated with Dorian\'s beauty. Through Basil, Dorian meets Lord Henry Wotton and is soon enthralled by the aristocrat\'s hedonistic worldview: that beauty and sensual fulfillment are the only things worth pursuing in life. Newly understanding that his beauty will fade, Dorian expresses the desire to sell his soul, to ensure that the picture, rather than he, will age and fade. The wish is granted, and Dorian pursues a libertine life of varied amoral experiences while staying young and beautiful; all the while, his portrait ages and visually records every one of Dorian\'s sins.', 'book', 'Oscar', 'Wilde', 'Publisher 3', 'Publisher 3 Address', '2022-05-28', 'reserved');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `media`
--
ALTER TABLE `media`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `media`
--
ALTER TABLE `media`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
