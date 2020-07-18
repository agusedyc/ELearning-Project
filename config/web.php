<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'version' => '1.0',
    'name' => 'E-Learning',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'as access' => [
         'class' => '\hscstudio\mimin\components\AccessControl',
         'allowActions' => [
            // add wildcard allowed action here!
            // '*',
            // 'quiz/*',
            'user/*',
            'user/profile/*',
            'user/security/*',
            'user/recovery/*',
            'user/registration/*',
            // 'gii/*',
            'site/index',
            'site/view-detail-course',
            // 'debug/*',
            // 'mimin/*', // only in dev mode
            // 'subject/*',
        ],
    ],
    'modules' => [
        'quiz' => [
            'class' => 'app\modules\quiz\Quiz',
        ],  
        'mimin' => [
            'class' => '\hscstudio\mimin\Module',
        ],
        'user' => [
            'class' => 'dektrium\user\Module',
            'controllerMap' => [
                'admin' => 'app\controllers\user\AdminController',
                'recovery' => 'app\controllers\user\RecoveryController',
                'registration' => 'app\controllers\user\RegistrationController',
            ],
            'modelMap' => [
                'User' => 'app\models\User',
                'RegistrationForm' => 'app\models\RegistrationForm',
            ],
            'admins' => ['admin'],
            'enableConfirmation' => 'true',
            // 'enableUnconfirmedLogin' => 'true',
        ],
    ],
    'components' => [
        'formatter' => [
            'dateFormat' => 'd-M-Y H:i:s',
            'decimalSeparator' => ',',
            'thousandSeparator' => ' ',
            'currencyCode' => 'IDR',
            'locale' => 'id_ID',
        ],
        'view' => [
             'theme' => [
                 'pathMap' => [
                    '@app/views' => '@app/views/adminlte',
                    '@dektrium/user/views' => '@app/views/user',
                 ],
             ],
        ],
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'FgiVr-GT99IXaeCdhgjfgoTCvaWv7LOi',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            // 'identityClass' => 'dektrium\user\models\Profile',
            'enableAutoLogin' => true,
        ],
        'authManager' => [
            'class' => 'yii\rbac\DbManager', // only support DbManager
        ],
        'assetManager' => [
            'bundles' => [
                'dmstr\web\AdminLteAsset' => [
                    'skin' => 'skin-blue',
                ],
            ],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => 'smtp.gmail.com',
                'username' => 'edyagusc@gmail.com',
                'password' => 'cgxuosebfffbonsp',
                'port' => '587',
                'encryption' => 'tls',
            ],
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
                '<controller:course>/<action:(view-lecture|create-question)>/<id:\d+>/quiz/<quizId:\d+>' => '<controller>/<action>',
                '<controller:course>/<action:(view|view-lecture|create-quiz|create-lecture)>/<id:\d+>' => '<controller>/<action>',
            ],
        ],
        
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1','*'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1','*'],
    ];
}

return $config;
