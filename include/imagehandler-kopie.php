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
 * @min_xoops      2.5.9
 * @author         Wedega - Email:<webmaster@wedega.com> - Website:<https://wedega.com>
 * @version        $Id: 1.0 imagehandler.php 1 Mon 2018-03-19 10:04:49Z XOOPS Project (www.xoops.org) $
 * @param mixed $sourcefile
 * @param mixed $endfile
 * @param mixed $max_width
 * @param mixed $max_height
 * @param mixed $imageMimetype
 */

/**
 * resize image if size exceed given width/height
 * @param        $sourcefile
 * @param string $endfile
 * @param int    $max_width
 * @param int    $max_height
 * @param        $imageMimetype
 * @return string|boolean
 */
function ResizeImage($sourcefile, $endfile, $max_width, $max_height, $imageMimetype)
{
    // check file extension
    switch ($imageMimetype) {
        case'image/png':
            $img = imagecreatefrompng($sourcefile);
            break;
        case'image/jpeg':
            $img = imagecreatefromjpeg($sourcefile);
            break;
        case'image/gif':
            $img = imagecreatefromgif($sourcefile);
            break;
        default:
            return 'Unsupported format';
    }

    $width  = imagesx($img);
    $height = imagesy($img);

    if ($width > $max_width || $height > $max_height) {
        // recalc image size based on max_width/max_height
        if ($width > $height) {
            if ($width < $max_width) {
                $new_width = $width;
            } else {
                $new_width  = $max_width;
                $divisor    = $width / $new_width;
                $new_height = floor($height / $divisor);
            }
        } elseif ($height < $max_height) {
            $new_height = $height;
        } else {
            $new_height = $max_height;
            $divisor    = $height / $new_height;
            $new_width  = floor($width / $divisor);
        }

        // Create a new temporary image.
        $tmpimg = imagecreatetruecolor($new_width, $new_height);
        imagealphablending($tmpimg, false);
        imagesavealpha($tmpimg, true);

        // Copy and resize old image into new image.
        imagecopyresampled($tmpimg, $img, 0, 0, 0, 0, $new_width, $new_height, $width, $height);

        unlink($endfile);
        //compressing the file
        switch ($imageMimetype) {
            case'image/png':
                imagepng($tmpimg, $endfile, 0);
                break;
            case'image/jpeg':
                imagejpeg($tmpimg, $endfile, 100);
                break;
            case'image/gif':
                imagegif($tmpimg, $endfile);
                break;
        }

        // release the memory
        imagedestroy($tmpimg);
    } else {
        return 'copy';
    }
    imagedestroy($img);

    return true;
}

/**
 * @param     $src_url
 * @param     $src_mimetype
 * @param     $dest_url
 * @param     $dest_w
 * @param     $dest_h
 * @param int $quality
 * @return bool
 */
function ResizeAndCrop($src_url, $src_mimetype, $dest_url, $dest_w, $dest_h, $quality = 90)
{
    // check file extension
    switch ($src_mimetype) {
        case 'image/png':
            $original = imagecreatefrompng($src_url);
            break;
        case 'image/jpeg':
            $original = imagecreatefromjpeg($src_url);
            break;
        case 'image/gif':
            $original = imagecreatefromgif($src_url);
            break;
        default:
            return 'Unsupported format';
    }

    if (!$original) {
        return false;
    }
    // GET ORIGINAL IMAGE DIMENSIONS
    list($original_w, $original_h) = getimagesize($src_url);

    // RESIZE IMAGE AND PRESERVE PROPORTIONS
    $dest_w_resize = $dest_w;
    $dest_h_resize = $dest_h;
    if ($original_w > $original_h) {
        $dest_h_ratio  = $dest_h / $original_h;
        $dest_w_resize = (int)round($original_w * $dest_h_ratio);
    } else {
        $dest_w_ratio  = $dest_w / $original_w;
        $dest_h_resize = (int)round($original_h * $dest_w_ratio);
    }
    if ($dest_w_resize < $dest_w) {
        $dest_h_ratio  = $dest_w / $dest_w_resize;
        $dest_h_resize = (int)round($dest_h * $dest_h_ratio);
        $dest_w_resize = $dest_w;
    }

    // CREATE THE PROPORTIONAL IMAGE RESOURCE
    $thumb = imagecreatetruecolor($dest_w_resize, $dest_h_resize);
    if (!imagecopyresampled($thumb, $original, 0, 0, 0, 0, $dest_w_resize, $dest_h_resize, $original_w, $original_h)) {
        return false;
    }
    // CREATE THE CENTERED CROPPED IMAGE TO THE SPECIFIED DIMENSIONS
    $final = imagecreatetruecolor($dest_w, $dest_h);

    $dest_w_offset = 0;
    $dest_h_offset = 0;
    if ($dest_w < $dest_w_resize) {
        $dest_w_offset = (int)round(($dest_w_resize - $dest_w) / 2);
    } else {
        $dest_h_offset = (int)round(($dest_h_resize - $dest_h) / 2);
    }

    if (!imagecopy($final, $thumb, 0, 0, $dest_w_offset, $dest_h_offset, $dest_w_resize, $dest_h_resize)) {
        return false;
    }
    // STORE THE FINAL IMAGE - WILL OVERWRITE $dest_url
    if (!imagejpeg($final, $dest_url, $quality)) {
        return false;
    }

    return true;
}

/**
 * @param $src_url
 * @param $dest_url
 * @param $pos
 * @param $of
 */
function MergeImage($src_url, $dest_url, $pos, $of)
{
    $dest = imagecreatefromjpeg($dest_url);
    $src  = imagecreatefromjpeg($src_url);
    // ImageCopy ( resource $dst_im , resource $src_im , int $dst_x , int $dst_y , int $src_x , int $src_y , int $src_w , int $src_h )
    $src = imagecreatefromjpeg($src_url);
    if (4 == $of) {
        switch ($pos) {
            case 1:
                imagecopy($dest, $src, 0, 0, 0, 0, 399, 299); //top left
                break;
            case 2:
                imagecopy($dest, $src, 401, 0, 0, 0, 399, 299); //top right
                break;
            case 3:
                imagecopy($dest, $src, 0, 301, 0, 0, 399, 299); //bottom left
                break;
            case 4:
                imagecopy($dest, $src, 401, 301, 0, 0, 399, 299); //bottom right
                break;
        }
    }
    if (6 == $of) {
        switch ($pos) {
            case 1:
                imagecopy($dest, $src, 0, 0, 0, 0, 267, 299); //top left
                break;
            case 2:
                imagecopy($dest, $src, 269, 0, 0, 0, 267, 299); //top center
                break;
            case 3:
                imagecopy($dest, $src, 538, 0, 0, 0, 267, 299); //top right
                break;
            case 4:
                imagecopy($dest, $src, 0, 301, 0, 0, 267, 299); //bottom left
                break;
            case 5:
                imagecopy($dest, $src, 269, 301, 0, 0, 267, 299); //bottom center
                break;
            case 6:
                imagecopy($dest, $src, 538, 301, 0, 0, 267, 299); //bottom right
                break;
        }
    }
    imagejpeg($dest, $dest_url);

    imagedestroy($src);
    imagedestroy($dest);
}
