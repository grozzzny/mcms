<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace main\assets;

use yii\web\AssetBundle;

/**
 * Main application asset bundle.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class AppBootstrap4Asset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        'css/theme_bootstrap4/style.css',
    ];

    public $js = [
        'js/core.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',

        //Bootstrap 4
        'grozzzny\depends\bootstrap4\Bootstrap4Asset',
        'grozzzny\depends\bootstrap4\Bootstrap4PluginAsset',

        'main\assets\DependsAsset',
    ];
}
