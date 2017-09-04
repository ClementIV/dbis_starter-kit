<?php
/* @var $this yii\web\View */
$this->title = "南开大学数据库与信息系统实验室";
?>

<div class="row">
    <div class="col-sm-6">
        <!-- Minimal slider -->
                    <div class="image-container">
                        <img src="<?php if(!empty($model['avatar_base_url']))
                            echo $model['avatar_base_url'] . '/' . $model['avatar_path'];
                        else
                            echo '#'?>" alt="">
                    </div>

        <!-- end minimal slider -->
    </div><!-- end col -->

    <div class="col-md-6">
        <div class="case__info">
            <h3 class="heading-helper"><?php echo $model['name']; ?></h3>
            <ul class="list list--definition">
                <li class="list__item"><span class="list__item-head">学历:</span> <?php echo Yii::$app->params['availableDegrees'][$model['degree']]; ?></li>
                <li class="list__item"><span class="list__item-head">职称:</span> <?php echo Yii::$app->params['availableTitles'][$model['title']]; ?></li>
                <li class="list__item"><span class="list__item-head">研究方向:</span><?php echo $model['direction']; ?></li>
                <li class="list__item"><span class="list__item-head">联系电话:</span> <?php echo $model['telephone']; ?></li>
                <li class="list__item"><span class="list__item-head">电子邮件:</span> <?php echo $model['email']; ?></li>
            </ul>

            <div class="clearfix visible-sm"></div>


        </div>
    </div><!-- end col -->
</div><!-- end row -->

<div class="tabs tabs--minimal devider--middle">
    <!-- Nav tabs -->
    <ul class="nav nav-tabs">
        <li class="active"><a href="#one" data-toggle="tab">项目</a></li>
        <li><a href="#two" data-toggle="tab">荣誉</a></li>
        <li><a href="#three" data-toggle="tab">所授课程</a></li>
    </ul>

    <!-- Tab panes -->
    <div class="tab-content">
        <div class="tab-pane active" id="one">
            <?php echo $model['project']; ?>
        </div>
        <div class="tab-pane" id="two">
            <?php echo $model['achievement']; ?>
        </div>
        <div class="tab-pane" id="three">
            <?php echo $model['course']; ?>
        </div>
    </div>
</div>
