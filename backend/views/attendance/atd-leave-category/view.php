<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdleaveCategory */

$this->title = $model->cid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Atdleave Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atdleave-category-view">

    <p>
        <?php echo Html::a(Yii::t('backend', 'Update'), ['update', 'id' => $model->cid], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('backend', 'Delete'), ['delete', 'id' => $model->cid], [
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
            'cid',
            'category',
            [
                'attribute'=>'agree',
                'format'=>'raw',
                'value'=> function($data){
                    if($data->agree ==0){
                        return Yii::t('backend','No');
                    }
                    return Yii::t('backend','Yes');
                }
            ],
        ],
    ]) ?>

</div>
