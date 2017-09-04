
<?php
/* @var $this yii\web\View */
use yii\helpers\Url;
$this->title = "南开大学数据库与信息系统实验室";
?>
<div class="container">
<div class="site-index">

    <?php echo \common\widgets\DbCarousel::widget([
        'key'=>'index',
        'options' => [
            'class' => 'slide', // enables slide effect
            'style' => 'width:1000px;margin:auto'
        ],
    ]) ?>

    <section class="container">
        <h2 class="block-title block-title--top-larger">研究方向</h2>

        <div class="row animated-services">
            <div class="one-column col-xs-6 col-md-3">
                <div class="service service--center animated">
                    <div class="icon icon--shape icon--animate icon-present">
                        <div class="icon__item">
                            <i class="livicon" data-name="anchor" data-color="#fff" data-hovercolor="#fff" data-size="42"></i>
                        </div>
                    </div>
                    <a class="service__link" href=<?php echo Url::to(['/tag/index?tagid=1']); ?> >
                        <h3 class="service__heading">机器学习与数据挖掘</h3>
                    </a>
                </div>
            </div>
            <div class="one-column col-xs-6 col-md-3">
                <div class="service service--center animated">
                    <div class="icon icon--shape icon--animate icon-present">
                        <div class="icon__item">
                            <i class="livicon" data-name="heart" data-color="#fff" data-hovercolor="#fff" data-size="42"></i>
                        </div>
                    </div>
                    <a class="service__link" href=<?php echo Url::to(['/tag/index?tagid=2'])?> >
                        <h3 class="service__heading">自然语言处理与情感分析</h3>
                    </a>
               </div>
            </div>

            <div class="one-column col-xs-6 col-md-3">
                <div class="service service--center animated">
                    <div class="icon icon--shape icon--animate icon-present">
                        <div class="icon__item">
                            <i class="livicon" data-name="search" data-color="#fff" data-hovercolor="#fff" data-size="42"></i>
                        </div>
                    </div>
                    <a class="service__link" href= <?php echo Url::to(['/tag/index?tagid=5'])?> >
                        <h3 class="service__heading">信息检索</h3>
                    </a>
                </div>
            </div>
            <div class="one-column col-xs-6 col-md-3">
                <div class="service service--center animated">
                    <div class="icon icon--shape icon--animate icon-present">
                        <div class="icon__item">
                            <i class="livicon" data-name="thumbnails-big" data-color="#fff" data-hovercolor="#fff" data-size="42"></i>
                        </div>
                    </div>
                    <a class="service__link" href=<?php echo Url::to(['/tag/index?tagid=3']); ?> >
                        <h3 class="service__heading">图数据</h3>
                    </a>
                </div>
            </div>

        </div><!-- end row -->
    </section><!-- end container -->


    <h2 class="block-title block-title--bottom">新闻</h2>

    <body>



        <section class="container">
            <h3 class="not-visible">Main conrainer</h3>
            <div class="row">
                <?php echo \yii\widgets\ListView::widget([
                    'dataProvider'=>$dataProvider['data0'],
                   'pager'=>[
                        'hideOnSinglePage'=>true,
                    ]
                    ,'summary'=>'',
                    'itemView'=>'_item'
                ])?>
            </div>
        </section><!-- end container -->

        <div class="number-container bottom-space--small">
            <div class="container">
                <div class="row">
                    <h2 class="block-title block-title--simple" id="number-start">我们的成果</h2>


                    <!-- Brand shape stat view -->
                    <div class="col-xs-6 col-md-3 one-column">
                        <div class="stat stat--shape">
                            <p class="stat__dimension">毕业生</p>
                            <span class="stat__number" data-result="60+" data-value="60">0</span>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xs-6 col-md-3 one-column">
                        <div class="stat stat--shape stat--shape-end">
                            <p class="stat__dimension">学术成果</p>
                            <span class="stat__number" data-result="100+" data-value="100">0</span>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xs-6 col-md-3 one-column">
                        <div class="stat stat--shape">
                            <p class="stat__dimension">纵向课题</p>
                            <span class="stat__number" data-result="10" data-value="10">0</span>
                        </div>
                    </div><!-- end col -->

                    <div class="col-xs-6 col-md-3 one-column">
                        <div class="stat stat--shape last">
                            <p class="stat__dimension">横向课题</p>
                            <span class="stat__number" data-result="20+" data-value="20">0</span>
                        </div>
                    </div><!-- end col -->
                </div><!-- end row -->
            </div><!-- end container -->
        </div>

        <section class="container">
            <h2 class="block-title block-title--top-larger">师资队伍</h2>
        </section>

        <!-- Slider with 2 sides arrow -->
        <div class="full-carousel carousel-present-sm">
            <div class="container">
                <div class="swiper-container carousel-sides">
                    <div class="swiper-wrapper">
                        <?php foreach ($teacherModel as $teacher): ?>
                            <a href=<?php echo Url::to(['/user-teacher/view?id=']).$teacher->user_id?> class="swiper-slide" data-src="http://placehold.it/300x200">
                            <div class="image-container image-container--border">
                                <img src="<?php echo $teacher->getAvatar()?>">
                            </div>
                            </a>
                        <?php endforeach; ?>
                    </div><!--end swiper wrapper-->
                </div><!--end swiper container-->
            </div><!--end swiper container-->

            <div class="leftside-arrow">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="rightside-arrow">
                <i class="fa fa-angle-right"></i>
            </div>
            <!--end swiper controls-->
        </div>
        <!-- end slider with 2 sides arrow -->

        <!--<section class="container" >
            <h2 class="block-title block-title--top-larger">What people Say</h2>
                <div class="content">
                    <ul class="testimonial-wrap">

                        <?php /*foreach ($studentModel as $student): */?>
                            <li class="testimonial">
                                <div class="testimonial__images">
                                    <img src="<?php /*if(!empty($student['avatar_base_url']))
                                        echo $student['avatar_base_url'] . '/' . $student['avatar_path'];
                                    else
                                        echo '#'*/?>" alt="">
                                </div>
                                <p class="testimonial__author"><?php /*echo $model['name']; */?></p>
                                <p class="testimonial__info"><?php /*echo $model['graduation']; */?></p>
                                <p class="testimonial__text"><?php /*echo $model['recommend']; */?></p>
                            </li>
                        <?php /*endforeach; */?>

                        <li class="testimonial">
                            <div class="testimonial__images">
                                <img src="http://placehold.it/160x160" alt="">
                            </div>
                            <p class="testimonial__author">Ashley Spencer</p>
                            <p class="testimonial__info">CEO, Envato</p>
                            <p class="testimonial__text">“Aenean rutrum aliquet odio, ut posuere ante eleifend ac. Donec venenatis diam sapien, malesuada euismod diam rutrum a. ”</p>
                        </li>

                        <li class="testimonial">
                            <div class="testimonial__images">
                                <img src="http://placehold.it/160x160" alt="">
                            </div>
                            <p class="testimonial__author">James Bennett</p>
                            <p class="testimonial__info">CEO, Photodune</p>
                            <p class="testimonial__text">Quisque feugiat facilisis ipsum ut lobortis. Integer hendrerit sodales nisl nec tristique. Aenean commodo sapien ac tellus pharetra, quis tristique mi posuere.</p>
                        </li>

                        <li class="testimonial">
                            <div class="testimonial__images">
                                <img src="http://placehold.it/160x160" alt="">
                            </div>
                            <p class="testimonial__author">Valentino Sorano</p>
                            <p class="testimonial__info">CEO, Themeforest</p>
                            <p class="testimonial__text">“Aenean rutrum aliquet odio, ut posuere ante eleifend ac. Donec venenatis diam sapien, malesuada euismod diam rutrum a. ”</p>
                        </li>

                        <li class="testimonial">
                            <div class="testimonial__images">
                                <img src="http://placehold.it/160x160" alt="">
                            </div>
                            <p class="testimonial__author">Valentino Sorano</p>
                            <p class="testimonial__info">CEO, Themeforest</p>
                            <p class="testimonial__text">Quisque feugiat facilisis ipsum ut lobortis. Integer hendrerit sodales nisl nec tristique. Aenean commodo sapien ac tellus pharetra, quis tristique mi posuere.</p>
                        </li>

                        <li class="testimonial">
                            <div class="testimonial__images">
                                <img src="http://placehold.it/160x160" alt="">
                            </div>
                            <p class="testimonial__author">Valentino Sorano</p>
                            <p class="testimonial__info">CEO, Themeforest</p>
                            <p class="testimonial__text">“Donec euismod turpis id ullamcorper lobortis. Maecenas faucibus ipsum sem, sed consequat ante consectetur non. Nam at neque dui. Integer id risus sit amet justo varius semper quis ut enim.”</p>
                        </li>

                        <li class="testimonial">
                            <div class="testimonial__images">
                                <img src="http://placehold.it/160x160" alt="">
                            </div>
                            <p class="testimonial__author">Ashley Spencer</p>
                            <p class="testimonial__info">CEO, Envato</p>
                            <p class="testimonial__text">“Aenean rutrum aliquet odio, ut posuere ante eleifend ac. Donec venenatis diam sapien, malesuada euismod diam rutrum a. ”</p>
                        </li>

                    </ul>

                </div>
            </section>-->

        <section class="container">
            <h2 class="block-title block-title--top-larger">合作伙伴</h2>
        </section>

        <!-- Slider with 2 sides arrow -->
        <div class="full-carousel carousel-present-sm">
            <div class="container">
                <div class="swiper-container carousel-sides">
                    <div class="swiper-wrapper">

                        <a href="http://www.gbase.cn/" class="swiper-slide col-sm-4 col-md-3" data-src="http://placehold.it/300x200" data-head="南大通用">
                            <div class="image-container image-container--border">
                                <img src=<?php echo yii::getAlias('@storageUrl')."/web/source/1/gbase.png"?> alt="">
                            </div>
                        </a>

                        <!--Slide-->
                        <a href="http://www.10086.cn" class="swiper-slide col-sm-4 col-md-3" data-src="http://placehold.it/300x200" data-head="中国移动">
                            <div class="image-container image-container--border">
                                <img src=<?php echo yii::getAlias('@storageUrl')."/web/source/1/Chinamobile.png"?> alt="">
                            </div>
                        </a>

                        <!--Slide-->
                        <a href="http://www.mobivans.com/" class="swiper-slide col-sm-4 col-md-3" data-src="http://placehold.it/300x200" data-head="摩比数据">
                            <div class="image-container image-container--border">
                                <img src=<?php echo yii::getAlias('@storageUrl')."/web/source/1/mobidata.png"?> alt="">
                            </div>
                        </a>

                        <!--Slide-->
                        <a href="http://www.bonc.com.cn/" class="swiper-slide col-sm-4 col-md-3" data-src="http://placehold.it/300x200" data-head="东方国信">
                            <div class="image-container image-container--border">
                                <img src=<?php echo yii::getAlias('@storageUrl')."/web/source/1/bonc.png" ?> alt="">
                            </div>
                        </a>

                    </div><!--end swiper wrapper-->
                </div><!--end swiper container-->
            </div><!--end swiper container-->

      <!--      <div class="leftside-arrow">
                <i class="fa fa-angle-left"></i>
            </div>
            <div class="rightside-arrow">
                <i class="fa fa-angle-right"></i>
            </div>-->
            <!--end swiper controls-->
        </div>


        <div class="top-scroll"><i class="fa fa-angle-up"></i></div>

    </div>
</div>

</div>
<script>
    $(document).ready(function() {
        numberStart();
        sliderSides();
        scrollSlider();
        fadingSlider();
    });
</script>
