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
 * Class ContentMovieReader
 *
 * Front end content element "movie reader".
 * @copyright  Leo Feyer 2005
 * @author     Leo Feyer <leo@typolight.org>
 * @package    Controller
 */
class ContentMovieReader extends ContentElement
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'ce_moviereader';
	
	
	/**
	 * Parse the template
	 * @return string
	 */
	public function generate()
	{
		$objMovie = $this->getMovie();
		
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');
			
			if ($objMovie == null) {
				$objTemplate->wildcard = '--';
			} else {
				$objTemplate->wildcard = '<img src="' . $objMovie->thumbnail . '" width="72" height="54" align="left" style="margin-right: 10px;"/>' . $objMovie->name;
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
		$objMovie = $this->getMovie();
		
		$this->Template->visible = ($objMovie != null && $objMovie->published);
		
		if (!$this->Template->visible) {
			return;
		}
		
		// Encode e-mail addresses
		$this->import('String');
		
		$this->Template->name = $objMovie->name;
		$this->Template->url = $objMovie->url;
		$this->Template->source = $objMovie->source;
		$this->Template->sourceId = $objMovie->sourceId;
		$this->Template->thumbnail = $objMovie->thumbnail;
		$this->Template->description = $this->String->encodeEmail($objMovie->description);
		$this->Template->showDescription = $this->movie_showDescription;
	}
	
	private function getMovie() {
		$this->import('Database');
		$objMovie = $this->Database->prepare("SELECT * FROM tl_movie WHERE id=?")
									 ->limit(1)
									 ->execute($this->movie_alias);
		if ($objMovie->numRows < 1) {
			return null;
		} else {
			$objMovie->next();
			return $objMovie;
		}
	}
}

?>