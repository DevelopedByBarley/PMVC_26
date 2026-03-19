<?php

declare(strict_types=1);

use App\Models\Admin;
use Database\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class implements Migration
{
    public function up(): void
    {
        $schema = db()->getConnection()->getSchemaBuilder();

        if ($schema->hasTable('admin_settings')) {
            return;
        }

        $schema->create('admin_settings', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->foreignIdFor(Admin::class)->constrained()->onDelete('cascade');
            $table->string('theme')->default('light');
            $table->string('language')->default('en');
            $table->string('timezone')->default('UTC');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        db()->getConnection()->getSchemaBuilder()->dropIfExists('admin_settings');
    }
};
