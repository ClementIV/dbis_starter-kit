<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Device Informations');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="device-information-index">


    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Device Information',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'diid',
            'deparment',
            'student_id',
            'uid',
            'seat_number',
            // 'host',
            // 'host_number',
            // 'SSD',
            // 'monitor_number1',
            // 'monitor_type1',
            // 'monitor_size1',
            // 'monitor_number2',
            // 'monitor_type2',
            // 'monitor_size2',
            // 'ip',
            // 'MAC',
            // 'update',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
