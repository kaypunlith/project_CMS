-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: May 27, 2024 at 02:21 AM
-- Server version: 8.2.0
-- PHP Version: 8.2.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms_projecttest`
--

-- --------------------------------------------------------

--
-- Table structure for table `description`
--

DROP TABLE IF EXISTS `description`;
CREATE TABLE IF NOT EXISTS `description` (
  `id` int NOT NULL,
  `description` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `description`
--

INSERT INTO `description` (`id`, `description`) VALUES
(5, '<p>When you arise in the morning, think of what a precious privilege it is to be alive &ndash; to breathe, to think, to enjoy, to love.You can commit injustice by doing nothing.Waste no more time arguing about what a good man should be. Be one.Settle on the type of person you want to be and stick to it, whether alone or in company.</p>');

-- --------------------------------------------------------

--
-- Table structure for table `feedback`
--

DROP TABLE IF EXISTS `feedback`;
CREATE TABLE IF NOT EXISTS `feedback` (
  `id` int NOT NULL,
  `username` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `email` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `telephone` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `address` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `message` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `feedback`
--

INSERT INTO `feedback` (`id`, `username`, `email`, `telephone`, `address`, `message`, `create_at`) VALUES
(1, 'Victory', 'dimvictory46@gmail.com', '012123345', 'Street 261 PhnomPenh', 'hello', '2024-01-12 12:55:48'),
(2, 'Mark', 'Mark@gmail.com', '085123456', 'Street 255 Seamreap', 'Good Night', '2024-01-12 19:13:34'),
(5, 'jamebon', 'jamebon@gmail.com', '011547896', 'street261', 'Hello Jame', '2024-01-18 08:50:03');

-- --------------------------------------------------------

--
-- Table structure for table `follow_us`
--

DROP TABLE IF EXISTS `follow_us`;
CREATE TABLE IF NOT EXISTS `follow_us` (
  `id` int NOT NULL,
  `icon` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `label` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `url` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `follow_us`
--

INSERT INTO `follow_us` (`id`, `icon`, `label`, `status`, `url`) VALUES
(1, '120124031734-pinterest.png', 'Pinterest', 'Follow Us', 'https://www.pinterest.com/'),
(3, '120124033218-facebook.png', 'Facebook', 'Footer', 'https://www.facebook.com/'),
(4, '120124033239-twitter.png', 'X', 'All', 'https://www.X.com/'),
(5, '120124035752-tiktok.png', 'Tiktok', 'All', 'https://www.tiktok.com/'),
(11, '120124061000-telegram.png', 'Telegram', 'All', 'https://www.telegram.com/'),
(12, '180124024858-instagram.png', 'Instagram', 'All', 'https://www.instagram.com/');

-- --------------------------------------------------------

--
-- Table structure for table `logo`
--

DROP TABLE IF EXISTS `logo`;
CREATE TABLE IF NOT EXISTS `logo` (
  `id` int NOT NULL,
  `thumbnail` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL COMMENT 'header,footer'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `logo`
--

INSERT INTO `logo` (`id`, `thumbnail`, `status`) VALUES
(1, '270524013740-logo4.jpg', 'Header'),
(6, '270524021945-logo5.jpg', 'Footer');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

DROP TABLE IF EXISTS `news`;
CREATE TABLE IF NOT EXISTS `news` (
  `id` int NOT NULL AUTO_INCREMENT,
  `author_id` int NOT NULL,
  `banner` text NOT NULL,
  `thumbnail` text NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `create_at` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `category` char(50) NOT NULL,
  `type` char(30) NOT NULL,
  `view` int NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`id`, `author_id`, `banner`, `thumbnail`, `title`, `description`, `create_at`, `category`, `type`, `view`) VALUES
(1, 1, '270524125656-665174b488e0d_1716614280_medium.jpg', '270524125656-665174b488e0d_1716614280_medium.jpg', 'កីឡាករ​បារាំង​ទើប​មក​បាន​២​ថ្ងៃ​ សួន ចាន់ណារ៉ូ ប៉ះ​ឱ្យ​អុក​ផុង​ដី!', '<p>ក្នុង​ជំនួប​មិត្តភាព​អន្តរជាតិ​រវាង​ក្លឹប​បាល់ទះ​វិសាខាប្រទេស​កម្ពុជា និង Lavie Long An ប្រទេស​វៀតណាម​កាល​ពី​ថ្ងៃ​ទី​២៤ ខែឧសភា ឆ្នាំ២០២៤ ម្សិលមិញ កីឡាករ សួន ចាន់​ណារ៉ូ ត្រូវ​បាន​លោកគ្រូ​បង្គោល គាំ ស៊ាងហ៊ីន ​​​ប្ដូរ​ជំនួស​អ្នក​ប៉ះ​សេ​សញ្ជាតិ​បារាំង Thomas Gill។ &nbsp;ក្រោយ​ប្ដូរ​ចូល​ភ្លាម អ្នក​ប៉ះសេ​ឆ្នើម​របស់​វិសាខា និង​​ជម្រើស​ជាតិ​កម្ពុជា បាន​ចែក​បាល់​យ៉ាង​ស្អាត​ឱ្យ​ស្មាត់​ស្ដាំ​លេខ​៨ Francois Rebeyrol ផ្ដាច់​ស្អាត​មែនទែន​ដែល​មួយ​គ្រាប់​របស់​គេ​នេះ ធ្វើ​ឱ្យ​អ្នកគាំទ្រ​បាល់​ទះ​កម្ពុជា​​រាប់ពាន់​នាក់ស្រែក​ហ៊ោ អបអរសាទរ​អឺងកង​​ពេញ​សាល​តែម្ដង​។</p>\r\n<p>&nbsp;</p>\r\n<p>&gt;</p>', '2024-05-26 23:11:02', 'Sport', 'National', 1),
(2, 1, '270524125554-shuqi_medium.jpg', '270524125554-shuqi_medium.jpg', 'ម្ដាយ​របស់ Shu Qi ធ្លាប់រអ៊ូថា​កូនស្រីពីក្មេង​ មុខមហាយ៉ាប់គ្មានគូប្រៀប', '<p>ក្នុង​បទ​សម្ភាស​មួយ​កាល​ពី​ពេល​ថ្មី​ៗ តារា​ស្រី​វ័យ​ ៤១​ឆ្នាំ​រូប​នេះ​ បាន​ទម្លាយ​រឿង​ភ្ញាក់​ផ្អើល​ថា​ ពេល​នាង​នៅ​ក្មេង​ ម្ដាយ​នាង​តែង​រអ៊ូរទាំ​រឿងមុខ​ដ៏​សែន​យ៉ាប់​របស់​ខ្លួន។ អ្នក​ម្ដាយ​របស់​តារា​ស្រី​រូប​នេះ​មិន​គិត​ថា​ នាង​ស្អាត​សម​នោះ​ទេ ដោយសារ​ពេល​នោះ​ Shu Qi មាន​សក់​ក្រាស់​ឃ្មឹក។ ហេតុផល​នេះហើយ​ ទើប​ម្ដាយ​របស់​នាង​យល់​ថា​ សម្រស់​កូនស្រីម្នាក់នេះមិន​ត្រូវ​ស្ដង់ដា​ ហើយ​ចម្លែកទៀត។</p>\r\n<p>&nbsp;</p>\r\n<p>&gt;</p>', '2024-05-26 23:12:48', 'Entertainment', 'International', 2),
(3, 1, '260524041511-66505b3c4b681_1716542220_medium.jpg', '260524041511-66505b3c4b681_1716542220_medium.jpg', 'ដំបូង! Elon Musk ថា ទាល់តែមានរនាំងពាណិជ្ជកម្ម​ទើប​ទប់ទល់ក្រុមហ៊ុនឡានចិនបាន ឥឡូវលោកប្រែសម្តីបែបនេះទៅវិញ', '<p>នៅចាំបានទេ កាលពីខែមករា ឆ្នាំ​២០២៤ ស្ថាបនិកក្រុមហ៊ុន Tesla លោក Elon Musk បាន​ព្រមាន​ថា ប្រសិន​បើគ្មាន​រនាំងពាណិជ្ជកម្មណាមួយទេនោះ ក្រុមហ៊ុន​រថយន្តចិន​​នឹងកម្ទេច​ក្រុមហ៊ុន​រថយន្ត​ពិភពលោកច្រើនបំផុត។</p>\r\n<p>អ្វីដែល​គួរឱ្យភ្ញាក់ផ្អើលបំផុត​នោះ កាលពី​ពាក់កណ្តាលខែឧសភា ឆ្នាំ​២០២៤កន្លងទៅ ​ប្រធានាធិបតីអាមេរិក លោក ចូ បៃឌិន បាន​ប្រកាស​ដំឡើងពន្ធគយ ៤ដង លើការនាំចូល​រថយន្ត​អគ្គិសនី​ចិន</p>', '2024-05-26 23:15:11', 'Social', 'International', 3),
(4, 1, '270524125912-662f0783256ab_1714358100_medium.jpg', '270524125912-662f0783256ab_1714358100_medium.jpg', 'ឈ្នះ​មេដាយ​មាស៨ ប្រាក់៤​ ក្រុម​តេក្វាន់ដូ​ WT​ បណ្ឌិត្យសភា​នគរបាល​ជាប់​ចំណាត់​ថ្នាក់​លេខ១​ កីឡា​សិស្ស​ឧត្ដម​សិក្សា​', '<p>ក្រុម​កីឡាករ​ កីឡា​ការិនី​តេក្វាន់ដូ​ WT​ បង្ហាញ​ភាព​អស្ចាចារ្យ​ជា​ខ្លាំង​ដោយ​ឈ្នះ​មេដាយ​មាស​រហូត​ដល់​ទៅ​ ៨គ្រឿង​ និង​ប្រាក់​ ៤​គ្រឿង​ ជាប់​ចំណាត់​ថ្នាក់​លេខ១​ លើ​ប្រភេទ​កីឡា​មួយ​នេះ​នៃ​ព្រឹត្តិការណ៍​កីឡា​សិស្ស​ឧត្ដម​សិក្សា​ ឆ្នាំ​២០២៤។​ ក្រោយ​ធ្វើ​ការ​ប្រកួត​យ៉ាង​ស្វិតស្វាញ​លើ​ប្រភេទ​កីឡា​តេក្វាន់ដូ​ WT ​គឺ​បញ្ចប់​ហើយ​កាល​ពី​ថ្ងៃ​ទី២៤​ ខែ​ឧសភា​ ឆ្នាំ​២០២៤​ នៅ​អគារ​ប៊ូយ៉ុង​ ក្នុង​ពហុ​កីឡដ្ឋាន​ជាតិ។​ ក្នុង​នោះ​ក្រុម​តេក្វាន់ដូ​ បណ្ឌិត្យសភា​នគរបាល​កម្ពុជា​ ឈ្នះ​មេដាយ​មាស៨​ ប្រាក់​៤​ ជាប់​ចំណាត់​ថ្នាក់លេខ១​ ក្រុម​សកលវិទ្យាល័យ​គ្រប់គ្រង និង​សេដ្ឋកិច្ច ​</p>', '2024-05-27 07:59:12', 'Sport', 'National', 5);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `id` int NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `profile` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `name`, `email`, `password`, `profile`) VALUES
(1, 'dara', 'dara123@gmail.com', '202cb962ac59075b964b07152d234b70', '260524040714-admin2.jpg');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
