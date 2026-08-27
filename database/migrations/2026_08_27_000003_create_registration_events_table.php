<?php

declare(strict_types=1);

use App\Models\Admin;
use App\Models\Registration;
use Database\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Regisztrációk idővonala: ki, mikor, mit tett (beküldés, elfogadás, elutasítás,
 * visszaállítás, megjegyzés, e-mail küldés).
 */
return new class implements Migration
{
    public function up(): void
    {
        $schema = db()->getConnection()->getSchemaBuilder();

        if ($schema->hasTable('registration_events')) {
            return;
        }

        $schema->create('registration_events', function (Blueprint $table): void {
            $table->bigIncrements('id');

            $table->foreignIdFor(Registration::class)->constrained()->cascadeOnDelete();
            $table->foreignIdFor(Admin::class)->nullable()->constrained()->nullOnDelete();

            // submitted | approved | rejected | reverted | note | email_sent | email_failed
            $table->string('action', 30);
            $table->string('from_status', 20)->nullable();
            $table->string('to_status', 20)->nullable();
            $table->text('note')->nullable();

            $table->timestamps();

            $table->index(['registration_id', 'created_at']);
        });
    }

    public function down(): void
    {
        db()->getConnection()->getSchemaBuilder()->dropIfExists('registration_events');
    }
};
