<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model backend\models\AtdUser */

$this->title = Yii::t('backend', 'Create', [
    'modelClass' => 'Atd User',
]).''.Yii::t('backend', 'Attendance users');
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Attendance users'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="atd-user-create">

    <?php echo $this->render('_form', [
        'model' => $model,
        'dept' => $dept,
    ]) ?>

</div>
