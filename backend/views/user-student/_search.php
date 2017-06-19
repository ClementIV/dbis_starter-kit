<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\UserTeacherSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="user-student-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'userid') ?>

    <?php echo $form->field($model, 'student_id') ?>

    <?php echo $form->field($model, 'grade') ?>

    <?php echo $form->field($model, 'teacherid') ?>

    <?php echo $form->field($model, 'direction') ?>

    <?php // echo $form->field($model, 'graduation') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'recommend') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
