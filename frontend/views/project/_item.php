<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\Article
 */
use yii\helpers\Html;
use yii\helpers\Url;
?>


<div class="col-sm-12 col-md-6">

    <article>

            <div class="row">
                <div class="one-column col-xs-6 col-sm-5 col-md-7 col-lg-6">
                    <div class="image-container image-container--max">
                        <a href=<?php echo Url::to(['view','id'=>$model['id']]);?>>
                           <img src="<?php if(!empty($model['thumbnail_base_url']))
                               echo $model['thumbnail_base_url'] . '/' . $model['thumbnail_path'];
                           else
                               echo '#'?>" alt="">
                        </a>
                    </div>
                </div><!-- end col -->
                <div class="one-column col-xs-6 col-sm-7 col-md-5 col-lg-6">
                    <a href=<?php echo Url::to(['view','id'=>$model['id']]);?>>
                       <h3 class="post__heading post__heading--top"><?php echo $model['name']; ?></h3>
                        <p class="post__text"><?php //echo \yii\helpers\StringHelper::truncate($model['introduction'], 150, '...', null, true) ?></p>
                    </a>
                </div><!-- end col -->
            </div><!-- end row -->

    </article><!-- end article -->
</div><!-- end col -->
