<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AtdMonthAttendance */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Atd Month Attendance',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Atd Month Attendances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atd-month-attendance-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
