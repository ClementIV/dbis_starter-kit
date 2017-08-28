<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdMonthAttendance */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Atd Month Attendance',
]) . ' ' . $model->caid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Atd Month Attendances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->caid, 'url' => ['view', 'id' => $model->caid]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="atd-month-attendance-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
