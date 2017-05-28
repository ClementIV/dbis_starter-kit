<?
/* @var $this yii\web\View */

use yii\jui\Accordion;


use yii\helpers\Html;
$this->title = 'Welcome install';
?>
<!--<table width="400px" background="#9fc5e8" align="center",>-->

<?=Html::beginTag('section')?>

<h2>1-Welcome</h2>

<nav>
  <ol class="cd-multi-steps text-center custom-icons">
    <li class="current"><em>Welcome</em></li>
    <li ><em>Check </em></li>
    <li><em>Database</em></li>

    <li><em>Install </em></li>
  </ol>


<div style="width=80%" align="center">
<?
echo Accordion::widget([
    'items' => [
        [
            'header' => 'Welcome!',
            'content' => '<p>欢迎使用</p>
                            <br>
                            <br><br><br><br><br><br><br><br><br><br><br><br><br><br>
                          <p>作者：fyq</p>

                      ',
        ],
        [
            'header' => 'Previous-Next!',
            'content' => '
                <div align="center">
                  <nav>
                    <ol class="cd-multi-steps text-center custom-icons">
                      <li class="visited">'.Html::a('GO Next',['check-env'], ['class' => 'link']).'</li>
                      <ol>
                      </nav>
                      </div>
                      ',
        ],

    ],
    'options' => ['tag' => 'div','style' => ['align'=>'right','width' => '70%', 'height' => '500px',],],
    'itemOptions' => ['tag' => 'div','align'=>'center'],
    'headerOptions' => ['tag' => 'h3',],
    'clientOptions' => ['collapsible' =>false],
]);
?>
</div>
</nav>

<?=Html::endTag('section');?>
<!--/table>-->

<div class="site-index">


</div>
