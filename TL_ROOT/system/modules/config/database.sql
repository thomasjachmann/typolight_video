-- **********************************************************
-- *                                                        *
-- * IMPORTANT NOTE                                         *
-- *                                                        *
-- * Do not import this file manually but use the TYPOlight *
-- * install tool to create and maintain database tables!   *
-- *                                                        *
-- **********************************************************


-- --------------------------------------------------------

-- 
-- Table `tl_video`
-- 

CREATE TABLE `tl_video` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `pid` int(10) unsigned NOT NULL default '0',
  `sorting` int(10) unsigned NOT NULL default '0',
  `tstamp` int(10) unsigned NOT NULL default '0',
  `name` varchar(255) NOT NULL default '',
  `alias` varbinary(128) NOT NULL default '',
  `author` int(10) unsigned NOT NULL default '0',
  `url` varchar(255) NOT NULL default '',
  `source` varchar(10) NOT NULL default '',
  `sourceId` varchar(255) NOT NULL default '',
  `thumbnail` varchar(255) NOT NULL default '',
  `description` text NULL,
  `published` char(1) NOT NULL default '',
  PRIMARY KEY  (`id`),
  KEY `pid` (`pid`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_video_category`
-- 

CREATE TABLE `tl_video_category` (
  `id` int(10) unsigned NOT NULL auto_increment,
  `tstamp` int(10) unsigned NOT NULL default '0',
  `title` varchar(255) NOT NULL default '',
  `headline` varchar(255) NOT NULL default '',
  `jumpTo` int(10) unsigned NOT NULL default '0',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_module`
-- 

CREATE TABLE `tl_module` (
  `video_categories` blob NULL,
  `video_videos` blob NULL,
  `video_random` char(1) NOT NULL default '',
  `video_maxVideos` smallint(5) unsigned NULL default '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;


-- --------------------------------------------------------

-- 
-- Table `tl_content`
-- 

CREATE TABLE `tl_content` (
  `video_alias` int(10) unsigned NOT NULL default '0',
  `video_showDescription` char(1) NOT NULL default ''
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
