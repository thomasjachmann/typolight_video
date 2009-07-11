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
 * Class ModuleVideoReader
 *
 * @copyright  Thomas Jachmann 2009 
 * @author     Thomas Jachmann <tom.j@gmx.net> 
 * @package    Controller
 */
class ModuleVideoReader extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_videoreader';


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### MOVIE READER ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'typolight/main.php?do=modules&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
		}

		// Return if no news item has been specified
		if (!$this->Input->get('items'))
		{
			return '';
		}

		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{
		global $objPage;

		$this->Template->back = $GLOBALS['TL_LANG']['MSC']['goBack'];
		$this->Template->referer = 'javascript:history.go(-1)';

		$objVideo = $this->Database->prepare("SELECT *, (SELECT title FROM tl_video_category WHERE tl_video_category.id=tl_video.pid) AS category, (SELECT name FROM tl_user WHERE tl_user.id=tl_video.author) AS authorsName FROM tl_video WHERE (id=? OR alias=?)" . (!BE_USER_LOGGED_IN ? " AND published=1" : ""))
								 ->limit(1)
								 ->execute((is_numeric($this->Input->get('items')) ? $this->Input->get('items') : 0), $this->Input->get('items'));

		if ($objVideo->numRows < 1)
		{
			$this->Template->error = '<p class="error">' . sprintf($GLOBALS['TL_LANG']['MSC']['invalidPage'], $this->Input->get('items')) . '</p>';

			// Do not index the page
			$objPage->noSearch = 1;
			$objPage->cache = 0;

			// Send 404 header
			header('HTTP/1.1 404 Not Found');
			return;
		}

		// Overwrite page title
		$objPage->pageTitle = $objVideo->name;
		
		// Encode e-mail addresses
		$this->import('String');
		
		$this->Template->name = $objVideo->name;
		$this->Template->url = $objVideo->url;
		$this->Template->source = $objVideo->source;
		$this->Template->sourceId = $objVideo->sourceId;
		$this->Template->thumbnail = $objVideo->thumbnail;
		$this->Template->description = $this->String->encodeEmail($objVideo->description);
	}
}

?>