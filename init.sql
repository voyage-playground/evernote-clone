-- -------------------------------------------------------------
-- TablePlus 3.12.6(366)
--
-- https://tableplus.com/
--
-- Database: notes
-- Generation Time: 2021-04-21 13:42:43.6590
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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

INSERT INTO `notes` (`id`, `userID`, `content`, `title`, `trashed`, `dateAdded`, `lastUpdated`) VALUES
(1, 1, 'The lone lamp post of the one-street town flickered, not quite dead but definitely on its way out. Suitcase by her side, she paid no heed to the light, the street or the town. A car was coming down the street and with her arm outstretched and thumb in the air, she had a plan.\nThere are different types of secrets. She had held onto plenty of them during her life, but this one was different. She found herself holding onto the worst type. It was the type of secret that could gnaw away at your insides if you didn\'t tell someone about it, but it could end up getting you killed if you did.\nIt\'s always good to bring a slower friend with you on a hike. If you happen to come across bears, the whole group doesn\'t have to worry. Only the slowest in the group do. That was the lesson they were about to learn that day.', 'Interview Notes', 0, '2016-02-12 17:37:49', '2021-04-21 18:38:37'),
(2, 1, 'The words hadn\'t flowed from his fingers for the past few weeks. He never imagined he\'d find himself with writer\'s block, but here he sat with a blank screen in front of him. That blank screen taunting him day after day had started to play with his mind. He didn\'t understand why he couldn\'t even type a single word, just one to begin the process and build from there. And yet, he already knew that the eight hours he was prepared to sit in front of his computer today would end with the screen remaining blank.', 'Lot\'s of words', 0, '2016-02-12 18:10:30', '2021-04-21 18:38:09'),
(3, 1, 'Dave watched as the forest burned up on the hill, only a few miles from her house. The car had been hastily packed and Marta was inside trying to round up the last of the pets. Dave went through his mental list of the most important papers and documents that they couldn\'t leave behind. He scolded himself for not having prepared these better in advance and hoped that he had remembered everything that was needed. He continued to wait for Marta to appear with the pets, but she still was nowhere to be seen.', 'Meeting Notes', 0, '2016-05-21 16:20:46', '2021-04-21 18:36:50'),
(4, 1, 'It\'s not his fault. I know you\'re going to want to, but you can\'t blame him. He really has no idea how it happened. I kept trying to come up with excuses I could say to mom that would keep her calm when she found out what happened, but the more I tried, the more I could see none of them would work. He was going to get her wrath and there was nothing I could say to prevent it.\nTurning away from the ledge, he started slowly down the mountain, deciding that he would, that very night, satisfy his curiosity about the man-house. In the meantime, he would go down into the canyon and get a cool drink, after which he would visit some berry patches just over the ridge, and explore among the foothills a bit before his nap-time, which always came just after the sun had walked past the middle of the sky. At that period of the day the sunâ??s warm rays seemed to cast a sleepy spell over the silent mountainside, so all of the animals, with one accord, had decided it should be the hour for their mid-day sleep.', 'It\'s not my fault', 0, '2016-05-28 21:07:48', '2021-04-21 18:38:23'),
(5, 1, 'Hopes and dreams were dashed that day. It should have been expected, but it still came as a shock. The warning signs had been ignored in favor of the possibility, however remote, that it could actually happen. That possibility had grown from hope to an undeniable belief it must be destiny. That was until it wasn\'t and the hopes and dreams came crashing down.', 'Hopes and Dreams', 0, '2016-07-06 00:30:01', '2021-04-21 18:37:58'),
(6, 1, 'They rushed out the door, grabbing anything and everything they could think of they might need. There was no time to double-check to make sure they weren\'t leaving something important behind. Everything was thrown into the car and they sped off. Thirty minutes later they were safe and that was when it dawned on them that they had forgotten the most important thing of all.\nI\'m going to hire professional help tomorrow. I can\'t handle this anymore. She fell over the coffee table and now there is blood in her catheter. This is much more than I ever signed up to do.\nHer mom had warned her. She had been warned time and again, but she had refused to believe her. She had done everything right and she knew she would be rewarded for doing so with the promotion. So when the promotion was given to her main rival, it not only stung, it threw her belief system into disarray. It was her first big lesson in life, but not the last.', 'New book notes', 0, '2016-09-02 19:47:52', '2021-04-21 18:37:43'),
(7, 1, 'If you can imagine a furry humanoid seven feet tall, with the face of an intelligent gorilla and the braincase of a man, you\'ll have a rough idea of what they looked like -- except for their teeth. The canines would have fitted better in the face of a tiger, and showed at the corners of their wide, thin-lipped mouths, giving them an expression of ferocity.', 'Animal Study', 0, '2016-11-16 22:02:13', '2021-04-21 18:37:25'),
(8, 1, 'I recently discovered I could make fudge with just chocolate chips, sweetened condensed milk, vanilla extract, and a thick pot on slow heat. I tried it with dark chocolate chunks and I tried it with semi-sweet chocolate chips. It\'s better with both kinds. It comes out pretty bad with just the dark chocolate. The best add-ins are crushed almonds and marshmallows -- what you get from that is Rocky Road. It takes about twenty minutes from start to fridge, and then it takes about six months to work off the twenty pounds you gain from eating it. All things in moderation, friends. All things in moderation.', 'Discovery', 0, '2017-01-03 19:49:36', '2021-04-21 18:37:03'),
(9, 1, 'He sat staring at the person in the train stopped at the station going in the opposite direction. She sat staring ahead, never noticing that she was being watched. Both trains began to move and he knew that in another timeline or in another universe, they had been happy together.\nIt was a scrape that he hardly noticed. Sure, there was a bit of blood but it was minor compared to most of the other cuts and bruises he acquired on his adventures. There was no way he could know that the rock that produced the cut had alien genetic material on it that was now racing through his bloodstream. He felt perfectly normal and continued his adventure with no knowledge of what was about to happen to him.', 'Board in the car', 0, '2021-04-21 18:39:04', '2021-04-21 18:39:04'),
(10, 1, 'There was something special about this little creature. Donna couldn\'t quite pinpoint what it was, but she knew with all her heart that it was true. It wasn\'t a matter of if she was going to try and save it, but a matter of how she was going to save it. She went back to the car to get a blanket and when she returned the creature was gone.\nSometimes that\'s just the way it has to be. Sure, there were probably other options, but he didn\'t let them enter his mind. It was done and that was that. It was just the way it had to be.', 'I can\'t quit', 0, '2021-04-21 18:39:17', '2021-04-21 18:39:17');

INSERT INTO `users` (`id`, `username`, `email`, `password`, `unReadNote`) VALUES
(1, 'voyage', 'test@voyageapp.io', '5f4dcc3b5aa765d61d8327deb882cf99', 0),
(2, 'note', 'test@test.com', '1d39ea203cbe9db7ab6a27fafadeb0f6', 1),
(3, 'Collin87', 'collinparsons1019@gmail.com', '18e5c69dba2b1e33cb85eca944da8785', 0),
(4, 'Snowangel41', 'angelreanea01@yahoo.com', 'f7bd0121d6f3796a24cbb631834e76e5', 0),
(5, 'Wallace Gayle', 'wgayle221@gmail.com', '193d02c555cb03e44e25a187963fa5bd', 0);



/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;