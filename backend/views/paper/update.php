<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Paper */

$this->title = 'Update Paper: ' . ' ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Papers', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->title, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="paper-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
