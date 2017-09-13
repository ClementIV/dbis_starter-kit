<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\DeviceInformation */

$this->title = Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => yii::t('backend','Device Information'),
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Device Information'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-information-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
