<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    /* change name app */
    'name' => 'tutorial',
    /* change app language. Default is en */
    'language' => 'en',
    /* change default route. Default is site/index */
    'defaultRoute' => 'site/index',
    /* We define the layout. By default is main */
    'layout' => 'main',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'WRXdz_-yPeoLlG8zpROUgL6nmeihtzzM',
            'parsers' => [
                'application/json' => \yii\web\JsonParser::class
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],

        /* 'assetManager' => [
            'appendTimestamp' = true
        ], */

        'assetManager' => [
            'class' => 'app\components\AssetManager'
        ],

        'test' => [
            'class' => 'app\components\TestComponent'
        ],
        
    ],
    'params' => $params,

    /* 'on beforeRequest' => function() {
        echo '<pre><br><br>';
            var_dump('from before request');
        echo '</pre>';
    }, */

    /* 'on beforeAction' => function() {
        echo '<pre><br><br>';
            var_dump('Application before action');
        echo '</pre>';
    } */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
