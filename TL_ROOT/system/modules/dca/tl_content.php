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
 * Add palettes to tl_content
 */
$GLOBALS['TL_DCA']['tl_content']['palettes']['videoReader'] = '{type_legend},type;{include_legend},video_alias,video_showDescription';

/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_content']['fields']['video_alias'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['video_alias'],
	'exclude'                 => true,
	'inputType'               => 'select',
	'options_callback'        => array('tl_content_video', 'getVideos'),
	'eval'                    => array('mandatory'=>true)
);
$GLOBALS['TL_DCA']['tl_content']['fields']['video_showDescription'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_content']['video_showDescription'],
	'exclude'                 => true,
	'inputType'               => 'checkbox'
);



/**
 * Class tl_content
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Thomas Jachmann 2009 
 * @author     Thomas Jachmann <tom.j@gmx.net> 
 * @package    Video
 */
class tl_content_video extends Backend
{

	/**
	 * Get all videos and return them as array
	 * @return array
	 */
	public function getVideos()
	{
		$arrVideos = array();
		$objVideo = $this->Database->execute("SELECT tl_video.id AS id, name, pid, title AS category FROM tl_video LEFT JOIN tl_video_category ON(tl_video_category.id=tl_video.pid) ORDER BY pid, sorting");

		while ($objVideo->next())
		{
			$arrVideos[$objVideo->category][$objVideo->id] = $objVideo->id . ' - ' . $objVideo->name;
		}

		return $arrVideos;
	}
}

?>