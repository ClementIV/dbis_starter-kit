<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\Software */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '软件著作权', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-view">

    <p>
        <?php echo Html::a('更改', ['update', 'id' => $model->softid], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a('删除', ['delete', 'id' => $model->softid], [
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
            'softid',
            'name',
            'author',
            'finishtime',
            'regisnumber',
            'enclosure',
            [
                'attribute'=>'attachments',
                'format'=>'raw',
                'value'=> function($data){
                //     if(!empty($data->attachments)){
                //     foreach ($data->attachments as $key => $value) {
                //         return $value;
                //     }
                // }
                //
                return "<a herf='baidu.com'>aa</>";
                    //return $data->attachments;
                }
            ],
        ],
    ]) ?>

</div>
