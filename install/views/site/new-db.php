<?php

  use yii\helpers\Html;
?>
<ul>
<li><label>Overwrite</label>:<?= Html::activeRadioList($model,'Overwrite',['1'=>'yes','2'=>'No'],['class'=>'NewDB']);?></li>
<?= Html::encode($model->Overwrite);?>
</ul>
