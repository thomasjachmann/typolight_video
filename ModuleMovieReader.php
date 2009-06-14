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
 * Class ModuleMovieReader
 *
 * @copyright  Thomas Jachmann 2009 
 * @author     Thomas Jachmann <tom.j@gmx.net> 
 * @package    Controller
 */
class ModuleMovieReader extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_moviereader';


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

		$this->movie_categories = deserialize($this->movie_categories, true);

		// Return if there are no categories
		if (!is_array($this->movie_categories) || count($this->movie_categories) < 1)
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

		$objMovie = $this->Database->prepare("SELECT *, (SELECT title FROM tl_movie_category WHERE tl_movie_category.id=tl_movie.pid) AS category, (SELECT name FROM tl_user WHERE tl_user.id=tl_movie.author) AS authorsName FROM tl_movie WHERE pid IN(" . implode(',', $this->movie_categories) . ") AND (id=? OR alias=?)" . (!BE_USER_LOGGED_IN ? " AND published=1" : ""))
								 ->limit(1)
								 ->execute((is_numeric($this->Input->get('items')) ? $this->Input->get('items') : 0), $this->Input->get('items'));

		if ($objMovie->numRows < 1)
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
		$objPage->pageTitle = $objMovie->name;
		
		// Encode e-mail addresses
		$this->import('String');
		
		$this->Template->name = $objMovie->name;
		$this->Template->url = $objMovie->url;
		$this->Template->source = $objMovie->source;
		$this->Template->sourceId = $objMovie->sourceId;
		$this->Template->thumbnail = $objMovie->thumbnail;
		$this->Template->description = $this->String->encodeEmail($objMovie->description);

		$this->Template->info = sprintf($GLOBALS['TL_LANG']['MSC']['movieCreatedBy'], $this->parseDate($GLOBALS['TL_CONFIG']['dateFormat'], $objMovie->tstamp), $objMovie->authorsName);
	}
}

?>