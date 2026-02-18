<?php

declare(strict_types=1);

namespace Database;

interface Migration
{
    public function up(): void;

    public function down(): void;
}
