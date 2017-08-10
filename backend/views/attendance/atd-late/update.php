<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdLate */

$this->title = Yii::t('backend', 'Apply Late', [
    'modelClass' => 'Atd Late',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Apply Late'), 'url' => ['create']];
// $this->params['breadcrumbs'][] = ['label' => $model->lid, 'url' => ['view', 'id' => $model->lid]];
// $this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
$this->registerCssFile('@web/css/attendance/check-in-today/info.css', ['depends' => ['backend\assets\BackendAsset']]);
?>

<div class="atd-late-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'info' =>$info,
    ]) ?>

</div>
