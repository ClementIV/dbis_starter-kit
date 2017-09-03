<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdleaveCategory */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="atdleave-category-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'category')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'agree')->dropDownList(['1'=>Yii::t('backend','Yes'),'0'=>Yii::t('backend','No')]); ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Create') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
