<?php

function get_config()
{
    return [
        'db' => [
            'type' => 'file',
            'path' => realpath('./data/db.json'),
        ],
        'log' => [
            'error' => realpath('./logs/error.log')
        ],
        'import' => [
            'app',
            'common',
            'controllers',
            'db',
            'event',
            'http',
            'logics',
            'middleware',
            'models',
            'services',
            'dataproviders',
            'datamappers',
            'utils'
        ],
        'middlewares' => [
            // 'SayHelloMiddleware',
        ],
        'template' => [
            'path'   => realpath('./views'),
            'suffix' => 'php'
        ]
    ];
}
