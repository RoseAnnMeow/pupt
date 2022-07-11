-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 02, 2022 at 12:40 PM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.1.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `taguig_dental`
--

-- --------------------------------------------------------

--
-- Table structure for table `about`
--

CREATE TABLE `about` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `content` longtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `about`
--

INSERT INTO `about` (`id`, `title`, `image`, `content`) VALUES
(1, 'Know More About PUP Taguig Dental Clinic', '1655738310.jpg', '<p><span style=\"color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;;\">PUP Taguig Dental Clinic isn’t just another place to see a dentist in Pampanga.</span><span style=\"color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;;\">&nbsp;We’re a multispecialty practice that can provide preventive care, dental implants, gum disease treatment, orthodontics, oral surgery, root canals, and much more in one location. The complete range of dentistry under one roof. In addition to all treatments, we see patients of all ages. Every member of your family. With&nbsp;</span><em style=\"-webkit-font-smoothing: antialiased; color: rgb(34, 34, 34); font-family: &quot;2&quot;, &quot;Helvetica Neue&quot;, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;;\">well over a century</span></em><span style=\"color: rgb(34, 34, 34); font-family: &quot;Open Sans&quot;;\">&nbsp;of combined experience, years of diverse, advanced training, and ongoing education in the latest techniques and technologies, our team is the only “dentist” you’ll ever need.</span><br></p>');

-- --------------------------------------------------------

--
-- Table structure for table `dental_history`
--

CREATE TABLE `dental_history` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `dentist` varchar(255) NOT NULL,
  `visit` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `documents`
--

CREATE TABLE `documents` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `description` varchar(255) NOT NULL,
  `document` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `documents`
--

INSERT INTO `documents` (`id`, `patient_id`, `date`, `description`, `document`) VALUES
(1, '103', '2021-12-05 11:39:54', 'dsdfsds', ''),
(2, '104', '2021-12-05 14:51:37', 'dfdf', '1638715897.txt'),
(3, '104', '2021-12-05 14:52:30', 'fsdfs', '1638715950.docx');

-- --------------------------------------------------------

--
-- Table structure for table `featured`
--

