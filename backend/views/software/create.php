<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Software */

$this->title = 'Create Software';
$this->params['breadcrumbs'][] = ['label' => 'Softwares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
