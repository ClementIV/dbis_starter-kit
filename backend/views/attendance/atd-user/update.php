<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdUser */

$this->title = Yii::t('backend', 'Update', [
    'modelClass' => 'Atd User',
]) .''.Yii::t('backend', 'Attendance users'). ' ' . $model->uid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Attendance users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->uid, 'url' => ['view', 'id' => $model->uid]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="atd-user-update">

    <?php echo $this->render('_form', [
        'model' => $model,
        'dept' => $dept,
    ]) ?>

</div>
