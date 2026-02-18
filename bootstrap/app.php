<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;

Dotenv::createImmutable(BASE_PATH)->safeLoad();
\Database\Connect::boot();

$logsDir = base_path('storage/logs');
if (!is_dir($logsDir)) {
    mkdir($logsDir, 0777, true);
}

$logger = new Logger('app');
$logger->pushHandler(new StreamHandler(base_path('storage/logs/app.log'), Level::Info));

return $logger;
