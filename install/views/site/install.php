<?
use yii\helpers\Html;
use yii\jui\ProgressBar;





$this->title = 'Welcome Install';
?>
<?=Html::beginTag('section')?>

<h2>4-Installing</h2>

<nav>
  <ol class="cd-multi-steps text-center custom-icons">
    <li class="visited"><a>Welcome</a></li>
    <li class="visited"><a>Check </a></li>
    <li class="visited"><a>Database</a></li>
    <li class="current"><em>Install</em></li>
  </ol>

  <div align="center" style=" width:80%;height:80%;  ">
  <?
  echo ProgressBar::widget(
  [
     'id'=>'w10',
     'clientOptions'=>[
       //'_refreshValue'=>$val,
     ],
  ]);
  ?>
  </div>
</nav>
<?=Html::endTag('section');?>
