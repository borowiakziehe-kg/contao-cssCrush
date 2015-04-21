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

$GLOBALS['TL_HOOKS']['generatePage'][] = array('slashworks\CssCrushLoader', 'loadCSSCrush');