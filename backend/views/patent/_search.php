<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\query\PatentQuery */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="patent-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'patent_id') ?>

    <?php echo $form->field($model, 'project_id') ?>

    <?php echo $form->field($model, 'title') ?>

    <?php echo $form->field($model, 'inventors') ?>

    <?php echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'application_date') ?>

    <?php // echo $form->field($model, 'authorization_date') ?>

    <?php // echo $form->field($model, 'application_number') ?>

    <?php // echo $form->field($model, 'patent_number') ?>

    <?php // echo $form->field($model, 'attachment') ?>

    <div class="form-group">
        <?php echo Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
