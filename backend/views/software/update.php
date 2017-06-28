<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\Software */

$this->title = '更改软件著作权信息: ' . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '软件著作权', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->softid]];
$this->params['breadcrumbs'][] = '更改';
?>
<div class="software-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
