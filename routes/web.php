<?php

$router = router();

$router->getNativeRouter()->aliasMiddleware(
    'admin',
    \App\Http\Middlewares\AdminMiddleware::class
);

$router->get('/', [App\Http\Controllers\HomeController::class, 'index']);
$router->post('/test', [App\Http\Controllers\HomeController::class, 'store']);

$router->get('/lang/{lang}', [App\Http\Controllers\LanguageController::class, 'switch'])->name('lang.switch');

require __DIR__ . '/posts.php';
require __DIR__ . '/admin/auth.php';
require __DIR__ . '/admin/settings.php';
require __DIR__ . '/admin/dashboard.php';

require __DIR__ . '/user/auth.php';

$router->run();
