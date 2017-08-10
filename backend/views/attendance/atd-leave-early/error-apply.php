<?php
use yii\helpers\Html;
use yii\jui\Dialog;
/* @var $this yii\web\View */
/* @var $model backend\models\AtdLate */

$this->title = Yii::t('backend', 'Apply Early Leave', [
    'modelClass' => 'Atd Late',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Apply Late and Early Leave'),];
$this->params['breadcrumbs'][] = ['label' => Yii::t('backend', 'Apply Early Leave'), 'url' => ['create']];
// $this->params['breadcrumbs'][] = ['label' => $model->lid, 'url' => ['view', 'id' => $model->lid]];
// $this->params['breadcrumbs'][] = Yii::t('backend', 'Update');
$this->registerCssFile('@web/css/attendance/check-in-today/info.css', ['depends' => ['backend\assets\BackendAsset']]);?>
<div style="width:50%;">
        <?php
            Dialog::begin([
                'clientOptions' => [
                    'modal' => true,
                    'closeOnEscape'=>true,
                    'title'=>Yii::t('backend','Leave Early application exception'),
                    'closeText'=>'close',
                    'dialogClass'=>'panel panel-orange',
                    'draggable'=>false,
                    'width'=>'40%'
                ],
                'clientEvents'=>[
                    'close'=> 'function(){location.href="create";}',
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
                        <i class='fa fa-info'> <?php echo Yii::t('backend','Please select the correct date and time interval');?></i>
                        <br>
                        <br>
                        <i class='fa fa-info'> <?php echo Yii::t('backend','Please sign in on the attendance machine first');?></i>
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
