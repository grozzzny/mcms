<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'main',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'main\controllers',
    'bootstrap' => ['admin'],
    'layoutPath' => '@main/views/layouts',
    //'layoutPath' => '@main/layoutsBootstrap4/layouts',
    //'layoutPath' => '@main/layoutsMDBootstrap4/layouts',
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'a6gS1b1c-gQ6sfv7xdfgMC78dT4',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'view' => [
            'class' => '\rmrevin\yii\minify\View',
            'theme' => [
                'pathMap' => [
                    '@vendor/grozzzny/easyii2/views' => [
                        '@app/views/easyii2'
                    ],
                ],
            ],
            'enableMinify' => !LOCALHOST,
            'concatCss' => true, // concatenate css
            'minifyCss' => true, // minificate css
            'concatJs' => true, // concatenate js
            'minifyJs' => true, // minificate js
            'minifyOutput' => true, // minificate result html page
            'webPath' => '@web', // path alias to web base
            'basePath' => '@webroot', // path alias to web base
            'minifyPath' => '@webroot/minify', // path alias to save minify result
            'forceCharset' => 'UTF-8', // charset forcibly assign, otherwise will use all of the files found charset
            'expandImports' => true, // whether to change @import on content
            'compressOptions' => ['extra' => true], // options for compress
            'excludeFiles' => [],
            'excludeBundles' => [],
        ],
        'db' => $db,
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'normalizer' => [
                'class' => 'yii\web\UrlNormalizer',
                'collapseSlashes' => true
            ],
            'rules' => [
                '<page_slug:example_1|example_2|example_3>' => 'page/index',

                '<controller:\w+>/view/<slug:[\w-]+>' => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>' => '<controller>/<action>',
                '<controller:\w+>/cat/<slug:[\w-]+>' => '<controller>/cat',

                //admin
                'admin/<controller:\w+>/<action:[\w-]+>/<id:\d+>' => 'admin/<controller>/<action>',
                'admin/<module:\w+>/<controller:\w+>/<action:[\w-]+>/<id:\d+>' => 'admin/<module>/<controller>/<action>'
            ],
        ],
        'assetManager' => [
            // uncomment the following line if you want to auto update your assets (unix hosting only)
            //'linkAssets' => true,
            'appendTimestamp' => true,
            'forceCopy' => false,
            'bundles' => [
                'yii\web\JqueryAsset' => [
                    'js' => [YII_DEBUG ? 'jquery.js' : 'jquery.min.js'],
                ],

                'yii\bootstrap\BootstrapAsset' => [
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'css' => ['css/bootstrap3/bootstrap.css'],
                ],

                'yii\bootstrap\BootstrapPluginAsset' => [
                    'js' => [YII_DEBUG ? 'js/bootstrap.js' : 'js/bootstrap.min.js'],
                ],

                'grozzzny\depends\bootstrap4\Bootstrap4Asset' => [
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'css' => ['css/bootstrap4/bootstrap.css'],
                ],

                'grozzzny\depends\mdbootstrap\MDBootstrapAsset' => [
                    'basePath' => '@webroot',
                    'baseUrl' => '@web',
                    'css' => ['css/mdbootstrap/mdb.css'],
                ],

                'grozzzny\depends\mdbootstrap\MDBootstrapPluginAsset' => [
                    'chart' => true,
                    'enhancedModals' => true,
                    'formsFree' => true,
                    'jqueryEasing' => true,
                    'scrollingNavbar' => true,
                    'velocity' => true,
                    'waves' => true,
                    'wow' => true,
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'yii\easyii2\models\Admin',
            'enableAutoLogin' => true,
            'authTimeout' => 1552000,
        ],
        'i18n' => [
            'translations' => [
                'easyii2' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'sourceLanguage' => 'en-US',
                    'basePath' => '@easyii2/messages',
                    'fileMap' => [
                        'easyii2' => 'admin.php',
                    ]
                ]
            ],
        ],
        'formatter' => [
            'sizeFormatBase' => 1000
        ],
    ],
    'modules' => [
        'admin' => [
            'class' => 'common\modules\AdminModule',
            'modules' => [
                'page' => 'yii\easyii2\modules\page\PageModule',
                'partners' => 'grozzzny\partners\PartnersModule',
                'editable' => 'grozzzny\editable\Module',
                'catalog' => [
                    'class' => 'grozzzny\catalog\CatalogModule',
                    'settings' => [
                        'modelCategory' => '\main\models\Category',
                        'modelItem' => '\main\models\Item',
                    ]
                ],
                'sitemap' => 'grozzzny\sitemap\Module',
                'soclink' => 'grozzzny\soc_link\SocLinkModule'
            ]
        ],
    ],
    //coming_soon
    'on beforeAction' => function() {
        if(isset($_GET['open'])){
            setcookie("dev","true",time() + 30*24*60*60);
            exit('<html><head><meta http-equiv="refresh" content="0;/"></head><body></body></html>');
        }
    },
    'params' => $params,
];

/**
 * Заглушка
 */
if (empty($_COOKIE['dev'])) {
    $config['modules']['coming_soon'] = [
        'class' => 'grozzzny\coming_soon\ComingSoonModule',
        'settings' => [
            'background' => '/images/JkchpZ_15020826211.jpg',
            'title' => 'Интерактивная платформа',
            'heading' => 'Сайт находится в разработке',
            'descriptions' => 'Мы идем в ногу со временем и поэтому предлагаем вам самые актуальные решения в области веба. Да, мы просто делаем свое дело хорошо.',
            'address' => 'Калининград',
            'phone' => '+7 (911) 458-71-42',
            'email' => 'info@pr-kenig.ru',
            'expiryDate' => '2019/11/30',
            'copyright' => 'The Project. All rights reserved.',
        ]
    ];
    $config['catchAll'] = ['coming_soon'];

    //debug off
    $key = array_search('debug', $config['bootstrap']);
    unset($config['bootstrap'][$key]);
}

return $config;
