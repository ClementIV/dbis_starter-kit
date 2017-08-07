
<?
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\jui\Accordion;
?>
<?php

/* @var $this yii\web\View */

$this->title = 'Welcome Install';
?>
<?php echo Html::beginTag('section')?>

<h2>3-Database</h2>

<nav>
  <ol class="cd-multi-steps text-center custom-icons">
    <li class="visited"><a>Welcome</a></li>
    <li class="visited"><a>Check </a></li>
    <li class="current"><em> Database </em></li>
    <li><em>Install</em></li>
  </ol>

<div align="center" style=" width:80%;height:80%;  ">





<?/*
  $from = ActiveForm::begin(['id' => 'form-CreateDatabase']);
  $server=$from->field($model, 'dbserver')->textInput(['autofocus' => true]);
  $user=$from->field($model, 'user');
  $password=$from->field($model, 'password')->passwordInput();
  $overwrite=$from->field($model, 'Overwrite')->inline()->RadioList(['1'=>'yes','2'=>'No'],['class'=>'CreateDatabase']);

  $button= Html::submitButton('Submit', ['class' => 'btn btn-primary', 'name' => 'submit-button']);
  $endFrom=ActiveForm::end();
    */
    echo Accordion::widget([
        'items' => [
            [
                'header' => 'Connect Database !',
                'content' =>'<p style="color: red; font-weight:bold; ">'."$message".'</p>'.$this->render('form',['model'=>$model])
                ,
            ],


        ],
        'options' => ['tag' => 'div','style' => ['width' => '80%', 'height' => '80%',],],
        'itemOptions' => ['tag' => 'div','align'=>'center'],
        'headerOptions' => ['tag' => 'h3',],
        'clientOptions' => ['collapsible' =>true],
    ]);
?>
  </div>
<nav>
  <?php echo Html::endTag('section');?>
