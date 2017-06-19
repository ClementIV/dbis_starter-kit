<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\UserTeacherSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'User Students';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-student-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a('Create User Student', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'userid',
            'userProfile.name',
            'grade',
            'teacherid',
            'direction',
            // 'graduation',
            // 'status',
            // 'recommend:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
