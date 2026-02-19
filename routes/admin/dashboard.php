<?php

declare(strict_types=1);

$router->get('/admin/dashboard', [\App\Http\Controllers\Admin\AdminController::class, 'index'])
    ->name('admin.dashboard')->middleware('admin');
