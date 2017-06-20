<?
use yii\helpers\Html;
use yii\jui\Accordion;
$this->title = 'congratulation';
?>
<?=Html::beginTag('section')?>

<h2>Congratulation!</h2>

<nav>
  <ol class="cd-multi-steps text-center custom-icons">
    <li class="visited"><a>Welcome</a></li>
    <li class="visited"><a>Check </a></li>
    <li class="visited"><a> Database </a></li>
    <li class="visited"><a>Install</a></li>
  </ol>
  <div style="width=80%" align="center">
  <?
  echo Accordion::widget([
      'items' => [

          [
              'header' => 'congratulation!',
              'content' => '
                        <div align="center">
                          <nav>
                            <ol class="cd-multi-steps text-center">
                              <li >'.Html::a('Frontend',[yii::getAlias('@frontendUrl')], ['class' => 'link']).'</li>
                              <li >'.Html::a('Backend',[yii::getAlias('@backendUrl')], ['class' => 'link']).'</li>
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
