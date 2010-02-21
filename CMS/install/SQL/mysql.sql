CREATE TABLE IF NOT EXISTS `f3_acl` (
`UID` INT NOT NULL,
`CatID` INT NOT NULL,
`type` VARCHAR(9) NOT NULL,
PRIMARY KEY (UID,CatID)) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_admmenu` (
`ID` VARCHAR(9) PRIMARY KEY NOT NULL,
`text` VARCHAR(30) NOT NULL,
`file` VARCHAR(30) NOT NULL,
`menu` TINYINT NOT NULL,
`rights` TINYINT NOT NULL) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_answers` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`IDP` INT NOT NULL,
`seq` TINYINT,
`a` VARCHAR(50),
`num` INT NOT NULL DEFAULT 0,
KEY (IDP)) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_arts` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`cat` INT NOT NULL,
`name` VARCHAR(50) NOT NULL,
`dsc` VARCHAR(255),
`date` DATETIME,
`author` VARCHAR(50) NOT NULL,
`rate` TINYINT,
`access` TINYINT NOT NULL,
`priority` TINYINT NOT NULL,
`pages` TINYINT NOT NULL,
`ent` INT NOT NULL DEFAULT 0,
KEY (cat)) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_artstxt` (
`ID` INT NOT NULL,
`page` TINYINT NOT NULL,
`cat` INT NOT NULL,
`text` MEDIUMTEXT,
`opt` TINYINT NOT NULL,
PRIMARY KEY (ID,page)) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_banners` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`gen` TINYINT NOT NULL,
`name` VARCHAR(50),
`ison` TINYINT,
`code` text) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_cats` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`name` VARCHAR(50) NOT NULL,
`dsc` VARCHAR(255),
`access` VARCHAR(3) NOT NULL,
`type` TINYINT NOT NULL DEFAULT 5,
`sc` INT NOT NULL DEFAULT 0,
`sort` TINYINT NOT NULL DEFAULT 2,
`text` TEXT,
`num` SMALLINT NOT NULL DEFAULT 0,
`nums` SMALLINT NOT NULL DEFAULT 0,
`opt` TINYINT NOT NULL,
`lft` TINYINT NOT NULL,
`rgt` TINYINT NOT NULL,
KEY `sc` (sc),
KEY `pos` (lft,rgt)) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_comms` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`TYPE` TINYINT NOT NULL,
`CID` INT NOT NULL,
`access` TINYINT NOT NULL,
`name` VARCHAR(50) NOT NULL,
`author` VARCHAR(50) NOT NULL,
`guest` TINYINT NOT NULL DEFAULT 1,
`ip` VARCHAR(40) NOT NULL,
`date` INT,
`text` TEXT,
KEY `th` (TYPE,CID)) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_confmenu` (
`ID` VARCHAR(50) NOT NULL,
`name` VARCHAR(50),
`lang` VARCHAR(3) NOT NULL,
`img` VARCHAR(230),
KEY (ID)) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_files` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`cat` INT NOT NULL,
`name` VARCHAR(50),
`author` VARCHAR(50),
`date` DATETIME,
`dsc` VARCHAR(255),
`file` VARCHAR(200),
`dls` INT NOT NULL DEFAULT 0,
`access` TINYINT NOT NULL,
`size` VARCHAR(30),
`priority` TINYINT NOT NULL,
`rate` TINYINT,
`fulld` MEDIUMTEXT,
KEY (cat)) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_groups` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`name` VARCHAR(50) NOT NULL,
`dsc` TEXT,
`access` VARCHAR NOT NULL,
`opened` TINYINT NOT NULL,
`who` INT NOT NULL DEFAULT 0,
`num` INT NOT NULL DEFAULT 0,
`date` INT) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_groupuser` (
`u` INT NOT NULL,
`g` INT NOT NULL,
`date` INT,
PRIMARY KEY (u,g)) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_imgs` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`cat` INT NOT NULL,
`name` VARCHAR(50) NOT NULL,
`dsc` TEXT,
`type` TINYINT NOT NULL,
`date` DATETIME,
`priority` TINYINT NOT NULL,
`access` TINYINT NOT NULL,
`rate` TINYINT,
`author` VARCHAR(50) NOT NULL,
`filem` VARCHAR(255) NOT NULL,
`file` VARCHAR(255) NOT NULL,
`size` VARCHAR(9) NOT NULL,
KEY (cat)) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_links` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`cat` INT NOT NULL,
`name` VARCHAR(50) NOT NULL,
`dsc` TEXT,
`access` TINYINT NOT NULL,
`adr` VARCHAR(255) NOT NULL,
`priority` TINYINT NOT NULL,
`count` INT NOT NULL DEFAULT 0,
`rate` TINYINT,
`nw` TINYINT NOT NULL,
KEY (cat)) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_log` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`name` VARCHAR(50) NOT NULL,
`date` timestamp NOT NULL default CURRENT_TIMESTAMP,
`ip` VARCHAR(40) NOT NULL,
`user` INT NOT NULL DEFAULT 0) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_menu` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`seq` INT NOT NULL,
`text` VARCHAR(50) NOT NULL,
`disp` VARCHAR(3) NOT NULL,
`menu` INT NOT NULL,
`type` TINYINT NOT NULL,
`img` VARCHAR(200) NOT NULL,
`value` text) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_mitems` (
`menu` INT NOT NULL,
`text` VARCHAR(50) NOT NULL,
`url` VARCHAR(255) NOT NULL,
`nw` TINYINT NOT NULL DEFAULT 0,
`seq` TINYINT NOT NULL DEFAULT 0) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_news` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`cat` INT NOT NULL,
`name` VARCHAR(50) NOT NULL,
`txt` TEXT,
`date` DATETIME,
`author` VARCHAR(50) NOT NULL,
`img` VARCHAR(255) NOT NULL,
`comm` INT NOT NULL DEFAULT 0,
`access` TINYINT NOT NULL,
`opt` TINYINT NOT NULL DEFAULT 3,
KEY (cat)) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_newstxt` (
`ID` INT NOT NULL PRIMARY KEY,
`cat` INT NOT NULL,
`text` MEDIUMTEXT) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_online` (
`IP` VARCHAR(40) NOT NULL PRIMARY KEY,
`user` INT NOT NULL,
`name` VARCHAR(50),
`time` timestamp NOT NULL default CURRENT_TIMESTAMP) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_pages` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`name` VARCHAR(50) NOT NULL,
`access` TINYINT NOT NULL,
`opt` TINYINT NOT NULL,
`text` MEDIUMTEXT) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_plugins` (
`ID` VARCHAR(30) NOT NULL,
`name` VARCHAR(50) NOT NULL) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_pms` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`th` INT NOT NULL,
`topic` VARCHAR(50) NOT NULL,
`usr` INT NOT NULL,
`owner` INT NOT NULL,
`st` TINYINT NOT NULL,
`out` INT NOT NULL,
`date` INT NOT NULL,
`txt` TEXT,
KEY (th),
KEY (owner)) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_polls` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`name` VARCHAR(50) NOT NULL,
`q` VARCHAR(80) NOT NULL,
`ison` TINYINT NOT NULL,
`type` TINYINT NOT NULL,
`num` INT NOT NULL DEFAULT 0,
`access` VARCHAR(3) NOT NULL,
`date` DATETIME) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_pollvotes` (
`user` VARCHAR(40) NOT NULL,
`ID` INT NOT NULL,
`date` timestamp NOT NULL ON UPDATE CURRENT_TIMESTAMP) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_rates` (
`type` TINYINT NOT NULL,
`ID` INT NOT NULL,
`mark` TINYINT NOT NULL DEFAULT 5,
`IP` VARCHAR(50) NOT NULL) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_rss` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`auto` TINYINT NOT NULL,
`name` VARCHAR(50) NOT NULL,
`dsc` VARCHAR(99) NOT NULL,
`url` VARCHAR(80) NOT NULL,
`lang` VARCHAR(3) NOT NULL,
`cat` INT NOT NULL,
`num` INT NOT NULL) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_tags` (
`tag` VARCHAR(50) NOT NULL DEFAULT '',
`TYPE` TINYINT NOT NULL DEFAULT 5,
`ID` INT NOT NULL DEFAULT 0,
`num` INT NOT NULL DEFAULT 0) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_tmp` (
`KEYID` VARCHAR(50) NOT NULL PRIMARY KEY,
`UID` INT NOT NULL,
`type` VARCHAR(9) NOT NULL) ENGINE=InnoDB CHARACTER SET='utf8';

CREATE TABLE IF NOT EXISTS `f3_users` (
`ID` INT NOT NULL auto_increment PRIMARY KEY,
`login` VARCHAR(50) UNIQUE NOT NULL,
`pass` char(32) NOT NULL,
`mail` VARCHAR(80) NOT NULL,
`sex` TINYINT NOT NULL DEFAULT 0,
`opt` TINYINT NOT NULL DEFAULT 2,
`lv` TINYINT NOT NULL DEFAULT 1,
`adm` TEXT,
`regt` INT,
`lvis` INT,
`pms` TINYINT NOT NULL DEFAULT 0,
`about` TEXT,
`mails` TINYINT NOT NULL DEFAULT 0,
`www` VARCHAR(200) NOT NULL,
`city` VARCHAR(50) NOT NULL,
`icq` VARCHAR(15),
`skype` VARCHAR(50) NOT NULL,
`jabber` VARCHAR(60) NOT NULL,
`tlen` VARCHAR(50) NOT NULL,
`gg` INT,
`photo` VARCHAR(150) NOT NULL) ENGINE=InnoDB CHARACTER SET='utf8';