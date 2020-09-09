-- -------------------------------------------------------------
-- TablePlus 3.6.2(322)
--
-- https://tableplus.com/
--
-- Database: notes
-- Generation Time: 2020-08-13 14:34:14.4050
-- -------------------------------------------------------------


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


CREATE TABLE `notes` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `userID` int(11) DEFAULT NULL,
  `content` longtext,
  `title` mediumtext,
  `trashed` int(11) DEFAULT '0',
  `dateAdded` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `lastUpdated` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=72 DEFAULT CHARSET=latin1;

CREATE TABLE `shared_notes` (
  `noteID` int(11) unsigned NOT NULL,
  `sharedTo` int(11) DEFAULT NULL,
  `sharedFrom` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

CREATE TABLE `users` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `password` varchar(255) DEFAULT NULL,
  `unReadNote` int(11) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=38 DEFAULT CHARSET=latin1;

INSERT INTO `notes` (`id`, `userID`, `content`, `title`, `trashed`, `dateAdded`, `lastUpdated`) VALUES
('1', '1', 'Angular provides properties on forms that help us validate them. They give us various information about a form or its inputs and are applied to a form and inputs.', 'Angular', '0', NULL, NULL),
('22', '1', 'hello', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac congue lectus. Vivamus a mi augue. Cras rhoncus, purus sed tempus mattis, erat turpis accumsan arcu, sit amet posuere nisi massa nec ipsum. Quisque congue tellus malesuada lectus lobortis ultricies. Integer tincidunt vulputate dui. Donec nibh massa, convallis ut nunc vitae, efficitur varius tortor. Cras sed tempor tortor. Nunc vitae enim blandit, tincidunt arcu in, maximus est. Integer enim justo, placerat ut mi dictum, malesuada fringilla lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac congue lectus. Vivamus a mi augue. Cras rhoncus, purus sed tempus mattis, erat turpis accumsan arcu, sit amet posuere nisi massa nec ipsum. Quisque congue tellus malesuada lectus lobortis ultricies. Integer tincidunt vulputate dui. Donec nibh massa, convallis ut nunc vitae, efficitur varius tortor. Cras sed tempor tortor. Nunc vitae enim blandit, tincidunt arcu in, maximus est. Integer enim justo, placerat ut mi dictum, malesuada fringilla lorem. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer ac congue lectus. Vivamus a mi augue. Cras rhoncus, purus sed tempus mattis, erat turpis accumsan arcu, sit amet posuere nis', '1', NULL, NULL),
('26', '1', 'whatever', 'asdfasdfasdfasdfasfd', '0', NULL, NULL),
('27', '1', 'alidsfoaisdnfansgaogngangngngngngn', 'alskdfjalsdfk', '1', NULL, NULL),
('28', '1', 'asdfasdfasdfasdf', 'asdfasdf', '0', NULL, NULL),
('29', '2', 'helloasdfasdfasdfasfd', 'first note', '0', NULL, NULL),
('30', '14', 'hello', 'test note', '1', NULL, NULL),
('31', '14', 'aldksfjasdf', 'new not', '0', NULL, NULL),
('32', '16', 'hello this is a new noteasdf', 'new note', '1', '2016-02-12 17:02:06', '2016-02-13 03:46:51'),
('33', '16', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla tincidunt lacinia semper. Nam aliquet aliquam diam, vel imperdiet massa ultricies ac. Nullam iaculis vestibulum metus, et pretium erat lacinia vel. Interdum et malesuada fames ac ante ipsum primis in faucibus. Ut eu maximus arcu. Suspendisse potenti. Phasellus mattis ante vitae massa mattis hendrerit. Nam augue turpis, bibendum consectetur mauris non, dignissim elementum nunc. Sed elit tortor, euismod aliquam neque et, mattis eleifend quam. Nam ut ligula sapien.\n\nMauris feugiat mi at justo vestibulum euismod. Donec at orci id augue sodales fermentum vitae id neque. Nam eget tincidunt nisl. Nam ac facilisis augue, id pellentesque augue. Praesent ac felis justo. In dignissim ante erat, eget lacinia velit tempor sodales. Mauris urna urna, posuere euismod nulla nec, sollicitudin suscipit felis. Ut porta sapien eget urna facilisis mollis. Vestibulum eu risus et tellus egestas rutrum. Nunc turpis nunc, interdum sed efficitur ac, auctor quis mi.', 'asdfasdfasdfasdf', '1', '2016-02-12 17:37:45', '2016-02-15 04:07:20'),
('34', '16', 'ffff', 'ffff', '0', '2016-02-12 17:37:49', '2016-02-13 00:37:49'),
('35', '16', 'hello', 'hello', '0', '2016-02-12 18:10:30', '2016-05-28 21:07:58'),
('36', '16', 'remember to play xboxlaksdjflkasdjf', '67', '1', '2016-02-12 18:12:58', '2016-02-13 03:00:36'),
('37', '16', 'hello', 'new note again', '1', '2016-02-12 18:14:21', '2016-02-13 01:14:21'),
('38', '16', 'fffffffasdfasdfasdf', 'asdf', '1', '2016-02-12 18:15:02', '2016-02-15 04:26:00'),
('39', '16', 'laksdfngflag', 'helo', '1', '2016-02-12 18:24:54', '2016-02-13 01:24:54'),
('40', '0', '', '', '0', '2016-02-12 19:25:06', '2016-02-13 02:25:06'),
('41', '16', 'ffffffffNubl, Syria (CNN)\"Thank you Russia! Thank you Hezbollah! Thank you Iran!\" shouts the man, as he passes us in the busy square.\n\nNearby, a phoasdfasfdtograph of Bashar al-Assad beams down from tasdfasdfasdfasdfhe front of the town hall, and banners in support of the Syrian President hang outside the main mosque.\nasdf\nThis is Nubl, a mostly Shia, pro-government town in Syria, so close to the border with Turkey that on the way here our phones constantly switched to Turkish mobile networks.\n\nUntil two weeks ago Nubl and its neighbor al-Zahra were under siege; various rebel factions, including the al-Nusra Front and others linked to the Free Syrian Army, controlled the countryside nearby for more than three years.\n\nThen the Syrian army -- backed by pro-Iranian militias and supported by controversial Russian air strikes -- broke through.\n\nIn Nubl, al-Assad-supporting local residents are still jubilant; \"God, Syria, Bashar, and nothing else,\" a group of them chanted as we approached.', 'cnn', '1', '2016-02-12 20:19:48', '2016-05-21 16:20:25'),
('42', '17', 'Introducing AWS Certificate Manager\nAWS Certificate Manager is a new service that lets you easily provision, manage, and deploy Secure Sockets Layer/Transport Layer Security (SSL/TLS) certificates for use with AWS services. SSL/TLS certificates are used to secure network communications and establish the identity of websites over the Internet. AWS Certificate Manager removes the time-consuming manual process of purchasing, uploading, and renewing SSL/TLS certificates. You pay only for the AWS resources you create to run your application.', 'edit new note', '0', '2016-02-12 21:05:24', '2016-02-13 04:12:18'),
('43', '18', 'heyasdfasdfasdf', 'hey', '0', '2016-02-14 21:14:44', '2016-02-15 04:15:24'),
('44', '18', 'alsdkjflaskdfjalsdkfj', 'jfalsdfkjfownfff', '0', '2016-02-14 21:15:05', '2016-02-15 04:15:05'),
('45', '16', 'sdf', 'asdfa', '1', '2016-03-09 22:31:02', '2016-03-10 05:31:02'),
('46', '16', 'sdf', 'asdfa', '1', '2016-03-10 22:08:26', '2016-03-11 05:08:26'),
('47', '16', 'test', 'test', '0', '2016-05-21 16:20:46', '2019-03-15 18:18:50'),
('48', '16', 'I like notes.', 'Hey', '0', '2016-05-28 21:07:48', '2016-05-28 21:07:48'),
('49', '16', 'est', 'testt', '0', '2016-07-06 00:30:01', '2016-07-06 00:30:01'),
('50', '0', '', '', '0', '2016-07-09 01:33:37', '2016-07-09 01:33:37'),
('51', '0', '', '', '0', '2016-08-03 16:03:47', '2016-08-03 16:03:47'),
('52', '0', '', '', '0', '2016-08-03 16:04:04', '2016-08-03 16:04:04'),
('53', '0', '', '', '0', '2016-08-23 19:26:01', '2016-08-23 19:26:01'),
('54', '16', 'hello', 'someone', '0', '2016-09-02 19:47:52', '2016-09-02 19:47:52'),
('55', '0', '', '', '0', '2016-09-16 14:14:32', '2016-09-16 14:14:32'),
('56', '0', '', '', '0', '2016-10-03 23:23:37', '2016-10-03 23:23:37'),
('57', '0', '', '', '0', '2016-10-03 23:23:52', '2016-10-03 23:23:52'),
('58', '0', '', '', '0', '2016-11-11 12:07:11', '2016-11-11 12:07:11'),
('59', '16', 'I like notes', 'Notes are cool', '0', '2016-11-16 22:02:13', '2016-11-16 22:02:13'),
('60', '0', '', '', '0', '2016-11-20 17:43:32', '2016-11-20 17:43:32'),
('61', '0', '', '', '0', '2016-12-18 22:36:07', '2016-12-18 22:36:07'),
('62', '16', 'Test', 'Hello World', '0', '2017-01-03 19:49:36', '2017-01-03 19:49:36'),
('63', '0', '', '', '0', '2017-02-04 14:51:42', '2017-02-04 14:51:42'),
('64', '0', '', '', '0', '2017-02-04 14:51:57', '2017-02-04 14:51:57'),
('65', '0', '', '', '0', '2017-03-21 06:30:01', '2017-03-21 06:30:01'),
('66', '0', '', '', '0', '2017-03-26 09:15:24', '2017-03-26 09:15:24'),
('67', '0', '', '', '0', '2017-03-29 17:41:34', '2017-03-29 17:41:34'),
('68', '0', '', '', '0', '2017-03-31 16:00:49', '2017-03-31 16:00:49'),
('69', '0', '', '', '0', '2017-04-18 18:33:29', '2017-04-18 18:33:29'),
('70', '0', '', '', '0', '2017-04-18 18:33:49', '2017-04-18 18:33:49'),
('71', '0', '', '', '0', '2017-05-31 07:03:49', '2017-05-31 07:03:49');

INSERT INTO `shared_notes` (`noteID`, `sharedTo`, `sharedFrom`) VALUES
('31', '15', '14'),
('31', '7', '14'),
('31', '14', '2'),
('32', '16', '16'),
('39', '8', '16'),
('42', '16', '17'),
('0', '0', '0'),
('0', '0', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0'),
('0', '19', '0');

INSERT INTO `users` (`id`, `username`, `email`, `password`, `unReadNote`) VALUES
('2', 'note', 'test@test.com', '1d39ea203cbe9db7ab6a27fafadeb0f6', '1'),
('3', 'alkdjsfl', 'aldsfn@lksd.com', '1a1dc91c907325c69271ddf0c944bc72', NULL),
('4', 'water', 'jaden@jaden.com', '5f4dcc3b5aa765d61d8327deb882cf99', NULL),
('5', 'asdfasd', 'jlasd@lk.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('6', 'mother', 'test@test.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('7', 'hello', 'joe@joe.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('8', 'joebob', 'joe@joe.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('9', 'he', 't@t.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('10', 'afs', 'j@j.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('11', 'aff', 'j@j.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('12', 'aff', 'j@j.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('13', 'aff', 'j@j.com', 'e10adc3949ba59abbe56e057f20f883e', NULL),
('14', 'bill', 'bill@bill.com', '5f4dcc3b5aa765d61d8327deb882cf99', '1'),
('15', 'green', 'g@g.com', '1d39ea203cbe9db7ab6a27fafadeb0f6', '1'),
('16', 'voyage', 'jaden@jaden.com', '5f4dcc3b5aa765d61d8327deb882cf99', '0'),
('17', 'phone', 'phone@phone.com', '1d39ea203cbe9db7ab6a27fafadeb0f6', '1'),
('18', 'hello1', 'jaden@jaden.com', '1d39ea203cbe9db7ab6a27fafadeb0f6', '0'),
('19', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '1'),
('20', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0'),
('21', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0'),
('22', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0'),
('23', 'Thinks21', 'thehinklesaz@cox.net', '1cc50413022f4d7bd63cf74f7dd566b6', '0'),
('24', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0'),
('25', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0'),
('26', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0'),
('27', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0'),
('28', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0'),
('29', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0'),
('30', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0'),
('31', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0'),
('32', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0'),
('33', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0'),
('34', '', '', 'd41d8cd98f00b204e9800998ecf8427e', '0'),
('35', 'Collin87', 'collinparsons1019@gmail.com', '18e5c69dba2b1e33cb85eca944da8785', '0'),
('36', 'Snowangel41', 'angelreanea01@yahoo.com', 'f7bd0121d6f3796a24cbb631834e76e5', '0'),
('37', 'Wallace Gayle', 'wgayle221@gmail.com', '193d02c555cb03e44e25a187963fa5bd', '0');



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;
