<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\UserStudent */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="user-student-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'userid')->textInput() ?>

    <?php echo $form->field($model, 'student_id')->textInput() ?>

    <?php echo $form->field($model, 'grade')->textInput() ?>

    <?php echo $form->field($model, 'teacherid')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'direction')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'graduation')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'workplace')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->dropDownlist(Yii::$app->params['availableStudentDegrees']) ?>

    <?php echo $form->field($model, 'recommend')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
