<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Paper */

$this->title = '更改论文信息: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => '论文', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->paper_id]];
$this->params['breadcrumbs'][] = '更改';
?>
<div class="paper-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
