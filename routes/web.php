<?php

$router = router();

$router->getNativeRouter()->aliasMiddleware(
    'admin',
    \App\Http\Middlewares\AdminMiddleware::class
);

$router->get('/', [App\Http\HomeController::class, 'index']);
require __DIR__ . '/posts.php';

$router->run();
