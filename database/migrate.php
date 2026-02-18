<?php

declare(strict_types=1);

use Illuminate\Database\Schema\Blueprint;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'vendor/autoload.php';
require BASE_PATH . 'core/functions.php';
require BASE_PATH . 'bootstrap/app.php';
require __DIR__ . '/Migration.php';

$fresh = in_array('--fresh', $argv ?? [], true);
$connection = db()->getConnection();
$schema = db()->getConnection()->getSchemaBuilder();

if ($fresh) {
    echo "Fresh mode: dropping all tables...\n";

    $driver = $connection->getDriverName();
    if ($driver === 'mysql') {
        $connection->statement('SET FOREIGN_KEY_CHECKS=0');
    }

    $tables = $connection->select('SHOW TABLES');
    foreach ($tables as $table) {
        $tableName = array_values((array) $table)[0];
        $schema->drop($tableName);
    }

    if ($driver === 'mysql') {
        $connection->statement('SET FOREIGN_KEY_CHECKS=1');
    }
}

if (!$schema->hasTable('migrations')) {
    $schema->create('migrations', function (Blueprint $table): void {
        $table->increments('id');
        $table->string('migration')->unique();
        $table->integer('batch');
        $table->timestamp('ran_at')->useCurrent();
    });
}

$files = glob(__DIR__ . '/migrations/*.php') ?: [];
sort($files);

$ran = db()::table('migrations')->pluck('migration')->all();
$ranMap = array_flip($ran);
$batch = ((int) db()::table('migrations')->max('batch')) + 1;

echo "Migration started...\n";

foreach ($files as $file) {
    $migrationName = basename($file);

    if (isset($ranMap[$migrationName])) {
        continue;
    }

    $migration = require $file;

    if (!$migration instanceof \Database\Migration) {
        throw new RuntimeException("Invalid migration: {$migrationName}");
    }

    $migration->up();

    db()::table('migrations')->insert([
        'migration' => $migrationName,
        'batch' => $batch,
    ]);

    echo "Migrated: {$migrationName}\n";
}

echo "Migration finished.\n";
