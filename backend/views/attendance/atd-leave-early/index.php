<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel backend\models\search\AtdLeaveEarlyQuery */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('backend', 'Atd Leave Earlies');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atd-leave-early-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('backend', 'Create {modelClass}', [
    'modelClass' => 'Atd Leave Early',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'leid',
            'uid',
            'date',
            'category',

            //  ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
