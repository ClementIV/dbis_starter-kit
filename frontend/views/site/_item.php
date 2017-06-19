<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\Article
 */
use yii\helpers\Html;

?>


<div class="col-sm-4 hidden-xs">
    <div class="feature">
        <?php if ($model->thumbnail_path): ?>
            <!--<img src="<?php /*if(!empty($model['thumbnail_base_url']))
                echo $model['thumbnail_base_url'] . '/' . $model['thumbnail_path'];
            else
                echo '#'*/?><!--" alt="" style='width:400px'>-->
            <div class="feature__image" style="height:250px;">
                <?php echo Html::img(
                    Yii::$app->glide->createSignedUrl([
                        'glide/index',
                        'path' => $model['thumbnail_path'],
                        'w' => 400
                    ], true)

                    //,['class' => 'article-thumb img-rounded pull-left']
                ) ?>
            </div>
        <?php endif; ?>
        <h3 class="feature__heading">
            <?php echo Html::a($model->title, ['/article/view', 'slug'=>$model->slug]) ?>
        </h3>
        <p class="feature__info">
            <?php echo Html::a($model->slug) ?>
        </p>
    </div>
</div><!-- end col -->


