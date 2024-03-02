
<?php

use kartik\datecontrol\Module;

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'name' => 'Presensi Pegawai',
    'basePath' => dirname(__DIR__),
    'timeZone' => 'Asia/Jakarta',
    'bootstrap' => ['log'],
    'vendorPath' => __DIR__ . '/../../vendor',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            'cookieValidationKey' => 'KMhhhKNo9w8UxQZ-O5ndASxSpzdUTuyn',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            // 'identityClass' => 'app\models\User',
            // 'enableAutoLogin' => true,
            'class' => 'app\modules\UserManagement\components\UserConfig',

            // Comment this if you don't want to record user logins
            'on afterLogin' => function ($event) {
                \app\modules\UserManagement\models\UserVisitLog::newVisitor($event->identity->id);
            },
            'loginUrl' => ['user-management/auth/login'],
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => \yii\symfonymailer\Mailer::class,
            'viewPath' => '@app/mail',
            // send all mails to a file by default.
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
        /*
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
            ],
        ],
        */
    ],
    'params' => $params,
    'modules' => [
        'gridview' => [
            'class' => '\kartik\grid\Module',
            // see settings on http://demos.krajee.com/grid#module
        ],
        'datecontrol' => [
            // see settings on http://demos.krajee.com/datecontrol#module
            'class' => '\kartik\datecontrol\Module',
        ],
        'user-management' => [
            'class' => 'app\modules\UserManagement\UserManagementModule',
            'on beforeAction' => function (yii\base\ActionEvent $event) {
                if ($event->action->uniqueId == 'user-management/auth/login') {
                    $event->action->controller->layout = 'loginLayout.php';
                };
            },
        ],
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
        // 'gii' => [
        //     'class' => 'yii\'
        // ]
    ],
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        'allowedIPs' => ['127.0.0.1', '::1', '103.219.249.55', '103.219.249.107'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        'allowedIPs' => ['127.0.0.1', '::1', '103.219.249.55', '103.219.249.107'],
        'generators' => [
            'enhanced-gii-crud' => [
                'class' => 'mootensai\enhancedgii\crud\Generator',
                'cancelable' => true,
                'generateSearchModel' => true,
                'nsModel' => 'app\models\base',
                'templates' => [
                    'myCrud😎' => '@app/gii/crud/default',
                ]
            ],
            /* agar kode dibawah bisa berfungsi buka folder vendor mootensai dan 
               cari file boostrap.php, lalu sesuaikan kode berikut
               ``` generators['enhanced-gii-model'] = .... ```
               menjadi
               ``` generators['enhanced-gii-model']['class'] = .... ```
             */
            'enhanced-gii-model' => [
                'class' => mootensai\enhancedgii\model\Generator::className(),
                'generateBaseOnly' => true,
                // 'templates' => [
                //     'myModel😎' => '@app/gii/model/default',
                // ]
            ],
        ],
    ];
}

return $config;
