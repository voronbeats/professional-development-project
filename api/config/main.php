<?php
$params = array_merge(
    require __DIR__ . '/params.php',
    require __DIR__ . '/params-local.php',
);

return [
    // ...
    'modules' => [
        'api' => [
            'class' => 'app\modules\api\Module',
        ],
    ],

    'components' => [
        'urlManager' => [
            'class' => 'yii\web\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                'api/<module:\w+>/<controller:\w+>/<action:\w+>' => '<module>/<controller>/<action>',
                'api/<controller:\w+>/<action:\w+>' => 'api/<controller>/<action>',
                '<controller:\w+>/<action:\w+>' => '<controller>/<action>',
            ],
        ],
    ],
];
