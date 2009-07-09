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
 * @package    Movies 
 * @license    LGPL 
 * @filesource
 */

/**
 * Fields
 */
$GLOBALS['TL_LANG']['tl_movie']['name']     = array('Name', 'Please enter a name.');
$GLOBALS['TL_LANG']['tl_movie']['alias']        = array('Movie alias', 'The movie alias is a unique reference to the movie which can be called instead of its numeric ID.');
$GLOBALS['TL_LANG']['tl_movie']['author']       = array('Author', 'Here you can change the author of the movie.');
$GLOBALS['TL_LANG']['tl_movie']['url']       = array('URL', 'Please enter the URL of the movie\'s page (eg. http://www.youtube.com/watch?v=iLMOdhce-Pk).');
$GLOBALS['TL_LANG']['tl_movie']['description']       = array('Description', 'Here, you can descripe the movie, explain it\'s content, provide an explanation, comment on the movie, etc.');
$GLOBALS['TL_LANG']['tl_movie']['published']    = array('Publish movie', 'Make the movie publicly visible on the website.');


/**
 * Legend
 */
$GLOBALS['TL_LANG']['tl_movie']['title_legend']     = 'Title and author';
$GLOBALS['TL_LANG']['tl_movie']['movie_legend']    = 'Movie';
$GLOBALS['TL_LANG']['tl_movie']['publish_legend']   = 'Publish settings';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_movie']['new']        = array('New Movie', 'Create a new movie');
$GLOBALS['TL_LANG']['tl_movie']['show']       = array('Show Movie details', 'Show the details of movie ID %s');
$GLOBALS['TL_LANG']['tl_movie']['edit']       = array('Edit Movie', 'Edit movie ID %s');
$GLOBALS['TL_LANG']['tl_movie']['copy']       = array('Duplicate Movie', 'Duplicate movie ID %s');
$GLOBALS['TL_LANG']['tl_movie']['cut']        = array('Move Movie', 'Move movie ID %s');
$GLOBALS['TL_LANG']['tl_movie']['delete']     = array('Delete Movie', 'Delete movie ID %s');
$GLOBALS['TL_LANG']['tl_movie']['editheader'] = array('Edit category', 'Edit the category settings');
$GLOBALS['TL_LANG']['tl_movie']['pasteafter'] = array('Paste at the top', 'Paste after movie ID %s');
$GLOBALS['TL_LANG']['tl_movie']['pastenew']   = array('Add new at the top', 'Add new after movie ID %s');

?>