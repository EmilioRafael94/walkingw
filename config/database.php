<?php

use Illuminate\Support\Str;

return [
    // Default connection
    'default' => env('DB_CONNECTION', 'mongodb'),  // Set the default to mongodb or your preferred connection

    'connections' => [

    'mongodb' => [
    'driver'   => 'mongodb',
    'dsn'      => env('MONGO_URI'),
    'database' => env('DB_DATABASE'),
    'options'  => [
        'retryWrites' => true,
        'w'           => 'majority',
    ],
],



    ],

    // Optional: Migrations for MongoDB (or leave as is for MongoDB to manage separately)
    'migrations' => 'migrations',

    // Redis and other configurations
    'redis' => [
        'client' => env('REDIS_CLIENT', 'phpredis'),
        'options' => [
            'cluster' => env('REDIS_CLUSTER', 'redis'),
            'prefix'  => env('REDIS_PREFIX', Str::slug(env('APP_NAME', 'laravel'), '_') . '_database_'),
        ],
        'default' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_DB', '0'),
        ],
        'cache' => [
            'url' => env('REDIS_URL'),
            'host' => env('REDIS_HOST', '127.0.0.1'),
            'username' => env('REDIS_USERNAME'),
            'password' => env('REDIS_PASSWORD'),
            'port' => env('REDIS_PORT', '6379'),
            'database' => env('REDIS_CACHE_DB', '1'),
        ],
    ],
];