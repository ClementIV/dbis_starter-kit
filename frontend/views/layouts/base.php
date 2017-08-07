<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
    <div class="wrap">
        <?php
        NavBar::begin([
            /*'brandLabel' => Yii::$app->name,*/
            'brandLabel' => '<img class="logo" src="'.yii::getAlias('@frontendUrl').'/css/images/logo-sm.png"> &nbsp;&nbsp; 南开大学数据库与信息系统实验室<br><br>
                            <div style="padding-left:6em;">DBIS, Nankai University</div></img>',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'z-nav',
                'style'=>'margin-top:0px'
            ],
        ]); ?>
        <?php echo Nav::widget([
            'options' => ['class' => 'z-nav__list'],
            'items' => [
                ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index'],'options' => ['class' => 'z-nav__item'],'linkOptions' => ['class' => 'z-nav__link']],
                ['label' => Yii::t('frontend', 'teacherList'), 'url' => ['/user-teacher/index'],'options' => ['class' => 'z-nav__item'],'linkOptions' => ['class' => 'z-nav__link']],
                ['label' => Yii::t('frontend', 'Articles'), 'url' => ['/article/index'],'options' => ['class' => 'z-nav__item'],'linkOptions' => ['class' => 'z-nav__link']],
                ['label' => Yii::t('frontend', 'Project'), 'url' => ['/project/index'],'options' => ['class' => 'z-nav__item'],'linkOptions' => ['class' => 'z-nav__link']],
                [
                    'childOptions'=>['class' => 'z-nav__list-secondary'],
                    'label' => '实验室生活',
                    'items'=>[
                        [
                            'label' => '学术活动',
                            'url' => ['/life/index'],
                            'options' => ['class' => 'z-nav__item'],
                            'linkOptions' => ['class' => 'z-nav__link']
                        ],
                        [
                            'label' => '文体活动',
                            'url' => ['/life/sports'],
                            'options' => ['class' => 'z-nav__item'],
                            'linkOptions' => ['class' => 'z-nav__link']
                        ],
                        [
                            'label' => '娱乐活动',
                            'url' => ['/life/entertainment'],
                            'options' => ['class' => 'z-nav__item'],
                            'linkOptions' => ['class' => 'z-nav__link']
                        ]
                    ]
                    ,'options' => ['class' => 'z-nav__item']
                    ,'linkOptions' => ['class' => 'z-nav__link']
                ],
                ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/user/sign-in/signup'],'visible'=>env('USER_REGISTER'), 'options' => ['class' => 'z-nav__item'],'linkOptions' => ['class' => 'z-nav__link']],
                ['label' => Yii::t('frontend', 'Login'), 'url' =>  ['/user/sign-in/login'], 'visible'=>env('USER_REGISTER'),'options' => ['class' => 'z-nav__item'],'linkOptions' => ['class' => 'z-nav__link']],
                [
                    'childOptions'=>['class' => 'z-nav__list-secondary'],
                    'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
                    'visible'=>!Yii::$app->user->isGuest,
                    'items'=>[
                        [
                            'label' => Yii::t('frontend', 'Settings'),
                            'url' => ['/user/default/index'],
                            'visible'=>Yii::$app->user->can('student')
                            ,'options' => ['class' => 'z-nav__item']
                            ,'linkOptions' => ['class' => 'z-nav__link']
                        ],
                        [
                            'label' => Yii::t('frontend', 'Backend'),
                            'url' => Yii::getAlias('@backendUrl'),
                            'visible'=>Yii::$app->user->can('loginToBackend')
                            ,'options' => ['class' => 'z-nav__item']
                            ,'linkOptions' => ['class' => 'z-nav__link']
                        ],
                        [
                            'label' => Yii::t('frontend', 'Logout'),
                            'url' => ['/user/sign-in/logout'],
                            'linkOptions' => ['data-method' => 'post','class' => 'z-nav__link']
                            ,'options' => ['class' => 'z-nav__item']
                            ,'linkOptions' => ['class' => 'z-nav__link']
                        ]
                    ]
                    ,'options' => ['class' => 'z-nav__item']
                    ,'linkOptions' => ['class' => 'z-nav__link']
                ]
            ]
        ]); ?>
        <?php NavBar::end(); ?>

        <?php echo $content ?>

    </div>
<script>
    $('.dropdown-menu').addClass('z-nav__list-secondary');
