SET foreign_key_checks = 0;
SET sql_mode = 'NO_AUTO_VALUE_ON_ZERO';

DROP TABLE IF EXISTS `artist`;
CREATE TABLE `artist` (
  `artistId` int(11) NOT NULL,
  `artistName` varchar(50) NOT NULL,
  `artistBiography` text NOT NULL,
  `artistImage` text NOT NULL,
  `twitterId` varchar(255) NOT NULL,
  `facebookId` varchar(255) NOT NULL,
  `isDeleted` int(11) NOT NULL,
  `createdDate` datetime NOT NULL,
  `updatedDate` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
