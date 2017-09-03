<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'leave Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'ministry of interior')];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atdleave-category-index">


    <p>
        <?php echo Html::a(Yii::t('backend', 'Create', [
    'modelClass' => 'Atdleave Category',
]).' '.Yii::t('backend', 'leave Categories'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => SerialColumn::className(),'header'=>Html::a(Yii::t('backend','Order'),[Url::to('index')])],

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

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
