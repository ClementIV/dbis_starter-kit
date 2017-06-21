<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\UserTeacher */

$this->title = 'Create User Teacher';
$this->params['breadcrumbs'][] = ['label' => 'User Teachers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-teacher-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
