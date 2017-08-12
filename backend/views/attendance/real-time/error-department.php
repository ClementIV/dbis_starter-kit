<?php

use yii\helpers\Html;
use yii\jui\Dialog;

/* @var $this yii\web\View */
/* @var $model backend\models\AtdLeaveEarly */

$this->title = $department.' '.Yii::t('backend', 'Real-time state', [
     'modelClass' => 'view info',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Real-time state'),];
$this->params['breadcrumbs'][] = $this->title;
// $this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
$this->registerCssFile('@web/css/attendance/check-in-today/info.css', ['depends' => ['backend\assets\BackendAsset']]);?>
<div style="width:50%;">
        <?php
            Dialog::begin([
                'clientOptions' => [
                    'modal' => true,
                    'closeOnEscape'=>true,
                    'title'=>$this->title,
                    'closeText'=>'close',
                    'dialogClass'=>'panel panel-orange',
                    'draggable'=>false,
                    'width'=>'40%'
                ],
                'clientEvents'=>[
                    'close'=> 'function(){location.href="index?department=530";}',
                ],

            ]);
        ?>
        <div style="width:98%;height:90%;">
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
                        <i class='fa fa-info'> <?php echo Yii::t('backend','Please select the correct department number');?></i>
                        <br>
                        <br>
                        <i class='fa fa-info'> <?php echo Yii::t('backend','Please add this department');?></i>
                    </p>
                    <p style="text-align:center;">
                        <?php echo Html::a(Yii::t('backend', 'Confirm'), ['index?department=530'], ['class' => 'btn btn-primary']) ?>
                    </p>
                </div>
            </div>
        </div>
        <?php
            Dialog::end();
        ?>
</div>
