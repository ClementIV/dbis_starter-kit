<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\DeviceInformation */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="device-information-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>
    <?php echo  $form->field($model, 'uid')->textInput(['value' => Yii::$app->user->id,'readonly'=>true]) ?>
    <?php echo $form->field($model, 'deparment')->dropDownList(['1' => '530', '2' => '531','3'=>'532']);  ?>

    <?php echo $form->field($model, 'student_id')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'seat_number')->textInput() ?>

    <?php echo $form->field($model, 'host')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'host_number')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'SSD')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'monitor_number1')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'monitor_type1')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'monitor_size1')->textInput() ?>

    <?php echo $form->field($model, 'monitor_number2')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'monitor_type2')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'monitor_size2')->textInput() ?>

    <?php echo $form->field($model, 'ip')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'MAC')->textInput(['maxlength' => true]) ?>

    <?php  echo $form->field($model, 'update')->textInput(['value'=>date('Y-m-d'),'readonly'=>true,])  ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
