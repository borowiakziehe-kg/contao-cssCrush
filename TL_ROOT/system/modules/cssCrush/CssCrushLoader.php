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

namespace Contao;


class CssCrushLoader extends \Frontend
{
    /**
     * Hook into generatePage and add csscrush to the output head
     * @param $objPage
     * @param $objLayout
     * @param PageRegular $objPageRegular
     * @return string
     */
    public function loadCSSCrush($objPage, $objLayout, PageRegular $objPageRegular)
    {
        if($objLayout->useCssCrush == 'cssCrush') {

            //Get CSS File and check if file exists
            $objFile = \FilesModel::findByPk($objLayout->cssCrushFile);

            if ($objFile === null || !is_file(TL_ROOT . '/' . $objFile->path))
            {
                return '';
            }

            // Load cssCrush compiler
            require_once 'system/vendor/cssCrush/CssCrush.php';

            // Buffer the plugins
            $plugins = self::generatePluginArrays($objLayout);

            //generate options array. Look at for all posible csscrush options: https://github.com/peteboere/css-crush/wiki/PHP-API
            $options = array(
                'minify' => ($objLayout->cssCrushMinify) ?  true :  false,
                'cache' => ($objLayout->cssCrushCache) ?  true :  false,
                'versioning' => ($objLayout->cssCrushVersioning) ?  true :  false,
                'output_dir' => ($objLayout->cssCrushDirName) ?  TL_ROOT.'/'.$objLayout->cssCrushDirName :  false,
                'output_file' => ($objLayout->cssCrushFileName) ?  $objLayout->cssCrushFileName :  false,
                'context' => ($objLayout->cssCrushContext) ?  $objLayout->cssCrushContext :  false,
                'enable' => $plugins['enabled'],
                'disable' => $plugins['disabled']
            );

            if($objLayout->cssCrushDocRoot) {
                $options['doc_root'] = $objLayout->cssCrushDocRoot;
            }

            // generate css
            $compiled_file = csscrush_file(TL_ROOT.'/'.$objFile->path, $options);

            //add file to template
            $GLOBALS['TL_CSS'][] = $compiled_file;
        }
    }

    /**
     * Get all ccscrush plugins from plugins folder (vendor/cssCrush/plugins) and return them as aray
     * @return array
     */
    static public function getPlugins()
    {
        $data = array();

        if ($handle = opendir(TL_ROOT .'/'. 'system/vendor/cssCrush/plugins')) {

            while (false !== ($file = readdir($handle))) {
                if ($file != "." && $file != "..") {
                    $data[] = str_replace('.php', '', $file);
                }
            }
            closedir($handle);

        }
        return $data;
    }

    /**
     * Generate the enable disable plugins and return them as array
     * @param $objLayout
     * @return array
     */
    private function generatePluginArrays($objLayout) {
        $activePlugins = deserialize($objLayout->cssCrushPlugins);

        $allPlugins = self::getPlugins();
        if(is_array($activePlugins)){
            $disabledPlugins = array_diff($allPlugins,$activePlugins);
        }


        return array
        (
            'enabled' => $activePlugins,
            'disabled' => $disabledPlugins
        );
    }
}