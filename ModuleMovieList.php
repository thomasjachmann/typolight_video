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
		$this->movie_movies = deserialize($this->movie_movies, true);

		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{
		$categorize = ($this->movie_random == 0);
		
		$sql = "SELECT tl_movie.id AS id, pid, name, alias, url, source, sourceId, thumbnail, description, headline, jumpTo FROM tl_movie LEFT JOIN tl_movie_category ON(tl_movie_category.id=tl_movie.pid) WHERE ";
		if (is_array($this->movie_movies) && count($this->movie_movies) > 0 && $this->movie_movies[0]) {
			$sql .= "tl_movie.id IN(" . implode(',', $this->movie_movies) . ") ";
			$categorize = false;
		} elseif (is_array($this->movie_categories) && count($this->movie_categories) > 0 && $this->movie_categories[0]) {
			$sql .= "pid IN(" . implode(',', $this->movie_categories) . ") ";
		} else {
			$sql .= "1=1 ";
		}
		if (!BE_USER_LOGGED_IN) {
			$sql .= "AND published=1 ";
		}
		$sql .= "ORDER BY ";
		if ($this->movie_random) {
			$sql .= "rand() ";
		} else {
			$sql .= "pid, sorting ";
		}
		if ($this->movie_maxMovies > 0) {
			$sql .= "LIMIT " . $this->movie_maxMovies;
		}
		$objMovie = $this->Database->execute($sql);

		if ($objMovie->numRows < 1)
		{
			$this->Template->movie = array();
			return;
		}

		$arrCategories = array_fill_keys($categorize ? $this->movie_categories : array(0), array());

		// Add Movies
		while ($objMovie->next())
		{
			$arrMovie = array
			(
				'name' => $objMovie->name,
				'title' => htmlspecialchars($objMovie->name),
				'href' => $this->generateMovieLink($objMovie),
				'url' => $objMovie->url,
				'source' => $objMovie->source,
				'sourceId' => $objMovie->sourceId,
				'thumbnail' => $objMovie->thumbnail,
				'description' => $objMovie->description
			);
			
			if ($categorize) {
				$arrCategories[$objMovie->pid]['items'][] = $arrMovie;
				$arrCategories[$objMovie->pid]['headline'] = $objMovie->headline;
			} else {
				$arrCategories[0]['items'][] = $arrMovie;
			}
		}

		$arrCategories = array_values($arrCategories);

		$cat_count = 0;
		$cat_limit = count($arrCategories);

		// Add classes
		foreach ($arrCategories as $k=>$v)
		{
			$count = 0;
			$limit = count($v['items']);

			for ($i=0; $i<$limit; $i++)
			{
				$arrCategories[$k]['items'][$i]['class'] = trim(((++$count == 1) ? ' first' : '') . (($count >= $limit) ? ' last' : '') . ((($count % 2) == 0) ? ' odd' : ' even'));
			}

			$arrCategories[$k]['class'] = trim(((++$cat_count == 1) ? ' first' : '') . (($cat_count >= $cat_limit) ? ' last' : '') . ((($cat_count % 2) == 0) ? ' odd' : ' even'));
		}

		$this->Template->categories = $arrCategories;
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