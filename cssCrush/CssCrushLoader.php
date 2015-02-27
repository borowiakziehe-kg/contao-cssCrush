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

    namespace slashworks;


    class CssCrushLoader extends \Frontend
    {

        static $oCssCrushFile;
        static $aOptions;
        static $cssCrushCtoCombiner;
    /**
     * Hook into generatePage and add csscrush to the output head
     *
     * @param              $objPage
     * @param              $objLayout
     * @param \PageRegular $objPageRegular
     *
     * @return string
     */
    public function loadCSSCrush($objPage, $objLayout, \PageRegular $objPageRegular)
    {
        if ($objLayout->useCssCrush == 'cssCrush') {

            //Get CSS File and check if file exists
            CssCrushLoader::$oCssCrushFile = \FilesModel::findByPk($objLayout->cssCrushFile);
            CssCrushLoader::$cssCrushCtoCombiner = $objLayout->cssCrushCtoCombiner;

            if (CssCrushLoader::$oCssCrushFile === null || !is_file(TL_ROOT . '/' . CssCrushLoader::$oCssCrushFile->path)) {
                return '';
            }

            // Load cssCrush compiler
            require_once 'system/modules/cssCrush/vendor/cssCrush/CssCrush.php';

            // Buffer the plugins
            $plugins = self::generatePluginArrays($objLayout);

            //generate options array. Look at for all possible csscrush options: https://github.com/peteboere/css-crush/wiki/PHP-API
            CssCrushLoader::$aOptions = array(
                'minify'      => ($objLayout->cssCrushMinify) ? true : false,
                'cache'       => ($objLayout->cssCrushCache) ? true : false,
                'versioning'  => ($objLayout->cssCrushVersioning) ? true : false,
                'output_dir'  => ($objLayout->cssCrushDirName) ? TL_ROOT . '/' . $objLayout->cssCrushDirName : false,
                'output_file' => ($objLayout->cssCrushFileName) ? $objLayout->cssCrushFileName : false,
                'context'     => ($objLayout->cssCrushContext) ? $objLayout->cssCrushContext : false,
                'source_map'  => ($objLayout->cssCrushSourceMap) ? true : false,
                'enable'      => $plugins['enabled'],
                'disable'     => $plugins['disabled']
            );


            if ($objLayout->cssCrushDocRoot) {
                $options['doc_root'] = $objLayout->cssCrushDocRoot;
            }

            // generate css
            CssCrushLoader::recompile(CssCrushLoader::$aOptions);
        }
    }

    /**
     * (re)compile css file with given css crush options
     *
     * @param $sPath
     * @param $aOptions
     *
     * @return string
     */
    public static function recompile($aOptions)
    {
        // Load cssCrush compiler
        require_once 'system/modules/cssCrush/vendor/cssCrush/CssCrush.php';
        $strStatic = "";
        // set filepath
        $sPath = TL_ROOT . '/' . CssCrushLoader::$oCssCrushFile->path;
        //merge given options with defaultoptions
        CssCrushLoader::$aOptions = array_merge(CssCrushLoader::$aOptions, $aOptions);
        //crush css file
        $compiled_file = csscrush_file($sPath, CssCrushLoader::$aOptions);

        // if combine option is set
        if (CssCrushLoader::$cssCrushCtoCombiner) {
            $strStatic = "||static";
        }

        //add file to template
        //$GLOBALS['TL_CSS'][CssCrushLoader::$oCssCrushFile->hash] = $compiled_file . $strStatic;
        $GLOBALS['TL_HEAD'][] = "<link rel='stylesheet' href='$compiled_file.$strStatic'/>";

    }


    /**
     * Get all ccscrush plugins from plugins folder (vendor/cssCrush/plugins) and return them as aray
     *
     * @return array
     */
    static public function getPlugins()
    {
        $data = array();

        if ($handle = opendir(TL_ROOT . '/' . 'system/modules/cssCrush/vendor/cssCrush/plugins')) {

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
     *
     * @param $objLayout
     *
     * @return array
     */
    private function generatePluginArrays($objLayout)
    {
        $activePlugins = deserialize($objLayout->cssCrushPlugins);

        $allPlugins = self::getPlugins();
        if (is_array($activePlugins)) {
            $disabledPlugins = array_diff($allPlugins, $activePlugins);
        }


        return array
        (
            'enabled'  => $activePlugins,
            'disabled' => $disabledPlugins
        );
    }
}
