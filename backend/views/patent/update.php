<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Patent */

$this->title = '更改专利信息: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Patents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->patent_id]];
$this->params['breadcrumbs'][] = '更改';
?>
<div class="patent-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
