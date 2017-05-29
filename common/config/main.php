<?php
return [
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'language' => 'ru-RU',
    'modules' => [
        'user' => [
            'class' => 'dektrium\user\Module',
        ],
    ],
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'frontend' => 'frontend.php',
                    ],
                ],
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'backend' => 'backend.php',
                    ],
                ],
                'mail*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'fileMap' => [
                        'mail' => 'frontend.php',
                    ],
                ],
            ],
        ],
        'authManager' => [
            'class' => \yii\rbac\DbManager::className(),
        ],
        'keyStorage' => [
            'class' => \common\components\keyStorage\KeyStorage::className(),
        ]
    ],
];
