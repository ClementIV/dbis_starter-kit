<?php
$config = [
    'name'=>'NKU·DBIS',
    'vendorPath'=>dirname(dirname(__DIR__)).'/vendor',
    'extensions' => require(__DIR__ . '/../../vendor/yiisoft/extensions.php'),
    'sourceLanguage'=>'en-US',
    'language'=>'en-US',
    'bootstrap' => ['log'],
    'components' => [

        'authManager' => [
            'class' => 'yii\rbac\DbManager',
            'itemTable' => '{{%rbac_auth_item}}',
            'itemChildTable' => '{{%rbac_auth_item_child}}',
            'assignmentTable' => '{{%rbac_auth_assignment}}',
            'ruleTable' => '{{%rbac_auth_rule}}'
        ],

        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@common/runtime/cache'
        ],

        'commandBus' => [
            'class' => 'trntv\bus\CommandBus',
            'middlewares' => [
                [
                    'class' => '\trntv\bus\middlewares\BackgroundCommandMiddleware',
                    'backgroundHandlerPath' => '@console/yii',
                    'backgroundHandlerRoute' => 'command-bus/handle',
                ]
            ]
        ],

        'formatter'=>[
            'class'=>'yii\i18n\Formatter'
        ],

        'glide' => [
            'class' => 'trntv\glide\components\Glide',
            'sourcePath' => '@storage/web/source',
            'cachePath' => '@storage/cache',
            'urlManager' => 'urlManagerStorage',
            'maxImageSize' => env('GLIDE_MAX_IMAGE_SIZE'),
            'signKey' => env('GLIDE_SIGN_KEY')
        ],

        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            //'useFileTransport' => true,
            'messageConfig' => [
                'charset' => 'UTF-8',
                'from' => env('ADMIN_EMAIL')
            ]
        ],

        'db'=>[
            'class'=>'yii\db\Connection',
            'dsn' => env('DB_DSN'),
            'username' => env('DB_USERNAME'),
            'password' => env('DB_PASSWORD'),
            'tablePrefix' => env('DB_TABLE_PREFIX'),
            'charset' => 'utf8',
            'enableSchemaCache' => YII_ENV_PROD,
        ],

        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                'db'=>[
                    'class' => 'yii\log\DbTarget',
                    'levels' => ['error', 'warning'],
                    'except'=>['yii\web\HttpException:*', 'yii\i18n\I18N\*'],
                    'prefix'=>function () {
                        $url = !Yii::$app->request->isConsoleRequest ? Yii::$app->request->getUrl() : null;
                        return sprintf('[%s][%s]', Yii::$app->id, $url);
                    },
                    'logVars'=>[],
                    'logTable'=>'{{%system_log}}'
                ]
            ],
        ],

        'i18n' => [
            'translations' => [
                'app'=>[
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath'=>'@common/messages',
                ],
                '*'=> [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath'=>'@common/messages',
                    'fileMap'=>[
                        'common'=>'common.php',
                        'backend'=>'backend.php',
                        'frontend'=>'frontend.php',
                    ],
                    'on missingTranslation' => ['\backend\modules\i18n\Module', 'missingTranslation']
                ],
                /* Uncomment this code to use DbMessageSource
                 '*'=> [
                    'class' => 'yii\i18n\DbMessageSource',
                    'sourceMessageTable'=>'{{%i18n_source_message}}',
                    'messageTable'=>'{{%i18n_message}}',
                    'enableCaching' => YII_ENV_DEV,
                    'cachingDuration' => 3600,
                    'on missingTranslation' => ['\backend\modules\i18n\Module', 'missingTranslation']
                ],
                */
            ],
        ],

        'fileStorage' => [
            'class' => '\trntv\filekit\Storage',
            'baseUrl' => '@storageUrl/source',
            'filesystem' => [
                'class' => 'common\components\filesystem\LocalFlysystemBuilder',
                'path' => '@storage/web/source'
            ],
            'as log' => [
                'class' => 'common\behaviors\FileStorageLogBehavior',
                'component' => 'fileStorage'
            ]
        ],

        'keyStorage' => [
            'class' => 'common\components\keyStorage\KeyStorage'
        ],
       /* 'wechat' => [
            'class' => 'callmez\wechat\sdk\Wechat',
            'appId' => '38',
            'appSecret' => 'Jt-kMtjCZFcc9YLT1BVPgmOrKAUy2wjckN6Gc023UMLQt58GuxEYV1RyOHQRO0Zd',
            'token' => ''
        ],*/
        /*'wechat' => [
            'class' => 'callmez\wechat\sdk\QyWechat',
            'corpId' => '38',
            'secret' => 'Jt-kMtjCZFcc9YLT1BVPgmOrKAUy2wjckN6Gc023UMLQt58GuxEYV1RyOHQRO0Zd'
        ],*/

        'wechat' => [
            'class' => 'liasica\qywechat\Qywechat',
            'corpId' => 'wx39745116bff886df',
            'secret' => 'Jt-kMtjCZFcc9YLT1BVPgmOrKAUy2wjckN6Gc023UMLQt58GuxEYV1RyOHQRO0Zd'
        ],

        'urlManagerBackend' => \yii\helpers\ArrayHelper::merge(
            [
                'hostInfo' => Yii::getAlias('@backendUrl')
            ],
            require(Yii::getAlias('@backend/config/_urlManager.php'))
        ),
        'urlManagerFrontend' => \yii\helpers\ArrayHelper::merge(
            [
                'hostInfo' => Yii::getAlias('@frontendUrl')
            ],
            require(Yii::getAlias('@frontend/config/_urlManager.php'))
        ),
        'urlManagerStorage' => \yii\helpers\ArrayHelper::merge(
            [
                'hostInfo'=>Yii::getAlias('@storageUrl')
            ],
            require(Yii::getAlias('@storage/config/_urlManager.php'))
        )
    ],
    'params' => [
        'adminEmail' => env('ADMIN_EMAIL'),
        'robotEmail' => env('ROBOT_EMAIL'),
        'availableLocales'=>[
            'en-US'=>'English (US)',
            'ru-RU'=>'Русский (РФ)',
            'uk-UA'=>'Українська (Україна)',
            'es' => 'Español',
            'vi' => 'Tiếng Việt',
            'zh-CN' => '简体中文',
            'pl-PL' => 'Polski (PL)',
        ],
        'availableDegrees'=>[
            '博士',
            '硕士',
            '本科'
        ],
        'availableTitles'=>[
            '教授',
            '副教授',
            '兼职教授',
            '讲座教授',
            '讲师',
            '高级实验师',
            '实验师',
            '助理实验师',
            '其他'
        ],
        'availableStudentDegrees'=>[
            '本科在读',
            '硕士在读',
            '博士在读',
            '硕士(已毕业)',
            '博士(已毕业)',
            '本科(已毕业)'
        ],
        'tablePrefix'=>'dbis_'
    ],
];

if (YII_ENV_PROD) {
    $config['components']['log']['targets']['email'] = [
        'class' => 'yii\log\EmailTarget',
        'except' => ['yii\web\HttpException:*'],
        'levels' => ['error', 'warning'],
        'message' => ['from' => env('ROBOT_EMAIL'), 'to' => env('ADMIN_EMAIL')]
    ];
}

if (YII_ENV_DEV) {
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class'=>'yii\gii\Module'
    ];

    $config['components']['cache'] = [
        'class' => 'yii\caching\DummyCache'
    ];
    $config['components']['mailer']['transport'] = [
        'class' => 'Swift_SmtpTransport',
        'host' => env('SMTP_HOST'),
        'port' => env('SMTP_PORT'),
    ];
}

return $config;
