-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 26, 2023 at 05:15 PM
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
  `author_last_name` varchar(100) DEFAULT NULL,
  `publisher_name` varchar(200) NOT NULL,
  `publisher_address` varchar(400) NOT NULL,
  `publish_date` date NOT NULL,
  `status` enum('available','reserved','suspend') DEFAULT 'available'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `media`
--

INSERT INTO `media` (`id`, `title`, `image`, `ISBN_code`, `short_description`, `type`, `author_first_name`, `author_last_name`, `publisher_name`, `publisher_address`, `publish_date`, `status`) VALUES
(1, 'Pride & Prejudice', '64bbf24161d1f.jpg', '9789387779679', 'Pride and Prejudice is an \'1813\' novel of manners by Jane Austen The novel follows the character development of Elizabeth \'Bennet\', the protagonist of the book, who learns about the \'repercussions\' \\ of hasty judgments and comes to appreciate the difference between superficial goodness and actual goodness.\r\n\r\nMr Bennet, owner of the Longbourn estate in Hertfordshire, has five daughters, but his property is entailed and can only be passed to a male heir. His wife also lacks an inheritance, so his family faces becoming poor upon his death. Thus, it is imperative that at least one of the daughters marry well to support the others, which is a motivation that drives the plot.', 'book', 'Jane', 'Austen', 'Publisher 1', 'Publisher 2 Address', '2018-04-24', 'available'),
(2, 'To Kill A Mockingbird', '64bbe4a87284c.jpg', '9781784752637', 'To Kill a Mockingbird is a novel by the American author Harper Lee. It was published in 1960 and was instantly successful. In the United States, it is widely read in high schools and middle schools. To Kill a Mockingbird has become a classic of modern American literature; a year after its release, it won the Pulitzer Prize. The plot and characters are loosely based on Lee\'s observations of her family, her neighbors and an event that occurred near her hometown of Monroeville, Alabama, in 1936, wh', 'book', 'Harper', 'Lee', 'Publisher 2', 'Publisher 2 Address', '2015-06-04', 'available'),
(3, 'The Book Thief', '64bbe59a3d803.jpg', '9780375842207, 0375842209', 'The Book Thief is a historical fiction novel by the Australian author Markus Zusak, set in Nazi Germany during World War II. Published in 2006, The Book Thief became an international bestseller and was translated into 63 languages and sold 17 million copies. It was adapted into the 2013 feature film, The Book Thief.\r\n\r\nThe novel follows the adventures of a young girl, Liesel Meminger. Narrated by Death, the novel presents the lives and viewpoints of the many victims of the ongoing war. Themes throughout the story include death, literature, and love.', 'CD', 'Markus', 'Zusak', 'Publisher 1', 'Publisher 1 Address', '2007-09-11', 'available'),
(5, 'The Odyssey', '64c0c85c96741.jpg', '9780141192444, 0141192445', 'Homer was an ancient Greek epic poet. The ancient Greeks generally believed that Homer was a historical individual, but some modern scholars are skeptical: no reliable biographical information has been handed down from classical antiquity. He is traditionally said to be the author of the epic poems The Iliad and The Odyssey. They are commonly dated to the late 9th or early 8th century BC, and many scholars believe The Iliad is the oldest extant work of literature in the ancient Greek language, making it the first work of European literature. It is an epic poem recounting significant events during a portion of the final year of the Trojan War. The Odyssey is, in part, a sequel, centring on the Greek hero Odysseus (or Ulysses, as he was known in Roman myths) and his long journey home following the fall of Troy.', 'book', 'Homer', '-', 'Publisher 4', 'Publisher 4 address', '2005-06-20', 'available'),
(6, 'The Penelopiad', '64c0ce7524546.jpg', '789798797', 'Class, Womanhood, and Violence. Atwood\'s account of the events of the Odyssey through Penelope and the Maids\' eyes focuses on the hardship and heartbreak of life as a woman in ancient Greece. Among these difficulties are the social and psychological pressures that women face.', 'DVD', 'Margaret', 'Atwood', 'Publisher 2', 'Publisher 2 Address', '2007-07-27', 'available'),
(7, 'Obsessed', '64c0e9b9ee551.jpg', '7987987987', 'Things couldn\'t be better for Derek Charles (Idris Elba). He\'s just received a big promotion at work, and has a wonderful marriage with his beautiful wife, Sharon (Beyoncé Knowles). However, into this idyllic world steps Lisa (Ali Larter), a temporary worker at Derek\'s office. Lisa begins to stalk Derek, jeopardizing all he holds dear.jj', 'DVD', 'Autrt', 'Banm', 'Publisher 3', 'Publisher 3 Address', '2007-09-11', 'available'),
(8, 'The Wager', '64c0eb7aa0949.jpg', '89080980', 'From the international bestselling author of KILLERS OF THE FLOWER MOON and THE LOST CITY OF Z, a mesmerising story of shipwreck, mutiny and murder, culminating in a court martial that reveals a shocking truth.\r\n \r\nOn 28th January 1742, a ramshackle vessel of patched-together wood and cloth washed up on the coast of Brazil. Inside were thirty emaciated men, barely alive, and they had an extraordinary tale to tell. They were survivors of His Majesty’s ship the Wager, a British vessel that had left England in 1740 on a secret mission during an imperial war with Spain. While chasing a Spanish treasure-filled galleon, the Wager was wrecked on a desolate island off the coast of Patagonia. The crew, marooned for months and facing starvation, built the flimsy craft and sailed for more than a hundred days, traversing 2,500 miles of storm-wracked seas. They were greeted as heroes.', 'book', 'kan', 'kolm', 'Publisher 3', 'Publisher 3 Address', '2008-08-04', 'available'),
(9, 'Happy Place', '64c0ee5a91324.jpg', '8098098098', 'Two exes. One pact.\r\nCould this holiday change everything?\r\n\r\nHarriet and Wyn are the perfect couple - they go together like bread and butter, gin and tonic, Blake Lively and Ryan Reynolds.\r\n\r\nEvery year, they take a holiday from their lives to drink far too much wine with their favourite people in the world.\r\n\r\nExcept this year, they are lying through their teeth, because Harriet and Wyn broke up six months ago. And they still haven\'t told anyone.\r\n\r\nBut the cottage is for sale so this is the last time they\'ll all be here together. They can\'t bear to break their best friends\' hearts so they\'ll fake it for one more week.\r\n\r\nBut how can you pretend to be in love - and get away with it - in front of the people who know you best?', 'book', 'hkjhkj', 'iuoiu', 'Publisher 2', 'Publisher 2 Addreess', '2000-06-26', 'available'),
(10, 'Unbroken Bonds of Battle', '64c0eebed2182.jpg', '346363646', 'INSTANT NEW YORK TIMES BESTSELLER!\r\n\r\nLife only really starts when we start serving others.\r\n\r\nFor many people, military service isn’t simply a job. It’s a ticket out of a lonely society and into a family of enduring bonds.\r\n\r\nIn over a decade of working with veterans, Johnny Joey Jones has discovered the power of battle-forged friendships. Suffering a life-changing injury while deployed in Afghanistan, he faced a daunting recovery. But coming home would have been much harder without the support of his brothers and sisters in arms.\r\n\r\nIn Unbroken Bonds of Battle, Joey tells the stories of those very warriors, who for years have supported and inspired him on the battlefield and off. Through unfiltered and authentic conversations with American heroes in every branch of service, Joey tackles the big questions about life, loss, and, of course, hunting.', 'DVD', 'uioui', 'oiuoi', 'Publisher 1', 'Publisher 1 Address', '2007-07-27', 'available'),
(11, 'Outlive', '64c0eee0adbbd.jpg', '989789797', '#1 NEW YORK TIMES BESTSELLER • A groundbreaking manifesto on living better and longer that challenges the conventional medical thinking on aging and reveals a new approach to preventing chronic disease and extending long-term health, from a visionary physician and leading longevity expert\r\n \r\n“One of the most important books you’ll ever read.”—Steven D. Levitt, New York Times bestselling author of Freakonomics\r\n \r\nWouldn’t you like to live longer? And better? In this operating manual for longevity, Dr. Peter Attia draws on the latest science to deliver innovative nutritional interventions, techniques for optimizing exercise and sleep, and tools for addressing emotional and mental health.', 'book', 'ipoipo', 'ipoipo', 'Publisher 4', 'Publisher 4 Address', '2022-05-28', 'available');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
