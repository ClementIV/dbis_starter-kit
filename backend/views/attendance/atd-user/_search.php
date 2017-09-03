<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\AtduserQuery */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="atd-user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'uid') ?>

    <?php echo $form->field($model, 'did') ?>

    <?php echo $form->field($model, 'ccid') ?>

    <?php echo $form->field($model, 'pwd') ?>

    <?php echo $form->field($model, 'auth') ?>

    <?php // echo $form->field($model, 'state') ?>

    <?php // echo $form->field($model, 'checkin') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
