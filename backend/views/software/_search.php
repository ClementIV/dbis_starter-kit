<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\query\SoftwareQuery */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="software-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'softid') ?>

    <?php echo $form->field($model, 'name') ?>

    <?php echo $form->field($model, 'author') ?>

    <?php echo $form->field($model, 'finishtime') ?>

    <?php echo $form->field($model, 'regisnumber') ?>

    <?php // echo $form->field($model, 'enclosure') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
