<?php

declare(strict_types=1);

return [
    'guard' => env('AUTH_GUARD', 'web'),
    'session_key' => env('AUTH_SESSION_KEY', 'auth_user_id'),
    'remember_cookie' => env('AUTH_REMEMBER_COOKIE', 'remember_token'),
    'password_timeout' => env('AUTH_PASSWORD_TIMEOUT', 10800),
];
