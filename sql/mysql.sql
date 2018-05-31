# SQL Dump for wggallery module
# PhpMyAdmin Version: 4.0.4
# http://www.phpmyadmin.net
#
# Host: localhost
# Generated on: Mon Mar 19, 2018 to 10:04:53
# Server version: 5.7.11
# PHP Version: 5.6.19

#
# Structure table for `wggallery_albums` 10
#

CREATE TABLE `wggallery_albums` (
  `alb_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `alb_pid` INT(8) NOT NULL DEFAULT '0',
  `alb_iscat` INT(1) NOT NULL DEFAULT '0',
  `alb_name` VARCHAR(200) NOT NULL DEFAULT '',
  `alb_desc` TEXT NOT NULL ,
  `alb_weight` INT(8) NOT NULL DEFAULT '0',
  `alb_image` VARCHAR(200) NOT NULL DEFAULT '',
  `alb_imgid` INT(8) NOT NULL DEFAULT '0',
  `alb_state` INT(1) NOT NULL DEFAULT '0',
  `alb_allowdownload` INT(1) NOT NULL DEFAULT '0',
  `alb_date` INT(8) NOT NULL DEFAULT '0',
  `alb_submitter` INT(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`alb_id`)
) ENGINE=InnoDB;

#
# Structure table for `wggallery_images` 18
#

CREATE TABLE `wggallery_images` (
  `img_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `img_title` VARCHAR(200) NOT NULL DEFAULT '',
  `img_desc` TEXT NOT NULL ,
  `img_name` VARCHAR(200) NOT NULL DEFAULT '',
  `img_origname` VARCHAR(200) NOT NULL DEFAULT '',
  `img_mimetype` VARCHAR(50) NOT NULL DEFAULT '',
  `img_size` INT(8) NOT NULL DEFAULT '0',
  `img_resx` INT(8) NOT NULL DEFAULT '0',
  `img_resy` INT(8) NOT NULL DEFAULT '0',
  `img_downloads` INT(8) NOT NULL DEFAULT '0',
  `img_ratinglikes` INT(8) NOT NULL DEFAULT '0',
  `img_votes` INT(8) NOT NULL DEFAULT '0',
  `img_weight` INT(8) NOT NULL DEFAULT '0',
  `img_albid` INT(8) NOT NULL DEFAULT '0',
  `img_state` INT(8) NOT NULL DEFAULT '0',
  `img_date` INT(8) NOT NULL DEFAULT '0',
  `img_submitter` INT(8) NOT NULL DEFAULT '0',
  `img_ip` TEXT NOT NULL ,
  PRIMARY KEY (`img_id`)
) ENGINE=InnoDB;

#
# Structure table for `wggallery_gallerytypes` 7
#

