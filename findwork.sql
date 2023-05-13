-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Feb 01, 2023 at 09:20 PM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 7.4.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `findwork`
--

-- --------------------------------------------------------

--
-- Table structure for table `accountinfo`
--

CREATE TABLE `accountinfo` (
  `id` int(11) NOT NULL,
  `owner_id` varchar(200) NOT NULL,
  `username` varchar(200) NOT NULL,
  `password` varchar(300) NOT NULL,
  `email` varchar(300) NOT NULL,
  `type` int(11) NOT NULL,
  `profile_pic` varchar(300) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `user_status` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `accountinfo`
--

INSERT INTO `accountinfo` (`id`, `owner_id`, `username`, `password`, `email`, `type`, `profile_pic`, `date_created`, `user_status`) VALUES
(6, '63c8f1ffd66151674113535', 'rodolfo123', 'bde4e207103c0f20d11e7659b3f1679c', 'rodolfo123@gmail.com', 1, '63c8f1ffd5dc2.jpeg', '2023-02-01 19:31:05', '2023-02-02 03:31:05'),
(7, '63c8f30fe81ec1674113807', 'dicklomibao', '25d10a00b829e90b28ca023369628f7b', 'dicklomibao@gmail.com', 2, '63c8f30fe68c7.jpeg', '2023-02-01 20:17:47', '2023-02-02 04:17:47'),
(8, '63c8f3c9655a91674113993', 'jude123', '3ebfccbe50ae14e83f1dbd38079a4ccb', 'jude123@gmail.com', 1, '63c8f3c964d37.jpg', '2023-02-01 12:45:35', '2023-02-01 20:45:35'),
(9, '63cabcdd26b5d1674231005', 'demark123', 'dc73f6f12b4d58f671499b603f2974fd', 'demark123@gmail.com', 2, '63cabcdd25d79.jpg', '2023-01-20 16:10:05', NULL),
(10, '63d2976ea3e101674745710', 'pat123', '8e3a8d3e644e608d25ec40162988a137', 'pat123@gmail.com', 1, '63d2976ea35d9.jpeg', '2023-01-26 15:08:30', NULL),
(11, '63d299558a1ca1674746197', 'lindasy123', 'de2d7aa4ced4f0e666763f28aa3d8720', 'lindasy123@gmail.com', 1, '63d2995589998.jpeg', '2023-01-26 15:16:37', NULL),
(12, '63d299f178f0d1674746353', 'tadhana123', 'f47f5cc05bb0252a940fa11e253d246a', 'tadhana123@gmail.com', 2, '63d299f178734.jpeg', '2023-01-31 04:36:31', '2023-01-31 12:36:31'),
(13, '63d29ce4ad7e71674747108', 'mark123', '6d295738eb6579053ac46a9ca1902583', 'mark123@gmail.com', 2, '63d29ce4ad028.jpeg', '2023-02-01 12:45:10', '2023-02-01 20:45:10'),
(14, '63d29eff4c5bd1674747647', 'juan123', 'f5737d25829e95b9c234b7fa06af8736', 'juan1234@gmail.com', 1, '63d29eff4bdd6.jpeg', '2023-01-26 15:40:47', NULL),
(15, '63d3b711b74171674819345', 'daryl123', '8ce6ab070cc65ba18eac5c4bbd86fb35', 'daryl123@gmail.com', 1, '63d3b711b617e.jpeg', '2023-01-27 11:35:45', NULL),
(16, '63d3b766ecc081674819430', 'nica123', 'b85ed765ccafb2b294f0e6dabbb76b22', 'nica123@gmail.com', 1, '63d3b766ec098.jpeg', '2023-01-27 11:37:10', NULL),
(17, '63c8f1ffd668573741095238', 'admin', '25d10a00b829e90b28ca023369628f7b', 'admin@gmail.com', 3, '63c8f30fe68c7.jpeg', '2023-02-01 19:49:55', '2023-02-02 03:49:55'),
(18, '63d3e1ae136af1674830254', 'may123', 'ec0c028a42b8633bd12d0f420fefaa77', 'may123@gmail.com', 1, '63d3e1ae130f4.jpeg', '2023-01-27 14:37:34', NULL),
(19, '63d3e1fb722b11674830331', 'june123', '4c7878dc5b115367709485160d358dfd', 'june123@gmail.com', 1, '63d3e1fb71920.jpeg', '2023-01-27 14:38:51', NULL),
(20, '63d3e24c149c31674830412', 'asd123', 'bfd59291e825b5f2bbf1eb76569f8fe7', 'asd13323@gmail.com', 1, '63d3e24c1442a.jpeg', '2023-01-27 14:40:12', NULL),
(21, '63d3e2d69574e1674830550', 'asdad', '056f32ee5cf49404607e368bd8d3f2af', 'asdad@gmail.com', 1, '63d3e2d694d39.jpeg', '2023-01-27 14:42:30', NULL),
(22, '63d3e458ee7561674830936', '123123', '4297f44b13955235245b2497399d7a93', '123121233@gmail.com', 1, '63d3e458ee1be.jpg', '2023-01-27 14:48:56', NULL),
(23, '63d3e4c7b94061674831047', 'april123', '3f8c1d9e97bbd72e92bceba6de0bec65', 'april123@gmail.com', 1, '63d3e4c7b82cb.jpeg', '2023-01-27 14:50:47', NULL),
(24, '63d469e2714f31674865122', 'lava123', '51488fccd1dc4e597d128fdcf9fd9906', 'lava123@gmail.com', 1, '63d469e270791.jpeg', '2023-01-28 00:18:42', NULL),
(25, '63d487a992dd91674872745', 'mynew', '6e3d95777e6f00ad594a0cea3098fa7e', 'mynew@gmail.com', 1, '63d487a991ed2.jpeg', '2023-01-28 02:25:45', NULL),
(26, '63d4dfde3ccf61674895326', 'Mayora', '00f2efb0926123c0b004b370727d8f89', 'Mayora@gmail.com', 1, '63d4dfde3c4c9.jpeg', '2023-01-28 08:42:06', NULL),
(31, '63d4ec6eaa55c1674898542', 'asdad123', '07e1d1d9fe783c34d273d103d3e4cad4', 'asdad123@gmail.com', 1, '63d4ec6ea9d83.jpg', '2023-01-28 09:35:42', NULL),
(32, '63d50ca46ecfa1674906788', 'maya', 'b2693d9c2124f3ca9547b897794ac6a1', 'maya@gmail.com', 1, '63d50ca46d738.jpeg', '2023-01-28 11:53:08', NULL),
(33, '63d50df3a8e001674907123', 'asdad11', '5d0b5ab2ed9a5975e43244b42b905cbe', 'asdad11@gmail.com', 2, '63d50df3a7d53.jpeg', '2023-01-28 11:58:43', NULL),
(34, '63d50e46795cb1674907206', 'hahaha', '101a6ec9f938885df0a44f20458d2eb4', 'hahaha@gmail.com', 1, '63d50e4678ddf.jpg', '2023-01-28 12:00:06', NULL),
(35, '63d50f82c93a51674907522', 'kalamo', 'dbeb7f6634dec5897c097ae9f1750c66', 'kalamo@gmail.com', 1, '63d50f82c8955.jpeg', '2023-01-28 12:05:22', NULL),
(36, '63d51c12f3e0d1674910738', 'Rye', '4e3b6f9a0ec93941b64efc416638db4c', 'Rye@gmail.com', 1, '63d51c12f35bd.jpeg', '2023-01-28 12:58:59', NULL),
(37, '63dab2dcdb8401675277020', '123', '4297f44b13955235245b2497399d7a93', '123@gmail.com', 2, '63dab2dcdafe1.jpg', '2023-02-01 18:43:40', NULL),
(43, '63dab4d46a8e71675277524', 'ikawatako', '363b2c16817e550ae5e75b057f877dc5', 'ikawatako@gmail.com', 2, '63dab4d46a100.jpg', '2023-02-01 19:14:28', '2023-02-02 03:14:28'),
(44, '63dabaeeaaf141675279086', 'tagpuan', 'de9823a2544a7c45536aeeebb02d3d9d', 'tagpuan@gmail.com', 2, '63dabaeeaa4bf.jpeg', '2023-02-01 19:22:56', '2023-02-02 03:22:56'),
(45, '63dabc47e64ed1675279431', 'patpat', '67b2e21ecdb803021eb5ae1e2fd4596c', 'patpat@gmail.com', 1, '63dabc47e5cc3.jpeg', '2023-02-01 20:17:22', '2023-02-02 04:17:22'),
(46, '63dabd7eb34171675279742', 'free', 'aa2d6e4f578eb0cfaba23beef76c2194', 'free@gmail.com', 2, '63dabd7eb2bb6.jpeg', '2023-02-01 19:54:27', '2023-02-02 03:54:27'),
(47, '63dabee56b2801675280101', 'kolokoy', 'be0ed2ae521af13813513373da46eb15', 'kolokoy@gmail.com', 2, '63dabee56a96a.jpeg', '2023-02-01 20:17:38', '2023-02-02 04:17:38');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(11) NOT NULL,
  `title` varchar(200) NOT NULL,
  `descriptions` varchar(500) NOT NULL,
  `date_created` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `title`, `descriptions`, `date_created`) VALUES
