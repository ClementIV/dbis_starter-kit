<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdLeaveEarly */

$this->title = Yii::t('backend', 'Apply Early Leave', [
    'modelClass' => 'Atd Leave Early',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Apply Early Leave'), 'url' => ['create']];
// $this->params['breadcrumbs'][] = ['label' => $model->leid, 'url' => ['view', 'id' => $model->leid]];
// $this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
$this->registerCssFile('@web/css/attendance/check-in-today/info.css', ['depends' => ['backend\assets\BackendAsset']]);
?>
<div class="atd-leave-early-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'info' =>$info,
    ]) ?>

</div>
