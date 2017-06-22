<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserTeacher */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'User Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-teacher-view">

    <p>
        <?php echo Html::a('Update', ['update', 'id' => $model->userid], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('Delete', ['delete', 'id' => $model->userid], [
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
            'userid',
            'teacher_id',
            'degree',
            'title',
            'telephone',
            'direction',
            'project:ntext',
            'achievement:ntext',
            'plurality:ntext',
            'office',
            'status',
        ],
    ]) ?>

</div>
