<?php
$config = [
    'homeUrl'=> $homeUrl,
    'controllerNamespace' => 'install\controllers',
    'defaultRoute'=>'site/index',
    'controllerMap'=>[
        'file-manager-elfinder' => [
            'class' => 'mihaildev\elfinder\Controller',
            'access' => ['manager'],
            'disabledCommands' => ['netmount'],
            'roots' => [
                [
                    'baseUrl' => '@storageUrl',
                    'basePath' => '@storage',
                    'path'   => '/',
                    'access' => ['read' => 'manager', 'write' => 'manager']
                ]
            ]
        ]
    ],
    'components'=>[
      'errorHandler' => [
        'errorAction' => 'site/error',
      ],
    'request' => [
        'cookieValidationKey' => env('INSTALL_COOKIE_VALIDATION_KEY')
      ],
    'user' => [
        'class'=>'yii\web\User',
        'identityClass' => 'common\models\User',
        'loginUrl'=>['sign-in/login'],
        'enableAutoLogin' => false,
        'as afterLogin' => 'common\behaviors\LoginTimestampBehavior'
    ],
],


];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class'=>'yii\gii\Module',
        'generators' => [
            'crud' => [
                'class'=>'yii\gii\generators\crud\Generator',
                'templates'=>[
                    'yii2-starter-kit' => Yii::getAlias('@install/views/_gii/templates')
                ],
                'template' => 'yii2-starter-kit',
                'messageCategory' => 'install'
            ]
        ]
    ];
}

return $config;
