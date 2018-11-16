<?php
$params = array_merge(
    require(__DIR__ . '/../../common/config/params.php'),
    require(__DIR__ . '/../../common/config/params-local.php'),
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);

$db = require __DIR__ . '/../../main/config/db.php';

$config = [
    'id' => 'admin',
    'basePath' => dirname(__DIR__),
    'controllerNamespace' => 'yii\easyii2\controllers',
    'defaultRoute' => 'default',
    'bootstrap' => ['admin'],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'a6grtygQ6sfv7xdfgMC14578dT4',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => LOCALHOST,
            'viewPath' => '@main/mail'
            //'transport' => require __DIR__ . '/smtp.php'
        ],
        'view' => [
            'class' => '\rmrevin\yii\minify\View',
            'theme' => [
                'pathMap' => [
                    '@admin/views' => [
                        '@vendor/grozzzny/easyii2/views',
                    ],
                    '@vendor/grozzzny/easyii2/views' => [
                        '@admin/views'
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
            'basePath' => '@vendor/grozzzny/easyii2',
            'controllerNamespace' => 'yii\easyii2\controllers',
            'consoleConfig' => '@console/config/console.php',
            'modules' => [
                'page' => 'yii\easyii2\modules\page\PageModule',
                'partners' => 'grozzzny\partners\PartnersModule',
                'editable' => 'grozzzny\editable\Module',
                'catalog' => [
                    'class' => 'grozzzny\catalog\CatalogModule',
                    'settings' => [
                        'modelCategory' => '\admin\models\Category',
                        'modelItem' => '\admin\models\Item',
                    ]
                ],
                'sitemap' => 'grozzzny\sitemap\Module',
                'soclink' => 'grozzzny\soc_link\SocLinkModule'
            ]
        ],
    ],
    'params' => $params,
];

return $config;
