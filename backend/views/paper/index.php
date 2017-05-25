<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\PaperSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Papers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create Paper', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            'author',
            'journalName',
            'publishTime:datetime',
            // 'projectId',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
