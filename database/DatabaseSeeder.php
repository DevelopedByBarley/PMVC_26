<?php

declare(strict_types=1);

use Database\Seeders\AdminSeeder;

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'vendor/autoload.php';
require BASE_PATH . 'core/functions.php';
require BASE_PATH . 'bootstrap/app.php';

echo "Seeding started...\n";

try {
    $adminSeeder = new AdminSeeder();
    $adminSeeder->run();

    echo "Seeding finished successfully.\n";
} catch (\Throwable $e) {
    echo "Seeding failed: " . $e->getMessage() . "\n";
    exit(1);
}
