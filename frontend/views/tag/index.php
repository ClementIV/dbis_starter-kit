<?php
/* @var $this yii\web\View */
?>
<h2 class="heading-cascade heading-cascade--danger"><?php echo $model->tagname;?>  搜索结果</h2>
<h2 class="block-title block-title--top-larger">相关教师</h2>
<div class="row animated-blog">
    <?php echo \yii\widgets\ListView::widget([
        'dataProvider'=>$dataProvider[0],
        'pager'=>[
            'hideOnSinglePage'=>true,
        ]
        ,'summary'=>'',
        'itemView'=>'_itemteacher'
    ])?>
    </div>
<h2 class="block-title block-title--top-larger">相关项目</h2>
<div class="row animated-blog">
    <?php echo \yii\widgets\ListView::widget([
        'dataProvider'=>$dataProvider[1],
        'pager'=>[
            'hideOnSinglePage'=>true,
        ]
        ,'summary'=>'',
        'itemView'=>'_itemproject'
    ])?>
</div>