<?
use yii\helpers\Html;
use yii\jui\Accordion;
?>
<?php

/* @var $this yii\web\View */

$this->title = 'Welcome Install';
?>
<?=Html::beginTag('section')?>

<h2>2-Check your Environment</h2>

<nav>
  <ol class="cd-multi-steps text-center custom-icons">
    <li class="visited"><a>Welcome</a></li>
    <li class="current"><em>Check </em></li>
    <li><em> Database </em></li>
    <li><em>Install</em></li>
  </ol>
  <div style="width=80%" align="center">
  <?
  echo Accordion::widget([
      'items' => [
          [
              'header' => 'Check Your Envirment!',
              'content' =>'<li><label>PHP Version:</label> '.Html::encode($phpve)."</li>
                                <li><label>Option System : </label>".Html::encode($os)."</li>
                                <li><label>Free Space :</label>". Html::encode($space).'</li>
                            '

              ,
          ],
          [
              'header' => 'Previous-Next!',
              'content' => '
                        <div align="center">
                          <nav>
                            <ol class="cd-multi-steps text-center">
                              <li class="visited">'.Html::a('Previous',['index'], ['class' => 'link']).'</li>
                              <li class="current">'.Html::a('GO Next',['database'], ['class' => 'link']).'</li>
                            <ol>
                            </nav>
                            </div>
                        ',
          ],

      ],
      'options' => ['tag' => 'div','style' => ['align'=>'right','width' => '70%', 'height' => '300px',],],
      'itemOptions' => ['tag' => 'div','align'=>'center'],
      'headerOptions' => ['tag' => 'h3',],
      'clientOptions' => ['collapsible' =>false],
  ]);
  ?>
  </div>
<nav>

<?=Html::endTag('section');?>
