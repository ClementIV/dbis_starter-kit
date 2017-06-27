<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Patent */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => '专利', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patent-view">

    <p>
        <?php echo Html::a('更改', ['update', 'id' => $model->patent_id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('删除', ['delete', 'id' => $model->patent_id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'patent_id',
            'project_id',
            'title',
            'inventors',
            'status',
            'application_date',
            'authorization_date',
            'application_number',
            'patent_number',
            'attachment',
        ],
    ]) ?>

</div>
