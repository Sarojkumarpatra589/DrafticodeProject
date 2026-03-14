-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 14, 2026 at 02:01 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `drafticode_admin`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_logs`
--

CREATE TABLE `activity_logs` (
  `id` int(11) NOT NULL,
  `action` varchar(255) DEFAULT NULL,
  `module` varchar(100) DEFAULT NULL,
  `user` varchar(100) DEFAULT NULL,
  `status` varchar(50) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `activity_logs`
--

INSERT INTO `activity_logs` (`id`, `action`, `module`, `user`, `status`, `created_at`) VALUES
(1, 'Deleted client', 'Clients', 'Admin', 'Deleted', '2026-03-14 12:32:40');

-- --------------------------------------------------------

--
-- Table structure for table `blogs`
--

CREATE TABLE `blogs` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `short_description` varchar(1000) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `blogs`
--

INSERT INTO `blogs` (`id`, `title`, `image`, `short_description`, `description`) VALUES
(1, 'hgnnnxncv', '1773401898938.png', 'cgnfnnn', '<p>nshszzzzznfsssssssssssssssssssss</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `clients`
--

CREATE TABLE `clients` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `clients`
--

INSERT INTO `clients` (`id`, `name`, `image`) VALUES
(2, 'Green Heaven', '1773485378962.png'),
(3, 'Arman Devcon Pvt. Ltd.', '1773485427882.png'),
(4, 'Tulija', '1773485446608.png'),
(5, 'Anwitha', '1773485463203.png'),
(6, 'Aqua Lawn', '1773485481140.png'),
(7, 'Askin Astrology', '1773485502451.png'),
(8, 'Peckera', '1773485521142.png'),
(9, 'Monty\'s Click', '1773485539973.png'),
(10, 'Altangle', '1773485615474.png'),
(11, 'Mannati', '1773485628574.png'),
(12, 'Hotel SSI', '1773485649273.png'),
(13, 'Hotel Rdraksh Inn', '1773485673639.png'),
(14, 'Opulent Dcor', '1773485694230.png'),
(15, 'Stairway Designs', '1773485767872.png'),
(16, 'Stairway Developers PVT LTD', '1773485796862.png'),
(17, 'Komed Lab', '1773485814294.png'),
(18, 'Pooja Jewellers', '1773485831109.png'),
(19, 'Nutty Baba', '1773485852666.png'),
(20, 'Salon', '1773485869348.png'),
(21, 'Mo Dhobighat', '1773485892290.png'),
(22, 'Br Entertainment', '1773486050611.png'),
(23, 'Rems Elevator', '1773486071522.png'),
(24, 'Patel Dignostic', '1773486100206.png'),
(25, 'Sabooz', '1773486122992.png'),
(26, 'Sumangalam Caterers', '1773486143822.png'),
(27, 'Quantalytics', '1773486160487.png'),
(28, 'Event Elegancy', '1773486192377.png'),
(29, 'The Appletree', '1773486208532.png'),
(30, 'Maxfolio', '1773486224640.png'),
(31, 'Tarini United Builders', '1773486245364.png'),
(32, 'Preetam Insrastructure Pvt Ltd', '1773486492966.png'),
(33, 'Crazzy Crunch', '1773486513613.png'),
(34, 'New City Jewellers', '1773486533268.png'),
(35, 'The Wedders', '1773486549749.png'),
(36, 'Khawar Ashe Pashe', '1773486602801.png'),
(37, 'Yes Studio', '1773486619285.png'),
(38, 'JB Consulting and Statergies', '1773486644107.png'),
(39, 'RJ Guddi', '1773486659666.jpeg'),
(40, 'Sab-k Solutions', '1773486675660.png'),
(41, 'Rabindra Oushadhalaya', '1773486716630.png'),
(42, 'Gopalpur Ports Limited', '1773486747693.png'),
(43, 'Iconic Munk', '1773486927128.png');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `subject` varchar(1000) NOT NULL,
  `message` varchar(3000) NOT NULL,
  `contacted_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

