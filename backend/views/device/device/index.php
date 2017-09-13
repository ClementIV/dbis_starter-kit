<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Device Information');
$this->params['breadcrumbs'][] = $this->title;
$this->registerJsFile('@web/js/export.js', ['depends' => ['backend\assets\BackendAsset']]);
?>



<div class="device-information-index">


    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
            'modelClass' =>yii::t('backend','Device Information'),
        ]), ['create'], ['class' => 'btn btn-success']) ?>
        <?php echo Html::button(

                ' '.yii::t('backend','Export'),

            [
                'class' => 'btn btn-success fa fa-file-excel-o',
                'onclick'=>'method1("device")',
                'style'=>'font-size:15px;padding:8px;'
            ]
            )?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //'diid',
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

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions'=>[
            'id'=>'device',
            'class' =>'table table-striped table-bordered',
        ]
    ]); ?>

</div>
