<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdMonthAttendance */

$this->title = $model->caid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Atd Month Attendances'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atd-month-attendance-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->caid], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->caid], [
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
            'caid',
            'uid',
            'atd_date',
            'morning_in',
            'morning_early_leave',
            'morning_late',
            'afternoon_in',
            'afternoon_late',
            'afternoon_ealy_leave',
        ],
    ]) ?>

</div>
