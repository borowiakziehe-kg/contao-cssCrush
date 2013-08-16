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

$GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] = str_replace(
    '{style_legend}',
    '{style_legend},useCssCrush',
    $GLOBALS['TL_DCA']['tl_layout']['palettes']['default']
);
array_push($GLOBALS['TL_DCA']['tl_layout']['palettes']['__selector__'], 'useCssCrush');

$originalDefault = str_replace
(
    'useCssCrush',
    'useCssCrush,cssCrushFile;{csscrushoptions_legend},cssCrushMinify,cssCrushCache,cssCrushVersioning,cssCrushCtoCombiner,cssCrushSourceMap;{csscrushpath_legend:hide},cssCrushDirName,cssCrushFileName,cssCrushDocRoot,cssCrushContext;{csscrushplugins_legend},cssCrushPlugins;{cssframework_legend:hide},',
    $GLOBALS['TL_DCA']['tl_layout']['palettes']['default']
);

$GLOBALS['TL_DCA']['tl_layout']['palettes']['cssCrush'] = $originalDefault;

$fields = array
(
    'useCssCrush' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['useCssCrush'],
        'default'                 => 'text',
        'exclude'                 => true,
        'filter'                  => true,
        'inputType'               => 'select',
        'options'                 => array('default', 'cssCrush'),
        'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['csstypes'],
        'eval'                    => array('chosen'=>true, 'submitOnChange'=>true),
        'sql'                     => "varchar(32) NOT NULL default ''"
    ),

    'cssCrushFile' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cssCrushSrc'],
        'exclude'                 => true,
        'inputType'               => 'fileTree',
        'eval'                    => array('fieldType'=>'radio', 'mandatory'=>true, 'files'=>true, 'tl_class'=>'clr m12', 'extensions' => 'css'),
        'sql'                     => "varchar(255) NOT NULL default ''"
    ),

    'cssCrushMinify' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cssCrushMinify'],
        'exclude'                 => true,
        'inputType'               => 'checkbox',
        'eval'                    => array('tl_class'=>'w50 m12'),
        'sql'                     => "char(1) NOT NULL default ''"
    ),

    'cssCrushCache' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cssCrushCache'],
        'exclude'                 => true,
        'inputType'               => 'checkbox',
        'eval'                    => array('tl_class'=>'w50 m12'),
        'sql'                     => "char(1) NOT NULL default ''"
    ),

    'cssCrushVersioning' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cssCrushVersioning'],
        'exclude'                 => true,
        'inputType'               => 'checkbox',
        'eval'                    => array('tl_class'=>'w50 m12'),
        'sql'                     => "char(1) NOT NULL default ''"
    ),

    'cssCrushSourceMap' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cssCrushSourceMap'],
        'exclude'                 => true,
        'inputType'               => 'checkbox',
        'eval'                    => array('tl_class'=>'w50 m12'),
        'sql'                     => "char(1) NOT NULL default ''"
    ),

    'cssCrushCtoCombiner' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cssCrushCtoCombiner'],
        'exclude'                 => true,
        'inputType'               => 'checkbox',
        'eval'                    => array('tl_class'=>'w50 m12'),
        'sql'                     => "char(1) NOT NULL default ''"
    ),

    'cssCrushDirName' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cssCrushDirName'],
        'exclude'                 => true,
        'search'                  => true,
        'inputType'               => 'text',
        'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50 m12'),
        'sql'                     => "varchar(255) NOT NULL default ''"
    ),

    'cssCrushFileName' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cssCrushFileName'],
        'exclude'                 => true,
        'search'                  => true,
        'inputType'               => 'text',
        'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50 m12'),
        'sql'                     => "varchar(255) NOT NULL default ''"
    ),

    'cssCrushDocRoot' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cssCrushDocRoot'],
        'exclude'                 => true,
        'search'                  => true,
        'inputType'               => 'text',
        'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
        'sql'                     => "varchar(255) NOT NULL default ''"
    ),

    'cssCrushContext' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cssCrushContext'],
        'exclude'                 => true,
        'search'                  => true,
        'inputType'               => 'text',
        'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50'),
        'sql'                     => "varchar(255) NOT NULL default ''"
    ),

    'cssCrushPlugins' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cssCrushPlugins'],
        'exclude'                 => true,
        'inputType'               => 'checkbox',
        'options_callback'        => array('CssCrushLoader', 'getPlugins'),
        'eval'                    => array('multiple'=>true, 'tl_class'=>'m12 clr'),
        'reference'               => &$GLOBALS['TL_LANG']['tl_layout']['plugins'],
        'sql'                     => "blob NULL"
    )

    /*
     * TODO Adding fields see https://github.com/peteboere/css-crush/wiki/PHP-API#options
     * rewrite_import_urls Input Unit
     * vendor_target text
     * vars TextWizard
     * rewrite_import_urls selectboxwizard
     * */
);

$GLOBALS['TL_DCA']['tl_layout']['fields'] = array_merge($GLOBALS['TL_DCA']['tl_layout']['fields'], $fields);

