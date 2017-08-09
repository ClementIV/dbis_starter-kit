<?php

use yii\helpers\Html;
use backend\assets\BackendAsset;
use backend\widgets\Menu;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdLate */

$this->title = Yii::t('backend', 'Apply Late', [
    'modelClass' => 'Atd Late',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', '申请迟到早退'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$this->registerCssFile('@web/css/attendance/check-in-today/info.css', ['depends' => ['backend\assets\BackendAsset']]);
?>

    <div class="panel-body pan">
            <?php echo $this->render('_form', [
                'model' => $model,
                'info' =>$info,
            ]) ?>
    </div>
