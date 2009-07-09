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
$GLOBALS['TL_LANG']['tl_module']['movie_categories'] = array('Movie categories', 'Please select one or more movie categories.');
$GLOBALS['TL_LANG']['tl_module']['movie_movies'] = array('Movies', 'Please select one or more movies. Selected movies take precedence over selected movie categories. Grouping by category will be disabled by this.');
$GLOBALS['TL_LANG']['tl_module']['movie_maxMovies'] = array('Maximum amount', 'When you want to display only a maximum amount of movies, insert a number greater than 0.');
$GLOBALS['TL_LANG']['tl_module']['movie_random'] = array('Sorted randomly', 'Shall the movies be displayed in random order? Grouping by category will be disabled by this.');

?>