<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Patent */

$this->title = '插入专利';
$this->params['breadcrumbs'][] = ['label' => '专利', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="patent-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
