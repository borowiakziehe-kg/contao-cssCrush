<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jrgregory
 * Date: 11.01.13
 * Time: 16:21
 * To change this template use File | Settings | File Templates.
 */

namespace Contao;


class CssCrushLoader extends \Frontend
{
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

            //generate options array
            $options = array(
                'minify' => ($objLayout->cssCrushMinify) ?  true :  false,
                'cache' => ($objLayout->cssCrushCache) ?  true :  false,
                'versioning' => ($objLayout->cssCrushVersioning) ?  true :  false,
                'output_dir' => ($objLayout->cssCrushDirName) ?  TL_ROOT.'/'.$objLayout->cssCrushDirName :  false,
                'output_file' => ($objLayout->cssCrushFileName) ?  $objLayout->cssCrushFileName :  false,
                'context' => ($objLayout->cssCrushContext) ?  $objLayout->cssCrushContext :  false
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
}