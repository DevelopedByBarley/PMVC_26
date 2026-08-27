<?php

declare(strict_types=1);

use App\Models\Admin;
use Database\Migration;
use Illuminate\Database\Schema\Blueprint;

/**
 * Konferencia regisztrációk (résztvevő / előadó).
 * A publikus form ide ír, az admin felület innen kezeli az elfogadást/elutasítást.
 */
return new class implements Migration
{
    public function up(): void
    {
        $schema = db()->getConnection()->getSchemaBuilder();

        if ($schema->hasTable('registrations')) {
            return;
        }

        $schema->create('registrations', function (Blueprint $table): void {
            $table->bigIncrements('id');

            // Emberi azonosító az e-mailekhez (pl. ZD26-7F3A91).
            $table->string('reference', 20)->unique();
            // Titkos token: publikus státusz-link / későbbi visszaigazoló link.
            $table->string('token', 64)->unique();

            // attendee | speaker
            $table->string('type', 20)->index();

            $table->string('name', 150);
            $table->string('email', 190);
            $table->string('company', 190);
            $table->string('phone', 40);

            // online | in_person
            $table->string('mode', 20)->index();

            // A kitöltés nyelve – ezen a nyelven mennek ki az e-mailek.
            $table->string('language', 5)->default('hu');

            // pending | approved | rejected
            $table->string('status', 20)->default('pending');

            $table->timestamp('gdpr_accepted_at')->nullable();

            // Az elfogadás/elutasítás indoka: bekerül a döntésről szóló e-mailbe.
            $table->text('decision_reason')->nullable();
            // Csak belső, adminok közti megjegyzés.
            $table->text('admin_note')->nullable();

            $table->foreignIdFor(Admin::class, 'reviewed_by')->nullable()
                ->constrained('admins')->nullOnDelete();
            $table->timestamp('reviewed_at')->nullable();

            $table->string('ip_address', 45)->nullable();
            $table->string('user_agent', 255)->nullable();

            $table->timestamps();

            $table->index('email');
            $table->index(['status', 'created_at']);
        });
    }

    public function down(): void
    {
        db()->getConnection()->getSchemaBuilder()->dropIfExists('registrations');
    }
};
