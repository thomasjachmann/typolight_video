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
 * Load tl_content language file
 */
$this->loadLanguageFile('tl_content');


/**
 * Table tl_video 
 */
$GLOBALS['TL_DCA']['tl_video'] = array
(

	// Config
	'config' => array
	(
		'dataContainer'               => 'Table',
		'ptable'                      => 'tl_video_category',
		'enableVersioning'            => true
	),

	// List
	'list' => array
	(
		'sorting' => array
		(
			'mode'                    => 4,
			'filter'                  => true,
			'fields'                  => array('sorting'),
			'panelLayout'             => 'filter;search,limit',
			'headerFields'            => array('title', 'headline', 'jumpTo', 'tstamp'),
			'child_record_callback'   => array('tl_video', 'listVideos')
		),
		'global_operations' => array
		(
			'all' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['MSC']['all'],
				'href'                => 'act=select',
				'class'               => 'header_edit_all',
				'attributes'          => 'onclick="Backend.getScrollOffset();"'
			)
		),
		'operations' => array
		(
			'edit' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_video']['edit'],
				'href'                => 'act=edit',
				'icon'                => 'edit.gif'
			),
			'copy' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_video']['copy'],
				'href'                => 'act=page&amp;mode=copy',
				'icon'                => 'copy.gif'
			),
			'cut' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_video']['cut'],
				'href'                => 'act=paste&amp;mode=cut',
				'icon'                => 'cut.gif'
			),
			'delete' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_video']['delete'],
				'href'                => 'act=delete',
				'icon'                => 'delete.gif',
				'attributes'          => 'onclick="if (!confirm(\'' . $GLOBALS['TL_LANG']['MSC']['deleteConfirm'] . '\')) return false; Backend.getScrollOffset();"'
			),
			'show' => array
			(
				'label'               => &$GLOBALS['TL_LANG']['tl_video']['show'],
				'href'                => 'act=show',
				'icon'                => 'show.gif'
			)
		)
	),

# TODO Felder bereinigen
	// Palettes
	'palettes' => array
	(
		'__selector__'                => array('video'),
		'default'                     => '{title_legend},name,alias,author;{video_legend},url,description;{publish_legend},published'
	),

	// Fields
	'fields' => array
	(
		# TODO Felder bereinigen
		'name' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_video']['name'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255)
		),
		'alias' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_video']['alias'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'alnum', 'unique'=>true, 'spaceToUnderscore'=>true, 'maxlength'=>128, 'tl_class'=>'w50'),
			'save_callback' => array
			(
				array('tl_video', 'generateAlias')
			)
		),
		'author' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_video']['author'],
			'default'                 => $this->User->id,
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'select',
			'foreignKey'              => 'tl_user.name',
			'eval'                    => array('tl_class'=>'w50')
		),
		'url' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_video']['url'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'tl_class'=>'w100'),
			'save_callback' => array
			(
				array('tl_video', 'extractVideoData')
			)
		),
		'description' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_video']['description'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('rte'=>'tinyMCE', 'helpwizard'=>true),
			'explanation'             => 'insertTags'
		),
		/*'answer' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_video']['answer'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'textarea',
			'eval'                    => array('mandatory'=>true, 'rte'=>'tinyMCE', 'helpwizard'=>true),
			'explanation'             => 'insertTags'
		),
		'addImage' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_video']['addImage'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'singleSRC' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['singleSRC'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('fieldType'=>'radio', 'files'=>true, 'filesOnly'=>true, 'mandatory'=>true)
		),
		'alt' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['alt'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('mandatory'=>true, 'maxlength'=>255, 'tl_class'=>'long')
		),
		'size' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['size'],
			'exclude'                 => true,
			'inputType'               => 'text',
			'eval'                    => array('multiple'=>true, 'size'=>2, 'rgxp'=>'digit', 'nospace'=>true, 'tl_class'=>'w50')
		),
		'imagemargin' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['imagemargin'],
			'exclude'                 => true,
			'inputType'               => 'trbl',
			'options'                 => array('px', '%', 'em', 'pt', 'pc', 'in', 'cm', 'mm'),
			'eval'                    => array('includeBlankOption'=>true, 'tl_class'=>'w50')
		),
		'caption' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['caption'],
			'exclude'                 => true,
			'search'                  => true,
			'inputType'               => 'text',
			'eval'                    => array('rgxp'=>'extnd', 'maxlength'=>255, 'tl_class'=>'w50')
		),
		'floating' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['floating'],
			'exclude'                 => true,
			'inputType'               => 'radioTable',
			'options'                 => array('above', 'left', 'right'),
			'eval'                    => array('cols'=>3, 'tl_class'=>'w50'),
			'reference'               => &$GLOBALS['TL_LANG']['MSC']
		),
		'fullsize' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_content']['fullsize'],
			'exclude'                 => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('tl_class'=>'w50')
		),
		'addEnclosure' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_video']['addEnclosure'],
			'exclude'                 => true,
			'filter'                  => true,
			'inputType'               => 'checkbox',
			'eval'                    => array('submitOnChange'=>true)
		),
		'enclosure' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_video']['enclosure'],
			'exclude'                 => true,
			'inputType'               => 'fileTree',
			'eval'                    => array('fieldType'=>'checkbox', 'files'=>true, 'filesOnly'=>true, 'mandatory'=>true)
		),*/
		'published' => array
		(
			'label'                   => &$GLOBALS['TL_LANG']['tl_video']['published'],
			'exclude'                 => true,
			'filter'                  => true,
			'flag'                    => 2,
			'inputType'               => 'checkbox',
			'eval'                    => array('doNotCopy'=>true)
		)
	)
);

