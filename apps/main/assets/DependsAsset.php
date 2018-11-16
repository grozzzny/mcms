<?php


namespace main\assets;


use yii\web\AssetBundle;

class DependsAsset extends AssetBundle
{
    public $depends = [
        'grozzzny\depends\fontawesome5\FontAwesome5Asset',
        //'grozzzny\depends\jquery_migrate\JqueryMigrateAsset',
        'grozzzny\depends\font_awesome\FontAwesomeAsset',
        'grozzzny\depends\sweetalert\SweetalertAsset',
        //'grozzzny\depends\toastr\ToastrAsset',
        'grozzzny\depends\owl_carousel\OwlAsset',
        'grozzzny\depends\sticky\StickyAsset',
        'grozzzny\depends\scrollreveal\ScrollRevalAsset',
        //'grozzzny\depends\wow_animations\WowAnimationsAsset',
        'grozzzny\depends\fancybox\FancyboxAsset',
        'grozzzny\depends\checkbox_theme\CheckboxThemeAsset',
    ];
}