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
$GLOBALS['TL_LANG']['tl_video_category']['title']    = array('Titel', 'Bitte geben Sie den Kategorie-Titel ein.');
$GLOBALS['TL_LANG']['tl_video_category']['headline'] = array('Überschrift', 'Bitte geben Sie die Kategorie-Überschrift ein.');
$GLOBALS['TL_LANG']['tl_video_category']['jumpTo']   = array('Weiterleitungsseite', 'Bitte wählen Sie die Video-Leser-Seite aus, zu der Besucher weitergeleitet werden, wenn Sie ein Video anklicken.');
$GLOBALS['TL_LANG']['tl_video_category']['tstamp']   = array('Änderungsdatum', 'Datum und Uhrzeit der letzten Änderung');


/**
 * Legends
 */
$GLOBALS['TL_LANG']['tl_video_category']['title_legend'] = 'Titel und Weiterleitung';


/**
 * Reference
 */
$GLOBALS['TL_LANG']['tl_video_category']['deleteConfirm'] = 'Wenn Sie die Kategorie %s löschen, werde auch alle darin enthaltenen Videos gelöscht! Fortfahren?';


/**
 * Buttons
 */
$GLOBALS['TL_LANG']['tl_video_category']['new']    = array('Neue Kategorie', 'Eine neue Kategorie anlegen');
$GLOBALS['TL_LANG']['tl_video_category']['show']   = array('Kategoriedetails', 'Details der Kategorie ID %s anzeigen');
$GLOBALS['TL_LANG']['tl_video_category']['edit']   = array('Kategorie bearbeiten', 'Kategorie ID %s bearbeiten');
$GLOBALS['TL_LANG']['tl_video_category']['copy']   = array('Kategorie duplizieren', 'Kategorie ID %s duplizieren');
$GLOBALS['TL_LANG']['tl_video_category']['delete'] = array('Kategorie löschen', 'Kategorie ID %s löschen');

?>