<?php
/*
 You may not change or alter any portion of this comment or credits
 of supporting developers from this source code or any supporting source code
 which is considered copyrighted (c) material of the original comment or credit authors.

 This program is distributed in the hope that it will be useful,
 but WITHOUT ANY WARRANTY; without even the implied warranty of
 MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.
*/

/**
 * wgGallery module for xoops
 *
 * @copyright      module for xoops
 * @license        GPL 2.0 or later
 * @package        wggallery
 * @since          1.0
 * @min_xoops      2.5.7
 * @author         Wedega - Email:<webmaster@wedega.com> - Website:<https://wedega.com>
 * @version        $Id: 1.0 index.php 1 Mon 2018-03-19 10:04:52Z XOOPS Project (www.xoops.org) $
 */
include __DIR__ . '/header.php';
// Count elements
$countAlbums = $albumsHandler->getCount();
$countImages = $imagesHandler->getCount();
$countGallerytypes = $gallerytypesHandler->getCount();
// Template Index
$templateMain = 'wggallery_admin_index.tpl';
// InfoBox Statistics
$adminObject->addInfoBox(_AM_WGGALLERY_STATISTICS);
// Info elements
$adminObject->addInfoBoxLine(sprintf( '<label>'._AM_WGGALLERY_THEREARE_ALBUMS.'</label>', $countAlbums));
$adminObject->addInfoBoxLine(sprintf( '<label>'._AM_WGGALLERY_THEREARE_IMAGES.'</label>', $countImages));
$adminObject->addInfoBoxLine(sprintf( '<label>'._AM_WGGALLERY_THEREARE_GALLERYTYPES.'</label>', $countGallerytypes));
// Upload Folders
$folder = array(
	WGGALLERY_UPLOAD_PATH,
	WGGALLERY_UPLOAD_PATH . '/albums/',
	WGGALLERY_UPLOAD_PATH . '/images/',
	WGGALLERY_UPLOAD_PATH . '/images/albums/',
	WGGALLERY_UPLOAD_PATH . '/images/large/',
	WGGALLERY_UPLOAD_PATH . '/images/medium/',
	WGGALLERY_UPLOAD_PATH . '/images/thumbs/',
	WGGALLERY_UPLOAD_PATH . '/gallerytypes/'
);
// Uploads Folders Created
foreach(array_keys($folder) as $i) {
	$adminObject->addConfigBoxLine($folder[$i], 'folder');
	$adminObject->addConfigBoxLine(array($folder[$i], '777'), 'chmod');
}

// Render Index
$GLOBALS['xoopsTpl']->assign('navigation', $adminObject->displayNavigation('index.php'));
$GLOBALS['xoopsTpl']->assign('index', $adminObject->displayIndex());
include __DIR__ . '/footer.php';