<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
       //messages
       'mymessages' => [
        //Обязательно
    'class'    => 'vision\messages\components\MyMessages',
        //не обязательно
        //класс модели пользователей
        //по-умолчанию \Yii::$app->user->identityClass
    'modelUser' => 'common\models\Users',
        //имя контроллера где разместили action
    'nameController' => 'site',
        //не обязательно
        //имя поля в таблице пользователей которое будет использоваться в качестве имени
        //по-умолчанию username
    'attributeNameUser' => 'username',
        //не обязательно
        //можно указать роли и/или id пользователей которые будут видны в списке контактов всем кто не подпадает 
        //в эту выборку, при этом указанные пользователи будут и смогут писать всем зарегестрированным пользователям
    'admins' => ['admin', 7],
        //не обязательно
        //включение возможности дублировать сообщение на email
        //для работы данной функции в проектк должна быть реализована отправка почты штатными средствами фреймворка
    'enableEmail' => true,
        //задаем функцию для возврата адреса почты
        //в качестве аргумента передается объект модели пользователя
    'getEmail' => function($user_model) {
        return $user_model->email;
    },
        //задаем функцию для возврата лого пользователей в списке контактов (для виджета cloud)
        //в качестве аргумента передается id пользователя
    'getLogo' => function($user_id) {
        return Yii::$app->user->identity->logo;
    },
        //указываем шаблоны сообщений, в них будет передаваться сообщение $message
    'templateEmail' => [
        'html' => 'private-message-text',
        'text' => 'private-message-html'
    ],
        //тема письма
    'subject' => 'Private message'
],
      





        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'LHJJjknx-x4WW3N940PnRUVmsofQ2xCE',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\Users',
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
                '' => 'site/index',
                '<_a:[\w\-]+>' => 'site/<_a>',
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