CREATE TABLE `courses` (
  `id` int(11) NOT NULL,
  `course_name` varchar(256) NOT NULL,
  `shortdescription` varchar(1000) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `course_name`, `shortdescription`, `description`) VALUES
(1, 'java', 'Design', '<p>dv</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `internships`
--

CREATE TABLE `internships` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `duration` varchar(50) DEFAULT NULL,
  `stipend` varchar(100) DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `openings` int(11) DEFAULT NULL,
  `description` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `internships`
--

INSERT INTO `internships` (`id`, `title`, `department`, `duration`, `stipend`, `location`, `deadline`, `openings`, `description`, `requirements`, `status`, `created_at`) VALUES
(1, 'zd', 'Engineering', '3month', '321', 'Nayapalli , Bhubaneswar', '2026-04-02', 4, '<p>\r\n	RTEG</p>\r\n', '<p>\r\n	RTEG</p>\r\n', 'Closed', '2026-03-14 11:55:27');

-- --------------------------------------------------------

--
-- Table structure for table `jobs`
--

CREATE TABLE `jobs` (
  `id` int(11) NOT NULL,
  `title` varchar(255) DEFAULT NULL,
  `type` varchar(50) DEFAULT NULL,
  `location` varchar(150) DEFAULT NULL,
  `salary_min` varchar(50) DEFAULT NULL,
  `salary_max` varchar(50) DEFAULT NULL,
  `department` varchar(100) DEFAULT NULL,
  `deadline` date DEFAULT NULL,
  `description` text DEFAULT NULL,
  `requirements` text DEFAULT NULL,
  `image` varchar(255) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `jobs`
--

INSERT INTO `jobs` (`id`, `title`, `type`, `location`, `salary_min`, `salary_max`, `department`, `deadline`, `description`, `requirements`, `image`, `status`, `created_at`) VALUES
(1, 'web developer', 'Full Time', 'Nayapalli , Bhubaneswar', '10000', '20000', ' Creative & Design', '2026-03-22', '<div class=\"elementor-element elementor-element-4107a66 elementor-widget elementor-widget-heading\" data-e-type=\"widget\" data-element_type=\"widget\" data-id=\"4107a66\" data-widget_type=\"heading.default\" style=\"box-sizing: border-box; --bdt-inverse: initial; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; margin-block-end: 0px; min-width: 0px; --kit-widget-spacing: 0px; max-width: 100%; color: rgb(53, 53, 53); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 16px;\">\r\n	<div class=\"elementor-widget-container\" style=\"box-sizing: border-box; --bdt-inverse: initial; transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 24px;\">\r\n		<h4 class=\"elementor-heading-title elementor-size-default\" style=\"box-sizing: border-box; --bdt-inverse: initial; border: 0px; font-size: 1.25rem; font-style: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; clear: none; color: rgb(187, 92, 46); line-height: 1.2em; font-family: Roboto, sans-serif;\">\r\n			Seamless and Instant Sharing:</h4>\r\n	</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-5ea5909 elementor-widget elementor-widget-text-editor\" data-e-type=\"widget\" data-element_type=\"widget\" data-id=\"5ea5909\" data-widget_type=\"text-editor.default\" style=\"box-sizing: border-box; --bdt-inverse: initial; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; font-family: Roboto, sans-serif; color: rgb(122, 122, 122); margin-block-end: 0px; min-width: 0px; --kit-widget-spacing: 0px; max-width: 100%; font-size: 16px;\">\r\n	<div class=\"elementor-widget-container\" style=\"box-sizing: border-box; --bdt-inverse: initial; transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 52.7812px;\">\r\n		<p style=\"box-sizing: border-box; --bdt-inverse: initial; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px 0px 1.6em; outline: 0px; padding: 0px; vertical-align: baseline;\">\r\n			With just a tap, your contact information is instantly transferred to the recipient&rsquo;s smartphone. No more fumbling with paper cards or manually entering details &ndash; it&rsquo;s quick, easy, and efficient.</p>\r\n	</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-cd0f642 elementor-widget elementor-widget-heading\" data-e-type=\"widget\" data-element_type=\"widget\" data-id=\"cd0f642\" data-widget_type=\"heading.default\" style=\"box-sizing: border-box; --bdt-inverse: initial; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; margin-block-end: 0px; min-width: 0px; --kit-widget-spacing: 0px; max-width: 100%; color: rgb(53, 53, 53); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 16px;\">\r\n	<div class=\"elementor-widget-container\" style=\"box-sizing: border-box; --bdt-inverse: initial; transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 24px;\">\r\n		<h4 class=\"elementor-heading-title elementor-size-default\" style=\"box-sizing: border-box; --bdt-inverse: initial; border: 0px; font-size: 1.25rem; font-style: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; clear: none; color: rgb(187, 92, 46); line-height: 1.2em; font-family: Roboto, sans-serif;\">\r\n			Eco-Friendly Solution:</h4>\r\n	</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-a5fe90c elementor-widget elementor-widget-text-editor\" data-e-type=\"widget\" data-element_type=\"widget\" data-id=\"a5fe90c\" data-widget_type=\"text-editor.default\" style=\"box-sizing: border-box; --bdt-inverse: initial; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; font-family: Roboto, sans-serif; color: rgb(122, 122, 122); margin-block-end: 0px; min-width: 0px; --kit-widget-spacing: 0px; max-width: 100%; font-size: 16px;\">\r\n	<div class=\"elementor-widget-container\" style=\"box-sizing: border-box; --bdt-inverse: initial; transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 52.7812px;\">\r\n		<p style=\"box-sizing: border-box; --bdt-inverse: initial; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px 0px 1.6em; outline: 0px; padding: 0px; vertical-align: baseline;\">\r\n			By choosing digital NFC cards, you&rsquo;re making a positive impact on the environment. Reduce paper waste and contribute to a greener planet while still making lasting connections.</p>\r\n	</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-94dff82 elementor-widget elementor-widget-heading\" data-e-type=\"widget\" data-element_type=\"widget\" data-id=\"94dff82\" data-widget_type=\"heading.default\" style=\"box-sizing: border-box; --bdt-inverse: initial; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; margin-block-end: 0px; min-width: 0px; --kit-widget-spacing: 0px; max-width: 100%; color: rgb(53, 53, 53); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 16px;\">\r\n	<div class=\"elementor-widget-container\" style=\"box-sizing: border-box; --bdt-inverse: initial; transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 24px;\">\r\n		<h4 class=\"elementor-heading-title elementor-size-default\" style=\"box-sizing: border-box; --bdt-inverse: initial; border: 0px; font-size: 1.25rem; font-style: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; clear: none; color: rgb(187, 92, 46); line-height: 1.2em; font-family: Roboto, sans-serif;\">\r\n			Customizable and Dynamic:</h4>\r\n	</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-0a7525a elementor-widget elementor-widget-text-editor\" data-e-type=\"widget\" data-element_type=\"widget\" data-id=\"0a7525a\" data-widget_type=\"text-editor.default\" style=\"box-sizing: border-box; --bdt-inverse: initial; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; font-family: Roboto, sans-serif; color: rgb(122, 122, 122); margin-block-end: 0px; min-width: 0px; --kit-widget-spacing: 0px; max-width: 100%; font-size: 16px;\">\r\n	<div class=\"elementor-widget-container\" style=\"box-sizing: border-box; --bdt-inverse: initial; transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 26.3906px;\">\r\n		<p style=\"box-sizing: border-box; --bdt-inverse: initial; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px 0px 1.6em; outline: 0px; padding: 0px; vertical-align: baseline;\">\r\n			Our digital cards are fully customizable to reflect your unique brand identity. You can update your information .</p>\r\n	</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-6735175 elementor-widget elementor-widget-heading\" data-e-type=\"widget\" data-element_type=\"widget\" data-id=\"6735175\" data-widget_type=\"heading.default\" style=\"box-sizing: border-box; --bdt-inverse: initial; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; margin-block-end: 0px; min-width: 0px; --kit-widget-spacing: 0px; max-width: 100%; color: rgb(53, 53, 53); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 16px;\">\r\n	<div class=\"elementor-widget-container\" style=\"box-sizing: border-box; --bdt-inverse: initial; transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 24px;\">\r\n		<h4 class=\"elementor-heading-title elementor-size-default\" style=\"box-sizing: border-box; --bdt-inverse: initial; border: 0px; font-size: 1.25rem; font-style: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; clear: none; color: rgb(187, 92, 46); line-height: 1.2em; font-family: Roboto, sans-serif;\">\r\n			Enhanced Professionalism:</h4>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '<div class=\"elementor-element elementor-element-4107a66 elementor-widget elementor-widget-heading\" data-e-type=\"widget\" data-element_type=\"widget\" data-id=\"4107a66\" data-widget_type=\"heading.default\" style=\"box-sizing: border-box; --bdt-inverse: initial; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; margin-block-end: 0px; min-width: 0px; --kit-widget-spacing: 0px; max-width: 100%; color: rgb(53, 53, 53); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 16px;\">\r\n	<div class=\"elementor-widget-container\" style=\"box-sizing: border-box; --bdt-inverse: initial; transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 24px;\">\r\n		<h4 class=\"elementor-heading-title elementor-size-default\" style=\"box-sizing: border-box; --bdt-inverse: initial; border: 0px; font-size: 1.25rem; font-style: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; clear: none; color: rgb(187, 92, 46); line-height: 1.2em; font-family: Roboto, sans-serif;\">\r\n			Seamless and Instant Sharing:</h4>\r\n	</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-5ea5909 elementor-widget elementor-widget-text-editor\" data-e-type=\"widget\" data-element_type=\"widget\" data-id=\"5ea5909\" data-widget_type=\"text-editor.default\" style=\"box-sizing: border-box; --bdt-inverse: initial; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; font-family: Roboto, sans-serif; color: rgb(122, 122, 122); margin-block-end: 0px; min-width: 0px; --kit-widget-spacing: 0px; max-width: 100%; font-size: 16px;\">\r\n	<div class=\"elementor-widget-container\" style=\"box-sizing: border-box; --bdt-inverse: initial; transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 52.7812px;\">\r\n		<p style=\"box-sizing: border-box; --bdt-inverse: initial; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px 0px 1.6em; outline: 0px; padding: 0px; vertical-align: baseline;\">\r\n			With just a tap, your contact information is instantly transferred to the recipient&rsquo;s smartphone. No more fumbling with paper cards or manually entering details &ndash; it&rsquo;s quick, easy, and efficient.</p>\r\n	</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-cd0f642 elementor-widget elementor-widget-heading\" data-e-type=\"widget\" data-element_type=\"widget\" data-id=\"cd0f642\" data-widget_type=\"heading.default\" style=\"box-sizing: border-box; --bdt-inverse: initial; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; margin-block-end: 0px; min-width: 0px; --kit-widget-spacing: 0px; max-width: 100%; color: rgb(53, 53, 53); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 16px;\">\r\n	<div class=\"elementor-widget-container\" style=\"box-sizing: border-box; --bdt-inverse: initial; transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 24px;\">\r\n		<h4 class=\"elementor-heading-title elementor-size-default\" style=\"box-sizing: border-box; --bdt-inverse: initial; border: 0px; font-size: 1.25rem; font-style: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; clear: none; color: rgb(187, 92, 46); line-height: 1.2em; font-family: Roboto, sans-serif;\">\r\n			Eco-Friendly Solution:</h4>\r\n	</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-a5fe90c elementor-widget elementor-widget-text-editor\" data-e-type=\"widget\" data-element_type=\"widget\" data-id=\"a5fe90c\" data-widget_type=\"text-editor.default\" style=\"box-sizing: border-box; --bdt-inverse: initial; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; font-family: Roboto, sans-serif; color: rgb(122, 122, 122); margin-block-end: 0px; min-width: 0px; --kit-widget-spacing: 0px; max-width: 100%; font-size: 16px;\">\r\n	<div class=\"elementor-widget-container\" style=\"box-sizing: border-box; --bdt-inverse: initial; transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 52.7812px;\">\r\n		<p style=\"box-sizing: border-box; --bdt-inverse: initial; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px 0px 1.6em; outline: 0px; padding: 0px; vertical-align: baseline;\">\r\n			By choosing digital NFC cards, you&rsquo;re making a positive impact on the environment. Reduce paper waste and contribute to a greener planet while still making lasting connections.</p>\r\n	</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-94dff82 elementor-widget elementor-widget-heading\" data-e-type=\"widget\" data-element_type=\"widget\" data-id=\"94dff82\" data-widget_type=\"heading.default\" style=\"box-sizing: border-box; --bdt-inverse: initial; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; margin-block-end: 0px; min-width: 0px; --kit-widget-spacing: 0px; max-width: 100%; color: rgb(53, 53, 53); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 16px;\">\r\n	<div class=\"elementor-widget-container\" style=\"box-sizing: border-box; --bdt-inverse: initial; transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 24px;\">\r\n		<h4 class=\"elementor-heading-title elementor-size-default\" style=\"box-sizing: border-box; --bdt-inverse: initial; border: 0px; font-size: 1.25rem; font-style: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; clear: none; color: rgb(187, 92, 46); line-height: 1.2em; font-family: Roboto, sans-serif;\">\r\n			Customizable and Dynamic:</h4>\r\n	</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-0a7525a elementor-widget elementor-widget-text-editor\" data-e-type=\"widget\" data-element_type=\"widget\" data-id=\"0a7525a\" data-widget_type=\"text-editor.default\" style=\"box-sizing: border-box; --bdt-inverse: initial; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; font-family: Roboto, sans-serif; color: rgb(122, 122, 122); margin-block-end: 0px; min-width: 0px; --kit-widget-spacing: 0px; max-width: 100%; font-size: 16px;\">\r\n	<div class=\"elementor-widget-container\" style=\"box-sizing: border-box; --bdt-inverse: initial; transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 26.3906px;\">\r\n		<p style=\"box-sizing: border-box; --bdt-inverse: initial; border: 0px; font-style: inherit; font-weight: inherit; margin: 0px 0px 1.6em; outline: 0px; padding: 0px; vertical-align: baseline;\">\r\n			Our digital cards are fully customizable to reflect your unique brand identity. You can update your information .</p>\r\n	</div>\r\n</div>\r\n<div class=\"elementor-element elementor-element-6735175 elementor-widget elementor-widget-heading\" data-e-type=\"widget\" data-element_type=\"widget\" data-id=\"6735175\" data-widget_type=\"heading.default\" style=\"box-sizing: border-box; --bdt-inverse: initial; --flex-direction: initial; --flex-wrap: initial; --justify-content: initial; --align-items: initial; --align-content: initial; --gap: initial; --flex-basis: initial; --flex-grow: initial; --flex-shrink: initial; --order: initial; --align-self: initial; align-self: auto; flex: 0 1 auto; order: 0; place-content: normal; align-items: normal; flex-flow: row; gap: 20px; position: relative; --widgets-spacing: 20px 20px; --widgets-spacing-row: 20px; --widgets-spacing-column: 20px; margin-block-end: 0px; min-width: 0px; --kit-widget-spacing: 0px; max-width: 100%; color: rgb(53, 53, 53); font-family: -apple-system, BlinkMacSystemFont, &quot;Segoe UI&quot;, Roboto, Oxygen-Sans, Ubuntu, Cantarell, &quot;Helvetica Neue&quot;, sans-serif; font-size: 16px;\">\r\n	<div class=\"elementor-widget-container\" style=\"box-sizing: border-box; --bdt-inverse: initial; transition: background 0.3s, border 0.3s, border-radius 0.3s, box-shadow 0.3s, transform 0.4s; height: 24px;\">\r\n		<h4 class=\"elementor-heading-title elementor-size-default\" style=\"box-sizing: border-box; --bdt-inverse: initial; border: 0px; font-size: 1.25rem; font-style: inherit; margin: 0px; outline: 0px; padding: 0px; vertical-align: baseline; clear: none; color: rgb(187, 92, 46); line-height: 1.2em; font-family: Roboto, sans-serif;\">\r\n			Enhanced Professionalism:</h4>\r\n	</div>\r\n</div>\r\n<p>\r\n	&nbsp;</p>\r\n', '1773488736216.png', 'Closed', '2026-03-14 11:45:36');

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `short_description` varchar(256) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `title`, `image`, `short_description`, `description`) VALUES
(1, 'xfhb11', '1773401348996.jpg', 'xfn1q2', '<p>xfn1</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `short_description` varchar(256) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `image`, `short_description`, `description`) VALUES
(1, 'hd', '1773399419101.png', 'zdhgn', '<p>dghn</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `short_description` varchar(256) NOT NULL,
  `description` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `image`, `short_description`, `description`) VALUES
(1, 'xfncg 1111', '1773400956846.jpg', 'cgm11', '<p>zdtj11</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

CREATE TABLE `settings` (
  `id` int(11) NOT NULL,
  `site_title` varchar(256) NOT NULL,
  `favicon` varchar(256) NOT NULL,
  `logo` varchar(256) NOT NULL,
  `email` varchar(256) NOT NULL,
  `phone` varchar(256) NOT NULL,
  `whatsapp` varchar(256) NOT NULL,
  `address` varchar(256) NOT NULL,
  `tagline` varchar(256) NOT NULL,
  `map_link` varchar(256) NOT NULL,
  `facebook` varchar(256) NOT NULL,
  `instagram` varchar(256) NOT NULL,
  `linkedin` varchar(256) NOT NULL,
  `twitter` varchar(256) NOT NULL,
  `meta_title` varchar(256) NOT NULL,
  `meta_keyword` varchar(256) NOT NULL,
  `meta_description` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `site_title`, `favicon`, `logo`, `email`, `phone`, `whatsapp`, `address`, `tagline`, `map_link`, `facebook`, `instagram`, `linkedin`, `twitter`, `meta_title`, `meta_keyword`, `meta_description`) VALUES
(1, 'Digital Marketing Company In Bhubaneswar | Online Marketing Agency', '1773484025999.png', '1773484025714.png', 'office@drafticode.com', '+91 79751 89067', '+91 79751 89067', 'Office 2, B-15, Arihant Plaza, Saheed Nagar Bhubaneswar, Odisha 751007', 'Digital Marketing Company In Bhubaneswar | Online Marketing Agency', 'https://maps.google.com/?q=Bhubaneswar11', 'https://www.facebook.com/drafticode/', 'https://www.instagram.com/drafticode/', 'https://www.linkedin.com/company/drafticode/posts/?feedView=all', 'https://x.com/swatiselly', 'Drafticode | Web Development Company', 'web development, php development, website design, ecommerce development1', 'Drafticode is a professional web development company offering PHP, WordPress, and custom website development services.1');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `title` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `description` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `title`, `image`, `description`) VALUES
(1, 'its a teting image 1111', '1773389135996.png', '<h2>Company Achievements</h2>\r\n\r\n<p>Company achievements refer to the significant milestones or successes that a business has reached over time. These accomplishments can include financial growth, innovation, market leadership, customer satisfaction, or social impact.1111</p>\r\n');

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE `teams` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `image` varchar(256) NOT NULL,
  `designation` varchar(5000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `name`, `image`, `designation`) VALUES
(10, 'Anil', '11-1-r0v5ivg40fgekcmvfw9ew2b3orgveegg97kbil4xsg.png', 'Chief Operating Officer'),
(11, 'Swati', '13-r0v5iy9mkxk9j6irzfhaljlhgx2z1hrn9liryf0r9s.png', 'Chief Executive Officer'),
(12, 'Subhasish', '14-r0v5j05aylmu6eg1ogajqj4enotpgvz3xutqwyxyxc.png', 'Content & Curriculum Manager'),
(13, 'Anwesh', 'IMG_6347-1-r4s6d0ykyqjh4slmh2khh5txxud2o6ez9og5yxxuds.jpg', 'Video Editor'),
(14, 'Sima', 'IMG_20240202_172839-1-r8i07ezs5c3hzpuoqhy5nkugq6weu4oipsygj96h3k.jpg', 'Graphic Designer'),
(15, 'Sabita', 'IMG_20251030_121224-rdyh51b95tdid9xkybnh06v967mnszqq5m0mbv8gls.jpg', 'Intern'),
(16, 'Anandita', 'WhatsApp-Image-2025-02-01-at-5.56.40-PM-1-r0v61frczmv9v3o41f55mvnu1pyuf75lt3ejqbm0wg.jpeg', 'Business Development Manager'),
(17, 'Sarmistha', '9-r0v5ismlfxcjliqywd1j6l0pwlurrb598tlv2r94b4.png', 'Junior Developer'),
(18, 'Banita', '4.png', 'Junior Developer'),
(19, 'Saroj', '6-r0v5iov8ol7eb2wfibf0wlyvj2dawiqbwazx5nep00.png', 'Sr. Developer');

-- --------------------------------------------------------

--
-- Table structure for table `testimonial`
--

CREATE TABLE `testimonial` (
  `id` int(11) NOT NULL,
  `name` varchar(256) NOT NULL,
  `designation` varchar(256) NOT NULL,
  `testimonial` varchar(3000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `testimonial`
--

INSERT INTO `testimonial` (`id`, `name`, `designation`, `testimonial`) VALUES
(1, 'sarmistha satrusallya', 'Lead AR Developer', '<p>Company achievements refer to the significant milestones or successes that a business has reached over time. These accomplishments can include financial growth, innovation, market leadership, customer satisfaction, or social impact.</p>\r\n\r\n<ul>\r\n	<li>\r\n	<h2>Tools and Techniques</h2>\r\n\r\n	<p>Tools and techniques for company achievements include strategic planning, performance metrics, innovation, team collaboration, and data-driven decision-making to drive growth and success.</p>\r\n	</li>\r\n	<li>\r\n	<h2>Before and After Comparisons</h2>\r\n\r\n	<p>Before and after comparisons of company achievements highlight the progress made, showcasing improvements in revenue, market share, or customer satisfaction</p>\r\n	</li>\r\n	<li>\r\n	<h2>Client Name and Position</h2>\r\n\r\n	<p>Client names and positions in company achievements reflect the key partnerships and leadership roles that contribute to a company&rsquo;s success.</p>\r\n	</li>\r\n</ul>\r\n');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `activity_logs`
--
ALTER TABLE `activity_logs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `blogs`
--
ALTER TABLE `blogs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `clients`
--
ALTER TABLE `clients`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `courses`
--
ALTER TABLE `courses`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `internships`
--
ALTER TABLE `internships`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jobs`
--
ALTER TABLE `jobs`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `testimonial`
--
ALTER TABLE `testimonial`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `activity_logs`
--
ALTER TABLE `activity_logs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `blogs`
--
ALTER TABLE `blogs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `clients`
--
ALTER TABLE `clients`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=45;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `courses`
--
ALTER TABLE `courses`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `internships`
--
ALTER TABLE `internships`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `jobs`
--
ALTER TABLE `jobs`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `testimonial`
--
ALTER TABLE `testimonial`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
