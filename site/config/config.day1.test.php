<?php

return [

    'environment' => 'development',
    'debug' => true,
    'panel' =>[
        'install' => true
    ],
    'cache' => [
        'pages' => [
            'active' => false
        ]
    ],
    'email' => [
        'transport' => [
            'type' => 'smtp',
            'host' => 'localhost',
            'port' => 1025,
            'security' => false
        ]
    ],
];