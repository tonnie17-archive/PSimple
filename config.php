<?php

function get_config()
{
    return [
        'db' => [
            'type' => 'file',
            'path' => __DIR__ . '/data/db.json'
        ],
        'log' => [
            'error' => __DIR__ . '/logs/error.log'
        ],
        'import' => [
            'app',
            'cache',
            'common',
            'controller',
            'dataprovider',
            'datamapper',
            'db',
            'event',
            'http',
            'logics',
            'middleware',
            'model',
            'services',
            'utils'
        ],
        'middlewares' => [
            'LogIPMiddleware',
        ],
        'template' => [
            'path'   => __DIR__ . '/views',
            'suffix' => 'php'
        ]
    ];
}
