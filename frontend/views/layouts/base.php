<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
    <div class="wrap">
        <?php
        NavBar::begin([
            'brandLabel' => Yii::$app->name,
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
                ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/user/sign-in/signup'], 'visible'=>Yii::$app->user->isGuest&&env('USER_REGISTER'),'options' => ['class' => 'z-nav__item'],'linkOptions' => ['class' => 'z-nav__link']],
                ['label' => Yii::t('frontend', 'Login'), 'url' => ['/user/sign-in/login'], 'visible'=>Yii::$app->user->isGuest,'options' => ['class' => 'z-nav__item'],'linkOptions' => ['class' => 'z-nav__link']],
                [
                    'childOptions'=>['class' => 'z-nav__list-secondary'],
                    'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
                    'visible'=>!Yii::$app->user->isGuest,
                    'items'=>[
                        [
                            'label' => Yii::t('frontend', 'Settings'),
                            'url' => ['/user/default/index']
                            ,'options' => ['class' => 'z-nav__item']
                            ,'linkOptions' => ['class' => 'z-nav__link']
                        ],
                        [
                            'label' => Yii::t('frontend', 'Backend'),
                            'url' => Yii::getAlias('@backendUrl'),
                            'visible'=>Yii::$app->user->can('manager')
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

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?php echo date('Y') ?></p>
        <p class="pull-right"><?php echo Yii::powered() ?></p>
    </div>
</footer>
<?php $this->endContent() ?>