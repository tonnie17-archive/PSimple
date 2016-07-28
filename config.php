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
            'interfaces',
            'logics',
            'models',
            'services',
            'dataproviders',
            'datamappers',
            'traits',
            'utils'
        ]
    ];
}
