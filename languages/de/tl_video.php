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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_video']['name']     = array('Name', 'Bitte geben Sie den Namen ein.');
$GLOBALS['TL_LANG']['tl_video']['alias']        = array('Video-Alias', 'Der Video-Alias ist eine eindeutige Referenz, die anstelle der numerischen Video-Id aufgerufen werden kann.');
$GLOBALS['TL_LANG']['tl_video']['author']       = array('Autor', 'Hier können Sie den Autor des Videos ändern.');
$GLOBALS['TL_LANG']['tl_video']['url']       = array('URL', 'Tragen Sie hier die URL des Videos (z. B. http://www.youtube.com/watch?v=iLMOdhce-Pk) ein.');
$GLOBALS['TL_LANG']['tl_video']['description']       = array('Beschreibung', 'Hier können Sie das Video beschreiben, den Inhalt erläutern, Erklärungen angeben, das Video kommentieren, etc.');
$GLOBALS['TL_LANG']['tl_video']['published']    = array('Video veröffentlichen', 'Das Video auf der Webseite anzeigen.');


/**
 * Legend
 */
$GLOBALS['TL_LANG']['tl_video']['title_legend']     = 'Titel und Autor';
$GLOBALS['TL_LANG']['tl_video']['video_legend']    = 'Video';
$GLOBALS['TL_LANG']['tl_video']['publish_legend']   = 'Veröffentlichung';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_video']['new']        = array('Neues Video', 'Ein neues Video erstellen');
$GLOBALS['TL_LANG']['tl_video']['show']       = array('Videodetails', 'Details des Videos ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_video']['edit']       = array('Video bearbeiten', 'Video ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_video']['copy']       = array('Video duplizieren', 'Video ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_video']['cut']        = array('Video verschieben', 'Video ID %s verschieben');
$GLOBALS['TL_LANG']['tl_video']['delete']     = array('Video löschen', 'Video ID %s löschen');
$GLOBALS['TL_LANG']['tl_video']['editheader'] = array('Kategorie bearbeiten', 'Die Kategorie-Einstellungen bearbeiten');
$GLOBALS['TL_LANG']['tl_video']['pasteafter'] = array('Oben einfügen', 'Nach dem Video ID %s einfügen');
$GLOBALS['TL_LANG']['tl_video']['pastenew']   = array('Neues Video oben erstellen', 'Neues Element nach dem Video ID %s erstellen');

?>