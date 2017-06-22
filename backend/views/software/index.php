<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\SoftwareQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Softwares';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Software', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'softid',
            'name',
            'author',
            'finishtime',
            'regisnumber',
            // 'enclosure',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
