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
$GLOBALS['TL_LANG']['tl_movie_category']['title']    = array('Title', 'Please enter the category title.');
$GLOBALS['TL_LANG']['tl_movie_category']['headline'] = array('Headline', 'Please enter the category headline.');
$GLOBALS['TL_LANG']['tl_movie_category']['jumpTo']   = array('Redirect page', 'Please choose the movie reader page to which visitors will be redirected when clicking a Movie.');
$GLOBALS['TL_LANG']['tl_movie_category']['tstamp']   = array('Revision date', 'Date and time of the latest revision');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_movie_category']['title_legend'] = 'Title and redirect';


/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_movie_category']['deleteConfirm'] = 'Deleting category ID %s will also delete all its movies! Continue?';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_movie_category']['new']    = array('New category', 'Create a new category');
$GLOBALS['TL_LANG']['tl_movie_category']['show']   = array('Category details', 'Show the details of category ID %s');
$GLOBALS['TL_LANG']['tl_movie_category']['edit']   = array('Edit category', 'Edit category ID %s');
$GLOBALS['TL_LANG']['tl_movie_category']['copy']   = array('Copy category', 'Copy category ID %s');
$GLOBALS['TL_LANG']['tl_movie_category']['delete'] = array('Delete category', 'Delete category ID %s');

?>