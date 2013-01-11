<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jrgregory
 * Date: 11.01.13
 * Time: 14:41
 * To change this template use File | Settings | File Templates.
 */

$GLOBALS['TL_DCA']['tl_layout']['palettes']['default'] = str_replace(
    '{style_legend}',
    '{style_legend},useCssCrush',
    $GLOBALS['TL_DCA']['tl_layout']['palettes']['default']
);
array_push($GLOBALS['TL_DCA']['tl_layout']['palettes']['__selector__'], 'useCssCrush');

$GLOBALS['TL_DCA']['tl_layout']['palettes']['cssCrush'] = '{title_legend},name;{header_legend},rows;{column_legend},cols;{sections_legend:hide},sections,sPosition;{style_legend},useCssCrush, cssCrushFile,cssCrushMinify,cssCrushCache,cssCrushVersioning,cssCrushDirName,cssCrushFileName,cssCrushDocRoot,cssCrushContext;{feed_legend:hide}{feed_legend:hide},newsfeeds,calendarfeeds;{modules_legend},modules;{expert_legend:hide},template,doctype,webfonts,cssClass,onload,head;{jquery_legend},addJQuery;{mootools_legend},addMooTools;{script_legend},analytics,script;{static_legend},static';

$fields = array
(
    'useCssCrush' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['articleType'],
        'default'                 => 'text',
        'exclude'                 => true,
        'filter'                  => true,
        'inputType'               => 'select',
        'options'                 => array('default', 'cssCrush'),
        'reference'               => &$GLOBALS['TL_LANG']['tl_article']['types'],
        'eval'                    => array('chosen'=>true, 'submitOnChange'=>true),
        'sql'                     => "varchar(32) NOT NULL default ''"
    ),

    'cssCrushFile' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['singleSRC'],
        'exclude'                 => true,
        'inputType'               => 'fileTree',
        'eval'                    => array('fieldType'=>'radio', 'mandatory'=>true, 'files'=>true, 'tl_class'=>'clr', 'extensions' => 'css'),
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
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cssCrushCache'],
        'exclude'                 => true,
        'inputType'               => 'checkbox',
        'eval'                    => array('tl_class'=>'w50 m12'),
        'sql'                     => "char(1) NOT NULL default ''"
    ),

    'cssCrushDirName' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['headline'],
        'exclude'                 => true,
        'search'                  => true,
        'inputType'               => 'text',
        'eval'                    => array('maxlength'=>255, 'tl_class'=>'clr w50 m12'),
        'sql'                     => "varchar(255) NOT NULL default ''"
    ),

    'cssCrushFileName' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['headline'],
        'exclude'                 => true,
        'search'                  => true,
        'inputType'               => 'text',
        'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50 m12'),
        'sql'                     => "varchar(255) NOT NULL default ''"
    ),

    'cssCrushDocRoot' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['headline'],
        'exclude'                 => true,
        'search'                  => true,
        'inputType'               => 'text',
        'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50 m12'),
        'sql'                     => "varchar(255) NOT NULL default ''"
    ),

    'cssCrushContext' => array
    (
        'label'                   => &$GLOBALS['TL_LANG']['tl_layout']['cssCrushContext'],
        'exclude'                 => true,
        'search'                  => true,
        'inputType'               => 'text',
        'eval'                    => array('maxlength'=>255, 'tl_class'=>'w50 m12'),
        'sql'                     => "varchar(255) NOT NULL default ''"
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

