<?php
namespace main\modules\mymodule;

use Yii;
use yii\easyii2\components\FastModule;

class Module extends FastModule
{
    public $settings = [
        'modelMyModel' => '\main\modules\mymodule\models\MyModel',
    ];
    public $title = 'My model';
    public $icon = 'file';

    public function getTitle()
    {
        // TODO: Implement getTitle() method.
        return Yii::t('app', $this->title);
    }

    public function getName()
    {
        // TODO: Implement getName() method.
        return $this->id;
    }

    public function getIcon()
    {
        // TODO: Implement getIcon() method.
        return $this->icon;
    }
}