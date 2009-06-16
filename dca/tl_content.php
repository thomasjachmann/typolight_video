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
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['movieReader'] = '{type_legend},type;{include_legend},movie_alias,movie_showDescription';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['movie_alias'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['movie_alias'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_content_movie', 'getMovies'),
	'eval'                    => array('mandatory'=>true)
);
$GLOBALS['TL_DCA']['tl_content']['fields']['movie_showDescription'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['movie_showDescription'],
	'exclude'                 => true,
	'inputType'               => 'checkbox'
);



/**
 * Class tl_content
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Thomas Jachmann 2009 
 * @author     Thomas Jachmann <tom.j@gmx.net> 
 * @package    Movie
 */
class tl_content_movie extends Backend
{

	/**
	 * Get all movies and return them as array
	 * @return array
	 */
	public function getMovies()
	{
		$arrMovies = array();
		$objMovie = $this->Database->execute("SELECT tl_movie.id AS id, name, pid, title AS category FROM tl_movie LEFT JOIN tl_movie_category ON(tl_movie_category.id=tl_movie.pid) ORDER BY pid, sorting");

		while ($objMovie->next())
		{
			$arrMovies[$objMovie->category][$objMovie->id] = $objMovie->id . ' - ' . $objMovie->name;
		}

		return $arrMovies;
	}
}

?>