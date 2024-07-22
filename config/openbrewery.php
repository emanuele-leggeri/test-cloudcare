<?php
    return [
        'baseuri' => 'https://api.openbrewerydb.org/v1',
        'schema' => 'https',
        'endpoints' => [
            'allBeers' => [
                'method' => 'GET', 
                'uri' => '/breweries'
            ],
        ]
    ];