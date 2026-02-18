<?php

declare(strict_types=1);

use App\Http\PostController;

$router->resource('posts', PostController::class)->only(['index', 'show']);