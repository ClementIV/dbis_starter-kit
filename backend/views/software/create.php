<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\Software */

$this->title = '插入软件著作权';
$this->params['breadcrumbs'][] = ['label' => '软件著作权', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
