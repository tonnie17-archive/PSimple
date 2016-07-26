<?php

function get_config()
{
    return [
        'db' => [
            'type' => 'file',
            'path' => realpath('./data/db.json'),
        ],
        'import' => [
            'controllers',
            'db',
            'logics',
            'models',
            'services',
            'dataproviders',
            'datamappers',
            'traits'
        ]
    ];
}