(1, 'Web Development', 'Freelancers in this category specialize in building and maintaining websites using languages like HTML, CSS, and JavaScript.', '2023-01-03 21:20:33'),
(2, 'Graphic Design', 'Freelancers in this category create visual designs for clients, including logos, graphics, and layouts for print and digital media.', '2023-01-03 21:20:33'),
(3, 'Writing and Editing', 'Freelancers in this category provide writing and editing services for a variety of clients, including businesses, publications, and individuals.', '2023-01-03 21:20:33'),
(4, 'Translation', 'Freelancers in this category offer translation services for a variety of languages and industries.', '2023-01-03 21:20:33'),
(5, 'Virtual Assistance', 'Freelancers in this category offer a range of administrative and personal assistance services remotely.', '2023-01-03 21:20:33'),
(6, 'Customer Service', 'Freelancers in this category provide customer service support for businesses, including answering customer inquiries and resolving complaints.', '2023-01-03 21:20:33'),
(7, 'Marketing', 'Freelancers in this category help businesses and individuals with marketing efforts, including market research, advertising, and social media management.', '2023-01-03 21:20:33'),
(8, 'Data Entry', 'Freelancers in this category provide data entry services, including transcribing information from one format to another.', '2023-01-03 21:20:33'),
(9, 'Project Management', 'Freelancers in this category assist with the planning, execution, and tracking of projects for businesses and organizations.', '2023-01-03 21:20:33'),
(10, 'Photography', 'Freelancers in this category provide photography services for a variety of purposes, including events, products, and marketing materials.', '2023-01-03 21:20:33'),
(11, 'Video Editing', 'Freelancers in this category provide video editing services, including cutting and splicing footage, adding effects and transitions, and preparing videos for publication.', '2023-01-03 21:20:33'),
(12, 'Audio Editing', 'Freelancers in this category provide audio editing services, including cleaning up and enhancing recorded audio, and preparing it for publication.', '2023-01-03 21:20:33'),
(13, 'Music Production', 'Freelancers in this category create and produce music for a variety of purposes, including commercials, movies, and video games.', '2023-01-03 21:20:33'),
(14, 'Animation', 'Freelancers in this category create animated graphics and videos for a variety of clients and industries.', '2023-01-03 21:20:33'),
(15, '3D Modeling', 'Freelancers in this category create three-dimensional models and designs for a variety of purposes, including product visualization, architectural renderings, and special effects.', '2023-01-03 21:20:33'),
(16, 'Game Development', 'Freelancers in this category design and develop video games and other interactive experiences.', '2023-01-03 21:20:33'),
(17, 'Software Development', 'Freelancers in this category create software applications for a variety of clients and industries.', '2023-01-03 21:20:33'),
(18, 'IT Support', 'Freelancers in this category provide technical support for businesses and individuals, including troubleshooting hardware and software issues.', '2023-01-03 21:20:33'),
(19, 'Network Administration', 'Freelancers in this category manage and maintain computer networks for businesses and organizations.', '2023-01-03 21:20:33'),
(20, 'Security', 'Freelancers in this category specialize in computer and network security, including threat prevention and data protection.', '2023-01-03 21:20:33'),
(21, 'Cloud Computing', 'Freelancers in this category provide expertise in cloud computing technologies and services, including migration, integration, and maintenance.', '2023-01-03 21:20:33'),
(22, 'Big Data', 'Freelancers in this category work with large sets of data, including storage, processing, and analysis for businesses and organizations.', '2023-01-03 21:20:33'),
(23, 'Machine Learning', 'Freelancers in this category apply machine learning techniques and technologies to solve problems and improve systems for businesses and organizations.', '2023-01-03 21:20:33'),
(24, 'Artificial Intelligence', 'Freelancers in this category work with artificial intelligence technologies and techniques to solve problems and improve systems for businesses and organizations.', '2023-01-03 21:20:33');

-- --------------------------------------------------------

--
-- Table structure for table `conversationlist`
--

