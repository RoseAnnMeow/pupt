-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2022 at 09:33 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.0.14

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
(11, '141', 'Sample', '1655738639.jpg');

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
(4, '1655750010.jpg', 'Active'),
(5, '1655750029.jpg', 'Active'),
(18, '1655750317.jpg', 'Active');

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
(1, 'Experience World Class Dental Care', 'We at PUP Taguig Dental Clinic take pride in the level of treatments and services we’re offering. Aside from the state-of-the-art equipment, our dental team is fully equipped with knowledge and experience in the field', '1655738386.jpeg');

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
(1605, 16, '114', 'No');

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
(2, '10', 'Sealant', '2,500 per tooth'),
(3, '7', 'Retainers', '8,000 per U & L'),
(4, '10', 'Replacement of rubber elastics/ligaties', '4,000'),
(5, '7', 'Minor tooth movement', '10,000'),
(9, '9', 'Direct Composite Veneers ', '4,000 per unit'),
(10, '9', 'Indirect Composite Veneers ', '9,000 per unit'),
(11, '9', 'Porcelain Veneers', '12,000 - 25,000 per unit'),
(12, '9', 'Laser Bleaching/Whitening (One session)', '22,000'),
(13, '9', 'Cosmetic Gum Surgery (Recountouring)', '40,000'),
(14, '6', 'Oral Prophylaxis with Tongue Scrapping', '3,000 minimum'),
(15, '6', 'Deep Scaling', '3,500 per quadrant'),
(16, '10', 'Fluoride Application with tray', '5,000 per U & L'),
(17, '8', 'Complicated Extraction', '7,500 per removal'),
(18, '8', 'Sinus Lifting Procedure', '50,000 per side'),
(19, '8', 'Gingivoplasty', '7,500 per area'),
(20, '5', 'Plastic Crown with Metal Backing', '7,500 per unit'),
(21, '5', 'Removable Partial Denture (Stay Plate) 1 to 4 pontics', '28,000 per piece'),
(22, '6', 'Consultation', '1,500 case to case basis'),
(23, '5', 'Removable Partial Denture (One piece casting)', '45,000 per piece'),
(24, '5', 'Flexible Partial Denture (Bilateral)', '40,000 per piece'),
(25, '5', 'Temporary Denture', '10,000 U & L'),
(27, '10', 'Pasta', '500 per tooth');

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
(6, 'Christ Gallman', 'Patient', 'Your clinic is equipped with the latest instruments. It is comfortable and you and your team spread a warm atmosphere. So my decision to love all the treatment done in your dental clinic was absolutely right. I wish you and your team a successful future and my thanks for all.', 'Active', '1655750995.jpg'),
(7, 'Anne Curtis', 'CEO', 'Thank you to the rest of the staff for a job well done! My new smile gave me a lot of confidence. More power to you and your clinic!', 'Active', '1655751037.jpg');

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
(46, '141', 'Dr. Peter Parker', '2022-06-23', '9:00 AM', '4:00 PM', '45'),
(47, '142', 'Dr. Jane Doe', '2022-06-24', '9:00 AM', '4:00 PM', '45');

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
(3, 'Exodontia', 'What is Exodontia?', '<span style=\"font-family: &quot;Open Sans&quot;;\">Dental implants are anchored in the jaw bone, and replacement teeth are permanently secured upon them. The clinic offers conventional implants, which are placed under the gums for 3 to 6 months. After then, the implants are exposed by removing gum tissue.</span>', '1639311096.jpg'),
(5, 'Prosthodontics Treatment', 'What is Prosthodontics Treatment?', '<p><span style=\"font-family: &quot;Open Sans&quot;;\">Feliz Tooth District Dental Clinic provides a slate of prosthodontics or denture services to treat and rehabilitate patients’ oral function, comfort, and appearance.\r\n</span></p><p><span style=\"font-family: &quot;Open Sans&quot;;\">\r\nWe only use top-quality teeth for your dentures. And you need not wait a long time because we have our own laboratory that produces dentures.</span></p>', '1639320290.jpg'),
(6, 'Oral Prophylaxis', 'What is Oral Prophylaxis?', '<p class=\"brz-mb-xs-15 brz-tp-paragraph brz-text-xs-center brz-mb-lg-20\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: 1.6em;\"><span class=\"brz-cp-color1\" style=\"margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px; line-height: inherit; display: inline; font-family: &quot;Open Sans&quot;;\">Oral prophylaxis&nbsp;is a dental procedure that is performed to help reduce the risk of gum and tooth disease. Also known simply as prophylaxis or&nbsp;prophy, this dental procedure is recommended to be taken every six months or yearly, depending on a patient’s history.</span></p><p class=\"brz-mb-xs-15 brz-tp-paragraph brz-text-xs-center brz-mb-lg-20\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: 1.6em;\"><span style=\"font-family: &quot;Open Sans&quot;; font-size: 1rem;\">During dental prophylaxis, your dentist will also inspect your teeth and jaw for any obvious signs of ill health. This inspection may reveal underlying medical issues such as receding gums, erupting wisdom teeth, dental cavities, or even oral cancer – some of which will require immediate treatment. Early identification of dental problems can help you deal with them before they become serious.</span><br></p>', '1639321692.jpg'),
(7, 'Orthodontic Treatment', 'What is Orthodontic Treatment?', '<span style=\"color: rgb(51, 51, 51); font-family: &quot;Open Sans&quot;;\">We are very proud to offer Invisalign Braces apart from metal and ceramic brackets. Invisalign uses a series of clear aligners that are custom-molded for each patient. The virtually invisible aligners gradually reposition your teeth into a smile you’ll be proud of. Invisalign braces are removable, and most people won’t even notice you’re wearing them. Results set in in 6 months to 1 year.</span>', '1641531439.jpg'),
(8, 'Oral Surgery', 'What is Oral Surgery?', '<p style=\"margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Source Sans Pro&quot;, Calibri, Candara, Arial, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;;\">You can expect our team of dentists to be very gentle but thorough with every surgical process. From simple extractions to complex treatments like frenectomy, where tissue is removed to prepare for dentures or braces, patients can be assured of great comfort during surgery as well as long-term enhancement of oral functions.</span></p><ul style=\"margin-bottom: 10.5px; color: rgb(51, 51, 51); font-family: &quot;Source Sans Pro&quot;, Calibri, Candara, Arial, sans-serif;\"><li><span style=\"font-family: &quot;Open Sans&quot;;\">Simple Extraction</span></li><li><span style=\"font-family: &quot;Open Sans&quot;;\">Odontectomy (Wisdom Tooth Removal)</span></li><li><span style=\"font-family: &quot;Open Sans&quot;;\">Apicoectomy</span></li><li><span style=\"font-family: &quot;Open Sans&quot;;\">Alveolectomy/Alveoplasty (Removal or Trimming of Ridge)</span></li><li><span style=\"font-family: &quot;Open Sans&quot;;\">Frenectomy</span></li><li><span style=\"font-family: &quot;Open Sans&quot;;\">Torus Palatinus/Mandibularis</span></li></ul>', '1641531487.jpg'),
(9, 'Cosmetic Dentistry', 'What is Cosmetic Dentistry?', '<p style=\"margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Source Sans Pro&quot;, Calibri, Candara, Arial, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;;\">We promise you a smile makeover that goes beyond improving how your teeth and gums function. Ever wonder how actors and actresses have gotten that picture-perfect teeth? At Feliz Tooth District, you can now also enjoy quality cosmetic treatments that they get. Our services involve whitening, teeth reshaping, bonding, porcelain veneers (laminates), crowns (caps), and gum grafts, among others. We can also restore decayed teeth to their original form and function.</span></p><p style=\"margin-right: 0px; margin-bottom: 10.5px; margin-left: 0px; color: rgb(51, 51, 51); font-family: &quot;Source Sans Pro&quot;, Calibri, Candara, Arial, sans-serif;\"><span style=\"font-family: &quot;Open Sans&quot;;\">Our all-porcelain/ceramic crowns mimic the appearance of natural teeth. Materials used for both are 100% biocompatible, metal-free, hypoallergenic, translucent, and natural-looking, without the unsightly dark gumlines. Zirconia crowns and bridges can also be used instead. The clinic utilizes E-max and Empress Systems for such treatments.</span></p>', '1641881695.jpg'),
(10, 'Restorative Treatment', 'What is Restorative Treatment?', '<p class=\"brz-mb-xs-15 brz-tp-paragraph brz-text-xs-center brz-mb-lg-20\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: 1.6em;\"><span class=\"brz-cp-color1\" style=\"margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px; line-height: inherit; display: inline; font-family: &quot;Open Sans&quot;;\">A dental filling or also known as pasta is a way to restore a tooth damaged by decay back to its normal function and shape. When a dentist gives you a filling, he or she first removes the decayed tooth material, cleans the affected area, and then fills the cleaned out cavity with a filling material.</span></p><p class=\"brz-mb-xs-15 brz-tp-paragraph brz-text-xs-center brz-mb-lg-20\" style=\"margin-right: 0px; margin-bottom: 0px; margin-left: 0px; padding: 0px; line-height: 1.6em;\"><span class=\"brz-cp-color1\" style=\"margin-top: 0px; margin-bottom: 0px; padding-top: 0px; padding-bottom: 0px; line-height: inherit; display: inline; font-family: &quot;Open Sans&quot;;\">Fillings are also used to repair cracked or broken teeth and teeth that have been worn down from misuse such as from nail-biting or tooth grinding. The dentist will tell you what type of restorative material will be used depending on the case of your tooth.</span></p>', '1655750197.jpg');

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
(1, '1,2,3,4,5,6', '10:00 AM', '6:00 PM', '4B Excelsis Bldg., 2nd floor Unit B Mabiga, Mabalacat City, Pampanga', '+63 966 164 5400', 'test@puptaguig.com', '+639208326896', 'https://www.facebook.com/', 'https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3861.983833649958!2d120.99637741431951!3d14.542917182387757!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3397c95cd1acd485%3A0x9b30ef03677eb0e4!2s255%20Lions%20Rd%2C%20Pasay%2C%20Metro%20Manila!5', '1655738145.png', '1655738206.png');

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
(9, 'Admin1', 'sample', '+639888876666', 'admin1@gmail.com', '1644421353.png', '$2y$10$4sIufeGGGI5TEdkgvbNxe.YCVyHv/JT9Og0b1IZPaIzeyducddp6m', 'admin', 1, '', 0, '2022-02-09 23:42:33');

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
(296, '114', 'Rose Ann Bonador', '142', '2022-06-24', '09:00 AM', '09:45 AM', '47', 'Walk-in Schedule', 'Retainers', 0, 'Confirmed', '#f39c12', '2022-06-21 02:16:56');

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
(141, 'Dr. Peter Parker', '05/29/1980', 'Cubao NYC', 'Female', '+639297205140', 'peterparker@gmail.com', 'Masters in Dentistry', 'Orthodontics', '1641236084.jpg', '$2y$10$MbC3xDGeovoR7Mz3kQ9RWerozzHFWAoBUGqWSjv4vKYrOHJHcEvtS', 'dentist', 1, 'c40a4c9d8c98acf87b81b2029ac4e302', 0, '2021-12-29 14:31:25'),
(142, 'Dr. Jane Doe', '02/17/2000', '25 Maginoo St. Brgy. Pinyahan Q.C.', 'Female', '+639297205140', 'roseannbonador5@gmail.com', ' Doctor of Dental Medicine', 'Oral Surgery', '1641236106.jpg', '$2y$10$w..MdFVX.qyD626Y/mBhPOxFOU2Yt875o8iP5aC5got64Vw2eeapS', 'dentist', 1, '52419bd41b77a4da1059dbe9bda29c17feliztooth', 0, '2021-12-29 14:09:09'),
(149, 'Dr. Nicole Mendez', '05/6/1980', '25 Maginoo', 'Female', '+639202586385', 'nicolemendez@gmail.com', 'Masters in Oral Surgery', 'General Dentistry', '1644420778.jpg', '$2y$10$YiYgWlaN6MB4Q1lFfYx9QuG3re2xQjT9GuXuSa.RhJgndESM.5Eym', 'dentist', 1, '', 0, '2022-01-18 03:18:04'),
(154, 'Dr. Juliana Madrigal', '05/07/1990', 'Camp Crame', 'Female', '+639123445555', 'nicolemelendez@gmail.com', 'Masters in Dentistry', 'Orthodontics', '1644421472.jpg', '$2y$10$.OVEnzpl8sBRUH0KAleCxOjGR5VDt0dnR/XkQiuUaqo8BZRg8dMa.', '2', 1, '', 0, '2022-02-09 23:44:32');

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
(134, 'Romin ', 'Lualhati', '8 E Imperial Street Cubao Quezon City', '05/03/1999', 'Male', '+639352087260', 'romin@gmail.com', '1642287751.png', '$2y$10$pyLM64uX.DX/qNL3IM44WuvTiObGM.7O8FNSc4wC6Fj/QjMa0Cw0q', 'patient', '', 0, '2022-01-16 07:02:30'),
(135, 'Catherine', 'Bernardo', 'Molave Street Anonas', '01/28/2000', 'Female', '+639266284597', 'catherinebernardo@gmail.com', '1642289969.png', '$2y$10$HTTqM6pjGlouBQ3aCuaLEOVJdWFuPTvwrd9vNuaq6jZjb433YctFa', 'patient', '0a70b2ed8f43f82f2b51d02b491eb66a', 0, '2022-01-16 07:39:29'),
(138, 'Christine', 'De Luna', 'Conod 6 castaneda st.', '07/14/1992', 'Female', '+639266284597', 'christinedeluna@gmail.com', '1642302078.png', '$2y$10$KuKBOf62KADwfF0UCSw..uky.UaxpqB7xX8/HAY27GzdqIC19ZR4u', 'patient', '8a936425e7acdad5154fe00e7fb23640', 0, '2022-01-16 11:01:18'),
(143, 'Kim', 'Delos Reyes', 'Maginhawa St Diliman', '11/06/1997', 'Female', '+639297205140', 'kimdelosreyes@gmail.com', '1642447120.png', '$2y$10$7OlOhrFR6g681qtkOOt3F.pZUMwwBEo6qhEjcmK/MBiovsGA7AEf2', 'patient', '', 0, '2022-01-18 03:18:40'),
(148, 'Scarlet', 'Mendez', 'Montalban, Rizal', '04/05/2000', 'Female', '+639468229045', 'scarletmandez18@gmail.com', '1642569746.png', '$2y$10$F/cAI/f0CSohJEAkB7rd5uAHXh0lV6dUQMNvz/Dp2.DRSYy2SHQy2', 'patient', '95ccb71c44c792045317a62af2cb2774', 1, '2022-01-19 13:22:26'),
(156, 'Calvin', 'Klein', 'Texas', '03/13/1992', 'Male', '+639777777778', 'calvin@gmail.com', '1643482658.png', '$2y$10$0NcBob8fKIRQApRVM5dHKeNdEkpaUWHZ8srfNHcZ1S485WzTWDkDu', 'patient', '', 1, '2022-01-30 02:57:38'),
(162, 'Maria', 'Dela Santos', 'Metro Manila ', '01/30/2000', 'Female', '+639123456789', 'mariadelasantos9876@gmail.com', '1643549210.png', '$2y$10$ruCcfpBctIglkKKcT9Dw6uCShKUfiZED5zMyCqiEbHNg6hJbl31l6', 'patient', '65db23fe5dd709b9ba14d88a1d33657e', 0, '2022-01-30 21:26:50'),
(169, 'Ryan', 'Mercado', 'West Triangle', '03/23/1999', 'Male', '+639123456789', 'ryanmercado@gmail.com', '1644421673.jpg', '$2y$10$HjUWDGnjX6Zb.FiEqmwE6OpDnAtL.bz12zo9QcrUfti9VcCjHaHBG', '3', '', 1, '2022-02-09 23:47:53');

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `gallery`
--
ALTER TABLE `gallery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `header`
--
ALTER TABLE `header`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `health_declaration`
--
ALTER TABLE `health_declaration`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1606;

--
-- AUTO_INCREMENT for table `medical_record`
--
ALTER TABLE `medical_record`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `notification`
--
ALTER TABLE `notification`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=311;

--
-- AUTO_INCREMENT for table `prescription`
--
ALTER TABLE `prescription`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

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
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `schedule`
--
ALTER TABLE `schedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT for table `services`
--
ALTER TABLE `services`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `system_details`
--
ALTER TABLE `system_details`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `tbladmin`
--
ALTER TABLE `tbladmin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tblappointment`
--
ALTER TABLE `tblappointment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=297;

--
-- AUTO_INCREMENT for table `tbldoctor`
--
ALTER TABLE `tbldoctor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=155;

--
-- AUTO_INCREMENT for table `tblpatient`
--
ALTER TABLE `tblpatient`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=181;

--
-- AUTO_INCREMENT for table `tblschedule`
--
ALTER TABLE `tblschedule`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT for table `tblstaff`
--
ALTER TABLE `tblstaff`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `treatment`
--
ALTER TABLE `treatment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

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
