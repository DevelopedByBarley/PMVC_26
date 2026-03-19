<?php

declare(strict_types=1);

$router->get('/admin/settings', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'index'])
    ->name('admin.settings')->middleware('admin');

$router->post('/admin/settings', [\App\Http\Controllers\Admin\AdminSettingsController::class, 'update'])
    ->name('admin.settings.update')->middleware('admin');
