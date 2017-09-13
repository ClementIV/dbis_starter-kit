<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\DeviceInformation */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => yii::t('backend','Device Information'),
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Device Information'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->diid]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="device-information-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
