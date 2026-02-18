<?php

declare(strict_types=1);

use Dotenv\Dotenv;
use Monolog\Handler\StreamHandler;
use Monolog\Level;
use Monolog\Logger;
use Illuminate\Translation\ArrayLoader;
use Illuminate\Translation\Translator;
use Illuminate\Validation\DatabasePresenceVerifier;
use Illuminate\Validation\Factory;


Dotenv::createImmutable(BASE_PATH)->safeLoad();
\Database\Connect::boot();

$logsDir = base_path('storage/logs');
if (!is_dir($logsDir)) {
    mkdir($logsDir, 0777, true);
}

$logger = new Logger('app');
$logger->pushHandler(new StreamHandler(base_path('storage/logs/app.log'), Level::Info));

$locale = (string) ($_ENV['APP_LOCALE'] ?? 'hu');
$loader = new ArrayLoader();

$enValidationPath = base_path('resources/lang/en/validation.php');
if (is_file($enValidationPath)) {
    $loader->addMessages('en', 'validation', require $enValidationPath);
}

$huValidationPath = base_path('resources/lang/hu/validation.php');
if (is_file($huValidationPath)) {
    $loader->addMessages('hu', 'validation', require $huValidationPath);
}

$translator = new Translator($loader, $locale);
$validatorFactory = new Factory($translator);
$validatorFactory->setPresenceVerifier(
    new DatabasePresenceVerifier(db()->getDatabaseManager())
);

return [
    'logger' => $logger,
    'validator' => $validatorFactory,
];
