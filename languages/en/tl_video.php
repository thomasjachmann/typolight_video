<?php if (!defined('TL_ROOT')) die('You can not access this file directly!');

/**
 * TYPOlight webCMS
 * Copyright (C) 2005 Leo Feyer
 *
 * This program is free software: you can redistribute it and/or
 * modify it under the terms of the GNU Lesser General Public
 * License as published by the Free Software Foundation, either
 * version 2.1 of the License, or (at your option) any later version.
 * 
 * This program is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the GNU
 * Lesser General Public License for more details.
 * 
 * You should have received a copy of the GNU Lesser General Public
 * License along with this program. If not, please visit the Free
 * Software Foundation website at http://www.gnu.org/licenses/.
 *
 * PHP version 5
 * @copyright  Thomas Jachmann 2009 
 * @author     Thomas Jachmann <tom.j@gmx.net> 
 * @package    Videos 
 * @license    LGPL 
 * @filesource
 */

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_video']['name']     = array('Name', 'Please enter a name.');
$GLOBALS['TL_LANG']['tl_video']['alias']        = array('Video alias', 'The video alias is a unique reference to the video which can be called instead of its numeric ID.');
$GLOBALS['TL_LANG']['tl_video']['author']       = array('Author', 'Here you can change the author of the video.');
$GLOBALS['TL_LANG']['tl_video']['url']       = array('URL', 'Please enter the URL of the video\'s page (eg. http://www.youtube.com/watch?v=iLMOdhce-Pk).');
$GLOBALS['TL_LANG']['tl_video']['description']       = array('Description', 'Here, you can descripe the video, explain it\'s content, provide an explanation, comment on the video, etc.');
$GLOBALS['TL_LANG']['tl_video']['published']    = array('Publish video', 'Make the video publicly visible on the website.');


/**
 * Legend
 */
$GLOBALS['TL_LANG']['tl_video']['title_legend']     = 'Title and author';
$GLOBALS['TL_LANG']['tl_video']['video_legend']    = 'Video';
$GLOBALS['TL_LANG']['tl_video']['publish_legend']   = 'Publish settings';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_video']['new']        = array('New Video', 'Create a new video');
$GLOBALS['TL_LANG']['tl_video']['show']       = array('Show Video details', 'Show the details of video ID %s');
$GLOBALS['TL_LANG']['tl_video']['edit']       = array('Edit Video', 'Edit video ID %s');
$GLOBALS['TL_LANG']['tl_video']['copy']       = array('Duplicate Video', 'Duplicate video ID %s');
$GLOBALS['TL_LANG']['tl_video']['cut']        = array('Move Video', 'Move video ID %s');
$GLOBALS['TL_LANG']['tl_video']['delete']     = array('Delete Video', 'Delete video ID %s');
$GLOBALS['TL_LANG']['tl_video']['editheader'] = array('Edit category', 'Edit the category settings');
$GLOBALS['TL_LANG']['tl_video']['pasteafter'] = array('Paste at the top', 'Paste after video ID %s');
$GLOBALS['TL_LANG']['tl_video']['pastenew']   = array('Add new at the top', 'Add new after video ID %s');

?>