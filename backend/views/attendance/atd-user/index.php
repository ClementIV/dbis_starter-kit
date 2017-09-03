<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\grid\SerialColumn;
use yii\grid\CheckboxColumn;
use yii\grid\DataColumn;
use yii\helpers\Url;
/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AtduserQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Attendance users');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'ministry of interior')];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atd-user-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', Yii::t('backend','Create').$this->title, [
    'modelClass' => 'View Info',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php //print_r( $dataProvider);
     echo GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => SerialColumn::className(),'header'=>Html::a(Yii::t('backend','Order'),[Url::to('index')])],
            'uid',
            [   'header' =>Html::a(Yii::t('backend','real_name'),[Url::to('index')]),
                'attribute'=>'real_name',
                'enableSorting'=>true,
            ],
            'ccid',
            [   'header' =>Html::a(Yii::t('backend','department'),[Url::to('index')]),
                'attribute'=>'deptname',
                'enableSorting'=>true,
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
