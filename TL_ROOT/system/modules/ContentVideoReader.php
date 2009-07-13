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
 * Class ContentVideoReader
 *
 * Front end content element "video reader".
 * @copyright  Leo Feyer 2005
 * @author     Leo Feyer <leo@typolight.org>
 * @package    Controller
 */
class ContentVideoReader extends ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_videoreader';
	
	
	/**
	 * Parse the template
	 * @return string
	 */
	public function generate()
	{
		$objVideo = $this->getVideo();
		
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');
			
			if ($objVideo == null) {
				$objTemplate->wildcard = '--';
			} else {
				$objTemplate->wildcard = '<img src="' . $objVideo->thumbnail . '" width="72" height="54" align="left" style="margin-right: 10px;"/>' . $objVideo->name;
			}

			return $objTemplate->parse();
		}

		return parent::generate();
	}


	/**
	 * Generate content element
	 */
	protected function compile()
	{
		$objVideo = $this->getVideo();
		
		$this->Template->visible = ($objVideo != null && $objVideo->published);
		
		if (!$this->Template->visible) {
			return;
		}
		
		// Encode e-mail addresses
		$this->import('String');
		
		$this->Template->name = $objVideo->name;
		$this->Template->url = $objVideo->url;
		$this->Template->source = $objVideo->source;
		$this->Template->sourceId = $objVideo->sourceId;
		$this->Template->thumbnail = $objVideo->thumbnail;
		$this->Template->description = $this->String->encodeEmail($objVideo->description);
		$this->Template->showDescription = $this->video_showDescription;
	}
	
	private function getVideo() {
		$this->import('Database');
		$objVideo = $this->Database->prepare("SELECT * FROM tl_video WHERE id=?")
									 ->limit(1)
									 ->execute($this->video_alias);
		if ($objVideo->numRows < 1) {
			return null;
		} else {
			$objVideo->next();
			return $objVideo;
		}
	}
}

?>