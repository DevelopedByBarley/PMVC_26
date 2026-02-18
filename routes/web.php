<?php

$router = router();

$router->get('/', [App\Http\HomeController::class, 'index']);

require __DIR__ . '/posts.php';

$router->run();
