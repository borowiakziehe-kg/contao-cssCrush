<?php

/**
 * cssCrush for Contao Open Source CMS
 *
 * Copyright (C) 2013 Joe Ray Gregory
 *
 * @package cssCrush
 * @link    http://borowiakziehe.de
 * @license http://www.gnu.org/licenses/lgpl-3.0.html LGPL
 */

$GLOBALS['TL_LANG']['tl_layout']['name'][0] = 'Titel';


$GLOBALS['TL_LANG']['tl_layout']['csstypes']['default'] = 'Standard';
$GLOBALS['TL_LANG']['tl_layout']['csstypes']['cssCrush'] = 'CSS Crush';

$GLOBALS['TL_LANG']['tl_layout']['useCssCrush'] = array('CSS Typ wählen', 'Bitte wählen Sie wie CSS Dateien in den das Layout geladen werden sollen.');
$GLOBALS['TL_LANG']['tl_layout']['cssCrushSrc'] = array('CSS Crush Datei', 'Bitte wählen Sie eine Datei die CSS-Crushed werden soll.');
$GLOBALS['TL_LANG']['tl_layout']['cssCrushMinify'] = array('CSS Code minimieren', 'Aktivieren Sie dies Version, falls Sie den CSS Code mittels CSS Crush minimieren möchten.');
$GLOBALS['TL_LANG']['tl_layout']['cssCrushCache'] = array('CSS cachen', 'Aktivieren Sie diese Option, falls Sie den CSS Cache verwenden möchten.');
$GLOBALS['TL_LANG']['tl_layout']['cssCrushVersioning'] = array('Versionierung aktivieren', 'Sollen die CSS Dateien als Backup versioniert abgelegt werden?');
$GLOBALS['TL_LANG']['tl_layout']['cssCrushDirName'] = array('Alternativer Pfad', 'Mit dieser Option können Sie einen alternativen Pfad zur CSS Datei vergeben. Die Datei wird dann in diesem Ordner abgelegt.');
$GLOBALS['TL_LANG']['tl_layout']['cssCrushFileName'] = array('Alternativer Dateiname', 'Mit dieser Option können Sie einen alternativen Dateinamen vergeben. Bitte ohne Suffix!');
$GLOBALS['TL_LANG']['tl_layout']['cssCrushDocRoot'] = array('Alternativer Document Root', 'Verwenden Sie ein alternatives Document Root!');
$GLOBALS['TL_LANG']['tl_layout']['cssCrushContext'] = array('Kontext', 'Importieren von Inhalten aus einem relativem Pfad');
$GLOBALS['TL_LANG']['tl_layout']['cssCrushPlugins'] = array('Zu ladende CSS Crush Erweiterungen', 'Wählen Sie aus, welche Plugins von CSS Crush geladen werden sollen.');

$GLOBALS['TL_LANG']['tl_layout']['cssCrushCtoCombiner'] = array('CSS Crush Static', 'Die Crush Datei mit der Contao CSS kombinieren');
$GLOBALS['TL_LANG']['tl_layout']['cssCrushSourceMap'] = array('CSS Crush Source Map', 'Erstellt eine Source Map nach Source Map v3 (für SASS Debugging)');

$GLOBALS['TL_LANG']['tl_layout']['plugins'][''] = array('', '');

$GLOBALS['TL_LANG']['tl_layout']['csscrushoptions_legend'] = 'CSS Crush Optionen';
$GLOBALS['TL_LANG']['tl_layout']['csscrushpath_legend'] = 'CSS Crush Pfadangaben';
$GLOBALS['TL_LANG']['tl_layout']['csscrushplugins_legend'] = 'CSS Crush Plugins';
$GLOBALS['TL_LANG']['tl_layout']['cssframework_legend'] = 'CSS Framework';