</script>
    <!-- Colored devider -->
    <div class="devider-color bottom-space--m"></div>

    <!-- Footer section -->
    <footer class="footer">
        <div class="container">

            <div class="row">

                <!-- Latest post -->
               <!-- <div class="col-sm-4">
                    <h3 class="heading-info">Latest from blog:</h3>

                    <div class="row">
                        <div class="col-xs-6 col-sm-12 one-column">
                            <article class="post post--latest">
                                <h3 class="not-visible">Latest post</h3>
                                <a class="post__images" href="single-post.html">
                                    <img src="http://placehold.it/160x160" alt="">
                                </a>
                                <a class="post__text" href="single-post.html">Mauris orci purus, ultrices dapibus justo non, eleifend consequat lorem. </a>
                                <time datetime="2014-07-17" class="post__date">July 17, 2014</time>
                            </article>
                        </div>

                        <div class="col-xs-6 col-sm-12 one-column">
                            <article class="post post--latest">
                                <h3 class="not-visible">Latest post</h3>
                                <a class="post__images" href="single-post.html">
                                    <img src="http://placehold.it/160x160" alt="">
                                </a>
                                <a class="post__text" href="single-post.html">Pellentesque et magna malesuada, scelerisque elit ac, convallis lacus. </a>
                                <time datetime="2014-07-16" class="post__date">July 16, 2014</time>
                            </article>
                        </div>
                    </div>
                </div>-->
                <!-- end latest post -->

                <!-- Contact info about company -->
                <div class="col-sm-4">
                    <h3 class="heading-info heading-info--mobile">联系方式:</h3>
                    <!-- Contact information about company -->
                    <address class="contact-info contact-info--list">
                        <div class="row">
                            <div class="col-xs-6 col-sm-12 one-column">
									<span class="contact-info__item">
										<i class="fa fa-location-arrow"></i>
										计控学院信息东楼530
									</span>
                                <span class="contact-info__item">
										<i class="fa fa-mobile"></i>
										 85358995
									</span>
                            </div>

                            <div class="col-xs-6 col-sm-12 one-column">
									<span class="contact-info__item">
										<i class="fa fa-envelope"></i>
										yuanxiaojie@dbis.nankai.edu.cn
									</span>
                                <span class="contact-info__item">
										<i class="fa fa-skype"></i>
										dbis-support
									</span>
                            </div>
                        </div>
                    </address>
                    <!-- end contact information -->
                </div>
                <!-- end contact info -->

                <!-- Social links -->
                <!--<div class="col-sm-4">
                    <h3 class="heading-info heading-info--mobile">We’re social:</h3>
                    <div class="social social--default">

                        <ul>
                            <li class="social__item"><a class="social__link" href="https://twitter.com/OliaGozha" target="_blank"><i class="social__icon fa fa-twitter"></i></a></li>
                            <li class="social__item"><a class="social__link" href="https://www.facebook.com/olia.gozha" target="_blank"><i class="social__icon fa fa-facebook"></i></a></li>
                            <li class="social__item"><a class="social__link" href="https://plus.google.com/u/0/+OliaGozha/posts" target="_blank"><i class="social__icon fa fa-google-plus"></i></a></li>
                            <li class="social__item"><a class="social__link" href="#" target="_blank"><i class="social__icon fa fa-pinterest"></i></a></li>
                            <li class="social__item"><a class="social__link" href="#" target="_blank"><i class="social__icon fa fa-tumblr"></i></a></li>
                            <li class="social__item"><a class="social__link" href="http://www.linkedin.com/pub/olia-gozha/49/b91/268" target="_blank"><i class="social__icon fa fa-linkedin"></i></a></li>
                            <li class="social__item"><a class="social__link" href="#" target="_blank"><i class="social__icon fa fa-youtube"></i></a></li>
                            <li class="social__item"><a class="social__link" href="#" target="_blank"><i class="social__icon fa fa-github-alt"></i></a></li>
                            <li class="social__item"><a class="social__link" href="#" target="_blank"><i class="social__icon fa fa-flickr"></i></a></li>
                            <li class="social__item"><a class="social__link" href="#" target="_blank"><i class="social__icon fa fa-vimeo-square"></i></a></li>
                            <li class="social__item"><a class="social__link" href="http://dribbble.com/OliaGozha" target="_blank"><i class="social__icon fa fa-dribbble"></i></a></li>
                            <li class="social__item"><a class="social__link" href="#" target="_blank"><i class="social__icon fa fa-stumbleupon"></i></a></li>
                            <li class="social__item"><a class="social__link" href="http://instagram.com/olechka_dumka#" target="_blank"><i class="social__icon fa fa-instagram"></i></a></li>
                            <li class="social__item"><a class="social__link" href="#" target="_blank"><i class="social__icon fa fa-soundcloud"></i></a></li>
                            <li class="social__item"><a class="social__link" href="http://www.behance.net/olia_gozha" target="_blank"><i class="social__icon fa fa-behance"></i></a></li>
                            <li class="social__item"><a class="social__link" href="#" target="_blank"><i class="social__icon fa fa-vine"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div><!-- end row -->

            <div class="copy">
                &copy; DBIS, 2017. All rights reserved.
            </div>

        </div><!-- end container -->
    </footer>
    <!-- end footer section -->
<!--
<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?php /*echo date('Y') */?></p>
        <p class="pull-right"><?php /*echo Yii::powered() */?></p>
    </div>
</footer>-->
<?php $this->endContent() ?>
