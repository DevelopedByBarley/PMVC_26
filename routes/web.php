<?php

declare(strict_types=1);

$router = router();

$router->getNativeRouter()->aliasMiddleware(
    'admin',
    \App\Http\Middlewares\AdminMiddleware::class
);

/* ---------------------------------------------------------------- */
/* Publikus                                                         */
/* ---------------------------------------------------------------- */

$router->get('/', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

$router->get('/lang/{lang}', [App\Http\Controllers\LanguageController::class, 'switch'])->name('lang.switch');

require __DIR__ . '/registration.php';

/* ---------------------------------------------------------------- */
/* Admin                                                            */
/* ---------------------------------------------------------------- */

require __DIR__ . '/admin/auth.php';
require __DIR__ . '/admin/dashboard.php';
require __DIR__ . '/admin/registrations.php';
require __DIR__ . '/admin/settings.php';

$router->run();
