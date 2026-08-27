<?php

declare(strict_types=1);

use Database\Migration;

/**
 * A PMVC sablonból örökölt, a ZeroDay konferencia oldalhoz nem tartozó táblák
 * eltávolítása (users, posts). A hozzájuk tartozó migrációs bejegyzéseket is
 * töröljük, hogy a migrations tábla ne hivatkozzon már nem létező fájlokra.
 */
return new class implements Migration
{
    private const LEGACY_TABLES = ['posts', 'users'];

    private const LEGACY_MIGRATIONS = [
        '2026_02_18_000001_create_users_table.php',
        '2026_02_18_000002_create_posts_table.php',
    ];

    public function up(): void
    {
        $connection = db()->getConnection();
        $schema     = $connection->getSchemaBuilder();
        $isMysql    = $connection->getDriverName() === 'mysql';

        if ($isMysql) {
            $connection->statement('SET FOREIGN_KEY_CHECKS=0');
        }

        foreach (self::LEGACY_TABLES as $table) {
            $schema->dropIfExists($table);
        }

        if ($isMysql) {
            $connection->statement('SET FOREIGN_KEY_CHECKS=1');
        }

        if ($schema->hasTable('migrations')) {
            db()::table('migrations')
                ->whereIn('migration', self::LEGACY_MIGRATIONS)
                ->delete();
        }
    }

    public function down(): void
    {
        // A legacy táblákat szándékosan nem állítjuk vissza.
    }
};
