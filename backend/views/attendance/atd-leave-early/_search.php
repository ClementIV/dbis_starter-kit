<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model backend\models\search\AtdLeaveEarlyQuery */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="atd-leave-early-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'leid') ?>

    <?php echo $form->field($model, 'uid') ?>

    <?php echo $form->field($model, 'date') ?>

    <?php echo $form->field($model, 'category') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('backend', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
