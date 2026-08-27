<?php

declare(strict_types=1);

use Database\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Az Erasmus mező kikerült a formból, így az oszlopra sincs szükség.
 * (A create migráció már nem hozza létre – ez a régi adatbázisokat tisztítja.)
 */
return new class implements Migration
{
    public function up(): void
    {
        $schema = db()->getConnection()->getSchemaBuilder();

        if (!$schema->hasTable('registrations') || !$schema->hasColumn('registrations', 'erasmus')) {
            return;
        }

        $schema->table('registrations', function (Blueprint $table): void {
            $table->dropColumn('erasmus');
        });
    }

    public function down(): void
    {
        $schema = db()->getConnection()->getSchemaBuilder();

        if (!$schema->hasTable('registrations') || $schema->hasColumn('registrations', 'erasmus')) {
            return;
        }

        $schema->table('registrations', function (Blueprint $table): void {
            $table->boolean('erasmus')->default(false)->after('phone');
        });
    }
};
