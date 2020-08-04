-- --------------------------------------------------------
-- Host:                         127.0.0.1
-- Server version:               5.5.24-log - MySQL Community Server (GPL)
-- Server OS:                    Win32
-- HeidiSQL Version:             9.3.0.4984
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;

-- Dumping database structure for amvs_system
DROP DATABASE IF EXISTS `amvs_system`;
CREATE DATABASE IF NOT EXISTS `amvs_system` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `amvs_system`;


-- Dumping structure for table amvs_system.amvs_info
DROP TABLE IF EXISTS `amvs_info`;
CREATE TABLE IF NOT EXISTS `amvs_info` (
  `uname` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `addr` varchar(255) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `motto` varchar(255) NOT NULL,
  `logo` longblob NOT NULL,
  PRIMARY KEY (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.ceo
DROP TABLE IF EXISTS `ceo`;
CREATE TABLE IF NOT EXISTS `ceo` (
  `id` int(55) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `nid` int(8) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `photo` mediumblob NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nid` (`nid`),
  UNIQUE KEY `uname` (`uname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.chairman
DROP TABLE IF EXISTS `chairman`;
CREATE TABLE IF NOT EXISTS `chairman` (
  `id` int(55) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `nid` int(8) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `photo` mediumblob NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `uname_2` (`uname`),
  UNIQUE KEY `nid` (`nid`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `email_2` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.clerk
DROP TABLE IF EXISTS `clerk`;
CREATE TABLE IF NOT EXISTS `clerk` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `nid` int(8) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `polling` int(6) unsigned zerofill NOT NULL,
  `photo` mediumblob NOT NULL,
  `pwd` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `email` (`email`),
  UNIQUE KEY `nid` (`nid`),
  UNIQUE KEY `polling` (`polling`),
  CONSTRAINT `clerk_ibfk_1` FOREIGN KEY (`polling`) REFERENCES `polling` (`pollingcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.constituency
DROP TABLE IF EXISTS `constituency`;
CREATE TABLE IF NOT EXISTS `constituency` (
  `Sno` int(255) NOT NULL AUTO_INCREMENT,
  `constituencycode` int(3) unsigned zerofill NOT NULL,
  `constituencyname` varchar(50) NOT NULL,
  `countycode` int(3) unsigned zerofill NOT NULL,
  PRIMARY KEY (`Sno`),
  UNIQUE KEY `constituencycode` (`constituencycode`,`constituencyname`),
  UNIQUE KEY `constituencycode_2` (`constituencycode`,`constituencyname`),
  UNIQUE KEY `constituencycode_3` (`constituencycode`),
  UNIQUE KEY `constituencyname` (`constituencyname`),
  KEY `countycode` (`countycode`),
  CONSTRAINT `constituency_ibfk_1` FOREIGN KEY (`countycode`) REFERENCES `county` (`countycode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.constituency_results
DROP TABLE IF EXISTS `constituency_results`;
CREATE TABLE IF NOT EXISTS `constituency_results` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `constituency` int(4) unsigned zerofill NOT NULL,
  `type` varchar(50) NOT NULL,
  `contestant` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sno`),
  KEY `polling` (`constituency`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.county
DROP TABLE IF EXISTS `county`;
CREATE TABLE IF NOT EXISTS `county` (
  `Sno` int(255) NOT NULL AUTO_INCREMENT,
  `countycode` int(3) unsigned zerofill NOT NULL,
  `countyname` varchar(50) NOT NULL,
  PRIMARY KEY (`Sno`),
  UNIQUE KEY `countycode` (`countycode`,`countyname`),
  UNIQUE KEY `countycode_2` (`countycode`),
  UNIQUE KEY `countyname` (`countyname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.countyreturnings
DROP TABLE IF EXISTS `countyreturnings`;
CREATE TABLE IF NOT EXISTS `countyreturnings` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `nid` int(8) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `county` varchar(255) NOT NULL,
  `photo` mediumblob NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nid` (`nid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.county_results
DROP TABLE IF EXISTS `county_results`;
CREATE TABLE IF NOT EXISTS `county_results` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `county` int(3) unsigned zerofill NOT NULL,
  `type` varchar(50) NOT NULL,
  `contestant` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sno`),
  KEY `polling` (`county`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.governor
DROP TABLE IF EXISTS `governor`;
CREATE TABLE IF NOT EXISTS `governor` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `nid` int(8) NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `countycode` int(3) unsigned zerofill NOT NULL,
  `partycode` int(4) unsigned zerofill NOT NULL,
  `photo` mediumblob NOT NULL,
  `governor_votes` int(20) NOT NULL,
  PRIMARY KEY (`Sno`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `nid` (`nid`),
  UNIQUE KEY `party` (`partycode`),
  KEY `countycode` (`countycode`),
  CONSTRAINT `governor_ibfk_1` FOREIGN KEY (`countycode`) REFERENCES `county` (`countycode`),
  CONSTRAINT `governor_ibfk_2` FOREIGN KEY (`partycode`) REFERENCES `party` (`partycode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.governor_votes
DROP TABLE IF EXISTS `governor_votes`;
CREATE TABLE IF NOT EXISTS `governor_votes` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `clerk` int(10) NOT NULL,
  `polling` int(6) unsigned zerofill NOT NULL,
  `governor` int(11) NOT NULL,
  `votes` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sno`),
  KEY `mca` (`votes`),
  KEY `polling` (`polling`),
  KEY `Sno` (`Sno`),
  KEY `agent` (`clerk`),
  KEY `president` (`governor`),
  CONSTRAINT `governor_votes_ibfk_7` FOREIGN KEY (`governor`) REFERENCES `governor` (`Sno`),
  CONSTRAINT `governor_votes_ibfk_8` FOREIGN KEY (`polling`) REFERENCES `polling` (`pollingcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.ict_admin
DROP TABLE IF EXISTS `ict_admin`;
CREATE TABLE IF NOT EXISTS `ict_admin` (
  `user_id` varchar(255) NOT NULL,
  `user_index` int(255) NOT NULL AUTO_INCREMENT,
  `full_name` varchar(255) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `address` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL,
  `avatar` longblob NOT NULL,
  `password` varchar(255) NOT NULL,
  `regdate` varchar(255) NOT NULL,
  PRIMARY KEY (`user_index`),
  UNIQUE KEY `user_id` (`user_id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.logs
DROP TABLE IF EXISTS `logs`;
CREATE TABLE IF NOT EXISTS `logs` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.mca
DROP TABLE IF EXISTS `mca`;
CREATE TABLE IF NOT EXISTS `mca` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `nid` int(8) NOT NULL,
  `countycode` int(3) unsigned zerofill NOT NULL,
  `constituencycode` int(5) unsigned zerofill NOT NULL,
  `wardcode` int(6) unsigned zerofill NOT NULL,
  `partycode` int(4) unsigned zerofill NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `photo` mediumblob NOT NULL,
  `mca_votes` int(20) NOT NULL,
  PRIMARY KEY (`Sno`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.mca_votes
DROP TABLE IF EXISTS `mca_votes`;
CREATE TABLE IF NOT EXISTS `mca_votes` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `clerk` int(10) NOT NULL,
  `polling` int(6) unsigned zerofill NOT NULL,
  `mca` int(11) NOT NULL,
  `votes` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sno`),
  KEY `polling` (`polling`),
  KEY `Sno` (`Sno`),
  KEY `agent` (`clerk`),
  KEY `president` (`mca`),
  CONSTRAINT `mca_votes_ibfk_7` FOREIGN KEY (`mca`) REFERENCES `mca` (`Sno`),
  CONSTRAINT `mca_votes_ibfk_8` FOREIGN KEY (`polling`) REFERENCES `polling` (`pollingcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.mp
DROP TABLE IF EXISTS `mp`;
CREATE TABLE IF NOT EXISTS `mp` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `nid` int(8) NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `countycode` int(3) unsigned zerofill NOT NULL,
  `constituencycode` int(5) unsigned zerofill NOT NULL,
  `partycode` int(4) unsigned zerofill NOT NULL,
  `photo` mediumblob NOT NULL,
  `mp_votes` int(20) NOT NULL,
  PRIMARY KEY (`Sno`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `nid` (`nid`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.mp_votes
DROP TABLE IF EXISTS `mp_votes`;
CREATE TABLE IF NOT EXISTS `mp_votes` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `clerk` int(10) NOT NULL,
  `polling` int(6) unsigned zerofill NOT NULL,
  `mp` int(11) NOT NULL,
  `votes` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sno`),
  KEY `mca` (`votes`),
  KEY `polling` (`polling`),
  KEY `Sno` (`Sno`),
  KEY `agent` (`clerk`),
  KEY `president` (`mp`),
  CONSTRAINT `mp_votes_ibfk_7` FOREIGN KEY (`mp`) REFERENCES `mp` (`Sno`),
  CONSTRAINT `mp_votes_ibfk_8` FOREIGN KEY (`polling`) REFERENCES `polling` (`pollingcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.party
DROP TABLE IF EXISTS `party`;
CREATE TABLE IF NOT EXISTS `party` (
  `Sno` int(255) NOT NULL AUTO_INCREMENT,
  `partycode` int(4) unsigned zerofill NOT NULL,
  `partyname` varchar(50) NOT NULL,
  PRIMARY KEY (`Sno`),
  UNIQUE KEY `countycode` (`partycode`,`partyname`),
  UNIQUE KEY `countycode_2` (`partycode`),
  UNIQUE KEY `countyname` (`partyname`),
  UNIQUE KEY `partycode` (`partycode`),
  UNIQUE KEY `partyname` (`partyname`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.polling
DROP TABLE IF EXISTS `polling`;
CREATE TABLE IF NOT EXISTS `polling` (
  `Sno` int(255) NOT NULL AUTO_INCREMENT,
  `pollingcode` int(6) unsigned zerofill NOT NULL,
  `pollingname` varchar(50) NOT NULL,
  `wardcode` int(5) unsigned zerofill NOT NULL,
  PRIMARY KEY (`Sno`),
  UNIQUE KEY `pollingcode` (`pollingcode`),
  UNIQUE KEY `pollingname` (`pollingname`),
  KEY `wardcode` (`wardcode`),
  CONSTRAINT `polling_ibfk_1` FOREIGN KEY (`wardcode`) REFERENCES `ward` (`wardcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.president
DROP TABLE IF EXISTS `president`;
CREATE TABLE IF NOT EXISTS `president` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `nid` int(8) NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `partycode` int(4) unsigned zerofill NOT NULL,
  `photo` mediumblob NOT NULL,
  `president_votes` int(20) NOT NULL,
  PRIMARY KEY (`Sno`),
  UNIQUE KEY `nid` (`nid`),
  UNIQUE KEY `party` (`partycode`),
  UNIQUE KEY `uname` (`uname`),
  CONSTRAINT `president_ibfk_1` FOREIGN KEY (`partycode`) REFERENCES `party` (`partycode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.president_votes
DROP TABLE IF EXISTS `president_votes`;
CREATE TABLE IF NOT EXISTS `president_votes` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `clerk` int(10) NOT NULL,
  `polling` int(6) unsigned zerofill NOT NULL,
  `president` int(11) NOT NULL,
  `votes` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sno`),
  KEY `mca` (`votes`),
  KEY `polling` (`polling`),
  KEY `Sno` (`Sno`),
  KEY `agent` (`clerk`),
  KEY `president` (`president`),
  CONSTRAINT `president_votes_ibfk_7` FOREIGN KEY (`president`) REFERENCES `president` (`Sno`),
  CONSTRAINT `president_votes_ibfk_8` FOREIGN KEY (`polling`) REFERENCES `polling` (`pollingcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.presiding
DROP TABLE IF EXISTS `presiding`;
CREATE TABLE IF NOT EXISTS `presiding` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) NOT NULL,
  `nid` int(8) NOT NULL,
  `phone` bigint(12) NOT NULL,
  `email` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `polling` int(6) NOT NULL,
  `photo` mediumblob NOT NULL,
  `president` set('1','0') NOT NULL DEFAULT '0',
  `governor` set('1','0') NOT NULL DEFAULT '0',
  `senator` set('1','0') NOT NULL DEFAULT '0',
  `womenrep` set('1','0') NOT NULL DEFAULT '0',
  `mp` set('1','0') NOT NULL DEFAULT '0',
  `mca` set('1','0') NOT NULL DEFAULT '0',
  `pwd` varchar(50) CHARACTER SET latin1 COLLATE latin1_general_cs NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nid` (`nid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.presiding_results
DROP TABLE IF EXISTS `presiding_results`;
CREATE TABLE IF NOT EXISTS `presiding_results` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `clerk` int(10) NOT NULL,
  `polling` int(6) unsigned zerofill NOT NULL,
  `ward` int(5) unsigned zerofill NOT NULL,
  `type` varchar(50) NOT NULL,
  `contestant` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sno`),
  KEY `polling` (`polling`),
  KEY `agent` (`clerk`),
  KEY `ward` (`ward`),
  CONSTRAINT `presiding_results_ibfk_2` FOREIGN KEY (`polling`) REFERENCES `polling` (`pollingcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.registrar
DROP TABLE IF EXISTS `registrar`;
CREATE TABLE IF NOT EXISTS `registrar` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `nid` int(8) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `county` varchar(255) NOT NULL,
  `constituency` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `polling` varchar(255) NOT NULL,
  `photo` mediumblob NOT NULL,
  `pwd` varchar(50) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nid` (`nid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.registrationsession
DROP TABLE IF EXISTS `registrationsession`;
CREATE TABLE IF NOT EXISTS `registrationsession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StartDate` date NOT NULL,
  `EndDate` date NOT NULL,
  `StartTime` time NOT NULL,
  `EndTime` time NOT NULL,
  `AddedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `AddedTime` (`AddedTime`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.returnings
DROP TABLE IF EXISTS `returnings`;
CREATE TABLE IF NOT EXISTS `returnings` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `nid` int(8) NOT NULL,
  `phone` bigint(13) NOT NULL,
  `email` varchar(255) NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `county` varchar(20) NOT NULL,
  `constituency` varchar(20) NOT NULL,
  `photo` mediumblob NOT NULL,
  `pwd` varchar(255) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `nid` (`nid`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.senator
DROP TABLE IF EXISTS `senator`;
CREATE TABLE IF NOT EXISTS `senator` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `nid` int(8) NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `countycode` int(3) unsigned zerofill NOT NULL,
  `partycode` int(4) unsigned zerofill NOT NULL,
  `photo` mediumblob NOT NULL,
  `senator_votes` int(20) NOT NULL,
  PRIMARY KEY (`Sno`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `nid` (`nid`),
  UNIQUE KEY `party` (`partycode`),
  CONSTRAINT `senator_ibfk_1` FOREIGN KEY (`partycode`) REFERENCES `party` (`partycode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.senator_votes
DROP TABLE IF EXISTS `senator_votes`;
CREATE TABLE IF NOT EXISTS `senator_votes` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `clerk` int(10) NOT NULL,
  `polling` int(6) unsigned zerofill NOT NULL,
  `senator` int(11) NOT NULL,
  `votes` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sno`),
  KEY `mca` (`votes`),
  KEY `polling` (`polling`),
  KEY `Sno` (`Sno`),
  KEY `agent` (`clerk`),
  KEY `president` (`senator`),
  CONSTRAINT `senator_votes_ibfk_7` FOREIGN KEY (`senator`) REFERENCES `senator` (`Sno`),
  CONSTRAINT `senator_votes_ibfk_8` FOREIGN KEY (`polling`) REFERENCES `polling` (`pollingcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.user_info
DROP TABLE IF EXISTS `user_info`;
CREATE TABLE IF NOT EXISTS `user_info` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `Userrole` varchar(30) NOT NULL,
  `UserID` varchar(50) NOT NULL,
  `DateAdded` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sno`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.voter
DROP TABLE IF EXISTS `voter`;
CREATE TABLE IF NOT EXISTS `voter` (
  `id` int(255) NOT NULL AUTO_INCREMENT,
  `fname` varchar(255) NOT NULL,
  `nid` int(8) NOT NULL,
  `tel` bigint(13) NOT NULL,
  `gender` varchar(255) NOT NULL,
  `county` varchar(255) NOT NULL,
  `ward` varchar(255) NOT NULL,
  `poll` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.voters
DROP TABLE IF EXISTS `voters`;
CREATE TABLE IF NOT EXISTS `voters` (
  `Sno` int(255) NOT NULL AUTO_INCREMENT,
  `firstname` varchar(50) NOT NULL,
  `middlename` varchar(50) NOT NULL,
  `lastname` varchar(50) NOT NULL,
  `nid` int(8) NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `polling` int(6) unsigned zerofill NOT NULL,
  `photo` mediumblob NOT NULL,
  `votestatus` set('1','0') NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sno`),
  UNIQUE KEY `nid` (`nid`),
  KEY `polling` (`polling`),
  CONSTRAINT `voters_ibfk_1` FOREIGN KEY (`polling`) REFERENCES `polling` (`pollingcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.votes
DROP TABLE IF EXISTS `votes`;
CREATE TABLE IF NOT EXISTS `votes` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `nid` int(8) NOT NULL,
  `polling` int(6) unsigned zerofill NOT NULL,
  `president` int(11) NOT NULL DEFAULT '0',
  `governor` int(11) NOT NULL DEFAULT '0',
  `senator` int(11) NOT NULL DEFAULT '0',
  `womenrep` int(11) NOT NULL DEFAULT '0',
  `mp` int(11) NOT NULL DEFAULT '0',
  `mca` int(11) NOT NULL DEFAULT '0',
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sno`),
  UNIQUE KEY `nid` (`nid`),
  KEY `governor` (`governor`),
  KEY `senator` (`senator`),
  KEY `womenrep` (`womenrep`),
  KEY `mp` (`mp`),
  KEY `mca` (`mca`),
  KEY `polling` (`polling`),
  KEY `Sno` (`Sno`),
  KEY `president` (`president`),
  CONSTRAINT `votes_ibfk_1` FOREIGN KEY (`nid`) REFERENCES `voters` (`nid`),
  CONSTRAINT `votes_ibfk_8` FOREIGN KEY (`polling`) REFERENCES `voters` (`polling`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.votingsession
DROP TABLE IF EXISTS `votingsession`;
CREATE TABLE IF NOT EXISTS `votingsession` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `StartDate` datetime NOT NULL,
  `EndDate` datetime NOT NULL,
  `Activity` varchar(50) NOT NULL,
  `Type` varchar(15) NOT NULL,
  `AddedTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `AddedTime` (`AddedTime`),
  UNIQUE KEY `StartDate` (`StartDate`),
  UNIQUE KEY `Activity` (`Activity`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.ward
DROP TABLE IF EXISTS `ward`;
CREATE TABLE IF NOT EXISTS `ward` (
  `Sno` int(255) NOT NULL AUTO_INCREMENT,
  `wardcode` int(5) unsigned zerofill NOT NULL,
  `wardname` varchar(50) NOT NULL,
  `constituencycode` int(4) unsigned zerofill NOT NULL,
  PRIMARY KEY (`Sno`),
  UNIQUE KEY `wardcode` (`wardcode`,`wardname`),
  UNIQUE KEY `wardcode_2` (`wardcode`),
  UNIQUE KEY `wardname` (`wardname`),
  KEY `constituencycode` (`constituencycode`),
  CONSTRAINT `ward_ibfk_1` FOREIGN KEY (`constituencycode`) REFERENCES `constituency` (`constituencycode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.ward_results
DROP TABLE IF EXISTS `ward_results`;
CREATE TABLE IF NOT EXISTS `ward_results` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `ward` int(5) unsigned zerofill NOT NULL,
  `type` varchar(50) NOT NULL,
  `contestant` int(11) NOT NULL,
  `votes` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sno`),
  KEY `polling` (`ward`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.womenrep
DROP TABLE IF EXISTS `womenrep`;
CREATE TABLE IF NOT EXISTS `womenrep` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `uname` varchar(255) NOT NULL,
  `nid` int(8) NOT NULL,
  `gender` set('Male','Female') NOT NULL,
  `countycode` int(3) unsigned zerofill NOT NULL,
  `partycode` int(4) unsigned zerofill NOT NULL,
  `photo` mediumblob NOT NULL,
  `womenrep_votes` int(20) NOT NULL,
  PRIMARY KEY (`Sno`),
  UNIQUE KEY `uname` (`uname`),
  UNIQUE KEY `nid` (`nid`),
  UNIQUE KEY `party` (`partycode`),
  CONSTRAINT `womenrep_ibfk_1` FOREIGN KEY (`partycode`) REFERENCES `party` (`partycode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.


-- Dumping structure for table amvs_system.womenrep_votes
DROP TABLE IF EXISTS `womenrep_votes`;
CREATE TABLE IF NOT EXISTS `womenrep_votes` (
  `Sno` int(11) NOT NULL AUTO_INCREMENT,
  `clerk` int(10) NOT NULL,
  `polling` int(6) unsigned zerofill NOT NULL,
  `womenrep` int(11) NOT NULL,
  `votes` bigint(20) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`Sno`),
  KEY `mca` (`votes`),
  KEY `polling` (`polling`),
  KEY `Sno` (`Sno`),
  KEY `agent` (`clerk`),
  KEY `president` (`womenrep`),
  CONSTRAINT `womenrep_votes_ibfk_7` FOREIGN KEY (`womenrep`) REFERENCES `womenrep` (`Sno`),
  CONSTRAINT `womenrep_votes_ibfk_8` FOREIGN KEY (`polling`) REFERENCES `polling` (`pollingcode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- Data exporting was unselected.
/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IF(@OLD_FOREIGN_KEY_CHECKS IS NULL, 1, @OLD_FOREIGN_KEY_CHECKS) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
