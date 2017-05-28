<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div style="width:50em;padding:0 ;position:relative;  left:6em; text-align: left;">
<div class="row" >
      <div class="col-lg-5">

  <? $form =ActiveForm::begin(['id' => 'form-CreateDatabase']);?>
          <?echo $form->field($model, 'dbserver')->textInput(['autofocus' => true,'value'=>'localhost']);?>
          <?= $form->field($model,'dbname');?>
          <?echo $form->field($model, 'user');?>
          <?echo  $form->field($model, 'password')->passwordInput();?>
          <?=$form->field($model,'prefix')->textInput(['value'=>'yii_']);?>
          <?echo  $form->field($model, 'Overwrite')->inline()->RadioList(['1'=>'Yes','2'=>'No'],['class'=>'CreateDatabase']);?>


          <div class="form-group">
            <?=Html::submitButton("Submit", ["class" => "btn btn-primary", "name" => "submit-button"]);?>
          </div>
          <? ActiveForm::end();?>
    </div>
</div>
</div>
