<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdLate */
/* @var $form yii\bootstrap\ActiveForm */
?>
<div style="width:75%;padding-left:25%">
    <div class="panel panel-orange" >
        <div class="panel-heading">
            <?php echo Yii::t('backend', 'Apply Late') ?>
        </div>
        <div class="panel-body pan">
            <div class="atd-late-form">

                <?php $form = ActiveForm::begin(); ?>

                <?php echo $form->errorSummary($model); ?>
                <div class="input-icon right">
                    <i class="fa fa-user" ></i>
                    <?php echo $form->field($model, 'uid')->textInput(['value'=>$info['uid'],'readonly'=>true,])  ?>
                </div>
                <div class="input-icon right">
                    <i class="fa fa-clock-o" ></i>
                    <?php echo $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
                    'options' => ['style'=>"width:100%;",],
                    'dateFormat' => 'yyyy-MM-dd',
                    ]);?>
                </div>
                <?php //echo $form->field($model, 'date')->textInput() ?>
                <div class="input-icon right">
                    <i class="fa fa-clock-o" ></i>
                    <?php echo $form->field($model, 'category')->dropDownList(['1'=>'上午','2'=>'下午']); ?>
                </div>
                <div class="form-group" style="text-align:center;">
                    <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Apply') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