CREATE TABLE `featured` (
  `id` int(11) NOT NULL,
  `dentist_id` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `featured`
--

INSERT INTO `featured` (`id`, `dentist_id`, `description`, `image`) VALUES
(11, '157', 'Official PUP Taguig Dentist', '1655738639.jpg'),
(14, '158', 'PUP Taguig University Dentist', '1656752513.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `gallery`
--

CREATE TABLE `gallery` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL,
  `status` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `gallery`
--

INSERT INTO `gallery` (`id`, `image`, `status`) VALUES
(19, '1656599383.png', 'Active'),
(20, '1656599392.png', 'Active'),
(21, '1656599397.png', 'Active'),
(22, '1656599402.png', 'Active');

-- --------------------------------------------------------

--
-- Table structure for table `header`
--

CREATE TABLE `header` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` longtext NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `header`
--

INSERT INTO `header` (`id`, `title`, `content`, `image`) VALUES
(1, 'Experience PUP Taguig Dental Care', 'We at PUP Taguig Dental Clinic take pride in the level of treatments and services we’re offering. Aside from the state-of-the-art equipment, our dental team is fully equipped with knowledge and experience in the field.', '1656599955.png');

-- --------------------------------------------------------

--
-- Table structure for table `health_declaration`
--

CREATE TABLE `health_declaration` (
  `id` int(11) NOT NULL,
  `question_id` int(11) NOT NULL,
  `patient_id` varchar(191) NOT NULL,
  `answer` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `health_declaration`
--

INSERT INTO `health_declaration` (`id`, `question_id`, `patient_id`, `answer`) VALUES
(1382, 3, '151', 'No'),
(1383, 4, '151', 'No'),
(1384, 5, '151', 'No'),
(1385, 6, '151', 'No'),
(1386, 7, '151', 'No'),
(1387, 8, '151', 'No'),
(1388, 9, '151', 'No'),
(1389, 10, '151', 'No'),
(1390, 11, '151', 'No'),
(1391, 12, '151', 'No'),
(1392, 13, '151', 'No'),
(1393, 14, '151', 'No'),
(1394, 15, '151', 'No'),
(1395, 16, '151', 'No'),
(1452, 3, '177', 'No'),
(1453, 4, '177', 'No'),
(1454, 5, '177', 'No'),
(1455, 6, '177', 'No'),
(1456, 7, '177', 'No'),
(1457, 8, '177', 'No'),
(1458, 9, '177', 'No'),
(1459, 10, '177', 'No'),
(1460, 11, '177', 'No'),
(1461, 12, '177', 'No'),
(1462, 13, '177', 'No'),
(1463, 14, '177', 'No'),
(1464, 15, '177', 'No'),
(1465, 16, '177', 'No'),
(1536, 3, '178', 'No'),
(1537, 4, '178', 'No'),
(1538, 5, '178', 'No'),
(1539, 6, '178', 'No'),
(1540, 7, '178', 'No'),
(1541, 8, '178', 'No'),
(1542, 9, '178', 'No'),
(1543, 10, '178', 'No'),
(1544, 11, '178', 'No'),
(1545, 12, '178', 'No'),
(1546, 13, '178', 'No'),
(1547, 14, '178', 'No'),
(1548, 15, '178', 'No'),
(1549, 16, '178', 'No'),
(1564, 3, '169', 'No'),
(1565, 4, '169', 'No'),
(1566, 5, '169', 'Yes'),
(1567, 6, '169', 'Yes'),
(1568, 7, '169', 'Yes'),
(1569, 8, '169', 'No'),
(1570, 9, '169', 'No'),
(1571, 10, '169', 'No'),
(1572, 11, '169', 'No'),
(1573, 12, '169', 'No'),
(1574, 13, '169', 'No'),
(1575, 14, '169', 'No'),
(1576, 15, '169', 'No'),
(1577, 16, '169', 'No'),
(1592, 3, '114', 'No'),
(1593, 4, '114', 'No'),
(1594, 5, '114', 'No'),
(1595, 6, '114', 'No'),
(1596, 7, '114', 'No'),
(1597, 8, '114', 'No'),
(1598, 9, '114', 'No'),
(1599, 10, '114', 'No'),
(1600, 11, '114', 'No'),
(1601, 12, '114', 'No'),
(1602, 13, '114', 'No'),
(1603, 14, '114', 'No'),
(1604, 15, '114', 'No'),
(1605, 16, '114', 'No'),
(1662, 3, '185', 'No'),
(1663, 4, '185', 'No'),
(1664, 5, '185', 'No'),
(1665, 6, '185', 'No'),
(1666, 7, '185', 'No'),
(1667, 8, '185', 'No'),
(1668, 9, '185', 'No'),
(1669, 10, '185', 'No'),
(1670, 11, '185', 'No'),
(1671, 12, '185', 'No'),
(1672, 13, '185', 'No'),
(1673, 14, '185', 'No'),
(1674, 15, '185', 'No'),
(1675, 16, '185', 'No'),
(1676, 3, '183', 'No'),
(1677, 4, '183', 'No'),
(1678, 5, '183', 'No'),
(1679, 6, '183', 'No'),
(1680, 7, '183', 'No'),
(1681, 8, '183', 'No'),
(1682, 9, '183', 'No'),
(1683, 10, '183', 'No'),
(1684, 11, '183', 'No'),
(1685, 12, '183', 'No'),
(1686, 13, '183', 'No'),
(1687, 14, '183', 'No'),
(1688, 15, '183', 'No'),
(1689, 16, '183', 'No');

-- --------------------------------------------------------

--
-- Table structure for table `medical_record`
--

CREATE TABLE `medical_record` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `q1` varchar(255) NOT NULL,
  `q2` varchar(255) NOT NULL,
  `q3` varchar(255) NOT NULL,
  `q4` varchar(255) NOT NULL,
  `q5` varchar(255) NOT NULL,
  `allergy` varchar(255) NOT NULL,
  `med` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `notification`
--

CREATE TABLE `notification` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `doc_id` varchar(255) NOT NULL,
  `subject` varchar(255) NOT NULL,
  `seen_status` int(1) NOT NULL COMMENT '0=not seen, 1=seen',
  `type` int(1) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `notification`
--

INSERT INTO `notification` (`id`, `patient_id`, `doc_id`, `subject`, `seen_status`, `type`, `created_at`) VALUES
(311, '183', '142', 'Request An Appointment', 1, 0, '2022-06-21 19:27:06'),
(312, '183', '142', 'Confirmed your Appointment', 1, 1, '2022-06-21 19:28:04'),
(313, '185', '142', 'Request An Appointment', 1, 0, '2022-06-21 20:23:41'),
(314, '185', '142', 'Confirmed your Appointment', 1, 1, '2022-06-21 20:23:57'),
(315, '183', '142', 'Request An Appointment', 1, 0, '2022-06-22 09:56:18'),
(316, '183', '142', 'Confirmed your Appointment', 1, 1, '2022-06-22 09:57:58'),
(317, '183', '142', 'Confirmed your Appointment', 1, 1, '2022-06-22 11:23:46'),
(318, '183', '142', 'Confirmed your Appointment', 1, 1, '2022-06-22 13:07:16'),
(319, '183', '157', 'Request An Appointment', 1, 0, '2022-07-02 16:22:52'),
(320, '185', '157', 'Request An Appointment', 1, 0, '2022-07-02 16:26:32'),
(321, '183', '157', 'Confirmed your Appointment', 1, 1, '2022-07-02 16:28:06'),
(322, '183', '158', 'Request An Appointment', 1, 0, '2022-07-02 17:24:28'),
(323, '183', '158', 'Confirmed your Appointment', 1, 1, '2022-07-02 17:25:03');

-- --------------------------------------------------------

--
-- Table structure for table `prescription`
--

CREATE TABLE `prescription` (
  `id` int(11) NOT NULL,
  `date` varchar(255) NOT NULL,
  `doc_id` varchar(255) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `medicine` varchar(255) NOT NULL,
  `advice` varchar(255) NOT NULL,
  `created_at` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `prescription`
--

INSERT INTO `prescription` (`id`, `date`, `doc_id`, `patient_id`, `medicine`, `advice`, `created_at`) VALUES
(35, '06/21/2022', '142', '183', 'Paracetamol', '3 x a day for 7 days', ''),
(36, '06/25/2022', '142', '183', 'Amoxcicillin', '1 x a day for 2 weeks', '');

-- --------------------------------------------------------

--
-- Table structure for table `procedures`
--

CREATE TABLE `procedures` (
  `id` int(11) NOT NULL,
  `service_id` varchar(255) NOT NULL,
  `procedures` varchar(255) NOT NULL,
  `price` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `procedures`
--

INSERT INTO `procedures` (`id`, `service_id`, `procedures`, `price`) VALUES
(2, '10', 'Sealant', '0 - Free of charge'),
(3, '7', 'Retainers', '8,000 per U & L'),
(4, '10', 'Replacement of rubber elastics/ligaties', '0 - Free of charge'),
(5, '7', 'Minor tooth movement', '10,000'),
(9, '9', 'Direct Composite Veneers ', '0 - Free of charge'),
(10, '9', 'Indirect Composite Veneers ', '0 - Free of charge'),
(11, '9', 'Porcelain Veneers', '0 - Free of charge'),
(12, '9', 'Laser Bleaching/Whitening (One session)', '0 - Free of charge'),
(13, '9', 'Cosmetic Gum Surgery (Recountouring)', '0 - Free of charge'),
(14, '6', 'Oral Prophylaxis with Tongue Scrapping', '0 - Free of charge'),
(15, '6', 'Deep Scaling', '0 - Free of charge'),
(16, '10', 'Fluoride Application with tray', '0 - Free of charge'),
(17, '8', 'Complicated Extraction', '0 - Free of charge'),
(18, '8', 'Sinus Lifting Procedure', '0 - Free of charge'),
(19, '8', 'Gingivoplasty', '0 - Free of charge'),
(20, '5', 'Plastic Crown with Metal Backing', '0 - Free of charge'),
(21, '5', 'Removable Partial Denture (Stay Plate) 1 to 4 pontics', '0 - Free of charge'),
(22, '6', 'Consultation', '0 - Free of charge'),
(23, '5', 'Removable Partial Denture (One piece casting)', '0 - Free of charge'),
(24, '5', 'Flexible Partial Denture (Bilateral)', '0 - Free of charge'),
(25, '5', 'Temporary Denture', '0 - Free of charge'),
(27, '10', 'Pasta', '0 - Free of charge');

-- --------------------------------------------------------

--
-- Table structure for table `questionnaires`
--

CREATE TABLE `questionnaires` (
  `id` int(11) NOT NULL,
  `questions` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `questionnaires`
--

INSERT INTO `questionnaires` (`id`, `questions`) VALUES
(3, 'Do you have a fever or temperature over 38  °C?'),
(4, 'Have you experienced shortness of breathe or had trouble breathing?'),
(5, 'Do you have a dry cough?'),
(6, 'Do you have runny nose?'),
(7, 'Have you recently lost or had a reduction in your sense of smell?'),
(8, 'Do you have sore throat?'),
(9, 'Do you have diarrhea?'),
(10, 'Do you have Influenza-like symptoms? (headache, aches and pains, a rash on skin)'),
(11, 'Do you have history of COVID-19 infection?'),
(12, 'Do you have a member of your family who tested positive for COVID-19?'),
(13, 'Have you been in contact with someone who has tested positive for COVID-19?'),
(14, 'Have you traveled or lived in an area with a report of local transmission of COVID 19?'),
(15, 'Have you traveled within the Philippines by air, bus, or train within the past 14 days? '),
(16, 'Have you traveled outside the Philippines by air or cruise ship in the past 14 days?');

-- --------------------------------------------------------

--
-- Table structure for table `reviews`
--

CREATE TABLE `reviews` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `designation` varchar(255) NOT NULL,
  `review` longtext NOT NULL,
  `status` varchar(50) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reviews`
--

INSERT INTO `reviews` (`id`, `name`, `designation`, `review`, `status`, `image`) VALUES
(11, 'Alexis Martin', 'Patient', 'Ease of appointments system, particularly with the new online service now. Always a friendly and professional service.', 'Active', '1656748819.png'),
(12, 'Rose Kyla Fernandex', 'Patient', 'The appointment is very subtle and everything that is going to happen is explained. I am always reassured that everything will be okay and I leave knowing that I have a healthy mouth', 'Active', '1656748861.jpg'),
(13, 'Florante Garcia Jr.', 'Patient', 'Very helpful, very friendly, been coming here for a while and never had a bad appointment.', 'Active', '1656748891.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `schedule`
--

CREATE TABLE `schedule` (
  `id` int(11) NOT NULL,
  `doc_id` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `doc_name` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `day` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `starttime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `endtime` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL,
  `duration` varchar(255) COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `schedule`
--

INSERT INTO `schedule` (`id`, `doc_id`, `doc_name`, `day`, `starttime`, `endtime`, `duration`) VALUES
(50, '158', 'Dr. Nelson Angeles', '2022-07-04', '9:05 AM', '9:05 PM', '30'),
(51, '158', 'Dr. Nelson Angeles', '2022-07-03', '9:30 PM', '5:00 PM', '45');

-- --------------------------------------------------------

--
-- Table structure for table `services`
--

CREATE TABLE `services` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `article_title` varchar(255) NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `services`
--

INSERT INTO `services` (`id`, `title`, `article_title`, `description`, `image`) VALUES
(3, 'Exodontia', 'What is Exodontia?', '<p><span style=\"font-size: 14px; font-family: &quot;Open Sans&quot;;\">﻿</span><span style=\"font-family: &quot;Open Sans&quot;; font-size: 14px;\">Dental implants are anchored in the jaw bone, and replacement teeth are permanently secured upon them. The clinic offers conventional implants, which are placed under the gums for 3 to 6 months. After then, the implants are exposed by removing gum tissue.</span></p>', '1639311096.jpg'),
(5, 'Prosthodontics Treatment', 'What is Prosthodontics Treatment?', '<p><span style=\"font-size: 14px; font-family: &quot;Open Sans&quot;;\">﻿</span><span style=\"font-family: &quot;Open Sans&quot;;\">PUP Taguig Dental Clinic provides a slate of prosthodontics or denture services to treat and rehabilitate patients’ oral function, comfort, and appearance.\r\n</span></p><p><span style=\"font-family: &quot;Open Sans&quot;;\">\r\nWe only use top-quality teeth for your dentures. And you need not wait a long time because we have our own laboratory that produces dentures.</span></p>', '1639320290.jpg'),
(6, 'Oral Prophylaxis', 'What is Oral Prophylaxis?', '<p class=\"brz-mb-xs-15 brz-tp-paragraph brz-text-xs-center brz-mb-lg-20\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: 1.6em;\"><span class=\"brz-cp-color1\" style=\"margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px; line-height: inherit; display: inline; font-family: &quot;Open Sans&quot;; font-size: 14px;\">Oral prophylaxis&nbsp;is a dental procedure that is performed to help reduce the risk of gum and tooth disease. Also known simply as prophylaxis or&nbsp;prophy, this dental procedure is recommended to</span><span style=\"font-size: 14px; font-family: &quot;Open Sans&quot;;\">﻿</span><span class=\"brz-cp-color1\" style=\"margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px; line-height: inherit; display: inline; font-family: &quot;Open Sans&quot;; font-size: 14px;\"> be taken every six months or yearly, depending on a patient’s history.</span></p><p class=\"brz-mb-xs-15 brz-tp-paragraph brz-text-xs-center brz-mb-lg-20\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: 1.6em;\"><span style=\"font-family: &quot;Open Sans&quot;; font-size: 14px;\">During dental prophylaxis, your dentist will also inspect your teeth and jaw for any obvious signs of ill health. This inspection may reveal underlying medical issues such as receding gums, erupting wisdom teeth, dental cavities, or even oral cancer – some of which will require immediate treatment. Early identification of dental problems can help you deal with them before they become serious.</span><br></p>', '1639321692.jpg'),
(8, 'Oral Surgery (Minor Surgery)', 'What is Oral Surgery?', '<p style=\"margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Source Sans Pro&quot;, Calibri, Candara, Arial, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;;\">﻿</span><span style=\"font-size: 14px;\">﻿</span><span style=\"font-family: &quot;Open Sans&quot;;\">You can expect our team of dentists to be very gentle but thorough with every surgical process. From simple extractions to complex treatments like frenectomy, where tissue is removed to prepare for dentures or braces, patients can be assured of great comfort during surgery as well as long-term enhancement of oral functions.</span></p><ul style=\"margin-bottom: 10.5px; color: rgb(51, 51, 51); font-family: &quot;Source Sans Pro&quot;, Calibri, Candara, Arial, sans-serif;\"><li><span style=\"font-family: &quot;Open Sans&quot;;\">Simple Extraction</span></li><li><span style=\"font-family: &quot;Open Sans&quot;;\">Odontectomy (Wisdom Tooth Removal)</span></li><li><span style=\"font-family: &quot;Open Sans&quot;;\">Apicoectomy</span></li><li><span style=\"font-family: &quot;Open Sans&quot;;\">Alveolectomy/Alveoplasty (Removal or Trimming of Ridge)</span></li><li><span style=\"font-family: &quot;Open Sans&quot;;\">Frenectomy</span></li><li><span style=\"font-family: &quot;Open Sans&quot;;\">Torus Palatinus/Mandibularis</span></li></ul>', '1641531487.jpg'),
(9, 'Cosmetic Dentistry', 'What is Cosmetic Dentistry?', '<p style=\"margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Source Sans Pro&quot;, Calibri, Candara, Arial, sans-serif;\"><span style=\"font-size: 14px;\">﻿</span><span style=\"font-family: &quot;Open Sans&quot;;\">﻿</span><span style=\"font-size: 14px;\">﻿</span><span style=\"font-family: &quot;Open Sans&quot;;\">We promise you a smile makeover that goes beyond improving how your teeth and gums function. Ever wonder how actors and actresses have gotten that picture-perfect teeth? At PUP Taguig Dental Clinic, you can now also enjoy quality cosmetic treatments that they get. Our services involve whitening, teeth reshaping, bonding, porcelain veneers (laminates), crowns (caps), and gum grafts, among others. We can also restore decayed teeth to their original form and function.</span></p><p style=\"margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Source Sans Pro&quot;, Calibri, Candara, Arial, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;;\">Our all-porcelain/ceramic crowns mimic the appearance of natural teeth. Materials used for both are 100% biocompatible, metal-free, hypoallergenic, translucent, and natural-looking, without the unsightly dark gumlines. Zirconia crowns and bridges can also be used instead. The clinic utilizes E-max and Empress Systems for such treatments.</span></p>', '1641881695.jpg'),
(10, 'Restorative Treatment', 'What is Restorative Treatment?', '<p class=\"brz-mb-xs-15 brz-tp-paragraph brz-text-xs-center brz-mb-lg-20\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: 1.6em;\"><span style=\"font-family: &quot;Open Sans&quot;; font-size: 14px;\">﻿</span><span class=\"brz-cp-color1\" style=\"margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px; line-height: inherit; display: inline; font-family: &quot;Open Sans&quot;;\">A dental filling or also known as pasta is a way to restore a tooth damaged by decay back to its normal function and shape. When a dentist gives you a filling, he or she first removes the decayed tooth material, cleans the affected area, and then fills the cleaned out cavity with a filling material.</span></p><p class=\"brz-mb-xs-15 brz-tp-paragraph brz-text-xs-center brz-mb-lg-20\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: 1.6em;\"><span class=\"brz-cp-color1\" style=\"margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px; line-height: inherit; display: inline; font-family: &quot;Open Sans&quot;;\">Fillings are also used to repair cracked or broken teeth and teeth that have been worn down from misuse such as from nail-biting or tooth grinding. The dentist will tell you what type of restorative material will be used depending on the case of your tooth.</span></p>', '1655750197.jpg'),
(26, 'Routine Dental Examination', 'What is Routine Dental Examination?', '<p style=\"margin-top: 0cm; background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial;\"><span style=\"font-family: &quot;Open Sans&quot;; font-size: 14px;\">﻿</span><span style=\"font-family: &quot;Open Sans&quot;; font-size: 14px;\">﻿</span><span style=\"font-size: 14px; font-family: &quot;Open Sans&quot;;\">﻿</span><span style=\"font-size: 14px; font-family: &quot;Open Sans&quot;; color: rgb(68, 68, 68);\">A dental exam is a checkup of\r\nyour teeth and gums. Most children and adults should get a dental exam every\r\nsix months. These exams are important for protecting oral health. Oral health\r\nproblems can become serious and painful if not treated promptly.</span><font face=\"Source Sans Pro, sans-serif\"><span style=\"font-family: &quot;Open Sans&quot;; font-size: 14px;\">&nbsp;</span></font><span style=\"font-size: 14px; line-height: 107%; font-family: &quot;Open Sans&quot;; color: rgb(68, 68, 68);\">Dental exams are used to help find&nbsp;</span><span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 14px; line-height: 107%; font-family: &quot;Open Sans&quot;; border: 1pt none windowtext; padding: 0cm;\">tooth decay</span><span style=\"font-size: 14px; line-height: 107%; font-family: &quot;Open Sans&quot;; color: rgb(68, 68, 68);\">,&nbsp;</span><span style=\"background-image: initial; background-position: initial; background-size: initial; background-repeat: initial; background-attachment: initial; background-origin: initial; background-clip: initial; font-size: 14px; line-height: 107%; font-family: &quot;Open Sans&quot;; border: 1pt none windowtext; padding: 0cm;\">gum disease</span><span style=\"font-size: 14px; line-height: 107%; font-family: &quot;Open Sans&quot;; color: rgb(68, 68, 68);\">,\r\nand other oral health problems early, when they are easier to treat. The exams\r\nare also used to help educate people on the best ways to care for their teeth\r\nand gums.</span></p><p><span style=\"font-family: &quot;Open Sans&quot;; font-size: 14px;\">﻿</span><span style=\"font-family: &quot;Open Sans&quot;; font-size: 14px;\">﻿</span></p>', '1656754648.jpg'),
(27, 'Dental Consultation', 'What is Dental Consultation?', '<p><span style=\"font-size: 14px; font-family: &quot;Open Sans&quot;;\">﻿</span><span style=\"font-family: &quot;Open Sans&quot;; font-size: 14px;\">﻿</span><span style=\"font-size: 14px; color: rgb(32, 33, 36); font-family: &quot;Open Sans&quot;;\">A consultation is basically&nbsp;</span><span style=\"font-size: 14px; color: rgb(32, 33, 36); font-family: &quot;Open Sans&quot;;\">an evaluation of the current condition of your teeth</span><span style=\"font-size: 14px; color: rgb(32, 33, 36); font-family: &quot;Open Sans&quot;;\">. If you have not seen a dentist in a while, you may be worried or embarrassed about the current state of your teeth. A good dentist will not be judgmental or make you feel bad about your current dental health.</span><br><span style=\"font-family: &quot;Open Sans&quot;;\">﻿</span></p>', '1656754771.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `system_details`
--

CREATE TABLE `system_details` (
  `id` int(11) NOT NULL,
  `days` varchar(255) NOT NULL,
  `openhr` varchar(50) NOT NULL,
  `closehr` varchar(50) NOT NULL,
  `address` varchar(255) NOT NULL,
  `telno` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `mobile` varchar(255) NOT NULL,
  `facebook` varchar(255) NOT NULL,
  `map` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `brand` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `system_details`
--

INSERT INTO `system_details` (`id`, `days`, `openhr`, `closehr`, `address`, `telno`, `email`, `mobile`, `facebook`, `map`, `logo`, `brand`) VALUES
(1, '1,2,3,4,5,6', '10:00 AM', '6:00 PM', 'Building A, General Santos Ave, Taguig, Metro Manila', '+63 966 164 5400', 'test@puptaguig.com', '+639208326896', 'https://www.facebook.com/', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d1279.8261523267472!2d121.05026643954743!3d14.488365400729407!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397cf3cec1946a7%3A0xbe4d3aaa3dfe3a0!2sPUP%20Taguig%20Building%20A!5e0!3m2!1sen!2sph!4v1', '1656599254.png', '1656598995.png');

-- --------------------------------------------------------

--
-- Table structure for table `tbladmin`
--

CREATE TABLE `tbladmin` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `phone` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `status` tinyint(2) NOT NULL,
  `verify_token` varchar(255) NOT NULL,
  `verify_status` tinyint(2) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbladmin`
--

INSERT INTO `tbladmin` (`id`, `name`, `address`, `phone`, `email`, `image`, `password`, `role`, `status`, `verify_token`, `verify_status`, `created_at`) VALUES
(2, 'Admin', '123 Tests', '+639991234567', 'admin@gmail.com', '1642944005.png', '$2y$10$rOMqq.NE6WAaD5VqvBAwdeGqzdgG.4kTmIoeSoLS48rXBCRt34SPu', 'admin', 1, '', 0, '2022-01-23 21:20:05'),
(9, 'Admin1', 'sample', '+639888876666', 'admin1@gmail.com', '1644421353.png', '$2y$10$4sIufeGGGI5TEdkgvbNxe.YCVyHv/JT9Og0b1IZPaIzeyducddp6m', 'admin', 1, '', 0, '2022-02-09 23:42:33'),
(11, 'Victoria Dolor', 'Barangay new lower bicutan Taguig city', '+639164546149', 'lullabyangela@gmail.com', '1655807754.png', '$2y$10$7syGUZfYF1ChM.tDksHyjeAtuUAGuSCod9gEymrUqk/2lJLSyxq4q', 'admin', 1, '', 0, '2022-06-21 18:35:54'),
(12, 'Julius Cabaces', 'Pateros ', '+639164546149', 'juliuscarlo.cabaces@gmail.com', '1655863262.png', '$2y$10$gXNBMoFD6BqC9aEQ.YRz7OjXTXfTClBhfbWuLHJ96tMnMP6KvQwBi', 'admin', 1, '', 0, '2022-06-22 10:01:01');

-- --------------------------------------------------------

--
-- Table structure for table `tblappointment`
--

CREATE TABLE `tblappointment` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(191) NOT NULL,
  `patient_name` varchar(255) NOT NULL,
  `doc_id` varchar(191) NOT NULL,
  `schedule` varchar(191) NOT NULL,
  `starttime` varchar(191) NOT NULL,
  `endtime` varchar(191) NOT NULL,
  `sched_id` varchar(225) NOT NULL,
  `schedtype` varchar(191) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `seen_status` int(1) NOT NULL,
  `status` varchar(100) NOT NULL,
  `bgcolor` varchar(7) NOT NULL,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblappointment`
--

INSERT INTO `tblappointment` (`id`, `patient_id`, `patient_name`, `doc_id`, `schedule`, `starttime`, `endtime`, `sched_id`, `schedtype`, `reason`, `seen_status`, `status`, `bgcolor`, `created_at`) VALUES
(296, '114', 'Rose Ann Bonador', '142', '2022-06-24', '09:00 AM', '09:45 AM', '47', 'Walk-in Schedule', 'Retainers', 0, 'Confirmed', '#f39c12', '2022-06-21 02:16:56'),
(302, '183', 'Victoria Angela Marie Aquino Dolor', '158', '2022-07-04', '09:35 AM', '10:05 AM', '50', 'Online Schedule', 'Pasta', 0, 'Treated', '', '2022-07-02 17:24:28');

-- --------------------------------------------------------

--
-- Table structure for table `tbldoctor`
--

CREATE TABLE `tbldoctor` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `degree` varchar(100) NOT NULL,
  `specialty` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(191) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1 COMMENT '0=inactive,1=active',
  `verify_token` varchar(255) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes	',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbldoctor`
--

INSERT INTO `tbldoctor` (`id`, `name`, `dob`, `address`, `gender`, `phone`, `email`, `degree`, `specialty`, `image`, `password`, `role`, `status`, `verify_token`, `verify_status`, `created_at`) VALUES
(158, 'Dr. Nelson Angeles', '10/19/1967', 'Block 4 Lot 4 Annex 31, Betterliving Subdivision, Marcelo Green, Paranaque', 'Male', '+639088906445', 'nelsonangeles.pupt@gmail.com', 'Doctor of Dental Medicine Masters in Educational Management , BS in Industrial Technology', 'General Dentistry', '1656752485.jpg', '$2y$10$3WY9GVfbAiCAtUVOpNb7dug4Tf9ksGfHifJlGSpvt7efkR3bLcAyu', '2', 1, '', 0, '2022-07-02 17:01:25');

-- --------------------------------------------------------

--
-- Table structure for table `tblpatient`
--

CREATE TABLE `tblpatient` (
  `id` int(11) NOT NULL,
  `fname` varchar(100) NOT NULL,
  `lname` varchar(191) NOT NULL,
  `address` varchar(100) NOT NULL,
  `dob` varchar(50) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(20) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(191) NOT NULL,
  `verify_token` varchar(191) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0 COMMENT '0=no,1=yes',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblpatient`
--

INSERT INTO `tblpatient` (`id`, `fname`, `lname`, `address`, `dob`, `gender`, `phone`, `email`, `image`, `password`, `role`, `verify_token`, `verify_status`, `created_at`) VALUES
(114, 'Rose Ann', 'Bonador', '25 Maginoo St. Brgy. Pinyahan Q.C.', '02/07/2002', 'Female', '+639297245140', 'roseannbonador5@gmail.com', '1640808093.png', '$2y$10$fi3QEukoZt1MPnG21NN9pui63/FzEoJ31KRF0jmtDBY5G0kpb2nfq', 'patient', 'd0bc6b0aca1687432f1d4b9df3fd468dfeliztooth', 1, '2021-12-30 04:01:33'),
(182, 'Alexis', 'Martin', 'Barangay pinagsama Taguig city', '02/27/2002', 'Male', '+639956493817', 'martinalexis2827@gmail.com', '1655800863.jpg', '$2y$10$glWUVLr.GNwFC3VyzBw25e3jG3abslGhzRUTLu/HFDhiacXULGYEq', 'patient', '863d8d9ddf57ec59ab42e21e1c55eceb', 0, '2022-06-21 16:41:03'),
(183, 'Victoria Angela Marie Aquino', 'Dolor', 'Barangay new lower bicutan Taguig city', '11/04/2000', 'Female', '+639164546149', 'dolorvam@gmail.com', '1655809993.png', '$2y$10$HbRdpIepu4G9SDv.nmN0/.gLHxXGEfc1VP.NQpDD/U/tqosChMMnK', 'patient', '33ad5aca204c75e7f496ff1e4a6adac0', 1, '2022-06-21 19:13:13'),
(184, 'Nicole', 'Alcid', 'Binan Laguna', '06/15/2022', 'Female', '+639956493817', 'nicolealcid9@gmail.com', '1655813588.jpeg', '$2y$10$OwiS7iqB2vxWnwIGpHrdA.rGTqlY9VtcNsLojuPCYpTVogRAqAwzy', 'patient', '3cc429d89d090420d29ff87f0011dd10', 0, '2022-06-21 20:13:08'),
(185, 'Julius', 'Cabaces', 'Pateros', '06/15/2022', 'Male', '+639956493817', 'juliuscarlo.cabaces@gmail.com', '1655813844.jpeg', '$2y$10$792keY3FGbPSk4fntEvNde8ysmr.iRc1Gxg5fEyXF9S.kwaGQADt.', 'patient', '8416836a1ba0caf99536d2e39ea72290', 1, '2022-06-21 20:17:24'),
(187, 'Alexis', 'Martin', '144-A Road 4 A. Reyes St. New Lower Bicutan, Taguig City', '02/27/2002', 'Male', '+639956493817', 'httpastronaut@gmail.com', '1656757993.jpeg', '$2y$10$0jejkcqg3KnLZs01pd8bk.I2eDJwmY/lCC21oVv7U3ZMbywTUmHSe', '3', '', 1, '2022-07-02 18:33:13');

-- --------------------------------------------------------

--
-- Table structure for table `tblschedule`
--

CREATE TABLE `tblschedule` (
  `id` int(11) NOT NULL,
  `doc_id` varchar(255) NOT NULL,
  `day` varchar(50) NOT NULL,
  `starttime` varchar(255) NOT NULL,
  `endtime` varchar(255) NOT NULL,
  `duration` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblschedule`
--

INSERT INTO `tblschedule` (`id`, `doc_id`, `day`, `starttime`, `endtime`, `duration`) VALUES
(24, '110', 'Wednesday', '15:22', '15:52', '30 minutes'),
(25, '85', 'Monday', '19:45', '20:45', '15 minutes'),
(28, '88', 'Monday', '07:23', '19:24', '15 minutes'),
(29, '88', 'Monday', '07:24', '19:26', '15 minutes'),
(30, '88', 'Monday', '07:44', '19:45', '15 minutes');

-- --------------------------------------------------------

--
-- Table structure for table `tblstaff`
--

CREATE TABLE `tblstaff` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `dob` varchar(100) NOT NULL,
  `address` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `phone` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `image` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role` varchar(191) NOT NULL,
  `status` tinyint(2) NOT NULL DEFAULT 1,
  `verify_token` varchar(255) NOT NULL,
  `verify_status` tinyint(2) NOT NULL DEFAULT 0,
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tblstaff`
--

INSERT INTO `tblstaff` (`id`, `name`, `dob`, `address`, `gender`, `phone`, `email`, `image`, `password`, `role`, `status`, `verify_token`, `verify_status`, `created_at`) VALUES
(4, 'staff', '02/02/2000', 'none', 'Male', '+639297205140', 'staff@gmail.com', '1643183452.png', '$2y$10$76AN7jP9tLoEU02pGJgyCOtjq6z1h8ZLt5hx78VmsInwtPDsrxwtC', 'staff', 1, 'a0def9cc611c093ce0590683a94b167f', 0, '2022-01-26 15:50:52');

-- --------------------------------------------------------

--
-- Table structure for table `treatment`
--

CREATE TABLE `treatment` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(255) NOT NULL,
  `doc_id` varchar(255) NOT NULL,
  `visit` varchar(255) NOT NULL,
  `teeth` varchar(255) NOT NULL,
  `complaint` varchar(255) NOT NULL,
  `treatment` varchar(255) NOT NULL,
  `fees` varchar(255) NOT NULL,
  `remarks` varchar(255) NOT NULL,
  `created_at` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `treatment`
--

INSERT INTO `treatment` (`id`, `patient_id`, `doc_id`, `visit`, `teeth`, `complaint`, `treatment`, `fees`, `remarks`, `created_at`) VALUES
(27, '183', '158', '2022-07-04', '1', 'success', 'Pasta', '0', 'Done', '2022-07-02 17:28:29');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `email`, `password`, `created_at`) VALUES
(1, 'admin@feliztoothdistrict.com', 'password', '2021-11-29 17:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `user_group`
--

CREATE TABLE `user_group` (
  `id` int(11) NOT NULL,
  `user_id` varchar(191) NOT NULL,
  `group_id` varchar(191) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user_group`
--

INSERT INTO `user_group` (`id`, `user_id`, `group_id`) VALUES
(1, '1', '1'),
(2, '92', '3'),
(3, '54', '2');

-- --------------------------------------------------------

--
-- Table structure for table `vaccine_status`
--

CREATE TABLE `vaccine_status` (
  `id` int(11) NOT NULL,
  `patient_id` varchar(191) NOT NULL,
  `status` tinyint(3) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `dental_history`
--
ALTER TABLE `dental_history`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `documents`
--
ALTER TABLE `documents`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `featured`
--
ALTER TABLE `featured`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `gallery`
--
ALTER TABLE `gallery`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `header`
--
ALTER TABLE `header`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `health_declaration`
--
ALTER TABLE `health_declaration`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `medical_record`
--
ALTER TABLE `medical_record`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `notification`
--
ALTER TABLE `notification`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `prescription`
--
ALTER TABLE `prescription`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `procedures`
--
ALTER TABLE `procedures`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `questionnaires`
--
ALTER TABLE `questionnaires`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reviews`
--
ALTER TABLE `reviews`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `schedule`
--
ALTER TABLE `schedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `services`
--
ALTER TABLE `services`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `system_details`
--
ALTER TABLE `system_details`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbladmin`
--
ALTER TABLE `tbladmin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblappointment`
--
ALTER TABLE `tblappointment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblpatient`
--
ALTER TABLE `tblpatient`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblschedule`
--
ALTER TABLE `tblschedule`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tblstaff`
--
ALTER TABLE `tblstaff`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `treatment`
--
ALTER TABLE `treatment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_group`
--
ALTER TABLE `user_group`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `vaccine_status`
--
ALTER TABLE `vaccine_status`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about`
--
ALTER TABLE `about`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `dental_history`
--
ALTER TABLE `dental_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=42;

--
-- AUTO_INCREMENT for table `documents`
--
ALTER TABLE `documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `featured`
--
ALTER TABLE `featured`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=23;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `health_declaration`
--
ALTER TABLE `health_declaration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1690;

--
-- AUTO_INCREMENT for table `medical_record`
--
ALTER TABLE `medical_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=324;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `procedures`
--
ALTER TABLE `procedures`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `questionnaires`
--
ALTER TABLE `questionnaires`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `reviews`
--
ALTER TABLE `reviews`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=52;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `system_details`
--
ALTER TABLE `system_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=303;

--
-- AUTO_INCREMENT for table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=159;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=188;

--
-- AUTO_INCREMENT for table `tblschedule`
--
ALTER TABLE `tblschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `user_group`
--
ALTER TABLE `user_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `vaccine_status`
--
ALTER TABLE `vaccine_status`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
