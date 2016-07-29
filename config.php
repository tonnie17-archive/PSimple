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
            'path'   => realpath('./views'),
            'suffix' => 'php'
        ]
    ];
}
