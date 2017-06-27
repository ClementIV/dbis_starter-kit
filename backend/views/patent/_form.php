<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Patent */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="patent-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'project_id')->textInput() ?>

    <?php echo $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'inventors')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'application_date')->textInput() ?>

    <?php echo $form->field($model, 'authorization_date')->textInput() ?>

    <?php echo $form->field($model, 'application_number')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'patent_number')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'attachment')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? '插入' : '更改', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
