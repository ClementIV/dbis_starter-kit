<?php
use backend\assets\BackendAsset;
use backend\widgets\Menu;
use common\models\TimelineEvent;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Breadcrumbs;

$bundle = BackendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">

    	<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro:400,700' rel='stylesheet' type='text/css'>

    	<link rel="stylesheet" href="../web/css/reset.css"> <!-- CSS reset -->
    	<link rel="stylesheet" href="../web/css/style.css"> <!-- Resource style -->
    	<script src="js/modernizr.js"></script> <!-- Modernizr -->
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <?php $this->beginBody() ?>
    <body>
    <div class="wrap">
        <div class="container" >
            <div align="center">
                <?= $content ?>
            </div>
        </div>
    </div>
</body>
<?php $this->endBody() ?>
</html>
<?php $this->endPage() ?>
