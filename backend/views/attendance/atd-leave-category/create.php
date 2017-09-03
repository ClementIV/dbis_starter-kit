<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AtdleaveCategory */

$this->title = Yii::t('backend', 'Create', [
    'modelClass' => 'Atdleave Category',
]).''.Yii::t('backend','leave Categories');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'ministry of interior')];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'leave Categories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atdleave-category-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
