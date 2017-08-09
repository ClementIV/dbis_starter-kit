<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdLate */
/* @var $form yii\bootstrap\ActiveForm */
?>
<div style="width:50%;height:80%;">
    <div class="panel panel-green">
        <div class="panel-heading">
            <?php echo Yii::t('backend', 'Apply Late') ?>
        </div>
        <div class="panel-body pan">
            <div class="atd-late-form">

            <?php $form = ActiveForm::begin(); ?>

            <?php echo $form->errorSummary($model); ?>

            <?php echo $form->field($model, 'uid')->textInput(['value'=>$info['uid'],'readonly'=>true,])  ?>
            <?php echo $form->field($model, 'date')->widget(\yii\jui\DatePicker::classname(), [
                //'language' => 'ru',
                //
                'options' => ['style'=>"width:100%",],
                'dateFormat' => 'yyyy-MM-dd',
            ]);?>
            <?php //echo $form->field($model, 'date')->textInput() ?>

            <?php echo $form->field($model, 'category')->dropDownList(['1'=>'上午','2'=>'下午']); ?>

                <div class="form-group">
                    <?php echo Html::submitButton($model->isNewRecord ? Yii::t('backend', 'Apply') : Yii::t('backend', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

            <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
