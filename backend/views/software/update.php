<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Software */

$this->title = 'Update Software: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Softwares', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->softid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="software-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
