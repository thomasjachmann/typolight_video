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
 * Add palettes to tl_module
 */
# TODO Formular-Felder bereinigen
$GLOBALS['TL_DCA']['tl_module']['palettes']['videolist']   = '{title_legend},name,headline,type;{config_legend},video_categories,video_videos,video_maxVideos,video_random;{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';
$GLOBALS['TL_DCA']['tl_module']['palettes']['videoreader'] = '{title_legend},name,headline,type;{config_legend};{protected_legend:hide},protected;{expert_legend:hide},guests,cssID,space';


/**
 * Add fields to tl_module
 */
$GLOBALS['TL_DCA']['tl_module']['fields']['video_categories'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['video_categories'],
	'exclude'                 => true,
	'inputType'               => 'checkboxWizard',
	'foreignKey'              => 'tl_video_category.title',
	'eval'                    => array('multiple'=>true)
);
$GLOBALS['TL_DCA']['tl_module']['fields']['video_videos'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['video_videos'],
	'exclude'                 => true,
	'inputType'               => 'checkboxWizard',
	'foreignKey'              => 'tl_video.name',
	'eval'                    => array('multiple'=>true)
);
$GLOBALS['TL_DCA']['tl_module']['fields']['video_maxVideos'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['video_maxVideos'],
	'exclude'                 => true,
	'inputType'               => 'text',
	'eval'                    => array('mandatory'=>true)
);
$GLOBALS['TL_DCA']['tl_module']['fields']['video_random'] = array
(
	'label'                   => &$GLOBALS['TL_LANG']['tl_module']['video_random'],
	'exclude'                 => true,
	'inputType'               => 'checkbox'
);

?>