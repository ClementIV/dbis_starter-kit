<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AtdDepartment */

$this->title = Yii::t('backend', 'Create', [
    'modelClass' => 'Atd Department',
]).''.Yii::t('backend', 'department');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'ministry of interior')];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atd-department-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
