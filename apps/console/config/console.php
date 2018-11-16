<?php

$params = array_merge(
    require(__DIR__ . '/params.php'),
    require(__DIR__ . '/params-local.php')
);
$db = require __DIR__ . '/../../main/config/db.php';

$root = dirname(__DIR__);

$config = [
    'id' => 'console',
    'basePath' => $root,
    'bootstrap' => ['log'],
    'vendorPath' => dirname(dirname(dirname(__DIR__))) . '/vendor',
    'controllerNamespace' => 'console\controllers',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
        '@console'   => $root,
        '@webroot' => $root,
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
    ],
    'modules' => [
        //'sitemap' => [
        //    'class' => 'grozzzny\sitemap\Module',
        //    'domain' => 'https://my-site.com',
        //    'generatedByLink' => 'http://pr-kenig.ru',
        //    'generatedByName' => 'PRkenig',
        //    'controllerMap' => [
        //        'console' => 'console\controllers\SitemapController'
        //    ]
        //]
    ],
    'params' => $params,
    /*
    'controllerMap' => [
        'fixture' => [ // Fixture generation command line.
            'class' => 'yii\faker\FixtureController',
        ],
    ],
    */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
