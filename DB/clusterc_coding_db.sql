-- phpMyAdmin SQL Dump
-- version 4.6.6
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Sep 26, 2017 at 01:30 AM
-- Server version: 10.0.32-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `clusterc_coding_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `dir_articles`
--

CREATE TABLE `dir_articles` (
  `article_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `article_name` varchar(250) NOT NULL,
  `article_details` text NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `total_views` int(11) NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_articles`
--

INSERT INTO `dir_articles` (`article_id`, `user_id`, `listing_id`, `article_name`, `article_details`, `image_path`, `total_views`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(5, 2, 8, 'WELCOME TO LEMIGO HOTEL', 'Set in an urban oasis within the city center/business district. This contemporary 4 * hotel is only 5km from the airport and provides your home away from home whilst in Kigali with free WiFi and complimentary airport shuttle. The Kigali Financial Centre, Rwanda Development Board (RDB), Parliament, International Conference center and the ministries are all close by. Whether you stay in one of our bright and airy classic rooms or one of our stunning suites you’ll enjoy the friendly Rwandan welcome in a safe and relaxing environment with an efficient service and modern technology to ensure you enjoy your stay. When there is time to relax guests can enjoy the Gym and large outdoor pool and in the rooms there are; tea/coffee facilities, cable TV on a 46” screen, laptop sized safe plus iron & ironing board. For a little extra, guests can choose the Executive Club Floor with private check-in/out, boardroom, and exclusive lounge with the balcony looking over the city serving complimentary evening canapés with selected wines and champagne in an exclusive “home away from home” atmosphere. The Lobby Lounge is the place to meet and talk business over coffee and Lemigo Restaurant offers International and Rwandan dishes after a drink in the sophisticated atmosphere of the one2one Bar. The conference center on the ground floor features the 736 sqm ballroom with 5 adjacent breakout rooms, business center and large pre-function ideal for conferences, cocktail parties and social events. Our dedicated conference team are on hand at every stage to ensure your events success', 'd18ac86387fcad84694e7dc4a09d401d.jpg', 45, 1, 0, '2017-07-29 15:48:17', '2017-09-24 18:49:33'),
(6, 2, 1, 'How to make a pizza:', 'How to make a pizza:\r\nStep 1: Place a pizza stone or an inverted baking sheet on the lowest oven rack and preheat to 500 degrees.\r\nStep 2: Stretch 1 pound dough on a floured pizza peel, large wooden cutting board or parchment paper.\r\nStep 3: Top as desired, then slide the pizza (with the parchment paper, if using) onto the stone or baking sheet. Bake until golden, about 15 minutes.\r\n\r\nPizza Dough\r\nWhisk 3 3/4 cups flour and 1 1/2 teaspoons salt. Make a well and add 1 1/3 cups warm water, 1 tablespoon sugar and 1 packet yeast. When foamy, mix in 3 tablespoons olive oil; knead until smooth, 5 minutes. Brush with olive oil, cover in a bowl and let rise until doubled, about 1 hour 30 minutes. Divide into two 1-pound balls. Use 1 pound per recipe unless noted.\r\n\r\nShort on time? Buy dough from a pizzeria.\r\n\r\n1. Margherita Stretch dough into two thin 9-inch rounds. Top each with 1/2 cup crushed San Marzano tomatoes, dried oregano, salt, pepper and olive oil; bake until golden. Sprinkle with1/2 pound diced mozzarella, torn basil and salt. Bake until the cheese melts, then drizzle with olive oil.\r\n\r\n2. Tomato Pie Make Margherita Pizzas (No. 1) without mozzarella or basil. Use extra oregano.\r\n\r\nKO_FN_01StaggionePizza1_017.tif\r\nKana Okada\r\n#3. Quattro Stagioli Pizza\r\n3. Quattro Stagioni Make Margherita Pizzas (No. 1); before adding cheese, top with olives, artichoke hearts, ham and sauteed mushrooms in 4 sections.\r\n\r\n4. Puttanesca Make Margherita Pizzas (No. 1); chop 1 garlic clove, 6 anchovies, 1 tablespoon capers,1/4 cup olives and some parsley and scatter over the tomatoes before baking.\r\n\r\n5. Roasted Pepper Make Margherita Pizzas (No. 1); add roasted pepper strips and red pepper flakes with the cheese.\r\n\r\n6. New York-Style Press dough into an oiled 15-inch pizza pan. Drizzle with olive oil, then top with 1/2 cup tomato sauce and 2 cups shredded mozzarella. Bake, then garnish with pecorino, dried oregano and olive oil.\r\n\r\n7. Pepperoni-Mushroom Make New York-Style Pizza (No. 6); top with sauteed mushrooms and sliced pepperoni before baking.\r\n\r\n8. Sausage-Broccoli Rabe Make New York-Style Pizza (No. 6) with only 1 1/2 cups mozzarella. Add 2 crumbled raw sausages. Bake until just crisp, then top with 4 ounces bocconcini, sauteed broccoli rabe and jarred cherry peppers. Bake until the cheese melts.\r\n\r\n9. Stuffed Crust Make New York-Style Pizza (No. 6), but before topping, place 8 string-cheese sticks along the edge and fold the dough over. Brush the stuffed crust with olive oil and sprinkle with dried oregano.', '2576d3774463dc52b82f03fbbd800d52.jpeg', 1, 1, 0, '2017-09-25 19:25:44', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dir_article_comments`
--

CREATE TABLE `dir_article_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_article_comments`
--

INSERT INTO `dir_article_comments` (`comment_id`, `user_id`, `article_id`, `comment`, `publication_status`, `deletion_status`, `date_added`) VALUES
(1, 2, 5, 'Article Comments', 1, 0, '2017-07-29 15:52:45');

-- --------------------------------------------------------

--
-- Table structure for table `dir_article_hearts`
--

