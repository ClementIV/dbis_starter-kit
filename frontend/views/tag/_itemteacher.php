<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\Article
 */
use yii\helpers\Html;

?>


<div class="col-sm-12 col-md-6">

    <article>

            <div class="row">
                <div class="one-column col-xs-6 col-sm-5 col-md-7 col-lg-6">
                    <div class="image-container image-container--max">
                        <a href="/user-teacher/view?id=<?php echo $model['userid']?>">
                       <img src="<?php if(!empty($model['avatar_base_url']))
                           echo $model['avatar_base_url'] . '/' . $model['avatar_path'];
                       else
                           echo '#'?>" alt="">
                        </a>
                    </div>
                </div><!-- end col -->
                <div class="one-column col-xs-6 col-sm-7 col-md-5 col-lg-6">
                   <h3 class="post__heading post__heading--top"><?php echo $model['name']; ?></h3>
                    <p class="post__text"><?php echo Yii::$app->params['availableTitles'][$model['title']]; ?></p>
                    <p class="post__text"><?php echo $model['direction']; ?></p>

                </div><!-- end col -->
            </div><!-- end row -->

    </article><!-- end article -->
</div><!-- end col -->




