<?php

declare(strict_types=1);

use Core\Log;
use Core\Session;

error_reporting(E_ALL);
ini_set('display_errors', TRUE);
ini_set('display_startup_errors', TRUE);
const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . 'vendor/autoload.php';
require BASE_PATH . 'core/functions.php';
app(); // boot: .env + database capsule + services

// Security headers
header('X-Frame-Options: SAMEORIGIN');
header('X-Content-Type-Options: nosniff');
header('Referrer-Policy: strict-origin-when-cross-origin');
header('Permissions-Policy: geolocation=(), microphone=(), camera=()');
header(
    "Content-Security-Policy: " .
    "default-src 'self'; " .
    "script-src 'self' 'unsafe-inline' 'unsafe-eval' cdn.jsdelivr.net cdn.tailwindcss.com; " .
    "style-src 'self' 'unsafe-inline' cdn.jsdelivr.net; " .
    "img-src 'self' data:; " .
    "font-src 'self' cdn.jsdelivr.net; " .
    "connect-src 'self';"
);

Session::create();

require BASE_PATH . 'routes/web.php';

//Session::unflash();
