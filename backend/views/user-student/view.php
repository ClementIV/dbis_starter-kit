<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\UserStudent */

$this->title = $model->userid;
$this->params['breadcrumbs'][] = ['label' => 'User Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-student-view">

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
            'student_id',
            'grade',
            'teacherid',
            'direction',
            'graduation',
            'status',
            'recommend:ntext',
        ],
    ]) ?>

</div>
