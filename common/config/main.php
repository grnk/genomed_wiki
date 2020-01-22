<?php
include __DIR__ . '/../functions/functions.php';

return [
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'i18n' => [
            'translations' => [
                'frontend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    /* fileMap определяет, какой файл будет подключаться для определённой категории.
					иначе так название категории является именем файла
                    'fileMap' => [
                        'app'       => 'app.php',
                        'app/error' => 'error.php',
                    ],*/
                ],
                'backend*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                ],
                // или просто вместо перечисления категорий поставим * что  означает все категории
                '*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
                    'basePath' => '@common/messages',
                    'on missingTranslation' => ['common\components\TranslationEventHandler', 'handleMissingTranslation']// обработчик не найденных переводов
                ],
            ],
        ],
    ],
];
