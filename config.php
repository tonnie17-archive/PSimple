<?php

function get_config()
{
    return [
        'db' => [
            'type' => 'file',
            'path' => realpath('./data/db.json'),
        ],
        'import' => [
            'common',
            'controllers',
            'db',
            'event',
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
