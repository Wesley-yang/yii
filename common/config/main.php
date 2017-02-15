<?php
return [
    'language' => 'zh-CN',
    'timezone' => 'Asia/Shanghai',
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
    ],
    "aliases" => [
        //"@smsCode" => "@vendor/third/smsCode",
    ],
];
