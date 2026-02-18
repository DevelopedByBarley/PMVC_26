<?php

function base_path($path = ''): string
{
    return __DIR__ . '/../' . ltrim($path, '/');
}

require_once __DIR__ . '/Router.php';
require_once __DIR__ . '/../database/Connect.php';

function router(): \Core\Router
{
    static $router = null;

    if ($router === null) {
        $router = new \Core\Router();
    }

    return $router;
}

function db(): \Illuminate\Database\Capsule\Manager
{
    return \Database\Connect::capsule();
}