CREATE TABLE `wggallery_gallerytypes` (
  `gt_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `gt_primary` INT(1) NOT NULL DEFAULT '0',
  `gt_name` VARCHAR(100) NOT NULL DEFAULT '',
  `gt_desc` TEXT NOT NULL ,
  `gt_slideshow` INT(1) NOT NULL DEFAULT '0',
  `gt_autoplay` INT(1) NOT NULL DEFAULT '0',
  `gt_credits` VARCHAR(100) NOT NULL DEFAULT '',
  `gt_template` VARCHAR(100) NOT NULL DEFAULT '',
  `gt_options` TEXT NOT NULL ,
  `gt_date` INT(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`gt_id`)
) ENGINE=InnoDB;

INSERT INTO `wggallery_gallerytypes` (`gt_id`, `gt_primary`, `gt_name`, `gt_desc`, `gt_slideshow`, `gt_autoplay`, `gt_credits`, `gt_template`, `gt_options`, `gt_date`) VALUES
(1, 0, 'none', '', 0, 0, '', '', '', 1522497807),
(2, 0, 'Viewer.js', '', 0, 0, 'http://chenfengyuan.com', 'viewerjs', 'a:10:{i:0;a:2:{s:4:"name";s:6:"source";s:5:"value";s:5:"large";}i:1;a:2:{s:4:"name";s:14:"source_preview";s:5:"value";s:6:"medium";}i:2;a:2:{s:4:"name";s:12:"button_close";s:5:"value";s:4:"true";}i:3;a:2:{s:4:"name";s:6:"navbar";s:5:"value";s:4:"true";}i:4;a:2:{s:4:"name";s:5:"title";s:5:"value";s:4:"true";}i:5;a:2:{s:4:"name";s:7:"toolbar";s:5:"value";s:4:"true";}i:6;a:2:{s:4:"name";s:8:"zoomable";s:5:"value";s:4:"true";}i:7;a:2:{s:4:"name";s:8:"download";s:5:"value";s:4:"true";}i:8;a:2:{s:4:"name";s:10:"fullscreen";s:5:"value";s:4:"true";}i:9;a:2:{s:4:"name";s:16:"intervalDuration";s:5:"value";s:4:"3000";}}<br>', 0),
(3, 0, 'blueimp Gallery', 'blueimp Gallery is a touch-enabled, responsive and customizable image & video gallery, carousel and lightbox, optimized for both mobile and desktop web browsers. It features swipe, mouse and keyboard navigation, transition effects, slideshow functionality, fullscreen support and on-demand content loading. ', 0, 0, 'Sebastian Tschan, https://blueimp.net', 'blueimpgallery', 'a:11:{i:0;a:2:{s:4:"name";s:13:"slideshowtype";s:5:"value";s:8:"lightbox";}i:1;a:2:{s:4:"name";s:6:"source";s:5:"value";s:5:"large";}i:2;a:2:{s:4:"name";s:14:"source_preview";s:5:"value";s:6:"medium";}i:3;a:2:{s:4:"name";s:12:"button_close";s:5:"value";s:4:"true";}i:4;a:2:{s:4:"name";s:6:"navbar";s:5:"value";s:4:"true";}i:5;a:2:{s:4:"name";s:5:"title";s:5:"value";s:4:"true";}i:6;a:2:{s:4:"name";s:7:"toolbar";s:5:"value";s:4:"true";}i:7;a:2:{s:4:"name";s:8:"zoomable";s:5:"value";s:4:"true";}i:8;a:2:{s:4:"name";s:8:"download";s:5:"value";s:4:"true";}i:9;a:2:{s:4:"name";s:10:"fullscreen";s:5:"value";s:4:"true";}i:10;a:2:{s:4:"name";s:16:"intervalDuration";s:5:"value";s:4:"3000";}}', 0),
(4, 0, 'Justified Gallery with Colorbox', '', 0, 0, '', 'justifiedgallery', 'a:17:{i:0;a:2:{s:4:"name";s:6:"source";s:5:"value";s:5:"large";}i:1;a:2:{s:4:"name";s:14:"source_preview";s:5:"value";s:6:"medium";}i:2;a:2:{s:4:"name";s:5:"title";s:5:"value";s:4:"true";}i:3;a:2:{s:4:"name";s:9:"rowHeight";s:5:"value";s:3:"150";}i:4;a:2:{s:4:"name";s:7:"lastRow";s:5:"value";s:9:"nojustify";}i:5;a:2:{s:4:"name";s:7:"margins";s:5:"value";s:1:"1";}i:6;a:2:{s:4:"name";s:6:"border";s:5:"value";s:1:"1";}i:7;a:2:{s:4:"name";s:9:"randomize";s:5:"value";s:5:"false";}i:8;a:2:{s:4:"name";s:9:"slideshow";s:5:"value";s:4:"true";}i:9;a:2:{s:4:"name";s:17:"slideshow_options";s:5:"value";s:0:"";}i:10;a:2:{s:4:"name";s:13:"colorboxstyle";s:5:"value";s:6:"style1";}i:11;a:2:{s:4:"name";s:10:"transition";s:5:"value";s:7:"elastic";}i:12;a:2:{s:4:"name";s:14:"slideshowSpeed";s:5:"value";s:4:"3000";}i:13;a:2:{s:4:"name";s:13:"slideshowAuto";s:5:"value";s:5:"false";}i:14;a:2:{s:4:"name";s:5:"speed";s:5:"value";s:3:"500";}i:15;a:2:{s:4:"name";s:4:"open";s:5:"value";s:4:"true";}i:16;a:2:{s:4:"name";s:7:"opacity";s:5:"value";s:3:"0.8";}}', 1523055758),
(5, 1, 'Lightbox', 'A simple lightbox', 0, 0, '', 'lightbox', 'a:7:{i:0;a:2:{s:4:"name";s:6:"source";s:5:"value";s:5:"large";}i:1;a:2:{s:4:"name";s:14:"source_preview";s:5:"value";s:6:"medium";}i:2;a:2:{s:4:"name";s:10:"showThumbs";s:5:"value";s:4:"true";}i:3;a:2:{s:4:"name";s:5:"title";s:5:"value";s:4:"true";}i:4;a:2:{s:4:"name";s:11:"description";s:5:"value";s:4:"true";}i:5;a:2:{s:4:"name";s:14:"slideshowSpeed";s:5:"value";i:3000;}i:6;a:2:{s:4:"name";s:9:"autoSlide";s:5:"value";s:5:"false";}}', 1523198243);

#
# Structure table for `wggallery_albumtypes` 7
#

CREATE TABLE `wggallery_albumtypes` (
  `at_id` INT(8) UNSIGNED NOT NULL AUTO_INCREMENT,
  `at_primary` INT(1) NOT NULL DEFAULT '0',
  `at_name` VARCHAR(100) NOT NULL DEFAULT '',
  `at_desc` TEXT NOT NULL ,
  `at_credits` VARCHAR(100) NOT NULL DEFAULT '',
  `at_template` VARCHAR(100) NOT NULL DEFAULT '',
  `at_options` TEXT NOT NULL ,
  `at_date` INT(8) NOT NULL DEFAULT '0',
  PRIMARY KEY (`at_id`)
) ENGINE=InnoDB;


INSERT INTO `wggallery_albumtypes` (`at_id`, `at_primary`, `at_name`, `at_desc`, `at_credits`, `at_template`, `at_options`, `at_date`) VALUES
(1, 0, 'default', '', '', 'default', 'a:2:{i:0;a:2:{s:4:"name";s:17:"number_cols_album";s:5:"value";s:1:"4";}i:1;a:2:{s:4:"name";s:15:"number_cols_cat";s:5:"value";s:1:"3";}}', 1527426908),
(2, 1, 'hovereffectideas', 'Album gallery with two albums per row and a lot of nice hover effects\r\nFor examples see https://tympanus.net/Development/HoverEffectIdeas/', 'Codrops (http://tympanus.net/codrops)', 'hovereffectideas', 'a:1:{i:0;a:2:{s:4:"name";s:11:"hovereffect";s:5:"value";s:4:"duke";}}', 1527453502);

--