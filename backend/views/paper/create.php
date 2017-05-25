<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Paper */

$this->title = 'Create Paper';
$this->params['breadcrumbs'][] = ['label' => 'Papers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
