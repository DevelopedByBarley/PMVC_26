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

if (!function_exists('app')) {
    function app(?string $key = null): mixed
    {
        static $app = null;

        if ($app === null) {
            $app = require base_path('bootstrap/app.php');
        }

        if ($key === null) {
            return $app;
        }

        return $app[$key] ?? null;
    }
}

if (!function_exists('validator')) {
    function validator(): \Illuminate\Validation\Factory
    {
        $validator = app('validator');
        if (!$validator instanceof \Illuminate\Validation\Factory) {
            throw new \RuntimeException('Validator service is not available.');
        }

        return $validator;
    }
}

if (!function_exists('old')) {
    function old(string $key, mixed $default = ''): mixed
    {
        if (isset($GLOBALS['old']) && is_array($GLOBALS['old']) && array_key_exists($key, $GLOBALS['old'])) {
            return $GLOBALS['old'][$key];
        }

        if (isset($_SESSION['old']) && is_array($_SESSION['old']) && array_key_exists($key, $_SESSION['old'])) {
            return $_SESSION['old'][$key];
        }

        return $default;
    }
}



if (!function_exists('db')) {
    function db(): \Illuminate\Database\Capsule\Manager
    {
        return \Database\Connect::capsule();
    }
}

if (!function_exists('oldValue')) {

    function oldValue($key, $default = '')
    {
        $old = Core\Session::get('old', []);
        if (!is_array($old)) {
            return $default;
        }
        return array_key_exists($key, $old) ? $old[$key] : $default;
    }
}


if (!function_exists('errors')) {
    function errors(string $key, array $errors = []): void
    {
        if (empty($errors[$key])) {
            return;
        }

        foreach ((array) $errors[$key] as $message) {
            echo '<div class="text-danger small mt-1">'
                . htmlspecialchars($message, ENT_QUOTES, 'UTF-8')
                . '</div>';
        }
    }
}

if (!function_exists('checkAuth')) {
    function checkAuth(string $entity): bool
    {
        // Check if session exist

        if (!isset($_SESSION)) {
            return false;
        }

        return isset($_SESSION[$entity . '_id']);
    }
}
