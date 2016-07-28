<?php

function get_config()
{
    return [
        'db' => [
            'type' => 'file',
            'path' => realpath('./data/db.json'),
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
            'SayHelloMiddleware',
        ]
    ];
}
