<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdMonthAttendance */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="atd-month-attendance-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'uid')->textInput() ?>

    <?php echo $form->field($model, 'atd_date')->textInput() ?>

    <?php echo $form->field($model, 'morning_in')->textInput() ?>

    <?php echo $form->field($model, 'morning_early_leave')->textInput() ?>

    <?php echo $form->field($model, 'morning_late')->textInput() ?>

    <?php echo $form->field($model, 'afternoon_in')->textInput() ?>

    <?php echo $form->field($model, 'afternoon_late')->textInput() ?>

    <?php echo $form->field($model, 'afternoon_ealy_leave')->textInput() ?>    

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
