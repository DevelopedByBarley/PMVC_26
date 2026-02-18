<?php

declare(strict_types=1);

use Core\Session;

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'vendor/autoload.php';
require BASE_PATH . 'core/functions.php';

$app = require BASE_PATH . 'bootstrap/app.php';
$logger = $app['logger'];
$logger->info('Request received', [
    'uri' => $_SERVER['REQUEST_URI'] ?? '/',
    'app_name' => $_ENV['APP_NAME'] ?? 'PMVC_26',
]);

Session::create();

require BASE_PATH . 'routes/web.php';

//Session::unflash();
