<?php
/**
 * @var $this yii\web\View
 * @var $model common\models\Article
 */
use yii\helpers\Html;

?>


<a href="#" class="swiper-slide" data-src="http://placehold.it/300x200" data-head="Beeznees">
    <div class="image-container image-container--border">
        <img src="<?php echo $model->getAvatar()?>">
    </div>
</a>
