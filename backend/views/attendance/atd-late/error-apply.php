<?php
use yii\helpers\Html;
use yii\jui\Dialog;
/* @var $this yii\web\View */
/* @var $model backend\models\AtdLate */

$this->title = Yii::t('backend', 'Apply Late', [
    'modelClass' => 'Atd Late',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Apply Late and Early Leave'),];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Apply Late'), 'url' => ['create']];
$this->registerCssFile('@web/css/attendance/check-in-today/info.css', ['depends' => ['backend\assets\BackendAsset']]);?>
<div class="error-apply">
        <?php
            Dialog::begin([
                'clientOptions' => [
                    'modal' => true,
                    'closeOnEscape'=>true,
                    'title'=>Yii::t('backend','Late application exception'),
                    'closeText'=>'close',
                    'dialogClass'=>'panel panel-orange',
                    'draggable'=>false,
                    'width'=>'350px'
                ],
                'clientEvents'=>[
                    'close'=> 'function(){location.href="create";}',
                ],

            ]);
        ?>
        <div style="width:100%;height:90%;">
            <div class="panel panel-orange">
                <div class="panel-heading ">
                    <i class="fa fa-bug" ></i>
                    <?php echo Yii::t('backend', 'Error Message') ?>
                </div>
                <div class="panel-body pan">
                    <?php echo Yii::t('backend','Sorry, please check the following information !');?>
                    <br>
                    <br>
                    <p style="padding-left:2%;">
                        <i class='fa fa-exclamation-circle'> <?php echo Yii::t('backend','Please select the correct date and time interval');?></i>
                        <br>
                        <br>
                        <i class='fa fa-exclamation-circle'> <?php echo Yii::t('backend','Please sign in on the attendance machine first');?></i>
                    </p>
                    <p style="text-align:center;">
                        <?php echo Html::a(Yii::t('backend', 'Confirm'), ['create'], ['class' => 'btn btn-primary']) ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
            Dialog::end();
        ?>
</div>
