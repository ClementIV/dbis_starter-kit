<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdleaveCategory */

$this->title = Yii::t('backend', 'leave Categories', [
    'modelClass' => 'Atdleave Category',
]) . ' ' . $model->cid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'ministry of interior')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'leave Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->cid, 'url' => ['view', 'id' => $model->cid]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="atdleave-category-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
