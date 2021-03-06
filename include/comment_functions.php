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
 * @param mixed $itemId
 * @param mixed $commentCount
 * @since          1.0
 * @min_xoops      2.5.9
 * @author         Wedega - Email:<webmaster@wedega.com> - Website:<https://wedega.com>
 * @version        $Id: 1.0 comment_functions.php 1 Mon 2018-03-19 10:04:54Z XOOPS Project (www.xoops.org) $
 * @copyright      module for xoops
 * @license        GPL 2.0 or later
 * @package        wggallery
 */

/**
 * CommentsUpdate
 *
 * @param mixed $itemId
 * @param int   $commentCount
 * @return bool
 */
function wggalleryCommentsUpdate($itemId, $commentCount)
{
    /** @var \XoopsModules\Wggallery\Helper $helper */
    $helper = \XoopsModules\Wggallery\Helper::getInstance();
    if (!$helper->getHandler('Images')->updateAll('comments', (int)$commentCount, new \Criteria('lid', (int)$itemId))) {
        return false;
    }

    return true;
}

/**
 * CommentsApprove
 *
 * @param string $comment
 */
function wggalleryCommentsApprove(&$comment)
{
    // notification mail here
}
