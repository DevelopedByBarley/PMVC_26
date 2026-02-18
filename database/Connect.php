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

        $default = (string) config('db.default', 'mysql');
        $connection = config("db.connections.{$default}", []);
        if (!is_array($connection) || $connection === []) {
            throw new \RuntimeException("Database config for connection '{$default}' is missing.");
        }

        $capsule = new Capsule();
        // Keep Laravel/Eloquent default connection name available as "default".
        $capsule->addConnection($connection, 'default');
        $capsule->getDatabaseManager()->setDefaultConnection('default');

        $capsule->setAsGlobal();
        $capsule->bootEloquent();

        self::$capsule = $capsule;

        return self::$capsule;
    }

    public static function capsule(): Capsule
    {
        return self::boot();
    }
}
