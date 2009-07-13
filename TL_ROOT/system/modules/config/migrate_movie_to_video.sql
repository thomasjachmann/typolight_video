ALTER TABLE `tl_movie` RENAME TO `tl_video`;
ALTER TABLE `tl_movie_category` RENAME TO `tl_video_category`;
ALTER TABLE `tl_content` CHANGE COLUMN `movie_alias` `video_alias` int(10) unsigned NOT NULL default '0';
ALTER TABLE `tl_content` CHANGE COLUMN `movie_showDescription` `video_showDescription` char(1) NOT NULL default '';
ALTER TABLE `tl_module` CHANGE COLUMN `movie_categories` `video_categories` blob NULL;
ALTER TABLE `tl_module` CHANGE COLUMN `movie_random` `video_random` char(1) NOT NULL default '';
ALTER TABLE `tl_module` CHANGE COLUMN `movie_maxMovies` `video_maxVideos` smallint(5) unsigned NULL default '0';
ALTER TABLE `tl_module` CHANGE COLUMN `movie_movies` `video_videos` blob NULL;

UPDATE `tl_module` SET `type` = 'videolist' WHERE `type` = 'movielist';
UPDATE `tl_module` SET `type` = 'videoreader' WHERE `type` = 'moviereader';
UPDATE `tl_content` SET `type` = 'videoReader' WHERE `type` = 'movieReader';
