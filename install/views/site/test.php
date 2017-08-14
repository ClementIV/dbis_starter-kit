<?php
use yii\helpers\Html;
use yii\jui\ProgressBar;





$this->title = 'Welcome Install';
$content = '$("#p1").progressbar({"value":'.$i.'});';


?>


  <div align="center" style=" width:80%;height:80%;  ">
  <?php
  echo ProgressBar::widget([
      'id'=>'p1',
    ]);
    $this->registerJs($content);
  ?>
  </div>
