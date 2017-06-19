<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserStudent */
/* @var $form ActiveForm */
?>
<div class="user-student-update">

    <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'grade') ?>
        <?= $form->field($model, 'teacherid') ?>
        <?= $form->field($model, 'direction') ?>
        <?= $form->field($model, 'graduation') ?>
        <?= $form->field($model, 'workplace') ?>

    
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    <?php ActiveForm::end(); ?>

</div><!-- user-student-update -->
