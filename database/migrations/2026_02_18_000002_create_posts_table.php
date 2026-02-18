<?php

declare(strict_types=1);

use App\Models\User;
use Database\Migration;
use Illuminate\Database\Schema\Blueprint;

return new class implements Migration
{
    public function up(): void
    {
        $schema = db()->getConnection()->getSchemaBuilder();

        if ($schema->hasTable('posts')) {
            return;
        }

        $schema->create('posts', function (Blueprint $table): void {
            $table->bigIncrements('id');
            $table->foreignIdFor(User::class)->constrained()->onDelete('cascade');
            $table->text('body');
            $table->timestamps();
        });
    }

    public function down(): void
    {
        db()->getConnection()->getSchemaBuilder()->dropIfExists('posts');
    }
};
