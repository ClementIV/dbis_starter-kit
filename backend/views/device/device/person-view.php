<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\DeviceInformation */

$this->title = $model->name;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-information-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->diid], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->diid], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('backend', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'diid',
            'deparment',
            'student_id',
            'name',
            'seat_number',
            'host',
            'host_number',
            'SSD',
            'monitor_number1',
            'monitor_type1',
            'monitor_size1',
            'monitor_number2',
            'monitor_type2',
            'monitor_size2',
            'ip',
            'MAC',
            'update',
        ],
    ]) ?>

</div>