CREATE TABLE `dir_article_hearts` (
  `heart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_article_hearts`
--

INSERT INTO `dir_article_hearts` (`heart_id`, `user_id`, `article_id`, `date_added`) VALUES
(1, 2, 5, '2017-07-29 15:52:52'),
(2, 28, 1, '2017-08-30 08:16:27');

-- --------------------------------------------------------

--
-- Table structure for table `dir_bookmarks`
--

CREATE TABLE `dir_bookmarks` (
  `bookmark_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_bookmarks`
--

INSERT INTO `dir_bookmarks` (`bookmark_id`, `user_id`, `listing_id`, `deletion_status`, `date_added`) VALUES
(10, 2, 1, 0, '2017-09-25 19:31:21');

-- --------------------------------------------------------

--
-- Table structure for table `dir_categories`
--

CREATE TABLE `dir_categories` (
  `category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `color_name` varchar(50) NOT NULL,
  `icon_name` varchar(50) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_categories`
--

INSERT INTO `dir_categories` (`category_id`, `user_id`, `category_name`, `description`, `color_name`, `icon_name`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 'Cinemas', 'Details of Cinemas...', 'bggreen-2', 'ticket', 1, 0, '2017-04-25 11:41:52', '2017-09-24 17:25:27'),
(2, 1, 'Restaurants', 'Details about restaurants...', 'bgred-1', 'cutlery', 1, 0, '2017-04-25 22:49:35', '2017-09-24 17:10:23'),
(3, 1, 'Hospital', 'Details about hospital...', 'bgpurpal-1', 'hospital-o', 1, 0, '2017-04-25 22:50:42', '2017-09-24 17:25:35'),
(4, 1, 'School', 'Details..........', 'bgblue-1', 'university', 1, 0, '2017-06-05 02:27:32', NULL),
(5, 1, 'Shops', 'Details.............', 'bggreen-2', 'cart-arrow-down', 1, 0, '2017-06-06 01:05:10', '2017-09-24 17:15:20'),
(6, 1, 'Offices', 'Details about briefcase  ...', 'bgorange-1', 'briefcase', 1, 0, '2017-08-10 21:48:46', '2017-09-24 17:26:25'),
(7, 1, 'Salons', 'salons makeup bridal', 'bgbrown-1', 'cut', 1, 0, '2017-08-13 20:45:20', '2017-09-24 17:26:40'),
(8, 1, 'Insurance', 'Deneme açıkmala', 'bgorange-1', 'bug', 1, 0, '2017-08-22 21:47:26', '2017-09-24 17:25:56'),
(9, 1, 'Libraries', 'Details of book...', 'bgblue-1', 'book', 1, 0, '2017-09-24 17:18:33', '2017-09-24 17:26:16'),
(10, 1, 'Books', 'Detils...', 'bgbrown-1', 'book', 1, 1, '2017-09-24 17:19:31', NULL),
(11, 1, 'Hotel', 'Details of hotels...', 'bgyallow-1', 'hotel', 1, 0, '2017-09-24 17:21:04', '2017-09-24 17:25:46'),
(12, 1, 'Airport', 'Details...', 'bgred-1', 'plane', 1, 0, '2017-09-24 17:22:20', '2017-09-24 17:26:06'),
(13, 1, 'Cafe', 'Details....', 'bgbrown-1', 'coffee', 1, 0, '2017-09-24 17:24:33', '2017-09-24 17:25:19');

-- --------------------------------------------------------

--
-- Table structure for table `dir_cities`
--

CREATE TABLE `dir_cities` (
  `city_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `city_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_cities`
--

INSERT INTO `dir_cities` (`city_id`, `user_id`, `country_id`, `city_name`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 1, 'Dhaka', 'Details.............', 1, 0, '2017-04-26 01:18:08', '2017-08-11 18:33:45'),
(2, 1, 1, 'Rangpur', 'Details............', 1, 0, '2017-04-27 01:05:23', '2017-04-27 01:06:33'),
(3, 1, 1, 'Khulna', 'Details............', 1, 0, '2017-04-27 01:05:44', '2017-08-29 00:17:00'),
(4, 1, 1, 'Rajshahi', 'Details............', 1, 0, '2017-04-27 01:06:04', '2017-04-27 01:07:30'),
(5, 1, 2, 'New York', 'Details........', 1, 0, '2017-04-27 01:08:38', NULL),
(6, 1, 12, 'Kigali', 'Details...', 1, 0, '2017-09-24 17:56:30', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dir_countries`
--

CREATE TABLE `dir_countries` (
  `country_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_countries`
--

INSERT INTO `dir_countries` (`country_id`, `user_id`, `country_name`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 'Bangladesh', 'Details.....', 1, 0, '2017-04-26 00:38:01', '2017-04-26 00:38:17'),
(2, 1, 'USA', 'Details..........', 1, 0, '2017-04-27 01:07:56', NULL),
(3, 1, 'INDIA', 'India', 1, 0, '2017-09-17 17:31:55', '2017-09-17 17:32:17'),
(4, 1, 'Turkey', 'Details...', 1, 0, '2017-09-24 17:40:45', NULL),
(5, 1, 'Germany', 'Details...', 1, 0, '2017-09-24 17:41:01', NULL),
(6, 1, 'Thailand', 'Details', 1, 0, '2017-09-24 17:41:29', NULL),
(7, 1, 'Pakisthan', 'Details...', 1, 0, '2017-09-24 17:42:07', NULL),
(8, 1, 'UK', 'Details', 1, 0, '2017-09-24 17:42:34', NULL),
(9, 1, 'Taiwan', 'Details', 1, 0, '2017-09-24 17:42:54', NULL),
(10, 1, 'Ukrain', 'Details...', 1, 0, '2017-09-24 17:43:21', NULL),
(11, 1, 'Brazil', 'Details...', 1, 0, '2017-09-24 17:44:42', NULL),
(12, 1, 'Rwanda', 'Details...', 1, 0, '2017-09-24 17:53:35', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dir_images`
--

CREATE TABLE `dir_images` (
  `image_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `caption` varchar(250) NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `total_views` int(11) NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_images`
--

INSERT INTO `dir_images` (`image_id`, `user_id`, `listing_id`, `caption`, `image_path`, `total_views`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 2, 8, 'Rooms and Suites', '2db783d90f6f95f334d82159c92ebcc9.jpg', 31, 1, 0, '2017-05-05 16:25:08', '2017-09-24 18:29:22'),
(2, 2, 8, 'LEMIGO HOTEL', 'd0d242278c67490a2f954c092cfbf9c3.jpg', 23, 1, 0, '2017-05-05 16:25:47', '2017-09-24 18:28:25'),
(3, 2, 8, 'Swimming Pool', '15ad84ed895ace13bb2e178dd8d26fe8.jpg', 34, 1, 0, '2017-05-05 16:26:03', '2017-09-24 18:30:10'),
(4, 2, 1, 'PIZZA', 'b465711ca5b823cf7e8336b9080ec060.jpg', 22, 1, 0, '2017-05-05 16:26:20', '2017-09-24 19:45:23'),
(5, 2, 1, 'PIZZA', '68b79c20d0f01a894a8a7c8a37f628d9.jpg', 2, 1, 0, '2017-05-05 16:26:36', '2017-09-24 19:41:38'),
(11, 2, 1, 'PIZZA', '852553a6618f2ff3bff07e914a1cfa8e.jpg', 4, 1, 0, '2017-09-24 19:42:50', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dir_image_comments`
--

CREATE TABLE `dir_image_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_image_comments`
--

INSERT INTO `dir_image_comments` (`comment_id`, `user_id`, `image_id`, `comment`, `publication_status`, `deletion_status`, `date_added`) VALUES
(1, 2, 3, 'My first comment.....', 1, 0, '2017-05-10 15:48:59'),
(2, 3, 3, 'My First Comment..........', 1, 0, '2017-05-10 11:42:37'),
(3, 2, 3, 'First Comments....', 1, 0, '2017-05-10 17:56:22'),
(4, 2, 3, 'Test two...', 1, 0, '2017-05-10 17:59:12'),
(5, 2, 1, 'Test comment....', 1, 0, '2017-05-10 21:09:31'),
(6, 13, 9, 'Good Product............', 1, 0, '2017-05-20 01:24:48'),
(7, 2, 8, 'Not so gd product....', 1, 0, '2017-05-20 01:32:40'),
(8, 2, 10, 'First Message...', 1, 0, '2017-07-28 00:23:28'),
(9, 7, 10, 'Test Two.......', 1, 0, '2017-07-29 01:13:41');

-- --------------------------------------------------------

--
-- Table structure for table `dir_image_hearts`
--

CREATE TABLE `dir_image_hearts` (
  `heart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `image_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_image_hearts`
--

INSERT INTO `dir_image_hearts` (`heart_id`, `user_id`, `image_id`, `date_added`) VALUES
(1, 3, 3, '2017-05-10 12:59:52'),
(2, 2, 3, '0000-00-00 00:00:00'),
(3, 2, 3, '0000-00-00 00:00:00'),
(4, 2, 1, '0000-00-00 00:00:00'),
(5, 2, 4, '2017-05-10 15:58:35'),
(6, 12, 1, '2017-05-10 21:16:15'),
(7, 13, 9, '2017-05-20 01:24:24'),
(8, 2, 8, '2017-05-20 01:32:14'),
(9, 2, 7, '2017-05-20 03:28:43'),
(10, 2, 10, '2017-07-28 00:23:46'),
(11, 7, 10, '2017-07-29 01:13:52'),
(12, 7, 6, '2017-07-29 01:18:39'),
(13, 7, 2, '2017-07-29 01:19:12');

-- --------------------------------------------------------

--
-- Table structure for table `dir_keywords`
--

CREATE TABLE `dir_keywords` (
  `keyword_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `keyword_name` varchar(250) NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_keywords`
--

INSERT INTO `dir_keywords` (`keyword_id`, `user_id`, `listing_id`, `keyword_name`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 2, 8, 'best hotel', 1, 0, '2017-06-03 10:44:59', '2017-09-25 19:40:17'),
(2, 2, 1, 'juliana pizza', 1, 0, '2017-06-04 02:00:54', '2017-09-25 19:39:55'),
(3, 2, 8, 'hotel', 1, 0, '2017-06-04 02:01:57', '2017-09-25 19:39:27'),
(4, 2, 1, 'pizza in usa', 1, 0, '2017-06-04 02:02:15', '2017-09-25 19:39:05'),
(5, 2, 1, 'pizza', 1, 0, '2017-06-04 02:02:59', '2017-09-25 19:38:45'),
(6, 13, 3, 'company', 1, 0, '2017-06-06 07:48:49', NULL),
(7, 2, 7, 'KFC', 1, 1, '2017-09-10 10:00:12', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `dir_listing`
--

CREATE TABLE `dir_listing` (
  `listing_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `company_name` varchar(100) NOT NULL,
  `company_logo` varchar(100) NOT NULL,
  `city_id` varchar(100) NOT NULL,
  `state` varchar(100) NOT NULL,
  `address` varchar(250) NOT NULL,
  `zip` varchar(25) NOT NULL,
  `fax` varchar(25) NOT NULL,
  `phone` varchar(25) NOT NULL,
  `mobile` varchar(25) NOT NULL,
  `email` varchar(100) NOT NULL,
  `website` varchar(250) NOT NULL,
  `registration_code` varchar(50) NOT NULL,
  `vat_registration` varchar(50) NOT NULL,
  `contact_person` varchar(100) NOT NULL,
  `about_company` text NOT NULL,
  `employees` varchar(10) NOT NULL,
  `establishment_year` varchar(4) NOT NULL,
  `company_manager` varchar(100) NOT NULL,
  `lat` varchar(255) NOT NULL,
  `lng` varchar(255) NOT NULL,
  `saturday` varchar(20) NOT NULL,
  `sunday` varchar(20) NOT NULL,
  `monday` varchar(20) NOT NULL,
  `tuesday` varchar(20) NOT NULL,
  `wednesday` varchar(20) NOT NULL,
  `thursday` varchar(20) NOT NULL,
  `friday` varchar(20) NOT NULL,
  `total_views` int(11) NOT NULL,
  `is_featured` tinyint(1) NOT NULL DEFAULT '0',
  `verification_status` tinyint(4) NOT NULL DEFAULT '0',
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(4) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_listing`
--

INSERT INTO `dir_listing` (`listing_id`, `user_id`, `category_id`, `company_name`, `company_logo`, `city_id`, `state`, `address`, `zip`, `fax`, `phone`, `mobile`, `email`, `website`, `registration_code`, `vat_registration`, `contact_person`, `about_company`, `employees`, `establishment_year`, `company_manager`, `lat`, `lng`, `saturday`, `sunday`, `monday`, `tuesday`, `wednesday`, `thursday`, `friday`, `total_views`, `is_featured`, `verification_status`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 2, 2, 'JULIANA\'S PIZZA', '1e0bd2bd2b5fbb923584635683adbb79.png', '5', 'Brooklyn', 'JULIANA\'S • 19 OLD FULTON ST', '11201', '1234', '718.596.6700', '718.596.6700', 'info@julianaspizza.com', 'http://julianaspizza.com/', '12345678', '87654321', 'Juliana', 'WELCOME TO JULIANA\'S, A NEW YORK-STYLE PIZZA emporium. Juliana\'s heralds  the return of Patsy Grimaldi, New York City’s most celebrated pizza proprietor: not only to the NYC restaurant scene, but to 19 Old Fulton Street, the original location under the Brooklyn Bridge where he and his late wife, Carol, founded legendary Grimaldi’s Pizzeria. Unbeknownst to many, Pat and Carol severed their association with Grimaldi’s more than a decade ago when they sold the restaurant (along with their name) to a former customer. Even though they were no longer involved in the business they made famous, they never lost their zeal for serving (and eating!) truly great pizza. And so, after many requests from friends and family—and a desire to re-live a “dream come true”—they partnered with long-time close friend, Matthew Grogan, to establish Juliana’s, a neighborhood pizzeria, proudly preparing and serving pies the way Patsy has for generations: deliciously thin crusts hosting only the finest housemade, locally and internationally-sourced toppings, expertly turned inside the original hand-built, blazingly hot hearth—the first coal-fired oven commissioned in New York in over fifty years.', '51-100', '1972', 'Juliana', '40.820166923275714', '-74.0699965328979', '11:30 AM - 10:00 PM', '11:30 AM - 10:00 PM', '11:30 AM - 10:00 PM', '11:30 AM - 10:00 PM', '11:30 AM - 10:00 PM', '11:30 AM - 10:00 PM', '11:30 AM - 10:00 PM', 193, 1, 1, 1, 0, '2017-05-04 02:38:21', '2017-09-24 19:37:35'),
(2, 12, 2, 'KFC', '620706397a213ec19d3419c092afe718.jpg', '1', 'Dhanmondi', 'Shukrabad', '1207', '', '', '1761913331', 'kfc@gmail.com', '', '', '', 'KFC', 'Company details...................................................', '201-500', '1990', 'King', '25.807454293858374', '89.31865534210203', '', '', '', '', '', '', '', 300, 0, 1, 1, 1, '2017-05-11 00:46:54', '2017-07-28 23:30:16'),
(3, 13, 5, 'WALTON', '7fced71a6496d39794b694f95a63cd83.jpg', '1', 'Dhaka', 'Multiplan City', '1207', '1761913331', '1761913331', '1761913331', 'walton@gmail.com', '', '12345678', '', 'MUSA', 'Details.......', '501-1000', '2000', 'AM Sonny', '25.807454293858374', '89.31865534210203', '', '', '', '', '', '', '', 226, 1, 1, 1, 1, '2017-05-20 01:21:24', '2017-07-28 23:29:08'),
(4, 11, 3, 'Square', '01447341bc8e8e7afb41770ac796357d.png', '1', 'Dhaka', 'Dhanmondi Dhaka', '1207', '4527454', '1761913331', '1761913331', 'nusa@gmail.com', '', '', '', 'MUSA', 'Company details.............', '4001-5000', '2000', 'Rahmot Ullah', '25.807454293858374', '89.31865534210203', '', '', '', '', '', '', '', 172, 1, 1, 1, 1, '2017-07-28 23:39:09', '2017-07-28 23:39:57'),
(5, 7, 5, 'Samsung', '410014449cdd1c9b2bf9dd2b5857f380.jpg', '1', 'Dhaka', 'dhaka', '1414', '', '', '0171700000', 'nusa@gmail.com', '', '12345678', '', 'Tonmoy', 'About samsung', '4001-5000', '1999', 'talha', '25.807454293858374', '89.31865534210203', '', '', '', '', '', '', '', 196, 1, 1, 1, 1, '2017-07-28 23:43:54', '0000-00-00 00:00:00'),
(6, 24, 1, 'WWWWWWWWWWWWWWWWW', '', '2', 'ITALIA', 'WWWWWWWWWWWW', 'WWWW', '', '', 'WWWWWWWWW', 'latitoni@gmail.com', '', '', '', 'RRRRRRRRRRRRRRRR', 'WWWWWWWWWWWWWWWWWWW', '1-5', '2003', 'BVVVVVVVVVVVVVVVVVVVV', '', '', '', '', '', '', '', '', '', 1, 0, 0, 1, 1, '2017-08-13 00:36:33', '0000-00-00 00:00:00'),
(8, 2, 11, 'LEMIGO HOTEL', '03a66a1ba4090d794818473cc34b3be3.png', '6', 'Kigali', 'Kimirura | KG 624 St', '1231231', '+250 784 040 924', '+250 784 040 924', '1231231233', 'info@lemigohotel.com', 'http://www.lemigohotel.com/', '101618167', '101618167', 'Mr. Lukas', 'WELCOME TO LEMIGO HOTEL\r\n\r\nSet in an urban oasis within the city center/business district. This contemporary 4 * hotel is only 5km from the airport and provides your home away from home whilst in Kigali with free WiFi and complimentary airport shuttle. The Kigali Financial Centre, Rwanda Development Board (RDB), Parliament, International Conference center and the ministries are all close by.\r\nWhether you stay in one of our bright and airy classic rooms or one of our stunning suites you’ll enjoy the friendly Rwandan welcome in a safe and relaxing environment with an efficient service and modern technology to ensure you enjoy your stay. When there is time to relax guests can enjoy the Gym and large outdoor pool and in the rooms there are; tea/coffee facilities, cable TV on a 46” screen, laptop sized safe plus iron & ironing board. For a little extra, guests can choose the Executive Club Floor with private check-in/out, boardroom, and exclusive lounge with the balcony looking over the city serving complimentary evening canapés with selected wines and champagne in an exclusive “home away from home” atmosphere.\r\nThe Lobby Lounge is the place to meet and talk business over coffee and Lemigo Restaurant offers International and Rwandan dishes after a drink in the sophisticated atmosphere of the one2one Bar. The conference center on the ground floor features the 736 sqm ballroom with 5 adjacent breakout rooms, business center and large pre-function ideal for conferences, cocktail parties and social events.\r\nOur dedicated conference team are on hand at every stage to ensure your events success.', '201-500', '2000', 'Mr. Lukas', '-1.9577709121101379', '30.096853584289534', '24 hours', '24 hours', '24 hours', '24 hours', '24 hours', '24 hours', '24 hours', 16, 1, 1, 1, 0, '2017-09-24 18:04:37', '2017-09-24 18:38:42');

-- --------------------------------------------------------

--
-- Table structure for table `dir_packages`
--

CREATE TABLE `dir_packages` (
  `package_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `package_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `listing` int(11) NOT NULL,
  `images` int(11) NOT NULL,
  `videos` int(11) NOT NULL,
  `products` int(11) NOT NULL,
  `services` int(11) NOT NULL,
  `articles` int(11) NOT NULL,
  `keywords` int(11) NOT NULL,
  `price` int(11) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_packages`
--

INSERT INTO `dir_packages` (`package_id`, `user_id`, `package_name`, `description`, `listing`, `images`, `videos`, `products`, `services`, `articles`, `keywords`, `price`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 'Free', 'Details.............', 2, 5, 5, 5, 5, 5, 5, 0, 1, 1, '2017-04-26 01:18:08', '2017-05-02 00:46:27'),
(2, 1, 'Premium', 'Details.....', 2, 10, 10, 10, 10, 10, 10, 25, 1, 0, '2017-04-26 01:24:15', '2017-05-02 00:46:46'),
(3, 1, 'Lifetime', 'Details...', 3, 15, 15, 15, 15, 15, 15, 50, 1, 0, '2017-04-27 02:06:10', '2017-05-02 00:46:11'),
(4, 1, 'Free', 'This is free and limited. Buy Lifetime or Premium for more features', 1, 3, 3, 3, 3, 3, 3, 0, 1, 0, '2017-08-14 20:53:52', '2017-09-23 15:22:12'),
(5, 1, 'starter', 'test', 100, 1, 1, 1, 1, 1, 1, 0, 1, 1, '2017-08-24 09:19:38', '2017-08-25 23:53:44'),
(6, 1, 'Diamond Plus', 'test', 5, 1000, 1000, 1000, 1000, 1000, 20, 75, 0, 0, '2017-08-28 20:53:21', '2017-09-12 04:57:37');

-- --------------------------------------------------------

--
-- Table structure for table `dir_payments`
--

CREATE TABLE `dir_payments` (
  `payment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) DEFAULT NULL,
  `payment_type` tinyint(4) NOT NULL,
  `payment_purpose` tinyint(4) NOT NULL,
  `amount` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_payments`
--

INSERT INTO `dir_payments` (`payment_id`, `user_id`, `listing_id`, `payment_type`, `payment_purpose`, `amount`, `status`, `date_added`) VALUES
(1, 2, 1, 1, 2, 15, 1, '2017-08-27 08:32:53'),
(2, 12, 2, 1, 3, 11, 1, '2017-08-27 10:51:59'),
(3, 32, NULL, 1, 1, 0, 0, '2017-09-23 03:40:55');

-- --------------------------------------------------------

--
-- Table structure for table `dir_products`
--

CREATE TABLE `dir_products` (
  `product_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `product_name` varchar(250) NOT NULL,
  `product_details` text NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `total_views` int(11) NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_products`
--

INSERT INTO `dir_products` (`product_id`, `user_id`, `listing_id`, `product_name`, `product_details`, `image_path`, `total_views`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(5, 2, 8, 'LEMIGO HOTEL FOOD', 'Dine stylishly with our fine dining experience offering the best in African and Asia culinary under modern setting, open air with Pool front setting.', '2726e3ba6e335268c7ae0af8c2f7e8ec.jpg', 53, 1, 0, '2017-07-29 16:15:49', '2017-09-24 18:56:40');

-- --------------------------------------------------------

--
-- Table structure for table `dir_product_comments`
--

CREATE TABLE `dir_product_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_product_comments`
--

INSERT INTO `dir_product_comments` (`comment_id`, `user_id`, `product_id`, `comment`, `publication_status`, `deletion_status`, `date_added`) VALUES
(1, 2, 5, 'First Comments.....', 1, 0, '2017-07-29 16:08:37'),
(2, 2, 4, 'First Comments', 1, 0, '2017-07-29 16:20:02');

-- --------------------------------------------------------

--
-- Table structure for table `dir_product_hearts`
--

CREATE TABLE `dir_product_hearts` (
  `heart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_product_hearts`
--

INSERT INTO `dir_product_hearts` (`heart_id`, `user_id`, `product_id`, `date_added`) VALUES
(1, 2, 5, '2017-07-29 16:08:07'),
(2, 2, 4, '2017-07-29 16:19:45'),
(3, 2, 2, '2017-08-12 21:00:17'),
(4, 7, 3, '2017-08-29 08:13:00');

-- --------------------------------------------------------

--
-- Table structure for table `dir_services`
--

CREATE TABLE `dir_services` (
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `service_name` varchar(250) NOT NULL,
  `service_details` text NOT NULL,
  `image_path` varchar(100) NOT NULL,
  `total_views` int(11) NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_services`
--

INSERT INTO `dir_services` (`service_id`, `user_id`, `listing_id`, `service_name`, `service_details`, `image_path`, `total_views`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(4, 2, 8, 'MEETING & EVENTS', 'The Lemigo Hotel Kigali is your premium address for hosting business meetings and events with fully-equipped facilities which are ideal for all types of functions, from corporate events to cocktail parties and more.\r\n\r\nChoose from 5 customized meeting rooms or the grand ballroom which can host up to 750 guests. Take advantage of the hotel\'s unique pool and garden area which is perfect for outdoor luncheons and dinner events.\r\n\r\nThe hotel\'s event facilities and full-service business center are located on the same floor together with the All Day Dinning restaurant and One to One Bar for your convenience.', 'aa8dd35ea4aafec7579a19f90e424ff0.jpg', 40, 1, 0, '2017-07-29 16:03:25', '2017-09-24 18:41:22'),
(5, 2, 8, 'WEDDINGS', 'Lemigo Hotel is set amongst 22 acres of private grounds, featuring magnificent views of the surrounding the city - a magical setting for your wedding celebrations.\r\n\r\nOur luxurious accommodations, along with our sensuous health and beauty spa, will prove a spectacularly luxurious base for your wedding party. Our suites can comfortably seat up to 450 wedding guests during your special day. Our function rooms feature the ultimate in luxury along with stunning views over the beautiful hotel grounds, providing you with the most romantic of venues in the charming hotel.', 'be479eac7764919bef57e340bfb94690.jpg', 45, 1, 0, '2017-07-29 16:03:45', '2017-09-24 18:37:31');

-- --------------------------------------------------------

--
-- Table structure for table `dir_service_comments`
--

CREATE TABLE `dir_service_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_service_comments`
--

INSERT INTO `dir_service_comments` (`comment_id`, `user_id`, `service_id`, `comment`, `publication_status`, `deletion_status`, `date_added`) VALUES
(1, 2, 5, 'First Comments.....', 0, 0, '2017-07-29 16:08:37');

-- --------------------------------------------------------

--
-- Table structure for table `dir_service_hearts`
--

CREATE TABLE `dir_service_hearts` (
  `heart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_service_hearts`
--

INSERT INTO `dir_service_hearts` (`heart_id`, `user_id`, `service_id`, `date_added`) VALUES
(1, 2, 5, '2017-07-29 16:08:07'),
(2, 2, 3, '2017-08-30 08:00:49'),
(3, 28, 1, '2017-08-30 08:28:30');

-- --------------------------------------------------------

--
-- Table structure for table `dir_subscribers`
--

CREATE TABLE `dir_subscribers` (
  `subscriber_id` int(11) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_subscribers`
--

INSERT INTO `dir_subscribers` (`subscriber_id`, `email_address`, `deletion_status`, `date_added`) VALUES
(1, 'msnawazbd@gmail.com', 0, '2017-08-27 14:15:48'),
(2, 'noyon2nil@gmail.com', 0, '2017-08-27 04:06:13'),
(3, 'nahidhaque33@gmail.com', 0, '2017-08-27 03:41:47');

-- --------------------------------------------------------

--
-- Table structure for table `dir_sub_categories`
--

CREATE TABLE `dir_sub_categories` (
  `sub_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_id` int(11) NOT NULL,
  `sub_category_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_sub_categories`
--

INSERT INTO `dir_sub_categories` (`sub_category_id`, `user_id`, `category_id`, `sub_category_name`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 1, 'IT', 'Details of IT', 1, 0, '2017-04-25 11:41:52', '2017-04-27 02:32:01'),
(2, 1, 2, 'Restaurant', 'Details about restaurant...', 1, 0, '2017-04-25 22:49:35', '2017-04-27 02:31:54'),
(3, 1, 3, 'Hospital', 'Details about hospital...', 1, 0, '2017-04-25 22:50:42', '2017-04-27 02:31:46'),
(4, 1, 1, 'Training Center', 'Details....', 1, 0, '2017-04-27 02:24:06', '2017-04-27 02:24:33');

-- --------------------------------------------------------

--
-- Table structure for table `dir_videos`
--

CREATE TABLE `dir_videos` (
  `video_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `listing_id` int(11) NOT NULL,
  `video_name` varchar(250) NOT NULL,
  `video_details` text NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `total_views` int(11) NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_videos`
--

INSERT INTO `dir_videos` (`video_id`, `user_id`, `listing_id`, `video_name`, `video_details`, `video_url`, `total_views`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 2, 8, 'Hotels Conference Rooms', 'Create a memorable event at one of five hotels—each steeped in vintage charm and enhanced with every modern amenity to create a true destination meeting, special event, or conference. Well-appointed meeting spaces are matched by fine cuisine, luxurious accommodations, an array of local attractions, and group programs that are a cut above.\r\nSHOW MORE', 'https://youtu.be/un2_mLAtL_8', 31, 1, 0, '2017-05-07 04:38:51', '2017-09-24 19:39:06'),
(2, 2, 1, 'Juliana\'s pizza en Brooklyn NYC', 'WELCOME TO JULIANA\'S, A NEW YORK-STYLE PIZZA emporium. Juliana\'s heralds  the return of Patsy Grimaldi, New York City’s most celebrated pizza proprietor: not only to the NYC restaurant scene, but to 19 Old Fulton Street, the original location under the Brooklyn Bridge where he and his late wife, Carol, founded legendary Grimaldi’s Pizzeria. Unbeknownst to many, Pat and Carol severed their association with Grimaldi’s more than a decade ago when they sold the restaurant (along with their name) to a former customer. Even though they were no longer involved in the business they made famous, they never lost their zeal for serving (and eating!) truly great pizza. And so, after many requests from friends and family—and a desire to re-live a “dream come true”—they partnered with long-time close friend, Matthew Grogan, to establish Juliana’s, a neighborhood pizzeria, proudly preparing and serving pies the way Patsy has for generations: deliciously thin crusts hosting only the finest housemade, locally and internationally-sourced toppings, expertly turned inside the original hand-built, blazingly hot hearth—the first coal-fired oven commissioned in New York in over fifty years.', 'https://youtu.be/_Sna-WrUw5A', 27, 1, 0, '2017-05-07 05:09:22', '2017-09-24 19:36:34'),
(3, 2, 1, 'NYC Pizzeria Ranked 1 in U.S.', 'Juliana\'s Pizza in Brooklyn gets top honors from TripAdvisor– and it\'s no surprise the establishment\'s owner is a pizza-making legend.', 'https://youtu.be/dN4_0smFiGE', 30, 1, 0, '2017-07-29 17:17:30', '2017-09-24 19:34:09'),
(4, 2, 1, 'JULIANA\'S PIZZA', 'An interesting story of the what happens when you sell the name of your famous pizza, but keep the oven that helped to make the flavor a world wide favorite!', 'https://youtu.be/D8rpzZgth8o', 27, 1, 0, '2017-07-29 17:18:23', '2017-09-24 19:32:52'),
(5, 2, 8, 'WEDDING', 'Lemigo Hotel is set amongst 22 acres of private grounds, featuring magnificent views of the surrounding the city - a magical setting for your wedding celebrations.\r\n\r\nOur luxurious accommodations, along with our sensuous health and beauty spa, will prove a spectacularly luxurious base for your wedding party. Our suites can comfortably seat up to 450 wedding guests during your special day. Our function rooms feature the ultimate in luxury along with stunning views over the beautiful hotel grounds, providing you with the most romantic of venues in the charming hotel.', 'https://youtu.be/50KnurIlgEY', 39, 1, 0, '2017-07-29 17:18:51', '2017-09-24 18:46:28');

-- --------------------------------------------------------

--
-- Table structure for table `dir_video_comments`
--

CREATE TABLE `dir_video_comments` (
  `comment_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `comment` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_video_comments`
--

INSERT INTO `dir_video_comments` (`comment_id`, `user_id`, `video_id`, `comment`, `publication_status`, `deletion_status`, `date_added`) VALUES
(1, 2, 1, 'First comments....', 1, 0, '2017-07-29 17:16:04');

-- --------------------------------------------------------

--
-- Table structure for table `dir_video_hearts`
--

CREATE TABLE `dir_video_hearts` (
  `heart_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `video_id` int(11) NOT NULL,
  `date_added` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `dir_video_hearts`
--

INSERT INTO `dir_video_hearts` (`heart_id`, `user_id`, `video_id`, `date_added`) VALUES
(1, 2, 1, '2017-07-29 17:15:48');

-- --------------------------------------------------------

--
-- Table structure for table `port_blogs`
--

CREATE TABLE `port_blogs` (
  `blog_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `blog_category_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(250) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_blogs`
--

INSERT INTO `port_blogs` (`blog_id`, `user_id`, `blog_category_id`, `title`, `description`, `url`, `image_path`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 1, 'Newspaper Template', 'Newspaper Template Details', 'http://bangladeshpress.com.bd', '47007b248dc453bb2d6dd7b0c8bd8ee0.png', 1, 0, '2017-04-03 04:21:37', '2017-04-05 01:40:05'),
(2, 1, 2, 'E-commerce Developments', 'Details About E-commerce Developments', '', '99c70b7c251b5bd238b3e5bbf8bc658b.png', 1, 0, '2017-04-03 04:43:42', '2017-04-05 03:23:10'),
(3, 1, 2, 'Personal Website Development', 'Details About Personal Website Development1', 'http://masudibnrahman.com/', '58565fbdfc7fe08266d83b9fd62f77f6.png', 1, 0, '2017-04-03 04:48:29', '2017-04-05 03:22:57'),
(4, 2, 2, 'POS', 'Details About POS', '', '996e14f395bcdd55d286f71776ffa9da.png', 1, 0, '2017-04-05 03:24:01', NULL),
(5, 1, 2, 'Holisticly Incubate Enabled Value.', 'Uniquely conceptualize visionary process improvements with tactical communities. Dramatically empower e-business action items without effective scenarios. Conveniently repurpose principle-centered quality vectors with out-of-the-box scenarios.', 'https://www.youtube.com/embed/eF_B-WQR5mg', 'ccb498c81e513b7c5fe7c64d7c69f0e4.png', 1, 0, '2017-04-05 04:37:47', '2017-04-21 22:40:59'),
(6, 2, 4, 'Personal Website Development', 'Personal Website DevelopmentPersonal Website DevelopmentPersonal Website DevelopmentPersonal Website DevelopmentPersonal Website DevelopmentPersonal Website Development', 'http://masudibnrahman.com/', '5c3a8a92fba8770de85f789c45c87060.png', 1, 0, '2017-04-20 15:42:39', NULL),
(7, 1, 3, 'Personal Website Development', 'Details/................', 'http://masudibnrahman.com/', 'dee7c0088bb49bc525f5b8638d4a47ad.jpg', 1, 0, '2017-04-21 22:41:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `port_blog_categories`
--

CREATE TABLE `port_blog_categories` (
  `blog_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_blog_categories`
--

INSERT INTO `port_blog_categories` (`blog_category_id`, `user_id`, `category_name`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 'Web Design', 'Details of web design...', 0, 0, '2017-04-02 11:43:59', NULL),
(2, 1, 'Web Developments', 'Details about web developments..', 1, 0, '2017-04-02 11:23:32', '2017-04-03 01:35:10'),
(3, 1, 'SEO', 'Details about seo..', 1, 0, '2017-04-03 01:37:35', '2017-04-05 03:25:32'),
(4, 2, 'Digital Marketing', 'Details About Digital Marketing', 1, 0, '2017-04-05 03:26:20', NULL),
(5, 1, 'Graphics Design', 'Details About Graphics Design..', 1, 0, '2017-04-05 04:01:23', '2017-04-21 22:32:32'),
(6, 1, 'Big Data', 'Details About Big Data', 1, 0, '2017-04-21 22:32:57', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `port_clients`
--

CREATE TABLE `port_clients` (
  `client_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `client_name` varchar(100) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_clients`
--

INSERT INTO `port_clients` (`client_id`, `user_id`, `client_name`, `image_path`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 'Web Design', 'a70b6668fae7b004f243ee46a0026f64.png', 'We will design high quality website for your busine', 1, 0, '2017-04-02 09:32:36', '2017-04-05 11:47:27'),
(2, 1, 'Web Development', '5850e996c97e8aadbdf71806a211738b.png', 'You will get more from your expectation', 1, 0, '2017-04-02 09:58:34', '2017-04-05 11:47:21'),
(3, 2, 'Shahid Nawaz', '13a4de9a9d678968bf70528b1d6aa65e.png', 'Details About Shahid Nawaz', 1, 0, '2017-04-05 05:08:10', '2017-04-05 11:47:44'),
(4, 1, 'Amy Haque', '9e4c96ae6547e88559d5e15380170b07.png', 'Details About Amy Haque...', 1, 0, '2017-04-05 11:43:57', '2017-04-21 21:55:06'),
(5, 2, 'Tamim Haque', '840aee409e20b92c812ad7b8f738ecb4.jpg', 'Tamim Haque Details...', 1, 0, '2017-04-21 21:57:21', '0000-00-00 00:00:00'),
(6, 1, 'Towfik Hossain', '9fee2bc3e44176297f03b103586af2fc.jpg', 'Details About Towfik Hossain', 1, 0, '2017-04-21 21:58:39', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `port_educational_experiences`
--

CREATE TABLE `port_educational_experiences` (
  `educational_experience_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `achievement` varchar(250) NOT NULL,
  `institution` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` date NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_educational_experiences`
--

INSERT INTO `port_educational_experiences` (`educational_experience_id`, `user_id`, `achievement`, `institution`, `start_date`, `end_date`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, '4', 'Daffodil International University', '2011-05-01', '2015-12-31', 'Completed B.Sc in Software Engineering (SWE)', 1, 0, '2017-03-31 09:12:47', '2017-04-21 23:05:07'),
(2, 1, '2', 'Collectorate School And College, Rangpur', '2008-07-01', '2010-07-31', 'Completed Higher Secondary From Collectorate School And College, Rangpur', 1, 0, '2017-03-31 09:33:37', '2017-03-31 22:39:19'),
(3, 1, '1', 'Dhap Satgara Baitul Mukarram Kamil Madrasah Rangpur', '2006-01-01', '2008-06-01', 'Completed Secondary  School Certificate', 1, 0, '2017-04-01 03:28:23', '2017-04-01 03:37:35'),
(4, 1, '6', 'Stamford University', '2016-03-25', '2017-04-01', 'Details....', 1, 0, '2017-04-21 23:06:19', '2017-04-21 23:06:33');

-- --------------------------------------------------------

--
-- Table structure for table `port_portfolio`
--

CREATE TABLE `port_portfolio` (
  `portfolio_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `portfolio_category_id` int(11) NOT NULL,
  `title` varchar(250) NOT NULL,
  `description` text NOT NULL,
  `url` varchar(250) NOT NULL,
  `image_path` varchar(250) NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_portfolio`
--

INSERT INTO `port_portfolio` (`portfolio_id`, `user_id`, `portfolio_category_id`, `title`, `description`, `url`, `image_path`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 1, 'Newspaper Template', 'Newspaper Template Details', 'http://bangladeshpress.com.bd', '47007b248dc453bb2d6dd7b0c8bd8ee0.png', 1, 0, '2017-04-03 04:21:37', '2017-04-05 01:40:05'),
(2, 1, 2, 'E-commerce Developments', 'Details About E-commerce Developments', '', '99c70b7c251b5bd238b3e5bbf8bc658b.png', 1, 0, '2017-04-03 04:43:42', '2017-04-21 22:56:51'),
(3, 2, 2, 'Personal Website Development', 'Details About Personal Website Development1', 'http://masudibnrahman.com/', '58565fbdfc7fe08266d83b9fd62f77f6.png', 1, 0, '2017-04-03 04:48:29', '2017-04-05 03:22:57'),
(4, 1, 2, 'POS', 'Details About POS', '', '996e14f395bcdd55d286f71776ffa9da.png', 1, 0, '2017-04-05 03:24:01', NULL),
(5, 1, 5, 'Personal Website Development', 'Details..................', 'http://masudibnrahman.com/', '886d517eacd6724dff06395a9aa52ce1.jpg', 1, 0, '2017-04-21 22:57:07', NULL),
(6, 1, 5, 'Personal Website Development', 'Details............', 'codefixit.com', '26aefaf082f584de8e48ae31e7179eb1.jpg', 1, 0, '2017-04-21 22:57:26', NULL),
(7, 1, 5, 'Personal Website Development', 'Details...................', 'codefixit.com', 'ba5337d7b6e6c9efdaff6d34b2f8ed59.jpg', 1, 0, '2017-04-21 22:58:34', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `port_portfolio_categories`
--

CREATE TABLE `port_portfolio_categories` (
  `portfolio_category_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `category_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_portfolio_categories`
--

INSERT INTO `port_portfolio_categories` (`portfolio_category_id`, `user_id`, `category_name`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 'Web Design', 'Details of web design...', 1, 0, '2017-04-02 11:43:59', NULL),
(2, 1, 'Web Developments', 'Details about web developments..', 1, 0, '2017-04-02 11:23:32', '2017-04-03 01:35:10'),
(3, 2, 'SEO', 'Details about seo..', 1, 0, '2017-04-03 01:37:35', '2017-04-05 03:25:32'),
(4, 1, 'Digital Marketing', 'Details About Digital Marketing', 0, 1, '2017-04-05 03:26:20', '2017-04-21 22:51:02'),
(5, 1, 'Big Data', 'Details About..................', 1, 0, '2017-04-21 22:51:21', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `port_prices`
--

CREATE TABLE `port_prices` (
  `price_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `price_name` varchar(100) NOT NULL,
  `price` varchar(50) NOT NULL,
  `icon_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_prices`
--

INSERT INTO `port_prices` (`price_id`, `user_id`, `price_name`, `price`, `icon_name`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 'Web Design', '100', 'desktop', 'We will design high quality website for your busine', 1, 0, '2017-04-02 09:32:36', '2017-04-21 22:12:26'),
(2, 1, 'Web Development', '70', 'wrench', 'You will get more from your expectation', 1, 0, '2017-04-02 09:58:34', '2017-04-05 12:25:43'),
(3, 1, 'Basic', '80', 'bars', 'Details Abut Basics', 1, 0, '2017-04-05 04:59:04', '2017-04-05 12:25:37'),
(4, 2, 'Standared', '150', 'desktop', 'Details About Standared..', 1, 0, '2017-04-05 12:26:10', '0000-00-00 00:00:00'),
(5, 1, 'Pro', '80', 'desktop', 'Details...............', 1, 0, '2017-04-21 22:12:53', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `port_services`
--

CREATE TABLE `port_services` (
  `service_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `service_name` varchar(100) NOT NULL,
  `icon_name` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_services`
--

INSERT INTO `port_services` (`service_id`, `user_id`, `service_name`, `icon_name`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 'Web Design', 'desktop', 'We will design high quality website for your busine', 1, 0, '2017-04-02 09:32:36', '2017-04-21 22:24:30'),
(2, 2, 'Web Development', 'wrench', 'You will get more from your expectation', 1, 0, '2017-04-02 09:58:34', '2017-04-02 10:05:40'),
(3, 1, 'SEO', 'desktop', 'Details About SEO', 1, 0, '2017-04-21 22:25:18', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `port_skills`
--

CREATE TABLE `port_skills` (
  `skill_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `skill_name` varchar(100) NOT NULL,
  `icon_name` varchar(100) NOT NULL,
  `skill_percentage` int(3) NOT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_skills`
--

INSERT INTO `port_skills` (`skill_id`, `user_id`, `skill_name`, `icon_name`, `skill_percentage`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 'Web Design', 'desktop', 75, 'We will design high quality website for your busine', 1, 0, '2017-04-02 09:32:36', '2017-04-05 12:53:49'),
(2, 1, 'Web Development', 'wrench', 90, 'You will get more from your expectation', 1, 0, '2017-04-02 09:58:34', '2017-04-05 12:53:42'),
(3, 1, 'Graphics Design', 'desktop', 50, 'Details...', 1, 0, '2017-04-05 12:44:25', '2017-04-13 11:52:37'),
(4, 2, 'SEO', 'desktop', 45, 'Details..', 0, 0, '2017-04-05 12:54:37', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `port_working_experiences`
--

CREATE TABLE `port_working_experiences` (
  `working_experience_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `company_name` varchar(250) NOT NULL,
  `designation` varchar(100) NOT NULL,
  `start_date` date NOT NULL,
  `end_date` varchar(10) DEFAULT NULL,
  `description` text NOT NULL,
  `publication_status` tinyint(1) NOT NULL,
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `port_working_experiences`
--

INSERT INTO `port_working_experiences` (`working_experience_id`, `user_id`, `company_name`, `designation`, `start_date`, `end_date`, `description`, `publication_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, 1, 'Softxilla', 'Junior Software Engineer', '2015-06-01', '2016-06-01', 'I worked as a junior software engineer', 1, 0, '2017-04-02 07:39:44', '0000-00-00 00:00:00'),
(2, 1, 'Atique IT', 'Software Engineer', '2016-06-01', '2017-02-15', 'Worked as a Software Engineer', 1, 0, '2017-04-02 07:43:28', '0000-00-00 00:00:00'),
(3, 1, 'Clustercoding', 'Senior Software Engineer', '2016-01-01', 'Continue', 'Working as a Senior Software Engineer', 1, 0, '2017-04-02 07:44:55', '2017-04-21 23:13:18');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_admin`
--

CREATE TABLE `tbl_admin` (
  `admin_id` int(2) NOT NULL,
  `admin_name` varchar(50) NOT NULL,
  `admin_email_address` varchar(100) NOT NULL,
  `admin_password` varchar(32) NOT NULL,
  `access_level` tinyint(1) NOT NULL COMMENT 'for super_admin = 1, manager = 2',
  `mobile_no` varchar(15) NOT NULL,
  `date_of_birth` date NOT NULL,
  `gender` varchar(6) NOT NULL,
  `position` varchar(255) NOT NULL,
  `about_me` text NOT NULL,
  `join_date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_admin`
--

INSERT INTO `tbl_admin` (`admin_id`, `admin_name`, `admin_email_address`, `admin_password`, `access_level`, `mobile_no`, `date_of_birth`, `gender`, `position`, `about_me`, `join_date`) VALUES
(1, 'Md Shahid Nawaz', 'msnawazbd@gmail.com', '3b712de48137572f3849aabd5666a4e3', 1, '01761913331', '1993-12-20', 'Male', 'Director', 'Studying B.Sc In Software Engineering at Deffodil Internation University', '2015-06-19 18:35:39'),
(2, 'Md Aeshadul Haque', 'noyon2nil@gmail.com', '3b712de48137572f3849aabd5666a4e3', 2, '', '0000-00-00', '', '', '', '2015-06-19 18:35:39');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_settings`
--

CREATE TABLE `tbl_settings` (
  `setting_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `site_name` varchar(100) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `paypal_id` varchar(100) NOT NULL,
  `web` varchar(250) NOT NULL,
  `language` varchar(50) NOT NULL,
  `time_zone` varchar(50) NOT NULL,
  `time_format` int(2) NOT NULL,
  `date_format` varchar(10) NOT NULL,
  `address` varchar(250) NOT NULL,
  `state` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL,
  `postal_code` varchar(25) NOT NULL,
  `fax` varchar(25) NOT NULL,
  `mobile_number` varchar(25) NOT NULL,
  `phone_number` varchar(15) NOT NULL,
  `facebook` varchar(250) NOT NULL,
  `twitter` varchar(250) NOT NULL,
  `google_plus` varchar(250) NOT NULL,
  `youtube` varchar(250) NOT NULL,
  `terms_conditions` text NOT NULL,
  `privacy_policy` text NOT NULL,
  `site_logo` varchar(250) NOT NULL,
  `site_favicon` varchar(250) NOT NULL,
  `last_updated` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_settings`
--

INSERT INTO `tbl_settings` (`setting_id`, `user_id`, `site_name`, `email_address`, `paypal_id`, `web`, `language`, `time_zone`, `time_format`, `date_format`, `address`, `state`, `city`, `postal_code`, `fax`, `mobile_number`, `phone_number`, `facebook`, `twitter`, `google_plus`, `youtube`, `terms_conditions`, `privacy_policy`, `site_logo`, `site_favicon`, `last_updated`) VALUES
(1, 1, 'CLUSTERCODIN', 'clustercoding@gmail.com', 'clustercoding@gmail.com', 'http://www.clustercoding.com', 'en', 'Asia/Dhaka', 24, 'dd/mm/yyyy', '46/1 b, shukrabad, dhanmondi', 'dhanmondi', 'krasnodar', '120711', '11221', '01792935353', '1717888464', 'http://fb.com/clustercoding', 'http://twitter.com/clustercoding', 'http://google.com/clustercoding', 'http://youtube.com/clustercoding', '<p>clustercoding terms and conditions</p>', '<p>privacy and policy</p>', '05f8a79bf43c3c772318cc0433eaf780.png', 'f824f87914b0955fc6a4a6247ffa2b48.png', '2017-09-03 00:20:21');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_users`
--

CREATE TABLE `tbl_users` (
  `user_id` int(11) NOT NULL,
  `package_id` int(11) DEFAULT NULL,
  `first_name` varchar(25) NOT NULL,
  `last_name` varchar(25) NOT NULL,
  `username` varchar(50) NOT NULL,
  `email_address` varchar(100) NOT NULL,
  `password` varchar(50) NOT NULL,
  `intro` varchar(255) DEFAULT NULL,
  `about` text,
  `education` varchar(255) DEFAULT NULL,
  `work` varchar(255) DEFAULT NULL,
  `mobile_number` varchar(25) DEFAULT NULL,
  `gender` varchar(6) DEFAULT NULL,
  `date_of_birth` date DEFAULT NULL,
  `avatar` varchar(255) DEFAULT NULL,
  `company` varchar(255) DEFAULT NULL,
  `address` text,
  `state` varchar(50) DEFAULT NULL,
  `city` varchar(50) DEFAULT NULL,
  `country` varchar(50) DEFAULT NULL,
  `zip_code` varchar(50) DEFAULT NULL,
  `facebook` varchar(250) DEFAULT NULL,
  `twitter` varchar(250) DEFAULT NULL,
  `google_plus` varchar(250) DEFAULT NULL,
  `linkedin` varchar(250) DEFAULT NULL,
  `youtube` varchar(250) DEFAULT NULL,
  `github` varchar(250) DEFAULT NULL,
  `access_label` tinyint(1) NOT NULL COMMENT 'for superadmin = 1, for admin = 2, for user = 5',
  `activation_status` tinyint(1) NOT NULL DEFAULT '1',
  `deletion_status` tinyint(1) NOT NULL DEFAULT '0',
  `date_added` datetime NOT NULL,
  `last_updated` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_users`
--

INSERT INTO `tbl_users` (`user_id`, `package_id`, `first_name`, `last_name`, `username`, `email_address`, `password`, `intro`, `about`, `education`, `work`, `mobile_number`, `gender`, `date_of_birth`, `avatar`, `company`, `address`, `state`, `city`, `country`, `zip_code`, `facebook`, `twitter`, `google_plus`, `linkedin`, `youtube`, `github`, `access_label`, `activation_status`, `deletion_status`, `date_added`, `last_updated`) VALUES
(1, NULL, 'Super', 'Admin', 'superadmin', 'superadmin@clustercoding.com', 'fe01ce2a7fbac8fafaed7c982a04e229', 'I am programmer, I have no life.', 'about me', 'B.Sc in Software Engineering from Daffodil International University', 'Software Engineer', '+8801761913331', 'm', '1992-03-19', 'fbb0a01640827de12c3d8ffdbfd36160.jpg', 'clustercoding', '56/1 B shukrabad, dhanmondi, dhaka 1207', 'dhanmondi', 'dhaka', 'BGD', '1207', 'http://www.facebook.com/clustercoding', 'http://www.twitter.com/', 'http://www.plus.google.com/', 'http://www.linkedin.com/', 'http://www.youtube.com/', 'http://www.github.com/', 1, 1, 0, '2017-03-25 05:38:59', '2017-09-25 18:02:47'),
(2, 6, 'Amy', 'Haque', 'client', 'client@clustercoding.com', 'fe01ce2a7fbac8fafaed7c982a04e229', '', '', '', '', '0170000000', 'f', '0000-00-00', 'aa4141a4b3dcb8bc1032085d2d71d672.png', '', '', '', '', '', '', '', '', '', '', '', '', 5, 1, 0, '2017-04-22 03:24:36', '2017-09-07 01:24:46'),
(3, NULL, 'Nahid', 'Haque1', 'nahidhaque', 'nahidhaque@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', '01737598333', 'm', '0000-00-00', '84324a7bc8610e6237a2ae456e94c4b3.png', '', '', '', '', '', '', '', '', '', '', '', '', 5, 1, 0, '2017-04-22 13:27:48', '2017-04-23 17:43:31'),
(4, NULL, 'Oliur Rahman', 'Oli', 'lee', 'lee@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '', '', '', '', '01744858495', 'm', '0000-00-00', '62bce14c83077f9a704ab0b8ebc9b3d9.png', '', '', '', '', '', '', '', '', '', '', '', '', 5, 1, 0, '2017-04-22 13:30:29', '2017-04-23 17:42:58'),
(5, NULL, 'sultana', 'yesmin', 'sya.5566', 'sya@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', '1761913331', 'm', '0000-00-00', 'ef8a50cfbe78b5a06f96cfbc0ffe011f.png', '', '', '', '', '', '', '', '', '', '', '', '', 5, 1, 0, '2017-04-24 00:55:32', '0000-00-00 00:00:00'),
(6, NULL, 'tamim', 'islam', 'tamim.islam', 'tamim.islam@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '', '', '', '', '1761913331', 'm', '0000-00-00', 'ab8621fe4550f829113a7261504453f2.png', '', '', '', '', '', '', '', '', '', '', '', '', 5, 1, 0, '2017-04-24 00:56:22', '0000-00-00 00:00:00'),
(7, 2, 'Towfik', 'Hossain', 'user', 'user@clustercoding.com', 'fe01ce2a7fbac8fafaed7c982a04e229', '', '', '', '', '1-658-8547', 'm', '0000-00-00', 'ec4a29c46e657eb9d9d5ef1e27665f41.jpg', '', '', '', '', '', '', '', '', '', '', '', '', 5, 1, 0, '2017-04-24 01:14:43', '2017-08-29 08:05:26'),
(8, NULL, 'Maruf', 'Hassan', 'maruf.hasan', 'maruf.hasan@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', '01751077581', 'm', '0000-00-00', '673dfc66f3cdb06969d34600b0813238.png', '', '', '', '', '', '', '', '', '', '', '', '', 5, 1, 0, '2017-04-24 01:21:45', '2017-04-24 10:06:17'),
(9, NULL, 'Noyon', 'Haque', 'noyon2nil', 'noyon2nil@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', '01717888464', 'm', '0000-00-00', 'b43e7fc934a3d143aff2e67d1ce78163.png', '', '', '', '', '', '', '', '', '', '', '', '', 2, 1, 0, '2017-04-24 10:15:22', '0000-00-00 00:00:00'),
(10, NULL, 'Masud', 'Rana', 'masud.rana', 'masud.rana@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', '', '', '', '', '01761913331', 'm', '0000-00-00', '', '', '', '', '', '', '', '', '', '', '', '', '', 2, 0, 0, '2017-04-24 23:39:23', '2017-08-20 21:37:47'),
(11, 1, 'Shahid', 'nawaz', 'msn', 'msn@gmail.com', '25d55ad283aa400af464c76d713c07ad', '', '', '', '', '', '', '0000-00-00', NULL, '', '', '', '', '', '', '', '', '', '', '', '', 5, 1, 0, '2017-05-02 19:59:20', '0000-00-00 00:00:00'),
(12, 2, 'Arif', 'khan', 'arif.khan', 'arif@gmail.com', 'e807f1fcf82d132f9bb018ca6738a19f', NULL, NULL, NULL, NULL, '1761913331', 'm', NULL, '8a375cf0aff66492485b42c1716e4ba3.png', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-05-02 20:04:33', '2017-05-07 23:22:49'),
(13, 1, 'Azim', 'Sonny', 'amsonny', 'amsonny@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-05-20 01:18:24', NULL),
(14, 1, 'morium', 'khatun', 'mrm8989', 'mar1231@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-07-30 15:09:01', NULL),
(15, 1, 'mottaleb', 'hossain', 'mh9272', 'mottaleb@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-08-02 00:59:42', NULL),
(16, 2, 'Oliur Rahman', 'Lee', 'leevai', 'leevai@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-08-02 01:00:59', NULL),
(17, 3, 'alamin', 'bari', 'alaminbari', 'shahid2mailbd@gmail.com', 'bad670f05ad869901d90a37aef62572c', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-08-02 01:06:04', NULL),
(18, 1, 'rakibul', 'hasan', 'rakibhasan', 'rakibhasan@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, '01761913331', 'm', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-08-02 01:17:20', '2017-08-02 23:31:18'),
(19, 2, 'nahid', 'haque', 'mnh', 'mnh@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-08-05 17:02:48', NULL),
(20, NULL, 'demo', 'Admin', 'admin', 'brettashapiro@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, '435435', 'm', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 2, 1, 1, '2017-08-10 16:47:53', NULL),
(21, 1, 'Skip', 'Redding', 'sredding', 'sredding@mailinator.com', '25f9e794323b453885f5181f1b624d0b', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-08-10 22:29:19', NULL),
(22, 1, 'narendra', 'panti', 'narendrapanti', 'narendrapanti@gmail.com', 'baa1d7c4f269dbdf9e5290a2d56c8053', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-08-12 17:08:53', NULL),
(23, 1, 'daniel', 'cole', 'bethechange', 'bethechangeecampaign@gmail.com', '7a46c4fe93082879552ec4d2acb39cc2', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, 0, '2017-08-12 22:00:45', NULL),
(24, 1, 'tonio', 'perrini', 'tonio18153', 'latitoni@gmail.com', '8dd90a9de49c98ef3e8c4c52f759acdd', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-08-13 00:29:39', NULL),
(25, 2, 'bbbb', 'bbbbb', 'new', 'trash@trash-mail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-08-16 05:13:25', NULL),
(26, 3, 'nahid', 'haque', 'nahidhaque33', 'nahidhaque33@gmail.com', 'cc203d974dba8bbc45663dd992c4aac5', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-08-19 04:17:01', NULL),
(27, 2, 'Clint', 'Park', 'cpmoore', 'clinton37091@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, '615-455-8748', 'm', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 1, '2017-08-23 18:07:51', '2017-08-23 18:23:04'),
(28, 2, 'Clint', 'Moore', 'park25', 'clinton37091@gmail.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, '1-000-000-0000', 'm', NULL, '', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 1, '2017-08-30 08:10:26', '2017-08-30 08:27:22'),
(29, 3, 'Gabriel', 'Cofre', 'Gabocof', 'ipmaxchile@gmail.com', 'c158ae7e3a59ec8a645bcc72536016bb', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-09-03 17:45:51', NULL),
(30, 3, 'enter', 'bla', 'blabla', 'ba@bla.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-09-12 05:03:36', NULL),
(31, 3, 'Angus', 'Chai-Hong', 'Angusch21', 'angusch21@yahoo.com', '25d55ad283aa400af464c76d713c07ad', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 1, 0, '2017-09-18 22:48:31', NULL),
(32, 4, 'shahid', 'nawaz', 'shahid2mailbd', 'shahid2mailbd@gmail.com', '1bbd886460827015e5d605ed44252251', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 5, 0, 0, '2017-09-23 03:40:55', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `dir_articles`
--
ALTER TABLE `dir_articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `dir_article_comments`
--
ALTER TABLE `dir_article_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `dir_article_hearts`
--
ALTER TABLE `dir_article_hearts`
  ADD PRIMARY KEY (`heart_id`);

--
-- Indexes for table `dir_bookmarks`
--
ALTER TABLE `dir_bookmarks`
  ADD PRIMARY KEY (`bookmark_id`);

--
-- Indexes for table `dir_categories`
--
ALTER TABLE `dir_categories`
  ADD PRIMARY KEY (`category_id`);

--
-- Indexes for table `dir_cities`
--
ALTER TABLE `dir_cities`
  ADD PRIMARY KEY (`city_id`);

--
-- Indexes for table `dir_countries`
--
ALTER TABLE `dir_countries`
  ADD PRIMARY KEY (`country_id`);

--
-- Indexes for table `dir_images`
--
ALTER TABLE `dir_images`
  ADD PRIMARY KEY (`image_id`);

--
-- Indexes for table `dir_image_comments`
--
ALTER TABLE `dir_image_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `dir_image_hearts`
--
ALTER TABLE `dir_image_hearts`
  ADD PRIMARY KEY (`heart_id`);

--
-- Indexes for table `dir_keywords`
--
ALTER TABLE `dir_keywords`
  ADD PRIMARY KEY (`keyword_id`);

--
-- Indexes for table `dir_listing`
--
ALTER TABLE `dir_listing`
  ADD PRIMARY KEY (`listing_id`);

--
-- Indexes for table `dir_packages`
--
ALTER TABLE `dir_packages`
  ADD PRIMARY KEY (`package_id`);

--
-- Indexes for table `dir_payments`
--
ALTER TABLE `dir_payments`
  ADD PRIMARY KEY (`payment_id`);

--
-- Indexes for table `dir_products`
--
ALTER TABLE `dir_products`
  ADD PRIMARY KEY (`product_id`);

--
-- Indexes for table `dir_product_comments`
--
ALTER TABLE `dir_product_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `dir_product_hearts`
--
ALTER TABLE `dir_product_hearts`
  ADD PRIMARY KEY (`heart_id`);

--
-- Indexes for table `dir_services`
--
ALTER TABLE `dir_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `dir_service_comments`
--
ALTER TABLE `dir_service_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `dir_service_hearts`
--
ALTER TABLE `dir_service_hearts`
  ADD PRIMARY KEY (`heart_id`);

--
-- Indexes for table `dir_subscribers`
--
ALTER TABLE `dir_subscribers`
  ADD PRIMARY KEY (`subscriber_id`);

--
-- Indexes for table `dir_sub_categories`
--
ALTER TABLE `dir_sub_categories`
  ADD PRIMARY KEY (`sub_category_id`);

--
-- Indexes for table `dir_videos`
--
ALTER TABLE `dir_videos`
  ADD PRIMARY KEY (`video_id`);

--
-- Indexes for table `dir_video_comments`
--
ALTER TABLE `dir_video_comments`
  ADD PRIMARY KEY (`comment_id`);

--
-- Indexes for table `dir_video_hearts`
--
ALTER TABLE `dir_video_hearts`
  ADD PRIMARY KEY (`heart_id`);

--
-- Indexes for table `port_blogs`
--
ALTER TABLE `port_blogs`
  ADD PRIMARY KEY (`blog_id`);

--
-- Indexes for table `port_blog_categories`
--
ALTER TABLE `port_blog_categories`
  ADD PRIMARY KEY (`blog_category_id`);

--
-- Indexes for table `port_clients`
--
ALTER TABLE `port_clients`
  ADD PRIMARY KEY (`client_id`);

--
-- Indexes for table `port_educational_experiences`
--
ALTER TABLE `port_educational_experiences`
  ADD PRIMARY KEY (`educational_experience_id`);

--
-- Indexes for table `port_portfolio`
--
ALTER TABLE `port_portfolio`
  ADD PRIMARY KEY (`portfolio_id`);

--
-- Indexes for table `port_portfolio_categories`
--
ALTER TABLE `port_portfolio_categories`
  ADD PRIMARY KEY (`portfolio_category_id`);

--
-- Indexes for table `port_prices`
--
ALTER TABLE `port_prices`
  ADD PRIMARY KEY (`price_id`);

--
-- Indexes for table `port_services`
--
ALTER TABLE `port_services`
  ADD PRIMARY KEY (`service_id`);

--
-- Indexes for table `port_skills`
--
ALTER TABLE `port_skills`
  ADD PRIMARY KEY (`skill_id`);

--
-- Indexes for table `port_working_experiences`
--
ALTER TABLE `port_working_experiences`
  ADD PRIMARY KEY (`working_experience_id`);

--
-- Indexes for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  ADD PRIMARY KEY (`admin_id`);

--
-- Indexes for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  ADD PRIMARY KEY (`setting_id`);

--
-- Indexes for table `tbl_users`
--
ALTER TABLE `tbl_users`
  ADD PRIMARY KEY (`user_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `dir_articles`
--
ALTER TABLE `dir_articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dir_article_comments`
--
ALTER TABLE `dir_article_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dir_article_hearts`
--
ALTER TABLE `dir_article_hearts`
  MODIFY `heart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dir_bookmarks`
--
ALTER TABLE `dir_bookmarks`
  MODIFY `bookmark_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- AUTO_INCREMENT for table `dir_categories`
--
ALTER TABLE `dir_categories`
  MODIFY `category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `dir_cities`
--
ALTER TABLE `dir_cities`
  MODIFY `city_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dir_countries`
--
ALTER TABLE `dir_countries`
  MODIFY `country_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `dir_images`
--
ALTER TABLE `dir_images`
  MODIFY `image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
--
-- AUTO_INCREMENT for table `dir_image_comments`
--
ALTER TABLE `dir_image_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `dir_image_hearts`
--
ALTER TABLE `dir_image_hearts`
  MODIFY `heart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
--
-- AUTO_INCREMENT for table `dir_keywords`
--
ALTER TABLE `dir_keywords`
  MODIFY `keyword_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `dir_listing`
--
ALTER TABLE `dir_listing`
  MODIFY `listing_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `dir_packages`
--
ALTER TABLE `dir_packages`
  MODIFY `package_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `dir_payments`
--
ALTER TABLE `dir_payments`
  MODIFY `payment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dir_products`
--
ALTER TABLE `dir_products`
  MODIFY `product_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dir_product_comments`
--
ALTER TABLE `dir_product_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `dir_product_hearts`
--
ALTER TABLE `dir_product_hearts`
  MODIFY `heart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dir_services`
--
ALTER TABLE `dir_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dir_service_comments`
--
ALTER TABLE `dir_service_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dir_service_hearts`
--
ALTER TABLE `dir_service_hearts`
  MODIFY `heart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dir_subscribers`
--
ALTER TABLE `dir_subscribers`
  MODIFY `subscriber_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `dir_sub_categories`
--
ALTER TABLE `dir_sub_categories`
  MODIFY `sub_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `dir_videos`
--
ALTER TABLE `dir_videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `dir_video_comments`
--
ALTER TABLE `dir_video_comments`
  MODIFY `comment_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `dir_video_hearts`
--
ALTER TABLE `dir_video_hearts`
  MODIFY `heart_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `port_blogs`
--
ALTER TABLE `port_blogs`
  MODIFY `blog_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `port_blog_categories`
--
ALTER TABLE `port_blog_categories`
  MODIFY `blog_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `port_clients`
--
ALTER TABLE `port_clients`
  MODIFY `client_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
--
-- AUTO_INCREMENT for table `port_educational_experiences`
--
ALTER TABLE `port_educational_experiences`
  MODIFY `educational_experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `port_portfolio`
--
ALTER TABLE `port_portfolio`
  MODIFY `portfolio_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
--
-- AUTO_INCREMENT for table `port_portfolio_categories`
--
ALTER TABLE `port_portfolio_categories`
  MODIFY `portfolio_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `port_prices`
--
ALTER TABLE `port_prices`
  MODIFY `price_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `port_services`
--
ALTER TABLE `port_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `port_skills`
--
ALTER TABLE `port_skills`
  MODIFY `skill_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `port_working_experiences`
--
ALTER TABLE `port_working_experiences`
  MODIFY `working_experience_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `tbl_admin`
--
ALTER TABLE `tbl_admin`
  MODIFY `admin_id` int(2) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tbl_settings`
--
ALTER TABLE `tbl_settings`
  MODIFY `setting_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `tbl_users`
--
ALTER TABLE `tbl_users`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
