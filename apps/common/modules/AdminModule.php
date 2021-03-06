<?php
namespace common\modules;



use Yii;
use yii\web\Application;
use yii\web\View;

class AdminModule extends \yii\easyii2\AdminModule
{
    public function init()
    {
        if(!$this->installed) {
            Yii::$app->on(Application::EVENT_BEFORE_ACTION, [$this, 'redirectInstall']);
        }

        parent::init(); // TODO: Change the autogenerated stub
    }

    protected function redirectInstall()
    {
        if(Yii::$app->controller->route == 'site/index'){
            Yii::$app->response->redirect(['install/step1'])->send();
            Yii::$app->end();
        }
    }

    public function bootstrap($app)
    {
        Yii::setAlias('easyii2', '@vendor/grozzzny/easyii2');

        if (!$app->user->isGuest && strpos($app->request->pathInfo, 'admin') === false && Yii::$app->id != 'admin') {
            $app->on(Application::EVENT_BEFORE_REQUEST, function () use ($app) {
                $app->getView()->on(View::EVENT_BEGIN_BODY, [$this, 'renderToolbar']);
            });
        }
    }
}