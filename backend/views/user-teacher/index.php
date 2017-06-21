<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\TeachertSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Teachers';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-teacher-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create User Teacher', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'userid',
            'userProfile.name',
            'teacher_id',
            'degree',
            'title',
            'telephone',
            // 'direction',
            // 'project:ntext',
            // 'achievement:ntext',
            // 'plurality:ntext',
            // 'office',
            // 'status',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
