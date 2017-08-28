<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Atd Month Attendances');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atd-month-attendance-index">


    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Atd Month Attendance',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'caid',
            'uid',
            'atd_date',
            'morning_in',
            'morning_early_leave',
            'morning_late',
            'afternoon_in',
            'afternoon_late',
            'afternoon_ealy_leave',
            // 'work_time:datetime',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
