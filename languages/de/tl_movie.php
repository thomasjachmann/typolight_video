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
 * Fields
 */
$GLOBALS['TL_LANG']['tl_movie']['name']     = array('Name', 'Bitte geben Sie den Namen ein.');
$GLOBALS['TL_LANG']['tl_movie']['alias']        = array('Film-Alias', 'Der Film-Alias ist eine eindeutige Referenz, die anstelle der numerischen Film-Id aufgerufen werden kann.');
$GLOBALS['TL_LANG']['tl_movie']['author']       = array('Autor', 'Hier können Sie den Autor des Films ändern.');
$GLOBALS['TL_LANG']['tl_movie']['url']       = array('URL', 'Tragen Sie hier die URL des Videos (z. B. http://www.youtube.com/watch?v=iLMOdhce-Pk) ein.');
$GLOBALS['TL_LANG']['tl_movie']['description']       = array('Beschreibung', 'Hier können Sie das Video beschreiben, den Inhalt erläutern, Erklärungen angeben, das Video kommentieren, etc.');
$GLOBALS['TL_LANG']['tl_movie']['published']    = array('Film veröffentlichen', 'Den Film auf der Webseite anzeigen.');


/**
 * Legend
 */
$GLOBALS['TL_LANG']['tl_movie']['title_legend']     = 'Titel und Autor';
$GLOBALS['TL_LANG']['tl_movie']['movie_legend']    = 'Film';
$GLOBALS['TL_LANG']['tl_movie']['publish_legend']   = 'Veröffentlichung';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_movie']['new']        = array('Neuer Film', 'Einen neuen Film erstellen');
$GLOBALS['TL_LANG']['tl_movie']['show']       = array('Filmdetails', 'Details des Films ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_movie']['edit']       = array('Film bearbeiten', 'Film ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_movie']['copy']       = array('Film duplizieren', 'Film ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_movie']['cut']        = array('Film verschieben', 'Film ID %s verschieben');
$GLOBALS['TL_LANG']['tl_movie']['delete']     = array('Film löschen', 'Film ID %s löschen');
$GLOBALS['TL_LANG']['tl_movie']['editheader'] = array('Kategorie bearbeiten', 'Die Kategorie-Einstellungen bearbeiten');
$GLOBALS['TL_LANG']['tl_movie']['pasteafter'] = array('Oben einfügen', 'Nach dem Film ID %s einfügen');
$GLOBALS['TL_LANG']['tl_movie']['pastenew']   = array('Neuen Film oben erstellen', 'Neues Element nach dem Film ID %s erstellen');

?>