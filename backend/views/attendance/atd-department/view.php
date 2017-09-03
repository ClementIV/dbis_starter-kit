<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdDepartment */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'ministry of interior'),];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'department'),'url'=>['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atd-department-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->did], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->did], [
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
            'did',
            'name',
            [
                'attribute'=>'state',
                'format'=>'raw',
                'value'=> function($data){
                    if($data->state ==1){
                        return Yii::t('backend','Disabled');
                    }
                    return Yii::t('backend','Enabled');
                }
            ],
        ],
    ]) ?>

</div>
