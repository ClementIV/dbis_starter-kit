<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdUser */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="atd-user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'uid')->textInput() ?>

    <?php echo $form->field($model, 'did')->dropDownList($dept);  ?>

    <?php echo $form->field($model, 'ccid')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'pwd')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'auth')->dropDownList(['0'=>Yii::t('backend','Common User'),'14'=>Yii::t('backend','Manager')]) ?>

    <?php echo $form->field($model, 'state')->textInput() ?>

    <?php echo $form->field($model, 'checkin')->dropDownList(['0'=>Yii::t('backend','Checkout'),'1'=>Yii::t('backend','Checkin')]); ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
