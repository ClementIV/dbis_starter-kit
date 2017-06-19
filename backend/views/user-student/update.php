<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\UserStudent */

$this->title = 'Update User Student: ' . ' ' . $model->userid;
$this->params['breadcrumbs'][] = ['label' => 'User Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->userid, 'url' => ['view', 'id' => $model->userid]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-student-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
