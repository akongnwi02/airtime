<?php

return [
    'redis' => [

        'client'  => 'predis',
        'default' => [
            'host'     => env('CACHE_HOST', 'redis'),
            'password' => env('CACHE_PASSWORD', null),
            'port'     => env('CACHE_PORT', 6379),
            'database' => 0,
        ],

        'cache'   => [
            'host'     => env('CACHE_HOST', 'redis'),
            'password' => env('CACHE_PASSWORD', null),
            'port'     => env('CACHE_PORT', 6379),
            'database' => env('REDIS_CACHE_DB', 1),
        ],

    ],

    'connections' => [

        'mysql' => [
            'driver' => 'mysql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '3306'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'unix_socket' => env('DB_SOCKET', ''),
            'charset' => 'utf8mb4',
            'collation' => 'utf8mb4_unicode_ci',
            'prefix' => '',
            'strict' => true,
            'engine' => null,
        ],

        'pgsql' => [
            'driver' => 'pgsql',
            'host' => env('DB_HOST', '127.0.0.1'),
            'port' => env('DB_PORT', '5432'),
            'database' => env('DB_DATABASE', 'forge'),
            'username' => env('DB_USERNAME', 'forge'),
            'password' => env('DB_PASSWORD', ''),
            'charset' => 'utf8',
            'prefix' => '',
            'schema' => 'public',
            'sslmode' => 'prefer',
        ],
    ],

     'migrations' => 'migrations',

    'default' => env('DB_CONNECTION', 'mysql'),

];