<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdLate */

$this->title = Yii::t('backend', 'Update {modelClass}: ', [
    'modelClass' => 'Atd Late',
]) . ' ' . $model->lid;
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Atd Lates'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->lid, 'url' => ['view', 'id' => $model->lid]];
$this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
?>
<div class="atd-late-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
