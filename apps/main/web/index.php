<?php

// comment out the following two lines when deployed to production

defined('LOCALHOST') or define('LOCALHOST', in_array($_SERVER['REMOTE_ADDR'], ['127.0.0.1','::1']));
defined('YII_DEBUG') or define('YII_DEBUG', LOCALHOST);
defined('YII_ENV') or define('YII_ENV', 'dev');

require __DIR__ . '/../../../vendor/autoload.php';
require __DIR__ . '/../../../vendor/yiisoft/yii2/Yii.php';

$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/../../common/config/web.php'),
    require(__DIR__ . '/../config/web.php')
);

(new yii\web\Application($config))->run();