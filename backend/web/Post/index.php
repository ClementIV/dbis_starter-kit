<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\PostSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Posts';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="post-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Post', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'summary:ntext',
            'body:ntext',
            'category_id',
            // 'thumbnail_base_url:url',
            // 'thumbnail_path',
            // 'status',
            // 'created_by',
            // 'updated_by',
            // 'published_at',
            // 'created_at',
            // 'updated_at',
            // 'receiveGroup',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
