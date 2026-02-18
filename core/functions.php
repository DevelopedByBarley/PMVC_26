<?php

declare(strict_types=1);

require_once __DIR__ . '/Router.php';
require_once __DIR__ . '/CSRF.php';
require_once __DIR__ . '/../database/Connect.php';

if (!function_exists('base_path')) {
    function base_path(string $path = ''): string
    {
        return __DIR__ . '/../' . ltrim($path, '/');
    }
}

if (!function_exists('config_path')) {
    function config_path(string $path = ''): string
    {
        return base_path('config/' . ltrim($path, '/'));
    }
}

if (!function_exists('env')) {
    function env(string $key, mixed $default = null): mixed
    {
        if (array_key_exists($key, $_ENV)) {
            $value = $_ENV[$key];
        } else {
            $value = getenv($key);
            if ($value === false) {
                return $default;
            }
        }

        if (!is_string($value)) {
            return $value;
        }

        $lower = strtolower($value);
        if ($lower === 'true') {
            return true;
        }
        if ($lower === 'false') {
            return false;
        }
        if ($lower === 'null') {
            return null;
        }
        if (is_numeric($value)) {
            return str_contains($value, '.') ? (float) $value : (int) $value;
        }

        return $value;
    }
}

if (!function_exists('config')) {
    function config(?string $key = null, mixed $default = null): mixed
    {
        static $items = null;

        if ($items === null) {
            $items = [];
            foreach (glob(config_path('*.php')) ?: [] as $file) {
                $name = pathinfo($file, PATHINFO_FILENAME);
                $items[$name] = require $file;
            }
        }

        if ($key === null || $key === '') {
            return $items;
        }

        $segments = explode('.', $key);
        $value = $items;

        foreach ($segments as $segment) {
            if (!is_array($value) || !array_key_exists($segment, $value)) {
                return $default;
            }
            $value = $value[$segment];
        }

        return $value;
    }
}

if (!function_exists('router')) {
    function router(): \Core\Router
    {
        static $router = null;

        if ($router === null) {
            $router = new \Core\Router();
        }

        return $router;
    }
}

if (!function_exists('db')) {
    function db(): \Illuminate\Database\Capsule\Manager
    {
        return \Database\Connect::capsule();
    }
}

