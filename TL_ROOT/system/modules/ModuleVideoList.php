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
 * Class ModuleVideoList
 *
 * @copyright  Thomas Jachmann 2009 
 * @author     Thomas Jachmann <tom.j@gmx.net> 
 * @package    Controller
 */
class ModuleVideoList extends Module
{

	/**
	 * Template
	 * @var string
	 */
	protected $strTemplate = 'mod_videolist';


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

		$this->video_categories = deserialize($this->video_categories, true);
		$this->video_videos = deserialize($this->video_videos, true);

		return parent::generate();
	}


	/**
	 * Generate module
	 */
	protected function compile()
	{
		$categorize = ($this->video_random == 0);
		$sort_items = false;
		
		$sql = "SELECT tl_video.id AS id, pid, name, alias, url, source, sourceId, thumbnail, description, headline, jumpTo FROM tl_video LEFT JOIN tl_video_category ON(tl_video_category.id=tl_video.pid) WHERE ";
		if (is_array($this->video_videos) && count($this->video_videos) > 0 && $this->video_videos[0]) {
			$sql .= "tl_video.id IN(" . implode(',', $this->video_videos) . ") ";
			$categorize = false;
			$sort_items = true;
		} elseif (is_array($this->video_categories) && count($this->video_categories) > 0 && $this->video_categories[0]) {
			$sql .= "pid IN(" . implode(',', $this->video_categories) . ") ";
		} else {
			$sql .= "1=1 ";
		}
		if (!BE_USER_LOGGED_IN) {
			$sql .= "AND published=1 ";
		}
		$sql .= "ORDER BY ";
		if ($this->video_random) {
			$sql .= "rand() ";
		} elseif ($sort_items) {
			$sql .= "field(tl_video.id, " . implode(',', $this->video_videos) . ") ";
		} else {
			$sql .= "pid, sorting ";
		}
		if ($this->video_maxVideos > 0) {
			$sql .= "LIMIT " . $this->video_maxVideos;
		}
		$objVideo = $this->Database->execute($sql);

		if ($objVideo->numRows < 1)
		{
			$this->Template->video = array();
			return;
		}

		$arrCategories = array_fill_keys($categorize ? $this->video_categories : array(0), array());

		// Add Videos
		while ($objVideo->next())
		{
			$arrVideo = array
			(
				'name' => $objVideo->name,
				'title' => htmlspecialchars($objVideo->name),
				'href' => $this->generateVideoLink($objVideo),
				'url' => $objVideo->url,
				'source' => $objVideo->source,
				'sourceId' => $objVideo->sourceId,
				'thumbnail' => $objVideo->thumbnail,
				'description' => $objVideo->description
			);
			
			if ($categorize) {
				$arrCategories[$objVideo->pid]['items'][] = $arrVideo;
				$arrCategories[$objVideo->pid]['headline'] = $objVideo->headline;
			} else {
				$arrCategories[0]['items'][] = $arrVideo;
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
	protected function generateVideoLink(Database_Result $objVideo)
	{
		if (!isset($this->arrTargets[$objVideo->id]))
		{
			if ($objVideo->jumpTo < 1)
			{
				$this->arrTargets[$objVideo->id] = ampersand($this->Environment->request, true);
			}
			else
			{
				$objTarget = $this->Database->prepare("SELECT id, alias FROM tl_page WHERE id=?")
									 		->limit(1)
											->execute(intval($objVideo->jumpTo));

				if ($objTarget->numRows < 1)
				{
					$this->arrTargets[$objVideo->id] = ampersand($this->Environment->request, true);
				}

				$this->arrTargets[$objVideo->id] = ampersand($this->generateFrontendUrl($objTarget->fetchAssoc(), '/items/' . ((strlen($objVideo->alias) && !$GLOBALS['TL_CONFIG']['disableAlias']) ? $objVideo->alias : $objVideo->id)));
			}
		}

		return $this->arrTargets[$objVideo->id];
	}
}

?>