<?php

declare(strict_types=1);

use App\Http\Controllers\PostController;

$router->resource('posts', PostController::class)->only(['index', 'show']); 