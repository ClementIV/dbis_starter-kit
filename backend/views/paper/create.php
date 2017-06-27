<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Paper */

$this->title = '插入论文';
$this->params['breadcrumbs'][] = ['label' => '论文', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="paper-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
