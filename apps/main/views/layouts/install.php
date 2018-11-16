<?php
use yii\web\View;

/**
 * @var View $this
 */

\main\assets\AppBootstrap3Asset::register($this);
$this->registerCssFile('/css/page-install.css');
?>

<?php $this->beginContent('@main/views/layouts/base.php'); ?>
<div class="container" id="page-install">
    <div class="row text-center">
        <h1>Welcome to <a href="http://easyiicms.com" target="_blank">EasyiiCMS</a> installation</h1>
    </div>
    <br/>
    <?= $content ?>
</div>
<?php $this->endContent(); ?>