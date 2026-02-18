<?php

declare(strict_types=1);

return [
    'name' => env('APP_NAME', 'PMVC_26'),
    'env' => env('APP_ENV', 'production'),
    'debug' => env('APP_DEBUG', false),
    'url' => env('APP_URL', 'http://localhost'),
    'port' => env('APP_PORT', 80),
    'timezone' => env('APP_TIMEZONE', 'UTC'),
    'log_channel' => env('LOG_CHANNEL', 'stack'),
    'log_level' => env('LOG_LEVEL', 'debug'),
];
