<?php
/* @var $this yii\web\View */

use common\models\UserTeacher;
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use trntv\filekit\widget\Upload;
use kartik\select2\Select2;

?>
<h1>user-teacher/teacherform</h1>

<div class="user-profile-form">

    <?php $form = ActiveForm::begin(); ?>


    <?php echo $form->field($model, 'teacher_id')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'telephone')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'degree')->dropDownlist(Yii::$app->params['availableDegrees']) ?>

    <?php echo $form->field($model, 'title')->dropDownlist(Yii::$app->params['availableTitles']) ?>

    <?php echo $form->field($model, 'direction')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'office')->textInput(['maxlength' => 255]) ?>

    <?php echo $form->field($model, 'plurality')->textInput(['maxlength' => 255]) ?>
    <?php echo $form->field($model, 'project')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options' => [
                'minHeight' => 400,
                'maxHeight' => 400,
                'buttonSource' => true,
                'convertDivs' => false,
                'removeEmptyTags' => false,
                'imageUpload' => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'achievement')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options' => [
                'minHeight' => 400,
                'maxHeight' => 400,
                'buttonSource' => true,
                'convertDivs' => false,
                'removeEmptyTags' => false,
                'imageUpload' => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'course')->widget(
        \yii\imperavi\Widget::className(),
        [
            'plugins' => ['fullscreen', 'fontcolor', 'video'],
            'options' => [
                'minHeight' => 400,
                'maxHeight' => 400,
                'buttonSource' => true,
                'convertDivs' => false,
                'removeEmptyTags' => false,
                'imageUpload' => Yii::$app->urlManager->createUrl(['/file-storage/upload-imperavi'])
            ]
        ]
    ) ?>

    <?php echo $form->field($model, 'tagid')->widget(Select2::classname(), [
        'data' => $taglist,
        'options' => ['multiple' => true,'placeholder' => '请选择 ...'],
    ]);
    $model?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('backend', 'Update'), ['class' => 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
