<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdUser */

$this->title = $model->uid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Attendance users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atd-user-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->uid], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->uid], [
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
            'uid',
            'deptname',
            'ccid',
            'pwd',
            [
                'attribute'=>'auth',
                'format'=>'raw',
                'value'=> function($data){
                    if($data->state ==0){
                        return Yii::t('backend','Common User');
                    }
                    return Yii::t('backend','Manager');
                }
            ],
            'state',
            [
                'attribute'=>'chechin',
                'format'=>'raw',
                'value'=> function($data){
                    if($data->state ==1){
                        return Yii::t('backend','Checkin');
                    }
                    return Yii::t('backend','Checkout');
                }
            ],
        ],
    ]) ?>

</div>
