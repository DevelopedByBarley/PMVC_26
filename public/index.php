<?php

declare(strict_types=1);

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'vendor/autoload.php';
require BASE_PATH . 'core/functions.php';

$logger = require BASE_PATH . 'bootstrap/app.php';
$logger->info('Request received', [
    'uri' => $_SERVER['REQUEST_URI'] ?? '/',
    'app_name' => $_ENV['APP_NAME'] ?? 'PMVC_26',
]);

require BASE_PATH . 'routes/web.php';
