<?php

declare(strict_types=1);

namespace Database;

use Illuminate\Database\Capsule\Manager as Capsule;

class Connect
{
    private static ?Capsule $capsule = null;

    public static function boot(): Capsule
    {
        if (self::$capsule !== null) {
            return self::$capsule;
        }

        $capsule = new Capsule();
        $capsule->addConnection([
            'driver' => self::env('DB_CONNECTION', 'mysql'),
            'host' => self::env('DB_HOST', '127.0.0.1'),
            'port' => (int) self::env('DB_PORT', '3306'),
            'database' => self::env('DB_DATABASE', ''),
            'username' => self::env('DB_USERNAME', 'root'),
            'password' => self::env('DB_PASSWORD', ''),
            'charset' => self::env('DB_CHARSET', 'utf8mb4'),
            'collation' => self::env('DB_COLLATION', 'utf8mb4_unicode_ci'),
            'prefix' => self::env('DB_PREFIX', ''),
        ]);

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        self::$capsule = $capsule;

        return self::$capsule;
    }

    public static function capsule(): Capsule
    {
        return self::boot();
    }

    private static function env(string $key, ?string $default = null): ?string
    {
        if (array_key_exists($key, $_ENV)) {
            return (string) $_ENV[$key];
        }

        $value = getenv($key);
        if ($value !== false) {
            return (string) $value;
        }

        return $default;
    }
}
