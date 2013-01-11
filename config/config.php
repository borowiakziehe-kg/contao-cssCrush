<?php
/**
 * Created by JetBrains PhpStorm.
 * User: jrgregory
 * Date: 11.01.13
 * Time: 16:19
 * To change this template use File | Settings | File Templates.
 */

$GLOBALS['TL_HOOKS']['generatePage'][] = array('CssCrushLoader', 'loadCSSCrush');