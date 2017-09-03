<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdDepartment */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Atd Department',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Atd Departments'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->did]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="atd-department-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
