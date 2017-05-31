<?php
return [
    'id' => 'install',
    'basePath' => dirname(__DIR__),
    'components' => [
        'urlManager' => require(__DIR__.'/_urlManager.php'),
        'installCache' => require(Yii::getAlias('@frontend/config/_cache.php'))
    ],
];
