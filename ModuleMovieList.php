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
 * Class ModuleMovieList
 *
 * @copyright  Thomas Jachmann 2009 
 * @author     Thomas Jachmann <tom.j@gmx.net> 
 * @package    Controller
 */
class ModuleMovieList extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_movielist';


	/**
	 * Target pages
	 * @var array
	 */
	protected $arrTargets = array();


	/**
	 * Display a wildcard in the back end
	 * @return string
	 */
	public function generate()
	{
		if (TL_MODE == 'BE')
		{
			$objTemplate = new BackendTemplate('be_wildcard');

			$objTemplate->wildcard = '### MOVIE LIST ###';
			$objTemplate->title = $this->headline;
			$objTemplate->id = $this->id;
			$objTemplate->link = $this->name;
			$objTemplate->href = 'typolight/main.php?do=modules&amp;act=edit&amp;id=' . $this->id;

			return $objTemplate->parse();
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
		$objMovie = $this->Database->execute("SELECT tl_movie.id AS id, pid, name, alias, url, source, source_id, thumbnail, description, headline, jumpTo FROM tl_movie LEFT JOIN tl_movie_category ON(tl_movie_category.id=tl_movie.pid) WHERE pid IN(" . implode(',', $this->movie_categories) . ")" . (!BE_USER_LOGGED_IN ? " AND published=1" : "") . " ORDER BY pid, sorting");

		if ($objMovie->numRows < 1)
		{
			$this->Template->movie = array();
			return;
		}

		$arrMovie = array_fill_keys($this->movie_categories, array());

		// Add Movies
		while ($objMovie->next())
		{
			$arrMovie[$objMovie->pid]['items'][] = array
			(
				'name' => $objMovie->name,
				'title' => htmlspecialchars($objMovie->name),
				'href' => $this->generateMovieLink($objMovie),
				'url' => $objMovie->url,
				'source' => $objMovie->source,
				'source_id' => $objMovie->source_id,
				'thumbnail' => $objMovie->thumbnail,
				'description' => $objMovie->description
			);

			$arrMovie[$objMovie->pid]['headline'] = $objMovie->headline;
		}

		$arrMovie = array_values($arrMovie);

		$cat_count = 0;
		$cat_limit = count($arrMovie);

		// Add classes
		foreach ($arrMovie as $k=>$v)
		{
			$count = 0;
			$limit = count($v['items']);

			for ($i=0; $i<$limit; $i++)
			{
				$arrMovie[$k]['items'][$i]['class'] = trim(((++$count == 1) ? ' first' : '') . (($count >= $limit) ? ' last' : '') . ((($count % 2) == 0) ? ' odd' : ' even'));
			}

			$arrMovie[$k]['class'] = trim(((++$cat_count == 1) ? ' first' : '') . (($cat_count >= $cat_limit) ? ' last' : '') . ((($cat_count % 2) == 0) ? ' odd' : ' even'));
		}

		$this->Template->movie = $arrMovie;
	}


	/**
	 * Create links and remember pages that have been processed
	 * @param object
	 * @return string
	 */
	protected function generateMovieLink(Database_Result $objMovie)
	{
		if (!isset($this->arrTargets[$objMovie->id]))
		{
			if ($objMovie->jumpTo < 1)
			{
				$this->arrTargets[$objMovie->id] = ampersand($this->Environment->request, true);
			}
			else
			{
				$objTarget = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
									 		->limit(1)
											->execute(intval($objMovie->jumpTo));

				if ($objTarget->numRows < 1)
				{
					$this->arrTargets[$objMovie->id] = ampersand($this->Environment->request, true);
				}

				$this->arrTargets[$objMovie->id] = ampersand($this->generateFrontendUrl($objTarget->fetchAssoc(), '/items/' . ((strlen($objMovie->alias) && !$GLOBALS['TL_CONFIG']['disableAlias']) ? $objMovie->alias : $objMovie->id)));
			}
		}

		return $this->arrTargets[$objMovie->id];
	}
}

?>