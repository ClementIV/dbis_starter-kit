<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\TeachertSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="user-teacher-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'userid') ?>

    <?php echo $form->field($model, 'teacher_id') ?>

    <?php echo $form->field($model, 'degree') ?>

    <?php echo $form->field($model, 'title') ?>

    <?php echo $form->field($model, 'telephone') ?>

    <?php // echo $form->field($model, 'direction') ?>

    <?php // echo $form->field($model, 'project') ?>

    <?php // echo $form->field($model, 'achievement') ?>

    <?php // echo $form->field($model, 'plurality') ?>

    <?php // echo $form->field($model, 'office') ?>

    <?php // echo $form->field($model, 'status') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
