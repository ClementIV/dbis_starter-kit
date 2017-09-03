<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'department');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'ministry of interior')];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atd-department-index">


    <p>
        <?php echo Html::a(Yii::t('backend', 'Create', [
    'modelClass' => 'Atd Department',
]).''.Yii::t('backend', 'department'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => SerialColumn::className(),'header'=>Html::a(Yii::t('backend','Order'),[Url::to('index')])],
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
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
