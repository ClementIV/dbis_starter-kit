<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\query\PatentQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '专利';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patent-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('插入专利', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'patent_id',
            'project_id',
            'title',
            'inventors',
            'status',
            // 'application_date',
            // 'authorization_date',
            // 'application_number',
            // 'patent_number',
            // 'attachment',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
