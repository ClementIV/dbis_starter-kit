<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserTeacher */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="user-teacher-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'userid')->textInput() ?>

    <?php echo $form->field($model, 'teacher_id')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'degree')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'telephone')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'direction')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'project')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'achievement')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'plurality')->textarea(['rows' => 6]) ?>

    <?php echo $form->field($model, 'office')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->textInput() ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
