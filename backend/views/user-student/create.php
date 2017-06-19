<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserStudent */

$this->title = 'Create User Student';
$this->params['breadcrumbs'][] = ['label' => 'User Students', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-student-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