CREATE TABLE `conversationlist` (
  `id` varchar(200) NOT NULL,
  `users` varchar(1000) NOT NULL,
  `status` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `conversationlist`
--

INSERT INTO `conversationlist` (`id`, `users`, `status`) VALUES
('63d6617d18aef1674994045', '63c8f30fe81ec1674113807-63d4dfde3ccf61674895326', '2023-01-29 20:07:25'),
('63d69c2ab65071675009066', '63c8f30fe81ec1674113807-63c8f3c9655a91674113993', '2023-01-30 00:17:46'),
('63d6a15899c021675010392', '63c8f30fe81ec1674113807-63c8f1ffd66151674113535', '2023-01-30 00:39:52'),
('63d89a42f3ad41675139650', '63d29ce4ad7e71674747108-63c8f1ffd66151674113535', '2023-01-31 12:34:10'),
('63d9689073a5a1675192464', '63c8f1ffd66151674113535-', '2023-02-01 03:14:24'),
('63d9d9bdc312d1675221437', '63c8f30fe81ec1674113807-', '2023-02-01 11:17:17'),
('63da5d5391bbf1675255123', '63d29ce4ad7e71674747108-63c8f3c9655a91674113993', '2023-02-01 20:38:43'),
('63da7bea064f71675262954', '63c8f1ffd66151674113535-63c8f1ffd66151674113535', '2023-02-01 22:49:14'),
('63dabbf240b771675279346', '63dabaeeaaf141675279086-63d4dfde3ccf61674895326', '2023-02-02 03:22:26'),
('63dabdc6400d81675279814', '63dabd7eb34171675279742-63dabc47e64ed1675279431', '2023-02-02 03:30:14'),
('63dabe451b8891675279941', '63dabd7eb34171675279742-63c8f1ffd66151674113535', '2023-02-02 03:32:21'),
('63dabfba5d8881675280314', '63dabc47e64ed1675279431-63dabee56b2801675280101', '2023-02-02 03:38:34');

-- --------------------------------------------------------

--
-- Table structure for table `freelancer_money`
--

CREATE TABLE `freelancer_money` (
  `id` int(11) NOT NULL,
  `owner_id` varchar(2000) NOT NULL,
  `price` float NOT NULL,
  `type` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `freelancer_money`
--

INSERT INTO `freelancer_money` (`id`, `owner_id`, `price`, `type`, `date_created`) VALUES
(1, '63c8f30fe81ec1674113807', 6400, 'add', '2023-02-01 22:23:53'),
(2, '63c8f30fe81ec1674113807', 400, 'minus', '2023-02-01 15:45:41'),
(3, '63c8f30fe81ec1674113807', 480, 'add', '2023-02-01 22:50:13'),
(4, '63dabee56b2801675280101', 800, 'add', '2023-02-02 03:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `income_from_memberfee`
--

CREATE TABLE `income_from_memberfee` (
  `id` int(11) NOT NULL,
  `from_id` varchar(200) NOT NULL,
  `amount` float NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `income_from_memberfee`
--

INSERT INTO `income_from_memberfee` (`id`, `from_id`, `amount`, `date_created`) VALUES
(1, '63d4ec6eaa55c1674898542', 150, '2023-01-28 17:36:20'),
(2, '63d50ca46ecfa1674906788', 150, '2023-01-28 19:54:07'),
(3, '63d50e46795cb1674907206', 150, '2023-01-28 20:01:03'),
(4, '63d50f82c93a51674907522', 150, '2023-01-28 20:05:47'),
(5, '63d51c12f3e0d1674910738', 150, '2023-01-28 20:59:52'),
(6, '63d50f82c93a51674907522', 150, '2023-01-30 20:31:42'),
(7, '63dabaeeaaf141675279086', 150, '2023-02-02 03:22:06'),
(8, '63dabd7eb34171675279742', 150, '2023-02-02 03:29:42'),
(9, '63dabee56b2801675280101', 150, '2023-02-02 03:35:21');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` varchar(200) NOT NULL,
  `owner_id` varchar(200) NOT NULL,
  `title` varchar(500) NOT NULL,
  `descriptions` varchar(10000) NOT NULL,
  `category_id` int(10) NOT NULL,
  `level` varchar(200) NOT NULL,
  `required_skills` varchar(2000) NOT NULL,
  `budget` float NOT NULL,
  `due_date` datetime NOT NULL,
  `date_created` datetime DEFAULT NULL,
  `status` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `owner_id`, `title`, `descriptions`, `category_id`, `level`, `required_skills`, `budget`, `due_date`, `date_created`, `status`) VALUES
('63c8f2c9e83011674113737', '63c8f1ffd66151674113535', 'Looking for developer who can create flutter application.', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Molestiae dolorum, vel voluptate minus voluptates, nam aut quam dolore vitae perspiciatis amet quisquam aspernatur tempore quo illum ipsum nulla commodi explicabo.', 17, 'Expert', 'DART\r\nFLUTTER\r\nPROVIDER', 5000, '2023-02-20 00:00:00', '2023-01-19 15:35:37', 1),
('63c8f434359171674114100', '63c8f3c9655a91674113993', 'I need a great php developer to create ecommerce website.', 'Lorem ipsum, dolor sit amet consectetur adipisicing elit. Inventore unde doloribus numquam veritatis quos omnis labore architecto a asperiores optio neque, possimus quia alias sequi debitis eligendi eaque. Excepturi, reprehenderit.', 1, 'Intermediate', 'PHP\r\nCSS\r\nHTML\r\nJS\r\nBOOTSTRAP', 10000, '2023-02-20 00:00:00', '2023-01-19 15:41:40', 3),
('63caa56ed97041674225006', '63c8f1ffd66151674113535', 'I need graphic designer.', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit. Non qui, ipsum laborum at optio eum consequuntur facilis autem natus error modi corrupti soluta accusantium et delectus! Omnis tenetur accusantium laboriosam?', 2, 'Intermediate', 'PHOTOSHOP\r\nPAINT', 1000, '2023-02-20 00:00:00', '2023-01-20 22:30:06', 3),
('63d245b048fc61674724784', '63c8f1ffd66151674113535', 'I need php develpoer ', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ea reiciendis voluptates eum nisi quam culpa eius doloribus est libero et, aspernatur iusto laboriosam beatae possimus quod dolor voluptas aut!\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ea reiciendis voluptates eum nisi quam culpa eius doloribus est libero et, aspernatur iusto laboriosam beatae possimus quod dolor voluptas aut!\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus ea reiciendis voluptates eum nisi quam culpa eius doloribus est libero et, aspernatur iusto laboriosam beatae possimus quod dolor voluptas aut!', 17, 'Expert', 'PHP\r\nLARAVEL\r\nCSS\r\nHTML\r\nJS\r\nAJAX', 20000, '2023-02-20 00:00:00', '2023-01-26 17:19:44', 3),
('63d4e52c0e1281674896684', '63d4dfde3ccf61674895326', 'Looking for graphic designer', '  lorem\r\n lorem\r\n lorem\r\n lorem\r\n lorem\r\n', 8, 'Intermediate', 'kahit ano', 500, '2023-02-20 00:00:00', '2023-01-28 17:04:44', 1),
('63dabd1854eb51675279640', '63dabc47e64ed1675279431', 'Looking for frontend', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Odio repudiandae distinctio quas ullam accusantium, error quidem! Ratione, odio. Sit magni inventore rem. Nihil ullam, harum doloremque quisquam blanditiis amet minima.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Odio repudiandae distinctio quas ullam accusantium, error quidem! Ratione, odio. Sit magni inventore rem. Nihil ullam, harum doloremque quisquam blanditiis amet minima.\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Odio repudiandae distinctio quas ullam accusantium, error quidem! Ratione, odio. Sit magni inventore rem. Nihil ullam, harum doloremque quisquam blanditiis amet minima.', 1, 'Intermediate', 'HTML\r\nCSS\r\nJS', 2000, '2023-02-10 00:00:00', '2023-02-02 03:27:20', 3);

-- --------------------------------------------------------

--
-- Table structure for table `job_income`
--

CREATE TABLE `job_income` (
  `id` varchar(200) NOT NULL,
  `jobid` varchar(200) NOT NULL,
  `client_id` varchar(200) NOT NULL,
  `freelancer_id` varchar(200) NOT NULL,
  `amount` float NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `job_income`
--

INSERT INTO `job_income` (`id`, `jobid`, `client_id`, `freelancer_id`, `amount`, `date_created`) VALUES
('63da75f997a191675261433', '63d245b048fc61674724784', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 8000, '2023-02-01 22:23:53'),
('63da7c250fade1675263013', '63caa56ed97041674225006', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 600, '2023-02-01 22:50:13'),
('63dac0cf0163b1675280591', '63dabd1854eb51675279640', '63dabc47e64ed1675279431', '63dabee56b2801675280101', 1000, '2023-02-02 03:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `conversationid` varchar(200) NOT NULL,
  `content` mediumtext NOT NULL,
  `sender` varchar(200) NOT NULL,
  `type` varchar(20) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `conversationid`, `content`, `sender`, `type`, `status`, `date_created`) VALUES
(71, '63d69c2ab65071675009066', 'asad', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 01:54:12'),
(72, '63d69c2ab65071675009066', '123', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 01:54:42'),
(73, '63d69c2ab65071675009066', 'asadasd', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 01:59:22'),
(74, '63d69c2ab65071675009066', 'asdasd', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 01:59:25'),
(75, '63d69c2ab65071675009066', 'asdadasd', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 02:00:56'),
(76, '63d69c2ab65071675009066', 'asdad', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 02:00:58'),
(77, '63d69c2ab65071675009066', '63d6b4e2474371675015394.gif', '63c8f30fe81ec1674113807', 'gif', 'unread', '2023-01-30 02:03:14'),
(78, '63d69c2ab65071675009066', 'asdad\nasda\ndasd', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 02:09:13'),
(79, '63d69c2ab65071675009066', 'asdada', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 02:09:15'),
(80, '63d69c2ab65071675009066', 'ahahaha', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 02:09:18'),
(81, '63d69c2ab65071675009066', '63d6b6957143f1675015829.jpg', '63c8f30fe81ec1674113807', 'jpg', 'unread', '2023-01-30 02:10:29'),
(82, '63d69c2ab65071675009066', '63d6b6a3bf2ae1675015843.jpg', '63c8f30fe81ec1674113807', 'jpg', 'unread', '2023-01-30 02:10:43'),
(83, '63d69c2ab65071675009066', 'okok', '63c8f3c9655a91674113993', 'normal', 'unread', '2023-01-30 02:17:33'),
(84, '63d69c2ab65071675009066', '63d6b849061fd1675016265.zip', '63c8f30fe81ec1674113807', 'zip', 'unread', '2023-01-30 02:17:45'),
(85, '63d69c2ab65071675009066', 'thank you', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 02:18:40'),
(86, '63d69c2ab65071675009066', 'ok', '63c8f3c9655a91674113993', 'normal', 'unread', '2023-01-30 02:21:16'),
(87, '63d69c2ab65071675009066', 'd wow', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 02:21:22'),
(88, '63d69c2ab65071675009066', 'ok anb ?', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 02:21:27'),
(89, '63d69c2ab65071675009066', '63d6b95da107f1675016541.jpeg', '63c8f3c9655a91674113993', 'jpeg', 'unread', '2023-01-30 02:22:21'),
(90, '63d69c2ab65071675009066', 'beautiful', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 02:22:33'),
(91, '63d69c2ab65071675009066', 'looks nicey', '63c8f3c9655a91674113993', 'normal', 'unread', '2023-01-30 02:22:45'),
(92, '63d69c2ab65071675009066', 'yes of course', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 02:22:50'),
(93, '63d69c2ab65071675009066', '63d6b9881c8a71675016584.zip', '63c8f30fe81ec1674113807', 'zip', 'unread', '2023-01-30 02:23:04'),
(94, '63d69c2ab65071675009066', 'asd', '63c8f3c9655a91674113993', 'normal', 'unread', '2023-01-30 02:23:31'),
(95, '63d69c2ab65071675009066', '63d6ba68ee7b51675016808.jpeg', '63c8f30fe81ec1674113807', 'jpeg', 'unread', '2023-01-30 02:26:48'),
(96, '63d69c2ab65071675009066', '😍🤩🥰', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 02:31:06'),
(97, '63d69c2ab65071675009066', 'how are yu', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 18:07:29'),
(98, '63d69c2ab65071675009066', 'dick lomibao ako\nhahahah', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 18:12:15'),
(99, '63d69c2ab65071675009066', '🤩😍🥰', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 18:12:24'),
(100, '63d69c2ab65071675009066', '63d79816e04c81675073558.jpg', '63c8f30fe81ec1674113807', 'jpg', 'unread', '2023-01-30 18:12:38'),
(101, '63d69c2ab65071675009066', '63d7c0966db0d1675083926.jpg', '63c8f30fe81ec1674113807', 'jpg', 'unread', '2023-01-30 21:05:26'),
(102, '63d69c2ab65071675009066', '🤩😍🥰😍🤩', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 21:05:37'),
(103, '63d69c2ab65071675009066', '63d7c0be132ee1675083966.jpg', '63c8f30fe81ec1674113807', 'jpg', 'unread', '2023-01-30 21:06:06'),
(104, '63d69c2ab65071675009066', '63d7c0ce1766a1675083982.jpeg', '63c8f30fe81ec1674113807', 'jpeg', 'unread', '2023-01-30 21:06:22'),
(105, '63d69c2ab65071675009066', '63d7c0d660f411675083990.zip', '63c8f30fe81ec1674113807', 'zip', 'unread', '2023-01-30 21:06:30'),
(106, '63d69c2ab65071675009066', '🤩😍🥰', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 21:06:42'),
(107, '63d69c2ab65071675009066', 'hey whats up', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 22:35:37'),
(108, '63d69c2ab65071675009066', 'asdadsasdasdasdadasd', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 22:36:29'),
(109, '63d69c2ab65071675009066', 'asdadasdadadadadadsadadasdsadasdasd', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-30 22:37:12'),
(110, '63d6a15899c021675010392', 'how are you', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-01-31 11:06:24'),
(111, '63d6a15899c021675010392', 'yes iam', '63c8f1ffd66151674113535', 'normal', 'unread', '2023-01-31 11:06:52'),
(112, '63d6a15899c021675010392', '63d911cd08df31675170253.jpg', '63c8f1ffd66151674113535', 'jpg', 'unread', '2023-01-31 21:04:13'),
(113, '63d6a15899c021675010392', '63d911da362301675170266.jpg', '63c8f1ffd66151674113535', 'jpg', 'unread', '2023-01-31 21:04:26'),
(114, '63d6a15899c021675010392', '🥰asd', '63c8f1ffd66151674113535', 'normal', 'unread', '2023-01-31 21:04:39'),
(115, '63d6a15899c021675010392', 'hjhj', '63c8f1ffd66151674113535', 'normal', 'unread', '2023-01-31 21:04:51'),
(116, '63d6a15899c021675010392', 'dick lomibao', '63c8f1ffd66151674113535', 'normal', 'unread', '2023-01-31 21:05:14'),
(117, '63d6a15899c021675010392', 'hi dick\nadasda', '63c8f1ffd66151674113535', 'normal', 'unread', '2023-01-31 21:05:23'),
(118, '63d6a15899c021675010392', '', '63c8f1ffd66151674113535', 'normal', 'unread', '2023-01-31 21:05:25'),
(119, '63d6a15899c021675010392', '', '63c8f1ffd66151674113535', 'normal', 'unread', '2023-01-31 21:05:25'),
(120, '63d6a15899c021675010392', 'j', '63c8f1ffd66151674113535', 'normal', 'unread', '2023-01-31 21:05:36'),
(121, '63d6a15899c021675010392', '63d9127ce59881675170428.jpg', '63c8f1ffd66151674113535', 'jpg', 'unread', '2023-01-31 21:07:08'),
(122, '63d6a15899c021675010392', 'kk', '63c8f1ffd66151674113535', 'normal', 'unread', '2023-01-31 21:07:14'),
(123, '63d6a15899c021675010392', 'hihj', '63c8f1ffd66151674113535', 'normal', 'unread', '2023-01-31 21:07:27'),
(124, '63d6a15899c021675010392', '63d9129ba1cf11675170459.jpg', '63c8f1ffd66151674113535', 'jpg', 'unread', '2023-01-31 21:07:39'),
(125, '63d6a15899c021675010392', '🙃🙃🙃🙃', '63c8f1ffd66151674113535', 'normal', 'unread', '2023-01-31 21:08:10'),
(126, '63d6a15899c021675010392', '63d9164cac57c1675171404.jpeg', '63c8f1ffd66151674113535', 'jpeg', 'unread', '2023-01-31 21:23:24'),
(127, '63d6a15899c021675010392', 'hahaha', '63c8f1ffd66151674113535', 'normal', 'unread', '2023-02-01 02:05:15'),
(128, '63d6a15899c021675010392', '63d95865b604f1675188325.jpg', '63c8f1ffd66151674113535', 'jpg', 'unread', '2023-02-01 02:05:25'),
(129, '63d6a15899c021675010392', 'hello', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-02-01 11:48:01'),
(130, '63d6a15899c021675010392', 'ano ka nga yon ?\nahahahah', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-02-01 11:48:09'),
(131, '63d6a15899c021675010392', 'dick lomibao', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-02-01 12:40:09'),
(132, '63d6a15899c021675010392', 'lomibao kao\nasda', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-02-01 12:40:15'),
(133, '63d6a15899c021675010392', 'hahaha', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-02-01 13:18:52'),
(134, '63d6a15899c021675010392', 'aasasda', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-02-01 13:18:55'),
(135, '63d6a15899c021675010392', '123123', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-02-01 13:18:57'),
(136, '63d6a15899c021675010392', 'hellow', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-02-01 13:37:52'),
(137, '63d6a15899c021675010392', 'dick lomibao', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-02-01 15:28:51'),
(138, '63d6a15899c021675010392', 'dick lobmoa\nHAHAHA', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-02-01 15:59:35'),
(139, '63d6a15899c021675010392', '😍🥰', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-02-01 15:59:44'),
(140, '63d6a15899c021675010392', '63da1bf7156e11675238391.jpg', '63c8f30fe81ec1674113807', 'jpg', 'unread', '2023-02-01 15:59:51'),
(141, '63d6a15899c021675010392', 'HE LLO DICK', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-02-01 16:00:07'),
(142, '63d6a15899c021675010392', '63da1c0fc40861675238415.zip', '63c8f30fe81ec1674113807', 'zip', 'unread', '2023-02-01 16:00:15'),
(143, '63d6a15899c021675010392', 'DICK LOMIBAO\nASDAD', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-02-01 16:53:04'),
(144, '63d6a15899c021675010392', '63da4feb798861675251691.jpg', '63c8f1ffd66151674113535', 'jpg', 'unread', '2023-02-01 19:41:31'),
(145, '63da5d5391bbf1675255123', 'hello', '63c8f3c9655a91674113993', 'normal', 'unread', '2023-02-01 20:41:44'),
(146, '63da5d5391bbf1675255123', 'omg', '63d29ce4ad7e71674747108', 'normal', 'unread', '2023-02-01 20:41:52'),
(147, '63da5d5391bbf1675255123', '63da5e1bda59a1675255323.png', '63c8f3c9655a91674113993', 'png', 'unread', '2023-02-01 20:42:03'),
(148, '63da5d5391bbf1675255123', '63da5e25a5da91675255333.zip', '63c8f3c9655a91674113993', 'zip', 'unread', '2023-02-01 20:42:13'),
(149, '63da5d5391bbf1675255123', '😍😍', '63c8f3c9655a91674113993', 'normal', 'unread', '2023-02-01 20:42:24'),
(150, '63da5d5391bbf1675255123', '63da5e3ebe1ad1675255358.png', '63d29ce4ad7e71674747108', 'png', 'unread', '2023-02-01 20:42:38'),
(151, '63da5d5391bbf1675255123', '63da5e4aed9041675255370.zip', '63d29ce4ad7e71674747108', 'zip', 'unread', '2023-02-01 20:42:50'),
(152, '63d6a15899c021675010392', 'thank you', '63c8f30fe81ec1674113807', 'normal', 'unread', '2023-02-01 21:12:42'),
(153, '63dabbf240b771675279346', 'hii', '63dabaeeaaf141675279086', 'normal', 'unread', '2023-02-02 03:22:32'),
(154, '63dabbf240b771675279346', 'heello', '63dabaeeaaf141675279086', 'normal', 'unread', '2023-02-02 03:22:41'),
(155, '63dabdc6400d81675279814', 'hm ?', '63dabd7eb34171675279742', 'normal', 'unread', '2023-02-02 03:30:22'),
(156, '63dabdc6400d81675279814', 'iwant this', '63dabd7eb34171675279742', 'normal', 'unread', '2023-02-02 03:30:28'),
(157, '63dabdc6400d81675279814', '63dabde2c9bad1675279842.jpg', '63dabd7eb34171675279742', 'jpg', 'unread', '2023-02-02 03:30:42'),
(158, '63dabdc6400d81675279814', '63dabdede9a221675279853.zip', '63dabd7eb34171675279742', 'zip', 'unread', '2023-02-02 03:30:53'),
(159, '63dabdc6400d81675279814', 'opsops', '63dabc47e64ed1675279431', 'normal', 'unread', '2023-02-02 03:31:22'),
(160, '63dabdc6400d81675279814', 'hahahah', '63dabd7eb34171675279742', 'normal', 'unread', '2023-02-02 03:31:25'),
(161, '63dabdc6400d81675279814', '121313', '63dabc47e64ed1675279431', 'normal', 'unread', '2023-02-02 03:31:28'),
(162, '63dabdc6400d81675279814', '63dabe17983ab1675279895.jpg', '63dabc47e64ed1675279431', 'jpg', 'unread', '2023-02-02 03:31:35'),
(163, '63dabdc6400d81675279814', 'hahahah', '63dabc47e64ed1675279431', 'normal', 'unread', '2023-02-02 03:31:48'),
(164, '63dabe451b8891675279941', 'i want this', '63dabd7eb34171675279742', 'normal', 'unread', '2023-02-02 03:32:27'),
(165, '63dabe451b8891675279941', 'ok cge', '63dabd7eb34171675279742', 'normal', 'unread', '2023-02-02 03:32:34'),
(166, '63dabfba5d8881675280314', 'huyhuy', '63dabc47e64ed1675279431', 'normal', 'unread', '2023-02-02 03:38:43'),
(167, '63dabfba5d8881675280314', 'workin\nasdada', '63dabee56b2801675280101', 'normal', 'unread', '2023-02-02 03:40:49');

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` varchar(200) NOT NULL,
  `from_id` varchar(200) NOT NULL,
  `to_id` varchar(200) NOT NULL,
  `content` varchar(500) NOT NULL,
  `redirect_link` varchar(300) NOT NULL,
  `status` varchar(10) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `from_id`, `to_id`, `content`, `redirect_link`, `status`, `date_created`) VALUES
('63cc29cac679d1674324426', '63c8f30fe81ec1674113807', '63c8f1ffd66151674113535', 'submitted a proposal in your job.', 'client_proposalview.php?proposalid=63cc29cac4b281674324426', 'read', '2023-01-22 02:07:06'),
('63cc2bab4aa871674324907', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'declined your job proposal.', 'freelancer_jobhunt_view.php?jobid=63c8f2c9e83011674113737', 'read', '2023-01-22 02:15:07'),
('63cc2c9248c7b1674325138', '63c8f30fe81ec1674113807', '63c8f1ffd66151674113535', 'submitted a proposal in your job.', 'client_proposalview.php?proposalid=63cc2c9245eb71674325138', 'read', '2023-01-22 02:18:58'),
('63cc2dea33a511674325482', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'declined your job proposal.', 'freelancer_jobhunt_view.php?jobid=63c8f2c9e83011674113737', 'read', '2023-01-22 02:24:42'),
('63ce8bb38cacb1674480563', '63c8f30fe81ec1674113807', '63c8f1ffd66151674113535', 'submitted a proposal in your job.', 'client_proposalview.php?proposalid=63ce8bb38b73d1674480563', 'read', '2023-01-23 21:29:23'),
('63ce8c125a6531674480658', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'declined your job proposal.', 'freelancer_jobhunt_view.php?jobid=63c8f2c9e83011674113737', 'read', '2023-01-23 21:30:58'),
('63ceaa251582e1674488357', '63c8f1ffd66151674113535', '63cabcdd26b5d1674231005', 'declined your job proposal.', 'freelancer_jobhunt_view.php?jobid=63c8f2c9e83011674113737', 'read', '2023-01-23 23:39:17'),
('63d2461cb0b031674724892', '63c8f30fe81ec1674113807', '63c8f1ffd66151674113535', 'submitted a proposal in your job.', 'client_proposalview.php?proposalid=63d2461caed101674724892', 'read', '2023-01-26 17:21:32'),
('63d24647b5bb31674724935', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'declined your job proposal.', 'freelancer_jobhunt_view.php?jobid=63d245b048fc61674724784', 'read', '2023-01-26 17:22:15'),
('63d3e55350bc11674831187', '63c8f1ffd668573741095238', '63d3e4c7b94061674831047', 'Your payment was pending.', '#', 'unread', '2023-01-27 22:53:07'),
('63d3e5604c3241674831200', '63c8f1ffd668573741095238', '63d3e4c7b94061674831047', 'Your payment was pending.', '#', 'unread', '2023-01-27 22:53:20'),
('63d469ea4365d1674865130', '63c8f1ffd668573741095238', '63d469e2714f31674865122', 'Your payment was pending.', '#', 'unread', '2023-01-28 08:18:50'),
('63d487ac3235a1674872748', '63c8f1ffd668573741095238', '63d487a992dd91674872745', 'Your payment was pending.', '#', 'unread', '2023-01-28 10:25:48'),
('63d488d5122921674873045', '63c8f1ffd668573741095238', '63d487a992dd91674872745', 'Your payment was cancelled.', '#', 'unread', '2023-01-28 10:30:45'),
('63d48e6bc8d5a1674874475', '63c8f1ffd668573741095238', '63d3e4c7b94061674831047', 'Your payment was cancelled.', '#', 'unread', '2023-01-28 10:54:35'),
('63d48e888b6041674874504', '63c8f1ffd668573741095238', '63d469e2714f31674865122', 'Your payment was cancelled.', '#', 'unread', '2023-01-28 10:55:04'),
('63d48f6a695441674874730', '63c8f1ffd668573741095238', '63d487a992dd91674872745', 'Your payment already accepted. Your subscription is valid for 1 month only.', '#', 'unread', '2023-01-28 10:58:50'),
('63d4d614403591674892820', '63c8f1ffd668573741095238', '63d3e4c7b94061674831047', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-28 16:00:20'),
('63d4d68c28ea61674892940', '63c8f1ffd668573741095238', '63d3e4c7b94061674831047', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-28 16:02:20'),
('63d4d94d861971674893645', '63c8f1ffd668573741095238', '63d3e4c7b94061674831047', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-28 16:14:05'),
('63d4d99b343c91674893723', '63c8f1ffd668573741095238', '63d3e4c7b94061674831047', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-28 16:15:23'),
('63d4d9b9090341674893753', '63c8f1ffd668573741095238', '63d3e4c7b94061674831047', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-28 16:15:53'),
('63d4d9d591a0d1674893781', '63c8f1ffd668573741095238', '63d3e4c7b94061674831047', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-28 16:16:21'),
('63d4da21a62021674893857', '63c8f1ffd668573741095238', '63d3e4c7b94061674831047', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-28 16:17:37'),
('63d4da743f2751674893940', '63c8f1ffd668573741095238', '63d3e4c7b94061674831047', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-28 16:19:00'),
('63d4dfe31ab001674895331', '63c8f1ffd668573741095238', '63d4dfde3ccf61674895326', 'Your payment was pending.', '#', 'unread', '2023-01-28 16:42:11'),
('63d4e022dc9181674895394', '63c8f1ffd668573741095238', '63d4dfde3ccf61674895326', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-28 16:43:14'),
('63d4ec7164cf51674898545', '63c8f1ffd668573741095238', '63d4ec6eaa55c1674898542', 'Your payment was pending.', '#', 'unread', '2023-01-28 17:35:45'),
('63d4ec942ff7c1674898580', '63c8f1ffd668573741095238', '63d4ec6eaa55c1674898542', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-28 17:36:20'),
('63d50ca6e77101674906790', '63c8f1ffd668573741095238', '63d50ca46ecfa1674906788', 'Your payment was pending.', '#', 'unread', '2023-01-28 19:53:10'),
('63d50cdf735561674906847', '63c8f1ffd668573741095238', '63d50ca46ecfa1674906788', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-28 19:54:07'),
('63d50e492e93e1674907209', '63c8f1ffd668573741095238', '63d50e46795cb1674907206', 'Your payment was pending.', '#', 'unread', '2023-01-28 20:00:09'),
('63d50e7f7bcc91674907263', '63c8f1ffd668573741095238', '63d50e46795cb1674907206', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-28 20:01:03'),
('63d50f863ec191674907526', '63c8f1ffd668573741095238', '63d50f82c93a51674907522', 'Your payment was pending.', '#', 'unread', '2023-01-28 20:05:26'),
('63d50f9b2bf9e1674907547', '63c8f1ffd668573741095238', '63d50f82c93a51674907522', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-28 20:05:47'),
('63d5115950fcb1674907993', '63c8f1ffd668573741095238', '63d50f82c93a51674907522', 'Your subscription is already expired.', '#', 'unread', '2023-01-28 20:13:13'),
('63d51c16de7851674910742', '63c8f1ffd668573741095238', '63d51c12f3e0d1674910738', 'Your payment was pending.', '#', 'unread', '2023-01-28 20:59:02'),
('63d51c48454721674910792', '63c8f1ffd668573741095238', '63d51c12f3e0d1674910738', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-28 20:59:52'),
('63d7b8ae3f0e71675081902', '63c8f1ffd668573741095238', '63d50f82c93a51674907522', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-01-30 20:31:42'),
('63d7d798f2ac91675089816', '63c8f30fe81ec1674113807', '63c8f1ffd66151674113535', 'submitted a proposal in your job.', 'client_proposalview.php?proposalid=63d7d798f1a221675089816', 'read', '2023-01-30 22:43:36'),
('63d88561ec7c81675134305', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'was accepted your proposal let\'s wait for the payment.', 'freelancer_jobhunt_view.php?jobid=63d245b048fc61674724784', 'read', '2023-01-31 11:05:05'),
('63d8965fc73961675138655', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'was accepted your proposal let\'s wait for the payment.', 'freelancer_jobhunt_view.php?jobid=63d245b048fc61674724784', 'unread', '2023-01-31 12:17:35'),
('63d89a39f213e1675139641', '63d29ce4ad7e71674747108', '63c8f1ffd66151674113535', 'submitted a proposal in your job.', 'client_proposalview.php?proposalid=63d89a39f1a461675139641', 'read', '2023-01-31 12:34:01'),
('63d89aeb204451675139819', '63d299f178f0d1674746353', '63c8f1ffd66151674113535', 'submitted a proposal in your job.', 'client_proposalview.php?proposalid=63d89aeb1f2031675139819', 'read', '2023-01-31 12:36:59'),
('63d89d7984f271675140473', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'was accepted your proposal let\'s wait for the payment.', 'freelancer_jobhunt_view.php?jobid=63d245b048fc61674724784', 'read', '2023-01-31 12:47:53'),
('63d89d79865d71675140473', '63c8f1ffd66151674113535', '63d299f178f0d1674746353', 'have already selected proposal. Thank you and better luck next time.', '#', 'unread', '2023-01-31 12:47:53'),
('63d89d7986bd71675140473', '63c8f1ffd66151674113535', '63d29ce4ad7e71674747108', 'have already selected proposal. Thank you and better luck next time.', '#', 'unread', '2023-01-31 12:47:53'),
('63d89d79870ea1675140473', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'have already selected proposal. Thank you and better luck next time.', '#', 'unread', '2023-01-31 12:47:53'),
('63d89f424e9c91675140930', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'was accepted your proposal let\'s wait for the payment.', 'freelancer_jobhunt_view.php?jobid=63d245b048fc61674724784', 'unread', '2023-01-31 12:55:30'),
('63d89f424ff831675140930', '63c8f1ffd66151674113535', '63d299f178f0d1674746353', 'have already selected proposal. Thank you and better luck next time.', '#', 'unread', '2023-01-31 12:55:30'),
('63d89f4250b0b1675140930', '63c8f1ffd66151674113535', '63d29ce4ad7e71674747108', 'have already selected proposal. Thank you and better luck next time.', '#', 'unread', '2023-01-31 12:55:30'),
('63d8b8914a4571675147409', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'was accepted your proposal let\'s wait for the payment.', 'freelancer_jobhunt_view.php?jobid=63d245b048fc61674724784', 'unread', '2023-01-31 14:43:29'),
('63d8b8914be0e1675147409', '63c8f1ffd66151674113535', '63d299f178f0d1674746353', 'have already selected proposal. Thank you and better luck next time.', '#', 'unread', '2023-01-31 14:43:29'),
('63d8b8914c6491675147409', '63c8f1ffd66151674113535', '63d29ce4ad7e71674747108', 'have already selected proposal. Thank you and better luck next time.', '#', 'unread', '2023-01-31 14:43:29'),
('63d8b8c2e10591675147458', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'was accepted your proposal let\'s wait for the payment.', 'freelancer_jobhunt_view.php?jobid=63d245b048fc61674724784', 'unread', '2023-01-31 14:44:18'),
('63d8b8c2e23711675147458', '63c8f1ffd66151674113535', '63d299f178f0d1674746353', 'have already selected proposal. Thank you and better luck next time.', '#', 'unread', '2023-01-31 14:44:18'),
('63d8b8c2e27ef1675147458', '63c8f1ffd66151674113535', '63d29ce4ad7e71674747108', 'have already selected proposal. Thank you and better luck next time.', '#', 'unread', '2023-01-31 14:44:18'),
('63d921abdda241675174315', '63c8f1ffd66151674113535', '63c8f1ffd66151674113535', 'Your job payment was declined. You can update it based on the remarks.', 'client_jobsview.php?jobid=63d245b048fc61674724784', 'unread', '2023-01-31 22:11:55'),
('63d92259ad1711675174489', '63c8f1ffd66151674113535', '63c8f1ffd66151674113535', 'Your job payment was declined. You can update it based on the remarks.', 'client_jobsview.php?jobid=63d245b048fc61674724784', 'unread', '2023-01-31 22:14:49'),
('63d923832955c1675174787', '63c8f1ffd668573741095238', '63c8f1ffd66151674113535', 'Your job payment was declined. You can update it based on the remarks.', 'client_jobsview.php?jobid=63d245b048fc61674724784', 'unread', '2023-01-31 22:19:47'),
('63d9525a5dc311675186778', '63c8f1ffd668573741095238', '63c8f1ffd66151674113535', 'Your job payment already accept.', 'client_jobsview.php?jobid=63d245b048fc61674724784', 'unread', '2023-02-01 01:39:38'),
('63d9525a5f2a41675186778', '63c8f1ffd668573741095238', '63c8f30fe81ec1674113807', 'Your job already started.', 'client_jobsview.php?jobid=63d245b048fc61674724784', 'unread', '2023-02-01 01:39:38'),
('63d95360011961675187040', '63c8f1ffd668573741095238', '63c8f1ffd66151674113535', 'Your job payment already accepted.', 'client_jobsview.php?jobid=63d245b048fc61674724784', 'unread', '2023-02-01 01:44:00'),
('63d9536001b521675187040', '63c8f1ffd668573741095238', '63c8f30fe81ec1674113807', 'Your job already started.', 'client_jobsview.php?jobid=63d245b048fc61674724784', 'unread', '2023-02-01 01:44:00'),
('63d9f0ab35bba1675227307', '63c8f30fe81ec1674113807', '63c8f1ffd66151674113535', 'submitted a proposal in your job.', 'client_proposalview.php?proposalid=63d9f0ab338ca1675227307', 'unread', '2023-02-01 12:55:07'),
('63d9f0c91991a1675227337', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'was accepted your proposal let\'s wait for the payment.', 'freelancer_jobhunt_view.php?jobid=63caa56ed97041674225006', 'read', '2023-02-01 12:55:37'),
('63d9f10fb57611675227407', '63c8f1ffd668573741095238', '63c8f1ffd66151674113535', 'Your job payment already accepted.', 'client_jobsview.php?jobid=63caa56ed97041674225006', 'unread', '2023-02-01 12:56:47'),
('63d9f10fb5e2f1675227407', '63c8f1ffd668573741095238', '63c8f30fe81ec1674113807', 'Your job already started.', 'client_jobsview.php?jobid=63caa56ed97041674225006', 'unread', '2023-02-01 12:56:47'),
('63da35b1babae1675244977', '63d29ce4ad7e71674747108', '63d4dfde3ccf61674895326', 'submitted a proposal in your job.', 'client_proposalview.php?proposalid=63da35b1b94d91675244977', 'unread', '2023-02-01 17:49:37'),
('63da36212d3021675245089', '63d29ce4ad7e71674747108', '63c8f3c9655a91674113993', 'submitted a proposal in your job.', 'client_proposalview.php?proposalid=63da36212c40d1675245089', 'unread', '2023-02-01 17:51:29'),
('63da39ea6b2941675246058', '63c8f30fe81ec1674113807', '63d7d798f1a221675089816', 'submitted a proposal in your job.', 'client_started_jobview.php?jobid=63d245b048fc61674724784', 'unread', '2023-02-01 18:07:38'),
('63da3ad1478181675246289', '63c8f30fe81ec1674113807', '63c8f1ffd66151674113535', 'already send the output of your work.', 'client_started_jobview.php?jobid=63caa56ed97041674225006', 'unread', '2023-02-01 18:11:29'),
('63da3bc1dda8a1675246529', '63c8f30fe81ec1674113807', '63c8f1ffd66151674113535', 'already send the output of your work.', 'client_started_jobview.php?jobid=63d245b048fc61674724784', 'unread', '2023-02-01 18:15:29'),
('63da3beda728b1675246573', '63c8f30fe81ec1674113807', '63c8f1ffd66151674113535', 'already send the output of your work.', 'client_started_jobview.php?jobid=63d245b048fc61674724784', 'unread', '2023-02-01 18:16:13'),
('63da3c39369c11675246649', '63c8f30fe81ec1674113807', '63c8f1ffd66151674113535', 'already send the output of your work.', 'client_started_jobview.php?jobid=63caa56ed97041674225006', 'unread', '2023-02-01 18:17:29'),
('63da56d7ea42c1675253463', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'already receive your output.', 'freelancer_jobstart_view.php?jobd=', 'unread', '2023-02-01 20:11:03'),
('63da57ab1fa8a1675253675', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'already receive your output.', 'freelancer_jobstart_view.php?jobid=', 'unread', '2023-02-01 20:14:35'),
('63da5844943bd1675253828', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'already receive your output.', 'freelancer_jobstart_view.php?jobid=', 'unread', '2023-02-01 20:17:08'),
('63da58b52121a1675253941', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'already receive your output.', 'freelancer_jobstart_view.php?jobid=63d245b048fc61674724784', 'unread', '2023-02-01 20:19:01'),
('63da5b7a44b311675254650', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'already receive your output.', 'freelancer_jobstart_view.php?jobid=63caa56ed97041674225006', 'unread', '2023-02-01 20:30:50'),
('63da5bddf3b251675254749', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'already receive your output.', 'freelancer_jobstart_view.php?jobid=63d245b048fc61674724784', 'unread', '2023-02-01 20:32:29'),
('63da5d1b61f0c1675255067', '63c8f3c9655a91674113993', '63d29ce4ad7e71674747108', 'was accepted your proposal let\'s wait for the payment.', 'freelancer_jobhunt_view.php?jobid=63c8f434359171674114100', 'unread', '2023-02-01 20:37:47'),
('63da5d2f309841675255087', '63c8f1ffd668573741095238', '63c8f3c9655a91674113993', 'Your job payment already accepted.', 'client_jobsview.php?jobid=63c8f434359171674114100', 'unread', '2023-02-01 20:38:07'),
('63da5d2f3120c1675255087', '63c8f1ffd668573741095238', '63d29ce4ad7e71674747108', 'Your job already started.', 'client_jobsview.php?jobid=63c8f434359171674114100', 'unread', '2023-02-01 20:38:07'),
('63da5e5f101e21675255391', '63d29ce4ad7e71674747108', '63c8f3c9655a91674113993', 'already send the output of your work.', 'client_started_jobview.php?jobid=63c8f434359171674114100', 'unread', '2023-02-01 20:43:11'),
('63da5e73bf33d1675255411', '63c8f3c9655a91674113993', '63d29ce4ad7e71674747108', 'already receive your output.', 'freelancer_jobstart_view.php?jobid=63c8f434359171674114100', 'unread', '2023-02-01 20:43:31'),
('63da5f07abab51675255559', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'already receive your output.', 'freelancer_jobstart_view.php?jobid=63d245b048fc61674724784', 'unread', '2023-02-01 20:45:59'),
('63da75f9994a71675261433', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'already receive your output.', 'freelancer_jobstart_view.php?jobid=63d245b048fc61674724784', 'unread', '2023-02-01 22:23:53'),
('63da7c2511d961675263013', '63c8f1ffd66151674113535', '63c8f30fe81ec1674113807', 'already receive your output.', 'freelancer_jobstart_view.php?jobid=63caa56ed97041674225006', 'unread', '2023-02-01 22:50:13'),
('63dab59f537f41675277727', '63c8f1ffd668573741095238', '63dab4d46a8e71675277524', 'Your payment was pending.', '#', 'unread', '2023-02-02 02:55:27'),
('63dab5d0a69711675277776', '63c8f1ffd668573741095238', '63dab4d46a8e71675277524', 'Your payment was pending.', '#', 'unread', '2023-02-02 02:56:16'),
('63dabb6c14c751675279212', '63c8f1ffd668573741095238', '63dabaeeaaf141675279086', 'Your payment was pending.', '#', 'unread', '2023-02-02 03:20:12'),
('63dabbdedcc051675279326', '63c8f1ffd668573741095238', '63dabaeeaaf141675279086', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-02-02 03:22:06'),
('63dabd964b27a1675279766', '63c8f1ffd668573741095238', '63dabd7eb34171675279742', 'Your payment was pending.', '#', 'unread', '2023-02-02 03:29:26'),
('63dabda6dd2cd1675279782', '63c8f1ffd668573741095238', '63dabd7eb34171675279742', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-02-02 03:29:42'),
('63dabe93545a11675280019', '63dabd7eb34171675279742', '63dabc47e64ed1675279431', 'submitted a proposal in your job.', 'client_proposalview.php?proposalid=63dabe93534f71675280019', 'read', '2023-02-02 03:33:39'),
('63dabee87bcad1675280104', '63c8f1ffd668573741095238', '63dabee56b2801675280101', 'Your payment was pending.', '#', 'unread', '2023-02-02 03:35:04'),
('63dabef9100eb1675280121', '63c8f1ffd668573741095238', '63dabee56b2801675280101', 'Your payment already accepted. Your subscription is valid for 30 days only.', '#', 'unread', '2023-02-02 03:35:21'),
('63dabf28e80871675280168', '63dabee56b2801675280101', '63dabc47e64ed1675279431', 'submitted a proposal in your job.', 'client_proposalview.php?proposalid=63dabf28e70ae1675280168', 'read', '2023-02-02 03:36:08'),
('63dabf6e9d1d71675280238', '63dabc47e64ed1675279431', '63dabee56b2801675280101', 'was accepted your proposal let\'s wait for the payment.', 'freelancer_jobhunt_view.php?jobid=63dabd1854eb51675279640', 'unread', '2023-02-02 03:37:18'),
('63dabf6e9e6951675280238', '63dabc47e64ed1675279431', '63dabd7eb34171675279742', 'have already selected proposal. Thank you and better luck next time.', '#', 'unread', '2023-02-02 03:37:18'),
('63dabfa17cc361675280289', '63c8f1ffd668573741095238', '63dabc47e64ed1675279431', 'Your job payment already accepted.', 'client_jobsview.php?jobid=63dabd1854eb51675279640', 'unread', '2023-02-02 03:38:09'),
('63dabfa17d30b1675280289', '63c8f1ffd668573741095238', '63dabee56b2801675280101', 'Your job already started.', 'client_jobsview.php?jobid=63dabd1854eb51675279640', 'unread', '2023-02-02 03:38:09'),
('63dac0b4419651675280564', '63dabee56b2801675280101', '63dabc47e64ed1675279431', 'already send the output of your work.', 'client_started_jobview.php?jobid=63dabd1854eb51675279640', 'unread', '2023-02-02 03:42:44'),
('63dac0cf034f61675280591', '63dabc47e64ed1675279431', '63dabee56b2801675280101', 'already receive your output.', 'freelancer_jobstart_view.php?jobid=63dabd1854eb51675279640', 'unread', '2023-02-02 03:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `plan`
--

CREATE TABLE `plan` (
  `id` int(11) NOT NULL,
  `owner_id` varchar(200) NOT NULL,
  `date_purchased` datetime NOT NULL,
  `expiration_date` datetime NOT NULL,
  `plan_type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan`
--

INSERT INTO `plan` (`id`, `owner_id`, `date_purchased`, `expiration_date`, `plan_type`) VALUES
(14, '63d51c12f3e0d1674910738', '2023-01-28 20:59:52', '2023-02-27 00:00:00', 2),
(15, '63d50f82c93a51674907522', '2023-01-30 20:31:42', '2023-03-01 00:00:00', 2),
(16, '63dabaeeaaf141675279086', '2023-02-02 03:22:06', '2023-03-04 00:00:00', 2),
(17, '63dabd7eb34171675279742', '2023-02-02 03:29:42', '2023-03-04 00:00:00', 2),
(18, '63dabee56b2801675280101', '2023-02-02 03:35:21', '2023-03-04 00:00:00', 2);

-- --------------------------------------------------------

--
-- Table structure for table `plan_transaction`
--

CREATE TABLE `plan_transaction` (
  `id` varchar(200) NOT NULL,
  `owner_id` varchar(200) NOT NULL,
  `reference_no` varchar(200) NOT NULL,
  `remarks` varchar(200) NOT NULL,
  `status` varchar(200) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `plan_transaction`
--

INSERT INTO `plan_transaction` (`id`, `owner_id`, `reference_no`, `remarks`, `status`, `date_created`) VALUES
('63d4ec7162e941674898545', '63d4ec6eaa55c1674898542', 'asddad', '', 'accepted', '2023-01-28 17:35:45'),
('63d50ca6e67f61674906790', '63d50ca46ecfa1674906788', 'asdadasd', '', 'accepted', '2023-01-28 19:53:10'),
('63d50e492dae91674907209', '63d50e46795cb1674907206', 'asdadasd', '', 'accepted', '2023-01-28 20:00:09'),
('63d50f863ddcd1674907526', '63d50f82c93a51674907522', 'asdadasd', '', 'accepted', '2023-01-28 20:05:26'),
('63d51c16dd7bb1674910742', '63d51c12f3e0d1674910738', 'asdadad1231', '', 'accepted', '2023-01-28 20:59:02'),
('63dab59f526341675277727', '63dab4d46a8e71675277524', '123123', '', 'pending', '2023-02-02 02:55:27'),
('63dabb6c131bc1675279212', '63dabaeeaaf141675279086', '123456789', '', 'accepted', '2023-02-02 03:20:12'),
('63dabd964a5271675279766', '63dabd7eb34171675279742', '12333333', '', 'accepted', '2023-02-02 03:29:26'),
('63dabee87a6931675280104', '63dabee56b2801675280101', '123131212', '', 'accepted', '2023-02-02 03:35:04');

-- --------------------------------------------------------

--
-- Table structure for table `proposal`
--

CREATE TABLE `proposal` (
  `id` varchar(200) NOT NULL,
  `owner` varchar(200) NOT NULL,
  `job_id` varchar(200) NOT NULL,
  `proposal_title` varchar(1000) NOT NULL,
  `proposal_desc` varchar(10000) NOT NULL,
  `proposal_price` float NOT NULL,
  `proposal_duration` varchar(200) NOT NULL,
  `proposal_otherinfo` varchar(200) NOT NULL,
  `proposal_status` int(11) NOT NULL,
  `remarks` varchar(2000) DEFAULT NULL,
  `date_created` datetime NOT NULL,
  `delivered` int(11) NOT NULL,
  `delivered_item` varchar(200) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal`
--

INSERT INTO `proposal` (`id`, `owner`, `job_id`, `proposal_title`, `proposal_desc`, `proposal_price`, `proposal_duration`, `proposal_otherinfo`, `proposal_status`, `remarks`, `date_created`, `delivered`, `delivered_item`) VALUES
('63ce8bb38b73d1674480563', '63c8f30fe81ec1674113807', '63c8f2c9e83011674113737', 'Dick lomibao', 'hahah\r\nahaha\r\nahah\r\n', 5000, '3 days', '63ce8bb38b7541674480563Chapter 7.pdf', 2, 'you are over price', '2023-01-23 21:29:23', 0, ''),
('63d7d798f1a221675089816', '63c8f30fe81ec1674113807', '63d245b048fc61674724784', 'iam avaioba', 'asdasdasd', 8000, '5 days', '63d7d798f1a371675089816Chapter 9.pdf', 1, NULL, '2023-01-30 22:43:36', 1, '63da3beda58c7167524657363da1c0fc40861675238415.zip'),
('63d9f0ab338ca1675227307', '63c8f30fe81ec1674113807', '63caa56ed97041674225006', 'Ako naTO', 'GHAHAHAHAH', 600, '5 DAYS', '63d9f0ab338df1675227307Chapter 8.pdf', 1, NULL, '2023-02-01 12:55:07', 1, '63da3c3935aba1675246649vanilla-javascript-emoji-picker-master.zip'),
('63da35b1b94d91675244977', '63d29ce4ad7e71674747108', '63d4e52c0e1281674896684', 'ahah', 'haahhahah', 123, '3days', '63da35b1b94ef1675244977Chapter 8.pdf', 1, NULL, '2023-02-01 17:49:37', 0, ''),
('63da36212c40d1675245089', '63d29ce4ad7e71674747108', '63c8f434359171674114100', 'hahahha', 'haha', 333, '3 days', '63da36212c4221675245089OS_101_SG1 (1).docx', 1, NULL, '2023-02-01 17:51:29', 1, '63da5e5f0ea69167525539163da3beda58c7167524657363da1c0fc40861675238415 (1).zip'),
('63dabf28e70ae1675280168', '63dabee56b2801675280101', '63dabd1854eb51675279640', 'you need me', 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, quam repellendus. Numquam laborum ab, reiciendis enim incidunt id alias ex odit accusantium. Quasi, veritatis. Ipsum quae similique deserunt provident perspiciatis!\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, quam repellendus. Numquam laborum ab, reiciendis enim incidunt id alias ex odit accusantium. Quasi, veritatis. Ipsum quae similique deserunt provident perspiciatis!\r\n\r\nLorem ipsum dolor sit amet consectetur adipisicing elit. Dignissimos, quam repellendus. Numquam laborum ab, reiciendis enim incidunt id alias ex odit accusantium. Quasi, veritatis. Ipsum quae similique deserunt provident perspiciatis!', 1000, '5 days', '', 1, NULL, '2023-02-02 03:36:08', 1, '63dac0b4406aa167528056463da3beda58c7167524657363da1c0fc40861675238415.zip');

-- --------------------------------------------------------

--
-- Table structure for table `proposal_payment`
--

CREATE TABLE `proposal_payment` (
  `id` varchar(200) NOT NULL,
  `job_id` varchar(200) NOT NULL,
  `proposal_id` varchar(200) NOT NULL,
  `price` float NOT NULL,
  `reference_no` varchar(200) NOT NULL,
  `remarks` varchar(1000) NOT NULL,
  `status` varchar(20) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `proposal_payment`
--

INSERT INTO `proposal_payment` (`id`, `job_id`, `proposal_id`, `price`, `reference_no`, `remarks`, `status`, `date_created`) VALUES
('63d8b8c2e09301675147458', '63d245b048fc61674724784', '63d7d798f1a221675089816', 8000, '12313', '123', 'accepted', '2023-01-31 14:44:18'),
('63d9f0c918fed1675227337', '63caa56ed97041674225006', '63d9f0ab338ca1675227307', 600, 'ASDADASD', '', 'accepted', '2023-02-01 12:55:37'),
('63da5d1b614c01675255067', '63c8f434359171674114100', '63da36212c40d1675245089', 333, 'asdadasd', '', 'accepted', '2023-02-01 20:37:47'),
('63dabf6e9c9751675280238', '63dabd1854eb51675279640', '63dabf28e70ae1675280168', 1000, '1000k', '', 'accepted', '2023-02-02 03:37:18');

-- --------------------------------------------------------

--
-- Table structure for table `roi`
--

CREATE TABLE `roi` (
  `id` int(11) NOT NULL,
  `amount` float NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `roi`
--

INSERT INTO `roi` (`id`, `amount`, `date_created`) VALUES
(1, 1600, '2023-02-01 22:23:53'),
(2, 120, '2023-02-01 22:50:13'),
(3, 200, '2023-02-02 03:43:11');

-- --------------------------------------------------------

--
-- Table structure for table `userinfo`
--

CREATE TABLE `userinfo` (
  `id` varchar(200) NOT NULL,
  `firstname` varchar(100) NOT NULL,
  `lastname` varchar(100) NOT NULL,
  `birthdate` date NOT NULL,
  `sex` varchar(10) NOT NULL,
  `address` varchar(300) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `userinfo`
--

INSERT INTO `userinfo` (`id`, `firstname`, `lastname`, `birthdate`, `sex`, `address`) VALUES
('63c8f1ffd66151674113535', 'Rodolfo', 'Abracia', '2023-01-19', 'Male', 'Manoag, Pangasinan'),
('63c8f1ffd668573741095238', 'Admin', 'Admin', '2023-01-06', 'male', 'Alitaya, Mangaldan, Pangasinan'),
('63c8f30fe81ec1674113807', 'Dick', 'Lomibao', '2023-01-19', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63c8f3c9655a91674113993', 'Jude', 'Moises', '2023-01-19', 'Male', 'San Carlos, Pangasinan'),
('63cabcdd26b5d1674231005', 'Demark', 'Lomibao', '2023-01-21', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d2976ea3e101674745710', 'Patrice', 'Paliwen', '2023-01-26', 'Female', 'Sison Pangasinan'),
('63d299558a1ca1674746197', 'Lindasy', 'Serdniola', '2023-01-26', 'Female', 'Umingan, Pangasinan'),
('63d299f178f0d1674746353', 'Tadhana', 'Ba ako', '2023-01-26', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d29ce4ad7e71674747108', 'Mark', 'Andaya', '2023-01-26', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d29eff4c5bd1674747647', 'Juan', 'San jose', '2023-01-26', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d3b711b74171674819345', 'Daryl', 'Soriano', '2023-01-27', 'Male', 'Mangaldan, Pangasinan'),
('63d3b766ecc081674819430', 'Nica', 'Mercado', '2023-01-27', 'Female', 'Alitaya Mangaldan Pangasinan'),
('63d3e1ae136af1674830254', 'May', 'Lomibao', '2023-02-11', 'Female', 'Alitaya Mangaldan Pangasinan'),
('63d3e1fb722b11674830331', 'June', 'Louise', '2023-01-27', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d3e24c149c31674830412', 'asd', 'asd', '2023-01-27', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d3e2d69574e1674830550', 'asdad', 'asdad', '2023-01-27', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d3e458ee7561674830936', '123123', '123123', '2023-01-27', 'Female', 'Alitaya Mangaldan Pangasinan'),
('63d3e4c7b94061674831047', 'April', 'May', '2023-01-27', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d469e2714f31674865122', 'Lava', 'may', '2023-01-28', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d487a992dd91674872745', 'mynew', 'mynew', '2023-01-28', 'Female', 'Alitaya Mangaldan Pangasinan'),
('63d4dfde3ccf61674895326', 'Mayora', 'Mayora', '2023-01-28', 'Female', 'Alitaya Mangaldan Pangasinan'),
('63d4ec1a4480b1674898458', 'asdad', 'asdad', '2023-01-28', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d4ec21f36851674898465', 'asdad', 'asdad', '2023-01-28', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d4ec2a1e1f31674898474', 'asdad', 'asdad', '2023-01-28', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d4ec3f0fa121674898495', 'asdad', 'asdad', '2023-01-28', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d4ec6eaa55c1674898542', 'asdad123', 'asdad', '2023-01-28', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d50ca46ecfa1674906788', 'maya', 'maya', '2023-01-28', 'Female', 'Alitaya Mangaldan Pangasinan'),
('63d50df3a8e001674907123', 'asdad11', 'asdasd11', '2023-01-28', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d50e46795cb1674907206', 'hahaha', 'hahaha', '2023-01-28', 'Female', 'Alitaya Mangaldan Pangasinan'),
('63d50f82c93a51674907522', 'kalamo', 'kalamo', '2023-01-28', 'Male', 'Alitaya Mangaldan Pangasinan'),
('63d51c12f3e0d1674910738', 'Rye', 'Balgua', '2023-01-28', 'Female', 'Alitaya Mangaldan Pangasinan'),
('63dab2dcdb8401675277020', 'asdad', 'asdad', '2023-02-24', 'Female', 'asdadasd'),
('63dab369b82cb1675277161', '123123', '123123', '2023-02-17', 'Female', '123123'),
('63dab372f10c51675277170', '123123', '123123', '2023-02-17', 'Female', '123123'),
('63dab40dccee01675277325', '123123', '123123', '2023-02-17', 'Female', '123123'),
('63dab419952151675277337', '123123', '123123', '2023-02-17', 'Female', '123123'),
('63dab4988fba11675277464', '123123', '123123', '2023-02-17', 'Female', '123123'),
('63dab4d46a8e71675277524', 'hahahah', 'ahahahah', '2023-02-16', 'Female', '123123'),
('63dabaeeaaf141675279086', 'akoako', 'ako lng', '2023-02-02', 'Male', '123123'),
('63dabc47e64ed1675279431', 'patpat', 'patpat', '2023-02-02', 'Male', 'Sison pangasinan'),
('63dabd7eb34171675279742', 'free', 'free', '2023-02-03', 'Male', 'free'),
('63dabee56b2801675280101', 'kolokoy', 'kolokoy', '2023-02-02', 'Male', 'kolokoy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `accountinfo`
--
ALTER TABLE `accountinfo`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`),
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `conversationlist`
--
ALTER TABLE `conversationlist`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `freelancer_money`
--
ALTER TABLE `freelancer_money`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `income_from_memberfee`
--
ALTER TABLE `income_from_memberfee`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`),
  ADD KEY `category_id` (`category_id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `job_income`
--
ALTER TABLE `job_income`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `conversationid` (`conversationid`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `plan`
--
ALTER TABLE `plan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `owner_id` (`owner_id`);

--
-- Indexes for table `plan_transaction`
--
ALTER TABLE `plan_transaction`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `proposal`
--
ALTER TABLE `proposal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `job_id` (`job_id`),
  ADD KEY `owner` (`owner`);

--
-- Indexes for table `proposal_payment`
--
ALTER TABLE `proposal_payment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `roi`
--
ALTER TABLE `roi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `userinfo`
--
ALTER TABLE `userinfo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `accountinfo`
--
ALTER TABLE `accountinfo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `freelancer_money`
--
ALTER TABLE `freelancer_money`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `income_from_memberfee`
--
ALTER TABLE `income_from_memberfee`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=168;

--
-- AUTO_INCREMENT for table `plan`
--
ALTER TABLE `plan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `roi`
--
ALTER TABLE `roi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `accountinfo`
--
ALTER TABLE `accountinfo`
  ADD CONSTRAINT `accountinfo_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `userinfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jobs`
--
ALTER TABLE `jobs`
  ADD CONSTRAINT `jobs_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `userinfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `messages`
--
ALTER TABLE `messages`
  ADD CONSTRAINT `messages_ibfk_1` FOREIGN KEY (`conversationid`) REFERENCES `conversationlist` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `plan`
--
ALTER TABLE `plan`
  ADD CONSTRAINT `plan_ibfk_1` FOREIGN KEY (`owner_id`) REFERENCES `userinfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `proposal`
--
ALTER TABLE `proposal`
  ADD CONSTRAINT `proposal_ibfk_1` FOREIGN KEY (`job_id`) REFERENCES `jobs` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `proposal_ibfk_2` FOREIGN KEY (`owner`) REFERENCES `userinfo` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