/**
 * Class tl_video
 *
 * Provide miscellaneous methods that are used by the data configuration array.
 * @copyright  Thomas Jachmann 2009 
 * @author     Thomas Jachmann <tom.j@gmx.net> 
 * @package    Videos 
 */
class tl_video extends Backend
{

	/**
	 * Autogenerate a news alias if it has not been set yet
	 * @param mixed
	 * @param object
	 * @return string
	 */
	public function generateAlias($varValue, DataContainer $dc)
	{
		$autoAlias = false;

		// Generate alias if there is none
		if (!strlen($varValue))
		{
			$objTitle = $this->Database->prepare("SELECT name FROM tl_video WHERE id=?")
									   ->limit(1)
									   ->execute($dc->id);

			$autoAlias = true;
			$varValue = standardize($objTitle->name);
		}

		$objAlias = $this->Database->prepare("SELECT id FROM tl_video WHERE alias=?")
								   ->execute($varValue);

		// Check whether the news alias exists
		if ($objAlias->numRows > 1 && !$autoAlias)
		{
			throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['aliasExists'], $varValue));
		}

		// Add ID to alias
		if ($objAlias->numRows && $autoAlias)
		{
			$varValue .= '.' . $dc->id;
		}

		return $varValue;
	}
	
	/**
	 * Extract video data from url
	 * @param mixed
	 * @param object
	 * @return string
	 */
	public function extractVideoData($varValue, DataContainer $dc)
	{
		$url = html_entity_decode($varValue);
		
		$source = $sourceId = $thumbnail = null;
		
		$match = array();
		if (preg_match("/^(http:\/\/)?www\.youtube\.com\/.*[?&]v=([^&]*)&?/i", $url, $match)) {
			$source = 'youtube';
			$sourceId = $match[2];
			$thumbnail = "http://img.youtube.com/vi/" . $sourceId . "/default.jpg";
		} elseif (preg_match("/^(http:\/\/)?video\.google\.[^\/]+\/.*[?&]docid=([^&]*)&?/", $url, $match)) {
			$source = 'google';
			$sourceId = $match[2];
			$videofeed = $this->getUrl("http://video.google.com/videofeed?docid=" . $sourceId);
			if (preg_match("/<media:thumbnail url=\"([^\"]*)\"/i", $videofeed, $match)) {
				$thumbnail = html_entity_decode($match[1]);
			}
		} elseif (preg_match("/^(http:\/\/)?www\.advotv\.com\/.*[?&]key=([^&]*)&?/i", $url, $match)) {
			$source = 'advotv';
			$mediadetails = $this->getUrl($url);
			if (preg_match("/mediaid=([^&]+)&/i", $mediadetails, $match)) {
				$sourceId = $match[1];
				$thumbnail = "http://www.advotv.com/media/thumbs/screenshots/" . $sourceId . ".jpg";
			}
		}
		if ($source == null || $sourceId == null || $thumbnail == null) {
			throw new Exception(sprintf($GLOBALS['TL_LANG']['ERR']['videoUrlUnknown'], $varValue));
		}
		
	  $this->Database->prepare("UPDATE tl_video SET source=?, sourceId = ?, thumbnail=? WHERE id=?")->execute($source, $sourceId, $thumbnail, $dc->id);
	
	  return $varValue;
	}
	
	private function getUrl($url) {
		// TODO what if curl isn't available?
		$c = curl_init($url);
		curl_setopt($c, CURLOPT_RETURNTRANSFER, 1);
		$ret = curl_exec($c);
		// TODO Fehlerbehandlung
		curl_close($c);
		return $ret;
	}
	
	/**
	 * Add the type of input field
	 * @param array
	 * @return string
	 */
	public function listVideos($arrRow)
	{
		$key = $arrRow['published'] ? 'published' : 'unpublished';
		$date = $this->parseDate($GLOBALS['TL_CONFIG']['datimFormat'], $arrRow['tstamp']);

		return '
<div class="cte_type ' . $key . '"><strong>' . $arrRow['name'] . '</strong> - ' . $date . '</div>
<div class="limit_height' . (!$GLOBALS['TL_CONFIG']['doNotCollapse'] ? ' h52' : '') . ' block">
<img src="'. $arrRow['thumbnail'].'" width="72" height="54"/>
</div>' . "\n";
	}
}

?>